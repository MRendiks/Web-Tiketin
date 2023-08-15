<?php
require '../database/koneksi.php';

$_SESSION['page'] = "pemesanan";
require 'header/header.php';
require 'navbar/navbar_menu.php';

if (isset($_SESSION['log'])) {
} else {
    header('location:index.php');
};
?>


                        <li class="breadcrumb-item active">Data Pemesanan</li>
                    </ol>
                    <div class="card mb-4">


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
                                        <th>Kategori</th>
                                        <th>Nama Perlengkapan</th>
                                        <th>Jumlah Alat yang dipinjam</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Total Bayar</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data_pesan = mysqli_query($koneksi, "SELECT pembayaran.bukti_bayar,pembayaran.id_bayar, user.nama, perlengkapan.nama_alat, tiket.jumlah_pinjam_alat, pembayaran.tgl_bayar AS tanggal_pesan, pembayaran.total_bayar, pembayaran.status, user.kategori FROM pembayaran INNER JOIN tiket ON pembayaran.id_tiket = tiket.id_tiket INNER JOIN perlengkapan on tiket.id_perlengkapan = perlengkapan.id_perlengkapan INNER JOIN user ON tiket.id_user = user.id_user;");
                                    $i = 1;
                                    while ($data = mysqli_fetch_array($data_pesan)) {
                                        $nama = $data['nama'];
                                        $nama_alat = $data['nama_alat'];
                                        $jumlah_pinjam_alat = $data['jumlah_pinjam_alat'];
                                        $tgl_bayar = $data['tanggal_pesan'];
                                        $status = $data['status'];
                                        $kategori = $data['kategori'];
                                        $total_bayar = $data['total_bayar'];
                                        $idp = $data['id_bayar'];
                                        $bukti_bayar = $data['bukti_bayar'];
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $nama; ?></td>
                                            <td><?= $kategori; ?></td>                                            
                                            <td><?= $nama_alat; ?></td>
                                            <td><center><?= $jumlah_pinjam_alat; ?> Alat</center></td>
                                            <td><?= $tgl_bayar; ?></td>
                                            <td>Rp.<?= $total_bayar; ?></td>
                                            <?php 
                                            if ($status == "SUDAH BAYAR"){
                                                ?>
                                            <td><span class="badge badge-success"><?= $status; ?></span</td>
                                            <?php }else{ ?>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#verifikasi<?= $idp; ?>">Verifikasi</button>
                                            </td>
                                            <?php 
                                            }?>
                                            <td>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $idp; ?>">Delete</button>
                                            </td>
                                        </tr>
                                

                                        <!-- Hapus Modal -->
                                        <div class="modal" id="delete<?= $idp; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Data Pemesanan</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            Apakah Yakin Hapus Pemesanan <?= $nama; ?> ?
                                                            <br>
                                                            <input type="hidden" name="idp" value="<?= $idp; ?>">
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="hapuspesan">Ya, Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal" id="verifikasi<?= $idp; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Verifikasi Pembayaran</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            Verifikasi Pembayaran yang dilakukan oleh <?= $nama; ?> ?
                                                            <br>
                                                            <br>
                                                            <center><img src="<?= $bukti_bayar ?>" alt="Bukti Bayar" width="450px" height="450px"></center>
                                                            <br>
                                                            <input type="hidden" name="idp" value="<?= $idp; ?>">
                                                            <br>
                                                            <button type="submit" class="btn btn-success" name="verifikasibayar">Ya, Verifikasi</button>
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