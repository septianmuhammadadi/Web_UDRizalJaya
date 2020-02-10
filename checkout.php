<?php
session_start();
$koneksi = new mysqli("localhost","root","","prakp");

if (!isset($_SESSION["pelanggan"])) 
{
	echo "<script>alert('Anda Harus Login Terlebih Dahulu'); </script>";
	echo "<script>location='login.php';</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	  <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	      <li class="active"><a href="checkout.php">Checkout</a></li>
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


	<pre>
		<?php print_r($_SESSION["pelanggan"]); ?>
	</pre>

</body>
</html>