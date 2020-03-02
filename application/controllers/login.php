<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct(); 		
		$this->load->model('m_login'); //memanggil menu pada model m_login

	}

	function index(){
		$this->load->view('v_login'); //memanggil menu pada view v_login
	}

	function aksi_login(){
		$username = $this->input->post('username'); //field untuk memasukan variabel username ke database 
		$password = $this->input->post('password'); //field untuk memasukan variabel password ke database 
		$where = array(
			'username' => $username, //mengatur tipe data pada username 
			'password' => md5($password) //mengaatur tipe data pada password dengan MD5
			);
		$cek = $this->m_login->cek_login("admin",$where)->num_rows(); //memeriksa menu login dengan cek login bersarkan admin
		if($cek > 0){ //memasukan data

			$data_session = array( //sesi data 
				'nama' => $username, //memanggil sesi nama dengan username
				'status' => "login" //memanggil sesi status dengan login
				);

			$this->session->set_userdata($data_session); //proses login 

			redirect(base_url("admin")); //mengalihkan ke halaman admin

		}else{
			echo "Username dan password salah !"; //menampilkan keterangan jika username dan password tidak sesui
		}
	}

	function logout(){
		$this->session->sess_destroy(); //sesi logout , keluar dari login
		redirect(base_url('login')); //beralih ke halaman login kembali
	}
}