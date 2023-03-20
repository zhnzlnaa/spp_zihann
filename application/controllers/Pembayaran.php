<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	function __construct(){
		parent::__construct();
		//validasi jika user belum login
		if($this->session->userdata('masuk') != TRUE){
				$url=base_url().'login/';
				redirect($url);
		}
		$this->load->model('M_pembayaran');
	}
	
	public function index(){
		$cek_user_level = $this->session->userdata('akses');
		
		if($cek_user_level == 'admin' or $cek_user_level == 'petugas'){
			$data['siswa'] = $this->M_pembayaran->carisiswa();
			$this->load->view('v_pembayaran',$data);
		}
		else{
			redirect('notfound');
		}
	}
	
	public function form(){
		$cek_user_level = $this->session->userdata('akses');
		$cek_user_id = $this->session->userdata('ses_id');
		
		if($cek_user_level == 'admin' or $cek_user_level == 'petugas'){
			if($this->input->post('proses')){
				$this->form_validation->set_rules('bulan', 'Bulan Dibayar', 'required|min_length[2]|max_length[9]|alpha');
				if ($this->form_validation->run() == TRUE){
					$nisn = $this->input->post('idnisn');
					$tahun = $this->input->post('idtahun');
					$bulan = $this->input->post('bulan');
					$cekbayar = $this->M_pembayaran->cekbayar($nisn,$tahun,$bulan);
					if($cekbayar['result'] == "success"){
						//masukkan data POST ke dalam variabel $array
						$usernya = $cek_user_id;
						$tgl_sekarang = date("Ymd");
						
						$array = array(
								'id_petugas'=>$usernya,
								'nisn'=>$this->input->post('idnisn'),
								'tgl_bayar'=>$tgl_sekarang,
								'bulan_dibayar'=>$this->input->post('bulan'),
								'tahun_dibayar'=>$this->input->post('idtahun'),
								'id_spp'=>$this->input->post('idspp'),
								'jumlah_bayar'=>$this->input->post('idnominal'),
						);
						//panggil method insert pada Model Madmin_spanduk
						$this->M_pembayaran->insert($array);
						//kembali ke daftar tabel
						$url=base_url().'pembayaran/form/'.$this->input->post('idnisn');
						redirect($url);
					}
					else{
						$data['message'] = $cekbayar['pesannya'];
						//masukkan data POST ke dalam variabel $array
						$usernya = $cek_user_id;
						$data['siswa'] = $this->M_pembayaran->carisiswa();
						$cnisn = $this->uri->segment(3);
						$data['satu'] = $this->M_pembayaran->getwhere(array('nisn'=>$this->uri->segment(3)))->row_array();
						$data['databayar'] = $this->M_pembayaran->databayar($cnisn);
						$tgl_sekarang = date("Ymd");
						$this->load->view('v_pembayaranform',$data);
					}
				}
				else{
					//masukkan data POST ke dalam variabel $array
					$usernya = $cek_user_id;
					$data['siswa'] = $this->M_pembayaran->carisiswa();
					$cnisn = $this->uri->segment(3);
					$data['satu'] = $this->M_pembayaran->getwhere(array('nisn'=>$this->uri->segment(3)))->row_array();
					$data['databayar'] = $this->M_pembayaran->databayar($cnisn);
					$tgl_sekarang = date("Ymd");
					$this->load->view('v_pembayaranform',$data);
				}
			}
			else{
				$usernya = $cek_user_id;
				$data['siswa'] = $this->M_pembayaran->carisiswa();
				$cnisn = $this->uri->segment(3);
				//id diambil dari URL SEGMENT 3
				$data['satu'] = $this->M_pembayaran->getwhere(array('nisn'=>$this->uri->segment(3)))->row_array();
				$data['databayar'] = $this->M_pembayaran->databayar($cnisn);
				$this->load->view('v_pembayaranform',$data);
			}
		}
		else{			
			redirect('notfound');
		}
	}
	
	function kwitansi($slug){ //fungsi untuk menampilkan detail kwitansi
		$cek_user_level = $this->session->userdata('akses');
		if($cek_user_level == 'admin' or $cek_user_level == 'petugas'){
			$sql=$this->M_pembayaran->get_kwitansi_by_slug($slug);
			if($sql->num_rows() > 0){
					
				//tampil kwitansi
				$data['kwitansi']= $sql;
					
				$this->load->view('v_pembayarankwitansi',$data);
			}
			else{
				//jika data tidak ditemukan, maka kembali ke blog
				redirect('home');
			}
		}
		else{			
			redirect('notfound');
		}
	}
}