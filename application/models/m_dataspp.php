<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dataspp extends CI_Model {
	
	//tampilkan tabel
	public function all(){
		//ambil semua data tabel spp
		return $this->db->get('spp');
	}
	
	public function insert($data){
		// melakukan insert ke tabel spp
		return $this->db->insert('spp',$data);
	}
	
	public function getwhere($where){
		//ambil data sesuai kriteria pada tabel spp
		$this->db->where($where);
		return $this->db->get('spp');
	}
	
	public function update($data,$where){
		//melakukan update ke tabel spp
		$this->db->where($where);
		return $this->db->update('spp',$data);
	}
	
	public function delete($where){
		//menghapus data pada tabel spp sesuai kriteria
		return $this->db->delete('spp',$where);
	}

}