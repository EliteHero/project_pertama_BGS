<?php
session_start();
include 'koneksi.php';

date_default_timezone_set('Asia/Jakarta');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_title = $_POST['judul'];
    $report_description = $_POST['deskripsi'];
    $report_time = date("Y-m-d H:i:s");
    $incident_time = $_POST['datetime'];
    $nik = $_SESSION['NIK'];

    $sql = "INSERT INTO report (report_title, report_description, report_time, incident_time, NIK) VALUES ('$report_title', '$report_description', '$report_time', '$incident_time', '$nik')";

    if ($koneksi->query($sql) == TRUE) {
        header("location:laporan.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>