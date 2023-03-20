<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {
	
	//total siswa
	public function totalsiswa(){
		//ambil data tabel 
		$totsiswa = $this->db->query("SELECT COUNT(*) AS countsiswa FROM siswa");
		return $totsiswa;
	}
	
	//total siswa
	public function totalkelas(){
		//ambil data tabel 
		$totkelas = $this->db->query("SELECT COUNT(*) AS countkelas FROM kelas");
		return $totkelas;
	}
	
	//total pembayaran
	public function totalpembayaran(){
		//ambil data tabel 
		$totpembayaran = $this->db->query("SELECT COUNT(*) AS countpembayaran FROM pembayaran");
		return $totpembayaran;
	}
	
	//tampilkan statistik pembayar
	public function statpembayar(){
		//ambil data tabel 
		$sp = $this->db->query("SELECT CONCAT(YEAR(tgl_bayar),'-',MONTH(tgl_bayar)) AS tahun_bulan, COUNT(id_pembayaran) AS jumlah_pembayar
										  FROM pembayaran GROUP BY YEAR(tgl_bayar) DESC,MONTH(tgl_bayar) DESC LIMIT 0, 5");
		return $sp;
	}
	
}