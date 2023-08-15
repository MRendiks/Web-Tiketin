<?php
require '../component/database/koneksi.php';
require '../component/login/Header.php';

//Cek login
if (isset($_POST['registrasi'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_user = $_POST['nama_user'];
    $kategori = $_POST['kategori'];
    $no_telp = $_POST['no_telp'];

    //Mencocokan data
    $query = mysqli_query($koneksi, "INSERT INTO user values('','$username', '$password', '$nama_user', '$kategori', '$no_telp')") or die("Erro in query $query.".mysqli_error($koneksi));
    if ($query) {
      echo "<script language='javascript'>
       window.alert('Berhasil Registrasi.');
       window.location.href='login.php';
       </script>
       "; 
    }else{
      echo "<script language='javascript'>
       window.alert('Gagal Registrasi.');
       window.location.href='register.php';
       </script>
       ";
    }
     
  
};

if (!isset($_SESSION['log'])) {
} else {
    header('location:home.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <link rel="icon" href="../images/logo.png">
  <title>TIKETIN</title>

  <!-- Custom fonts for this template-->
  <link href="assets/assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

  <style>
    form{
            animation: transitionIn-Y-bottom 0.5s;
        }
    body {
      background-image: url('../images/bg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-1">Registrasi User<br>Tiketin</h1>
                    <img src="../images/logo.png" class="mt-2 mb-4" width="100">
                  </div>

                  <form class="user" method="POST" action="">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" placeholder="Masukan Username..." name="username" required>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nama_user" name="nama_user" placeholder="Masukan Nama User" required>
                    </div>
                    <label>Kategori :</label>
                    <select name="kategori" class="form-control" style="border-radius: 50px; font-size: 15px;">
                      <option value="ANAK-ANAK">ANAK-ANAK</option>
                      <option value="DEWASA">DEWASA</option>
                    </select>
                    <br>
                    <div class="form-group">
                      <input type="number" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="Masukan No Telephon" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Password" required>
                    </div>
                    
                    <button type="submit" name="registrasi" class="btn btn-success btn-user btn-block">
                      Registrasi
                    </button>
                    </form>
                    <br>
                  <div class="copyright text-center my-auto">
                    <span>Copyright &copy;Tiketin <?= date('Y'); ?> </span>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</html>