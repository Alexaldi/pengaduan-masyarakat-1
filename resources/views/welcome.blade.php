<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LaporIn | Pelaporan Pengaduan Masyarakat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  @include('includes.landing.stylesheet')

  <!-- =======================================================
    * Template Name: Vesperr - v4.7.0
    * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>

  <body>

  <div id="splash-screen" class="fixed inset-0 bg-black z-50 flex items-center justify-center">
  </div>

    @include('includes.landing.navbar')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex mt-4 flex-column justify-content-center">
          <h1 data-aos="fade-up">Layanan Laporan Pengaduan Masyarakat</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Sampaikan laporan masalah Anda di sini.</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="{{ url('login')}}" class="btn-get-started scrollto">Laporkan!</a>
           
            <a href="#services" class="btn-get-started-2 scrollto">Alur laporan</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/lpm.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>

  <main id="main">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Alur Kerja Aplikasi</h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class='bx bxs-edit-alt'></i></div>
              <h4 class="title"><a href="">Kirim Laporan</a></h4>
              <p class="description">Tulis laporan keluhan Anda dengan jelas, laporan tidak boleh mengandung unsur SARA, kebencian dan HOAX.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-shuffle"></i></div>
              <h4 class="title"><a href="">Proses Verifikasi</a></h4>
              <p class="description">Tunggu sampai laporan Anda di verifikasi oleh admin/petugas.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Tindak Lanjut</a></h4>
              <p class="description">Laporan Anda sedang dalam diproses dan ditindak lanjut.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class='bx bx-check-shield'></i></div>
              <h4 class="title"><a href="">Selesai</a></h4>
              <p class="description">Laporan pengaduan telah selesai ditindak.</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->


    @include('includes.landing.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('includes.landing.javascript')

  </body>
</html>
