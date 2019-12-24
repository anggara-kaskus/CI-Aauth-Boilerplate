<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aauthgroup extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(): void
	{
		$this->_redirect();
	}

	public function data(): void
	{
		$this->_redirect_list();
	}

	public function add(): void
	{
		if ($this->input->post()) {
			if (!$this->post_validate()) {
				$this->_redirect_form_add(validation_errors());

				return;
			}
			if (!$this->post_save()) {
				$error = $this->aauth->print_infos();
				$error .= $this->aauth->print_errors();
				$this->_redirect_form_add($error);

				return;
			}
			$this->_redirect('save successfully');
		} else {
			$this->_redirect_form_add();
		}
	}

	public function edit($id = null, $slug = null): void
	{
		if (null == $id) {
			$this->_redirect();
		}
		$perms_edit = (array) $this->aauth->get_group_perms($id);
		$perms_array = [];
		foreach ($perms_edit as $k1 => $v1) {
			$perms_array[] = $v1->id;
		}

		if ($this->input->post()) {
			if (!$this->post_validate()) {
				$this->_redirect_form_edit(validation_errors(), $id, $slug, $perms_array);

				return;
			}
			if (!$this->post_update($id, $perms_array)) {
				$error = $this->aauth->print_infos();
				$error .= $this->aauth->print_errors();
				$this->_redirect_form_edit($error, $id, $slug, $perms_array);

				return;
			}

			$this->_redirect('edit successfully');
		} else {
			$this->_redirect_form_edit(null, $id, $slug, $perms_array);
		}
	}

	public function post_validate()
	{
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('definition', 'definition', 'required');

		if (false == $this->form_validation->run()) {
			return false;
		}

		return true;
	}

	public function post_save()
	{
		if (!$this->aauth->create_group(
			$this->input->post('name'),
			$this->input->post('definition')
		)) {
			return false;
		}
		foreach ($this->input->post('perms') as $value) {
			$this->aauth->allow_group($this->input->post('name'), $value);
		}

		return true;
	}

	public function post_update($id = null, $perms_array = null)
	{
		if (null == $id) {
			return false;
		}

		if (!$this->aauth->update_group(
			$id,
			$this->input->post('name'),
			$this->input->post('definition')
		)) {
			return false;
		}

		$perms = $this->aauth->list_perms();
		foreach ($perms as $k => $v) {
			$this->aauth->deny_group($id, $perms[$k]->name);
		}

		foreach ($this->input->post('perms') as $value) {
			$this->aauth->allow_group($id, $value);
		}

		return true;
	}

	public function delete($id = null): void
	{
		if (null == $id) {
			return;
		}
		$delete = $this->aauth->delete_group($id);
		if (!$delete) {
			return;
		}
		$this->_redirect('delete permantly successfully');
	}

	public function _redirect_list(): void
	{
		$this->load->vars([
			'title_page' => 'Group List',
			'data' => $this->aauth->list_groups()
		]);
		$this->template->load('default', 'aauth/group_list', null);
	}

	public function _redirect_form_add($error = null): void
	{
		$this->load->vars([
			'title_page' => 'Group Add',
			'action' => '/aauthgroup/add',
			'error' => $error,
			'perms' => $this->aauth->list_perms()
		]);
		$this->template->load('default', 'aauth/group_form', null);
	}

	public function _redirect_form_edit($error = null, $id = null, $slug = null, $perms_array = null): void
	{
		$this->load->vars([
			'title_page' => 'Group Edit ' . ucwords(str_replace('-', ' ', $slug)),
			'action' => '/aauthgroup/edit/' . $id . '/' . $slug,
			'error' => $error,
			'edit' => ['name' => $this->aauth->get_group_name($id),
				'definition' => $this->aauth->get_group($id)->definition],
			'perms' => $this->aauth->list_perms(),
			'perms_edit' => $perms_array
		]);
		$this->template->load('default', 'aauth/group_form', null);
	}

	public function _redirect($message = null): void
	{
		$this->session->set_flashdata('message', $message);
		redirect('/aauthgroup/data');
	}
}
