<?php

defined('BASEPATH') or exit('No direct script allowed');

class M_Ticket extends CI_Model
{
	function get_all_ticket(){
		return $this->db->get('ticket')->result();
	}

	function get_count_ticket(){
		return $this->db->get('ticket')->num_rows();
	}

	function get_ticket($limit = null, $offset = null){
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->join('user', 'user.id_user = ticket.id_user');
		$this->db->order_by('created', 'DESC');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	function get_assignee_name_from_id_ticket($id_ticket){
		$this->db->select('user.username');
		$this->db->from('assignee');
		$this->db->join('ticket', 'assignee.id_ticket = ticket.id_ticket ');
		$this->db->join('user', 'user.id_user = assignee.id_assignee');
		$this->db->where('ticket.id_ticket', $id_ticket);
		return $this->db->get()->result();
	}

	function get_count_status_ticket($status){
		return $this->db->get_where('ticket', array('status' => $status))->num_rows();
	}

	function get_ticket_by_id($id_ticket){
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->where('id_ticket', $id_ticket);
		$this->db->join('user', 'user.id_user = ticket.id_user');
		$query = $this->db->get();
		return $query->result();
	}

	function get_ticket_by_user($id_user, $limit, $offset){
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->where('id_user', $id_user);
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	function get_count_ticket_by_user($id_user){
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->where('id_user', $id_user);
		return $this->db->get()->num_rows();
	}

	function get_ticket_by_assignee($id_assignee){
		$this->db->select('ticket.id_ticket, ticket.message, ticket.subject, user.username, ticket.status, user.email');
		$this->db->from('assignee');
		$this->db->join('ticket', 'assignee.id_ticket = ticket.id_ticket');
		$this->db->join('user', 'user.id_user = ticket.id_user');
		$this->db->where('assignee.id_assignee', $id_assignee);
		$this->db->order_by('status', 'ASC');
		return $this->db->get()->result();
	}

	function insert($data){
		$this->db->insert('ticket', $data);
	}
}
