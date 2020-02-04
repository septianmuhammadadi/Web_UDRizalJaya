<?php 
session_start();

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
			<li><a href="index.php">Home</a></li>
			<li><a href="checkout.php">Checkout</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
	    	<li class="active"><a href="keranjang.php"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
	    	<!-- <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
	    </ul>
	</div>
</nav>

<!-- KONTEN -->
<section class="konten">
	<div class="container">
		<h1>Keranjang Belanja</h1><hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>NO</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Sub Harga</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :?>
				<?php 
				$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah["harga_produk"] * $jumlah;
				?>
				<tr>
					<th><?php echo $nomor; ?></th>
					<th><?php echo $pecah["nama_produk"]; ?></th>
					<th>Rp. <?php echo number_format($pecah["harga_produk"]); ?></th>
					<th><?php echo $jumlah; ?></th>
					<th>Rp. <?php echo number_format($subharga); ?></th>
				</tr>
				<?php $nomor++; ?>
				<?php endforeach?>
			</tbody>
		</table>
		<a href="index.php" class="btn btn-default">Lanjut Belanja</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
	</div>
</section>

</body>
</html>