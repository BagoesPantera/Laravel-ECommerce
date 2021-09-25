<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = auth()->user()->name;
        $cart = DB::table('carts')->where('pembeli', '=', $users)->get();
        return view('cart.index', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $useredit = auth()->user();
        if($request->namatoko == $useredit->name){
            return redirect('/profile/' . $useredit->id)->with('fail', 'Anda tidak dapat membeli produk anda sendiri !');
        }else{
            $request->validate([
                'jumlahbeli' => 'required|integer|min:1'
            ]);
            $jumlah = $request->jumlahbeli;
            $jumlah = ltrim($jumlah, '0');#hilangin 0 depan angka

            $cart = DB::table('carts')->where('nama', '=', $request->nama)->get();#cek udah ada ga di cart produk nya   
            if($cart->isEmpty()){
                Cart::create([
                    'nama' => $request->nama,
                    'harga' => $request->harga,
                    'pembeli' => $request->pembeli,
                    'produkid' => $request ->produkid,
                    'jumlah' => $jumlah,
                    'terbeli' => $request->terbeli,
                    'namatoko' => $request->namatoko,
                    'gambar' => $request->gambar,
                    'created_at' => now()
                ]);
                return redirect('/elektronik/' . $request->produkid)->with('success', 'Produk telah ditambah ke keranjang.');
            }else{
                $jumlahold = $cart[0]->jumlah;
                $jumlahnew = $jumlahold + $jumlah;
                Cart::where('nama', $cart[0]->nama)
                    ->update([
                        'jumlah' => $jumlahnew
                    ]);
                return redirect('/elektronik/' . $request->produkid)->with('success', 'Jumlah pembelian produk telah ditambah ke keranjang.');
            }
            return redirect('/elektronik/' . $request->produkid)->with('fail', 'Terjadi kesalahan. Coba lagi!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $user = auth()->user()->id;
        Cart::destroy($cart->id);
        return redirect('/profile/' . $user)->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
