<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Pendatang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Tambah Data Pendatang

                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="row" action="{{ route('add-pendatang') }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                    
                        <div class="col-md-12" >
                            
                            <div class="form-group">
                                <label>NIK :</label>
                                <input type="text" name="nik" class="form-control"  required>
                            </div>
                            <div class="form-group">
                                <label>Nama :</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Tanggal Datang :</label><br>
                                <input type="date" name="tglDatang" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat Asal :</label>
                                <input type="text" name="alamatAsal" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat Sekarang :</label>
                                <input type="text" name="alamatSekarang" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Agama :</label>
                                <!-- <input type="text" name="agama" class="form-control" required> -->
                                <select id="agama" name="agama" class="form-control" required>
                                    <option value="" disabled selected hidden>Pilih Agama</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="KongHuChu">KongHuChu</option>
                                    <option value="Lainnya">Lainnya</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin :</label><br>
                                <select id="jk" name="jk" class="form-control" required>
                                    <option value="" disabled selected hidden >Pilih Jenis Kelamin</option>
                                    <option value="Lk">Laki-laki</option>
                                    <option value="Pr">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan :</label>
                                <!-- <input type="text" name="pekerjaan" class="form-control" required> -->
                                <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                                    <option value="" disabled selected hidden>Pilih Pekerjaan</option>
                                    <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
                                    <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                    <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Dosen">Dosen</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Karyawan Honorer">Karyawan Honorer</option>
                                    <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status :</label>
                                <!-- <input type="text" name="status" class="form-control" required> -->
                                <select name="status" id="status" class="form-control" required>
                                    <option value="" disabled selected hidden>Pilih Status</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Belum Kawin">Belum Kawin</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan Pendatang :</label>
                                <!-- <input type="text" name="keterangan" class="form-control" > -->
                                <select name="keterangan" id="keterangan" class="form-control" required>
                                    <option value="" disabled selected hidden>Pilih Keterangan Kepindahan</option>
                                    <option value="Antar Desa">Antar Desa</option>
                                    <option value="Antar Kecamatan">Antar Kecamatan</option>
                                    <option value="Antar Kabupaten">Antar Kabupaten</option>
                                    <option value="Antar Provinsi">Antar Provinsi</option>
                                    <option value="Antar Negara">Antar Negara</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kewarganegaraan :</label>
                                <!-- <input type="text" name="kewarganegaraan" class="form-control" required> -->
                                <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" required>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Asing">Asing</option>
                                    
                                </select>
                            </div>
                            <div class="form-group" style="padding-top: 5%; float:right;"> 
                                <button class="btn btn-primary">Simpan</button>
                                <a href="/view-pendatang" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                        
                    </form>


                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


                    
                </div>
            </div>
        </div>
    </div>


</x-app-layout>