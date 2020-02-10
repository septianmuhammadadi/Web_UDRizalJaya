<?php
session_start();
// mendapatkan id produk
$id_produk = $_GET['id'];

if (($_SESSION['keranjang'][$id_produk]==1)) 
{
	unset($_SESSION["keranjang"][$id_produk]);
	echo "<script>alert ('Produk Dihapus Dari Keranjang'); </script>";
}
else
{
	$_SESSION['keranjang'][$id_produk]-=1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

echo "<script>location='keranjang.php';</script>";

?>