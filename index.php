<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

// ambil data loker
$loker = mysqli_query($db, "SELECT *, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- judul -->
    <title>Mimpy.ID</title>
    <!-- headtags -->
    <?php require "headtags.php"; ?>
</head>
<body>

    <!-- navbar -->
    <?php require "navbar.php"; ?>
    
    <?php if (isset($_SESSION["admin"])) : ?>
        <!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid bg jumbotron-index">
            <div class="container text-center">
                <h1 class="display-1">Mimpy.ID</h1>
                <p class="lead">Solusi untuk Pengangguran Tanpa Mimpi Seperti Anda.</p>
                
                <div class="row text-center mb-3">
                    <div class="col-md-3 offset-md-3">
                        <a href="profil.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Profil Admin</button></a>
                    </div>
                    <div class="col-md-3">
                        <a href="dashboard.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Dashboard Admin</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end jumbotron -->
    <?php elseif (isset($_SESSION["perusahaan"])) : ?>
        <!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid bg jumbotron-index">
            <div class="container text-center">
                <h1 class="display-1">Mimpy.ID</h1>
                <p class="lead">Solusi untuk Pengangguran Tanpa Mimpi Seperti Anda.</p>
                
                <div class="row text-center mb-3">
                    <div class="col-md-3 offset-md-3">
                        <a href="profil.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Profil Saya</button></a>
                    </div>
                    <div class="col-md-3">
                        <a href="buat-loker.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Buat Loker</button></a>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-3 offset-md-3">
                        <a href="data-loker.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Kelola Loker</button></a>
                    </div>
                    <div class="col-md-3">
                        <a href="data-pelamar.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Kelola Pelamar</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end jumbotron -->
    <?php elseif (isset($_SESSION["pelamar"])) : ?>
        <!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid bg jumbotron-index">
            <div class="container text-center">
                <h1 class="display-1">Mimpy.ID</h1>
                <p class="lead">Solusi untuk Pengangguran Tanpa Mimpi Seperti Anda.</p>
                
                <div class="row text-center mb-3">
                    <div class="col-md-3 offset-md-3">
                        <a href="profil.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Profil Saya</button></a>
                    </div>
                    <div class="col-md-3">
                        <a href="edit-cv.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">CV Saya</button></a>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-3 offset-md-3">
                        <a href="data-lamaran_pelamar.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Kelola Lamaran</button></a>
                    </div>
                    <div class="col-md-3">
                        <a href="cari-loker.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Cari Loker Lanjutan</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end jumbotron -->
    <?php else : ?>
        <!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid bg jumbotron-index">
            <div class="container text-center">
                <h1 class="display-1">Mimpy.ID</h1>
                <p class="lead">Solusi untuk Pengangguran Tanpa Mimpi Seperti Anda.</p>
                <div class="row center">
                    <div class="col text-center">
                        <a href="registrasi.php" type="button" class="btn btn-primary align-content-center">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end jumbotron -->
    <?php endif; ?>



    <!-- tampilan loker -->
    <div class="container">

        <!-- heading -->
        <div class="row">
            <div class="col text-center">
                <h1 class="display3 mb-4">Daftar Lowongan Kerja</h1>
            </div>
        </div>
        <!-- end heading -->

        <!-- search -->
        <form action="">
            <div class="row mx-5">
                <div class="col">
                    <div class="form-group">
                        <input class="form-control" type="search" placeholder="Masukkan Keyword" aria-label="Search">
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <!-- end search -->


        <!-- list loker -->
        <div class="row mb-2">
            <?php foreach ($loker as $data) : ?>
                <div class="col-md-6 mb-2">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-none d-lg-block">
                            <svg class="bd-placeholder-img" width="200" height="205" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                        </div>
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0"><?= $data["namaPerusahaan"] ?></h3>
                            <div class="mb-1 text-muted"><?= $data["alamatPerusahaan"] ?></div>
                            <p class="card-text mb-auto">Dicari <?= $data["posisi"] ?>, Minimal <?= $data["lulusan"] ?>. <?= $data["jobdesk"] ?></p>
                            <a href="detail-loker.php" class="stretched-link">read more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- pagination -->
    <div class="row">
        <div class="col">
            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item" aria-current="page"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- end pagination -->


    <!-- footer -->
    <?php include 'footer.php'; ?>
    <!-- end footer -->
</body>
</html>

