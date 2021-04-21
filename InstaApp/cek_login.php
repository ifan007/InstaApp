<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'connect.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM `user` where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);
	// buat session login dan username
	$_SESSION['login'] = true;
	$_SESSION['id_user'] = $data['id_user'];
	$_SESSION['nama'] = $data['nama_user'];
	$_SESSION['username'] = $username;
	// alihkan ke halaman dashboard admin
	header("location:index.php");
} else {
	header("location:login.php?pesan=gagal");
}
