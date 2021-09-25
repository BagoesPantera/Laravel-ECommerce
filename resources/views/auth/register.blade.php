@extends('layout.main')

@section('title', 'Daftar')

@section('container')
<div class="container">
    <h1 class="mt-5">Daftar</h1>
    <form method="POST" action="{{ route('register') }}">
    @csrf
        <input type="hidden" value="default.png" name="gambar">
        <div class="form-group">
            <label for="name">Nama Pengguna</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off" autofocus>
            @error('name')
               
                <span class="invalid-feedback" role="alert">
                    @if($message == 'The name field is required.')
                        <strong>Nama pengguna harus diisi.</strong>
                    
                    @elseif($message == 'The name has already been taken.')
                        <strong>Nama pengguna sudah digunakan.</strong>
                    
                    @else
                        <strong>{{$message}}</strong>
                    @endif
                </span>
            
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Alamat Surel</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off">
            @error('email')
                
                <span class="invalid-feedback" role="alert">
                    @if($message == 'The email field is required.')
                        <strong>Alamat surel harus diisi.</strong>
                    
                    @elseif($message == 'The email has already been taken.')
                        <strong>Alamat surel sudah digunakan.</strong>
                    
                    @else
                        <strong>{{$message}}</strong>
                    @endif
                </span>
            
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    @if($message == 'The password confirmation does not match.')
                        <strong>Kata sandi dan konfirmasi kata sandi tidak sesuai.</strong>
                    
                    @elseif($message == 'The password must be at least 8 characters.')
                        <strong>Kata sandi harus 8 karakter.</strong>
                    
                    @elseif($message == 'The password field is required.')
                        <strong>Kata sandi harus diisi</strong>
                    
                    @else
                        <strong>{{$message}}</strong>
                    @endif
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password-confirm">Konfirmasi Kata Sandi</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                {{ __('Daftar') }}
            </button>
        </div>
    </form>
    @if (session('status'))
        <div class="mt-3 alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
</div>
@endsection
@section('botom', 'fixed-bottom')