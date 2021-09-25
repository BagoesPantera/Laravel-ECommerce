@extends('layout.main')

@section('css')
<link rel="stylesheet" href="/storage/css/userindex.css">
@endsection

@section('title', 'Laravel')

@section('container')
<div class="containers">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href=""><img class="d-block w-100 slide" src="/storage/img/promo/promo1.jpg" alt="PROMO"></a>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 slide" src="/storage/img/promo/promo2.jpg" alt="PROMO">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 slide" src="/storage/img/promo/promo3.jpg" alt="PROMO">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="containers">
    <div class="container1">
        <div class="judul">
            <h3 class="mr-auto">Elektronik</h3>
            <a href="/elektronik" class="btn btn-link ml-auto">Lihat Selengkapnya ></a>
        </div>
        <div class="cards">
            <?php $i = 1; ?>
            @foreach($elektronik as $ek)
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
    </div>  

    <div class="container1 mt-3">
        <div class="judul">
            <h3 class="mr-auto">Olahraga</h3>
            <a href="/elektronik" class="btn btn-link ml-auto">Lihat Selengkapnya ></a>
        </div>
        <div class="cards">
            <?php $i = 1; ?>
            @foreach($elektronik as $ek)
            <div class="card @if($i>1) ml-3 @endif" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <?php $i++; ?>
            @endforeach
        </div>
    </div>  

    <div class="container1 mt-3">
        <div class="judul">
            <h3 class="mr-auto">Fashion</h3>
            <a href="/elektronik" class="btn btn-link ml-auto">Lihat Selengkapnya ></a>
        </div>
        <div class="cards">
            <?php $i = 1; ?>
            @foreach($elektronik as $ek)
            <div class="card @if($i>1) ml-3 @endif" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <?php $i++; ?>
            @endforeach
        </div>
    </div>  
</div>
@endsection
@section('js')
    @if (session('status'))
        <script>
            alert('{{ session('status') }}')
        </script>
    @endif
@endsection
@section('botom', 'bottom')