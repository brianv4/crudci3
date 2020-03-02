<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){ //mengatur sesion login jika username dan password benar maka bisa login
			redirect(base_url("login")); //mengalihkan ke halaman login
		}
	}

	function index(){
		$this->load->view('v_admin'); //memanggil index pada menu view 
	}
}