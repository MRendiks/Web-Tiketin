<?php
require '../component/database/koneksi.php';
require '../component/login/Header.php';
$_SESSION['id_tiket'] = "";

if (isset($_POST['pesan'])) {
    $_SESSION['id_pesan'] = "";
    $id_user = $_SESSION['id_user'];
    $id_perlengkapan = $_POST['id_perlengkapan'];
    $jumlah_pinjam_alat = $_POST['jumlah_alat'];

    $query1 = mysqli_query($koneksi, "SELECT*FROM perlengkapan where id_perlengkapan='$id_perlengkapan'")or die("Erro in query $query.".mysqli_error($koneksi));
    $data = mysqli_fetch_array($query1);
    if ($data['jumlah_tersedia'] <= 0) {
      echo "<script language='javascript'>
       window.alert('Alat Sudah habis dipinjam.');
       window.location.href='pesan.php';
       </script>
       "; 
    }else {
      

    //Mencocokan data
    $query = mysqli_query($koneksi, "INSERT INTO tiket values('', CURDATE(), '$jumlah_pinjam_alat', '$id_user', '$id_perlengkapan')") or die("Erro in query $query.".mysqli_error($koneksi));
    if ($query) {
      $query2 = mysqli_query($koneksi, "SELECT * FROM tiket WHERE tanggal_pesan = CURDATE()");
      while ($data = mysqli_fetch_array($query2)){
        $_SESSION['id_tiket'] = $data['id_tiket'];
        $_SESSION['id_perlengkapan'] = $data['id_perlengkapan'];
        $_SESSION['jumlah_alat_pinjam'] = $data['jumlah_pinjam_alat'];
      }
      echo "<script language='javascript'>
       window.alert('Berhasil Pesan.');
       window.location.href='pembayaran.php';
       </script>
       "; 
    }else{
      echo "<script language='javascript'>
       window.alert('Gagal Pesan.');
       window.location.href='pesan.php';
       </script>
       "; 

    }
     
  }
  
};

if (isset($_SESSION['log'])) {
} else {
    header('location:home.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" href="../images/logo.png">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <title>TIKETIN</title>
    <link rel="icon" href="../images/logo.png">
    <style>
        table{
            animation: transitionIn-Y-bottom 0.5s;
        }
        body{
            background-image: url('../images/bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
        .full-height {
    background: rgba(26, 26, 26, 0.548);
    max-height: 120vh;
    height: 120vh;
}
    </style>
        
</head>
<body >
    
    <div class="full-height" style="padding-top: 30px;">
        <center>
        <table border="0" >
            <tr>
                <td width="80%">
                    <font class="edoc-logo">Tiketin</font>
                    <font class="edoc-logo-sub">| WEBSITE BOOKING TIKET KOLAM RENANG</font>
                </td>
                <td  width="20%">
                <span class="badge badge-danger"><a href="../logout/logout.php" style="text-decoration: none; color:white;">Logout</a></span>
                </td>
            </tr>
        </table>
    </center>
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
                <h1 class="h4 text-gray-900 mb-1">Form Pemesanan Tiket</h1>
                <img src="../images/logo.png" class="mt-2 mb-4" width="100">
              </div>
              <form class="user" method="POST" action="">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama_user" placeholder="<?= $_SESSION['nama']; ?>" name="nama_user" disabled>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="<?= $_SESSION['no_telp']; ?>" disabled>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="kategori" name="kategori" placeholder="<?= $_SESSION['kategori']; ?>" disabled>
                </div>
                <label>Nama Alat</label>
                    <select name="id_perlengkapan" class="form-control" style="color: black; border-radius: 50px;">
                    <?php
                     $data_alat = mysqli_query($koneksi, "SELECT id_perlengkapan,nama_alat FROM perlengkapan");
                     if (mysqli_num_rows($data_alat) > 0) {
                        foreach ($data_alat as $data) {
                            ?>
                                <option value="<?= $data['id_perlengkapan'];?>"> <?= $data['nama_alat']; ?></option>
                            <?php
                        }

                     ?>
                    </select>
                    <?php }?>
                <br>
                <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="jumlah_alat" name="jumlah_alat" placeholder="Masukan Jumlah Pinjam Alat">
                </div> 
                <button type="submit" class="btn btn-success btn-user btn-block" data-bs-toggle="modal" data-bs-target="#bayar" name="pesan">Pesan</button>
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
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../js/scripts.js"></script>
</body>
</html>