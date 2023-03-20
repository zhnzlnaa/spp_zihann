<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datapetugas extends CI_Model {
	
	//tampilkan tabel
	public function all(){
		//ambil semua data tabel petugas
		return $this->db->get('petugas');
	}
	
	public function insert($data){
		// melakukan insert ke tabel petugas
		return $this->db->insert('petugas',$data);
	}
	
	public function getwhere($where){
		//ambil data sesuai kriteria pada tabel petugas
		$this->db->where($where);
		return $this->db->get('petugas');
	}
	
	public function update($data,$where){
		//melakukan update ke tabel petugas
		$this->db->where($where);
		return $this->db->update('petugas',$data);
	}
	
	public function delete($where){
		//menghapus data pada tabel petugas sesuai kriteria
		return $this->db->delete('petugas',$where);
	}

}