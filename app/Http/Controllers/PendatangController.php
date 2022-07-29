<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendatang;
use DB;

class PendatangController extends Controller
{
    //

    function addPendatang(){
        //$kode = Pendatang::idPendatang();
        return view('kegiatan.pendatang.addPendatang');
    }

    
    function tambahPendatang(Request $r){
   
        $data = $r->all();
        $nik = Pendatang::where('nik',$data['nik'])->count();
        if($nik>0){
            return redirect('add-pendatang')->with('flash_message_error','No. Akta sudah ada');
        }else{

            $modelPendatang = new Pendatang;

            //$modelPendatang->idPendatang = $r->input('idPendatang');

            $modelPendatang->nik = $r->input('nik');
            $modelPendatang->nama = $r->input('nama');
            $modelPendatang->tglDatang = $r->input('tglDatang');
            $modelPendatang->alamatAsal = $r->input('alamatAsal');
            $modelPendatang->alamatSekarang = $r->input('alamatSekarang');
            $modelPendatang->jk = $r->input('jk');
            $modelPendatang->agama = $r->input('agama');
            $modelPendatang->pekerjaan = $r->input('pekerjaan');
            $modelPendatang->status = $r->input('status');
            $modelPendatang->keterangan = $r->input('keterangan');
            $modelPendatang->kewarganegaraan = $r->input('kewarganegaraan');
            
            $modelPendatang->save();
            
            return redirect('view-pendatang')->with('flash_message_success','Tambah data Pendatang Sukses');
        }
    
    }

    function viewPendatang(){
        $modelPendatang = new Pendatang;

        $pendatangs = $modelPendatang->all();
        return view('kegiatan.pendatang.dataPendatang',compact('pendatangs'));
    }

    function ubahPendatang($id){
        $pendatangs = Pendatang::find($id);
        return view('kegiatan.pendatang.editPendatang',compact('pendatangs'));
    }

    function editPendatang(Request $r,$id){
        $pendatang = Pendatang::findOrFail($id);

        //$pendatang->idPendatang = $r->input('idPendatang');

        $pendatang->nik = $r->input('nik');
        $pendatang->nama = $r->input('nama');
        $pendatang->tglDatang = $r->input('tglDatang');
        $pendatang->alamatAsal = $r->input('alamatAsal');
        $pendatang->alamatSekarang = $r->input('alamatSekarang');
        $pendatang->jk = $r->input('jk');
        $pendatang->agama = $r->input('agama');
        $pendatang->pekerjaan = $r->input('pekerjaan');
        $pendatang->status = $r->input('status');
        $pendatang->keterangan = $r->input('keterangan');
        $pendatang->kewarganegaraan = $r->input('kewarganegaraan');

        
        $pendatang->save();

        return redirect('view-pendatang')->with('flash_message_success','Ubah data Pendatang Sukses');
    }

    function deletePendatang($id){
        $pendatang = Pendatang::findOrFail($id);
        $pendatang->delete();

        //DB::table('tb_pendatang')->where('idPendatang', '=', $id)->delete();

        
        return redirect('view-pendatang')->with('flash_message_success','data Pendatang terhapus');
    }
}
