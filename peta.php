<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];
$role = $_SESSION['role'];
$niksesi = $_SESSION['NIK'];
$security_idsesi = $_SESSION['security_id'];
$admin_idsesi = $_SESSION['admin_id']
    ?>

<!-- koneksi pdo -->
<?php
$host = 'localhost';
$dbname = 'nsn';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="id-ID">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-search/dist/leaflet-search.min.css" />
    <title>Peta Keamanan</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #F3F6FC;
        }

        .sticky-top {
            z-index: 1001;
            /* Ensure the navbar is above other elements */
        }

        #map {
            height: 700px;
            width: 100%;
        }

        #options {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 15px;
            background-color: #333;
            z-index: 1000;
            border-radius: 8px;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #options label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: bold;
        }

        #options input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #555;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #444;
            color: white;
        }

        #options input[type="color"] {
            height: 38px;
        }

        #deleteButton {
            background-color: #e74c3c;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            margin-top: 10px;
        }

        #deleteButton:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body style="background-color: #F3F6FC; font-family: 'inter'; padding-top: 90px;">
    <!--Menentukan navbar-->
    <?php
    if ($role == 'resident') { ?>
        <nav class='navbar navbar-expand-lg navbar-light bg-light fixed-top border-bottom shadow-sm'>
            <div class='container mx-auto d-flex justify-content-between align-items-center position-relative'>
                <a class='navbar-brand' href='dashboard.php'>
                    <img src='images/brand.png' width='40' length='40' alt=''>
                </a>
                <div class='d-flex align-items-center'>
                    <a href='laporan.php' class='text-black' style='text-decoration: none;'>
                        <i class='fa-solid fa-file-pen fa-2x d-none d-md-block'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center'>
                    <a href='peta.php' class='text-black' style='text-decoration: none;'>
                        <i class='fa-solid fa-map-location-dot fa-2x d-none d-md-block'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center'>
                    <a href='#' class='text-red'>
                        <i class='fa-solid fa-circle-exclamation fa-4x d-none d-md-block position-absolute'
                            style='color: #ff595e; margin-bottom: -75px; margin-left: -20px;'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center'>
                    <a href='fpk.php' class='text-black' style='text-decoration: none;'>
                        <i class='fa-solid fa-comments fa-2x d-none d-md-block'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center'>
                    <a href='tiket.php' class='text-black' style='text-decoration: none;'>
                        <i class='fa-solid fa-circle-question fa-2x d-none d-md-block'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center '>
                    <div class='dropdown'>
                        <a class='btn dropdown-toggle' href='logout.php' role='button' data-bs-toggle='dropdown'
                            aria-expanded='false'>
                            <i class='fa-solid fa-bars fa-2x'></i>
                        </a>
                        <ul class='dropdown-menu dropdown-menu-end'>
                            <li><span class='dropdown-item-text'>
                                    <?php echo $name ?>
                                </span></li>
                            <li>
                                <hr class='dropdown-divider'>
                            </li>
                            <!--Tentukan mana yang aktif di laman menggunakan 'active', misal di bawah, yang aktif adalah dashboard karena sedang berada di laman dashboard-->
                            <li><a class='dropdown-item d-block d-md-none' href='dashboard.php'>Dashboard</a></li>
                            <li><a class='dropdown-item active d-block d-md-none' href='laporan.php'>Form Laporan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='peta.php'>Peta Keamanan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='fpk.php'>Forum Post Komunitas</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='tiket.php'>Meja Bantuan</a></li>
                            <li>
                                <hr class='dropdown-divider d-block d-md-none'>
                            </li>
                            <li><a class='dropdown-item' href='logout.php'>Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    <?php } elseif ($role == 'security') { ?>
        <nav class='navbar navbar-expand-lg navbar-light bg-light fixed-top border-bottom shadow-sm'>
            <div class='container mx-auto d-flex justify-content-between align-items-center position-relative'>
                <a class='navbar-brand' href='dashboard.php'>
                    <img src='images/brand.png' width='40' length='40' alt=''>
                </a>
                <div class='d-flex align-items-center'>
                    <a href='laporan.php' class='text-black' style='text-decoration: none;'>
                        <i class='fa-solid fa-file-pen fa-2x d-none d-md-block'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center'>
                    <a href='peta.php' class='text-black' style='text-decoration: none;'>
                        <i class='fa-solid fa-map-location-dot fa-2x d-none d-md-block'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center'>
                    <a href='fpk.php' class='text-black' style='text-decoration: none;'>
                        <i class='fa-solid fa-comments fa-2x d-none d-md-block'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center'>
                    <a href='tiket.php' class='text-black' style='text-decoration: none;'>
                        <i class='fa-solid fa-circle-question fa-2x d-none d-md-block'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center '>
                    <div class='dropdown'>
                        <a class='btn dropdown-toggle' href='logout.php' role='button' data-bs-toggle='dropdown'
                            aria-expanded='false'>
                            <i class='fa-solid fa-bars fa-2x'></i>
                        </a>
                        <ul class='dropdown-menu dropdown-menu-end'>
                            <li><span class='dropdown-item-text'>
                                    <?php echo $name ?>
                                </span></li>
                            <li>
                                <hr class='dropdown-divider'>
                            </li>
                            <li><a class='dropdown-item d-block d-md-none' href='Dashboard.php'>Dashboard</a></li>
                            <li><a class='dropdown-item active d-block d-md-none' href='laporan.php'>Form Laporan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='peta.php'>Peta Keamanan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='fpk.php'>Forum Post Komunitas</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='tiket.php'>Meja Bantuan</a></li>
                            <li>
                                <hr class='dropdown-divider d-block d-md-none'>
                            </li>
                            <li><a class='dropdown-item' href='logout.php'>Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    <?php } elseif ($role == 'admin') { ?>
        <nav class='navbar navbar-expand-lg navbar-light bg-light fixed-top border-bottom shadow-sm'>
            <div class='container mx-auto d-flex justify-content-between align-items-center position-relative'>
                <a class='navbar-brand' href='dashboard.php'>
                    <img src='images/brand.png' width='40' length='40' alt=''>
                </a>
                <div class='d-flex align-items-center'>
                    <a href='laporan.php' class='text-black' style='text-decoration: none;'>
                        <i class='fa-solid fa-file-pen fa-2x d-none d-md-block'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center'>
                    <a href='peta.php' class='text-black' style='text-decoration: none;'>
                        <i class='fa-solid fa-map-location-dot fa-2x d-none d-md-block'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center'>
                    <a href='notif.php' class='text-black' style='text-decoration: none;'>
                        <i class='fa-solid fa-bell fa-2x d-none d-md-block'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center'>
                    <a href='fpk.php' class='text-black' style='text-decoration: none;'>
                        <i class='fa-solid fa-comments fa-2x d-none d-md-block'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center'>
                    <a href='tiket.php' class='text-black' style='text-decoration: none;'>
                        <i class='fa-solid fa-circle-question fa-2x d-none d-md-block'></i>
                    </a>
                </div>
                <div class='d-flex align-items-center '>
                    <div class='dropdown'>
                        <a class='btn dropdown-toggle' href='logout.php' role='button' data-bs-toggle='dropdown'
                            aria-expanded='false'>
                            <i class='fa-solid fa-bars fa-2x'></i>
                        </a>
                        <ul class='dropdown-menu dropdown-menu-end'>
                            <li><span class='dropdown-item-text'>
                                    <?php echo $name ?>
                                </span></li>
                            <li>
                                <hr class='dropdown-divider'>
                            </li>
                            <!--Tentukan mana yang aktif di laman menggunakan 'active', misal di bawah, yang aktif adalah dashboard karena sedang berada di laman dashboard-->
                            <li><a class='dropdown-item d-block d-md-none' href='Dashboard.php'>Dashboard</a></li>
                            <li><a class='dropdown-item active d-block d-md-none' href='laporan.php'>Form Laporan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='peta.php'>Peta Keamanan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='notif.php'>Notifikasi Darurat</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='fpk.php'>Forum Post Komunitas</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='tiket.php'>Meja Bantuan</a></li>
                            <li>
                                <hr class='dropdown-divider d-block d-md-none'>
                            </li>
                            <li><a class='dropdown-item' href='logout.php'>Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <?php
    } //akhir navbar
    ?>

    <!-- Tombol Darurat Masyarakat Android -->
    <?php if ($role == 'resident') { ?>
        <a href='#' class='text-red fixed-button d-block d-md-none'>
            <i class='fas fa-exclamation-circle fa-4x' style='color: #ff595e'></i>
        </a>
        <?php
    }
    ?>

    <!--Header-->
    <h3 class='mb-0 ms-5 mt-4'><strong>Peta Keamanan </strong>
        <?php
        if ($role == 'resident') {
            echo "<span style='font-size: 15px;'
        class='badge rounded-pill text-bg-danger'>Masyarakat</span></h3>";
        } elseif ($role == 'security') {
            echo "<span style='font-size: 15px;'
        class='badge rounded-pill text-bg-primary'>Petugas</span></h3>";
        } elseif ($role == 'admin') {
            echo "<span style='font-size: 15px;'
        class='badge rounded-pill text-bg-dark'>Admin</span></h3>";
        }
        ?>
        <p style='color: darkgray;' class='ms-5'>Tinjau kejadian lampau di area bermarka</p>

        <!--Main page-->
    <center>
        <div class="main-page p-4" style="position: relative;">
            <div id="map"></div>
            <?php
            if ($role == "admin" || $role == "security") { 
            ?>
            <div id="options">
                <label for="colorPicker">Marker Color:</label>
                <input type="color" id="colorPicker" onchange="updateColor()" value="#000000">
                <br>
                <label for="descriptionInput">Marker Description:</label>
                <input type="text" id="descriptionInput" oninput="updateDescription()">
                <br>
                <label for="datetimeInput">Event Date and Time:</label>
                <input type="datetime-local" id="datetimeInput" onchange="updateDatetime()">
                <br>
                <!-- <button id="deleteButton" onclick="deleteSelectedMarker()">Delete Selected Marker</button> -->
            </div>

            <div class="container mt-5">
                <form action="petatambah.php" method="post" onsubmit='return validateDatetime()'>
              
                  <div class="form-row">
                    <div class="form-group col-lg-6 col-12">
                      <label for="marker_color">Warna Marka</label>
                      <input type="text" class="form-control" id="marker_color" name="marker_color" required>
                    </div>
              
                    <div class="form-group col-lg-6 col-12">
                      <label for="marker_desc">Deskripsi Marka</label>
                      <input type="text" class="form-control" id="marker_desc" name="marker_desc"  required>
                    </div>
                  </div>
              
                  <div class="form-row">
                    <div class="form-group col-lg-6 col-12">
                      <label for="marker_date">Tanggal dan Waktu Marka</label>
                      <input type="text" class="form-control" id="marker_date" name="marker_date" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-lg-6 col-12">
                          <label for="marker_lat">Garis Lintang</label>
                          <input type="text" class="form-control" id="marker_lat" name="marker_lat" required>
                        </div>
                      </div>
              
                    <div class="form-group col-lg-6 col-12">
                      <label for="marker_long">Garis Bujur</label>
                      <input type="text" class="form-control" id="marker_long" name="marker_long" required>
                    </div>
                  </div>
                  
                  <br>

                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>
              <?php
            }
              ?>
        </div>
    </center>

    <!--Footer-->
    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="container p-4">
            <section class="mb-4">
                <a class="btn btn-primary btn-floating m-1"
                    href="https://www.facebook.com/profile.php?id=61554361356326&mibextid=LQQJ4d" role="button"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-primary btn-floating m-1" href="https://www.youtube.com/@JANGKAR" role="button"><i
                        class="fab fa-youtube"></i></a>
                <a class="btn btn-primary btn-floating m-1"
                    href="https://instagram.com/jangkar.2023?igshid=YTQwZjQ0NmI0OA%3D%3D&utm_source=qr" role="button"><i
                        class="fab fa-instagram"></i></a>
            </section>
            <section class="mb-4">
                <p>
                    Batam Centre, Jl. Ahmad Yani, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29461
                </p>
                <p>
                    Email: jangkar4342@gmail.com
                </p>
            </section>
        </div>
        <div class="text-center p-3 bg-light">
            © 2023 JANGKAR
        </div>
    </footer>


    <!--Bootstrap JavaScript-->
    <?php
$query = "SELECT latitude, longitude, date_time, mark_color, incident_desc FROM map_mark";
$statement = $pdo->prepare($query);
$statement->execute();

$markers = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<script>
// Embedding marker data directly in the JavaScript code
var markersData = <?php echo json_encode($markers); ?>;

function validateDatetime() {
// Mendapatkan nilai datetime dari formulir
var submittedDatetime = new Date(document.getElementById('marker_date').value);
        
// Mendapatkan waktu saat ini
var currentDatetime = new Date();

// Memeriksa apakah submittedDatetime berada dalam rentang yang diizinkan
if (submittedDatetime > currentDatetime) {
    alert("Error: Waktu tidak boleh di masa depan.");
    return false;
    }
    return true;
    }

</script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/1691c9e6f1.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-search/dist/leaflet-search.min.js"></script>
    <script src="mainOri.js"></script>
</body>