<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Penduduk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <form action="/laporan/cetak_pdf" method="get">
                            <input type="text" style="width:200px;" class="month form-control" name="month" value="<?=date('F-Y',strtotime($month))?>" hidden>
                            <input type="submit" class="btn btn-primary" value="Cetak PDF">

                        </form>
                    </div>
                    <a href="/laporan2" class="btn btn-danger">Kembali</a>
                </div>
                


                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="py-4 grid grid-cols-6 gap-4">
                        <div class="col-start-1 col-span-3"><h5 >Laporan Data Penduduk Perbulan</h5>   </div>
                        
                        <div class="col-end-7 col-span-2 ">
                            <!-- <label class="text-right" for="bulanlaporan">  Bulan : </label>
                            <input type="month" id="bulanlaporan" name="bulanlaporan" class="float-right rounded-xl" placeholder="Bulan"> -->
                            
                            <h6 style="float:right;">Bulan {{ $month }}</h6>
                        </div>
                    </div>   
                        

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th rowspan=2 style="vertical-align : middle;text-align:center;">No.</th>
                                <th rowspan=2 style="vertical-align : middle;text-align:center;">Perincian</th>
                                <th colspan=2 style="text-align:center;">Warga Negara Indonesia</th>

                                <th colspan=2 style="text-align:center;">Warga Negara Asing</th>

                                <th colspan=3 style="text-align:center;">Jumlah</th>
                            </tr>
                            <tr>
                                <th style="text-align:center;">Laki-laki</th>
                                <th style="text-align:center;">Perempuan</th>
                                <th style="text-align:center;">Laki-laki</th>
                                <th style="text-align:center;">Perempuan</th>
                                <th style="text-align:center;">Laki-laki</th>
                                <th style="text-align:center;">Perempuan</th>
                                <th style="text-align:center;">Laki-laki + Perempuan</th>

                            </tr>
                        </thead>
                        <tbody style="text-align:center;">

                            <tr>
                                <td>1</td>
                                <td style="text-align:left;">Penduduk Awal Bulan</td>
                                <td>{{$countPenduduk_wni_L}}</td>
                                <td>{{$countPenduduk_wni_P}}</td>
                                <td>{{$countPenduduk_wna_L}}</td>
                                <td>{{$countPenduduk_wna_P}}</td>
                                <td>{{$countPenduduk_L}}</td>
                                <td>{{$countPenduduk_P}}</td>
                                <td>{{$countPenduduk_L + $countPenduduk_P}}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td style="text-align:left;">Kelahiran</td>
                                <td>{{$countKelahiran_wni_L}}</td>
                                <td>{{$countKelahiran_wni_P}}</td>
                                <td>{{$countKelahiran_wna_L}}</td>
                                <td>{{$countKelahiran_wna_P}}</td>
                                <td>{{$countKelahiran_L}}</td>
                                <td>{{$countKelahiran_P}}</td>
                                <td>{{$countKelahiran_L + $countKelahiran_P}}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td style="text-align:left;">Kematian</td>
                                <td>{{$countKematian_wni_L}}</td>
                                <td>{{$countKematian_wni_P}}</td>
                                <td>{{$countKematian_wna_L}}</td>
                                <td>{{$countKematian_wna_P}}</td>
                                <td>{{$countKematian_L}}</td>
                                <td>{{$countKematian_P}}</td>
                                <td>{{$countKematian_L + $countKematian_P}}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td style="text-align:left;">Pindah</td>
                                <td>{{$countPindah_wni_L}}</td>
                                <td>{{$countPindah_wni_P}}</td>
                                <td>{{$countPindah_wna_L}}</td>
                                <td>{{$countPindah_wna_P}}</td>
                                <td>{{$countPindah_L}}</td>
                                <td>{{$countPindah_P}}</td>
                                <td>{{$countPindah_L + $countPindah_P}}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td style="text-align:left;">Pendatang</td>
                                <td>{{$countPendatang_wni_L}}</td>
                                <td>{{$countPendatang_wni_P}}</td>
                                <td>{{$countPendatang_wna_L}}</td>
                                <td>{{$countPendatang_wna_P}}</td>
                                <td>{{$countPendatang_L}}</td>
                                <td>{{$countPendatang_P}}</td>
                                <td>{{$countPendatang_L + $countPendatang_P}}</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td style="text-align:left;">Penduduk Akhir Bulan</td>
                                <td>{{$countPenduduk_wni_L + $countKelahiran_wni_L - $countKematian_wni_L
                                    + $countPendatang_wni_L - $countPindah_wni_L}}</td>
                                <td>{{$countPenduduk_wni_P + $countKelahiran_wni_P - $countKematian_wni_P
                                    + $countPendatang_wni_P - $countPindah_wni_P}}</td>
                                <td>{{$countPenduduk_wna_L + $countKelahiran_wna_L - $countKematian_wna_L
                                    + $countPendatang_wna_L - $countPindah_wna_L}}</td>
                                <td>{{$countPenduduk_wna_P + $countKelahiran_wna_P - $countKematian_wna_P
                                    + $countPendatang_wna_P - $countPindah_wna_P}}</td>
                                <td>{{$countPenduduk_L + $countKelahiran_L - $countKematian_L
                                    + $countPendatang_L - $countPindah_L}}</td>
                                <td>{{$countPenduduk_P + $countKelahiran_P - $countKematian_P
                                    + $countPendatang_P - $countPindah_P}}</td>
                                <td>{{$countPenduduk + $countKelahiran - $countKematian
                                    + $countPendatang - $countPindah}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row pt-4">
                        <div class="col-md-6">
                            <table class="table table-bordered" id="dataTable"  cellspacing="0" style="font-size:12px;">
                                <thead>
                                    <tr>
                                        <th rowspan=2 style="vertical-align : middle;text-align:center;">Pendatang</th>
                                        <th colspan=2 style="text-align:center;">Warga Negara Indonesia</th>

                                        <th colspan=2 style="text-align:center;">Warga Negara Asing</th>

                                    </tr>
                                    <tr>
                                        <th style="text-align:center;">L</th>
                                        <th style="text-align:center;">P</th>
                                        <th style="text-align:center;">L</th>
                                        <th style="text-align:center;">P</th>
                                        
                                    </tr>
                                </thead>
                                <tbody style="text-align:center;">
                                    <tr>
                                        <td style="text-align:left;">Antar Desa</td>
                                        <td>{{$countPendatang_desa_wni_L}}</td>
                                        <td>{{$countPendatang_desa_wni_P}}</td>
                                        <td>{{$countPendatang_desa_wna_L}}</td>
                                        <td>{{$countPendatang_desa_wna_P}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align:left;">Antar Kecamatan</td>
                                        <td>{{$countPendatang_kecamatan_wni_L}}</td>
                                        <td>{{$countPendatang_kecamatan_wni_P}}</td>
                                        <td>{{$countPendatang_kecamatan_wna_L}}</td>
                                        <td>{{$countPendatang_kecamatan_wna_P}}</td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="text-align:left;">Antar Kabupaten</td>
                                        <td>{{$countPendatang_kabupaten_wni_L}}</td>
                                        <td>{{$countPendatang_kabupaten_wni_P}}</td>
                                        <td>{{$countPendatang_kabupaten_wna_L}}</td>
                                        <td>{{$countPendatang_kabupaten_wna_P}}</td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="text-align:left;">Antar Provinsi</td>
                                        <td>{{$countPendatang_provinsi_wni_L}}</td>
                                        <td>{{$countPendatang_provinsi_wni_P}}</td>
                                        <td>{{$countPendatang_provinsi_wna_L}}</td>
                                        <td>{{$countPendatang_provinsi_wna_P}}</td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="text-align:left;">Dari Luar Negeri</td>
                                        <td>{{$countPendatang_negara_wni_L}}</td>
                                        <td>{{$countPendatang_negara_wni_P}}</td>
                                        <td>{{$countPendatang_negara_wna_L}}</td>
                                        <td>{{$countPendatang_negara_wna_P}}</td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:12px;">
                                <thead>
                                    <tr>
                                        <th rowspan=2 style="vertical-align : middle;text-align:center;">Pindah</th>
                                        <th colspan=2 style="text-align:center;">Warga Negara Indonesia</th>

                                        <th colspan=2 style="text-align:center;">Warga Negara Asing</th>

                                    </tr>
                                    <tr>
                                        <th style="text-align:center;">L</th>
                                        <th style="text-align:center;">P</th>
                                        <th style="text-align:center;">L</th>
                                        <th style="text-align:center;">P</th>
                                        
                                    </tr>
                                </thead>
                                <tbody style="text-align:center;">
                                    <tr>
                                        <td style="text-align:left;">Antar Desa</td>
                                        <td>{{$countPindah_desa_wni_L}}</td>
                                        <td>{{$countPindah_desa_wni_P}}</td>
                                        <td>{{$countPindah_desa_wna_L}}</td>
                                        <td>{{$countPindah_desa_wna_P}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align:left;">Antar Kecamatan</td>
                                        <td>{{$countPindah_kecamatan_wni_L}}</td>
                                        <td>{{$countPindah_kecamatan_wni_P}}</td>
                                        <td>{{$countPindah_kecamatan_wna_L}}</td>
                                        <td>{{$countPindah_kecamatan_wna_P}}</td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="text-align:left;">Antar Kabupaten</td>
                                        <td>{{$countPindah_kabupaten_wni_L}}</td>
                                        <td>{{$countPindah_kabupaten_wni_P}}</td>
                                        <td>{{$countPindah_kabupaten_wna_L}}</td>
                                        <td>{{$countPindah_kabupaten_wna_P}}</td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="text-align:left;">Antar Provinsi</td>
                                        <td>{{$countPindah_provinsi_wni_L}}</td>
                                        <td>{{$countPindah_provinsi_wni_P}}</td>
                                        <td>{{$countPindah_provinsi_wna_L}}</td>
                                        <td>{{$countPindah_provinsi_wna_P}}</td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="text-align:left;">Dari Luar Negeri</td>
                                        <td>{{$countPindah_negara_wni_L}}</td>
                                        <td>{{$countPindah_negara_wni_P}}</td>
                                        <td>{{$countPindah_negara_wna_L}}</td>
                                        <td>{{$countPindah_negara_wna_P}}</td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>