<?php

session_start();
include 'functions.php';
$daerah = mysqli_query($conn, "SELECT * FROM daerah");

if (isset($_GET['cari'])) {
  $daerah = cari_daerah($_GET['nama']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - tags bar
  -->
  <title>SHONION - Website Petani Bawang Merah Milenial</title>
  <meta name="title" content="Shonion - Rumah Bawang Indonesia">

  <!-- 
    - icon logo
  -->
  <link rel="shortcut icon" href="./assets/images/logo fix.png">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <!-- custom css link -->
  <link rel="stylesheet" href="./assets/css/style.css">


  <!-- Swiper CSS -->
  <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css">

  <style type="text/css">
    .containerr {
      text-align: center;
      width: 50%;
      margin: auto;
      overflow: hidden;
      border: 10px solid #ffffff;
      border-radius: 8px;
      box-shadow: 10px 25px 30px rgba(0, 0, 0, 0.3);
    }

    .wrapper {
      width: 100%;
      display: flex;
      animation: slide 16s infinite;
    }

    @keyframes slide {
      0% {
        transform: translateX(0);
      }

      25% {
        transform: translateX(0);
      }

      30% {
        transform: translateX(-100%);
      }

      50% {
        transform: translateX(-100%);
      }

      55% {
        transform: translateX(-200%);
      }

      75% {
        transform: translateX(-200%);
      }

      80% {
        transform: translateX(-300%);
      }

      100% {
        transform: translateX(-300%);
      }
    }

    .imgg {
      width: 100%;
    }

    /* Style tombol utama */
    .dropbtn {
      background-color: grey;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }

    /* Warna background dari tombol utama */
    .dropdown:hover .dropbtn {
      background-color: #006947;
    }

    /* Isi konten dropdown (disembunyikan) */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #2f303f;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    /* Link di dalam menu dropdown */
    .dropdown-content a,
    .dropdown-content p {
      color: #fff;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    /* Warna link */
    .dropdown-content a:hover {
      background-color: #008c5f;
      color: #fff !important;
    }

    /* Tampilkan isi konten dopdown ketika disorot */
    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- 
    - preload images
  -->
</head>

<body>

  <!-- 
    - #LOAD HALAMAN
  -->
  <div class="loading-container" data-loading-container>
    <div class="loading-circle"></div>
  </div>

  <!-- 
    - #HEADER-BAR
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="./assets/images/logo fix.png" width="170" height="60" alt="Fasteat home">
      </a>

      <nav class="navbar" data-navbar>
        <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>

        <a href="#" class="logo">
          <img src="./assets/images/logo fix.png" width="150" height="100" alt="Fasteat home">
        </a>

        <ul class="navbar-list">
          <il class="navbar-item">
            <a href="#" class="navbar-link" data-nav-link>Beranda</a>
          </il>

          <il class="navbar-item">
            <a href="#instruction" class="navbar-link" data-nav-link>Panduan</a>
          </il>

          <il class="navbar-item">
            <a href="#Restaurant" class="navbar-link" data-nav-link>Info Panen</a>
          </il>

          <il class="navbar-item">
            <a href="#footer" class="navbar-link" data-nav-link>Kontak</a>
          </il>

          <?php if (isset($_SESSION["user"])) : ?>
            <il class="navbar-item">


              <div class="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                </svg>
                <div class="dropdown-content">
                  <p>
                    <?php
                    $s1 = $_SESSION['email'];
                    $nama =  explode("@", $s1);
                    echo $nama[0];
                    ?>
                  </p>
                  <a href="logout.php">Logout</a>
                </div>
              </div>
            <?php endif; ?>
        </ul>
      </nav>


      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
      </button>

      <div class="overlay" data-overlay data-nav-toggler></div>
    </div>
  </header>
  <main>
    <article>


      <!-- 
        - #HOME
      -->
      <section class="section hero has-bg-image" aria-label="home" style="background-image: url('./assets/images/bgcobaa.jpg')">
        <div class="container">
          <div class="hero-content" data-reveal="left">
            <h1 class="h1 hero-title">Website Petani Bawang Merah Milenial</h1>
            <p class="hero-text" style="text-align: justify;">
              Website ini dibuat dengan tujuan untuk mempermudah petani bawang merah diseluruh penjuru daerah di
              indonesia untuk memasarkan hasil panen dan juga memudahkan masyarakat untuk
              melakukan pembelian bawang dalam jumlah besar melalui petani bawang secara langsung.
            </p>
            <?php if (!isset($_SESSION["user"])) : ?>
              <ul class="navbar_list">
                <il class="navbar-item">
                  <a href="login.php" class="btn btn-secondary has-after">Login</a>
                </il>
              </ul>
            <?php endif; ?>
          </div>
          <figure class="hero-banner" data-reveal>
            <img src="./assets/images/petani milenial.png" width="680" height="720" alt="hero banner" class="w-100">
          </figure>
        </div>
      </section>


      <!-- 
        - #HOME PEMBATAS
      -->
      <section class="section partnership" aria-label="partnership">
        <hr>
        <br>
        <div class="containerr">
          <!-- <hr> -->
          <div class="wrapper">
            <img class="imgg" src="./assets/images/bawang 1.png">
            <img class="imgg" src="./assets/images/bawang 7.png">
            <img class="imgg" src="./assets/images/bawang 5.png">
            <img class="imgg" src="./assets/images/bawang 9.png">
          </div>
        </div>
        <br>
        <hr>
      </section>



      <!-- 
        - #PANDUAN WEBSITE
      -->
      <section class="section instruction" aria-labelledby="" id="instruction" style="background-image: url('./assets/images/bgcobaa.jpg')">
        <div class="container">
          <h2 class="h2 section-title" id="instruction-label" data-reveal>Panduan Website</h2>
          <p class="section-text" data-reveal>
            Mohon membaca panduan website Shonion untuk memudahkan anda mengetahui alur pengecekan panen bawang merah.
          </p>
          <ul class="grid-list">
            <li data-reveal="left">
              <div class="instruction-card">

                <figure class="card-banner">
                  <img src="./assets/images/Group 17.png" width="300" height="154" loading="lazy" alt="Select Restaurant" class="w-100">
                </figure>
                <div class="card-content">
                  <h3 class="h5 card-title">
                    Login/Register
                  </h3>
                  <p class="card-text">
                    Silahkan melakukan regis akun untuk melakukan pengecekan panen, bila sudah memiliki akun silahkan
                    melakukan login</p>
                </div>
              </div>
            </li>

            <li data-reveal>
              <div class="instruction-card">

                <figure class="card-banner">
                  <img src="./assets/images/Group 16.png" width="300" height="154" loading="lazy" alt="Select menu" class="w-100">
                </figure>
                <div class="card-content">

                  <h3 class="h5 card-title">
                    Info Panen
                  </h3>

                  <p class="card-text">
                    Selanjutnya pilih provinsi yang anda inginkan dan silahkan hubungi kontak petani bawang yang
                    tersedia.
                  </p>
                </div>
              </div>
            </li>

            <li data-reveal="right">
              <div class="instruction-card">
                <figure class="card-banner">
                  <img src="./assets/images/Group 18 (1).png" width="300" height="164" loading="lazy" alt="Wait for delivery" class="w-100">
                </figure>
                <div class="card-content">
                  <h3 class="h5 card-title">
                    Proses Transaksi
                  </h3>

                  <p class="card-text">
                    Silahkan melakukan proses negosiasi maupun proses transaksi dengan petani bawang pilihan.
                  </p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </section>

      <!-- 
        - #PROVINSI
      -->
      <section class="section top-restaurant" aria-labelledby="top-restaurent-label" id="Restaurant">
        <section class="section partnership" aria-label="partnership">
          <br>
          <h2 class="title " data-reveal>Info Panen</h2>
          <br>

          <center>
            <form action="index.php#Restaurant" method="GET">
              <input type="text" name="nama" placeholder="Cari Daerah..." class="search">
              <!-- <a href="#section top-restaurant"><button type="submit" class="btn-search" name="cari">cari</button></a> -->
              <button type="submit" class="btn-search" name="cari"><h3>Cari</h3><a href="#Restaurant"></a></button>
            </form>
          </center>
          <br>
          <li>
            <hr style="margin-block-end: 40px;">
            </div>
            </p>
            </p>

            <div class="container" id="data-daerah">
              <div class="slide-container swiper">
                <div class="slide-content">
                  <div class="swiper-wrapper">
                    <div class="card swiper-slide">
                      <div class="image-content">
                        <span class="overlay"></span>

                        <?php foreach ($daerah as $pr) : ?>
                          <!-- PROVINSI -->
                          <div class="card-image">
                            <img src="assets/imagesdb/<?= $pr['gambar']; ?>" alt="" class="card-img">
                          </div>
                      </div>

                      <div class="card-content">
                        <h2 class="name"><?= $pr['nama']; ?></h2>
                        <button class="button"><a href="detail.php?nama=<?= $pr['nama']; ?>"> Cek Panen</a></button>
                      </div>
                    </div>
                    <div class="card swiper-slide">
                      <div class="image-content" style="background-color: transparent;">
                        <span class="overlay" style="background-color: transparent;"></span>
                      <?php endforeach; ?>
                      </div>
                    </div>
                    <hr>
                    <hr>
        </section>


        <!-- 
        - #DAFTAR PANEN
      -->
        <section class="section cta has-bg-image" aria-labelledby="cta-label" style="background-image: url('./assets/images/bgcobaa.jpg')">
          <div class="container">

            <figure class="cta-banner" data-reveal="left">
              <img src="./assets/images/petani milenial 3.png" width="680" height="704" loading="lazy" alt="cta banner" class="w-100">
            </figure>

            <div class="cta-content" data-reveal="right">

              <h2 class="h3 section-title" id="cta-label">
                <p class="hero-text" style="text-align: justify;">
                  Apakah anda petani bawang merah?
              </h2>

              <p class="section-text">
                Bila anda ingin memasarkan hasil panen yang dimiliki, segera hubungi pihak SHONION dan daftarkan hasil
                panen anda sekarang juga!
              </p>
              <?php if (isset($_SESSION["user"])) : ?>
                <il class="navbar-item">
                  <a href="Daftar Panen.php" class="btn btn-secondary has-after">Daftar</a>
                </il>
              <?php endif; ?>
            </div>
          </div>
        </section>


        <!-- TEAM SHONION -->
        <section class="section top-restaurant" aria-labelledby="top-restaurent-label" id="Restaurant">
          <section class="section partnership">
            <br>
            <h1>Team Shonion</h1>
            <hr>
            <br>
            </div>
            <div class="row">
              <!-- Column 1-->
              <div class="column">
                <div class="team">
                  <div class="img-container">
                    <img src="assets/images/download-removebg-preview.jpg" />
                  </div>
                  <h3>Ayu Sahana</h3>
                  <p>CONTENT WITER</p>
                  <div class="icons">
                    <a href="https://twitter.com/sahanastyles_">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="">
                      <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://github.com/sahanaputri">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="mailto:ayusahanaputri@gmail.com">
                      <i class="fas fa-envelope"></i>
                    </a>
                  </div>
                </div>
              </div>
              <!-- Column 2-->
              <div class="column">
                <div class="team">
                  <div class="img-container">
                    <img src="assets/images/download-removebg-preview (1).jpg" />
                  </div>
                  <h3>Putra Jaya</h3>
                  <p>DEVELOPER</p>
                  <div class="icons">
                    <a href="https://twitter.com/">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/putra-jaya-280a06254">
                      <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://github.com/Ktputraa">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="mailto:putrajayaa002@gmail.com">
                      <i class="fas fa-envelope"></i>
                    </a>
                  </div>
                </div>
              </div>
              <!-- Column 3-->
              <div class="column">
                <div class="team">
                  <div class="img-container">
                    <img src="assets/images/ripafix-removebg-preview.jpg" />
                  </div>
                  <h3>Syaripatul Aini</h3>
                  <p>DESIGNER</p>
                  <div class="icons">
                    <a href="https://twitter.com/syaripa_aini?t=8lGK9TPR8Pb1aRv4LLTrrQ&s=09">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://id.linkedin.com/">
                      <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://github.com/syaripaaini">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="mailto:Syaripa09@gmail.com.com">
                      <i class="fas fa-envelope"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </section>


          <!-- 
        - #RUMAH BAWANG
      -->
          <section class="section testi" aria-labelledby="testi-label" style="background-image: url('./assets/images/bgcobaa.jpg')">
            <div class="container">
              <div class="testi-content" data-reveal="left">
                <h2 class="h2 section-title" id="testi-label">Rumah Bawang Indonesia</h2>

                <blockquote class="testi-text">
                  <p class="hero-text" style="text-align: justify;">
                    SHONION memberikan kemudahan kepada customer untuk mengetahui pusat informasi jual beli bawang merah
                    dari sabang sampai merauke dan juga SHONION menjadi wadah untuk membantu para petani bawang merah
                    di indonesia untuk menjangkau penjualan ke berbagai penjuru daerah.
                </blockquote>

                <div class="bintang">
                  <img src="./assets/images/logo.png" width="70" height="70" loading="lazy" alt="Thomas Adamson" class="author-img">
                  <div>

                    <p class="author-title">Shonion.id</p>
                    <div class="rating-wrapper">
                      <ion-icon name="star" aria-hidden="true"></ion-icon>
                      <ion-icon name="star" aria-hidden="true"></ion-icon>
                      <ion-icon name="star" aria-hidden="true"></ion-icon>
                      <ion-icon name="star" aria-hidden="true"></ion-icon>
                      <ion-icon name="star" aria-hidden="true"></ion-icon>
                    </div>
                  </div>
                </div>
              </div>

              <figure class="testi-banner" data-reveal="right">
                <img src="./assets/images/petani milenial 2.png" width="680" height="588" alt="testimonial banner" class="w-100">
              </figure>
            </div>
          </section>


          <!-- 
    - #FOOTER
  -->
          <footer class="footer" id="footer">
            <div class="container">
              <div class="section footer-top grid-list">
                <div class="footer-brand">

                  <a href="#" class="logo">
                    <img src="./assets/images/logo fix.png" width="150" height="38" alt="fasteat home">
                  </a>
                  <hr>
                  <h2 class="h2 section-title">Rumah Bawang Indonesia</h2>
                  <p class="section-text">
                    Temukan hasil panen bawang merah terbaik di seluruh penjuru daerah indonesia.
                  </p>
                </div>

                <ul class="footer-list">
                  <li>
                    <p class="footer-list-title h5">Menu</p>
                  </li>
                  <li>

                    <a href="#" class="footer-link">
                      <span class="span">Beranda</span>
                      <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#instruction" class="footer-link">
                      <span class="span">Panduan</span>

                      <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#Restaurant" class="footer-link">
                      <span class="span">Info Panen</span>
                      <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#footer" class="footer-link">
                      <span class="span">Kontak</span>

                      <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                    </a>
                  </li>
                </ul>

                <ul class="footer-list">
                  <li>
                    <p class="footer-list-title h5">Kontak</p>
                  </li>

                  <li>
                    <address class="address">
                      <ion-icon name="location" aria-hidden="true"></ion-icon>
                      <span class="span">Jl. Raya Kampus UNUD no 18 X, Kuta Selatan, Badung, Bali 80361</span>
                    </address>
                  </li>

                  <li>
                    <a href="mailto:shonion.id@gmail.com " class="footer-link">
                      <ion-icon name="mail" aria-hidden="true"></ion-icon>
                      <span class="span">shonion.id@gmail.com</span>
                    </a>
                  </li>

                  <li>
                    <a href="https://wa.me/6288219392511" class="footer-link">
                      <ion-icon name="call" aria-hidden="true"></ion-icon>
                      <span class="span">+62 882 193 925 11</span>
                    </a>
                  </li>

                  <li>
                    <ul class="social-list">
                      <li>
                        <a href="https://www.facebook.com/profile.php?id=100087452693134" class="social-link">
                          <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                      </li>

                      <li>
                        <a href="https://www.instagram.com/shonion.id/" class="social-link">
                          <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                      </li>

                      <li>
                        <a href="https://twitter.com/home" class="social-link">
                          <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>

              <div class="footer-bottom">
                <p class="copyright">
                </p>
              </div>
            </div>
          </footer>

          <!-- 
    - custom js link
  -->
          <script src="./assets/js/script_awal.js"></script>

          <!-- 
    - ionicon link
  -->
          <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
          <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

<!-- Swiper JS -->
<script src="./assets/js/swiper-bundle.min.js"></script>

<!-- JavaScript -->
<script src="./assets/js/script.js"></script>

</html>