<?php

class MY_Controller extends CI_Controller
{
	protected $module;
	protected $entity;
	protected $base_model;
	protected $validation_rules_create = [];
	protected $validation_rules_edit = [];
	protected $validation_rules_flash = [];
	protected $additional_vars = [];

	/**
	 * Construct controller berdasarkan modul HMVC
	 * Nama modul akan berpengaruh pada nama modul di config aauth (application\config\aauth.php)
	 * dan path URL aplikasi (http://{base_url}/{nama_module}/{nama_controller}).
	 *
	 * @param string $module Nama module.
	 */
	public function __construct($module = '')
	{
		parent::__construct();

		$this->module = $module;
		$this->aauth->initialize($this->module);

		if (!$this->aauth->is_loggedin()) {
			redirect($this->module . '/aauthlogin');
		}

		$this->aauth->update_activity($this->aauth->get_user_id());

		$class = $this->router->fetch_class();
		if ('welcome' != $class) {
			acl_controller($class, $this->module);
		}
	}

	// ----------------- setters -----------------

	/**
	 * Set nama entitas yang terhubung dengan controller
	 * Nama entitas akan berpengaruh pada:
	 *   - Nama tabel
	 *   - Nama view
	 *   - Nama field primary key tabel
	 *   - Nama array key saat menyimpan session data.
	 *
	 * @param string $entity Nama entitas. Misal: dokter, personal_information
	 */
	public function set_entity($entity)
	{
		$this->entity = $entity;
	}

	public function set_base_model($base_model)
	{
		$this->base_model = $base_model;
	}

	public function set_additional_vars($key, $value = null)
	{
		$this->additional_vars[$key] = $value;
	}

	public function set_validation_rules_create($rules)
	{
		$this->validation_rules_create = $rules;
	}

	public function set_validation_rules_edit($rules)
	{
		$this->validation_rules_edit = $rules;
	}

	public function set_validation_rules_flash($rules, $flashKey = 'default')
	{
		$this->validation_rules_flash = $rules;
	}

	// ----------------- page access -----------------
	public function index()
	{
		$this->_redirect();
	}

	public function data()
	{
		$this->_redirect_list();
	}

	public function add()
	{
		if ($this->input->post()) {
			try {
				$this->load->library('form_validation');
				$this->form_validation->set_rules($this->validation_rules_create);
				if (!$this->form_validation->run()) {
					throw new Exception(validation_errors());
				}

				foreach ($this->validation_rules_create as $rules) {
					$data[$rules['field']] = $this->input->post($rules['field']);
				}

				$this->save_add($data);
				$this->_redirect('Data saved successfully');
			} catch (Exception $exception) {
				$this->_redirect_form_add($exception->getMessage());
			}
		} else {
			$this->_redirect_form_add();
		}
	}

	public function edit($id)
	{
		if ($this->input->post()) {
			try {
				$this->load->library('form_validation');
				$this->form_validation->set_rules($this->validation_rules_edit);
				if (!$this->form_validation->run()) {
					throw new Exception(validation_errors());
				}

				foreach ($this->validation_rules_edit as $rules) {
					$data[$rules['field']] = $this->input->post($rules['field']);
				}

				$this->save_edit($id, $data);
				$this->_redirect('Data saved successfully');
			} catch (Exception $exception) {
				$this->_redirect_form_edit($id, $exception->getMessage());
			}
		} else {
			$this->_redirect_form_edit($id);
		}
	}

	public function delete($id)
	{
		$message = '';
		if (!empty($id) && $this->delete_data($id)) {
			$message = 'Deleted data successfully';
		}

		$this->_redirect($message);
	}

	public function view($id)
	{
		$default_vars = [
			'title_page' => ucwords(str_replace('_', ' ', $this->entity)) . ' Edit',
			'edit' => $this->base_model->get_one([$this->entity . '_id' => $id])
		];

		$this->load->vars(array_merge($default_vars, $this->additional_vars));
		$this->template->load('default', 'page/view_' . $this->entity, null);
	}

	public function push_flash($keyName = 'default')
	{
		try {
			if (!empty($this->validation_rules_flash)) {
				$this->load->library('form_validation');
				$this->form_validation->set_rules($this->validation_rules_flash);
				if (!$this->form_validation->run()) {
					throw new Exception(validation_errors());
				}
			}

			$flashData = $this->get_flash_data($keyName);
			$postData = $this->input->post();

			$index = $postData['flash_index'];
			unset($postData['flash_index']);

			if ('' === $index || null === $index) {
				$flashData[$keyName][] = $postData;
			} else {
				$flashData[$keyName][$index] = $postData;
			}

			$this->session->set_userdata($this->entity, $flashData);

			echo json_encode(['success' => true]);
		} catch (Exception $e) {
			$data = [
				'success' => false,
				'validation_errors' => $this->form_validation->error_array()
			];

			http_response_code(400);
			echo json_encode($data);
		}
	}

	public function delete_flash($index, $keyName = 'default')
	{
		$flashData = $this->get_flash_data($keyName);
		unset($flashData[$keyName][$index]);
		if (!empty($flashData[$keyName])) {
			$flashData[$keyName] = array_values($flashData[$keyName]);
		}
		$this->session->set_userdata($this->entity, $flashData);

		echo json_encode(['success' => true]);
	}

	public function reset_flash($keyName = 'default', $print_success = true)
	{
		$flashData = (array) $this->session->get_userdata()[$this->entity];
		unset($flashData[$keyName]);
		$this->session->set_userdata($this->entity, $flashData);

		if ($print_success) {
			echo json_encode(['success' => true]);
		}
	}

	public function get_flash($keyName = 'default')
	{
		$flashData = $this->get_flash_data($keyName);

		return (array) $flashData[$keyName];
	}

	public function edit_flash($index, $keyName = 'default')
	{
		$flash_data = $this->get_flash_data($keyName)[$keyName][$index];
		echo json_encode($flash_data);
	}

	// ----------------- protected methods ---------------
	protected function save_add($data)
	{
		$new_id = $this->base_model->insert($data);

		return $new_id;
	}

	protected function save_edit($id, $data)
	{
		$this->base_model->update($data, [$this->entity . '_id' => $id]);
	}

	protected function delete_data($id)
	{
		$this->base_model->delete([$this->entity . '_id' => $id]);

		return true;
	}

	// ----------------- helper methods ---------------

	protected function get_dropdown($entity, $criteria = [])
	{
		$this->load->model($entity . '_model');
		$model_name = $entity . '_model';
		$list_items = $this->{$model_name}->get_many($criteria);

		$dropdown = [];
		foreach ($list_items as $item) {
			$dropdown[$item[$entity . '_id']] = $item;
		}

		return $dropdown;
	}

	protected function get_flash_data($keyName = 'default')
	{
		$flashData = (array) $this->session->get_userdata()[$this->entity];
		$flashData[$keyName] = (array) $flashData[$keyName];

		return $flashData;
	}

	// ----------------- private methods -----------------
	private function _redirect_list()
	{
		$default_vars = [
			'title_page' => ucwords(str_replace('_', ' ', $this->entity)) . ' List',
			'data' => $this->base_model->get_many(),
			'action' => $this->module . '/api/' . $this->entity,
		];

		$this->load->vars(array_merge($default_vars, $this->additional_vars));
		$this->template->load('default', 'page/list_' . $this->entity, null);
	}

	private function _redirect_form_add($error = null)
	{
		if ($this->input->is_ajax_request()) {
			$this->output->set_status_header(400);
			echo json_encode(['success' => false, 'validation_errors' => $this->form_validation->error_array()]);
		} else {
			$this->load->helper('form');
			$default_vars = [
				'title_page' => ucwords(str_replace('_', ' ', $this->entity)) . ' Add',
				'action' => $this->module . '/' . $this->entity . '/add',
				'error' => $error
			];

			$this->load->vars(array_merge($default_vars, $this->additional_vars));
			$this->template->load('default', 'page/setup_' . $this->entity, null);
		}
	}

	private function _redirect_form_edit($id, $error = null)
	{
		if ($this->input->is_ajax_request()) {
			$this->output->set_status_header(400);
			echo json_encode(['success' => false, 'validation_errors' => $this->form_validation->error_array()]);
		} else {
			$this->load->helper('form');
			$default_vars = [
				'title_page' => ucwords(str_replace('_', ' ', $this->entity)) . ' Edit',
				'action' => $this->module . '/' . $this->entity . '/edit/' . $id,
				'error' => $error,
				'edit' => $this->base_model->get_one([$this->entity . '_id' => $id])
			];

			$this->load->vars(array_merge($default_vars, $this->additional_vars));
			$this->template->load('default', 'page/edit_' . $this->entity, null);
		}
	}

	private function _redirect($message = null)
	{
		$this->session->set_flashdata('message', $message);
		redirect($this->module . '/' . $this->entity . '/data');
	}
}
