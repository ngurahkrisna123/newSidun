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

                <!-- <a href="/laporan/cetak_pdf" class="btn btn-primary" target="_blank">Cetak PDF</a> -->


                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="py-4 grid grid-cols-6 gap-4">
                        <div class="col-start-1 col-span-3"><h5 >Laporan Data Penduduk Perbulan</h5>   </div>
                        
                        <div class="col-end-7 col-span-2 ">
                            <!-- <label class="text-right" for="bulanlaporan">  Bulan : </label>
                            <input type="month" id="bulanlaporan" name="bulanlaporan" class="float-right rounded-xl" placeholder="Bulan"> -->
                        </div>
                    </div>       

                    <form action="/tabelLaporan" method="get" class="d-flex flex-row text-nowrap">
                        <label for="bulan" class="px-4">Pilih Bulan</label>
                        <input type="month" style="width:200px;" class="form-control" name="bulan">
                        <input type="submit" class="btn btn-primary mx-2" value="Cari">
                        <!-- <a href="/laporan" class="btn btn-info ml-auto" style="float:right;">Laporan</a> -->
                    </form>

                    <div class="mt-4">
                        <table class="table table-bordered">
                            <tr>
                                <th>Bulan</th>
                                <th>Jumlah Kelahiran</th>
                                <th>Jumlah Kematian</th>
                                <th>Jumlah Pindah</th>
                                <th>Jumlah Pendatang</th>
                                <th>Aksi</th>

                            </tr>
                            <?php
                                if (isset($countKelahiran) OR isset($countKematian) OR isset($countPindah) OR isset($countPendatang)) {
                                    # code...
                                
                                
                            ?>
                            <tr>
                                <td><?php echo date('F Y', strtotime($bulan));?></td>
                                <td>{{ $countKelahiran }}</td>
                                <td>{{ $countKematian }}</td>
                                <td>{{ $countPindah }}</td>
                                <td>{{ $countPendatang }}</td>
                                <td>
                                    <form action="/laporan" method="get">
                                        <input type="text" style="width:200px;" class="month form-control" name="month" value="<?=date('F-Y',strtotime($bulan))?>" hidden>
                                        <input type="submit" class="btn btn-info" value="Laporan">

                                    </form>
                                </td>
                            </tr>
                            <?php 
                                } else {
                                    # code...
                                    echo "<tr>";
                                    echo "<td colspan='6'> No Data </td>";
                                    echo "</tr>";
                                }
                            ?>
                        </table>

                    </div>
                </div>


                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



                
            </div>
        </div>
    </div>
</x-app-layout>