<h2>Halaman Banner</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Title Banner</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM banner"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['banner_title']; ?></td>
			<td>
				<img src="../foto_banner/<?php echo $pecah['banner_image']; ?>" width=100>
			</td>
			<td>
				<a href="index.php?halaman=hapusbanner&id=<?php echo $pecah['banner_id']; ?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=editbanner&id=<?php echo $pecah['banner_id']; ?>" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>

	</tbody>
</table>
<a href="index.php?halaman=tambahbanner" class="btn btn-primary">Tambah Banner</a>