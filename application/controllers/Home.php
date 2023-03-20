<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		//validasi jika user belum login
		if($this->session->userdata('masuk') != TRUE){
				$url=base_url().'login';
				redirect($url);
		}
		$this->load->model('M_home');
	}
	
	public function index(){
		$cek_user_level = $this->session->userdata('akses');
		
		if($cek_user_level == 'admin' or $cek_user_level == 'petugas'){
			//data total siswa
			$data['totalsiswa'] = $this->M_home->totalsiswa();
			$data['totalkelas'] = $this->M_home->totalkelas();
			$data['totalpembayaran'] = $this->M_home->totalpembayaran();
			$data['statistik'] = $this->M_home->statpembayar();
			$this->load->view('v_home',$data);
		}
		else{
			redirect('notfound');
		}
	}
	
	
}