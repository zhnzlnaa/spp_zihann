<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datakelas extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		//validasi jika user belum login
		if($this->session->userdata('masuk') != TRUE){
				$url=base_url().'login';
				redirect($url);
		}
		$this->load->model('M_datakelas');
	}
	
	public function index(){
		$cek_user_level = $this->session->userdata('akses');
		
		if($cek_user_level == 'admin'){
			$data['semua'] = $this->M_datakelas->all();
			$this->load->view('v_datakelas',$data);
		}
		else{
			redirect('notfound');
		}
	}
	
	public function form(){
		$cek_user_level = $this->session->userdata('akses');
		
		if($cek_user_level == 'admin'){
			$this->form_validation->set_rules('namakelas', 'Nama Kelas', 'required|min_length[2]|max_length[10]');
			$this->form_validation->set_rules('komli', 'Kompetensi Keahlian', 'required|min_length[2]|max_length[50]');
			if ($this->form_validation->run() == TRUE){
				//masukkan data POST ke dalam variabel $array
				$array = array(
							'nama_kelas'=>$this->input->post('namakelas'),
							'kompetensi_keahlian'=>$this->input->post('komli'),
				);
				//panggil method insert pada Model M_datakelas
				$this->M_datakelas->insert($array);
				//kembali ke daftar tabel
				$url=base_url().'datakelas/';
				redirect($url);
			}
			else{
				$data['satu'] = array(
							'nama_kelas'=>$this->input->post('namakelas'),
							'kompetensi_keahlian'=>$this->input->post('komli'),
				);
				//panggil validation
				$this->load->view('v_datakelasform',$data);
			}
		}
		else{
			redirect('notfound');
		}
	}
	
	public function formedit(){
		$cek_user_level = $this->session->userdata('akses');
		
		if($cek_user_level == 'admin'){
			//jika form disubmit
			if($this->input->post('ubah')){
				$this->form_validation->set_rules('namakelas', 'Nama Kelas', 'required|min_length[2]|max_length[10]');
				$this->form_validation->set_rules('komli', 'Kompetensi Keahlian', 'required|min_length[2]|max_length[50]');
				
				if ($this->form_validation->run() == TRUE){
					//masukkan data POST ke dalam variabel $array
					$array = array(
								'nama_kelas'=>$this->input->post('namakelas'),
								'kompetensi_keahlian'=>$this->input->post('komli'),
					);
					//panggil method insert pada Model M_datakelas
					$this->M_datakelas->update($array,array('id_kelas'=>$this->input->post('idkelas')));
					//kembali ke daftar tabel
					$url=base_url().'datakelas/';
					redirect($url);
				}
				else{
					$datakosong = "";
					$data['satu'] = array(
								'id_kelas'=>$this->input->post('idkelas'),
								'nama_kelas'=>$this->input->post('namakelas'),
								'kompetensi_keahlian'=>$this->input->post('komli'),
					);
					$this->load->view('v_datakelasformedit',$data);
				}
			}
			else{
				//id diambil dari URL SEGMENT 3
				$data['satu'] = $this->M_datakelas->getwhere(array('id_kelas'=>$this->uri->segment(3)))->row_array();
				$this->load->view('v_datakelasformedit',$data);
			}
		}
		else{
			redirect('notfound');
		}
	}
	
	public function hapus(){
		//Cek User
		$cek_user_level = $this->session->userdata('akses');
		
		if($cek_user_level == 'admin'){
			//jika telah diset URI SEGMENT 3 (id kelas) maka hapus data sesuai id yang diset
			//dengan memanggil method model M_datakelas
			if($this->uri->segment(3)) $this->M_datakelas->delete(array('id_kelas'=>$this->uri->segment(3)));
			//kembali ke daftar tabel
			$url=base_url().'datakelas/';
			redirect($url);
		}
		else{
			redirect('notfound');
		}
	}
}