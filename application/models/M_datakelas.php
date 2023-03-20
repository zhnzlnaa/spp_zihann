<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datakelas extends CI_Model {
	
	//tampilkan tabel
	public function all(){
		//ambil semua data tabel kelas
		return $this->db->get('kelas');
	}
	
	public function insert($data){
		// melakukan insert ke tabel kelas
		return $this->db->insert('kelas',$data);
	}
	
	public function getwhere($where){
		//ambil data sesuai kriteria pada tabel kelas
		$this->db->where($where);
		return $this->db->get('kelas');
	}
	
	public function update($data,$where){
		//melakukan update ke tabel kelas
		$this->db->where($where);
		return $this->db->update('kelas',$data);
	}
	
	public function delete($where){
		//menghapus data pada tabel kelas sesuai kriteria
		return $this->db->delete('kelas',$where);
	}

}