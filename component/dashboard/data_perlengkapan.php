<?php
require '../database/koneksi.php';

$_SESSION['page'] = "perlengkapan";
require 'header/header.php';
require 'navbar/navbar_menu.php';

if (isset($_SESSION['log'])) {
} else {
    header('location:index.php');
};
?>


                        <li class="breadcrumb-item active">Data Perlengkapan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <?php 
                            if ($_SESSION['admin'] == True) {
                                echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah Perlengkapan</button>';
                            }
                            else{
                                
                            }
                            ?>
                            
                        </div>

                        <!-- TABEL GURU -->
                        <div class="card-body">
                            <?php 
                            if ($_SESSION['admin'] == True) {
                                ?>
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alat</th>
                                        <th>Jumlah Tersedia</th>
                                        <th>Harga Per Item</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambildatadokter = mysqli_query($koneksi, "SELECT * FROM perlengkapan");
                                    $i = 1;
                                    while ($data = mysqli_fetch_array($ambildatadokter)) {
                                        $idp = $data['id_perlengkapan'];
                                        $nama_alat = $data['nama_alat'];
                                        $jumlah_tersedia = $data['jumlah_tersedia'];
                                        $harga = $data['harga'];
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $nama_alat; ?></td>
                                            <td><?= $jumlah_tersedia; ?></td>
                                            <td><?= $harga; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $idp; ?>">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $idp; ?>">Delete</button>
                                            </td>
                                        </tr>
                                        <!-- Edit Modal -->
                                        <div class="modal" id="edit<?= $idp; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Perlengkapan</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                        <input type="text" name="nama_alat" value="<?= $nama_alat; ?>" class="form-control" required>
                                                        <br>
                                                        <input type="number" name="jumlah_tersedia" value="<?= $jumlah_tersedia; ?>" 
                                                        class="form-control" required>
                                                        <br>
                                                        <input type="number" name="harga" value="<?= $harga; ?>" 
                                                        class="form-control" required>
                                                        <br>
                                                            <input type="hidden" name="idp" value="<?= $idp; ?>">
                                                            <button type="submit" class="btn btn-primary" name="update_perlengkapan">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Hapus Modal -->
                                        <div class="modal" id="delete<?= $idp; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Data Perlengkapan</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            Apakah Yakin Hapus Alat <?= $nama_alat; ?> ?
                                                            <br>
                                                            <input type="hidden" name="idp" value="<?= $idp; ?>">
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="hapus_perlengkapan">Ya, Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
            </main>
<?php
require 'footer/footer.php';
?>


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Perlengkapan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <input type="text" name="nama_alat" placeholder="Nama Alat" class="form-control" required>
                    <br>
                    <input type="number" name="jumlah_tersedia" placeholder="Jumlah Tersedia" class="form-control" required>
                    <br>
                    <input type="number" name="harga" placeholder="Harga Per Item" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" name="tambah_perlengkapan">Tambah</button>
                </div>
            </form>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</html>