<?php
defined('BASEPATH') or exit("No direct script access allowed");

class Auth extends CI_Controller
{
	public function  index(){
		$this->login();
	}

	function login(){
		$this->load->view('back/login');
	}
	function register(){
		$this->load->view('back/register');
	}

	function process_register(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[user.email]|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|matches[password]|required');

		$this->form_validation->set_message('required', '{field} cannot be empty');
		$this->form_validation->set_message('valid_email', '{field} not valid email');
		$this->form_validation->set_message('is_unique', '{field} has been used');



		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if ($this->form_validation->run()){
			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role' => 0,
				'profile' => ""
			);
			$this->M_User->insert($data);

			$this->session->set_flashdata('message', '<div class="alert alert-info">Registration Success</div>');

			redirect('auth/login','refresh');
		}else{
			$this->load->view('back/register');
		}

	}

	function process_login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run()){
			$user = $this->M_User->get_email($this->input->post('email'));
			if (!$user){
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Email not found!</div>');
				redirect('auth/login', 'refresh');
			} else if (!password_verify($this->input->post('password'), $user->password)){
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Password wrong!</div>');
				redirect('auth/login', 'refresh');
			}else{
				$session = array(
					'id_user' => $user->id_user,
					'username' => $user->username,
					'email' => $user->email,
					'role' => $user->role
				);
				$this->session->set_userdata($session);
				$username = $this->session->username;
				$str = '<div class="alert alert-success"> Welcome back ' . $username . '!</div>';
				$this->session->set_flashdata('message', $str);
				redirect('dashboard');
			}
		}else{


		}



	}

	function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');

		$this->session->set_flashdata('message', '<div class="alert alert-info">Logout Success</div>');
		redirect('auth/login');
	}
}
