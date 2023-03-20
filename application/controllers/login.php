<<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('m_login');
    }

	function index()
	{		
		$data['satu'] = array(
							'username'=>$this->input->post('username'),
							'password'=>$this->input->post('password'),
		);
   
		$this->load->view('v_login', $data);
	}

  	function ceklogin() {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[25]|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[12]|alpha_numeric');
		
		//jika pengecekan form validation benar
		if ($this->form_validation->run() == TRUE){
			
			$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
			$password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
			
			//mengecek username dan password melalui models
			$cek_users=$this->m_login->auth_users($username,$password);
			
			//jika username dan password ketemu sebagai admin atau petugas
			if($cek_users->num_rows() > 0){
				$data=$cek_users->row_array();
				$this->session->set_userdata('masuk',TRUE);
				$this->session->set_userdata('akses',$data['level']);
				$this->session->set_userdata('ses_us',$data['username']);
				$this->session->set_userdata('ses_nama',$data['nama_petugas']);
				$this->session->set_userdata('ses_id',$data['id_petugas']);
				redirect('home');
			}
			else{
				//mengecek siswa melalui models
				$cek_users=$this->m_login->auth_siswa($username);
				//jika data siswa ketemu
				if($password=='siswa' and $cek_users->num_rows() > 0){
					$data=$cek_users->row_array();
					$this->session->set_userdata('masuk',TRUE);
					$this->session->set_userdata('akses','siswa');
					$this->session->set_userdata('ses_us',$data['nis']);
					$this->session->set_userdata('ses_nama',$data['nama']);
					$this->session->set_userdata('ses_id',$data['nisn']);
					redirect('histori');
				}
				//jika username atau password salah (tidak ketemu)
				else{
					$data['satu'] = array(
							'username'=>$this->input->post('username'),
							'password'=>$this->input->post('password'),
					);
				
					//$url=base_url().'ngadminlogin/';
					echo $this->session->set_flashdata('msg','Username Atau Password Salah');
					//redirect($url);
					$this->load->view('v_login', $data);					
				}
			}
		}
		//jika pengecekan form validation salah
		else{			
			$data['satu'] = array(
								'username'=>$this->input->post('username'),
								'password'=>$this->input->post('password'),
			);
				
			$this->load->view('v_login', $data);
		}
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url().'login';
        redirect($url);
    }
}