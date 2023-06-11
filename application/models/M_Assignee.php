<?php

defined('BASEPATH') or exit('No direct script allowed');
class M_Assignee extends CI_Model{

	function is_exist($id_ticket, $level){
		$this->db->select('id_ticket');
		$this->db->from('assignee');
		$this->db->where('id_ticket', $id_ticket);
		$this->db->where('level', $level);
		return $this->db->get()->num_rows();
	}

	function insert($data){
		$this->db->insert('assignee', $data);
	}

	function update($data){
		$this->db->replace('assignee',$data);
	}

	function update_if_exist($data){
		$isExist = $this->is_exist($data['id_ticket'], $data['level']);
		if ($isExist > 0){
			$this->update($data);
		}else{
			$this->insert($data);
		}
	}

	function delete_if_exist($data)
	{
		$isExist = $this->is_exist($data['id_ticket'], $data['level']);
		if ($isExist > 0){
			$this->delete($data);
		}
	}

	function delete($data){
		$this->db->delete('assignee', array('id_ticket' => $data['id_ticket'], 'level' => $data['level']));
	}


	function count_assignee($id_ticket){
		$this->db->select('id_ticket');
		$this->db->from('assignee');
		$this->db->where('id_ticket', $id_ticket);
		return $this->db->get()->num_rows();
	}


}
