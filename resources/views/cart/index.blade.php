@extends('layout.main')

@section('title', 'Keranjang')

@section('container')
<div class="container">
<h1 class="mt-5">Keranjang</h1>
    @if($cart->isEmpty())
        <p class="ml-auto mr-auto">Tidak ada barang di keranjang. <a href="/">Telusuri barang.</a></p>
    @else
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Gambar</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga</th>
      <th scope="col">Total</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cart as $crt)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td><img src="/storage/img/elektronik/{{$crt->gambar}}" alt="" style="width:5rem;"></td>
        <td>{{$crt->nama}}</td>
        <td>{{$crt->jumlah}}</td>
        <td>Rp {{ number_format($crt->harga , 0, ',', '.') }},-</td>
        <td>Rp {{ number_format($crt->jumlah * $crt->harga , 0, ',', '.') }},-</td>
        <td>
        <form action="/elektronik/{{$crt->produkid}}/beli-proses" method="post" class="d-inline">
        @method('patch')
        @csrf
            <input type="hidden" value="{{$crt->jumlah}}" name="jumlahbeli">
            <input type="hidden" value="{{$crt->terbeli}}" name="terbeliold">
            <button type="submit" class="badge badge-primary" onclick="event.preventDefault(); confirm('Anda akan membeli produk ini. Lanjutkan?')">Beli</button>
        </form>
        <form action="/{{$crt->id}}/delete-from-cart" method="post" class="d-inline">
        @method('delete')
        @csrf
            <button type="submit" class="badge badge-danger" onclick="event.preventDefault(); confirm('Anda akan menghapus produk ini dari keranjang anda. Lanjutkan?')">Hapus</button>
        </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
</div>
@endsection
@section('botom', 'fixed-bottom')
@section('js')

@endsection
