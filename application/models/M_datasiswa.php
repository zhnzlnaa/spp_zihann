<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datasiswa extends CI_Model {
	
	public function all(){
		//ambil semua data tabel siswa
		$this->db->select('siswa.nisn, siswa.nis, siswa.nama, kelas.nama_kelas, siswa.alamat, siswa.no_telp, spp.tahun');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
		$this->db->join('spp', 'spp.id_spp = siswa.id_spp');
		$this->db->order_by('nis', 'DESC');
		return $this->db->get();
	}
	
	//tampilkan tabel kelas
	public function allkelas(){
		//ambil semua data tabel kelas
		return $this->db->get('kelas');
	}
	
	//tampilkan tabel spp
	public function allspp(){
		//ambil semua data tabel spp
		return $this->db->get('spp');
	}
	
	public function insert($data){
		// melakukan insert ke tabel siswa
		return $this->db->insert('siswa',$data);
	}
	
	public function getwhere($where){
		//ambil data sesuai kriteria pada tabel siswa
		$this->db->where($where);
		return $this->db->get('siswa');
	}
	
	public function update($data,$where){
		//melakukan update ke tabel siswa
		$this->db->where($where);
		return $this->db->update('siswa',$data);
	}
	
	public function delete($where){
		//menghapus data pada tabel siswa sesuai kriteria
		return $this->db->delete('siswa',$where);
	}
}