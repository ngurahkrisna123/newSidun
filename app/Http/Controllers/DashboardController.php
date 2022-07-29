<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\DashboardChart;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

use App\Models\Penduduk;
use App\Models\Keluarga;
use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Pindah;
use App\Models\Pendatang;

// use App\Charts;
use DB;


class DashboardController extends Controller
{
    //

    public function index(){

        //Jumlah Penduduk
        $countPenduduk = DB::table('penduduks')->count();
        $countKelahiran = DB::table('kelahirans')->count();
        $countKematian = DB::table('kematians')->count();
        $countPidah = DB::table('pindahs')->count();
        $countPendatang = DB::table('pendatangs')->count();


        //Grafik-Charts
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];

        // $suspects = collect(DB::get('https://api.kawalcorona.com/indonesia/provinsi')->json());
        // $labels = $suspects->flatten(1)->pluck('Provinsi');
        // $data   = $suspects->flatten(1)->pluck('Kasus_Posi');

        // Grafik Pekerjaan
        $dataPekerjaan = DB::table('penduduks')
           ->select(
            DB::raw('pekerjaan as pekerjaan'),
            DB::raw('count(*) as number'))
           ->groupBy('pekerjaan')
           ->get();
        $arraypkj[] = ['Pekerjaan', 'Number'];
        foreach($dataPekerjaan as $key => $value)
        {
          $arraypkj1[++$key] = [$value->pekerjaan];
          $arraypkj2[$key] = [$value->number];
        }
        $labelPekerjaan = array_values($arraypkj1);
        $dataPekerjaan = array_values($arraypkj2);

        $pekerjaanChart = new DashboardChart;
        $pekerjaanChart->labels($labelPekerjaan);
        $pekerjaanChart->dataset('Pekerjaan', 'pie', $dataPekerjaan)
            ->color($borderColors)
            ->backgroundcolor($fillColors);;
        
        
        
            
        // Grafik Pendidikan
        $dataPendidikan = DB::table('penduduks')
            ->select(
             DB::raw('pendidikan as pendidikan'),
             DB::raw('count(*) as number'))
            ->groupBy('pendidikan')
            ->get();
         $arraypnd[] = ['Pendidikan', 'Number'];
         foreach($dataPendidikan as $key => $value)
         {
           $arraypnd1[++$key] = [$value->pendidikan];
           $arraypnd2[$key] = [$value->number];
         }
         $labelPendidikan = array_values($arraypnd1);
         $dataPendidikan = array_values($arraypnd2);
 
         $pendidikanChart = new DashboardChart;
         //$pendidikanChart->minimalist(true);
         $pendidikanChart->labels($labelPendidikan);
         $pendidikanChart->dataset('Pendidikan', 'pie', $dataPendidikan)
             ->color($borderColors)
             ->backgroundcolor($fillColors);;
        
        
        // Grafik JenisKelamin
        $dataJK = DB::table('penduduks')
            ->select(
             DB::raw('jk as jk'),
             DB::raw('count(*) as number'))
            ->groupBy('jk')
            ->get();
         $arrayjk[] = ['JenisKelamin', 'Number'];
         foreach($dataJK as $key => $value)
         {
           $arrayjk1[++$key] = [$value->jk];
           $arrayjk2[$key] = [$value->number];
         }
         $labelJK = array_values($arrayjk1);
         $dataJK = array_values($arrayjk2);
 
         $jkChart = new DashboardChart;
         $jkChart->labels($labelJK);
         $jkChart->dataset('Jenis Kelamin', 'bar', $dataJK)
             ->color($borderColors)
             ->backgroundcolor($fillColors);;
             
             
        // Grafik Agama
        $dataAgama = DB::table('penduduks')
           ->select(
            DB::raw('agama as agama'),
            DB::raw('count(*) as number'))
           ->groupBy('agama')
           ->get();
        $arrayagm[] = ['Agama', 'Number'];
        foreach($dataAgama as $key => $value)
        {
          $arrayagm1[++$key] = [$value->agama];
          $arrayagm2[$key] = [$value->number];
        }
        $labelAgama = array_values($arrayagm1);
        $dataAgama = array_values($arrayagm2);

        $agamaChart = new DashboardChart;
        $agamaChart->labels($labelAgama);
        $agamaChart->dataset('Agama', 'bar', $dataAgama)
            ->color($borderColors)
            ->backgroundcolor($fillColors);;
        
        
        $chartKelahiran = DB::table('kelahirans')
          ->select(
              DB::raw("month(created_at) as month"),
              DB::raw("count(*) as numberKelahiran")) 
          // ->orderBy("created_at")
          ->groupBy('month')
          ->get();
        $arrayklhrn[] = ['Month', 'Number'];
        foreach($chartKelahiran as $key => $value)
        {
          $arrayklhrn1[++$key] = [$value->month];
          $arrayklhrn2[$key] = [$value->numberKelahiran];
        }
        $labelKlhrn = array_values($arrayklhrn1);
        $datachartKelahiran = array_values($arrayklhrn2);


        $chartKematian = DB::table('kematians')
          ->select(
              DB::raw("month(created_at) as month"),
              DB::raw("count(*) as numberKematian")) 
          // ->orderBy("created_at")
          ->groupBy('month')
          ->get();
        $arraykmtn[] = ['Month', 'Number'];
        foreach($chartKematian as $key => $value)
        {
          $arraykmtn1[++$key] = [$value->month];
          $arraykmtn2[$key] = [$value->numberKematian];          
        }
        $labelKmtn = array_values($arraykmtn1);
        $datachartKematian = array_values($arraykmtn2);

        $chartPertumbuhanPenduduk = new DashboardChart;
        // Charts::multiDatabase('areaspline', 'highcharts')
        $chartPertumbuhanPenduduk->title('Grafik Laju Penduduk');
          // ->colors(['#ff0000', '#ffffff'])
          // ->labels(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday','Saturday', 'Sunday'])
        
        $chartPertumbuhanPenduduk->labels($labelKlhrn);
        $chartPertumbuhanPenduduk
          ->dataset('Kelahiran','line', $datachartKelahiran)->options(['borderColor' => '#97d881']);

        $chartPertumbuhanPenduduk->labels($labelKmtn);  
        $chartPertumbuhanPenduduk
          ->dataset('Kematian','line', $datachartKematian)->options(['borderColor' => '#ff0000']);
        
        
         // $result[] = ['month','Kelahiran','Kematian'];
        //   foreach ($kelahirans as $key => $value) {
        //       $result[++$key] = [$value->month, (int)$value->numberKelahiran, (int)$value->numberKematian];
        //   }


        return view('dashboard')
                ->with('countPenduduk', $countPenduduk)
                ->with('countKelahiran', $countKelahiran)
                ->with('countKematian', $countKematian)
                ->with('countPindah', $countPidah)
                ->with('countPendatang', $countPendatang)


                ->with([ 'pekerjaanChart' => $pekerjaanChart ])
                ->with([ 'pendidikanChart' => $pendidikanChart])
                ->with([ 'jkChart' => $jkChart])
                ->with([ 'agamaChart' => $agamaChart])
                ->with([ 'chartPertumbuhanPenduduk' => $chartPertumbuhanPenduduk])
              
                // ->with('visitor',json_encode($result));
                ;
        
        //return view('dashboard');

        //$this->middleware(['auth'])->name('dashboard');



    }
    
}
