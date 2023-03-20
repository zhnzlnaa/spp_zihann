<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin SPP - Laporan SPP</title>

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

        <div id="page-wrapper" style="background-color: #f2cdb6;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan SPP <small>Pilih Data</small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Laporan SPP
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" enctype="multipart/form-data" target="_blank">
                                        <div class="form-group">
                                            <label>Pilih Tahun</label>
                                            <select class="form-control" name="pilihtahun">
                                                <?php
											  $no=1;
											  foreach($tahun->result_array() as $d){
												  if ($satu['id_spp']==$d['id_spp']){
											?>
                                                <option value="<?php echo $d['tahun'];?>" selected>
                                                    <?php echo $d['tahun'];?></option>
                                                <?php
												  }
												  else{
											?>
                                                <option value="<?php echo $d['tahun'];?>"><?php echo $d['tahun'];?>
                                                </option>
                                                <?php	  
												  }
											  $no++;
											  }
											?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Bulan</label>
                                            <select class="form-control" name="pilihbulan">
                                                <option value="">- Semua Bulan -</option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Kktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                            </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <button type="submit" name="tampilkan" class="btn btn-info"
                                                Value="Tampilkan" target="_blank">Tampilkan</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                </div>
                                <!-- /.col-lg-12 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="col-lg-9"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

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