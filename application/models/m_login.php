<?php 

class M_login extends CI_Model{	
	function cek_login($table,$where){		//fungsi cek login berdasarkan database
		return $this->db->get_where($table,$where);
	}	
}