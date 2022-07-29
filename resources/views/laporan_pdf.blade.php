<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->


    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        .myDiv {
        margin-bottom: 20px;
        
        }
        
        .flex-container {
            display: flex;
            flex-direction: column;
            
            
        }

    </style>

    <title>Laporan Data Penduduk</title>

</head>

<body>

    <center>
        <h4>Laporan Data Penduduk Perbulan</h4>
    </center>

    <h6>Dusun : Tegal Kori Kaja</h6>
    <h6>Bulan : {{$exportData[76]}}</h6>
    
    <div class="myDiv">
    <table class="table table-bordered" width="100%" cellspacing="0" style="font-size:12px;">
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
                <td style="text-align:left; width:150px;">Penduduk Awal Bulan</td>
                <td>{{$exportData[0]}}</td>
                <td>{{$exportData[1]}}</td>
                <td>{{$exportData[2]}}</td>
                <td>{{$exportData[3]}}</td>
                <td>{{$exportData[4]}}</td>
                <td>{{$exportData[5]}}</td>
                <td>{{$exportData[4] + $exportData[5]}}</td>
            </tr>
            <tr>
                <td>2</td>
                <td style="text-align:left;">Kelahiran</td>
                <td>{{$exportData[6]}}</td>
                <td>{{$exportData[7]}}</td>
                <td>{{$exportData[8]}}</td>
                <td>{{$exportData[9]}}</td>
                <td>{{$exportData[10]}}</td>
                <td>{{$exportData[11]}}</td>
                <td>{{$exportData[10] + $exportData[11]}}</td>
            </tr>
            <tr>
                <td>3</td>
                <td style="text-align:left;">Kematian</td>
                <td>{{$exportData[12]}}</td>
                <td>{{$exportData[13]}}</td>
                <td>{{$exportData[14]}}</td>
                <td>{{$exportData[15]}}</td>
                <td>{{$exportData[16]}}</td>
                <td>{{$exportData[17]}}</td>
                <td>{{$exportData[16] + $exportData[17]}}</td>
            </tr>
            <tr>
                <td>4</td>
                <td style="text-align:left;">Pindah</td>
                <td>{{$exportData[18]}}</td>
                <td>{{$exportData[19]}}</td>
                <td>{{$exportData[20]}}</td>
                <td>{{$exportData[21]}}</td>
                <td>{{$exportData[22]}}</td>
                <td>{{$exportData[23]}}</td>
                <td>{{$exportData[22] + $exportData[23]}}</td>
            </tr>
            <tr>
                <td>5</td>
                <td style="text-align:left;">Pendatang</td>
                <td>{{$exportData[24]}}</td>
                <td>{{$exportData[25]}}</td>
                <td>{{$exportData[26]}}</td>
                <td>{{$exportData[27]}}</td>
                <td>{{$exportData[28]}}</td>
                <td>{{$exportData[29]}}</td>
                <td>{{$exportData[28] + $exportData[29]}}</td>
            </tr>
            <tr>
                <td>6</td>
                <td style="text-align:left;">Penduduk Akhir Bulan</td>
                <td>{{$exportData[30]}}</td>
                <td>{{$exportData[31]}}</td>
                <td>{{$exportData[32]}}</td>
                <td>{{$exportData[33]}}</td>
                <td>{{$exportData[34]}}</td>
                <td>{{$exportData[35]}}</td>
                <td>{{$exportData[34] + $exportData[35]}}</td>
            </tr>
        </tbody>
    </table>
    </div>

    <div id="flex-container" width="100%">
        <div>
            <table class="table table-bordered" id="dataTable"  cellspacing="0" style="font-size:12px; width: 200px;">
                <thead>
                    <tr>
                        <th rowspan=2 style="vertical-align : middle;text-align:center;">Pendatang</th>
                        <th colspan=2 style="text-align:center;">WNI</th>
                        <th colspan=2 style="text-align:center;">WNA</th>
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
                        <td>{{$exportData[36]}}</td>
                        <td>{{$exportData[37]}}</td>
                        <td>{{$exportData[38]}}</td>
                        <td>{{$exportData[39]}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:left;">Antar Kecamatan</td>
                        <td>{{$exportData[40]}}</td>
                        <td>{{$exportData[41]}}</td>
                        <td>{{$exportData[42]}}</td>
                        <td>{{$exportData[43]}}</td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;">Antar Kabupaten</td>
                        <td>{{$exportData[44]}}</td>
                        <td>{{$exportData[45]}}</td>
                        <td>{{$exportData[46]}}</td>
                        <td>{{$exportData[47]}}</td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;">Antar Provinsi</td>
                        <td>{{$exportData[48]}}</td>
                        <td>{{$exportData[49]}}</td>
                        <td>{{$exportData[50]}}</td>
                        <td>{{$exportData[51]}}</td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;">Dari Luar Negeri</td>
                        <td>{{$exportData[52]}}</td>
                        <td>{{$exportData[53]}}</td>
                        <td>{{$exportData[54]}}</td>
                        <td>{{$exportData[55]}}</td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <table class="table table-bordered" id="dataTable" cellspacing="0" style="font-size:12px; width: 200px;">
                <thead>
                    <tr>
                        <th rowspan=2 style="vertical-align : middle;text-align:center;">Pindah</th>
                        <th colspan=2 style="text-align:center;">WNI</th>
                        <th colspan=2 style="text-align:center;">WNA</th>
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
                        <td>{{$exportData[56]}}</td>
                        <td>{{$exportData[57]}}</td>
                        <td>{{$exportData[58]}}</td>
                        <td>{{$exportData[59]}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:left;">Antar Kecamatan</td>
                        <td>{{$exportData[60]}}</td>
                        <td>{{$exportData[61]}}</td>
                        <td>{{$exportData[62]}}</td>
                        <td>{{$exportData[63]}}</td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;">Antar Kabupaten</td>
                        <td>{{$exportData[64]}}</td>
                        <td>{{$exportData[65]}}</td>
                        <td>{{$exportData[66]}}</td>
                        <td>{{$exportData[67]}}</td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;">Antar Provinsi</td>
                        <td>{{$exportData[68]}}</td>
                        <td>{{$exportData[69]}}</td>
                        <td>{{$exportData[70]}}</td>
                        <td>{{$exportData[71]}}</td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;">Dari Luar Negeri</td>
                        <td>{{$exportData[72]}}</td>
                        <td>{{$exportData[73]}}</td>
                        <td>{{$exportData[74]}}</td>
                        <td>{{$exportData[75]}}</td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  -->

</body>

</html>