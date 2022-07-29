<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluarga;
use DB;


class KeluargaController extends Controller
{
    //

    function addKeluarga(){
        //$kode = Keluarga::idKeluarga();
        return view('datamaster.addKeluarga');
    }

    
    function tambahKeluarga(Request $r){    
        
        $data = $r->all();
        $noKK = Keluarga::where('noKK',$data['noKK'])->count();
        if($noKK>0){
            return redirect('add-Keluarga')->with('flash_message_error','No KK sudah ada');
        }else{
            $modelKeluarga = new Keluarga;

            //$modelKeluarga->idKeluarga = $r->input('idKeluarga');

            $modelKeluarga->noKK = $r->input('noKK');
            $modelKeluarga->kepalaKeluarga = $r->input('kepalaKeluarga');
            $modelKeluarga->jmlKeluarga = $r->input('jmlKeluarga');
            
            $modelKeluarga->save();
            
            return redirect('view-keluarga')->with('flash_message_success','Tambah data Keluarga Sukses');
        }
    }

    function viewKeluarga(){
        $modelKeluarga = new Keluarga;

        $keluargas = $modelKeluarga->all();
        return view('datamaster.dataKeluarga',compact('keluargas'));
    }

    function ubahKeluarga($id){
        $keluargas = Keluarga::find($id);
        return view('datamaster.editKeluarga',compact('keluargas'));
    }

    function editKeluarga(Request $r,$id){
        $keluarga = Keluarga::findOrFail($id);

        //$keluarga->idKeluarga = $r->input('idKeluarga');

        $keluarga->noKK = $r->input('noKK');
        $keluarga->kepalaKeluarga = $r->input('kepalaKeluarga');
        $keluarga->jmlKeluarga = $r->input('jmlKeluarga');
        $keluarga->save();

        return redirect('view-keluarga')->with('flash_message_success','Ubah data Keluarga Sukses');
    }

    function deleteKeluarga($id){
        $keluarga = Keluarga::findOrFail($id);
        $keluarga->delete();
        //$keluarga->onDelete('set null');
        
        return redirect('view-keluarga')->with('flash_message_success','data Keluarga terhapus');
    }

    function searchKeluarga(Request $r){
        $search = $r->get('search');
        $keluargas = DB::table('keluargas')->where('kepalaKeluarga','like','%'.$search.'%')->paginate(5);

        return view('datamaster.dataKeluarga', ['keluargas'=>$keluargas]);
    }
}
