<h2>Detail Pembelian</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pembelian=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<pre><?php print_r($detail); ?></pre>

<strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
<p>
	<?php echo $detail ['telp_pelanggan']; ?> <br>
	<?php echo $detail ['email_pelanggan']; ?> <br>
</p>
<p>
	Tanggal: <?php echo $detail ['tanggal_pembelian']; ?> <br>
	Total: <?php echo $detail ['total_pembelian']; ?> <br>
</p>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>NO</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<th><?php echo $nomor; ?></th>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>
				<?php echo $pecah['harga_produk']*$pecah['jumlah'] ?>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php }?>
	</tbody>
</table>