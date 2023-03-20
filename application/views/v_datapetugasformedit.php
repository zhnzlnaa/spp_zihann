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

    <title>Admin SPP - Ubah Data Petugas</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

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
	if ($satu['id_petugas'] == ''){
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
                    <h1 class="page-header">Data Petugas <small>Ubah</small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Ubah Petugas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="idpetugas" value="<?php echo $satu['id_petugas'];?>">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" type="text"
                                                value="<?php echo $satu['username'];?>">
                                            <?php echo form_error('username','<p class="text-danger">','</p>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Password (jika tidak dirubah dikosongkan saja)</label>
                                            <input class="form-control" placeholder="Password" name="passwordedit"
                                                type="text">
                                            <?php echo form_error('passwordedit','<p class="text-danger">','</p>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Petugas</label>
                                            <input class="form-control" placeholder="Nama Petugas" name="namapetugas"
                                                type="text" value="<?php echo $satu['nama_petugas'];?>">
                                            <?php echo form_error('namapetugas','<p class="text-danger">','</p>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Level</label>
                                            <select class="form-control" name="level">
                                                <?php
												if ($satu['level']=="admin"){
													echo "<option value='admin' selected>Admin</option>
														  <option value='petugas'>Petugas</option>";
												}
												else{
													echo "<option value='admin'>Admin</option>
														  <option value='petugas' selected>Petugas</option>";
												}
											?>
                                            </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <button type="submit" name="ubah" class="btn btn-outline btn-success"
                                                Value="Ubah">Ubah</button>
                                            <a href="<?php echo site_url();?>datapetugas/"
                                                class="btn btn-outline btn-danger">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-12 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="col-lg-6"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php
	}
?>

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

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>

</body>

</html>