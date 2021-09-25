<?php 
$a = strlen($elektronik->deskripsi);
?>
@extends('layout.main')

@section('title', 'Detail')

@section('css')
<style>
  .photo {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: 60%;
    transition: transform .5s ease-out;
    z-index: 2;
  }
</style>
@endsection

@section('container')

<div class="container">
    <div class="d-flex  mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="/elektronik">Elektronik</a></li>
            <li class="breadcrumb-item active" style="cursor:default;">{{$elektronik->nama}}</li>
        </ol>
    </div>
    <div class="row ">
        <div class="col">
            <div data-image="/storage/img/elektronik/{{$elektronik->gambar}}" class="ml-2 gambarss" data-scale="1.1" alt="" style="height:30vh;"></div>
        </div>
        <div class="col">
            <h1>{{$elektronik->nama}}</h1>
            <h3>Rp {{ number_format($elektronik->harga , 0, ',', '.') }},-</h3>
            <p><?php printf("%0." . ceil(1*$a/100) . "s...", $elektronik->deskripsi); ?></p>
            <form class="form-inline" method="POST" action="{{ route('add-to-cart') }}">
            @csrf
            <!-- kocak bangetzzzz ini brok -->
            <input type="hidden" name="nama" value="{{$elektronik->nama}}">
            <input type="hidden" name="harga" value="{{$elektronik->harga}}">
            <input type="hidden" name="pembeli" value="{{auth()->user()->name}}">
            <input type="hidden" name="terbeli" value="{{$elektronik->terbeli}}">   
            <input type="hidden" name="terbeliold" value="{{$elektronik->terbeli}}">
            <input type="hidden" name="produkid" value="{{$elektronik->id}}">
            <input type="hidden" name="namatoko" value="{{$elektronik->namatoko}}">
            <input type="hidden" name="gambar" value="{{$elektronik->gambar}}">

                <div class="form-group  mb-2">
                    <input type="number" min="1" value="0" name="jumlahbeli" class="form-control @error('jumlahbeli') is-invalid @enderror" id="inputorder">
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-3" data-toggle="tooltip" data-placement="right" title="" data-original-title="Produk ini akan ditambah ke keranjang Anda.">Tambah ke keranjang</button>
            </form>
            <p>Stok yang tersedia : {{ number_format($elektronik->stock - $elektronik->terbeli , 0, ',', '.') }}</p>
            <?php $cek = auth()->user()->name; ?>
            @if($cek == $elektronik->namatoko)
                <a href="">EDIT</a>
            @endif
            
            @if(session('fail'))
                <div class="alert alert-danger" role="alert">
                    {{@session('fail')}}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif
        </div><!-- col -->
    </div><!-- row -->
    
    <hr>
    <h2>Deskripsi</h2>
    <p>{{$elektronik->deskripsi}}</p>
    <h2>Barang Elektronik Lain</h2>
    <div class="d-flex">
        <?php $i = 1; ?>
        @foreach($elektronikdata as $ek)
        <div class="card @if($i>1) ml-3 @endif" style="width: 18rem;">
            <img src="/storage/img/elektronik/{{$ek->gambar}}" class="card-img-top" alt="..." style="height:20vh; ">
            <div class="card-body">
                <h5 class="card-title">{{$ek->nama}}</h5>
                <p class="card-text">Rp {{ number_format($ek->harga , 0, ',', '.') }},-</p>
                <a href="/elektronik/{{$ek->id}}" class="btn btn-primary" @if(!auth()->check()) onClick="alert('Anda harus login terlebih dahulu !')" @endif>Detail</a>
            </div>
        </div>
        <?php $i++; ?>
        @endforeach
    </div>
</div> <!-- container -->
@endsection

@section('js')
<script>
$('.gambarss')
    .on('mouseover', function(){
        $(this).children('.photo').css({'transform': 'scale('+ $(this).attr('data-scale') +')'});
    })
    .on('mouseout', function(){
        $(this).children('.photo').css({'transform': 'scale(1)'});
    })
    .on('mousemove', function(e){
        $(this).children('.photo').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
    })
    .each(function(){
        $(this)
        .append('<div class="photo"></div>')
        .children('.photo').css({'background-image': 'url('+ $(this).attr('data-image') +')'});
    })

    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@error('jumlahbeli')
    @if($message == 'The jumlahbeli must be at least 1.')
        <?php echo "<script>
        alert('Anda harus setidaknya membeli 1.');
        </script>";?>
    @elseif($message == 'The jumlahbeli must be an integer.')
    <?php echo "<script>
        alert('Hilangkan 0 di depan angka.');
        </script>";?>
    @else
        <?php echo "<script>
        alert('$message');
        </script>";?>
    @endif
@enderror

@endsection
@section('botom', 'bottom')
