@extends('layout.main')

@section('title', 'Linimasa')

@section('container')
<div class="container">
    <h1 class="mt-5">Linimasa</h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item mx-auto">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Post</a>
        </li>
        <li class="nav-item mx-auto">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Produk</a>
        </li>
        <li class="nav-item mx-auto">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Jelajah</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">???</div>
        
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            @if(empty($elektronik_filter))
                <p>Tidak ada produk</p>
            @else 
                <ul class="list-group mt-3">
                    @foreach($elektronik_filter as $elk1)
                        @foreach($elk1 as $elk)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{$elk->nama}}
                                <a href="/elektronik/{{$elk->id}}" class="badge badge-info">Detail</a>
                            </li>
                        @endforeach
                    @endforeach
                </ul> 
            @endif
        </div>

        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">???</div>
    </div>
</div>
@endsection
@section('botom','fixed-bottom')
