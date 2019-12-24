<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aauthperms extends MY_Controller
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

		if ($this->input->post()) {
			if (!$this->post_validate()) {
				$this->_redirect_form_edit(validation_errors());

				return;
			}
			if (!$this->post_update($id)) {
				$error = $this->aauth->print_infos();
				$error .= $this->aauth->print_errors();
				$this->_redirect_form_edit($error, $id, $slug);

				return;
			}

			$this->_redirect('edit successfully');
		} else {
			$this->_redirect_form_edit(null, $id, $slug);
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
		if ($this->aauth->create_perm(strtolower($this->input->post('name')), $this->input->post('definition'))) {
			return true;
		}

		return false;
	}

	public function post_update($id = null)
	{
		if (null == $id) {
			return false;
		}
		if ($this->aauth->update_perm($id, strtolower($this->input->post('name')), $this->input->post('definition'))) {
			return true;
		}

		return false;
	}

	public function delete($id = null): void
	{
		if (null == $id) {
			return;
		}
		$delete = $this->aauth->delete_perm($id);
		if (!$delete) {
			return;
		}
		$this->_redirect('delete permantly successfully');
	}

	public function _redirect_list(): void
	{
		$this->load->vars([
			'title_page' => 'Permission List',
			'id' => $this->aauth->get_user_id(),
			'data' => $this->aauth->list_perms()
		]);
		$this->template->load('default', 'aauth/perms_list', null);
	}

	public function _redirect_form_add($error = null): void
	{
		$this->load->vars([
			'title_page' => 'Permission Add',
			'action' => '/aauthperms/add',
			'error' => $error
		]);
		$this->template->load('default', 'aauth/perms_form', null);
	}

	public function _redirect_form_edit($error = null, $id = null, $slug = null): void
	{
		$perm = $this->aauth->get_perm($id);
		$this->load->vars([
			'title_page' => 'Permission Edit ' . ucwords(str_replace('-', ' ', $slug)),
			'action' => '/aauthperms/edit/' . $id . '/' . $slug,
			'error' => $error,
			'edit' => [
				'name' => $perm->name,
				'definition' => $perm->definition
			],
		]);
		$this->template->load('default', 'aauth/perms_form', null);
	}

	public function _redirect($message = null): void
	{
		$this->session->set_flashdata('message', $message);
		redirect('/aauthperms/data');
	}
}
