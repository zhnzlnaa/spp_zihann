<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Histori extends CI_Controller {

	function __construct(){
		parent::__construct();
		//validasi jika user belum login
		if($this->session->userdata('masuk') != TRUE){
				$url=base_url().'login/';
				redirect($url);
		}
		$this->load->model('M_histori');
	}
	
	public function index(){
		$cek_user_level = $this->session->userdata('akses');
		$cek_user_nisn = $this->session->userdata('ses_id');
		
		if($cek_user_level == 'siswa'){
			//id diambil dari URL SEGMENT 3
			$data['satu'] = $this->M_histori->datasiswa($cek_user_nisn)->row_array();
			$data['databayar'] = $this->M_histori->databayar($cek_user_nisn);
			$this->load->view('v_histori',$data);
		}
		else{
			redirect('notfound');
		}
	}
}