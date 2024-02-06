<!DOCTYPE html>
<html lang="id-ID">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>J A N G K A R</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h1><a href="index.html"><img src="images/brand.png" width="40" length="40" alt="">              JANGKAR</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
          <li><a class="nav-link scrollto " href="#team">Tim</a></li>
          <li><a class="nav-link scrollto " href="#contact">Kontak</a></li>
          <li><a href="#" class="btn-get-started scrollto active" data-bs-toggle='modal' data-bs-target='#exampleModal'>Masuk</a></li>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1>Selamat Datang di <span>JANGKAR</span></h1>
      <h2>Jaringan Keamanan Responsif</h2>
      <a href="#" class="btn-get-started scrollto" data-bs-toggle='modal' data-bs-target='#exampleModal'>Masuk</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

  <!--modal-->
  <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Masuk ke JANGKAR</h1>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
              <div class="modal-body">
                <div class="login-logo text-center mt-4">
                  <img src="images/brand.png" alt="Logo" style="max-width: 25%;">
                </div>
                <br>
                <br>
                <form action="cek_login.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                        required>
                </div>
                <br>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                </div>
                <br>
              </div>
              <div class="modal-footer">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                </div>
                </form>
              </div>
            </div>
        </div>
    </div>

    <!-- ======= What We Do Section ======= -->
    <section id="what-we-do" class="what-we-do">

    </section><!-- End What We Do Section -->

    <!-- ======= About Section ======= -->
    <section id="tentang" class="tentang">
      <div class="container">

        <div class="section-title">
          <h2>Tentang</h2>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <img src="images/brand.png" class="img-fluid" style="height: 50%;" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
  
            <h3>Tentang Kami</h3>
            <p>Jangkar atau Jaringan Keamanan Responsif adalah aplikasi berbasis web yang didesain dengan tujuan utama untuk meningkatkan keamanan dan kenyamanan di lingkungan bertetangga. Mengintegrasikan sejumlah fitur yang canggih dan berguna, aplikasi ini bertindak sebagai solusi komprehensif untuk memperkuat hubungan antarwarga, memfasilitasi pelaporan insiden, serta memberikan akses cepat dan efisien dalam situasi darurat. 
            </p>
            <ul>
              <li><i class="bx bx-check-double"></i> Mendorong kolaborasi dan pertukaran informasi di antara warga komunitas.</li>
              <li><i class="bx bx-check-double"></i> Memberikan solusi cepat dan efektif untuk menghadapi situasi darurat. </li>
            </ul>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Layanan</h2>
        </div>

        <div class="row">
          <div class="col-md-6 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="bi bi-card-checklist"></i>
              <h4><a href="#">Form Laporan</a></h4>
              <p>Pengguna dapat dengan mudah melaporkan aktivitas mencurigakan atau insiden keamanan. Informasi yang diperoleh dari laporan-laporan ini  membantu pemerintah daerah dan masyarakat dengan</p>
            </div>
          </div>
          <div class="col-md-6 mt-4">
            <div class="icon-box">
              <i class="bi bi-chat-text"></i>
              <h4><a href="#">Forum Post Komunitas</a></h4>
              <p>Forum berdiskusi dan berinteraksi antar warga melalui platform forum dimana pengguna dapat berbagi informasi, pengalaman, dan saran mengenai keselamatan di lingkungannya.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4">
            <div class="icon-box">
              <i class="bi bi-geo-alt"></i>
              <h4><a href="#">Peta Keamanan</a></h4>
              <p>Menampilkan peta interaktif yang memberikan informasi visual tentang lokasi dan situasi keamanan di wilayah Anda. Pengguna dapat melihat lokasi area bekas kejadian perkara.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4">
            <div class="icon-box">
              <i class="bi bi-exclamation-circle"></i>
              <h4><a href="#">Tombol Darurat</a></h4>
              <p>Mengakses tombol darurat berguna dalam situasi darurat yang memerlukan perhatian segera. Pengguna dapat merekam suara sebagai pengganti laporan dan bisa segera menerima bantuan yang diperlukan.</p>
            </div>
          </div>
          <!-- <div class="col-md-6 mt-4">
            <div class="icon-box">
              <i class="bi bi-bell"></i>
              <h4><a href="#">Pemberitahuan Darurat</a></h4>
              <p>Memberikan pemberitahuan langsung kepada pengguna mengenai situasi darurat atau keselamatan yang memerlukan perhatian segera. Fitur ini secara efektif mengkomunikasikan informasi penting ke seluruh komunitas.</p>
            </div>
          </div>
        </div> -->

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Tim</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="images/mufa.jpeg" alt="">
              <h4>Mufasirina Haqulianti</h4>
              <span>Requirement Analyst</span>
              <div class="social">
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="images/bagas.jpg" alt="">
              <h4>Bagas Satrio</h4>
              <span>Back-End Programmer</span>
              <div class="social">
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="images/absar.jpg" alt="">
              <h4>Absar Rakha Zarfan</h4>
              <span>Front-End Programmer</span>
              <div class="social">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="images/nurul.jpeg" alt="">
                <h4>Nurul Aini</h4>
                <span>Front-End Programmer</span>
                <div class="social">
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="images/JOJO.jpg" alt="">
                <h4>Jonathan Christian N.</h4>
                <span>Back-End Programmer</span>
                <div class="social">
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="images/bowen.jpg" alt="">
                <h4>Bowen Riandu S.</h4>
                <span>Back-End Programmer</span>
                <div class="social">
                </div>
              </div>
            </div>
          </div>
        </div>
    </section><!-- End Team Section -->

    <!-- ======= Footer ======= -->
    <footer class="bg-light text-center text-lg-start mt-5">
      <section id="contact" class="contact section-bg">
        <div class="container">

          <div class="section-title">
            <h2>Kontak</h2>
            <p>Masukan dan saran?<br>Bisa hubungi kami dibawah ini!</p>
          </div>

          <div class="container p-4">
            <section class="mb-4 col-lg-12 ">
              <div class="d-flex justify-content-center">
                <a class="btn btn-primary btn-floating m-1"
                  href="https://www.facebook.com/profile.php?id=61554361356326&mibextid=LQQJ4d" role="button"><i
                    class="fab fa-facebook-f"></i></a>
                <a class="btn btn-primary btn-floating m-1" href="https://www.youtube.com/@JANGKAR" role="button"><i
                    class="fab fa-youtube"></i></a>
                <a class="btn btn-primary btn-floating m-1"
                  href="https://instagram.com/jangkar.2023?igshid=YTQwZjQ0NmI0OA%3D%3D&utm_source=qr" role="button"><i
                    class="fab fa-instagram"></i></a>
              </div>
              <div class="row mt-5 justify-content-center">

                <div class="col-lg-10">

                  <div class="info-wrap">
                    <div class="row">
                      <div class="col-lg-4 info">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Lokasi:</h4>
                        <p>Batam Centre, Jl. Ahmad Yani,<br>Tlk. Tering, Kec. Batam Kota,<br>Kota Batam, Kepulauan
                          Riau<br>29461</p>
                      </div>

                      <div class="col-lg-4 info mt-4 mt-lg-0">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>jangkar4342@gmail.com</p>
                      </div>

                      <div class="col-lg-4 info mt-4 mt-lg-0">
                        <i class="bi bi-phone"></i>
                        <h4>Telepon:</h4>
                        <p>+62 822 8819 4722<br>+62 856 5807 6195</p>
                      </div>
                      <div class="text-center p-3 bg-light">
                        © 2023 JANGKAR
                      </div>
                    </div>
            </section><!-- End Contact Section -->
    </footer>

</body>

</html>