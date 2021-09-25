<?php

namespace App\Http\Controllers;

use App\Elektronik;
use App\Cart;
use Illuminate\Http\Request;

class ElektronikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elektronik = Elektronik::all()->where('stock', '>', '0');
        return view('elektronik.index', compact('elektronik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('elektronik.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id=2) #gatau id pake apa, tpi dah mau yaudah biar aja
    {
        $users = auth()->user()->id;
        $request->validate([
            'nama' => 'required|max:255',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'required|max:4000',
            'stock' => 'required|integer|min:0',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('/storage/img/elektronik/'), $imageName);

        Elektronik::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stock' => $request->stock,
            'terbeli' => 0,
            'namatoko' => $request->namatoko,
            'gambar' => $imageName
        ]);

        return redirect('/profile/' . $users)->with('success','Produk sudah berhasil diunggah');
    }

    /** 
     * Display the specified resource.
     *
     * @param  \App\Elektronik  $elektronik
     * @return \Illuminate\Http\Response
     */
    public function show(Elektronik $elektronik)
    {
        $elektronikdata = Elektronik::all()->where('id', '!=', $elektronik->id)->random(5); 
        return view('elektronik.detail', compact('elektronik', 'elektronikdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Elektronik  $elektronik
     * @return \Illuminate\Http\Response
     */
    public function edit(Elektronik $elektronik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Elektronik  $elektronik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Elektronik $elektronik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Elektronik  $elektronik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Elektronik $elektronik)
    {
        //
    } 

    /**
     * Mengolah pembelian user
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Elektronik  $elektronik
     * @return \Illuminate\Http\Response
     */
    public function beli(Request $request, Elektronik $elektronik)
    {
        $users = auth()->user()->id;

        $request->validate([
            'jumlahbeli' => 'required|min:1',
        ]);
        $jumlahbeli = $request->jumlahbeli; 
        $terbeliold = $request->terbeliold;
        $jumlahbeli = ltrim($jumlahbeli, '0');#hilangin 0 depan angka
        
        $terbeli = $jumlahbeli + $terbeliold;

        Elektronik::where('id', $elektronik->id)
                ->update([
            'terbeli' => $terbeli,
        ]);
        Cart::where('produkid', $elektronik->id)->delete();
        return redirect('/profile/' . $users)->with('success','Produk sudah berhasil dibeli.');
    }
}
