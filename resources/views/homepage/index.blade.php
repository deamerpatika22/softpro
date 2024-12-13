@extends('layouts.template')

@section('content')
<div class="container">
  
  <!-- Carousel (Gambar Utama) -->
  <div class="row">
    <div class="col">
      <div id="carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('images/A.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/B.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/C.jpg') }}" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Kategori Produk / Pricelist -->
  <div class="row mt-4">
    <div class="col-md-12 text-center">
      <h2 class="font-weight-bold">Pricelist</h2>
    </div>
  </div>

  <!-- 3 Paket Layanan dalam Satu Baris -->
  <div class="row">
    @foreach ([
      ['Paket 1', 'Rp 90.000', [
        '10 menit foto',
        'Include all soft files',
        'Include 3 presets',
        'Include 2 print foto',
        'Waktu akses google drive 7 hari'
      ], 'paket 1'],
      ['Paket 2', 'Rp 130.000', [
        '20 menit foto',
        'Include all soft files',
        'Include 3 presets',
        'Include 2 print foto',
        'Waktu akses google drive 7 hari'
      ], 'paket 2'],
      ['Paket 3', 'Rp 150.000', [
        '25 menit foto',
        'Include all soft files',
        'Include 3 presets',
        'Include 2 print foto',
        'Waktu akses google drive 7 hari'
      ], 'paket 3']
    ] as $paket)
      <div class="col-md-4 mb-4">
        <div class="border p-4 shadow-sm rounded">
          <h4 class="text-center font-weight-bold">{{ $paket[0] }}</h4>
          <ul class="list-unstyled">
            @foreach ($paket[2] as $item)
              <li><i class="fas fa-check-circle"></i> {{ $item }}</li>
            @endforeach
          </ul>
          <p class="text-center"><strong>{{ $paket[1] }}</strong></p>
          <div class="text-center">
            <a href="https://wa.me/6288215117370?text=Halo,%20saya%20tertarik%20dengan%20paket%20foto%20{{ $paket[3] }}." 
               target="_blank" class="btn btn-success">Pesan Sekarang</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Alamat Studio dan Google Maps -->
  <div class="row mt-5">
    <div class="col-md-12 text-center">
      <h3 class="font-weight-bold">Alamat</h3>
      <p>Jl. Poncowinatan No.51A, Gowongan, Kec. Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55232</p>
      <p>Telepon: +62 882-1511-7370</p>
      <p>Email: photowae@gmail.com</p>

      <!-- Google Maps Iframe -->
      <div class="map-container mt-3">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.0709411527378!2d110.36006387358023!3d-7.782303277215259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a597247f64905%3A0xaa9c5a9751972896!2sPhotowae%20Self%20Photo%20Studio%20%26%20PhotoBOXwae%20Self%20Photo%20in%20The%20Box!5e0!3m2!1sid!2sid!4v1734027059967!5m2!1sid!2sid" 
          width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
  </div>

  <!-- Tentang Studio -->
  <div class="row mt-5">
    <div class="col-md-12 text-center">
      <h3 class="font-weight-bold">Tentang Kami</h3>
      <p>
        Photowae Studio adalah studio fotografi profesional yang telah melayani pelanggan selama lebih dari 10 tahun. Kami memiliki pengalaman luas dalam menangkap momen-momen berharga, baik untuk pernikahan, foto keluarga, produk, maupun acara khusus lainnya. Dengan tim fotografer berpengalaman dan peralatan modern, kami memastikan setiap foto yang dihasilkan memiliki kualitas tinggi dan estetika yang menarik.
      </p>
      <p>
        Kami memahami pentingnya setiap detil dalam setiap sesi pemotretan. Oleh karena itu, kami selalu berusaha untuk memberikan pelayanan yang terbaik dan menciptakan pengalaman yang menyenangkan bagi setiap klien. Dari foto pre-wedding hingga foto produk, kami siap mengabadikan momen Anda dengan sentuhan artistik yang unik.
      </p>
      <p>
        Photowae Studio berkomitmen untuk memberikan hasil foto yang tak hanya memenuhi harapan, tetapi juga melebihi ekspektasi Anda. Dengan pendekatan yang ramah dan profesional, kami menjadikan setiap sesi pemotretan sebuah kenangan yang indah.
      </p>
    </div>
  </div>

</div>
@endsection
