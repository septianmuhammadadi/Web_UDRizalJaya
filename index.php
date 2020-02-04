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
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="checkout.php">Checkout</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
	    	<li><a href="keranjang.php"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
	    	<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
	    </ul>
	</div>
</nav>

<!-- Banner -->
<?php
$connect = mysqli_connect("localhost", "root", "", "prakp");
function make_query($connect)
{
	$query = "SELECT * FROM banner ORDER BY banner_id ASC";
	$result = mysqli_query($connect, $query);
	return $result;
}

function make_slide_indicators($connect)
{
	$output = ''; 
	$count = 0;
	$result = make_query($connect);
	while($row = mysqli_fetch_array($result))
	{
	  if($count == 0)
	  {
	  	$output .= '<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>';
	  }
	  else
	  {
	  	$output .= '<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>';
	  }
	  $count = $count + 1;
	}
 return $output;
}

function make_slides($connect)
{
	$output = '';
	$count = 0;
	$result = make_query($connect);
	while($row = mysqli_fetch_array($result))
	{
		if($count == 0)
		{
			$output .= '<div class="item active">';
		}
		else
		{
			$output .= '<div class="item">';
		}
		$output .= '<a href="'.$row["banner_link"].'"><img src="foto_banner/'.$row["banner_image"].'" alt="'.$row["banner_title"].'" />
		<div class="carousel-caption">
		<h3>'.$row["banner_title"].'</h3>
		<h4>'.$row["banner_deskripsi"].'</h4>
		</div>
		</div></a>';
		$count = $count + 1;
	}
	return $output;
}
?>

<br/>
<div class="container">
	<!-- <h2 align="center">How to Make Dynamic Bootstrap Carousel with PHP</h2> -->
	<div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php echo make_slide_indicators($connect); ?>
		</ol>
		<div class="carousel-inner">
			<?php echo make_slides($connect); ?>
		</div>

		<a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>

		<a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>


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