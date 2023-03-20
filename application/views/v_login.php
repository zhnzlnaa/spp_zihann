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

    <title>Login - Aplikasi Pembayaran SPP</title>

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

<body style="background-color: #f2cdb6;">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" align="center">
                        <br><img src="<?php echo base_url();?>images/spplogo.png" class="img-responsive"
                            alt="Responsive Image" width="100" height="100">
                        <br>
                        <h3 class="panel-title">Login - Aplikasi SPP</h3>
                    </div>
                    <div class="panel-body">
                        <form id="loginForm" class="" name="login" action="<?php echo base_url('login');?>"
                            method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <?php $pesanlogin = $this->session->flashdata('msg');
									if ($pesanlogin == ''){
										echo $pesanlogin;
									}
									else{
										echo "<div class='alert alert-danger'>$pesanlogin</div>";
									}
								?>
                                </div>
                                <div class="form-group">
                                    <?php
									if ($satu['username']==""){ ?>
                                    <input class="form-control" placeholder="Username" name="username" type="text"
                                        autofocus>
                                </div>
                                <?php echo form_error('username','<div class="alert alert-danger">','</div>');?>
                                <?php
									}
                                    else{ ?>
                                <input class="form-control" placeholder="Username" name="username" type="text"
                                    value="<?php echo $satu['username'];?>">
                    </div>
                    <?php echo form_error('username','<div class="alert alert-danger">','</div>');?>
                    <?php
									}
								?>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                    </div>
                    <?php echo form_error('password','<div class="alert alert-danger">','</div>'); ?>
                    <div class="checkbox">
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <button type="submit" class="btn btn-dark btn-block" value="Login">Login</button>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

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