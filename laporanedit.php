<?php
session_start();
include("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $reportId = $_POST['report_id'];
    $status = $_POST['status'];
    $tanggapan = '';

    if ($status == 'Dalam Proses' || $status == 'Belum ditangani') {
        $tanggapan = NULL;
    } elseif ($status == 'Sudah ditangani' || $status == 'Ditangguhkan') {
        $tanggapan = $_POST['tanggapan'];
    }

    $security_id = $_SESSION['security_id'];

    $checkQuery = mysqli_query($koneksi, "SELECT security_id FROM report WHERE report_id = '$reportId' AND security_id != '$security_id'");
    if(mysqli_num_rows($checkQuery) > 0) {
        echo "<script>alert('Error: Sudah ada petugas lain yang sedang atau sudah menangani ini.')</script>";
        echo "<script>window.location.href='detaillaporan.php?report_id=$reportId';</script>";
        exit;
    }

    if ($status == 'Belum ditangani') {
        $updateQuery = mysqli_query($koneksi, "UPDATE report SET status = '$status', response = NULL, security_id = NULL WHERE report_id = '$reportId'");
    } else {
        $updateQuery = mysqli_query($koneksi, "UPDATE report SET status = '$status', response = '$tanggapan', security_id = '$security_id' WHERE report_id = '$reportId'");
    }

    if ($updateQuery) {
        header("location: detaillaporan.php?report_id=$reportId");
    } else {
        echo "Error: " . $updateQuery . "<br>" . $koneksi->error;
    }
} 

$koneksi->close();
?>
