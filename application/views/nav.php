<?php
if($this->session->userdata('kodepenilai')==""){
    redirect('login','refresh');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="description" content="Aplikasi Penilaian Kinerja Guru">
    <meta name="author" content="Moch Ma'ruf Amien">

    <title>Aplikasi Penilaian</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets/bower_components/metisMenu/dist/metisMenu.min.css') ?>" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/dist/css/sb-admin-2.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

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
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Aplikasi Penilaian</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><?=$this->session->userdata('username'); ?> <?=$this->session->userdata('kodepenilai'); ?>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ganti Password</a>
                        </li> -->
                        <li class="divider"></li>
                        <li><a href="<?=base_url()?>login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?= base_url() ?>home"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Master Kompetensi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url() ?>jenispenilaian">Jenis Penilaian</a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>kategori">Kategori</a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>kompetensi">Kompetensi</a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>indikator">Indikator</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Master Sekolah<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <!-- <li>
                                    <a href="<?= base_url() ?>pangkat">Pangkat</a>
                                </li> -->
                                <li>
                                    <a href="<?= base_url() ?>jabatan">Jabatan</a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>golongan">Golongan</a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>guru">Guru</a>
                                </li>
                                <!-- <li>
                                    <a href="<?= base_url() ?>sekolah">Sekolah</a>
                                </li> -->
                                <!-- <li>
                                    <a href="<?= base_url() ?>petugasdinas">Petugas Dinas</a>
                                </li> -->
                                <!-- <li>
                                    <a href="<?= base_url() ?>penilai">Penilai</a>
                                </li> -->
                                <!-- <li>
                                    <a href="<?= base_url() ?>penilaian">Penilaian</a>
                                </li> -->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- <li>
                            <a href="<?= base_url() ?>nilai"><i class="fa fa-table fa-fw"></i> Penilaian</a>
                        </li> -->
                        <!-- <li>
                            <a href="<?= base_url() ?>laporan"><i class="fa fa-sitemap fa-fw"></i> Laporan</a>
                        </li> -->
                        <!-- <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Website Under Contruction</a>

                        </li> -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<div id="page-wrapper"><br>
