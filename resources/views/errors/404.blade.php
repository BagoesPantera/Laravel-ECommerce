@extends('layout.mainerror')

@section('css')
<style>
    img{
        width:30%;
    }
    .text{
        text-align:center;
    }
</style>
@endsection

@section('title', 'Kesalahan 404')

@section('container')
<div class="container">
    <img src="/storage/img/ui/404v3.png" class="rounded mx-auto d-block" alt="Muat kembali untuk menampilkan gambar !">
    <div class="text">
        <h3><strong>Waduh, tujuanmu ga ada !</strong></h3>
        <p>Mungkin kamu salah alamat. Kuy balik !</p>
        <a href="/" class="btn btn-success">Kembali</a>
    </div>
</div>
@endsection
@section('botom', 'fixed-bottom')
