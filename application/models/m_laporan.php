<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {
	
	//tampilkan laporan
	public function caritahun(){
		//ambil semua data tabel spp
		return $this->db->get('spp');
	}
	
	//tampilkan laporan tahunan
	public function tampilall($idtahun){
		//ambil data pembayaran
		$this->db->select('pembayaran.tgl_bayar, pembayaran.id_pembayaran, siswa.nisn, siswa.nis, siswa.nama, kelas.nama_kelas, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, pembayaran.jumlah_bayar');
		$this->db->from('pembayaran');
		$this->db->join('siswa', 'siswa.nisn = pembayaran.nisn');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
		$this->db->where('tahun_dibayar', $idtahun);
		$this->db->order_by('tgl_bayar', 'ASC');
		return $this->db->get();
	}
	
	//tampilkan laporan tahunan sum jumlah_bayar
	public function sum($idtahun){
		//ambil data pembayaran
		$this->db->select('SUM(jumlah_bayar) as sum');
		$this->db->from('pembayaran');
		$this->db->where('tahun_dibayar', $idtahun);
		return $this->db->get();
	}
	
	//tampilkan laporan bulanan
	public function tampilper($idtahun, $idbulan){
		//ambil data pembayaran
		$this->db->select('pembayaran.tgl_bayar, pembayaran.id_pembayaran, siswa.nisn, siswa.nis, siswa.nama, kelas.nama_kelas, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, pembayaran.jumlah_bayar');
		$this->db->from('pembayaran');
		$this->db->join('siswa', 'siswa.nisn = pembayaran.nisn');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
		$this->db->where('tahun_dibayar', $idtahun);
		$this->db->where('bulan_dibayar', $idbulan);
		$this->db->order_by('tgl_bayar', 'ASC');
		return $this->db->get();
	}
	
	//tampilkan laporan bulanan sum jumlah_bayar
	public function sumper($idtahun, $idbulan){
		//ambil data pembayaran
		$this->db->select('SUM(jumlah_bayar) as sum');
		$this->db->from('pembayaran');
		$this->db->where('tahun_dibayar', $idtahun);
		$this->db->where('bulan_dibayar', $idbulan);
		return $this->db->get();
	}

}