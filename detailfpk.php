<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$user_idsesi = $_SESSION['user_id'];
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
    <h3 class='mb-0 ms-5 mt-4'><strong>Forum Post Komunitas - Detail </strong>
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

        <!--mengambil data post-->
        <?php
        include("koneksi.php");

        if (isset($_GET['post_id'])) {
            $post_id = $_GET['post_id'];

            $postquery = mysqli_query($koneksi, "SELECT post.*, user.name AS realname
                                        FROM post
                                        JOIN user ON user.user_id = post.user_id
                                        WHERE post.post_id = $post_id");

            if ($postdata = mysqli_fetch_array($postquery)) {
                $user_id = $postdata['user_id'];
                $parent = NULL;
                $realname = $postdata['realname'];
                $title = $postdata['title'];
                $postTime = date('j F Y \p\a\d\a H:i', strtotime($postdata['date_time']));
                $content = $postdata['content'];
            }
        }
        ?>

        <!--Main page-->
        <center>
            <div class="main-page p-4">
                <div class="container mt-5">
                    <!-- Main Post -->
                    <div class="d-flex justify-content-start">
                        <a href="fpk.php" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2" class="position-relative">
                                    <?php echo $title ?>
                                    <!--tombol edit dan hapus-->
                                    <?php
                                    if ($user_idsesi == $user_id || $role == 'admin') {
                                        ?>
                                        <div class='dropdown position-absolute end-0' style="margin-top: -30px;">
                                            <a class='btn dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'
                                                aria-expanded='false'>
                                                <i class='fa-solid fa-gear fa-sm'></i>
                                            </a>
                                            <ul class='dropdown-menu'>
                                                <?php if ($user_idsesi == $user_id) { ?>
                                                    <li><a class='dropdown-item' href='#' data-bs-toggle='modal'
                                                            data-bs-target='#modaledit'>Edit</a></li>
                                                    <?php
                                                } //endif pertama
                                                ?>
                                                <li><a class='dropdown-item' href='laporan.php' data-bs-toggle='modal'
                                                        data-bs-target='#modalhapus'>Hapus</a></li>
                                            </ul>
                                        </div>
                                        <?php
                                    } //endif kedua
                                    ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $realname ?>
                                </td>
                                <td>
                                    <?php echo $postTime ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <?php echo $content ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <hr class="my-4" style="border-top: 2px solid #000;">
                    <?php
                    include("koneksi.php");

                    $replyquery = mysqli_query($koneksi, "SELECT post.*, user.name AS realname
                                        FROM post
                                        JOIN user ON user.user_id = post.user_id
                                        WHERE post.parent = $post_id");

                    $no = 1; // Initialize $no before the loop
                    while ($replydata = mysqli_fetch_array($replyquery)) {
                        $replyTime = date('j F Y \p\a\d\a H:i', strtotime($replydata['date_time']));
                        $replyid = $replydata['post_id'];
                        ?>
                        <!-- Replies -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2" class="position-relative">
                                        <?php echo $replydata['title']; ?>
                                        <!--tombol edit dan hapus-->
                                        <?php
                                        if ($user_idsesi == $replydata['user_id'] || $role == 'admin') {
                                            ?>
                                            <div class='dropdown position-absolute end-0' style="margin-top: -30px;">
                                                <a class='btn dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'
                                                    aria-expanded='false'>
                                                    <i class='fa-solid fa-gear fa-sm'></i>
                                                </a>
                                                <ul class='dropdown-menu'>
                                                    <?php if ($user_idsesi == $replydata['user_id']) { ?>
                                                        <li><a class='dropdown-item' href='#' data-bs-toggle='modal'
                                                                data-bs-target='#modaledit<?php echo $replyid ?>''>Edit</a></li>
                                                        <?php
                                                    } //endif pertama
                                                    ?>
                                                    <li><a class='dropdown-item' href='laporan.php' data-bs-toggle='modal'
                                                            data-bs-target='#modalhapus<?php echo $replyid ?>'>Hapus</a></li>
                                                </ul>
                                            </div>
                                        </th>
                                        <?php
                                        } //endif kedua
                                        ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $replydata['realname'] ?>
                                    </td>
                                    <td>
                                        <?php echo $replyTime ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php echo $replydata['content'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Modal Edit reply-->
                    <div class='modal fade' id='modaledit<?php echo $replyid ?>' tabindex='-1' aria-labelledby='exampleModalLabel'
                        aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Edit Post</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal'
                                        aria-label='Close'></button>
                                </div>
                                <form action='fpkedit.php' method='post'>
                                    <input type="hidden" name="parent" value="<?php echo $replydata['parent'] ?>">
                                    <input type="hidden" name="post_id" value="<?php echo $replyid ?>">
                                    <div class='modal-body'>
                                        <label for="judul"></label>
                                        <input type="text" class="form-control col-12" id="judul" name="judul"
                                            placeholder="Judul Post" value="<?php echo $replydata['title'] ?>" readonly>
                                        <br>
                                        <textarea class="form-control" name="konten" rows="4"
                                            placeholder="Ketik postingan Anda"
                                            required><?php echo $replydata['content']?></textarea>
                                        <br>
                                        <div class="d-flex justify-content-end">
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>
                                                    Batal
                                                </button>
                                                <button type='submit' class='btn btn-primary'>Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal hapus reply-->
                    <div class="example-modal">
                        <div id="modalhapus<?php echo $replyid ?>" class="modal fade" role="dialog" style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Konfirmasi Hapus Post</h3>
                                    </div>
                                    <div class="modal-body">
                                        <h5 align="center">Apakah anda yakin ingin menghapus post?<strong><span
                                                    class="grt"></span></strong>
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left"
                                            data-bs-dismiss="modal">Batal</button>

                                        <form action="fpkhapus.php" method="get">
                                            <?php
                                                echo '<input type="hidden" name="post_id" value="' . $replyid . '">';
                                                echo '<input type="hidden" name="parent" value="' . $replydata['parent'] . '">';
                                            ?>
                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <?php
                    } //end while loop
                    ?>

                    <div class="accordion" id="repliesAccordion">

                        <!-- Button to Toggle Reply Form -->
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#balasan" aria-expanded="false" aria-controls="replyForm">
                            Balas Post
                        </button>

                        <!-- Reply Form Collapse Section -->
                        <div id="balasan" class="collapse mt-3">
                            <div class="reply">
                                <form action="fpkbalas.php" method="post">
                                    <input type="hidden" name="parent" value="<?php echo $post_id ?>">
                                    <input type="text" class="form-control" name="judul" rows="4"
                                        value="RE: <?php echo $title ?>" readonly>
                                    <br>
                                    <textarea class="form-control" rows="4" name="konten"
                                        placeholder="Ketik balasan Anda"></textarea>
                                    <br>
                                    <button class="btn btn-primary">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit post-->
                    <div class='modal fade' id='modaledit' tabindex='-1' aria-labelledby='exampleModalLabel'
                        aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Edit Post</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal'
                                        aria-label='Close'></button>
                                </div>
                                <form action='fpkedit.php' method='post'>
                                    <input type="hidden" name="parent" value="<?php echo $parent ?>">
                                    <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                                    <div class='modal-body'>
                                        <label for="judul"></label>
                                        <input type="text" class="form-control col-12" id="judul" name="judul"
                                            placeholder="Judul Post" value="<?php echo $title ?>" required>
                                        <br>
                                        <textarea class="form-control" name="konten" rows="4"
                                            placeholder="Ketik postingan Anda"
                                            required><?php echo $content ?></textarea>
                                        <br>
                                        <div class="d-flex justify-content-end">
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>
                                                    Batal
                                                </button>
                                                <button type='submit' class='btn btn-primary'>Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal hapus post-->
                    <div class="example-modal">
                        <div id="modalhapus" class="modal fade" role="dialog" style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Konfirmasi Hapus Post</h3>
                                    </div>
                                    <div class="modal-body">
                                        <h5 align="center">Apakah anda yakin ingin menghapus post?<strong><span
                                                    class="grt"></span></strong>
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left"
                                            data-bs-dismiss="modal">Batal</button>

                                        <form action="fpkhapus.php" method="get">
                                            <?php
                                            if (isset($_GET['post_id'])) {
                                                $postId = $_GET['post_id'];
                                                echo '<input type="hidden" name="post_id" value="' . $postId . '">';
                                                echo '<input type="hidden" name="parent" value="' . $parent . '">';
                                            }
                                            ?>
                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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