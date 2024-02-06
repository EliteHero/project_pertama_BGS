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
    <title>Forum Post Komunitas</title>
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
                            <li><a class='dropdown-item active d-block d-md-none' href='fpk.php'>Forum Post Komunitas</a>
                            </li>
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
                            <li><a class='dropdown-item d-block d-md-none' href='laporan.php'>Form Laporan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='peta.php'>Peta Keamanan</a></li>
                            <li><a class='dropdown-item active d-block d-md-none' href='fpk.php'>Forum Post Komunitas</a>
                            </li>
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
                            <li><a class='dropdown-item d-block d-md-none' href='laporan.php'>Form Laporan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='peta.php'>Peta Keamanan</a></li>
                            <li><a class='dropdown-item d-block d-md-none' href='notif.php'>Notifikasi Darurat</a></li>
                            <li><a class='dropdown-item active d-block d-md-none' href='fpk.php'>Forum Post Komunitas</a>
                            </li>
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
    <h3 class='mb-0 ms-5 mt-4'><strong>Forum Post Komunitas </strong>
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
        <p style='color: darkgray;' class='ms-5'>Tempat berbagi informasi dengan tetangga</p>

        <!--Main page-->
        <center>
            <div class='main-page p-4'>
                <div class='container mt-5'>
                    <div class='d-flex justify-content-between align-items-center mb-2'>
                        <h2 class='mb-0'>Topik</h2>
                        <button href='ms_fpk_buat.php' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                            Buat Post
                        </button>
                    </div>
                    <div class='text-center'>
                        <table class='table table-hover'>
                            <thead>
                                <tr>
                                    <th scope='col' class='text-center'>Judul</th>
                                    <th scope='col' class='text-center'>Balasan</th>
                                    <th scope='col' class='text-center'>Balasan Terakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--Mengambil data sql yang diperlukan-->
                                <?php
                                include("koneksi.php");

                                $query = mysqli_query($koneksi, "SELECT post.*, user.name AS realname,
                                    (SELECT COUNT(*) FROM post AS reply WHERE reply.parent = post.post_id) AS reply_count,
                                    (SELECT user.name FROM post AS last_reply
                                    JOIN user ON last_reply.user_id = user.user_id
                                    WHERE last_reply.parent = post.post_id
                                    ORDER BY last_reply.date_time DESC
                                    LIMIT 1) AS last_replier,
                                    (SELECT date_time FROM post AS last_reply_time
                                    WHERE last_reply_time.parent = post.post_id
                                    ORDER BY last_reply_time.date_time DESC
                                    LIMIT 1) AS last_reply_time
                                    FROM post
                                    JOIN user ON post.user_id = user.user_id
                                    WHERE parent IS NULL
                                    ORDER BY date_time DESC");

                                $no = 1; // Initialize $no before the loop
                                while ($data = mysqli_fetch_array($query)) {
                                    $postTime = date('j F Y \p\a\d\a H:i', strtotime($data['date_time']));
                                    $replyTime = date('j F Y \p\a\d\a H:i', strtotime($data['last_reply_time']));
                                    if ($data['last_replier'] == NULL) {
                                        $replyTime = "";
                                    }                                    
                                    ?>
                                    <tr onclick="window.location='detailfpk.php?post_id=<?php echo $data['post_id']; ?>';">
                                        <td class='text-center'>
                                            <strong>
                                                <?php echo $data['title'] ?>
                                            </strong>
                                            <br>
                                            <span class='small-text'>
                                                <?php echo $data['realname'] ?>
                                            </span><br>
                                            <span class='small-text'>
                                                <?php echo $postTime ?>
                                            </span>
                                        </td>
                                        <td class='text-center'>
                                            <span class='badge count bg-secondary'>
                                                <?php echo $data['reply_count'] ?>
                                            </span>
                                        </td>
                                        <td class='text-center'>
                                            <strong>
                                                <?php echo $data['last_replier'] ?>
                                            </strong><br>
                                            <span class='small-text'>
                                                <?php echo $replyTime ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php
                                } //end while loop
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </center>

        <!-- Modal -->
        <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h1 class='modal-title fs-5' id='exampleModalLabel'>Buat Post Baru</h1>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <form action='fpktambah.php' method='post'>
                        <div class='modal-body'>
                            <label for="judul"></label>
                            <input type="text" class="form-control col-12" id="judul" name="judul"
                                placeholder="Judul Post" required>
                            <br>
                            <textarea class="form-control" name="konten" rows="4" placeholder="Ketik postingan Anda" required></textarea>
                            <br>
                            <div class="d-flex justify-content-end">
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>
                                        Batal Kirim
                                    </button>
                                    <button type='submit' class='btn btn-primary'>Kirim</button>
                                </div>
                            </div>
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