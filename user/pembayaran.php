<?php
require '../component/database/koneksi.php';


$id_tiket = $_SESSION['id_tiket'];


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
        }
        .full-height {
    background: rgba(26, 26, 26, 0.548);
    max-height: 140vh;
    height: 140vh;
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
                      <h1 class="h4 text-gray-900 mb-1">Form Pembayaran Tiket</h1>
                      <img src="../images/logo.png" class="mt-2 mb-4" width="100">
                    </div>
                    <form class="user" method="POST" action="bayar.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_user" placeholder="<?= $_SESSION['nama']; ?>" name="nama_user" disabled>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="<?= $_SESSION['no_telp']; ?>" disabled>
                      </div>
                      <label>No Tiket</label>
                        <input type="text" class="form-control form-control-user" placeholder="T<?= $_SESSION['id_tiket']; ?>" disabled>
                        <input type="text" class="form-control form-control-user" id="id_tiket" name="id_tiket" value="<?= $_SESSION['id_tiket']; ?>" hidden>
                      <br>
                      <label>Pembayaran</label>
                        <select name="pembayaran" id="pembayaran" class="form-control" style="color: black; border-radius: 50px;">
                          <option value="DANA">DANA 12345</option>
                          <option value="COD">COD 12345</option>
                          <option value="OVO">OVO 12345</option>
                          <option value="SHOPEE">SHOPEE 12345</option>
                          <option value="BCA">BCA 12345</option>
                        </select>
                      <br>
                      <label>Total Harga</label>
                      <?php 
                      if ($_SESSION['kategori'] === 'ANAK-ANAK') {
                        ?>
                      <div class="form-group">
                          <?php $query = mysqli_query($koneksi, "SELECT (perlengkapan.harga * tiket.jumlah_pinjam_alat) + 6000 AS totalharga FROM tiket INNER JOIN perlengkapan ON perlengkapan.id_perlengkapan = tiket.id_perlengkapan WHERE id_tiket='$id_tiket'");
                          $datatotal = mysqli_fetch_array($query);?>
                          <input type="number" class="form-control form-control-user" placeholder="Rp. <?php echo $datatotal['totalharga'];
                          ?>"disabled>
                          <input type="number" class="form-control form-control-user" id="total_bayar" name="total_bayar" value="<?= $datatotal['totalharga'];?>" hidden>
                        </div> 
                        <?php
                      }else{
                        ?>
                        <div class="form-group">
                          <?php $query = mysqli_query($koneksi, "SELECT (perlengkapan.harga * tiket.jumlah_pinjam_alat) + 12000 AS totalharga FROM tiket INNER JOIN perlengkapan ON perlengkapan.id_perlengkapan = tiket.id_perlengkapan WHERE id_tiket='$id_tiket'");
                          $datatotal = mysqli_fetch_array($query);?>
                          <input type="number" class="form-control form-control-user" placeholder="Rp. <?php echo $datatotal['totalharga'];
                          ?>"disabled>
                          <input type="number" class="form-control form-control-user" id="total_bayar" name="total_bayar" value="<?= $datatotal['totalharga'];?>" hidden>
                        </div> 
                      <?php
                      }
                      ?>
                      <div class="form-group">
                        <label class="col-lg-12 control-label" for="inputFile">Bukti Bayar</label>
                        <div class="col-lg-12">
                          <input class="form-control" id="inputFile" placeholder="Input File" type="file" name="gambar" accept="image/*" required>
                        </div>
                      </div>
                      
                      <button type="submit" name="bayar" class="btn btn-success btn-user btn-block">
                        Bayar
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
  </div>

  <div class="modal" id="cetak<?= $idp; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tiketin</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <form method="post">
                        <h3>Kartu Pasien</h3>
                        <p>Nama Pasien : <?= $nama_pasien ?></p>
                        <p>Nomor ID Pasien : <?= $idp ?></p>
                        
                        <input type="text" name="nama_pasien" value="<?= $nama_pasien ?>" hidden>
                        <br>
                        <input type="hidden" name="idp" value="<?= $idp; ?>">
                        <br>
                        <button type="submit" class="btn btn-warning" name="cetakkartu">Cetak kartu</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-body">
    </div>
      
      
</body>
</html>