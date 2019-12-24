<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aauthprofile extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(): void
	{
		$id = $this->aauth->get_user()->id;

		if ($this->input->post()) {
			if ($this->input->post('password') && !$this->post_validate_update()) {
				$this->_redirect_form_edit(strip_tags(validation_errors()), null, $id);

				return;
			}

			if (!$this->post_update($id)) {
				$this->_redirect_form_edit('Gagal mengupdate profile', null, $id);

				return;
			}

			$this->_redirect_form_edit(null, 'Berhasil mengupdate profile', $id);
		} else {
			$this->_redirect_form_edit(null, null, $id);
		}
	}

	public function post_validate_update()
	{
		$this->form_validation->set_rules('password', 'Password Baru', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('password_repeat', 'Ulangi Password Baru', 'required|trim|min_length[6]|matches[password]');
		if (false == $this->form_validation->run()) {
			return false;
		}

		return true;
	}

	public function post_update($id)
	{
		if (empty($id)) {
			return false;
		}

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$name = $this->input->post('name');

		$this->aauth->update_user($id, $email, $password, $name);

		return true;
	}

	public function _redirect_form_edit($error = null, $success = null, $id = null): void
	{
		$this->load->vars([
			'error' => json_encode($error),
			'success' => $success,
			'edit' => $this->aauth->get_user($id),
		]);
		$this->template->load('default', 'aauth/user_form', null);
	}
}
