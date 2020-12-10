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
    <!-- judul -->
    <title>DetaiL Lowongan Kerja</title>
    <!-- headtags -->
    <?php require "headtags.php" ?>
</head>
<body>
    
    <!-- navbar -->
    <?php require "headtags.php" ?>


    <!-- form -->
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="display-4">Detail Loker</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="container">
                                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col-auto d-none d-lg-block">
                                        <svg class="bd-placeholder-img" width="200" height="205" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                                    </div>
                                    <div class="col p-4 d-flex flex-column position-static">
                                        <h3 class="mb-0">Kumon Denpasar</h3>
                                        <div class="mb-1 text-muted">Jl. Kampus Unud No.99, Kuta Selatan, Badung, Bali</div>
                                        <div class="mb-1 text-muted">kumondps@gmail.com | 0363 6324 23</div>
                                        <p class="card-text mb-auto">Kumon Educational Japan Co., Ltd adalah organisasi kursus belajar yang didirikan oleh Toru Kumon pada tahun 1958. Metode Kumon adalah metode belajar matematika dan pemahaman bacaan yang diterapkan di kelas-kelas secara efektif. Kumon dikembangkan dengan sistem waralaba.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <table class="table">
                                    <tr>
                                        <th>Posisi</th>
                                        <td>Guru Matematika</td>
                                    </tr>
                                    <tr>
                                        <th>Minimal Lulusan</th>
                                        <td>S1 Matematika</td>
                                    </tr>
                                    <tr>
                                        <th>Keahlian Utama</th>
                                        <td>Mampu mengajar materi matematika dengan baik</td>
                                    </tr>
                                    <tr>
                                        <th>Jobdesk</th>
                                        <td>Mengajar siswa sd-smp</td>
                                    </tr>
                                    <tr>
                                        <th>Gaji</th>
                                        <td>Rp. 2.500.000</td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>Dibutuhkan segera Guru Matematika dengan lulusan minimal S1 Matematika. Diutamakan perempuan dengan sifat jujur, ramah dan mampu mengajar dengan baik.</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
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

