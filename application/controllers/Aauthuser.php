<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aauthuser extends MY_Controller
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
				$this->_redirect_form_add('error save, please contact administrator');

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
		$group_saved = $this->aauth->get_user_groups($id)[0]->name;
		if ($this->input->post()) {
			if (null != $this->input->post('password')) {
				if (!$this->post_validate_update()) {
					$this->_redirect_form_edit(validation_errors(), $id, $slug, $group_saved);

					return;
				}
			}
			if (!$this->post_update($id, $group_saved)) {
				$this->_redirect_form_edit('error update, please contact administrator', $id, $slug, $group_saved);

				return;
			}
			$this->_redirect('edit successfully');
		} else {
			$this->_redirect_form_edit(null, $id, $slug, $group_saved);
		}
	}

	public function post_validate()
	{
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]|max_length[50]|alpha_numeric');
		$this->form_validation->set_rules('password_repeat', 'password repeat', 'required|trim|min_length[3]|max_length[50]|matches[password]');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('group', 'group', 'required');
		if (false == $this->form_validation->run()) {
			return false;
		}

		return true;
	}

	public function post_validate_update()
	{
		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]|max_length[50]|alpha_numeric');
		$this->form_validation->set_rules('password_repeat', 'password repeat', 'required|trim|min_length[3]|max_length[50]|matches[password]');
		if (false == $this->form_validation->run()) {
			return false;
		}

		return true;
	}

	public function post_save()
	{
		$user_id = $this->aauth->create_user(
			$this->input->post('email'),
			$this->input->post('password'),
			$this->input->post('name')
		);
		if (!$user_id) {
			return false;
		}

		if ($this->aauth->add_member($user_id, $this->input->post('group'))) {
			return true;
		}

		return false;
	}

	public function post_update($id = null, $group_saved = null)
	{
		if (null == $id) {
			return false;
		}

		if (!$this->aauth->update_user(
			$id,
			(null == $this->input->post('email') ? false : $this->input->post('email')),
			(null == $this->input->post('password') ? false : $this->input->post('password')),
			$this->input->post('name')
		)) {
			return false;
		}

		$this->aauth->remove_member($id, $group_saved);

		if ($this->aauth->add_member($id, $this->input->post('group'))) {
			return true;
		}

		return false;
	}

	public function delete($id = null): void
	{
		if (null == $id) {
			return;
		}

		$delete = $this->aauth->delete_user($id);
		if (!$delete) {
			return;
		}

		$delete_data = $this->sk_model->user_data_delete(['user_id' => $id]);
		if (!$delete_data) {
			return;
		}
		$this->_redirect('delete permantly successfully');
	}

	public function banned($id = null, $banned = null): void
	{
		if (null == $id | null == $banned) {
			return;
		}
		if (0 == $banned) {
			$this->aauth->ban_user($id);
			// success
			$this->_redirect('user has banned');
		} else {
			$this->aauth->unban_user($id);
			$this->_redirect('user has unbanned');
		}
	}

	public function _redirect_list(): void
	{
		$this->load->vars([
			'title_page' => 'User List',
			'data' => $this->aauth->list_users(false, false, false, true)
		]);
		$this->template->load('default', 'aauth/user_list', null);
	}

	public function _redirect_form_add($error = null): void
	{
		$this->load->vars([
			'title_page' => 'User Add',
			'action' => '/aauthuser/add',
			'error' => $error,
			'groups' => $this->aauth->list_groups()
		]);
		$this->template->load('default', 'aauth/user_form', null);
	}

	public function _redirect_form_edit($error = null, $id = null, $slug = null, $group_saved = null): void
	{
		$this->load->vars([
			'title_page' => 'User Edit ' . ucwords(str_replace('-', ' ', $slug)),
			'action' => '/aauthuser/edit/' . $id . '/' . $slug,
			'error' => $error,
			'edit' => $this->aauth->get_user($id),
			'groups' => $this->aauth->list_groups()
		]);
		$this->template->load('default', 'aauth/user_form', null);
	}

	public function _redirect($message = null): void
	{
		$this->session->set_flashdata('message', $message);
		redirect('/aauthuser/data');
	}
}
