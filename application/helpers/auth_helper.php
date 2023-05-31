<?php

defined('BASEPATH') or exit('No direct script allowed!');

function check_login(){
	$CI = &get_instance();
	$email = $CI->session->email;

	if ($email == null){
		$CI->session->set_flashdata('message', "<div class='alert alert-danger'>Please login first</div>");

		redirect('auth/login');
	}
}
