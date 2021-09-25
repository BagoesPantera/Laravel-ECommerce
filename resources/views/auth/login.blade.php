@extends('layout.main')

@section('title', 'Masuk')

@section('container')

<div class="container">
    <h1 class=" mt-5 ">Masuk</h1>
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="form-group">
            <label for="username">Alamat Surel</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="username" aria-describedby="emailHelp" name="email" autocomplete="off" value="{{ old('email') }}" autofocus>
            @error('email')
                <div class="invalid-feedback">
                    @if($message == 'The email field is required.')
                        <strong>Alamat surel harus diisi.</strong>
                    
                    @else
                        <strong>{{ $message }}</strong>

                    @endif
                </div>
            @enderror
        </div> 
        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" data-toggle="password">
            @error('password')
                <div class="invalid-feedback">
                    @if($message == 'The password field is required.')
                        <strong>Kata sandi harus diisi</strong>
                    
                    @else
                        <strong>{{ $message }}</strong>

                    @endif
                </div>
            @enderror
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Ingat Saya
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('Masuk') }}
        </button>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Lupa Kata Sandi ?') }}
            </a>
        @endif
    </form>
    @if (session('status'))
    <div class="mt-3 alert alert-danger">
        {{ session('status') }}
    </div>
    @endif
</div>
@endsection
@section('botom', 'fixed-bottom')
