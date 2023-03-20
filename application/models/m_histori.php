<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_histori extends CI_Model {
	
	//tampilkan data siswa
	public function datasiswa($cek_user_nisn){
		//ambil data sesuai kriteria pada tabel siswa
		$this->db->select('siswa.nisn, siswa.nis, siswa.nama, kelas.nama_kelas, kelas.kompetensi_keahlian');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
		$this->db->where('nisn', $cek_user_nisn);
		return $this->db->get();
	}
	
	//tampilkan tabel pembayaran
	public function databayar($cek_user_nisn){
		//ambil data pembayaran
		$this->db->select('pembayaran.id_pembayaran, pembayaran.tgl_bayar, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, petugas.nama_petugas, pembayaran.jumlah_bayar');
		$this->db->from('pembayaran');
		$this->db->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas');
		$this->db->where('nisn', $cek_user_nisn);
		$this->db->order_by('tgl_bayar', 'DESC');
		return $this->db->get();
	}
	
	//tampilkan kwitansi detail
	public function get_kwitansi_by_slug($slug){
		//ambil data tabel berita
		$hsl = $this->db->query("SELECT pembayaran.id_pembayaran, siswa.nisn, siswa.nis, siswa.nama, kelas.nama_kelas, kelas.kompetensi_keahlian, pembayaran.tgl_bayar, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, pembayaran.jumlah_bayar, petugas.nama_petugas
								FROM pembayaran, siswa, petugas, kelas
								WHERE pembayaran.nisn = siswa.nisn AND
									  pembayaran.id_petugas = petugas.id_petugas AND
									  siswa.id_kelas = kelas.id_kelas AND
									  pembayaran.id_pembayaran = '$slug'");
		return $hsl;
	}

}