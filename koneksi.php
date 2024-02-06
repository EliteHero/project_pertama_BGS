<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nsn";

// Menggunakan mysqli_connect
$koneksi = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>