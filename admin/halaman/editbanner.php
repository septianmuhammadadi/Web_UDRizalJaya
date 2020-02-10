<h2>Ubah Banner</h2>

<?php

$ambil=$koneksi->query("SELECT * FROM banner WHERE banner_id='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-grup">
		<label>Nama Banner</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['banner_title']; ?>">
	</div>
	<br>
	<div class="form-grup">
		<img src="../foto_banner/<?php echo $pecah['banner_image'] ?>" width="200">
	</div>
	<div class="form-grup">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<br>
	<div class="form-grup">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10"><?php echo $pecah['banner_deskripsi']; ?></textarea>
	</div>
	<br>
	<div class="form-grup">
		<label>Banner Link</label>
		<textarea name="banner_link" class="form-control" rows="10"><?php echo $pecah['banner_link']; ?></textarea>
	</div>
	<br><button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah'])) 
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];
	//jika foto dirubah
	if (!empty($lokasifoto)) 
	{
		move_uploaded_file($lokasifoto, "../foto_banner/$namafoto");
		$koneksi->query("UPDATE banner SET banner_title='$_POST[nama]',banner_image='$namafoto',banner_deskripsi='$_POST[deskripsi]',banner_link='$_POST[banner_link]' WHERE banner_id='$_GET[id]'");
	}
	else
	{
		$koneksi->query("UPDATE banner SET banner_title='$_POST[nama]',banner_deskripsi='$_POST[deskripsi]',banner_link='$_POST[banner_link]' WHERE banner_id='$_GET[id]'");
	}
	echo "<script>alert('Data Banner Telah Diubah')</script>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=banner'>";
}
?>