<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasiswa extends CI_Controller {

	function __construct(){
		parent::__construct();
		//validasi jika user belum login
		if($this->session->userdata('masuk') != TRUE){
				$url=base_url().'login';
				redirect($url);
		}
		$this->load->model('M_datasiswa');
	}
	
	public function index()
	{
		$cek_user_level = $this->session->userdata('akses');
		
		if($cek_user_level == 'admin'){
			$data['semua'] = $this->M_datasiswa->all();
			$this->load->view('v_datasiswa',$data);
		}
		else{
			redirect('notfound');
		}
	}
	
	public function form(){
		$cek_user_level = $this->session->userdata('akses');
		
		if($cek_user_level == 'admin'){
			$this->form_validation->set_rules('nisn', 'NISN', 'required|min_length[2]|max_length[10]|numeric');
			$this->form_validation->set_rules('nis', 'NIS', 'required|min_length[2]|max_length[8]|numeric');
			$this->form_validation->set_rules('nama', 'Nama Siswa', 'required|min_length[2]|max_length[35]');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[2]');
			$this->form_validation->set_rules('notelp', 'No Telp', 'required|min_length[2]|max_length[13]');
			if ($this->form_validation->run() == TRUE){
				//masukkan data POST ke dalam variabel $array
				$array = array(
							'nisn'=>$this->input->post('nisn'),
							'nis'=>$this->input->post('nis'),
							'nama'=>$this->input->post('nama'),
							'id_kelas'=>$this->input->post('kelas'),
							'alamat'=>$this->input->post('alamat'),
							'no_telp'=>$this->input->post('notelp'),
							'id_spp'=>$this->input->post('spp'),
				);
				//panggil method insert pada Model M_datasiswa
				$this->M_datasiswa->insert($array);
				//kembali ke daftar tabel
				$url=base_url().'datasiswa/';
				redirect($url);
			}
			else{
				$data['kelas'] = $this->M_datasiswa->allkelas();
				$data['spp'] = $this->M_datasiswa->allspp();
				
				//bagian penting pada kelas supaya combobox tidak default
				$kelas = $this->input->post('kelas');
				if (!empty($this->input->post('kelas'))){
					$isikelas = $kelas;
				}
				else{
					$isikelas = "";
				}
				
				//bagian penting pada spp supaya combobox tidak default
				$spp = $this->input->post('spp');
				if (!empty($this->input->post('spp'))){
					$isispp = $spp;
				}
				else{
					$isispp = "";
				}
				
				$data['satu'] = array(
							'nisn'=>$this->input->post('nisn'),
							'nis'=>$this->input->post('nis'),
							'nama'=>$this->input->post('nama'),
							'id_kelas'=>$isikelas,
							'alamat'=>$this->input->post('alamat'),
							'no_telp'=>$this->input->post('notelp'),
							'id_spp'=>$isispp,
				);
				//panggil validation
				$this->load->view('v_datasiswaform',$data);
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
				$this->form_validation->set_rules('nis', 'NIS', 'required|min_length[2]|max_length[8]|numeric');
				$this->form_validation->set_rules('nama', 'Nama Siswa', 'required|min_length[2]|max_length[35]');
				$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[2]');
				$this->form_validation->set_rules('notelp', 'No Telp', 'required|min_length[2]|max_length[13]');
				
				if ($this->form_validation->run() == TRUE){
					//masukkan data POST ke dalam variabel $array
					$array = array(
								'nis'=>$this->input->post('nis'),
								'nama'=>$this->input->post('nama'),
								'id_kelas'=>$this->input->post('kelas'),
								'alamat'=>$this->input->post('alamat'),
								'no_telp'=>$this->input->post('notelp'),
								'id_spp'=>$this->input->post('spp'),
					);
					//panggil method insert pada Model M_datasiswa
					$this->M_datasiswa->update($array,array('nisn'=>$this->input->post('idnisn')));
					//kembali ke daftar tabel
					$url=base_url().'datasiswa/';
					redirect($url);
				}
				else{
					$data['kelas'] = $this->M_datasiswa->allkelas();
					$data['spp'] = $this->M_datasiswa->allspp();
					
					$data['satu'] = array(
								'nisn'=>$this->input->post('idnisn'),
								'nis'=>$this->input->post('nis'),
								'nama'=>$this->input->post('nama'),
								'id_kelas'=>$this->input->post('kelas'),
								'alamat'=>$this->input->post('alamat'),
								'no_telp'=>$this->input->post('notelp'),
								'id_spp'=>$this->input->post('spp'),
					);
					$this->load->view('v_datasiswaformedit',$data);
				}
			}
			else{
				//id diambil dari URL SEGMENT 3
				$data['satu'] = $this->M_datasiswa->getwhere(array('nisn'=>$this->uri->segment(3)))->row_array();
				$data['kelas'] = $this->M_datasiswa->allkelas();
				$data['spp'] = $this->M_datasiswa->allspp();
				$this->load->view('v_datasiswaformedit',$data);
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
			//jika telah diset URI SEGMENT 3 (id buku) maka hapus data sesuai id yang diset
			//dengan memanggil method model M_datasiswa
			if($this->uri->segment(3)) $this->M_datasiswa->delete(array('nisn'=>$this->uri->segment(3)));
			//kembali ke daftar tabel
			$url=base_url().'datasiswa/';
			redirect($url);
		}
		else{
			redirect('notfound');
		}
	}
}