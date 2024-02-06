<?php
// insert_marker.php
session_start();
require_once 'koneksi.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $latitude = $_POST["marker_lat"];
    $longitude = $_POST["marker_long"];
    $color = $_POST["marker_color"];
    $description = $_POST["marker_desc"];
    $datetime = $_POST["marker_date"];
    $security_id = $_SESSION["security_id"];
    $admin_id = $_SESSION["admin_id"];

    // Perform database insertion
    if ($security_id == NULL) {
        $insertSql = "INSERT INTO map_mark (latitude, longitude, mark_color, incident_desc, date_time, admin_id)
                  VALUES (?, ?, ?, ?, ?, '$admin_id')";
    } else {
        $insertSql = "INSERT INTO map_mark (latitude, longitude, mark_color, incident_desc, date_time, security_id)
                  VALUES (?, ?, ?, ?, ?, '$security_id')";
    }   

    $stmt = $koneksi->prepare($insertSql);

    if ($stmt) {
        $stmt->bind_param("ddsss", $latitude, $longitude, $color, $description, $datetime);
        $stmt->execute();
        $stmt->close();

        header("Location: peta.php");
        exit();
    }
}
?>
