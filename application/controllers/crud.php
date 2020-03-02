<?php 


class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data'); //memnanggil fungsi fungsi pada menu model m_data
		$this->load->helper('url'); //memanggil url

	}

	function index(){
		$data['user'] = $this->m_data->tampil_data()->result(); //menamoilkan hasil pada m_data
		$this->load->view('v_tampil',$data); //memanggil menu view v_tampil
	}

	function tambah(){
		$this->load->view('v_input'); //memanggil pada menu view v_input
	}

	function tambah_aksi(){
		$nama = $this->input->post('nama'); //field untuk memasukan variabel nama ke database 
		$alamat = $this->input->post('alamat'); //field untuk memasukan variabel alamat ke database 
		$pekerjaan = $this->input->post('pekerjaan'); //field untuk memasukan variabel pekerjaan ke database 

		$data = array(
			'nama' => $nama, //mendeklarasikan data nama menjadi variabel nama
			'alamat' => $alamat, //mendeklarasikan data alamat menjadi variabel alamat
			'pekerjaan' => $pekerjaan //mendeklarasikan data pekerjaan menjadi variabel pekerjaan
			);
		$this->m_data->input_data($data,'user'); //input data berdasarkan data ke field user
        redirect('crud/index'); //mengalihkan halaman ke crud/index
        
    }
    function hapus($id){ 
		$where = array('id' => $id); //menghapus item berdasarkan id
		$this->m_data->hapus_data($where,'user'); //menghapus data berdasarkan user
		redirect('crud/index'); //mengalihkan halaman ke crud/index
    }

    function edit($id){
		$where = array('id' => $id); //mengubah item berdasarkan id
		$data['user'] = $this->m_data->edit_data($where,'user')->result(); //mengubah data berdasarkan user  
		$this->load->view('v_edit',$data); //memanggil data pada menu view v_edit
	}

    function update(){
        $id = $this->input->post('id'); //field untuk memasukan variabel id ke database 
        $nama = $this->input->post('nama'); //field untuk memasukan variabel nama ke database 
        $alamat = $this->input->post('alamat'); //field untuk memasukan variabel alamat ke database 
        $pekerjaan = $this->input->post('pekerjaan'); //field untuk memasukan variabel pekerjaan ke database 
    
        $data = array(
            'nama' => $nama, //mendeklarasikan data nama menjadi variabel nama
            'alamat' => $alamat, //mendeklarasikan data alamat menjadi variabel alamat
            'pekerjaan' => $pekerjaan //mendeklarasikan data pekerjaan menjadi variabel pekerjaan
        );
    
        $where = array(
            'id' => $id //memnentukan data berdasarkan id
        );
    
        $this->m_data->update_data($where,$data,'user'); //memperbarui data berdasarkan data pada user
        redirect('crud/index'); //mengalihkan link meenuju crud/index
    }

}