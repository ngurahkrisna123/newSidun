<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Penduduk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Tambah Data Penduduk

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
                    <form class="row" action="{{ route('add-penduduk') }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                    
                        <div class="col-md-6" >
                            
                            <div class="form-group">
                                <label>NIK :</label>
                                <input type="text" name="nik" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>No. KK :</label>
                                <input type="text" name="noKK" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nama :</label>
                                <input type="text" name="namaPenduduk" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir :</label>
                                <input type="text" name="tempatLahir" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir :</label><br>
                                <input type="date" name="tglLahir" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin :</label><br>
                                <!-- <input type="radio" id="jk" name="jk" value="Lk" class="" checked><label for="jk">Laki-laki</label> 
                                <input type="radio" id="jk" name="jk" value="Pr" class=""> <label for="jk">Perempuan</label> -->
                                <select id="jk" name="jk" class="form-control" required>
                                    <option value="" disabled selected hidden >Pilih Jenis Kelamin</option>
                                    <option value="Lk">Laki-laki</option>
                                    <option value="Pr">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Golongan Darah :</label>
                                <!-- <input type="text" name="golDarah" class="form-control" required> -->
                                <select name="golDarah" id="golDarah" class="form-control" required>
                                    <option value="" disabled selected hidden>Pilih Golongan Darah</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat :</label>
                                <input type="text" name="alamat" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                <label>Status :</label>
                                <!-- <input type="text" name="status" class="form-control" required> -->
                                <select name="status" id="status" class="form-control" required>
                                    <option value="" disabled selected hidden>Pilih Status</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Belum Kawin">Belum Kawin</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pendidikan :</label>
                                <!-- <input type="text" name="pendidikan" class="form-control" required> -->
                                <select name="pendidikan" id="pendidikan" class="form-control" required>
                                    <option value="" disabled selected hidden>Pilih Tingkat Pendidikan</option>
                                    <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                    <option value="Belum Tamat SD/Sederajat">Belum Tamat SD/Sederajat</option>
                                    <option value="Tamat SD/Sederajat">Tamat SD/Sederajat</option>
                                    <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                    <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                    <option value="Diploma I/II">Diploma I/II</option>
                                    <option value="Akademi/Diploma III/S. Muda">Akademi/Diploma III/S. Muda</option>
                                    <option value="Diploma IV/Strata I">Diploma IV/Strata I</option>
                                    <option value="Strata II">Strata II</option>
                                    <option value="Strata III">Strata III</option>
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
                                <label>Kewarganegaraan :</label>
                                <!-- <input type="text" name="kewarganegaraan" class="form-control" required> -->
                                <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" required>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Asing">Asing</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Dusun :</label>
                                <input type="text" name="dusun" class="form-control" value="TEGAL KORI KAJA" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Bergabung :</label><br>
                                <input type="date" name="tglBergabung" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                            </div> 

                            <div class="form-group" style="padding-top: 20%; float:right;"> 
                                <button class="btn btn-primary">Simpan</button>
                                <a href="/view-penduduk" class="btn btn-danger">Kembali</a>
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