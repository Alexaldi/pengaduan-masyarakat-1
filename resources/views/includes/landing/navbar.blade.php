<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <div class="logo">
      <h1>
        <a href="/">
          <img src="assets/img/logo.png" class="img-fluid" alt="Logo"> Selamat Datang
        </a>
      </h1>
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li>
          <a class="nav-link scrollto active" href="#hero">
            <i class="bi bi-house-door-fill me-1"></i> Home
          </a>
        </li>

        <li>
          <a class="nav-link" href="{{ url('login') }}">
            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
          </a>
        </li>

        <li>
          <a class="nav-link" href="{{ url('register') }}">
            <i class="bi bi-person-plus-fill me-1"></i> Daftar
          </a>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
</header>
