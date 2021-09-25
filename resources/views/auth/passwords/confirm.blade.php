@extends('layout.main')

@section('title', 'Konfirmasi Kata Sandi')

@section('container')
<div class="container">
    <h1 class="mt-5">Konfirmasi kata sandi anda sebelum lanjut.</h1>
    <form method="POST" action="{{ route('password.confirm') }}">
    @csrf
        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                {{ __('Confirm Password') }}
            </button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
</div>
@endsection
@section('botom', 'fixed-bottom')