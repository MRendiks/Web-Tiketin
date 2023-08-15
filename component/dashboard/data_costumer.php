<?php
require '../database/koneksi.php';

$_SESSION['page'] = "costumer";
require 'header/header.php';
require 'navbar/navbar_menu.php';

if (isset($_SESSION['log'])) {
} else {
    header('location:index.php');
};
?>

                        <li class="breadcrumb-item active">Data user</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <?php 
                            if ($_SESSION['admin'] == True) {
                                echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah user</button>';
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
                                        <th>Nama Costumer</th>
                                        <th>username</th>
                                        <th>Kategori</th>
                                        <th>No Telephon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambildatauser = mysqli_query($koneksi, "SELECT * FROM user");
                                    $i = 1;
                                    while ($data = mysqli_fetch_array($ambildatauser)) {
                                        $ids = $data['id_user'];
                                        $nama_user = $data['nama'];
                                        $username = $data['username'];
                                        $no_telp = $data['no_telp'];
                                        $kategori = $data['kategori'];
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $nama_user; ?></td>
                                            <td><?= $username; ?></td>
                                            <td><?= $kategori; ?></td>                                            
                                            <td><?= $no_telp; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $ids; ?>">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $ids; ?>">Delete</button>
                                            </td>
                                        </tr>
                                        <!-- Edit Modal -->
                                        <div class="modal" id="edit<?= $ids; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit User</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama_user" value="<?= $nama_user; ?>" class="form-control" required>
                                                        <br>
                                                        <label>Password</label>
                                                        <input type="text" name="username" value="<?= $username; ?>" class="form-control" required>
                                                        <br>
                                                        <label>Kategori</label>
                                                        <select name="kategori" class="form-control" style="color: black; border-radius: 50px;" required>
                                                            <option value="ANAK-ANAK">ANAK-ANAK</option>
                                                            <option value="DEWASA">DEWASA</option>
                                                        </select>
                                                        <br>                           
                                                        <label>No Telephon</label>
                                                        <input type="text" name="no_telp" value="<?= $no_telp; ?>" class="form-control" required>
                                                        <br>
                                                            <input type="hidden" name="ids" value="<?= $ids; ?>">
                                                            <button type="submit" class="btn btn-primary" name="update_user">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Hapus Modal -->
                                        <div class="modal" id="delete<?= $ids; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Data user</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            Apakah Yakin Hapus user <?= $nama_user; ?> ?
                                                            <br>
                                                            <input type="hidden" name="ids" value="<?= $ids; ?>">
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="hapus_user">Ya, Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }}
                                    ?>
                                </tbody>
                            </table>

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
                <h4 class="modal-title">Tambah user Baru</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <input type="text" name="nama_user" placeholder="Nama user" class="form-control" required>
                    <br>
                    <input type="text" name="username" placeholder="username" class="form-control" required>
                    <br>
                    <label>Kategori</label>
                    <select name="kategori" class="form-control" style="color: black; border-radius: 50px;" required>
                        <option value="ANAK-ANAK">ANAK-ANAK</option>
                        <option value="DEWASA">DEWASA</option>
                    </select>
                    <br>   
                    <input type="text" name="password" placeholder="Password" class="form-control" required>
                    <br>
                    <input type="text" name="no_telp" placeholder="No Telephon" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" name="tambah_user">Tambah</button>
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