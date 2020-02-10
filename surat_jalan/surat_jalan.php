<?php 

$koneksi = new mysqli("localhost","root","","prakp");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SURAT JALAN</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <h1>SURAT JALAN</h1>
      <div id="company" class="clearfix">
        <div>UD.RIZAL JAYA</div>
        <div>Jl.Pedurungan Tengah v,<br />No. 69,Semarang</div>
        <div>(+62) 1575238186</div>
        <div><a href="mailto:company@example.com">udrizaljaya@gmail.com</a></div>
      </div>

      <?php $nomor=1; ?>
      <?php 
      $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$_GET[id]'");
      $pecah = $ambil->fetch_assoc();
      ?>
      <div id="project">
      	<div><span>No.Pesanan : <?php echo $pecah["id_pelanggan"]; ?></span></div>
        <div><span>Nama : <?php echo $pecah["nama_pelanggan"]; ?></span></div>
        <!-- <div><span>Alamat : <?php echo $pecah["alamat_pelanggan"]; ?></span></div> -->
        <div><span>Email : <?php echo $pecah["email_pelanggan"]; ?></span> <a href="mailto:john@example.com"></a></div>
        <div><span>No.HP : <?php echo $pecah["telp_pelanggan"]; ?></span></div>
        <div><span>Tanggal :</span></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Produk</th>
            <th class="desc">Deskripsi</th>
            <th>Harga</th>
            <th>Unit</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Design</td>
            <td class="desc">Creating a recognizable design solution based on the company's existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
          </tr>
          <tr>
            <td class="service">Development</td>
            <td class="desc">Developing a Content Management System-based Website</td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
            <td class="total">$3,200.00</td>
          </tr>
          <tr>
            <td class="service">SEO</td>
            <td class="desc">Optimize the site for search engines (SEO)</td>
            <td class="unit">$40.00</td>
            <td class="qty">20</td>
            <td class="total">$800.00</td>
          </tr>
          <tr>
            <td class="service">Training</td>
            <td class="desc">Initial training sessions for staff responsible for uploading web content</td>
            <td class="unit">$40.00</td>
            <td class="qty">4</td>
            <td class="total">$160.00</td>
          </tr>
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">JUMLAH TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Mohon Gunakan Surat Jalan ini, agar memudahkan pelayanan kami kepada Bapak/Ibu, Terima Kasih.
    </footer>
  </body>
</html>