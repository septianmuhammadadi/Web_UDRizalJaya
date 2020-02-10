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
		<center><h1>Anda Belum Memasukkan Barang</h1><hr></center>
	</div>
</section>

</body>
</html>