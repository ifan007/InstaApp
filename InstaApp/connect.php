<?php
$koneksi = new mysqli("localhost", "root", "", "test");
if ($koneksi->connect_errno) {
     die("Failed To Connect to MySQL" . $koneksi->connect_error);
}
