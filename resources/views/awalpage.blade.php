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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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
                    <div class="py-4">
                        <form action="/caripenduduk" method="get" enctype="multipart/form-data">
                            <div class="form-group d-flex flex-row text-nowrap">
                                <label for="caripenduduk" class="p-2">Cek data kependudukan anda berdasarkan NIK</label>
                                <input type="text" placeholder="Cari NIK.." name="search" class="form-control">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    
                    
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
        
        <footer class="py-4 bg-dark fixed-bottom">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Sistem Informasi Dusun 2021</p></div>
        </footer>
    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
    
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>