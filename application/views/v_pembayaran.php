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

        <div id="page-wrapper" style="background-color: #f2cdb6;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pembayaran SPP <small>Transaksi</small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Pembayaran SPP
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control" placeholder="Cari Siswa..."
                                                disabled>
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
                <div class="col-lg-4"></div>
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