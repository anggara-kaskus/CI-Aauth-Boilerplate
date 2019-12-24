<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{
	public function index()
	{
		$data['message'] = 'Welcome';

		$this->template->load('default', 'page/dashboard', $data);
	}
}
