<?php 
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","prakp");
?>

<!DOCTYPE html>
<html>
<head>
	<title>UD. RIZAL JAYA</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
	    	<a class="navbar-brand" href="#">UD. RIZAL JAYA</a>
	    </div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="checkout.php">Checkout</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
	    	<li><a href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
	    	<!-- <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
	    </ul>
	</div>
</nav>


<!-- Konten -->

<section class="konten">
	<div class="container">
		<h2>Etalase</h2>

		<div class="row">

			<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
			<?php while($perproduk = $ambil->fetch_assoc()){ ?>

			<div class="col-md-3">
				<div class="thumbnail">
				<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" >	
				<div class="caption">
					<h3><?php echo $perproduk['nama_produk']; ?></h3>
					<h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
					<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
				</div>				
				</div>
			</div>
			<?php } ?>

		</div>
	</div>
</section>

</body>
</html>