<?php
session_start();
$koneksi = new mysqli("localhost","root","","prakp");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Pelanggan</title>
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
      <li class=""><a href="index.php">Home</a></li>
      <li><a href="checkout.php">Checkout</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right"> 
        <li><a href="keranjang.php"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
        <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
      </ul>
  </div>
</nav>

  <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Rizal Jaya : Login Pelanggan</h2>
                <br>
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <center><strong>Masukkan Email Dan Passsword</strong></center>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"></i></span>
                                            <input type="text" class="form-control" name="email" placeholder="Masukkan Username Anda"/>
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"></i></span>
                                            <input type="password" class="form-control"  name="password" placeholder="Masukkan Password Anda"/>
                                        </div>
                                    <div class="form-group">
                                            
                                        </div>
                                     
                                    <hr/>
                                    <center><button class="btn btn-primary" name="login">Login</button></center>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>

  <?php
  if (isset($_POST["login"])) 
  {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

    $akunyangcocok = $ambil->num_rows;

    if ($akunyangcocok==1) 
    {
      //telah login
      $akun = $ambil->fetch_assoc();
      $_SESSION["pelanggan"] = $akun; 
      echo "<script>alert('Anda Sukses Login');</script>";
      echo "<script>location='checkout.php';</script>";

    }
    else
    {
      // anda gagal login
      echo "<script>alert('Anda Gagal Login');</script>";
      echo "<script>location='login.php';</script>";
    }
  }
  ?>

</body>
</html>