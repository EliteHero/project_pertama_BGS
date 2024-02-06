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

<!DOCTYPE html>
<html lang="id-ID">

<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='admin.css'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='fontawesome/css/all.min.css'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap'>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <!--Bootstrap JavaScript-->
    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src='js/bootstrap.bundle.min.js'></script>
    <script src='https://kit.fontawesome.com/1691c9e6f1.js' crossorigin='anonymous'></script>
    <script src='script.js'></script>
    <title>Laman Utama</title>
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
                            <li><a class='dropdown-item active d-block d-md-none' href='dashboard.php'>Dashboard</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='laporan.php'>Form Laporan</a></li>
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
                            <li><a class='dropdown-item active d-block d-md-none' href='dashboard.php'>Dashboard</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='laporan.php'>Form Laporan</a></li>
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
                            <li><a class='dropdown-item active d-block d-md-none' href='dashboard.php'>Dashboard</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='laporan.php'>Form Laporan</a></li>
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
    <h3 class='mb-0 ms-5 mt-4'><strong>Selamat datang,
            <?php echo $name; ?>!
        </strong>
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
        <p style='color: darkgray;' class='ms-5'>Apa yang ingin Anda lakukan hari ini?</p>

        <?php
        include "koneksi.php";
        $query = mysqli_query($koneksi, "SELECT
    COUNT(CASE WHEN WEEK(report_time) = WEEK(NOW()) AND YEAR(report_time) = YEAR(NOW()) THEN 1 END) AS count_this_week,
    COUNT(*) AS count_total,
    COUNT(CASE WHEN status = 'Sudah ditangani' THEN 1 END) AS count_handled
    FROM
    report;");

        if ($data = mysqli_fetch_array($query)) {
            $minggu = $data["count_this_week"];
            $total = $data["count_total"];
            $handled = $data["count_handled"];
        }
        ?>

        <!--Mengambil Data-->
        <?php
        include 'koneksi.php';

        $query = mysqli_query($koneksi, 'SELECT * FROM reminder');
        $images = array();

        while ($data = mysqli_fetch_array($query)) {
            $images[] = $data['content'];
        }
        ?>

        <!--Main page-->
        <center>
            <div class='main-page p-4'>
                <div class='container-fluid carouselku'>
                    <div id='pengingat' class='carousel slide' data-bs-ride='carousel'
                        style='margin-top: 20px; border-radius: 10px; overflow: hidden;'>
                        <div class='carousel-inner'>
                            <?php
                            $firstImage = array_shift($images);
                            echo "<div class='carousel-item active'>
                            <img src='$firstImage' class='img-fluid'>
                          </div>";

                            $index = 1;
                            while ($image = array_shift($images)) {
                                echo "<div class='carousel-item'>
                                <img src='$image' class='img-fluid'>
                              </div>";
                                $index++;
                            }
                            ?>
                            <button class='carousel-control-prev' type='button' data-bs-target='#pengingat'
                                data-bs-slide='prev'>
                                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                <span class='visually-hidden'>Previous</span>
                            </button>
                            <button class='carousel-control-next' type='button' data-bs-target='#pengingat'
                                data-bs-slide='next'>
                                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                <span class='visually-hidden'>Next</span>
                            </button>
                        </div>
                    </div>
                    <div class='row my-4 report-detail'>
                        <div class='col-lg-4 col-md-4 display-2' style='font-weight: bolder;'>
                            <?php echo $minggu ?>
                            <div class='text-body' style='font-size: 15px;'>
                                Laporan Minggu Ini
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12 display-2' style='font-weight: bolder;'>
                            <?php echo $total ?>
                            <div class='text-body' style='font-size: 15px;'>
                                Total Laporan
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12 display-2' style='font-weight: bolder;'>
                            <?php echo $handled ?>
                            <div class='text-body' style='font-size: 15px;'>
                                Laporan Ditangani
                            </div>
                        </div>
                    </div>
                </div>
        </center>

        <!--Footer-->
        <footer class='bg-light text-center text-lg-start mt-5'>
            <div class='container p-4'>
                <section class='mb-4'>
                    <a class='btn btn-primary btn-floating m-1'
                        href='https://www.facebook.com/profile.php?id=61554361356326&mibextid=LQQJ4d' role='button'><i
                            class='fab fa-facebook-f'></i></a>
                    <a class='btn btn-primary btn-floating m-1' href='https://www.youtube.com/@JANGKAR' role='button'><i
                            class='fab fa-youtube'></i></a>
                    <a class='btn btn-primary btn-floating m-1'
                        href='https://instagram.com/jangkar.2023?igshid=YTQwZjQ0NmI0OA%3D%3D&utm_source=qr'
                        role='button'><i class='fab fa-instagram'></i></a>
                </section>
                <section class='mb-4'>
                    <p>
                        Batam Centre, Jl. Ahmad Yani, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29461
                    </p>
                    <p>
                        Email: jangkar4342@gmail.com
                    </p>
                </section>
            </div>
            <div class='text-center p-3 bg-light'>
                © 2023 JANGKAR
            </div>
        </footer>
</body>