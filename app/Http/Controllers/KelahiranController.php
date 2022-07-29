<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelahiran;
use DB;

use Session;

class KelahiranController extends Controller
{
    //

    function addKelahiran(){
        //$kode = Kelahiran::idKelahiran();
        return view('kegiatan.kelahiran.addKelahiran');
    }

    
    function tambahKelahiran(Request $r){
        
        
        
        $data = $r->all();
        $noAktaLahir = Kelahiran::where('noAktaLahir',$data['noAktaLahir'])->count();
        if($noAktaLahir>0){
            return redirect('add-kelahiran')->with('flash_message_error','No. Akta sudah ada');
        }else{
            $modelKelahiran = new Kelahiran;

            //$modelKelahiran->idKelahiran = $r->input('idKelahiran');

            $modelKelahiran->noAktaLahir = $r->input('noAktaLahir');
            $modelKelahiran->nama = $r->input('nama');
            $modelKelahiran->tempatLahir = $r->input('tempatLahir');
            $modelKelahiran->tglLahir = $r->input('tglLahir');
            $modelKelahiran->namaAyah = $r->input('namaAyah');
            $modelKelahiran->namaIbu = $r->input('namaIbu');
            $modelKelahiran->jk = $r->input('jk');
            $modelKelahiran->kewarganegaraan = $r->input('kewarganegaraan');
            $modelKelahiran->save();
            
            return redirect('view-kelahiran')->with('flash_message_success','Tambah data Kelahiran Sukses');
        }
    }

    function viewKelahiran(){
        $modelKelahiran = new Kelahiran;

        $kelahirans = $modelKelahiran->all();
        return view('kegiatan.kelahiran.dataKelahiran',compact('kelahirans'));
    }

    function ubahKelahiran($id){
        $kelahirans = Kelahiran::find($id);
        return view('kegiatan.kelahiran.editKelahiran',compact('kelahirans'));
    }

    function editKelahiran(Request $r,$id){
        $kelahiran = Kelahiran::findOrFail($id);

        //$kelahiran->idKelahiran = $r->input('idKelahiran');

        $kelahiran->noAktaLahir = $r->input('noAktaLahir');
        $kelahiran->nama = $r->input('nama');
        $kelahiran->tempatLahir = $r->input('tempatLahir');
        $kelahiran->tglLahir = $r->input('tglLahir');
        $kelahiran->namaAyah = $r->input('namaAyah');
        $kelahiran->namaIbu = $r->input('namaIbu');
        $kelahiran->jk = $r->input('jk');
        $kelahiran->kewarganegaraan = $r->input('kewarganegaraan');
        
        $kelahiran->save();

        return redirect('view-kelahiran')->with('flash_message_success','Ubah data Kelahiran Sukses');
    }

    function deleteKelahiran($id){
        $kelahiran = Kelahiran::findOrFail($id);
        $kelahiran->delete();

        //DB::table('tb_kelahiran')->where('idKelahiran', '=', $id)->delete();

        
        return redirect('view-kelahiran')->with('flash_message_success','data Kelahiran terhapus');
    }

}
