<?php

defined('BASEPATH') or exit("No direct script access allowed");

class Dashboard extends CI_Controller
{
	public function index()
	{
		$this->load->helper('auth_helper');
		check_login();
		$data['p_dashboard'] = true;

		$data['ticket_pending'] = $this->M_Ticket->get_count_status_ticket(0);
		$data['ticket_progress'] = $this->M_Ticket->get_count_status_ticket(1);
		$data['ticket_finished'] = $this->M_Ticket->get_count_status_ticket(2);
		$data['total_user'] = $this->M_User->get_count_user();

		$this->template->load('back/template', 'back/dashboard', $data);
	}
}
