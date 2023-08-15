<?php 
require '../component/database/koneksi.php';

//Cek login
if (isset($_POST['bayar'])) {
    $jumlah_alat_pinjam = $_SESSION['jumlah_alat_pinjam'];
    $id_tiket = isset($_POST['id_tiket']) ? $_POST['id_tiket'] : '';
    $total_bayar = isset($_POST['total_bayar']) ? $_POST['total_bayar'] : '';
    $pembayaran = $_POST['pembayaran'];
    $gambar         = $_FILES['gambar']['tmp_name'];
    $img = imagecreatefromjpeg($gambar);
    $nama_gambar    = $_FILES['gambar']['name'];
    $letak_file = imagejpeg($img,'../component/bukti_bayar/' . $nama_gambar); 
    $letak_file = '../bukti_bayar/' . $nama_gambar;
    //Mencocokan data
    $query = mysqli_query($koneksi, "INSERT INTO pembayaran values('', '$id_tiket', CURDATE(),'$pembayaran' , '$letak_file','$total_bayar' , '')") or die("Erro in query $query.".mysqli_error($koneksi));
    $query2 = mysqli_query($koneksi, "UPDATE perlengkapan set jumlah_tersedia=jumlah_tersedia-'$jumlah_alat_pinjam'") or die("Erro in query2 $query2.".mysqli_error($koneksi));
    if ($query2) {
      echo "<script language='javascript'>
       window.alert('Berhasil Bayar.');
       window.location.href='home.php';
       </script>
       "; 
    }else{
      echo "<script language='javascript'>
       window.alert('Gagal Bayar.');
       window.location.href='pembayaran.php';
       </script>
       "; 
    }    
};

?>