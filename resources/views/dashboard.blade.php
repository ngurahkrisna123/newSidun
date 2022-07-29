<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                    
                    <p class="text-xl ">Demografi Data Penduduk</p>

                    <div class="grid grid-cols-12 gap-6 border-b-2 pb-5">
                        <div class="col-start-1 col-end-13">
                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-5 mt-3">
                                <div class="p-4 bg-green-200 ">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                        <div class="px-2">
                                            <p class="text-xl font-bold">{{ $countPenduduk }}</p>
                                            <p class="text-xs font-semibold text-gray-400">Jumlah Penduduk</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 bg-blue-200 ">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                        <div class="px-2">
                                            <p class="text-xl font-bold">{{ $countKelahiran }}</p>
                                            <p class="text-xs font-semibold text-gray-400">Jumlah Kelahiran</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 bg-red-200 ">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                        <div class="px-2">
                                            <p class="text-xl font-bold">{{ $countKematian }}</p>
                                            <p class="text-xs font-semibold text-gray-400">Jumlah Kematian</p>
                                        </div>
                                    </div> 
                                </div>
                                <div class=" p-4 bg-yellow-200 ">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                        <div class="px-2">
                                            <p class="text-xl font-bold">{{ $countPindah }}</p>
                                            <p class="text-xs font-semibold text-gray-400">Jumlah Pindah</p>
                                        </div>
                                    </div>
                                </div>
                                <div class=" p-4 bg-purple-200 ">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                        <div class="px-2">
                                            <p class="text-xl font-bold">{{ $countPendatang }}</p>
                                            <p class="text-xs font-semibold text-gray-400">Jumlah Pendatang</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-4">
                       <p class="text-xl ">Grafik Data Penduduk</p>
                    </div>
                    <div class="grid grid-cols-12 gap-6 border-b-2 pb-5"> 
                        <div class="col-start-1 col-end-13">
                            <div class="grid grid-cols-2 gap-2">
                                <div class="p-2" style="width: 90%;  height: 80%">
                                    <p class="text-lg text-center font-semibold text-gray-400 pb-4">Pekerjaan Penduduk</p>

                                    {!! $pekerjaanChart->container() !!}
                                </div>
                                <div class="p-2" style="width: 90%; height: 80%">
                                    <p class="text-lg text-center font-semibold text-gray-400 pb-4">Pendididkan Akhir Penduduk</p>
                                    {!! $pendidikanChart->container() !!}
                                </div>
                                <div class="p-2" style="width: 90%; height: 75%">
                                    <p class="text-lg text-center font-semibold text-gray-400 pb-4">Jenis Kelamin Penduduk</p>
                                    {!! $jkChart->container() !!}
                                </div>
                                <div class="p-2" style="width: 90%; height: 75%">
                                    <p class="text-lg text-center font-semibold text-gray-400 pb-4">Agama Penduduk</p>
                                    {!! $agamaChart->container() !!}

                                </div>

                            </div>
                           
                            <div>
                            {!! $chartPertumbuhanPenduduk->container() !!}
                            </div>

                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


    {!! $pekerjaanChart->script() !!}
    {!! $pendidikanChart->script() !!}
    {!! $jkChart->script() !!}
    {!! $agamaChart->script() !!}

    {!! $chartPertumbuhanPenduduk->script() !!}



</x-app-layout>
