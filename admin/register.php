<?php
require '../component/database/koneksi.php';
require '../component/login/Header.php';

//Cek login
if (isset($_POST['registrasi'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Mencocokan data
    $query = mysqli_query($koneksi, "INSERT INTO admin values('','$username', '$password')");
    if ($query) {
        echo("<script src='../js/.js'>
        $.notify('Berhasil Menambahkan Data');
        </script>");
        header('location:login.php');
    }
    
  
};

if (!isset($_SESSION['log'])) {
} else {
    header('location:../index.php');
}

?><div class="container">

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
                <h1 class="h4 text-gray-900 mb-1">Registrasi Admin<br>Tiketin</h1>
                <img src="../images/logo.png" class="mt-2 mb-4" width="100">
              </div>

              <form class="user" method="POST" action="">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="username" placeholder="Masukan Username..." name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Password">
                </div>
                <button type="submit" name="registrasi" class="btn btn-success btn-user btn-block">
                  Registrasi
                </button>
                <hr>
                </form>
                <br>

<?php 
require '../component/login/footer.php';
?>