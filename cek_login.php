<?php
session_start();

include 'koneksi.php';

// Mengambil data login dari pengguna
$username = $_POST['username'];
$password = $_POST['password'];

// Menghindari SQL injection
$username = mysqli_real_escape_string($koneksi, $username);
$password = mysqli_real_escape_string($koneksi, $password);

// Mengambil data pengguna berdasarkan username dan password
$query = "SELECT u.*, s.security_id, r.NIK, a.admin_id
          FROM user u
          LEFT JOIN security s ON u.user_id = s.user_id
          LEFT JOIN residents r ON u.user_id = r.user_id
          LEFT JOIN admin a ON u.user_id = a.user_id
          WHERE u.username = '$username' AND u.password = '$password'";

$data = mysqli_query($koneksi, $query);

// Memeriksa hasil query
if (mysqli_num_rows($data) > 0) {
    $row = mysqli_fetch_array($data);

    $_SESSION["user_id"] = $row["user_id"];
    $_SESSION["name"] = $row["name"];
    $_SESSION['role'] = $row["role"];

    $_SESSION['security_id'] = $row["security_id"];
    $_SESSION['NIK'] = $row["NIK"];
    $_SESSION['admin_id'] = $row["admin_id"];


    header('location:dashboard.php');
} else {
    echo "<script>alert('Error: Akun tidak ditemukan.')</script>";
    echo "<script>window.location.href='index.php';</script>";
}
?>