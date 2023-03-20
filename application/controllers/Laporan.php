<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
		parent::__construct();
		//validasi jika user belum login
		if($this->session->userdata('masuk') != TRUE){
				$url=base_url().'login/';
				redirect($url);
		}
		$this->load->model('M_laporan');
	}
	
	public function index(){
		$cek_user_level = $this->session->userdata('akses');
		
		if($cek_user_level == 'admin'){
			if($this->input->post('tampilkan')){
				$idtahun = $this->input->post('pilihtahun');
				$idbulan = $this->input->post('pilihbulan');
				
				if($idbulan==""){
					$data['judullap'] = array('pesan'=>'TAHUN '.$idtahun);
					$data['laporan'] = $this->M_laporan->tampilall($idtahun);
					$data['sum'] = $this->M_laporan->sum($idtahun);
					$this->load->view('v_laporancetak',$data);
				}
				else{
					$data['judullap'] = array('pesan'=>'BULAN '.strtoupper($idbulan).' TAHUN '.$idtahun);
					$data['laporan'] = $this->M_laporan->tampilper($idtahun,$idbulan);
					$data['sum'] = $this->M_laporan->sumper($idtahun,$idbulan);
					$this->load->view('v_laporancetak',$data);
				}
			}
			else{
				$data['tahun'] = $this->M_laporan->caritahun();
				$this->load->view('v_laporan',$data);
			}
		}
		else{
			redirect('notfound');
		}
	}
	
}