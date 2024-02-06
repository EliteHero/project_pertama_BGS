<?php
session_start();

// Cek apakah tombol "logout" diklik
    session_destroy();

    // Alihkan pengguna ke halaman login
    header('Location: index.php');
    exit;
?>