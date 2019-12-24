<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Aauthlogout extends CI_Controller
{
	public function index(): void
	{
		$this->aauth->logout();
		redirect('/aauthlogin', 'refresh');
	}
}
