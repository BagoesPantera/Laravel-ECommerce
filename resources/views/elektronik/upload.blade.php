@extends('layout.main')

@section('title', 'Unggah Produk')

@section('container')
<?php $user = auth()->user(); ?>
<div class="container">
    <h1 class=" mt-5 ">Unggah Produk</h1>
        <form action="{{ route('product.upload.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$user->name}}" name="namatoko">
            <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autocomplete="off" value="{{ old('nama') }}" autofocus>
                @error('nama')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div> 
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" autocomplete="off" value="{{ old('harga') }}">
                @error('harga')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div> 
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea type="text-area"  class="form-control @error('deskripsi') is-invalid @enderror textareass" id="deskripsi" name="deskripsi" autocomplete="off" value="{{ old('deskripsi') }}" maxlength='3000'></textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        @if($message == 'The deskripsi may not be greater than 4000 characters.')
                            <strong>The deskripsi may not be greater than 3000 characters.</strong>
                        @else
                            <strong>{{ $message }}</strong>
                        @endif
                    </div>
                @enderror
                <div class="d-flex"><strong class="ml-auto counters">0/3000</strong></div>
            </div>
            <div class="form-group">
                <label for="stock">Jumlah Stok</label>
                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" autocomplete="off" value="{{ old('stock') }}">
                @error('stock')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                @error('gambar')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        <button type="submit" class="btn btn-primary">{{ __('Unggah') }}</button>
        </form>
      </div>
</div>
@endsection

@section('js')
<script>
$('.textareass').on('keyup', function(){
    len = $('.textareass').val().length
    $('.counters').html(len + "/3000")
      });
</script>
@endsection

@section('botom', 'fixed-bottom')
