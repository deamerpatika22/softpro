@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            History Transaksi
          </h3>
        </div>
        <div class="card-body">
          <!-- Used for displaying error or success messages -->
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
          @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
          <div class="list-group">
            @foreach($itemorder as $order)
              <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <strong>Invoice: {{ $order->cart->no_invoice }}</strong><br>
                  <span>Sub Total: {{ number_format($order->cart->subtotal, 2) }}</span><br>
                  <span>Diskon: {{ number_format($order->cart->diskon, 2) }}</span><br>
                  <span>Ongkir: {{ number_format($order->cart->ongkir, 2) }}</span><br>
                  <span>Total: {{ number_format($order->cart->total, 2) }}</span><br>
                  <span>Status Pembayaran: {{ $order->cart->status_pembayaran }}</span><br>
                  <span>Status Pengiriman: {{ $order->cart->status_pengiriman }}</span>
                </div>
                <div>
                  <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#transactionModal{{ $order->id }}">
                    Detail
                  </button>
                  @if($itemuser->role == 'admin')
                    <a href="{{ route('transaksi.edit', $order->id) }}" class="btn btn-sm btn-primary mb-2">
                      Edit
                    </a>
                  @endif
                </div>
              </div>

              <!-- Modal Dialog for Transaction Details -->
              <div class="modal fade" id="transactionModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel{{ $order->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="transactionModalLabel{{ $order->id }}">Detail Transaksi - {{ $order->cart->no_invoice }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p><strong>Invoice:</strong> {{ $order->cart->no_invoice }}</p>
                      <p><strong>Sub Total:</strong> {{ number_format($order->cart->subtotal, 2) }}</p>
                      <p><strong>Diskon:</strong> {{ number_format($order->cart->diskon, 2) }}</p>
                      <p><strong>Ongkir:</strong> {{ number_format($order->cart->ongkir, 2) }}</p>
                      <p><strong>Total:</strong> {{ number_format($order->cart->total, 2) }}</p>
                      <p><strong>Status Pembayaran:</strong> {{ $order->cart->status_pembayaran }}</p>
                      <p><strong>Status Pengiriman:</strong> {{ $order->cart->status_pengiriman }}</p>
                      <!-- Add any additional transaction details here -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
