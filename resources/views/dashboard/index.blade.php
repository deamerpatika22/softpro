@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <!-- Dashboard Overview -->
    <div class="row">
        <!-- Order Card -->
        <div class="col-6 col-lg-3">
            <div class="small-box bg-light rounded shadow-sm border">
                <div class="inner">
                    <h3 class="text-dark">150</h3>
                    <p class="text-muted">Order Baru</p>
                </div>
                <div class="icon">
                    <i class="fas fa-camera-retro"></i>
                </div>
                <a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Product Card -->
        <div class="col-6 col-lg-3">
            <div class="small-box bg-white rounded shadow-sm border">
                <div class="inner">
                    <h3 class="text-dark">150</h3>
                    <p class="text-muted">Produk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-camera"></i>
                </div>
                <a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Member Card -->
        <div class="col-6 col-lg-3">
            <div class="small-box bg-light rounded shadow-sm border">
                <div class="inner">
                    <h3 class="text-dark">150</h3>
                    <p class="text-muted">Member</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Transaction Card -->
        <div class="col-6 col-lg-3">
            <div class="small-box bg-white rounded shadow-sm border">
                <div class="inner">
                    <h3 class="text-dark">150</h3>
                    <p class="text-muted">Transaksi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Recent Products Section -->
 <!--   <div class="row">
        <div class="col">
            <div class="card shadow-sm rounded">
                <div class="card-header bg-dark text-white">
                    <h4 class="card-title">Produk Baru</h4>
                    <div class="card-tools">
                        <a href="#" class="btn btn-sm btn-outline-light">More</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Qty</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>CAM-001</td>
                                <td>Canon EOS R6</td>
                                <td>Kamera Mirrorless</td>
                                <td>10 unit</td>
                                <td>30.000.000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>LENS-002</td>
                                <td>Canon RF 50mm</td>
                                <td>Lensa Prime</td>
                                <td>15 unit</td>
                                <td>10.000.000</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>TRI-003</td>
                                <td>Manfrotto Tripod</td>
                                <td>Aksesori Kamera</td>
                                <td>8 unit</td>
                                <td>2.500.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
