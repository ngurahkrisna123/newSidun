<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use DB;

class HalamanAwalController extends Controller
{
    //
    function caridataPenduduk(Request $r){
        $search = $r->get('search');
        $penduduks = DB::table('penduduks')->where('nik',$search);

        $penduduks = $penduduks->get();
        
        return view('awalhasilpage', ['penduduks'=>$penduduks]);
    }

}
