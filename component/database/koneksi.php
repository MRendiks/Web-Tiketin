<?php
session_start();

//Membuat Koneksi ke Database
$koneksi = mysqli_connect("localhost", "root", "", "tiketin");

//Cek Koneksi Database
if (mysqli_connect_error()) {
	echo "koneksi database gagal :" . mysqli_connect_error();
}


//INSERT
if (isset($_POST['tambah_user'])) {
	$nama_user = $_POST['nama_user'];
	$username = $_POST['username'];
	$no_telp = $_POST['no_telp'];
	$password = $_POST['password'];
	
	$addperlengkapan = mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$password','$nama_user', '$no_telp')") or die("Erro in query $addperlengkapan.".mysqli_error($koneksi));
	if ($addperlengkapan) {
		header("location:data_costumer.php");
	}else{
		header('location:data_costumer.php');
	}
}


if (isset($_POST['tambah_perlengkapan'])) {
	$nama_user = $_POST['nama_alat'];
	$jumlah_tersedia = $_POST['jumlah_tersedia'];
	$harga = $_POST['harga'];
	
	$addperlengkapan = mysqli_query($koneksi, "INSERT INTO perlengkapan VALUES('', '$nama_alat', '$jumlah_tersedia', '$harga')") or die("Erro in query $addperlengkapan.".mysqli_error($koneksi));
	if ($addperlengkapan) {
		header("location:data_perlengkapan.php");
	}else{
		header('location:data_perlengkapan.php');
	}
}

#UPDATE

if(isset($_POST['update_perlengkapan'])) {
	$idp = $_POST['idp'];
	$nama_alat = $_POST['nama_alat'];
	$jumlah_tersedia = $_POST['jumlah_tersedia'];
	$harga = $_POST['harga'];

	$update = mysqli_query($koneksi, "UPDATE perlengkapan SET nama_alat='$nama_alat', jumlah_tersedia='$jumlah_tersedia', harga='$harga' WHERE id_perlengkapan='$idp'");

	if ($update) {
		header("location:data_perlengkapan.php");
	}else{
		header("location:data_perlengkapan.php");
	}
}

if(isset($_POST['update_user'])) {
	$ids = $_POST['ids'];
	$nama_user = $_POST['nama_user'];
	$username = $_POST['username'];
	$kategori = $_POST['kategori'];
	$no_telp = $_POST['no_telp'];

	$update = mysqli_query($koneksi, "UPDATE user SET nama='$nama_user', username='$username', no_telp='$no_telp', kategori='$kategori' WHERE id_user='$ids'");

	if ($update) {
		header("location:data_costumer.php");
	}else{
		header("location:data_costumer.php");
	}
}


if (isset($_POST['updatepassword'])) {
	$id_admin = $_POST['id_admin'];
	$password = $_POST['password'];

	$update = mysqli_query($koneksi, "UPDATE admin SET password='$password' WHERE id_admin='$id_admin'");
	if ($update) {
		header("location:ganti_password.php");
	}else{
		header("location:ganti_password.php");
	}
}



// HAPUS DATA



//HapusPesan
if (isset($_POST['hapuspesan'])) {
	$idp = $_POST['idp'];

	$hapus = mysqli_query($koneksi, "delete from pembayaran where id_bayar='$idp'");

	if ($hapus) {
		header("location:data_pemesanan.php");
	} else {
		header("location:data_pemesanan.php");
	}
}

//Hapus perlengkapan
if (isset($_POST['hapus_perlengkapan'])) {
	$idp = $_POST['idp'];

	$hapus = mysqli_query($koneksi, "delete from perlengkapan where id_perlengkapan='$idp'");

	if ($hapus) {
		header("location:data_perlengkapan.php");
	} else {
		header("location:data_perlengkapan.php");
	}
}

if (isset($_POST['hapus_user'])) {
	$ids = $_POST['ids'];

	$hapus = mysqli_query($koneksi, "DELETE FROM user where id_user='$ids'");

	if ($hapus) {
		header("location:data_costumer.php");
	} else {
		header("location:data_costumer.php");
	}
}

if (isset($_POST['verifikasibayar'])) {
	$idp = $_POST['idp'];

	$update = mysqli_query($koneksi, "UPDATE pembayaran SET status='SUDAH BAYAR' where id_bayar='$idp'");

	if ($update) {
		header("location:data_pemesanan.php");
	} else {
		header("location:data_pemesanan.php");
	}
}

?>