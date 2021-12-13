<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <?php require "headtags.php" ?>
</head>
<body>
    
    <!-- navbar -->
    <?php require "navbar.php" ?>


    <!-- pilihan registrasi -->
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="container">
                <div class="card shadow-lg">
                    <div class="card-header text-center">
                        <h3>Registrasi</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row text-center">
                                <div class="col-md-12 my-2">
                                    <h5>Saya akan mendaftar sebagai ...</h5>
                                </div>
                                <div class="col-12 my-2">
                                    <a href="registrasi-perusahaan.php"><button class="btn btn-primary btn-lg btn-block">Registrasi Sebagai Perusahaan</button></a>
                                </div>
                                <div class="col-12 my-2">
                                    <a href="registrasi-pelamar.php"><button class="btn btn-primary btn-lg btn-block">Registrasi Sebagai Pelamar</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- footer -->
    <?php
    include 'footer.php';
    ?>
    <!-- end footer -->

</body>
</html>


<?php

// cek apakah sudah login atau belum
cekSudahLogin();

?>