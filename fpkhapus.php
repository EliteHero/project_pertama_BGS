<?php
session_start();
include("koneksi.php");

$postId = $_GET['post_id'];
$parent = $_GET['parent'];

$result = mysqli_query($koneksi, "DELETE FROM post WHERE post_id = '$postId'");

if ($result) {
    if ($parent != NULL) {
    header("location:detailfpk.php?post_id=$parent");
    } else {
    header("location:fpk.php");
    }
} else {
    echo "Error: " . $result . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
