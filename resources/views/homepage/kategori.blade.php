@extends('layouts.template')
@section('content')
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

@endsection