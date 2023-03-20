<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin SPP - Pembayaran SPP</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link
        href="<?php echo base_url();?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css"
        rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>bower_components/datatables-responsive/css/dataTables.responsive.css"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php $this->load->view('v_topmenu'); ?>
            <!-- /.navbar-top-links -->

            <?php $this->load->view('v_sidemenu'); ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <?php 
		if ($satu['nisn']==''){
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">404 <small>Page Not Found</small></h1>
                </div>
            </div>
            <div class="alert alert-warning" role="alert">
                <strong>Warning!</strong><br>
                The page you requested was not found.<br>
            </div>
            <?php
		}
		else{
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pembayaran SPP <small>Transaksi</small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Pembayaran SPP
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <input type='hidden' name='idspp' value='<?php echo $satu['id_spp'];?>'>
                                        <input type='hidden' name='idnisn' value='<?php echo $satu['nisn'];?>'>
                                        <input type='hidden' name='idtahun' value='<?php echo $satu['tahun'];?>'>
                                        <input type='hidden' name='idnominal' value='<?php echo $satu['nominal'];?>'>
                                        <div class="wraper form-group input-group col-lg-5">
                                            <input type="text" class="form-control" placeholder="Cari Siswa..."
                                                value="<?php echo $satu['nisn'];?>" disabled>
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" data-toggle="modal"
                                                    data-target="#myModal"><i class="fa fa-search"></i> Cari
                                                    Siswa</button>
                                            </span>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Cari Siswa</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-striped table-bordered table-hover"
                                                            id="dataTables-example">
                                                            <thead>
                                                                <tr>
                                                                    <th>NISN</th>
                                                                    <th>NIS</th>
                                                                    <th>Nama Siswa</th>
                                                                    <th>Kelas</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
															foreach($siswa->result_array() as $d){
														?>
                                                                <tr class="odd gradeX">
                                                                    <td><?php echo $d['nisn'];?></td>
                                                                    <td><?php echo $d['nis'];?></td>
                                                                    <td><?php echo $d['nama'];?></td>
                                                                    <td><?php echo $d['nama_kelas'];?></td>
                                                                    <td class="center tooltip-demo">
                                                                        <a
                                                                            href="<?php echo site_url('pembayaran/form/'.$d['nisn']);?>">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-xs">Pilih
                                                                                Siswa</button>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php
															}
														?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Batal</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                        <!-- / .form untuk transaksi -->
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label>NIS</label>
                                                <input class="form-control" name="nis" type="text"
                                                    value="<?php echo $satu['nis'];?>" disabled>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Tahun Dibayar</label>
                                                <input class="form-control" name="tahun" type="text"
                                                    value="<?php echo $satu['tahun'];?>" disabled>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Nama</label>
                                                <input class="form-control" name="nama" type="text"
                                                    value="<?php echo $satu['nama'];?>" disabled>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Bulan Dibayar</label>
                                                <select class="form-control" name="bulan">
                                                    <option value="">- Pilih Bulan -</option>
                                                    <option value="Januari">Januari</option>
                                                    <option value="Februari">Februari</option>
                                                    <option value="Maret">Maret</option>
                                                    <option value="April">April</option>
                                                    <option value="Mei">Mei</option>
                                                    <option value="Juni">Juni</option>
                                                    <option value="Juli">Juli</option>
                                                    <option value="Agustus">Agustus</option>
                                                    <option value="September">September</option>
                                                    <option value="Oktober">Oktober</option>
                                                    <option value="November">November</option>
                                                    <option value="Desember">Desember</option>
                                                </select>
                                                <?php echo form_error('bulan','<p class="text-danger">','</p>'); ?>
                                                <div style="color: red;"><?php echo (isset($message))? $message : ""; ?>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Kelas</label>
                                                <input class="form-control" name="kelas" type="text"
                                                    value="<?php echo $satu['nama_kelas'];?>" disabled>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Jumlah Bayar (Rp.)</label>
                                                <input class="form-control" name="nominal" type="text"
                                                    value="<?php echo number_format($satu['nominal'],2,",",".");?>"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="form-group input-group">
                                            <button type="submit" name="proses" class="btn btn-info"
                                                Value="Proses">Proses Pembayaran</button>
                                            <a href="<?php echo site_url();?>pembayaran/"
                                                class="btn btn-secondary">Reset Data</a>
                                        </div>
                                        <!-- /.tutup form untuk transaksi -->
                                    </form>
                                </div>
                                <!-- /.col-lg-12 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Histori Pembayaran
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Nomor Pembayaran</th>
                                            <th>Tahun Dibayar</th>
                                            <th>Bulan Dibayar</th>
                                            <th>Petugas</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
									foreach($databayar->result_array() as $d){
										$tgl = tgl_indo($d['tgl_bayar']);
								?>
                                        <tr>
                                            <td><?php echo $tgl;?></td>
                                            <td><?php echo $d['id_pembayaran'];?></td>
                                            <td><?php echo $d['tahun_dibayar'];?></td>
                                            <td><?php echo $d['bulan_dibayar'];?></td>
                                            <td><?php echo $d['nama_petugas'];?></td>
                                            <td align="right"><?php echo number_format($d['jumlah_bayar'],2,",",".");?>
                                            </td>
                                            <td class="center tooltip-demo">
                                                <a href="<?php echo site_url('pembayaran/kwitansi/'.$d['id_pembayaran']);?>"
                                                    target="_blank">
                                                    <button type="button" class="btn btn-primary btn-xs">Cetak
                                                        Kwitansi</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
									}
								?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        <?php
		}
?>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script
        src="<?php echo base_url();?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js">
    </script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

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