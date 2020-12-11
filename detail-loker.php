<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

// ambil data loker
$id = $_GET["id"];
$loker = mysqli_query($db, "SELECT * FROM loker where id = $id");
$loker = mysqli_fetch_assoc($loker);

// ambil data perusahaan yang mempunyai loker
$idPerusahaan = $loker["idPerusahaan"];
$perusahaan = mysqli_query($db,"SELECT * from perusahaan where id = $idPerusahaan");
$perusahaan = mysqli_fetch_assoc($perusahaan);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- judul -->
    <title><?= "Loker " . $loker["posisi"] . " di " . $perusahaan["nama"] ?></title>
    <!-- headtags -->
    <?php require "headtags.php" ?>
</head>
<body>
    
    <!-- navbar -->
    <?php require "navbar.php" ?>


    <!-- form -->
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card shadow-lg">
                    <div class="card-header text-center">
                        <h3><?= "Loker " . $loker["posisi"] . " di " . $perusahaan["nama"] ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="container">
                                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col-auto d-none d-lg-block">
                                        <svg class="bd-placeholder-img" width="200" height="205" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                                    </div>
                                    <div class="col p-4 d-flex flex-column position-static">
                                        <h3 class="mb-0"><?= $perusahaan["nama"] ?></h3>
                                        <div class="mb-1 text-muted"><?= $perusahaan["alamat"] ?></div>
                                        <div class="mb-1 text-muted"><?= $perusahaan["email"] ?> | <?= $perusahaan["telp"] ?></div>
                                        <p class="card-text mb-auto"><?= $perusahaan["deskripsi"] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <table class="table">
                                    <tr>
                                        <th>Posisi</th>
                                        <td><?= $loker["posisi"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Minimal Lulusan</th>
                                        <td><?= $loker["lulusan"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jobdesk</th>
                                        <td><?= $loker["jobdesk"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td><?= $loker["keterangan"] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- jika login sebagai pelamar, munculkan tombol buat lamaran -->
                        <?php if (isset($_SESSION["pelamar"])) : ?>
                            <div class="row my-5">
                                <div class="col text-center">
                                    <a href="lamaran.php" class="btn btn-danger btn-lg shadow-lg">Buat Lamaran</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end form -->

    <!-- footer -->
    <?php require "footer.php" ?>

</body>
</html>

