<?php
session_start();
include 'koneksi.php';

date_default_timezone_set('Asia/Jakarta');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['judul'];
    $content = $_POST['konten'];
    $parent = $_POST['parent'];
    $date_time = date("Y-m-d H:i:s");
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO post (title, content, parent, date_time, user_id) VALUES ('$title', '$content', '$parent', '$date_time', '$user_id')";

    if ($koneksi->query($sql) == TRUE) {
        header("location:detailfpk.php?post_id=$parent");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>