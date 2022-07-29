<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>SIDUN</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- <link href="css/styles.css" rel="stylesheet" /> -->

</head>
<body id="page-top">
    <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark " id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="#page-top">SIDUN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-primary bg-gradient text-white">
            <div class="container p-4 text-center">
                <h1 class="fw-bolder">SIDUN</h1>
                <p class="lead">Sistem Informasi Pendataan Penduduk Dusun</p>
                <!-- <a class="btn btn-lg btn-light" href="#about">Start scrolling!</a> -->
            </div>
        </header>
        <!-- About section-->
        <section id="content">
            <div class="container p-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                    <!-- <div class="py-4">
                        <form action="/caripenduduk" method="get" enctype="multipart/form-data">
                            <div class="form-group d-flex flex-row text-nowrap">
                                <label for="caripenduduk" class="p-2">Cek data kependudukan anda berdasarkan NIK</label>
                                <input type="text" name="cariNIK" class="form-control" required>
                                <button class="btn btn-primary">cari</button>
                            </div>
                        </form>
                    </div> -->
                    
                    <div class="py-4">
                        <div class="py-2 d-flex flex-row justify-content-between"> 
                            <h4>Data Penduduk</h4>
                            <a href="/" class="btn btn-danger">Kembali</a>
                        </div>    
                        <table class="table table-bordered table-striped" >
                            <thead>
                                <tr>
                                    <th style="width:200px" >Data</th>
                                    <th>Penduduk</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($penduduks as $data)
                                <tr>
                                    <td>NIK </td>
                                    <td>{{ $data->nik }} </td>
                                </tr>
                                <tr>
                                    <td>No. KK </td>
                                    <td>{{ $data->noKK }} </td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap </td>
                                    <td>{{ $data->namaPenduduk }} </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin </td>
                                    <td>{{ $data->jk }} </td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir </td>
                                    <td>{{ $data->tempatLahir }} </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir </td>
                                    <td>{{ $data->tglLahir }} </td>
                                </tr>
                                <tr>
                                    <td>Golongan Darah </td>
                                    <td>{{ $data->golDarah }} </td>
                                </tr>
                                <tr>
                                    <td>Alamat </td>
                                    <td>{{ $data->alamat }} </td>
                                </tr>
                                <tr>
                                    <td>Agama </td>
                                    <td>{{ $data->agama }} </td>
                                </tr>
                                <tr>
                                    <td>Status Perkawinan </td>
                                    <td>{{ $data->status }} </td>
                                </tr>
                                <tr>
                                    <td>Pendidikan Akhir </td>
                                    <td>{{ $data->pendidikan }} </td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan </td>
                                    <td>{{ $data->pekerjaan }} </td>
                                </tr>
                                <tr>
                                    <td>Kewarganegaraan </td>
                                    <td>{{ $data->kewarganegaraan }} </td>
                                </tr>
                                <tr>
                                    <td>Dusun </td>
                                    <td>{{ $data->dusun }} </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Bergabung </td>
                                    <td>{{ $data->tglBergabung }} </td>
                                </tr>
                            @empty
                            <td colspan="2"><b>NIK tidak ditemukan</b></td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    </div>
                </div>
            </div>
        </section>
        
       
        <!-- Contact section-->
        <section id="contact">
            <div class="container p-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Tentang</h2>
                        <p class="lead">Sistem ini membantu proses pencatatan penduduk di Dusun Tegal Kori Kaja</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Sistem Informasi Dusun 2021</p></div>
        </footer>
    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
    
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>