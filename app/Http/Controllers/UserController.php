<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Follow;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        dump($user);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $produk = DB::table('elektroniks')->where('namatoko', '=', $user->name)->latest()->get();
        $follow = Follow::all()->where('following', '=', $user->name); #berapa yang follow
        $following = Follow::all()->where('username', '=', $user->name); #berapa ngefollow

        $cekfollow = DB::table('follows')
        ->where('following', '=', $user->name)
        ->where(function ($query) {
            $cekuser = auth()->user()->name;
            $query->where('username', '=', $cekuser);
        })
        ->get();#ya pake cek dia folow apa gak user yang lagi di view/ di liat
        
        #tes ago ago ago ago
        // $dts = Carbon::now();
        // dump($dts);
        // $tes1 = explode(" ",$dts->diffForHumans($produk[0]->created_at))[0];#kan output 4 days after, kita ambil 4 nya aja
        // dump($dts->subDays($tes1)->diffForHumans());
        // dd($produk[0]->created_at);
        //dd($dts->subSeconds(1)->diffForHumans());
        
        return view('user.profile', compact('user', 'produk', 'follow', 'cekfollow', 'following'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $useredit = auth()->user();
        if($user->id != $useredit->id){
            return redirect('/');
        }
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $users = auth()->user();
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $imageName = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('/storage/img/userprofile/'), $imageName);

        User::where('email', $users->email)
                ->update([
                    'gambar' => $imageName
                ]);

        return redirect('/profile/' . $users->id)->with('success', 'Profil berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
