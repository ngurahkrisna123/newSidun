<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pindah;
use DB;

use Session;

class PindahController extends Controller
{
    //

    function addPindah(){
        //$kode = Pindah::idPindah();
        return view('kegiatan.pindah.addPindah');
    }

    
    function tambahPindah(Request $r){
        
        
        
        $data = $r->all();
        //$noAktaLahir = Pindah::where('noAktaLahir',$data['noAktaLahir'])->count();
        //if($noAktaLahir>0){
        //    return redirect('add-pindah')->with('flash_message_error','No. Akta sudah ada');
        //}else{}

            $modelPindah = new Pindah;

            //$modelPindah->idPindah = $r->input('idPindah');
            $modelPindah->nik = $r->input('nik');
            $modelPindah->nama = $r->input('nama');
            $modelPindah->tglPindah = $r->input('tglPindah');
            $modelPindah->alamatAsal = $r->input('alamatAsal');
            $modelPindah->alamatPindah = $r->input('alamatPindah');
            $modelPindah->jk = $r->input('jk');
            $modelPindah->agama = $r->input('agama');
            $modelPindah->pekerjaan = $r->input('pekerjaan');
            $modelPindah->status = $r->input('status');
            $modelPindah->keterangan = $r->input('keterangan');
            $modelPindah->kewarganegaraan = $r->input('kewarganegaraan');
            
            $modelPindah->save();
            
            return redirect('view-pindah')->with('flash_message_success','Tambah data Pindah Sukses');
        
    }

    function viewPindah(){
        $modelPindah = new Pindah;

        $pindahs = $modelPindah->all();
        return view('kegiatan.pindah.dataPindah',compact('pindahs'));
    }

    function ubahPindah($id){
        $pindahs = Pindah::find($id);
        return view('kegiatan.pindah.editPindah',compact('pindahs'));
    }

    function editPindah(Request $r,$id){
        $pindah = Pindah::findOrFail($id);

        //$pindah->idPindah = $r->input('idPindah');

        $pindah->nik = $r->input('nik');
        $pindah->nama = $r->input('nama');
        $pindah->tglPindah = $r->input('tglPindah');
        $pindah->alamatAsal = $r->input('alamatAsal');
        $pindah->alamatPindah = $r->input('alamatPindah');
        $pindah->jk = $r->input('jk');
        $pindah->agama = $r->input('agama');
        $pindah->pekerjaan = $r->input('pekerjaan');
        $pindah->status = $r->input('status');
        $pindah->keterangan = $r->input('keterangan');
        $pindah->kewarganegaraan = $r->input('kewarganegaraan');

        
        $pindah->save();

        return redirect('view-pindah')->with('flash_message_success','Ubah data Pindah Sukses');
    }

    function deletePindah($id){
        $pindah = Pindah::findOrFail($id);
        $pindah->delete();

        //DB::table('tb_pindah')->where('idPindah', '=', $id)->delete();

        
        return redirect('view-pindah')->with('flash_message_success','data Pindah terhapus');
    }

}
