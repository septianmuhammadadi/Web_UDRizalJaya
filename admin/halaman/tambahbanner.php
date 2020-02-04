<h2>Tambah Banner</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-grup">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<br>
	<div class="form-grup">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-grup">
		<label>Banner Link (Dapat Dibuat Kosong)</label>
		<textarea class="form-control" name="banner_link" rows="10"></textarea>
	</div> 
	<br>
	<div class="form-grup">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<br> <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save']))
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_banner/".$nama);
	$koneksi->query("INSERT INTO banner (banner_title,banner_image,banner_deskripsi,banner_link) VALUES('$_POST[nama]','$nama','$_POST[deskripsi]','$_POST[banner_link]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=banner'>";
}