<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kematian;
use DB;


class KematianController extends Controller
{
    //

    function addKematian(){
        //$kode = Kematian::idKematian();
        return view('kegiatan.kematian.addKematian');
    }

    
    function tambahKematian(Request $r){
        
        $data = $r->all();
        //$noAktaLahir = Kematian::where('noAktaLahir',$data['noAktaLahir'])->count();
        // if($noAktaLahir>0){
        //     return redirect('add-kematian')->with('flash_message_error','No. Akta sudah ada');
        // }else{}

            $modelKematian = new Kematian;

            //$modelKematian->idKematian = $r->input('idKematian');
            $modelKematian->nik = $r->input('nik');
            $modelKematian->nama = $r->input('nama');
            $modelKematian->jk = $r->input('jk');
            $modelKematian->tempatLahir = $r->input('tempatLahir');
            $modelKematian->tglLahir = $r->input('tglLahir');
            $modelKematian->tempatMeninggal = $r->input('tempatMeninggal');
            $modelKematian->tglMeninggal = $r->input('tglMeninggal');
            $modelKematian->sebabMeninggal = $r->input('sebabMeninggal');
            $modelKematian->kewarganegaraan = $r->input('kewarganegaraan');
            
            $modelKematian->save();
            
            return redirect('view-kematian')->with('flash_message_success','Tambah data Kematian Sukses');
        
    }

    function viewKematian(){
        $modelKematian = new Kematian;

        $kematians = $modelKematian->all();
        return view('kegiatan.kematian.dataKematian',compact('kematians'));
    }

    function ubahKematian($id){
        $kematians = Kematian::find($id);
        return view('kegiatan.kematian.editKematian',compact('kematians'));
    }

    function editKematian(Request $r,$id){
        $kematian = Kematian::findOrFail($id);

        //$kematian->idKematian = $r->input('idKematian');

        $kematian->nik = $r->input('nik');
        $kematian->nama = $r->input('nama');
        $kematian->jk = $r->input('jk');
        $kematian->tempatLahir = $r->input('tempatLahir');
        $kematian->tglLahir = $r->input('tglLahir');
        $kematian->tempatMeninggal = $r->input('tempatMeninggal');
        $kematian->tglMeninggal = $r->input('tglMeninggal');
        $kematian->sebabMeninggal = $r->input('sebabMeninggal');
        $kematian->kewarganegaraan = $r->input('kewarganegaraan');
        
        $kematian->save();

        return redirect('view-kematian')->with('flash_message_success','Ubah data Kematian Sukses');
    }

    function deleteKematian($id){
        $kematian = Kematian::findOrFail($id);
        $kematian->delete();

        //DB::table('tb_kematian')->where('idLahir', '=', $id)->delete();

        
        return redirect('view-kematian')->with('flash_message_success','data Kematian terhapus');
    }
}
