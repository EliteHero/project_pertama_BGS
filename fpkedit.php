<?php
session_start();
include("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $parent = $_POST['parent'];
    $postId = $_POST['post_id'];
    $title = $_POST['judul'];
    $content = $_POST['konten'];
    
    $updateQuery = mysqli_query($koneksi, "UPDATE post SET title = '$title', content = '$content' WHERE post_id = '$postId'");

    if ($updateQuery) {
        if ($parent == NULL) {
            echo '<script>window.location.href = "detailfpk.php?post_id=' . $postId . '";</script>';
            exit;
        } else {
            echo '<script>window.location.href = "detailfpk.php?post_id=' . $parent . '";</script>';
            exit;
        }
    } else {
        echo "Error: " . $updateQuery . "<br>" . $koneksi->error;
    }
} 

$koneksi->close();
?>
