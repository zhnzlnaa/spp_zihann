<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model {
	
	//tampilkan tabel siswa
	public function carisiswa(){
		$this->db->select('siswa.nisn, siswa.nis, siswa.nama, kelas.nama_kelas');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
		$this->db->order_by('nama', 'ASC');
		return $this->db->get();
	}
	
	public function getwhere($where){
		//ambil data sesuai kriteria pada tabel siswa
		$this->db->select('siswa.nisn, siswa.nis, siswa.nama, kelas.nama_kelas, spp.id_spp, spp.tahun, spp.nominal');
		$this->db->from('siswa');
		$this->db->join('spp', 'spp.id_spp = siswa.id_spp');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
		$this->db->where($where);
		return $this->db->get();
	}
	
	//tampilkan tabel pembayaran
	public function databayar($cnisn){
		//ambil data pembayaran
		$this->db->select('pembayaran.id_pembayaran, pembayaran.tgl_bayar, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, petugas.nama_petugas, pembayaran.jumlah_bayar');
		$this->db->from('pembayaran');
		$this->db->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas');
		$this->db->where('nisn', $cnisn);
		$this->db->order_by('tgl_bayar', 'DESC');
		$this->db->order_by('id_pembayaran', 'DESC');
		return $this->db->get();
	}
	
	public function insert($data){
		// melakukan insert ke tabel pembayaran
		return $this->db->insert('pembayaran',$data);
	}
	
	// Fungsi untuk melakukan proses cek
	public function cekbayar($nisn,$tahun,$bulan){
		$hsl = $this->db->query("SELECT nisn, bulan_dibayar, tahun_dibayar
								FROM pembayaran
								WHERE nisn = '$nisn' AND
								tahun_dibayar = '$tahun' AND
								bulan_dibayar = '$bulan'");
		if($hsl->num_rows() > 0){
			$return = array('result' => 'failed', 'pesannya' => 'GAGAL!!! Siswa sudah membayar untuk bulan '.$bulan);
			return $return;
		}
		else{
			$return = array('result' => 'success', 'pesannya' => 'SUKSES');
			return $return;
		}
	}
	
	//tampilkan kwitansi detail
	public function get_kwitansi_by_slug($slug){
		//ambil data tabel pembayaran
		$hsl = $this->db->query("SELECT pembayaran.id_pembayaran, siswa.nisn, siswa.nis, siswa.nama, kelas.nama_kelas, kelas.kompetensi_keahlian, pembayaran.tgl_bayar, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, pembayaran.jumlah_bayar, petugas.nama_petugas
								FROM pembayaran, siswa, petugas, kelas
								WHERE pembayaran.nisn = siswa.nisn AND
									  pembayaran.id_petugas = petugas.id_petugas AND
									  siswa.id_kelas = kelas.id_kelas AND
									  pembayaran.id_pembayaran = '$slug'");
		return $hsl;
	}

}