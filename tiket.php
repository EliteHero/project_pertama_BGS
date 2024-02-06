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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <!--Bootstrap JavaScript-->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/1691c9e6f1.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script>
        window.onload = function () {
            toggleTanggapanForm();
            var statusDropdown = document.getElementById('statusDropdown');
            statusDropdown.addEventListener('change', toggleTanggapanForm);
        }

        function toggleTanggapanForm() {
            var statusDropdown = document.getElementById('statusDropdown');
            var tanggapanForm = document.getElementById('tanggapanForm');

            // Ngecek apakah value 'Sudah ditangani'
            if (statusDropdown.value == 'Sudah ditangani' || statusDropdown.value == 'Ditangguhkan') {
                tanggapanForm.style.display = 'block'; // Show textarea
                tanggapanForm.setAttribute('required', 'required');
            } else {
                tanggapanForm.style.display = 'none'; // Hide textarea
                tanggapanForm.removeAttribute('required');
            }
        }
    </script>
    <title>Meja Bantuan</title>
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
                            <li><a class='dropdown-item d-block d-md-none' href='laporan.php'>Form Laporan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='peta.php'>Peta Keamanan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='fpk.php'>Forum Post Komunitas</a></li>
                            <li><a class='dropdown-item active d-block d-md-none' href='tiket.php'>Meja Bantuan</a></li>
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
                            <li><a class='dropdown-item d-block d-md-none' href='laporan.php'>Form Laporan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='peta.php'>Peta Keamanan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='fpk.php'>Forum Post Komunitas</a></li>
                            <li><a class='dropdown-item active d-block d-md-none' href='tiket.php'>Meja Bantuan</a></li>
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
                <a class='navbar-brand' href='Dashboard_Admin.php'>
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
                            <li><a class='dropdown-item d-block d-md-none' href='laporan.php'>Form Laporan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='peta.php'>Peta Keamanan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='notif.php'>Notifikasi Darurat</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='fpk.php'>Forum Post Komunitas</a></li>
                            <li><a class='dropdown-item active d-block d-md-none' href='tiket.php'>Meja Bantuan</a></li>
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
    <h3 class='mb-0 ms-5 mt-4'><strong>Meja Bantuan </strong>
        <?php
        if ($role == 'resident') {
            echo "<span style='font-size: 15px;'
        class='badge rounded-pill text-bg-danger'>Masyarakat</span></h3>
        <p style='color: darkgray;' class='ms-5'>Ajukan keluhan Anda tentang website</p>";
        } elseif ($role == 'security') {
            echo "<span style='font-size: 15px;'
        class='badge rounded-pill text-bg-primary'>Petugas</span></h3>
        <p style='color: darkgray;' class='ms-5'>Ajukan keluhan Anda tentang website</p>";
        } elseif ($role == 'admin') {
            echo "<span style='font-size: 15px;'
        class='badge rounded-pill text-bg-dark'>Admin</span></h3>
        <p style='color: darkgray;' class='ms-5'>Tanggapi keluhan website di sini</p>";
        }
        ?>

        <!--Main page-->
        <center>
            <div class="main-page p-4">
                <img src="images/error.png" class="w-100 h-100">
                <!-- <?php
                if ($role == "resident" || $role == "security") {
                    echo "<div class='buat-tiket'>
                    <a href='#' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>Buat Tiket</a>
                </div>
                <br> <br>";
                }
                ?>

                <div class="text-center">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Judul</th>
                                <th scope="col" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "koneksi.php";

                            if ($role == "resident") {
                                if (isset($niksesi) && !empty($niksesi)) {
                                $query = mysqli_query($koneksi, "SELECT help_ticket.*, user.name AS pelapor, 
                            residents.user_id AS resident_user_id
                            FROM help_ticket
                            JOIN residents ON help_ticket.NIK = residents.NIK
                            JOIN user ON residents.user_id = user.user_id
                            WHERE help_ticket.NIK = $niksesi
                            ORDER BY ticketTime DESC");

                                $no = 1; // Initialize $no before the loop
                                while ($resdata = mysqli_fetch_array($query)) {
                                    $ticketTime = date('j F Y \p\a\d\a H:i', strtotime($resdata['ticketTime']));

                                    // query untuk nama admin
                                    $adminQuery = mysqli_query($koneksi, "SELECT user.name AS admin_name
                                 FROM admin
                                 JOIN user ON admin.user_id = user.user_id
                                 WHERE admin.admin_id = '" . $resdata['admin_id'] . "'");

                                    $adminData = mysqli_fetch_array($adminQuery);
                                    ?>
                                    <tr
                                        onclick="window.location='detailtiket?ticket_id=<?php echo $resdata['ticket_id'] ?>.php';">
                                        <td class='text-center'>
                                            <strong>
                                                <?php echo $resdata['title'] ?>
                                            </strong>
                                            <br>
                                            <span class='small-text'>
                                                <?php echo $ticketTime ?>
                                            </span><br>
                                            <span class='small-text'>
                                                <?php echo $resdata['pelapor'] ?>
                                            </span>
                                        </td>
                                        <td class='text-center'>
                                            <?php if ($resdata['status'] == 'Sudah ditangani'): ?>
                                                <span class='badge bg-success'>Sudah ditangani</span>
                                                <span class='small-text'>Admin:
                                                    <?php echo $adminData['admin_name']; ?>
                                                </span>
                                            <?php elseif ($resdata['status'] == 'Dalam proses'): ?>
                                                <span class='badge bg-warning'>Dalam Proses</span>
                                                <span class='small-text'>Admin:
                                                    <?php echo $adminData['admin_name']; ?>
                                                </span>
                                            <?php elseif ($resdata['status'] == 'Belum ditangani'): ?>
                                                <span class='badge bg-danger'>Belum ditangani</span>
                                            <?php else: ?>
                                                <span class='badge bg-dark'>
                                                    <?php echo $resdata['status']; ?>
                                                </span>
                                                <span class='small-text'>Admin:
                                                    <?php echo $adminData['admin_name']; ?>
                                                </span>
                                            <?php endif; ?>
                                            <br />
                                        </td>
                                    </tr>
                                    <?php
                                } //endwhile
                              }  else {
                                echo "";
                            } 
                        }elseif ($role == 'security') {
                            if (isset($niksesi) && !empty($niksesi)) {
                                $query = mysqli_query($koneksi, "SELECT help_ticket.*, user.name AS pelapor, 
                            security.user_id AS security_user_id
                            FROM help_ticket
                            JOIN security ON help_ticket.security_id = security.security_id
                            JOIN user ON security.user_id = user.user_id
                            WHERE help_ticket.security_id = $security_idsesi
                            ORDER BY ticketTime DESC");

                                $no = 1; // Initialize $no before the loop
                                while ($secdata = mysqli_fetch_array($query)) {
                                    $ticketTime = date('j F Y \p\a\d\a H:i', strtotime($secdata['ticketTime']));

                                    // query untuk nama admin
                                    $adminQuery = mysqli_query($koneksi, "SELECT user.name AS admin_name
                                 FROM admin
                                 JOIN user ON admin.user_id = user.user_id
                                 WHERE admin.admin_id = '" . $secdata['admin_id'] . "'");

                                    $adminData = mysqli_fetch_array($adminQuery);
                                    ?>
                                    <tr
                                        onclick="window.location='detailtiket?ticket_id=<?php echo $secdata['ticket_id'] ?>.php';">
                                        <td class='text-center'>
                                            <strong>
                                                <?php echo $secdata['title'] ?>
                                            </strong>
                                            <br>
                                            <span class='small-text'>
                                                <?php echo $ticketTime ?>
                                            </span><br>
                                            <span class='small-text'>
                                                <?php echo $secdata['pelapor'] ?>
                                            </span>
                                        </td>
                                        <td class='text-center'>
                                            <?php if ($secdata['status'] == 'Sudah ditangani'): ?>
                                                <span class='badge bg-success'>Sudah ditangani</span>
                                                <span class='small-text'>Admin:
                                                    <?php echo $adminData['admin_name']; ?>
                                                </span>
                                            <?php elseif ($secdata['status'] == 'Dalam proses'): ?>
                                                <span class='badge bg-warning'>Dalam Proses</span>
                                                <span class='small-text'>Admin:
                                                    <?php echo $adminData['admin_name']; ?>
                                                </span>
                                            <?php elseif ($secdata['status'] == 'Belum ditangani'): ?>
                                                <span class='badge bg-danger'>Belum ditangani</span>
                                            <?php else: ?>
                                                <span class='badge bg-dark'>
                                                    <?php echo $secdata['status']; ?>
                                                </span>
                                                <span class='small-text'>Admin:
                                                    <?php echo $adminData['admin_name']; ?>
                                                </span>
                                            <?php endif; ?>
                                            <br />
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }  else {
                            } 
                            } elseif ($role == 'admin') {
                                $query = mysqli_query($koneksi, "SELECT help_ticket.*, user.name AS pelapor, admin.user_id AS admin_user_id
                                FROM help_ticket
                                LEFT JOIN residents ON help_ticket.NIK = residents.NIK
                                LEFT JOIN security ON help_ticket.security_id = security.security_id
                                LEFT JOIN admin ON help_ticket.admin_id = admin.admin_id
                                JOIN user ON admin.user_id = user.user_id
                                ORDER BY ticketTime DESC");

                            
                                $no = 1; // Initialize $no before the loop
                                while ($admindata = mysqli_fetch_array($query)) {
                                    $ticketTime = date('j F Y \p\a\d\a H:i', strtotime($admindata['ticketTime']));
                            
                                    // query untuk nama admin
                                    $adminQuery = mysqli_query($koneksi, "SELECT user.name AS admin_name
                                            FROM admin
                                            JOIN user ON admin.user_id = user.user_id
                                            WHERE admin.admin_id = " . $admindata['admin_id']);
                            
                                    $adminData = mysqli_fetch_array($adminQuery);
                                    ?>
                                    <tr onclick="window.location='detailtiket?ticket_id=<?php echo $admindata['ticket_id'] ?>.php';">
                                        <td class='text-center'>
                                            <strong><?php echo $admindata['title'] ?></strong>
                                            <br>
                                            <span class='small-text'><?php echo $ticketTime ?></span><br>
                                            <span class='small-text'><?php echo $admindata['pelapor'] ?></span>
                                        </td>
                                        <td class='text-center'>
                                            <?php if ($admindata['status'] == 'Sudah ditangani'): ?>
                                                <span class='badge bg-success'>Sudah ditangani</span>
                                                <span class='small-text'>Admin: <?php echo $adminData['admin_name']; ?></span>
                                            <?php elseif ($admindata['status'] == 'Dalam proses'): ?>
                                                <span class='badge bg-warning'>Dalam Proses</span>
                                                <span class='small-text'>Admin: <?php echo $adminData['admin_name']; ?></span>
                                            <?php elseif ($admindata['status'] == 'Belum ditangani'): ?>
                                                <span class='badge bg-danger'>Belum ditangani</span>
                                            <?php else: ?>
                                                <span class='badge bg-dark'><?php echo $admindata['status']; ?></span>
                                                <span class='small-text'>Admin: <?php echo $adminData['admin_name']; ?></span>
                                            <?php endif; ?>
                                            <br />
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>  -->
                        
                        </div>
    </center>

    <!--Footer-->
    <footer class='bg-light text-center text-lg-start mt-5'>
        <div class='container p-4'>
            <section class='mb-4'>
                <a class='btn btn-primary btn-floating m-1' href='https://www.facebook.com/profile.php?id=61554361356326&mibextid=LQQJ4d' role='button'><i
                        class='fab fa-facebook-f'></i></a>
                <a class='btn btn-primary btn-floating m-1' href='https://www.youtube.com/@JANGKAR' role='button'><i class='fab fa-youtube'></i></a>
                <a class='btn btn-primary btn-floating m-1' href='https://instagram.com/jangkar.2023?igshid=YTQwZjQ0NmI0OA%3D%3D&utm_source=qr' role='button'><i class='fab fa-instagram'></i></a>
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