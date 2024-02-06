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
        <script>
        function validateDatetime() {
        // Mendapatkan nilai datetime dari formulir
        var submittedDatetime = new Date(document.getElementById('date').value);
        
        // Mendapatkan waktu saat ini
        var currentDatetime = new Date();

        // Menghitung waktu satu bulan yang lalu
        var oneMonthAgo = new Date(currentDatetime);
        oneMonthAgo.setMonth(oneMonthAgo.getMonth() - 1);

        // Memeriksa apakah submittedDatetime berada dalam rentang yang diizinkan
        if (submittedDatetime > currentDatetime || submittedDatetime < oneMonthAgo) {
            alert("Error: Waktu tidak boleh lebih lama dari satu bulan yang lalu atau di masa depan.");
            return false;
        }

        return true;
        }
        </script>
        <title>Form Laporan</title>
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
                            <li><span class='dropdown-item-text'><?php echo $name ?></span></li>
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
                        <li><span class='dropdown-item-text'><?php echo $name ?></span></li>
                        <li>
                            <hr class='dropdown-divider'>
                        </li>
                        <li><a class='dropdown-item d-block d-md-none'
                                href='dashboard.php'>Dashboard</a></li>
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
                        <li><span class='dropdown-item-text'><?php echo $name ?></span></li>
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
    <h3 class='mb-0 ms-5 mt-4'><strong>Form Laporan </strong><?php
    if ($role == 'resident') {
        echo "<span style='font-size: 15px;'
        class='badge rounded-pill text-bg-danger'>Masyarakat</span></h3>
        <p style='color: darkgray;' class='ms-5'>Laporkan kejadian di sini</p>";
    } elseif ($role == 'security') {
        echo "<span style='font-size: 15px;'
        class='badge rounded-pill text-bg-primary'>Petugas</span></h3>
        <p style='color: darkgray;' class='ms-5'>Tangani laporan di sini</p>";
    } elseif ($role == 'admin') {
        echo "<span style='font-size: 15px;'
        class='badge rounded-pill text-bg-dark'>Admin</span></h3>
        <p style='color: darkgray;' class='ms-5'>Tinjau laporan di sini</p>";
    }
    ?>
    
    <!--Main page-->
    <div class='d-flex align-items-center justify-content-center'>
        <div class='main-page p-4'>
            <div class='container mt-5'>
                <div class='d-flex justify-content-between align-items-center mb-2'>
                    <h2 class='mb-0'>Belum Ditangani</h2>
                    <!--Tombol tambah laporan untuk masyarakat-->
                    <?php
                    if ($role == 'resident') {
                        echo "<a href='#' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                        Tambah Laporan
                    </a>";
                    } 
                    ?>                    
                </div>
                <div class='text-center'>
                    <table class='table table-hover'>
                        <thead>
                            <tr>
                                <th scope='col' class='text-center'>Judul</th>
                                <th scope='col' class='text-center'>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--Mengambil data sql yang diperlukan-->
                            <?php
                            include("koneksi.php");
                        
                            $query = mysqli_query($koneksi, "SELECT report.*, user.name AS pelapor, 
                            residents.user_id AS resident_user_id
                            FROM report
                            JOIN residents ON report.NIK = residents.NIK
                            JOIN user ON residents.user_id = user.user_id
                            WHERE report.status IN ('Belum ditangani', 'Dalam proses')
                            ORDER BY report_time DESC");
                            
                            $no = 1; // Initialize $no before the loop
                            while ($data = mysqli_fetch_array($query)) {
                                $reportTime = date('j F Y \p\a\d\a H:i', strtotime($data['report_time']));
                                $reportTitle = $data['report_title'] ? $data['report_title'] : 'Panggilan Darurat';
                                 // Make a separate query to get security name
                                $securityQuery = mysqli_query($koneksi, "SELECT user.name AS security_name
                                FROM security
                                JOIN user ON security.user_id = user.user_id
                                WHERE security.security_id = '" . $data['security_id'] . "'");

                                $securityData = mysqli_fetch_array($securityQuery);
                            ?>
                            <tr onclick="window.location='detailLaporan.php?report_id=<?php echo $data['report_id']; ?>';">
                                <td class='text-center'>
                                    <strong><?php echo $reportTitle; ?></strong>
                                    <br />
                                    <span class='small-text'><?php echo $reportTime ?></span><br />
                                    <span class='small-text'>Pelapor: <?php echo $data['pelapor']?></span>
                                </td>
                                <td class='text-center'>
                                <?php if ($data['status'] == 'Dalam proses') : ?>
                                    <span class='badge bg-warning'>Dalam Proses</span>
                                    <br />
                                    <span class='small-text'>Petugas: <?php echo $securityData['security_name'];?></span>
                                <?php else : ?>
                                    <span class='badge bg-danger'><?php echo $data['status']; ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php
                             } // End of the while loop
                            ?>
                        </tbody>
                    </table>
                </div>

                <h2>Sudah Ditangani</h2>
                <div class='text-center'>
                    <table class='table table-hover'>
                        <thead>
                            <tr>
                                <th scope='col' class='text-center'>Judul</th>
                                <th scope='col' class='text-center'>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include("koneksi.php");
                        
                            $query = mysqli_query($koneksi, "SELECT report.*, user.name AS pelapor, 
                            residents.user_id AS resident_user_id
                            FROM report
                            JOIN residents ON report.NIK = residents.NIK
                            JOIN user ON residents.user_id = user.user_id
                            WHERE report.status IN ('Sudah ditangani', 'Ditangguhkan')
                            ORDER BY report_time DESC");
                            
                            $no = 1; // Initialize $no before the loop
                            while ($data = mysqli_fetch_array($query)) {
                                $reportTime = date('j F Y \p\a\d\a H:i', strtotime($data['report_time']));
                                $reportTitle = $data['report_title'] ? $data['report_title'] : 'Panggilan Darurat';
                                 // Make a separate query to get security name
                                $securityQuery = mysqli_query($koneksi, "SELECT user.name AS security_name
                                FROM security
                                JOIN user ON security.user_id = user.user_id
                                WHERE security.security_id = '" . $data['security_id'] . "'");

                                $securityData = mysqli_fetch_array($securityQuery);
                            ?>
                            <tr onclick="window.location='detailLaporan.php?report_id=<?php echo $data['report_id']; ?>';">
                                <td class='text-center'>
                                    <strong><?php echo $reportTitle; ?></strong>
                                    <br />
                                    <span class='small-text'><?php echo $reportTime; ?></span><br />
                                    <span class='small-text'>Pelapor: <?php echo $data['pelapor']?></span>
                                </td>
                                <td class='text-center'>
                                <?php if ($data['status'] == 'Sudah ditangani') : ?>
                                    <span class='badge bg-success'>Sudah ditangani</span>
                                    <br />
                                    <span class='small-text'>Petugas: <?php echo $securityData['security_name'];?></span>
                                <?php else : ?>
                                    <span class='badge bg-dark'><?php echo $data['status']; ?></span>
                                    <br />
                                    <span class='small-text'>Petugas: <?php echo $securityData['security_name'];?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php
                             } // End of the while loop
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Laporan</h1>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <form action='laporantambah.php' method='post' onsubmit='return validateDatetime()'>
                    <div class='modal-body'>
                        <label>Judul Laporan</label>
                        <input type='text' name='judul' class='col-lg-12' required/>
                        <br /><br />
                        <label>Deskripsi Laporan<br /></label>
                        <textarea name='deskripsi' class='col-lg-12' id='' cols='30' rows='10' required></textarea>
                        <br /><br />
                        <div class='d-flex justify-content-between'>
                            <div class='col-lg-7'>
                                <label for='date'>Tanggal dan Waktu Kejadian</label>
                                <input type='datetime-local' name='datetime' class='col-lg-12' id='date' required/>
                            </div>
                        </div>
                        <br />
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>
                            Batal Kirim
                        </button>
                        <button type='submit' class='btn btn-primary'>Kirim</button>
                    </div>
                </form>
            </div>
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
                    href='https://instagram.com/jangkar.2023?igshid=YTQwZjQ0NmI0OA%3D%3D&utm_source=qr' role='button'><i
                        class='fab fa-instagram'></i></a>
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