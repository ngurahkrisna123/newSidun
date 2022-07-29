<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use DB;
use App\Imports\PendudukImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;


class PendudukController extends Controller
{
    //

    function addPenduduk(){
        //$kode = Penduduk::idPenduduk();
        return view('datamaster.addPenduduk');
    }

    
    function tambahPenduduk(Request $r){
  
        $data = $r->all();
        $nik = Penduduk::where('nik',$data['nik'])->count();
        if($nik>0){
            return redirect('add-penduduk')->with('flash_message_error','NIK sudah ada');
        }else{
            $modelPenduduk = new Penduduk;

            //$modelPenduduk->idPenduduk = $r->input('idPenduduk');

            $modelPenduduk->nik = $r->input('nik');
            $modelPenduduk->noKK = $r->input('noKK');
            $modelPenduduk->namaPenduduk = $r->input('namaPenduduk');
            $modelPenduduk->jk = $r->input('jk');
            $modelPenduduk->tempatLahir = $r->input('tempatLahir');
            $modelPenduduk->tglLahir = $r->input('tglLahir');
            $modelPenduduk->golDarah = $r->input('golDarah');
            $modelPenduduk->alamat = $r->input('alamat');
            $modelPenduduk->agama = $r->input('agama');
            $modelPenduduk->status = $r->input('status');
            $modelPenduduk->pendidikan = $r->input('pendidikan');
            $modelPenduduk->pekerjaan = $r->input('pekerjaan');
            $modelPenduduk->kewarganegaraan = $r->input('kewarganegaraan');
            $modelPenduduk->dusun = $r->input('dusun');
            $modelPenduduk->tglBergabung = $r->input('tglBergabung');
            $modelPenduduk->save();
            
            return redirect('view-penduduk')->with('flash_message_success','Tambah data Penduduk Sukses');
        }
    }

    function viewPenduduk(){
        $modelPenduduk = new Penduduk;

        $penduduks = $modelPenduduk->all();
        return view('datamaster.dataPenduduk',compact('penduduks'));
    }

    function ubahPenduduk($id){
        $penduduks = Penduduk::find($id);
        return view('datamaster.editPenduduk',compact('penduduks'));
    }

    function editPenduduk(Request $r,$id){
        $penduduk = Penduduk::findOrFail($id);

        //$penduduk->idPenduduk = $r->input('idPenduduk');

        $penduduk->nik = $r->input('nik');
        $penduduk->noKK = $r->input('noKK');
        $penduduk->namaPenduduk = $r->input('namaPenduduk');
        $penduduk->jk = $r->input('jk');
        $penduduk->tempatLahir = $r->input('tempatLahir');
        $penduduk->tglLahir = $r->input('tglLahir');
        $penduduk->golDarah = $r->input('golDarah');
        $penduduk->alamat = $r->input('alamat');
        $penduduk->agama = $r->input('agama');
        $penduduk->status = $r->input('status');
        $penduduk->pendidikan = $r->input('pendidikan');
        $penduduk->pekerjaan = $r->input('pekerjaan');
        $penduduk->kewarganegaraan = $r->input('kewarganegaraan');
        $penduduk->dusun = $r->input('dusun');
        $penduduk->tglBergabung = $r->input('tglBergabung');
        $penduduk->save();

        return redirect('view-penduduk')->with('flash_message_success','Ubah data Penduduk Sukses');
    }

    function deletePenduduk($id){
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();
        
        return redirect('view-penduduk')->with('flash_message_success','data Penduduk terhapus');
    }

    // function searchPenduduk(Request $r){
    //     $search = $r->get('search');
    //     $penduduks = DB::table('tb_penduduk')->where('namaPenduduk','like','%'.$search.'%')->paginate(5);

    //     return view('datamaster.dataPenduduk', ['penduduks'=>$penduduks]);
    // }

    function exportPenduduk(){
        
        return Excel::download(new PendudukExport, 'data-penduduk.xlsx');

    }

    function importPenduduk(Request $request){
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_penduduk',$nama_file);
 
		// import data
		Excel::import(new PendudukImport, public_path('/file_penduduk/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Penduduk Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/view-penduduk'); 

    }
}
