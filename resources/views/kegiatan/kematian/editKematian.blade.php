<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kematian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Edit Data Kematian

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
                    <form class="row" action="{{ url('edit-kematian/'.$kematians['idKematian']) }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                    
                        <div class="col-md-12" >
                            <div class="form-group">
                                <label>NIK :</label>
                                <input type="text" name="nik" class="form-control" value="{{$kematians['nik']}}" required>
                            </div>                            
                            <div class="form-group">
                                <label>Nama :</label>
                                <input type="text" name="nama" class="form-control" value="{{$kematians['nama']}}" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin :</label><br>
                                <?php 
                                    if ($kematians['jk']=='Lk') {
                                        # code...
                                        $jnsklmn = 'Laki-laki';
                                    } else {
                                        # code...
                                        $jnsklmn = 'Perempuan';
                                    }
                                ?>
                                <select id="jk" name="jk" class="form-control" required>
                                    <option value="{{$jnsklmn}}"  hidden >{{$jnsklmn}}</option>
                                    <option value="Lk">Laki-laki</option>
                                    <option value="Pr">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir :</label>
                                <input type="text" name="tempatLahir" class="form-control" value="{{$kematians['tempatLahir']}}" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir :</label><br>
                                <input type="date" name="tglLahir" class="form-control" value="{{$kematians['tglLahir']}}" required>
                            </div>
                            <div class="form-group">
                                <label>Tempat Meninggal :</label>
                                <input type="text" name="tempatMeninggal" class="form-control" value="{{$kematians['tempatMeninggal']}}" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Meninggal :</label><br>
                                <input type="date" name="tglMeninggal" class="form-control" value="{{$kematians['tglMeninggal']}}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Sebab Meninggal :</label>
                                <input type="text" name="sebabMeninggal" class="form-control" value="{{$kematians['sebabMeninggal']}}" required>
                            </div>
                            <div class="form-group">
                                <label>Kewarganegaraan :</label>
                                <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" required>
                                    <option value="{{$kematians['kewarganegaraan']}}"  hidden>{{$kematians['kewarganegaraan']}}</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Asing">Asing</option>
                                    
                                </select>
                            </div>

                            <div class="form-group" style="padding-top: 5%; float:right;"> 
                                <button class="btn btn-primary">Ubah</button>
                                <a href="/view-kematian" class="btn btn-danger">Kembali</a>
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
