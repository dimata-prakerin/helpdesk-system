<?php

defined('BASEPATH') or exit('No direct script allowed');

class M_User extends CI_Model
{
	function insert($data)
	{
		$this->db->insert('user', $data);
	}

	function get_email($email){
		$this->db->where('email', $email);
		return $this->db->get('user')->row();
	}

	function get_count_user(){
		return $this->db->get('user')->num_rows();
	}

	function get_user($limit = null, $offset = null){
		return $this->db->get('user', $limit, $offset)->result();
	}

	function get_user_by_id($id_user){
		$this->db->select("*");
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		return $this->db->get()->result();
	}

	function update_role_by_id($data){
		$this->db->set('role', $data['role']);
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user');
	}
}
