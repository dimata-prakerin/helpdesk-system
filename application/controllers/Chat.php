<?php

defined('BASEPATH') or exit('No direct script allowed!');

class Chat extends CI_Controller
{
	function process_new_message()
	{
		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		if ($this->input->post('role') == 0){
			$this->session->set_userdata('history', true);
			$this->session->set_userdata('master_ticket', false);
			$this->session->set_userdata('manage_ticket', false);
		}else{
			$this->session->set_userdata('history', false);
			$this->session->set_userdata('master_ticket', false);
			$this->session->set_userdata('manage_ticket', true);
		}

		if ($this->form_validation->run()) {
			$data = array(
				'id_user' => $this->input->post('id_user'),
				'id_ticket' => $this->input->post('id_ticket'),
				'message' => $this->input->post('message')
			);
			$this->M_Chat->insert($data);


			$link = 'ticket/detail_ticket/' . $this->input->post('id_ticket');
			redirect($link, 'refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="text-danger">Message cannot empty!</div>');
			$link = 'ticket/detail_ticket/' . $this->input->post('id_ticket');
			redirect($link, 'refresh');
		}
	}
}
