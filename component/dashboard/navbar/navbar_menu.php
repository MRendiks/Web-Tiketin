<div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                    <?php if ($_SESSION['page'] == "pemesanan") {
                            ?>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Home
                        </a>
                        <a class="nav-link active" href="data_pemesanan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Pemesanan 
                        </a>
                        <a class="nav-link" href="data_perlengkapan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Perlengkapan
                        </a>
                        <a class="nav-link" href="data_costumer.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Costumer
                        </a>
                        <a class="nav-link" href="ganti_password.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Ganti Password
                        </a>  
                            <?php
                        }elseif($_SESSION['page'] == "perlengkapan"){
                        ?> 
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Home
                        </a>
                        <a class="nav-link" href="data_pemesanan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Pemesanan 
                        </a>
                        <a class="nav-link active" href="data_perlengkapan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Perlengkapan
                        </a>
                        <a class="nav-link" href="data_costumer.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Costumer
                        </a>
                        <a class="nav-link" href="ganti_password.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Ganti Password
                        </a>  
                        <?php 
                        }elseif($_SESSION['page'] == "costumer"){
                        ?>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Home
                        </a>
                        <a class="nav-link" href="data_pemesanan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Pemesanan 
                        </a>
                        <a class="nav-link" href="data_perlengkapan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Perlengkapan
                        </a>
                        <a class="nav-link active" href="data_costumer.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Costumer
                        </a>
                        <a class="nav-link" href="ganti_password.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Ganti Password
                        </a>  
                        <?php }else{?>
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Home
                        </a>
                        <a class="nav-link" href="data_pemesanan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Pemesanan 
                        </a>
                        <a class="nav-link" href="data_perlengkapan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Perlengkapan
                        </a>
                        <a class="nav-link" href="data_costumer.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Costumer
                        </a>
                        <a class="nav-link active" href="ganti_password.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Ganti Password
                        </a>  
                        <?php }?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged sebagai:</div>
                    <?php 
                    if ($_SESSION['admin'] == True) {
                        echo $_SESSION['name'];
                    }
                    else{
                        
                    }
                    ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tiketin</h1>
                    <ol class="breadcrumb mb-4">