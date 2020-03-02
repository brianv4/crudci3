<?php 

class M_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('user'); //memanggil data berdasarkan user pada database
	}

	function input_data($data,$table){ 
		$this->db->insert($table,$data); //memasukan data ke database
    }

    function hapus_data($where,$table){ //fungsi menghapus data
		$this->db->where($where);
		$this->db->delete($table); 
    }
    
    function edit_data($where,$table){ // fungsi mengubah data
        return $this->db->get_where($table,$where);
    }

    function update_data($where,$data,$table){ //fungsi memperbarui data
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

}