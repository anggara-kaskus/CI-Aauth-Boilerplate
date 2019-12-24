<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aauthlogin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(): void
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->run();
			if (!$this->aauth->login(
				$this->input->post('username'),
				$this->input->post('password'),
				(bool) $this->input->post('remember')
			)) {
				$this->template->load('default_login', 'aauth/login', null);

				return;
			}
			redirect('/', 'refresh');
		} else {
			$this->template->load('default_login', 'aauth/login', null);
		}
	}
}
