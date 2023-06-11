<?php


defined('BASEPATH') or exit('No direct script allowed!');

class User extends CI_Controller{
	public function index(){
		$this->load->helper('auth_helper');
		check_login();

		$user_per_page = 5;
		$current_page = $this->input->get('page');
		if (!isset($current_page)){
			$current_page = 1;
		}
		$limit = $user_per_page;
		$offset = ($current_page - 1) * $user_per_page;
		$total_user =  $this->M_User->get_count_user();
		$total_page = ceil($total_user / $user_per_page);

		$data['p_user'] = true;
		$data['users'] = $this->M_User->get_user($limit, $offset);
		$data['total_page'] = $total_page;
		$data['active_page'] = $current_page;
		$this->template->load('back/template', 'back/user/user', $data);
	}

	function setting_user($id_user){
		$data['p_user'] = true;
		$data['user'] = $this->M_User->get_user_by_id($id_user);
		$this->template->load('back/template', 'back/user/setting_user', $data);
	}

	function process_change_role(){
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'role' => $this->input->post('role')
		);
		$this->M_User->update_role_by_id($data);
		$this->session->set_flashdata('message', '<div class="alert alert-info">Role Updated!</div>');
		redirect('user', 'refresh');
	}
}
