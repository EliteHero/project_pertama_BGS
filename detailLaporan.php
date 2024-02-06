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
    <title>Detail Laporan</title>
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
    <h3 class='mb-0 ms-5 mt-4'><strong>Form Laporan - Detail </strong>
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
        <p style='color: darkgray;' class='ms-5'>Lihat detail laporan</p>

        <!--mengambil data laporan dll-->
        <?php
        include("koneksi.php");

        if (isset($_GET['report_id'])) {
            $report_id = $_GET['report_id'];

            $query = mysqli_query($koneksi, "SELECT report.*, user.name AS pelapor, residents.user_id AS resident_user_id
                                        FROM report
                                        JOIN residents ON report.NIK = residents.NIK
                                        JOIN user ON residents.user_id = user.user_id
                                        WHERE report.report_id = $report_id");

            if ($data = mysqli_fetch_array($query)) {
                $reportTitle = $data['report_title'] ? $data['report_title'] : 'Panggilan Darurat';
                $reportTime = date('j F Y \p\a\d\a H:i', strtotime($data['report_time']));
                $pelapor = $data['pelapor'];
                $incidentTime = date('j F Y \p\a\d\a H:i', strtotime($data['incident_time']));
                $description = $data['report_description'];
                $status = $data['status'];
                $security_id = $data['security_id'];
                $tanggapan = $data['response'];

                if ($data['status'] != 'Belum ditangani') {
                    $securityQuery = mysqli_query($koneksi, "SELECT user.name AS security_name
                                                    FROM security
                                                    JOIN user ON security.user_id = user.user_id
                                                    WHERE security.security_id = '$security_id'");
                    $securityData = mysqli_fetch_array($securityQuery);
                    $securityName = $securityData['security_name'];
                }
            } else {
                die("Laporan tidak ada");
            }
        } else {
            die("ID Laporan tidak tersedia");
        }
        ?>

        <!--Main page-->
        <div class="d-flex align-items-center justify-content-center">
            <div class="main-page p-4">
                <div class="container">
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <p class="text-muted mb-2 col-3"><a href="laporan.php" class="btn btn-secondary">
                                    Kembali
                                </a>
                                <?php if ($status == "Belum ditangani") {
                                    echo "<span class='badge text-bg-danger ms-4'>Belum
                                ditangani</span>";
                                } elseif ($status == "Dalam proses") {
                                    echo "<span class='badge text-bg-warning ms-4'>Dalam
                                proses</span>";
                                } elseif ($status == "Sudah ditangani") {
                                    echo "<span class='badge text-bg-success ms-4'>Sudah
                                ditangani</span>";
                                } else {
                                    echo "<span class='badge text-bg-dark ms-4'>Ditangguhkan</span>";
                                }
                                ?>
                            </p>

                            <!--awal form-->
                            <form action="laporanedit.php" method="post">
                                <input type="hidden" name="report_id" value="<?php echo $report_id ?>">
                                <!--Dropdown petugas-->
                                <?php
                                if (
                                    ($role == 'security' && 
                                    ($status == 'Belum ditangani' || $security_idsesi == $security_id && 
                                    ($status == 'Dalam proses' || $status == 'Sudah ditangani' || $status == 'Ditangguhkan')))
                                ) {
                                    echo "<select name='status' id='statusDropdown'>";

                                    $statuses = array('Belum ditangani', 'Dalam proses', 'Sudah ditangani', 'Ditangguhkan');

                                    foreach ($statuses as $statusOption) {
                                        echo "<option value='$statusOption'";

                                        // Check if the current status matches the option, and add 'selected' attribute
                                        if ($statusOption == $status) {
                                            echo " selected='selected'";
                                        }

                                        echo ">$statusOption</option>";
                                    }

                                    echo "</select>";
                                }
                                ?>
                        </div>
                        <table>
                            <tr>
                                <th class="col-2">Nama Pelapor</th>
                                <th>:</th>
                                <td>
                                    <?php echo $pelapor ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Judul</th>
                                <th>:</th>
                                <td>
                                    <?php echo $reportTitle ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal/Waktu</th>
                                <th>:</th>
                                <td>
                                    <?php echo $incidentTime ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><textarea name="" id="" class="col-12 px-2" style="border: 1px solid;"
                                        rows="7" disabled><?php echo $description ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="3">Tanggapan<br>
                                    <?php
                                    if ($status == "Belum ditangani") {
                                        echo "<p class='text-muted' style='font-size: 14px;'>Laporan belum ditangani</p>";
                                    } elseif ($status == "Dalam proses") {
                                        echo "<p>Laporan sedang diproses oleh: $securityName</p>";
                                    } elseif ($status == "Sudah ditangani") {
                                        echo "<p>Laporan sudah ditangani oleh: $securityName</p>";
                                    } else {
                                        echo "<p>Laporan ditangguhkan oleh: $securityName</p>";
                                    }
                                    ?>
                                </th>
                            </tr>
                            <tr>
                                <td colspan='3'><textarea name='tanggapan' id='tanggapanForm' class='col-12 px-2'
                                        style='border: 1px solid;' rows='5' <?php echo (($role != 'security') || ($_SESSION['security_id'] != $security_id)) ? 'disabled' : ''; ?>><?php echo $tanggapan; ?></textarea></td>
                            </tr>
                        </table>

                    </div>
                </div>
                <div class="d-flex justify-content-center mb-2">
                    <?php
                    if (
                        ($role == 'security' && $status == 'Belum ditangani') ||
                        ($role == 'security' && $status == 'Dalam proses' && $security_idsesi == $security_id) ||
                        ($role == 'security' && $status == 'Sudah ditangani' && $security_idsesi == $security_id) ||
                        ($role == 'security' && $status == 'Ditangguhkan' && $security_idsesi == $security_id)
                    ) {
                        echo "<button class='btn btn-success' type='submit'>
                            Simpan
                        </button>";
                    }
                    ?>

                </div>
                </form>
            </div>
        </div>

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