<!DOCTYPE html>
<html>

<head>
    <title>Admin SPP - Laporan</title>
    <link href="<?php echo base_url();?>dist/css/tabel-lap.css" rel="stylesheet">
</head>

<body>
    <center>
        <h3>LAPORAN PEMBAYARAN SPP<br><?php echo $judullap['pesan'];?></h3>
    </center>
    <table cellspacing='0'>
        <thead>
            <tr>
                <th>Tanggal Bayar</th>
                <th>No Pembayaran</th>
                <th>NISN/NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Bulan Bayar</th>
                <th>Jumlah Bayar</th>
            </tr>
        </thead>
        <tbody>
            <?php
			foreach($laporan->result_array() as $d){
				$tgl = tgl_indo($d['tgl_bayar']);
				$angkaformat = number_format($d['jumlah_bayar'],2,",",".");
		?>
            <tr>
                <td align="center"><?php echo $tgl;?></td>
                <td align="right"><?php echo $d['id_pembayaran'];?></td>
                <td align="center"><?php echo $d['nisn'];?> / <?php echo $d['nis'];?></td>
                <td align="left"><?php echo $d['nama'];?></td>
                <td align="center"><?php echo $d['nama_kelas'];?></td>
                <td align="center"><?php echo $d['bulan_dibayar'];?> <?php echo $d['tahun_dibayar'];?></td>
                <td align="right">Rp. <?php echo $angkaformat;?></td>
            </tr>
            <?php
			}
			$rhits = $sum->row_array();
			$angkaformat = number_format($rhits['sum'],2,",",".");
		?>
            <tr>

                <td colspan="6" align="center">JUMLAH TOTAL</td>
                <td align="right">Rp. <?php echo $angkaformat;?></td>
            </tr>
        </tbody>
    </table>
    <div align="right">
        <h5>
            <p>Bandung, .................................20....<br>Petugas,<br><br><br>(............................)
        </h5>
    </div>
</body>

</html>

<?php
	function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}	

	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
	}
?>