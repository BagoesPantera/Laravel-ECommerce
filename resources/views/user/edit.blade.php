<?php 
$cek = auth()->user();
#$user bukan auth
if($user->id != $cek->id){
    url()->previous();
}

?>
@extends('layout.main')

@section('title', 'Sunting Profile')

@section('container')
<div class="container">
<h1 class=" mt-5 ">Sunting Profil</h1>
    <form role="form" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" >
    @method('patch')
    @csrf
        <fieldset disabled="">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Nama Pengguna</label>
                <div class="col-lg-9">
                    <input class="form-control" type="text" value="{{$user->name}}" id="name" name="name" readonly>
                </div>
            </div>
        </fieldset>
        <fieldset disabled="">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Alamat Surel</label>
                <div class="col-lg-9">
                    <input class="form-control" type="disabled" value="{{$user->email}}" id="email" name="email" readonly>
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Foto Profile(<2MB) </label>
            <div class="col-lg-9">
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" placeholder="tes" >
                @error('gambar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label"></label>
            <div class="col-lg-9">
                <a href="{{URL::previous()}}" class="btn btn-secondary" id="reset123" value="Cancel">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('password.request') }}" class="btn btn-primary">Ganti Kata Sandi</a>
            </div>
        </div>
    </form>
</div>
@endsection
@section('botom', 'fixed-bottom')
