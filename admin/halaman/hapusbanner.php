<?php

$ambil = $koneksi->query("SELECT * FROM banner WHERE banner_id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotobanner = $pecah['banner_image'];
if (file_exists("../foto_banner/$fotobanner")) 
{
	unlink("../foto_banner/$fotobanner");
}

$koneksi->query("DELETE FROM banner WHERE banner_id='$_GET[id]'");

echo "<script>alert('Banner Terhapus'); </script>";
echo "<script>location='index.php?halaman=banner';</script>";

?>