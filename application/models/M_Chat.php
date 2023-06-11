<?php

defined('BASEPATH') or exit('No direct script allowed');
class M_Chat extends CI_Model{
	function insert($data){
		$this->db->insert('chat', $data);
	}
}
