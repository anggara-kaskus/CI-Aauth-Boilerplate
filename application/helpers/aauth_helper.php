<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
if (!function_exists('acl')) {
	function acl($params)
	{
		$CI = get_instance();
		$CI->aauth->initialize(MODULE_POLIKLINIK);
		if (!$CI->aauth->is_allowed($params)) {
			return ' disabled';
		}
	}
}
if (!function_exists('acl_controller')) {
	function acl_controller($params, $logout_path = '')
	{
		$CI = get_instance();
		if ($CI->aauth->is_allowed($params)) {
			return true;
		} else {
			redirect($logout_path, 'refresh');
			//show_404();
			return;
		}
	}
}
if (!function_exists('acl_admin')) {
	function acl_admin()
	{
		$CI = get_instance();
		if ($CI->aauth->is_admin($CI->aauth->get_user_id())) {
			return true;
		} else {
			return false;
		}
	}
}
if (!function_exists('acl_default')) {
	function acl_default()
	{
		$CI = get_instance();
		if ($CI->aauth->is_default($CI->aauth->get_user_id())) {
			return true;
		} else {
			return false;
		}
	}
}
if (!function_exists('acl_public')) {
	function acl_public()
	{
		$CI = get_instance();
		if ($CI->aauth->is_public($CI->aauth->get_user_id())) {
			return true;
		} else {
			return false;
		}
	}
}
if (!function_exists('acl_user')) {
	function acl_user()
	{
		$CI = get_instance();
		if ($CI->aauth->is_user($CI->aauth->get_user_id())) {
			return true;
		} else {
			return false;
		}
	}
}
if (!function_exists('acl_perms')) {
	function acl_perms($params, $user = false)
	{
		$CI = get_instance();
		if ($CI->aauth->is_allowed($params, $user)) {
			return true;
		} else {
			return false;
		}
	}
}
