<?php

namespace App\Http\Controllers;

use App\Elektronik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Follow;

class LayoutsController extends Controller
{
    public function index(){
        $elektronik = Elektronik::all()->random(5);
        return view('user.index', compact('elektronik'));
    }
    public function search(Request $request){
            $output = '';
            $query = $request->get('query');
            $data = DB::table('elektroniks')->where('nama', 'like', '%'.$query.'%')->get();
            
            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row){
                    $output = ' <a class="dropdown-item" href="/elektronik/'. $row->id .'" >'. $row->nama .'</a>';
                }
            }else{
                $output = 'kosong';
            }
            $data = [
            'data'  => $output,
            ];
            $tes = 'tes';
            return response()->json(['data'=>$tes]);
    }


    public function admin(){
        return view('admin.index');
    }
    public function cookie(){
        $cookie = $_COOKIE["theme"];
        if($cookie == 'dark'){
            setcookie("theme", "light", time() + (86400 * 30), 'secure'); #86400 seconds = 1 day
        }else{
            setcookie("theme", "dark", time() + (86400 * 30), 'secure');
        }
        return redirect()->back();
    }
    public function setcookie(){
        setcookie("theme", "dark", time() + (86400 * 30), 'secure');
        return redirect('/');
    }
    public function timeline(){
        $user = auth()->user()->name;
        $follows = DB::table('follows')->where('username', '=', $user)->get();#mulai dari 0

        for($i = 0; $i < count($follows); $i++){
            $elektronik[$i] = DB::table('elektroniks')
                ->where('namatoko', '=', $follows[$i]->following)
                ->where(function ($query) {
                    $query->where('stock', '>', '0');
                })
                ->get();
        }

        $elektronik_filter = array_filter($elektronik, function($value) { return !$value->isEmpty(); });#hapus empty array

        return view('user.timeline', compact('elektronik_filter'));
    }
}
