<?php
require '../database/koneksi.php';

$_SESSION['page'] = "home";

require 'header/header.php';
require 'navbar/navbar.php';

if (isset($_SESSION['log'])) {
} else {
    header('location:index.php');
};
?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid mt-5">  
                    <!-- Content Row -->
                    <div class="row">

                        <!-- pemesanan Card -->
                        
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                            Pemesanan</div>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT COUNT(*) totalpesan FROM pembayaran");
                                        $datauser = mysqli_fetch_array($query);
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $datauser['totalpesan'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- perlengkapan Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                            Perlengkapan</div>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT COUNT(*) totalperlengkapan FROM perlengkapan");
                                        $datadokter = mysqli_fetch_array($query);
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $datadokter['totalperlengkapan'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- costumer Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                            Costumer</div>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT COUNT(*) totaluser FROM user");
                                        $datadokter = mysqli_fetch_array($query);
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $datadokter['totaluser'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- costumer Anak-Anak Card -->
                         <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                            Costumer ANAK_ANAK</div>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT COUNT(*) totaluser FROM user WHERE kategori='ANAK-ANAK'");
                                        $datadokter = mysqli_fetch_array($query);
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $datadokter['totaluser'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- costumer Anak-Anak Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                            Costumer DEWASA</div>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT COUNT(*) totaluser FROM user WHERE kategori='DEWASA'");
                                        $datadokter = mysqli_fetch_array($query);
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $datadokter['totaluser'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </main>

<?php 
require 'footer/footer.php';
?>