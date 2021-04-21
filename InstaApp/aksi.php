<?php
include "connect.php";
session_start();

if (isset($_POST['upload'])) {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['file']['name'];
    $caption = $_POST['caption'];

    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp, "image/" . $_FILES['file']['name']);
    $id_user = $_SESSION['id_user'];
    $simpan = mysqli_query($koneksi, "INSERT INTO upload(id_upload,foto,caption,id_user) VALUES ('', '$nama','$caption','$id_user')");
    if ($koneksi->query("INSERT INTO upload(id_upload,foto,caption,id_user) VALUES ('', '$nama','$caption','$id_user')") == true) {
        echo "<script> alert('berhasil upload file') document.location='index.php'</script>";
    } else {
        echo "<script>alert('gagal upload file') document.location='index.php'</script>";
    }
}
