<?php 
$users = auth()->user(); 

if(!$produk->isEmpty()){
    $date = $produk[0]->created_at;
}

//ago ago ago ago ago
//cara carbon
$dts     = \Carbon\Carbon::now();

//cara kocak

// $entrydate = explode(' ', $date)[1];
// $times = array(
//     86400 => 'kemarin',
//    172800 => '2 hari yang lalu'
//    // etc
//  );
 
// $time = strtotime($entrydate);
// dd(time() - 86400);
// if ( $time < (time() - 172800) ) {
// echo $times[172800];
// } elseif ( $time < (time() - 86400) ) {
// echo $times[86400];
// }else{
//     echo "lama";
// }
?>
@extends('layout.main')

@section('title', 'Profil')

@section('container')

<!-- ========totalterbeli -->
<?php $zx = 0; ?>
@foreach($produk as $pdk)
<?php
$x = $pdk->terbeli;
$zx += $x;
?>
@endforeach

<div class="container" style="height:100%; ">
    <div class="row my-5">
        <div class="col-lg-8 order-lg-2 ">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profil</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Produk</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">{{$user->name}} Profile</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Lokasi</h6>
                            <p>
                                ?
                            </p>
                            <h6>Deskripsi</h6>
                            <p>
                                ?
                            </p>
                            @if($produk->isEmpty())
                                <p></p>
                            @elseif($zx == 0)
                                <p>Tidak ada barang yang terjual.</p>
                            @else
                                <p>Total terjual : <b><?= $zx ?> </b> barang</p>
                            @endif
                        </div>
                        <div class="col-md-6 mt-1">
                            <h6>Ulasan</h6>
                            <div class="d-flex">
                            <div class="mt-3 d-flex" >
                                <h3 class="">4.5 </h3>
                                <small class="form-text text-muted ml-1"> /5</small>
                                </div>
                                <img src="/storage/img/ui/bintang.png" alt="" width="50px" class="ml-1">
                            </div>
                            <hr>
                            <span class="badge badge-primary" style="cursor: default; font-size:15px;" ><i class="fa fa-user" ></i><?= count($follow) ?> Suka</span>
                            <span class="badge badge-primary" style="cursor: default; font-size:15px;" ><i class="fa fa-cog" ></i> <?= count($following) ?> Menyukai</span>
                            <span class="badge badge-success" style="cursor: default;" ><i class="fa fa-cog" ></i> 20 Ulasan</span>
                            
                            <br>
                            @if($user->id != $users->id)
                                <button class="btn btn-warning mt-2"  onclick="event.preventDefault(); @if($cekfollow->isEmpty()) document.getElementById('followform').submit(); @else document.getElementById('unfollowform').submit(); @endif">
                                    @if($cekfollow->isEmpty())
                                        Suka
                                    @else
                                        Batal Suka
                                    @endif
                                </button>
                                @if($cekfollow->isEmpty())
                                    <form id="followform" action="{{ route('follow') }}" method="post" style="display:hidden">
                                        @csrf
                                        <input type="hidden" value="{{ $users->name }}" name="username">
                                        <input type="hidden" value="{{ $user->name }}" name="following">
                                    </form>
                                @else
                                    <form id="unfollowform" action="/unfollow-user/{{ $cekfollow[0]->id }}"  method="post" style="display:hidden;">
                                        @method('delete')
                                        @csrf
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                    <!--/row-->
                </div>

                <!-- =====================================Produk========================================= -->
                <div class="tab-pane" id="messages">
                    <table class="table table-hover table-striped">
                        <tbody>
                            @if($produk->isEmpty())
                                <tr>
                                    <td style="text-align:center;">Tidak ada produk</td>
                                </tr>
                            @else
                                @foreach($produk as $pdk)   
                                <?php $tes1 = explode(" ",$dts->diffForHumans($pdk->created_at)); ?>    
                                <!-- CARA KOCAK BUAT TRANSLATE !! SUPER DUPER ULTIMATE KOCAK !!! -->
                                @if($tes1[1] ==  'second')
                                <?php $tes1[1] = 'detik' ?> 
                                @elseif($tes1[1] == 'seconds')
                                <?php $tes1[1] = 'detik' ?>

                                @elseif($tes1[1] == 'minute')
                                <?php $tes1[1] = 'menit' ?>
                                @elseif($tes1[1] == 'minutes')
                                <?php $tes1[1] = 'menit' ?>

                                @elseif($tes1[1] == 'hour')
                                <?php $tes1[1] = 'jam' ?>
                                @elseif($tes1[1] == 'hours')
                                <?php $tes1[1] = 'jam' ?>

                                @elseif($tes1[1] == 'day')
                                <?php $tes1[1] = 'hari' ?>
                                @elseif($tes1[1] == 'days')
                                <?php $tes1[1] = 'hari' ?>

                                @elseif($tes1[1] == 'week')
                                <?php $tes1[1] = 'minggu' ?>
                                @elseif($tes1[1] == 'weeks')
                                <?php $tes1[1] = 'minggu' ?>

                                @elseif($tes1[1] == 'month')
                                <?php $tes1[1] = 'bulan' ?>
                                @elseif($tes1[1] == 'months')
                                <?php $tes1[1] = 'bulan' ?>

                                @elseif($tes1[1] == 'year')
                                <?php $tes1[1] = 'tahun' ?>
                                @elseif($tes1[1] == 'years')
                                <?php $tes1[1] = 'tahun' ?>
                                @endif                     
                                
                                <tr>
                                    <td>
                                        <a href="/elektronik/{{$pdk->id}}"><span class="float-right font-weight-bold">
                                            {{$tes1[0] . ' ' . $tes1[1] . ' yang lalu'}}
                                        </span> {{$pdk->nama}}</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody> 
                    </table>
                </div> 
            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center tab-pane" id="edit">
            <img src="/storage/img/userprofile/{{$user->gambar}}" class="mx-auto img-fluid img-circle d-block" alt="avatar" style="width:100px;">
            @if($user->id == $users->id)
                <h5 class="badge badge-dark mt-5"><a href="/profile/{{$user->id}}/edit" class="badge badge-secondary " style="font-size:14px;">Sunting Profile</a></h5>
                <h4><a href="/product-upload" class="badge badge-info mt-1" >Jual Barang</a></h4>
            @endif
        </div>
    </div>

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
</div>
@endsection
@section('botom', 'fixed-bottom')