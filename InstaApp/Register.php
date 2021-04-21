<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="ifan" content="register">
  <link rel="stylesheet" href="css/Style1.css">
  <title>Register</title>
</head>

<body>
  <div class="register-page">
    <div class="form">
      <form class="login-form" action="" method="post">
        <h2>Register</h2>
        <input type="text" name="nama" placeholder="Nama" />
        <input type="text" name="username" placeholder="username" />
        <input type="password" name="password" placeholder="password" />
        <button type="submit" name="submit">Register</button>
        <p class="message">Sudah Mempunyai Akun? <a href="login.php">Login Disini</a></p>
      </form>
    </div>
  </div>
</body>

</html>
<?php
$default = "default.jpg";
include "connect.php";
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
if (
  isset($_POST['submit']) and !empty($_POST['nama']) and !empty($_POST['username'])
  and !empty($_POST['password'])
) {
  $sql = "INSERT INTO user (id_user,nama_user,username,password,profile) VALUES (null,'$nama','$username','$password',
    '$default')";

  if ($koneksi->query($sql) == true) {
    echo "berhasil tambah data";
  } else {
    echo "Gagal menambahkan Data " . $koneksi->error;
  }
} else {
  echo "Data Tidak Boleh Kosong";
}
?>