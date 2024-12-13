<nav class="navbar navbar-expand-lg navbar-light shadow-lg mb-4">
  <div class="container">
    <!-- Logo dan nama aplikasi -->
    <a class="navbar-brand d-flex align-items-center font-weight-bold" href="/">
      <!-- Coba menggunakan url() jika asset() tidak berhasil -->
      <img src="{{ asset('Logo/dea.png') }}" alt="Logo" style="height: 40px; margin-right: 10px;">
    </a>

    <!-- Tombol hamburger untuk tampilan mobile -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigasi Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="mr-auto navbar-nav"></ul>
      <ul class="navbar-nav">
        <!-- Menu Home -->
        <li class="nav-item active">
          <a class="nav-link text-dark font-weight-bold" href="/">Home</a>
        </li>
        
        <!-- Menu Pricelist -->
        <li class="nav-item">
          <a class="nav-link text-dark font-weight-bold" href="{{ URL::to('kategori') }}">Pricelist</a>
        </li>
        
        <!-- Menu Alamat -->
        <li class="nav-item">
          <a class="nav-link text-dark font-weight-bold" href="{{ URL::to('kontak') }}">Alamat</a>
        </li>
        
        <!-- Menu Tentang Kami -->
        <li class="nav-item">
          <a class="nav-link text-dark font-weight-bold" href="{{ URL::to('about') }}">Tentang Kami</a>
        </li>
        
        <!-- Menu Login -->
        <li class="nav-item">
          <a class="nav-link text-dark font-weight-bold" href="{{ URL::to('login') }}">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Tambahkan CSS khusus untuk efek hover dan styling lainnya -->
<style>
  /* Styling untuk navbar dengan gradasi warna hijau */
  .navbar {
    background: linear-gradient(#d9d9d9); /* Gradasi hijau */
    border-radius: 8px; /* Sudut navbar lebih halus */
  }

  /* Styling untuk logo dan nama aplikasi */
  .navbar-brand {
    color: #333; /* Warna tulisan logo tetap gelap */
    font-size: 1.5rem;
    font-weight: bold;
    text-transform: uppercase;
    display: flex;
    align-items: center;
  }

  .navbar-brand img {
    height: 40px;
    margin-right: 10px;
  }

  /* Styling untuk menu navbar */
  .navbar-nav .nav-item .nav-link {
    transition: all 0.3s ease-in-out;
    font-size: 1rem;
    color: black; /* Teks navbar tetap hitam */
  }

  /* Efek hover pada menu */
  .navbar-nav .nav-item .nav-link:hover {
    color: #ffcc00; /* Warna saat hover menjadi kuning cerah */
    text-decoration: none;
    transform: scale(1.05);
  }

  /* Styling untuk navbar-toggler icon */
  .navbar-toggler-icon {
    background-color: #fff; /* Ubah warna icon navbar */
  }

  /* Menambahkan padding dan space antar elemen */
  .navbar-nav .nav-item {
    margin-left: 15px;
  }
</style>
