<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- Fontawesome -->
        <script src="https://kit.fontawesome.com/ac1ee11f2c.js" crossorigin="anonymous"></script>

        <!-- My CSS -->
        <link rel="stylesheet" href="css/mimpy.id.css">
        <link rel="stylesheet" href="css/dashboard.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
        <link rel="icon" href="assets/favicon.ico" type="image/x-icon">

        <!-- title -->
        <title>Dashboard Admin</title>

        <?php require "headtags.php" ?>
    </head>
    <body>
        

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <a class="navbar-brand" href="/mimpy.id">Mimpy.ID</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="registrasi.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- end navbar -->

        <!-- Nav -->
        <div class="row no-gutters mt-5">
            <div class="col-md-2 bg-dark pr-3 pt-4" style="min-height:auto"> 
                <ul class="nav flex-column ml-3 mb-5">
                    <li class="nav-item">
                            <a class="nav-link active text-white font-weight-bold" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">  
                        <a class="nav-link text-white" href="data-perusahaan.php">
                            <i class="fas fa-building"></i>
                            Data Perusahaan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="data-loker.php">
                            <i class="fas fa-sticky-note"></i>
                            Data Loker
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="data-pelamar.php">
                            <i class="fas fa-address-card"></i>
                            Data Pelamar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="data-lamaran.php">
                            <i class="fas fa-address-book"></i>
                            Data Lamaran
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 p-5">
                <div class="text-center">
                    <h3>
                        Dashboard
                    </h3>
                </div>
                <hr>
                <div class="row text-white mt-5">
                    <div class="card bg-info mx-auto" style="width: 25rem;">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <h5 class="card-title"><strong>JUMLAH PERUSAHAAN</strong></h5>
                            <div class="display-4"><?= mysqli_num_rows(mysqli_query($db, "SELECT * FROM perusahaan")) ?></div>
                            <a href="data-perusahaan.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
                        </div>
                    </div>
                    <div class="card bg-danger mx-auto" style="width: 25rem;">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-address-card"></i>
                            </div>
                            <h5 class="card-title"><strong>JUMLAH PELAMAR</strong></h5>
                            <div class="display-4"><?= mysqli_num_rows(mysqli_query($db, "SELECT * FROM pelamar")) ?></div>
                            <a href="data-pelamar.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
                        </div>
                    </div>
                </div>
                <div class="row text-white mt-5">
                    <div class="card bg-warning mx-auto" style="width: 25rem;">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-sticky-note"></i>
                            </div>
                            <h5 class="card-title"><strong>JUMLAH LOKER</strong></h5>
                            <div class="display-4"><?= mysqli_num_rows(mysqli_query($db, "SELECT * FROM loker")) ?></div>
                            <a href="data-loker.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
                        </div>
                    </div>
                    <div class="card bg-primary mx-auto" style="width: 25rem;">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-address-card"></i>
                            </div>
                            <h5 class="card-title"><strong>JUMLAH LAMARAN</strong></h5>
                            <div class="display-4"><?= mysqli_num_rows(mysqli_query($db, "SELECT * FROM lamaran")) ?></div>
                            <a href="data-lamaran.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end nav --> 

        <!-- end footer -->

        
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!-- My Javascript -->
        <script src="js/script.js"></script>

        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        -->
    </body>
</html>

<?php

// jika bukan admin atau perusahaan, maka tendang ke index
if (!isset($_SESSION["admin"])){
    echo "
        <script>
            Swal.fire('AKSES DITOLAK','Anda Tidak Dizinkan Untuk Mengakses Halaman Ini','warning').then(function(){
                window.location = 'index.php';
            });
        </script>
    ";
}

?>