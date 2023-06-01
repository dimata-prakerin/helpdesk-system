<?php

defined('BASEPATH') or exit('No direct script allowed!');
class Ticket extends CI_Controller
{
	public function index(){
		$this->load->helper('auth_helper');
		check_login();

		$this->session->set_userdata('history', false);
		$this->session->set_userdata('master_ticket', true);

		$ticket_per_page = 5;
		$current_page = $this->input->get('page');
		if (!isset($current_page)){
			$current_page = 1;
		}
		$limit = $ticket_per_page;
		$offset = ($current_page - 1) * $ticket_per_page;
		$total_ticket =  $this->M_Ticket->get_count_ticket();
		$total_page = ceil($total_ticket / $ticket_per_page);

		$data['p_ticket'] = true;
		$data['ticket'] = $this->M_Ticket->get_ticket($limit, $offset);
		$data['total_page'] = $total_page;
		$data['active_page'] = $current_page;

		$result = array();
		$counter = 0;
		foreach ($data['ticket'] as $t) {
			$temp = array();
			$assignee = $this->M_Ticket->get_assignee_name_from_id_ticket($t->id_ticket);
			$innerCounter = 0;
			foreach ($assignee as $a){
				$temp[$innerCounter] = $a;
				$innerCounter++;
			}
			$result[$counter] = $temp;
			$counter++;
		}
		$data['assignee'] = $result;

		$this->template->load('back/template', 'back/ticket/ticket', $data);
	}

	function new_ticket(){
		$this->load->helper('auth_helper');
		check_login();
		$data['p_new_ticket'] = true;
		$this->template->load('back/template', 'back/ticket/new_ticket', $data);
	}

	function detail_ticket($id_ticket){
		$this->load->helper('auth_helper');
		check_login();

		if($this->session->history == true){
			$data['p_history_ticket'] = true;

		}else{
			$data['p_ticket'] = true;
		}
		$ticket = $this->M_Ticket->get_ticket_by_id($id_ticket);
		$data['ticket'] = $ticket[0];
		if (($this->session->id_user != $data['ticket']->id_user) && $this->session->role == 0){
			redirect('ticket/history_ticket', 'refresh');
		}else {
			$this->template->load('back/template', 'back/ticket/detail_ticket', $data);
		}
	}


	function history_ticket(){
		$this->load->helper('auth_helper');
		check_login();

		$this->session->set_userdata('history', true);
		$this->session->set_userdata('master_ticket', false);

		$ticket_per_page = 5;
		$current_page = $this->input->get('page');
		if (!isset($current_page)){
			$current_page = 1;
		}
		$limit = $ticket_per_page;
		$offset = ($current_page - 1) * $ticket_per_page;
		$total_ticket =  $this->M_Ticket->get_count_ticket_by_user($this->session->id_user);
		$total_page = ceil($total_ticket / $ticket_per_page);


		$data['p_history_ticket'] = true;
		$data['ticket'] = $this->M_Ticket->get_ticket_by_user($this->session->id_user, $limit, $offset);
		$data['total_page'] = $total_page;
		$data['active_page'] = $current_page;
		$this->template->load('back/template', 'back/ticket/history_ticket', $data);
	}

	function submit_ticket(){
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		$this->form_validation->set_message('required', '{field} cannot be empty');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');


		if ($this->form_validation->run()){
			$data = array(
				'subject' => $this->input->post('subject'),
				'status' => 0,
				'id_user' => $this->session->id_user,
				'message' => $this->input->post('message')
			);
			$this->M_Ticket->insert($data);

			$this->session->set_flashdata('message', '<div class="alert alert-info">Ticket Created!</div>');

			redirect('ticket/new_ticket','refresh');
		}else{
			$this->load->view('ticket/new_ticket');
		}
	}

	function manage_ticket(){
		$this->load->helper('auth_helper');
		check_login();

		$data['p_manage_ticket'] = true;
		$data['ticket'] = $this->M_Ticket->get_ticket_by_assignee($this->session->id_user);
		$this->template->load('back/template', 'back/ticket/manage_ticket', $data);
	}
}
