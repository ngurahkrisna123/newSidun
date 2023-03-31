<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Pindah;
use App\Models\Pendatang;

use DB;
use PDF;

class LaporanController extends Controller
{
    //
    public function tabelLaporan(Request $r){
        $bulan = $r->get('bulan');

        // $year = 2000;
        // $month = $bulan;
        $date = \Carbon\Carbon::parse($bulan."-01"); // universal truth month's first day is 1
        $start = $date->startOfMonth()->format('Y-m-d H:i:s'); // 2000-02-01 00:00:00
        $end = $date->endOfMonth()->format('Y-m-d H:i:s'); // 2000-02-29 23:59:59

        $countPenduduk = DB::table('penduduks')->where('tglbergabung', '<=', $end)->count();
        $countKelahiran = DB::table('kelahirans')->whereBetween('tglLahir', [$start, $end])->count();
        $countKematian = DB::table('kematians')->whereBetween('tglMeninggal', [$start, $end])->count();
        $countPidah = DB::table('pindahs')->whereBetween('tglPindah', [$start, $end])->count();
        $countPendatang = DB::table('pendatangs')->whereBetween('tglDatang', [$start, $end])->count();

        return view('laporanpilihbulan')
                ->with('bulan', $bulan)
                ->with('countPenduduk', $countPenduduk)
                ->with('countKelahiran', $countKelahiran)
                ->with('countKematian', $countKematian)
                ->with('countPindah', $countPidah)
                ->with('countPendatang', $countPendatang);
    }


    public function index(Request $r)
    {

        $month = $r->get('month');

        // $year = 2000;
        // $month = 2;
        $date = \Carbon\Carbon::parse($month."-01"); // universal truth month's first day is 1
        $start = $date->startOfMonth()->format('Y-m-d H:i:s'); // 2000-02-01 00:00:00
        $end = $date->endOfMonth()->format('Y-m-d H:i:s'); // 2000-02-29 23:59:59

    	//TABEL
        $countPenduduk = (DB::table('penduduks')->where('tglbergabung', '<=', $start)->count()) 
                        +(DB::table('kelahirans')->where('tglLahir', '<=', $start)->count()) 
                        -(DB::table('kematians')->where('tglMeninggal', '<=', $start)->count()) 
                        -(DB::table('pindahs')->where('tglPindah', '<=', $start)->count()) 
                        +(DB::table('pendatangs')->where('tglDatang', '<=', $start)->count());
        $countPenduduk_L = (DB::table('penduduks')->where('jk', 'male')->where('tglbergabung', '<=', $start)->count())
                          +(DB::table('kelahirans')->where('jk', 'male')->where('tglLahir', '<=', $start)->count())
                          -(DB::table('kematians')->where('jk', 'male')->where('tglMeninggal', '<=', $start)->count())
                          -(DB::table('pindahs')->where('jk', 'male')->where('tglPindah', '<=', $start)->count())
                          +(DB::table('pendatangs')->where('jk', 'male')->where('tglDatang', '<=', $start)->count());
        $countPenduduk_P = (DB::table('penduduks')->where('jk', 'female')->where('tglbergabung', '<=', $start)->count())
                          +(DB::table('kelahirans')->where('jk', 'female')->where('tglLahir', '<=', $start)->count())
                          -(DB::table('kematians')->where('jk', 'female')->where('tglMeninggal', '<=', $start)->count())
                          -(DB::table('pindahs')->where('jk', 'female')->where('tglPindah', '<=', $start)->count())
                          +(DB::table('pendatangs')->where('jk', 'female')->where('tglDatang', '<=', $start)->count());
        $countPenduduk_wni_L = (DB::table('penduduks')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('tglbergabung', '<=', $start)->count())
                              +(DB::table('kelahirans')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('tglLahir', '<=', $start)->count())
                              -(DB::table('kematians')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('tglMeninggal', '<=', $start)->count())
                              -(DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('tglPindah', '<=', $start)->count())
                              +(DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('tglDatang', '<=', $start)->count());
        $countPenduduk_wni_P = (DB::table('penduduks')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('tglbergabung', '<=', $start)->count())
                              +(DB::table('kelahirans')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('tglLahir', '<=', $start)->count())
                              -(DB::table('kematians')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('tglMeninggal', '<=', $start)->count())
                              -(DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('tglPindah', '<=', $start)->count())
                              +(DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('tglDatang', '<=', $start)->count());
        $countPenduduk_wna_L = (DB::table('penduduks')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('tglbergabung', '<=', $start)->count())
                              +(DB::table('kelahirans')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('tglLahir', '<=', $start)->count())
                              -(DB::table('kematians')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('tglMeninggal', '<=', $start)->count())
                              -(DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('tglPindah', '<=', $start)->count())
                              +(DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('tglDatang', '<=', $start)->count());
        $countPenduduk_wna_P = (DB::table('penduduks')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('tglbergabung', '<=', $start)->count())
                              +(DB::table('kelahirans')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('tglLahir', '<=', $start)->count())
                              -(DB::table('kematians')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('tglMeninggal', '<=', $start)->count())
                              -(DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('tglPindah', '<=', $start)->count())
                              +(DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('tglDatang', '<=', $start)->count());

        $countKelahiran = DB::table('kelahirans')->whereBetween('tglLahir', [$start, $end])->count();
        $countKelahiran_L = DB::table('kelahirans')->where('jk', 'male')->whereBetween('tglLahir', [$start, $end])->count();
        $countKelahiran_P = DB::table('kelahirans')->where('jk', 'female')->whereBetween('tglLahir', [$start, $end])->count();
        $countKelahiran_wni_L = DB::table('kelahirans')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->whereBetween('tglLahir', [$start, $end])->count();
        $countKelahiran_wni_P = DB::table('kelahirans')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->whereBetween('tglLahir', [$start, $end])->count();
        $countKelahiran_wna_L = DB::table('kelahirans')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->whereBetween('tglLahir', [$start, $end])->count();
        $countKelahiran_wna_P = DB::table('kelahirans')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->whereBetween('tglLahir', [$start, $end])->count();

        $countKematian = DB::table('kematians')->whereBetween('tglMeninggal', [$start, $end])->count();
        $countKematian_L = DB::table('kematians')->where('jk', 'male')->whereBetween('tglMeninggal', [$start, $end])->count();
        $countKematian_P = DB::table('kematians')->where('jk', 'female')->whereBetween('tglMeninggal', [$start, $end])->count();
        $countKematian_wni_L = DB::table('kematians')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->whereBetween('tglMeninggal', [$start, $end])->count();
        $countKematian_wni_P = DB::table('kematians')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->whereBetween('tglMeninggal', [$start, $end])->count();
        $countKematian_wna_L = DB::table('kematians')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->whereBetween('tglMeninggal', [$start, $end])->count();
        $countKematian_wna_P = DB::table('kematians')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->whereBetween('tglMeninggal', [$start, $end])->count();

        $countPindah = DB::table('pindahs')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_L = DB::table('pindahs')->where('jk', 'male')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_P = DB::table('pindahs')->where('jk', 'female')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_wni_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_wni_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_wna_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_wna_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->whereBetween('tglPindah', [$start, $end])->count();

        $countPendatang = DB::table('pendatangs')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_L = DB::table('pendatangs')->where('jk', 'male')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_P = DB::table('pendatangs')->where('jk', 'female')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_wni_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_wni_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_wna_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_wna_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->whereBetween('tglDatang', [$start, $end])->count();

        $countTotal = $countPenduduk+$countKelahiran-$countKematian-$countPindah+$countPendatang;


        $countPendatang_desa_wni_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Desa')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_desa_wni_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Desa')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_desa_wna_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Desa')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_desa_wna_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Desa')->whereBetween('tglDatang', [$start, $end])->count();

        $countPendatang_kecamatan_wni_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kecamatan')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_kecamatan_wni_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kecamatan')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_kecamatan_wna_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kecamatan')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_kecamatan_wna_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kecamatan')->whereBetween('tglDatang', [$start, $end])->count();
        
        $countPendatang_kabupaten_wni_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kabupaten')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_kabupaten_wni_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kabupaten')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_kabupaten_wna_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kabupaten')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_kabupaten_wna_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kabupaten')->whereBetween('tglDatang', [$start, $end])->count();
        
        $countPendatang_provinsi_wni_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Provinsi')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_provinsi_wni_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Provinsi')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_provinsi_wna_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Provinsi')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_provinsi_wna_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Provinsi')->whereBetween('tglDatang', [$start, $end])->count();
        
        $countPendatang_negara_wni_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Negara')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_negara_wni_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Negara')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_negara_wna_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Negara')->whereBetween('tglDatang', [$start, $end])->count();
        $countPendatang_negara_wna_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Negara')->whereBetween('tglDatang', [$start, $end])->count();
        
        // #####################################################################################
        $countPindah_desa_wni_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Desa')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_desa_wni_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Desa')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_desa_wna_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Desa')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_desa_wna_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Desa')->whereBetween('tglPindah', [$start, $end])->count();

        $countPindah_kecamatan_wni_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kecamatan')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_kecamatan_wni_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kecamatan')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_kecamatan_wna_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kecamatan')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_kecamatan_wna_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kecamatan')->whereBetween('tglPindah', [$start, $end])->count();
        
        $countPindah_kabupaten_wni_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kabupaten')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_kabupaten_wni_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kabupaten')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_kabupaten_wna_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kabupaten')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_kabupaten_wna_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kabupaten')->whereBetween('tglPindah', [$start, $end])->count();
        
        $countPindah_provinsi_wni_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Provinsi')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_provinsi_wni_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Provinsi')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_provinsi_wna_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Provinsi')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_provinsi_wna_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Provinsi')->whereBetween('tglPindah', [$start, $end])->count();
        
        $countPindah_negara_wni_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Negara')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_negara_wni_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Negara')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_negara_wna_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Negara')->whereBetween('tglPindah', [$start, $end])->count();
        $countPindah_negara_wna_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Negara')->whereBetween('tglPindah', [$start, $end])->count();
        

    	return view('laporan')
                ->with('month',$month)

                ->with('countTotal',$countTotal)
                ->with('countPenduduk', $countPenduduk)                
                ->with('countPenduduk_L', $countPenduduk_L)
                ->with('countPenduduk_P', $countPenduduk_P)
                ->with('countPenduduk_wni_L', $countPenduduk_wni_L)
                ->with('countPenduduk_wni_P', $countPenduduk_wni_P)
                ->with('countPenduduk_wna_L', $countPenduduk_wna_L)
                ->with('countPenduduk_wna_P', $countPenduduk_wna_P)

                ->with('countKelahiran', $countKelahiran)                
                ->with('countKelahiran_L', $countKelahiran_L)
                ->with('countKelahiran_P', $countKelahiran_P)
                ->with('countKelahiran_wni_L', $countKelahiran_wni_L)
                ->with('countKelahiran_wni_P', $countKelahiran_wni_P)
                ->with('countKelahiran_wna_L', $countKelahiran_wna_L)
                ->with('countKelahiran_wna_P', $countKelahiran_wna_P)

                ->with('countKematian', $countKematian)                
                ->with('countKematian_L', $countKematian_L)
                ->with('countKematian_P', $countKematian_P)
                ->with('countKematian_wni_L', $countKematian_wni_L)
                ->with('countKematian_wni_P', $countKematian_wni_P)
                ->with('countKematian_wna_L', $countKematian_wna_L)
                ->with('countKematian_wna_P', $countKematian_wna_P)

                ->with('countPindah', $countPindah)                
                ->with('countPindah_L', $countPindah_L)
                ->with('countPindah_P', $countPindah_P)
                ->with('countPindah_wni_L', $countPindah_wni_L)
                ->with('countPindah_wni_P', $countPindah_wni_P)
                ->with('countPindah_wna_L', $countPindah_wna_L)
                ->with('countPindah_wna_P', $countPindah_wna_P)

                ->with('countPendatang', $countPendatang)                
                ->with('countPendatang_L', $countPendatang_L)
                ->with('countPendatang_P', $countPendatang_P)
                ->with('countPendatang_wni_L', $countPendatang_wni_L)
                ->with('countPendatang_wni_P', $countPendatang_wni_P)
                ->with('countPendatang_wna_L', $countPendatang_wna_L)
                ->with('countPendatang_wna_P', $countPendatang_wna_P)
                
                
                ->with('countPendatang_desa_wni_L', $countPendatang_desa_wni_L)
                ->with('countPendatang_desa_wni_P', $countPendatang_desa_wni_P)
                ->with('countPendatang_desa_wna_L', $countPendatang_desa_wna_L)
                ->with('countPendatang_desa_wna_P', $countPendatang_desa_wna_P)
                ->with('countPendatang_kecamatan_wni_L', $countPendatang_kecamatan_wni_L)
                ->with('countPendatang_kecamatan_wni_P', $countPendatang_kecamatan_wni_P)
                ->with('countPendatang_kecamatan_wna_L', $countPendatang_kecamatan_wna_L)
                ->with('countPendatang_kecamatan_wna_P', $countPendatang_kecamatan_wna_P)
                ->with('countPendatang_kabupaten_wni_L', $countPendatang_kabupaten_wni_L)
                ->with('countPendatang_kabupaten_wni_P', $countPendatang_kabupaten_wni_P)
                ->with('countPendatang_kabupaten_wna_L', $countPendatang_kabupaten_wna_L)
                ->with('countPendatang_kabupaten_wna_P', $countPendatang_kabupaten_wna_P)
                ->with('countPendatang_provinsi_wni_L', $countPendatang_provinsi_wni_L)
                ->with('countPendatang_provinsi_wni_P', $countPendatang_provinsi_wni_P)
                ->with('countPendatang_provinsi_wna_L', $countPendatang_provinsi_wna_L)
                ->with('countPendatang_provinsi_wna_P', $countPendatang_provinsi_wna_P)
                ->with('countPendatang_negara_wni_L', $countPendatang_negara_wni_L)
                ->with('countPendatang_negara_wni_P', $countPendatang_negara_wni_P)
                ->with('countPendatang_negara_wna_L', $countPendatang_negara_wna_L)
                ->with('countPendatang_negara_wna_P', $countPendatang_negara_wna_P)

                ->with('countPindah_desa_wni_L', $countPindah_desa_wni_L)
                ->with('countPindah_desa_wni_P', $countPindah_desa_wni_P)
                ->with('countPindah_desa_wna_L', $countPindah_desa_wna_L)
                ->with('countPindah_desa_wna_P', $countPindah_desa_wna_P)
                ->with('countPindah_kecamatan_wni_L', $countPindah_kecamatan_wni_L)
                ->with('countPindah_kecamatan_wni_P', $countPindah_kecamatan_wni_P)
                ->with('countPindah_kecamatan_wna_L', $countPindah_kecamatan_wna_L)
                ->with('countPindah_kecamatan_wna_P', $countPindah_kecamatan_wna_P)
                ->with('countPindah_kabupaten_wni_L', $countPindah_kabupaten_wni_L)
                ->with('countPindah_kabupaten_wni_P', $countPindah_kabupaten_wni_P)
                ->with('countPindah_kabupaten_wna_L', $countPindah_kabupaten_wna_L)
                ->with('countPindah_kabupaten_wna_P', $countPindah_kabupaten_wna_P)
                ->with('countPindah_provinsi_wni_L', $countPindah_provinsi_wni_L )
                ->with('countPindah_provinsi_wni_P', $countPindah_provinsi_wni_P )
                ->with('countPindah_provinsi_wna_L', $countPindah_provinsi_wna_L )
                ->with('countPindah_provinsi_wna_P', $countPindah_provinsi_wna_P )
                ->with('countPindah_negara_wni_L', $countPindah_negara_wni_L )
                ->with('countPindah_negara_wni_P', $countPindah_negara_wni_P )
                ->with('countPindah_negara_wna_L', $countPindah_negara_wna_L )
                ->with('countPindah_negara_wna_P', $countPindah_negara_wna_P)

                ;

    }

    

    public function cetak_pdf(Request $r)
    {
        $month = $r->get('month');

        // $year = 2000;
        // $month = 2;
        $date = \Carbon\Carbon::parse($month."-01"); // universal truth month's first day is 1
        $start = $date->startOfMonth()->format('Y-m-d H:i:s'); // 2000-02-01 00:00:00
        $end = $date->endOfMonth()->format('Y-m-d H:i:s'); // 2000-02-29 23:59:59
        
        $countPenduduk = (DB::table('penduduks')->where('created_at', '<=', $start)->count()) 
                        +(DB::table('kelahirans')->where('created_at', '<=', $start)->count()) 
                        -(DB::table('kematians')->where('created_at', '<=', $start)->count()) 
                        -(DB::table('pindahs')->where('created_at', '<=', $start)->count()) 
                        +(DB::table('pendatangs')->where('created_at', '<=', $start)->count());
        $countPenduduk_L = (DB::table('penduduks')->where('jk', 'male')->where('created_at', '<=', $start)->count())
                          +(DB::table('kelahirans')->where('jk', 'male')->where('created_at', '<=', $start)->count())
                          -(DB::table('kematians')->where('jk', 'male')->where('created_at', '<=', $start)->count())
                          -(DB::table('pindahs')->where('jk', 'male')->where('created_at', '<=', $start)->count())
                          +(DB::table('pendatangs')->where('jk', 'male')->where('created_at', '<=', $start)->count());
        $countPenduduk_P = (DB::table('penduduks')->where('jk', 'female')->where('created_at', '<=', $start)->count())
                          +(DB::table('kelahirans')->where('jk', 'female')->where('created_at', '<=', $start)->count())
                          -(DB::table('kematians')->where('jk', 'female')->where('created_at', '<=', $start)->count())
                          -(DB::table('pindahs')->where('jk', 'female')->where('created_at', '<=', $start)->count())
                          +(DB::table('pendatangs')->where('jk', 'female')->where('created_at', '<=', $start)->count());
        $countPenduduk_wni_L = (DB::table('penduduks')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('created_at', '<=', $start)->count())
                              +(DB::table('kelahirans')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('created_at', '<=', $start)->count())
                              -(DB::table('kematians')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('created_at', '<=', $start)->count())
                              -(DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('created_at', '<=', $start)->count())
                              +(DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('created_at', '<=', $start)->count());
        $countPenduduk_wni_P = (DB::table('penduduks')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('created_at', '<=', $start)->count())
                              +(DB::table('kelahirans')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('created_at', '<=', $start)->count())
                              -(DB::table('kematians')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('created_at', '<=', $start)->count())
                              -(DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('created_at', '<=', $start)->count())
                              +(DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('created_at', '<=', $start)->count());
        $countPenduduk_wna_L = (DB::table('penduduks')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('created_at', '<=', $start)->count())
                              +(DB::table('kelahirans')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('created_at', '<=', $start)->count())
                              -(DB::table('kematians')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('created_at', '<=', $start)->count())
                              -(DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('created_at', '<=', $start)->count())
                              +(DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('created_at', '<=', $start)->count());
        $countPenduduk_wna_P = (DB::table('penduduks')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('created_at', '<=', $start)->count())
                              +(DB::table('kelahirans')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('created_at', '<=', $start)->count())
                              -(DB::table('kematians')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('created_at', '<=', $start)->count())
                              -(DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('created_at', '<=', $start)->count())
                              +(DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('created_at', '<=', $start)->count());
        

        // $countPenduduk_L = DB::table('penduduks')->where('jk', 'male')->count();
        // $countPenduduk_P = DB::table('penduduks')->where('jk', 'female')->count();
        // $countPenduduk_wni_L = DB::table('penduduks')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->count();
        // $countPenduduk_wni_P = DB::table('penduduks')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->count();
        // $countPenduduk_wna_L = DB::table('penduduks')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->count();
        // $countPenduduk_wna_P = DB::table('penduduks')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->count();

        $countKelahiran = DB::table('kelahirans')->whereBetween('created_at', [$start, $end])->count();
        $countKelahiran_L = DB::table('kelahirans')->where('jk', 'male')->whereBetween('created_at', [$start, $end])->count();
        $countKelahiran_P = DB::table('kelahirans')->where('jk', 'female')->whereBetween('created_at', [$start, $end])->count();
        $countKelahiran_wni_L = DB::table('kelahirans')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->whereBetween('created_at', [$start, $end])->count();
        $countKelahiran_wni_P = DB::table('kelahirans')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->whereBetween('created_at', [$start, $end])->count();
        $countKelahiran_wna_L = DB::table('kelahirans')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->whereBetween('created_at', [$start, $end])->count();
        $countKelahiran_wna_P = DB::table('kelahirans')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->whereBetween('created_at', [$start, $end])->count();

        $countKematian = DB::table('kematians')->whereBetween('created_at', [$start, $end])->count();
        $countKematian_L = DB::table('kematians')->where('jk', 'male')->whereBetween('created_at', [$start, $end])->count();
        $countKematian_P = DB::table('kematians')->where('jk', 'female')->whereBetween('created_at', [$start, $end])->count();
        $countKematian_wni_L = DB::table('kematians')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->whereBetween('created_at', [$start, $end])->count();
        $countKematian_wni_P = DB::table('kematians')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->whereBetween('created_at', [$start, $end])->count();
        $countKematian_wna_L = DB::table('kematians')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->whereBetween('created_at', [$start, $end])->count();
        $countKematian_wna_P = DB::table('kematians')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->whereBetween('created_at', [$start, $end])->count();

        $countPindah = DB::table('pindahs')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_L = DB::table('pindahs')->where('jk', 'male')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_P = DB::table('pindahs')->where('jk', 'female')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_wni_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_wni_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_wna_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_wna_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->whereBetween('created_at', [$start, $end])->count();

        $countPendatang = DB::table('pendatangs')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_L = DB::table('pendatangs')->where('jk', 'male')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_P = DB::table('pendatangs')->where('jk', 'female')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_wni_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_wni_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_wna_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_wna_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->whereBetween('created_at', [$start, $end])->count();

        // $countPenduduk = DB::table('penduduks')->count();
        // $countKelahiran = DB::table('kelahirans')->count();
        // $countKematian = DB::table('kematians')->count();
        // $countPindah = DB::table('pindahs')->count();
        // $countPendatang = DB::table('pendatangs')->count();

        $countwniLTotal = $countPenduduk_wni_L+$countKelahiran_wni_L-$countKematian_wni_L+$countPendatang_wni_L-$countPindah_wni_L;
        $countwniPTotal = $countPenduduk_wni_P+$countKelahiran_wni_P-$countKematian_wni_P+$countPendatang_wni_P-$countPindah_wni_P;
        $countwnaLTotal = $countPenduduk_wna_L+$countKelahiran_wna_L-$countKematian_wna_L+$countPendatang_wna_L-$countPindah_wna_L;
        $countwnaPTotal = $countPenduduk_wna_P+$countKelahiran_wna_P-$countKematian_wna_P+$countPendatang_wna_P-$countPindah_wna_P;
        $countLTotal = $countPenduduk_L+$countKelahiran_L-$countKematian_L+$countPendatang_L-$countPindah_L;
        $countPTotal = $countPenduduk_P+$countKelahiran_P-$countKematian_P+$countPendatang_P-$countPindah_P;

        $countTotal = $countPenduduk+$countKelahiran-$countKematian+$countPendatang-$countPindah;


        $countPendatang_desa_wni_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Desa')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_desa_wni_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Desa')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_desa_wna_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Desa')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_desa_wna_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Desa')->whereBetween('created_at', [$start, $end])->count();

        $countPendatang_kecamatan_wni_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kecamatan')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_kecamatan_wni_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kecamatan')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_kecamatan_wna_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kecamatan')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_kecamatan_wna_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kecamatan')->whereBetween('created_at', [$start, $end])->count();
        
        $countPendatang_kabupaten_wni_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kabupaten')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_kabupaten_wni_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kabupaten')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_kabupaten_wna_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kabupaten')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_kabupaten_wna_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kabupaten')->whereBetween('created_at', [$start, $end])->count();
        
        $countPendatang_provinsi_wni_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Provinsi')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_provinsi_wni_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Provinsi')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_provinsi_wna_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Provinsi')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_provinsi_wna_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Provinsi')->whereBetween('created_at', [$start, $end])->count();
        
        $countPendatang_negara_wni_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Negara')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_negara_wni_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Negara')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_negara_wna_L = DB::table('pendatangs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Negara')->whereBetween('created_at', [$start, $end])->count();
        $countPendatang_negara_wna_P = DB::table('pendatangs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Negara')->whereBetween('created_at', [$start, $end])->count();
        
        // #####################################################################################
        $countPindah_desa_wni_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Desa')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_desa_wni_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Desa')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_desa_wna_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Desa')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_desa_wna_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Desa')->whereBetween('created_at', [$start, $end])->count();

        $countPindah_kecamatan_wni_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kecamatan')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_kecamatan_wni_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kecamatan')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_kecamatan_wna_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kecamatan')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_kecamatan_wna_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kecamatan')->whereBetween('created_at', [$start, $end])->count();
        
        $countPindah_kabupaten_wni_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kabupaten')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_kabupaten_wni_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Kabupaten')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_kabupaten_wna_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kabupaten')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_kabupaten_wna_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Kabupaten')->whereBetween('created_at', [$start, $end])->count();
        
        $countPindah_provinsi_wni_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Provinsi')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_provinsi_wni_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Provinsi')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_provinsi_wna_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Provinsi')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_provinsi_wna_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Provinsi')->whereBetween('created_at', [$start, $end])->count();
        
        $countPindah_negara_wni_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Negara')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_negara_wni_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Indonesia')->where('keterangan','Antar Negara')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_negara_wna_L = DB::table('pindahs')->where('jk', 'male')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Negara')->whereBetween('created_at', [$start, $end])->count();
        $countPindah_negara_wna_P = DB::table('pindahs')->where('jk', 'female')->where('kewarganegaraan', 'Asing')->where('keterangan','Antar Negara')->whereBetween('created_at', [$start, $end])->count();



        $exportData = [
            $countPenduduk_wni_L,
            $countPenduduk_wni_P,
            $countPenduduk_wna_L,
            $countPenduduk_wna_P,
            $countPenduduk_L,
            $countPenduduk_P,

            $countKelahiran_wni_L,
            $countKelahiran_wni_P,
            $countKelahiran_wna_L,
            $countKelahiran_wna_P,
            $countKelahiran_L,
            $countKelahiran_P,

            $countKematian_wni_L,
            $countKematian_wni_P,
            $countKematian_wna_L,
            $countKematian_wna_P,
            $countKematian_L,
            $countKematian_P,

            $countPindah_wni_L,
            $countPindah_wni_P,
            $countPindah_wna_L,
            $countPindah_wna_P,
            $countPindah_L,
            $countPindah_P,

            $countPendatang_wni_L,
            $countPendatang_wni_P,
            $countPendatang_wna_L,
            $countPendatang_wna_P,
            $countPendatang_L,
            $countPendatang_P,

            $countwniLTotal,
            $countwniPTotal,
            $countwnaLTotal,
            $countwnaPTotal,
            $countLTotal,
            $countPTotal, 
            //$countTotal,



            $countPendatang_desa_wni_L,
            $countPendatang_desa_wni_P,
            $countPendatang_desa_wna_L,
            $countPendatang_desa_wna_P,
            $countPendatang_kecamatan_wni_L,
            $countPendatang_kecamatan_wni_P,
            $countPendatang_kecamatan_wna_L,
            $countPendatang_kecamatan_wna_P,

            $countPendatang_kabupaten_wni_L,
            $countPendatang_kabupaten_wni_P,
            $countPendatang_kabupaten_wna_L,
            $countPendatang_kabupaten_wna_P,

            $countPendatang_provinsi_wni_L,
            $countPendatang_provinsi_wni_P,
            $countPendatang_provinsi_wna_L,
            $countPendatang_provinsi_wna_P,

            $countPendatang_negara_wni_L,
            $countPendatang_negara_wni_P,
            $countPendatang_negara_wna_L,
            $countPendatang_negara_wna_P,

        // ############################,
            $countPindah_desa_wni_L,
            $countPindah_desa_wni_P,
            $countPindah_desa_wna_L,
            $countPindah_desa_wna_P,
            $countPindah_kecamatan_wni_L,
            $countPindah_kecamatan_wni_P,
            $countPindah_kecamatan_wna_L,
            $countPindah_kecamatan_wna_P,

            $countPindah_kabupaten_wni_L,
            $countPindah_kabupaten_wni_P,
            $countPindah_kabupaten_wna_L,
            $countPindah_kabupaten_wna_P,

            $countPindah_provinsi_wni_L,
            $countPindah_provinsi_wni_P,
            $countPindah_provinsi_wna_L,
            $countPindah_provinsi_wna_P,

            $countPindah_negara_wni_L,
            $countPindah_negara_wni_P,
            $countPindah_negara_wna_L,
            $countPindah_negara_wna_P,

            $month
        ];
 
    	$pdf = PDF::loadview('laporan_pdf',compact('exportData'));
    	//return $pdf->download('laporan-pegawai-pdf');
        return $pdf->stream('Laporan-Penduduk-Bulan-'.$month);
    }
}
