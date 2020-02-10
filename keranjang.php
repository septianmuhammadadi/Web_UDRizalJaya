<?php 
session_start();

$koneksi = new mysqli("localhost","root","","prakp");
?>

<!DOCTYPE html>
<html>
<head>
	<title>UD. RIZAL JAYA</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<style>  
            #leftbox { 
                float:left;  
                margin-right: 20%;
                width: 20%:;
            } 
            #middlebox{ 
                float:left; 
                width: 30%;
                margin : auto;
            } 
            #rightbox{ 
                float:right;
                width: 5%; 
                margin-right: 0%;
            } 
        </style>  
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
	    	<li><a href="keranjang.php"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
	    	<?php if (isset($_SESSION["pelanggan"])): ?>
	    		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> 
	    	<?php else: ?>
	    		<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
	    	<?php endif ?>	    	
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
					<!-- <th>Jumlah</th> -->
					<th>Sub Harga</th>
					<th colspan="3">Aksi</th>
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
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_produk"]; ?></td>
					<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
					<!-- <th><?php echo $jumlah; ?></th> -->
					<td>Rp. <?php echo number_format($subharga); ?></td>
					<td>
						<div id="leftbox"><a href="kurangibarangkeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">-</a></div>
						<div id="middlebox"><?php echo $jumlah; ?></div>
						<div id="leftbox"><a href="tambahbarangkeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-primary btn-xs">+</a></div>
					</td>
							
						
											
				</tr>
				<?php $nomor++; ?>
				<?php endforeach?>
			</tbody>
		</table>
		<a href="index.php" class="btn btn-default">Lanjut Belanja</a>
		<!-- <a href="login.php" class="btn btn-primary">Checkout</a> -->
		<?php if (isset($_SESSION["pelanggan"])): ?>
	    	<a href="checkout.php" class="btn btn-primary">Checkout</a>
	 	<?php else: ?>
	    	<a href="login.php" class="btn btn-primary">Checkout</a> 
	    <?php endif ?>
	</div>
</section>

</body>
</html>