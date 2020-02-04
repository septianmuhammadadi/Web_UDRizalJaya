<?php
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","prakp");

if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Admin UD RIZAL JAYA</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">UD RIZAL JAYA</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 10px;
float: right;
font-size: 16px;">  <a href="index.php?halaman=logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
<div style="color: white;
padding: 15px 10px 5px 50px;
float: right;
font-size: 16px;">  <a href="index.php?halaman=tambahadmin" class="btn btn-primary square-btn-adjust">Daftar Admin</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/RJlogo.png" class="user-image img-responsive"/>
					</li>
				
					
                    <!-- <li><a href="index.php"><i class="fa fa-dashboard fa-3x"></i>Home</a></li> -->
                    <li><a href="index.php?halaman=produk"><i class="fa fa-dashboard fa-3x"></i>Produk</a></li>
                    <li><a href="index.php?halaman=banner"><i class="fa fa-dashboard fa-3x"></i>Banner</a></li>
                    <li><a href="index.php?halaman=pembelian"><i class="fa fa-dashboard fa-3x"></i>Pembelian</a></li>
                    <li><a href="index.php?halaman=pelanggan"><i class="fa fa-dashboard fa-3x"></i>Pelanggan</a></li>
                    <li><a href="index.php?halaman=suratjalan"><i class="fa fa-dashboard fa-3x"></i>Surat Jalan</a></li>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
            <?php
            if (isset($_GET['halaman']))
            {
                if($_GET['halaman']=="produk")
                {
                    include 'halaman/produk.php';
                }
                else if($_GET['halaman']=="banner")
                {
                    include 'halaman/banner.php';
                }
                else if($_GET['halaman']=="tambahbanner")
                {
                    include 'halaman/tambahbanner.php';
                }
                else if($_GET['halaman']=="hapusbanner")
                {
                    include 'halaman/hapusbanner.php';
                }
                else if($_GET['halaman']=="editbanner")
                {
                    include 'halaman/editbanner.php';
                }
                else if($_GET['halaman']=="tambahadmin")
                {
                    include 'halaman/tambah_admin.php';
                }
                else if($_GET['halaman']=="pembelian")
                {
                    include 'halaman/pembelian.php';
                }
                else if($_GET['halaman']=="pelanggan")
                {
                    include 'halaman/pelanggan.php';
                }
                else if($_GET['halaman']=="detail")
                {
                    include 'halaman/detail.php';
                }
                else if($_GET['halaman']=="tambahproduk")
                {
                    include 'halaman/tambahproduk.php';
                }
                else if($_GET['halaman']=="hapusproduk")
                {
                    include 'halaman/hapusproduk.php';
                }
                else if($_GET['halaman']=="hapuspelanggan")
                {
                    include 'halaman/hapuspelanggan.php';
                }
                else if($_GET['halaman']=="ubahproduk")
                {
                    include 'halaman/ubahproduk.php';
                }
                else if($_GET['halaman']=="suratjalan")
                {
                    include 'halaman/suratjalan.php';
                }
                else if($_GET['halaman']=="logout")
                {
                    include 'halaman/logout.php';
                }
            }
            else
            {
                include 'halaman/home.php';
            }
            ?>
            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
