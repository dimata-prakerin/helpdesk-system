<?php

defined('BASEPATH') or exit('No direct script allowed!');

class Assignee extends CI_Controller
{
	function process_update()
	{
		for ($i = 0; $i < 3; $i++) {
			$name = 'admin' . $i;
			if ($this->input->post($name) !== "") {
				$data = array(
					'id_ticket' => $this->input->post('id_ticket'),
					'id_assignee' => $this->input->post($name),
					'level' => $i + 1
				);
				$this->M_Assignee->update_if_exist($data);
			}else{
				$data = array(
					'id_ticket' => $this->input->post('id_ticket'),
					'level' => $i + 1
				);
				$this->M_Assignee->delete_if_exist($data);
			}
		}
		$this->session->set_flashdata('message', '<div class="alert alert-info">Assignee Updated!</div>');

		$status = $this->M_Ticket->get_status_by_id($this->input->post('id_ticket'));
		if ($status[0]->status != 2){
			$count = $this->M_Assignee->count_assignee($this->input->post('id_ticket'));
			if ($count == 0){
				$this->M_Ticket->update_status_by_id($this->input->post('id_ticket'), 0);
			}else{
				$this->M_Ticket->update_status_by_id($this->input->post('id_ticket'), 1);
			}
		}
		redirect('ticket', 'refresh');
	}
}
