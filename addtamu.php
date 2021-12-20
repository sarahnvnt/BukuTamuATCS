<!DOCTYPE html>

<head>
    <title> Buku Tamu Dinas Perhubungan </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="docs\css\jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="docs\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- JS -->
    <script type="text/javascript" src="docs\js\jquery-latest-slim.min.js"></script>
    <script type="text/javascript" src="docs\js\jquery-ui-custom.min.js"></script>
    <!-- FONT -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
    <style>
        body {
            font-family: 'Poppins';
            font-size: 15px;
        }

        .container-fluid {
            font-family: 'Poppins';
            font-size: 17px;

        }
    </style>
    <?php
    include 'koneksi.php';

    ?>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Dishub Kota Tasikmalaya</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="homepage.html"><span class=""></span>Logout</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="data.php"><span class=""></span>Data Tamu</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="col-md-12">
            <form class="form" method="post">
                <!-- <center> <img src="img\logo.png" width="180px;"></center> -->

                <br>
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <b>
                            Buku Tamu Pengunjung ATCS
                            <br> Dinas Perhubungan Kota Tasikmalaya
                        </b>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label> Nama Lengkap </label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Anda" required>
                        </div>
                        <div class="form-group">
                            <label> Alamat </label>
                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat Anda" required>
                        </div>
                        <div class="form-group">
                            <label> Nomor Telephone </label>
                            <input type="tel" pattern="^\d{12}$" name="nope" id="nope" class="form-control" placeholder="Masukan Nomor HP Anda" required />
                        </div>
                        <div class="form-group">
                            <label> Keterangan </label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" aria-rowspan="3" placeholder="Masukan Keterangan Anda" required />

                        </div>
                        <button type="submit" name="simpan" class="btn btn-success center-block">Save</button>
                    </div>
                </div>


        </div>
    </div>
    </div>
</body>
<br>

</div>

</body>

</html>