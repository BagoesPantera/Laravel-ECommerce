@extends('layout.main')

@section('title' , 'Elektronik')

<!-- BELUM BISA DERET 3 -->

@section('container')
<div class="container">
    <h1 class="mt-5">Elektronik</h1>
    <br>
    



<!-- ================================================================== FIRST TRY -->
<?php   
// $b = [
//     [
//         'tes' => '1'
//     ],
//     [
//         'ets' => '2'
//     ],
//     [
//         'tes' => '3'
//     ]
// ];

?><?php $i = 1; ?>

<!-- <div class="cards"> 

    <?php #$a = $i % 3;?>
<div class="  d-flex ">
         @foreach($elektronik as $ek)
        <div class="card @if($i>1) ml-3 @endif d-flex" style="width: 18rem;">
            <img src="/storage/img/elektronik/{{$ek->gambar}}" class="card-img-top" alt="..." style="height:20vh; ">
            <div class="card-body">
                <h5 class="card-title">{{$ek->nama}}</h5>
                <p class="card-text">Rp {{ number_format($ek->harga , 0, ',', '.') }},-</p>
                <a href="/elektronik/{{$ek->id}}" class="btn btn-primary" @if(!auth()->check()) onClick="alert('Anda harus login terlebih dahulu !')" @endif>Beli</a>
            </div>
        </div>
        <?php #$i++; ?>
        @endforeach
    </div> 
    <div class="  d-flex ">
         @foreach($elektronik as $ek)
        <div class="card @if($i>1) ml-3 @endif d-flex" style="width: 18rem;">
            <img src="/storage/img/elektronik/{{$ek->gambar}}" class="card-img-top" alt="..." style="height:20vh; ">
            <div class="card-body">
                <h5 class="card-title">{{$ek->nama}}</h5>
                <p class="card-text">Rp {{ number_format($ek->harga , 0, ',', '.') }},-</p>
                <a href="/elektronik/{{$ek->id}}" class="btn btn-primary" @if(!auth()->check()) onClick="alert('Anda harus login terlebih dahulu !')" @endif>Beli</a>
            </div>
        </div>
        <?php #$i++; ?>
        @endforeach
    </div> 
</div> -->

<!-- ======================================================================== SECOND TRY -->
    <!-- skip -->

  <!-- <div class="row">
    <div class="col-sm">
      One of three columns
    </div>
    <div class="col-sm">
      One of three columns
    </div>
    <div class="col-sm">
      One of three columns
    </div>
  </div> -->


<!-- =============================================== LAST !!!-->
<?php $i = 1; ?>
<ul class="list-group">
@foreach($elektronik as $elk)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$elk->nama}}
            <a href="/elektronik/{{$elk->id}}" class="badge badge-info">Detail</a>
        </li>
        <?php $i++; ?>
        @endforeach
    </ul>
</div>
@endsection
@section('botom', 'fixed-bottom')
