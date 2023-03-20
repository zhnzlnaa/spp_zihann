<div class="navbar-default sidebar" style="background: #a14371" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <?php 
	$level = $this->session->userdata('akses');
	if($level == 'admin'){ 
?>
<li>
    <a href="<?php echo base_url();?>home/" style="color: black !important;"><i class = "fa fa-dashboard fa-fw"></i>Dashboard</a>
</li>

            <li>
                <a href="<?php echo base_url();?>datasiswa/"style="color: black !important;"><i class="fa fa-child fa-fw"></i> Data Siswa</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>datapetugas/"style="color: black !important;"><i class="fa fa-user fa-fw"></i> Data Petugas</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>datakelas/"style="color: black !important;"><i class="fa fa-building fa-fw"></i> Data Kelas</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>dataspp/"style="color: black !important;"><i class="fa fa-money fa-fw"></i> Data SPP</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>pembayaran/"style="color: black !important;"><i class="fa fa-edit fa-fw"></i> Entri Trans.
                    Pembayaran</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>laporan/"style="color: black !important;"><i class="fa fa-list-alt fa-fw"></i> Laporan Pembayaran</a>
            </li>
            <?php
	}
	elseif($level == 'petugas'){
?>
            <li>
                <a href="<?php echo base_url();?>home/" style="color: black !important;"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>pembayaran/" style="color: black !important;"><i class="fa fa-edit fa-fw"></i> Entri Trans.
                    Pembayaran</a>
            </li>
            <?php
	}
	else{
?>
            <li>
                <a href="<?php echo base_url();?>histori/" style="color: black !important;"><i class="fa fa-edit fa-fw"></i> Histori Pembayaran</a>
            </li>
            <?php
	}
?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>