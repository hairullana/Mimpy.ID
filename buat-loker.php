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
    <title>Buat Lowongan Kerja</title>
    <!-- headtags -->
    <?php require "headtags.php"; ?>
</head>
<body>

    <!-- navbar -->
    <?php require "navbar.php"; ?>
    
    <!-- body -->
    <div class="container mt-5">
        <div class="card col-md-8 offset-md-2">
            <div class="card-header text-center">
                <h3>Buat Loker Baru</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Posisi" name="posisi">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="lulusan">
                            <option value="Tanpa Ijasah" selected>Tanpa Ijasah</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA/K</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="jobdesk" id="" placeholder="Jobdesk" name="jobdesk"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="keterangan" id="" placeholder="Keterangan" name="keterangan"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" name="postingLoker">Posting Loker</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php require 'footer.php'; ?>

</body>
</html>


<?php


// jika bukan perusahaan, maka tendang ke index
if (!isset($_SESSION["perusahaan"])) {
    echo "
        <script>
            Swal.fire('AKSES DITOLAK','Anda Tidak Login Sebagai Perusahaan','warning').then(function(){
                window.location = 'index.php';
            });
        </script>
    ";
}


// jika tombol posting loker sudah di tekan
if (isset($_POST["postingLoker"])){
    // tangkap semua nilai
    $posisi = htmlspecialchars($_POST["posisi"]);
    $lulusan = htmlspecialchars($_POST["lulusan"]);
    $jobdesk = htmlspecialchars($_POST["jobdesk"]);
    $keterangan = htmlspecialchars($_POST["keterangan"]);

    // cari idPerusahaan
    $emailPerusahaan = $_SESSION["perusahaan"];
    $perusahaan = mysqli_query($db, "SELECT * FROM perusahaan WHERE email = '$emailPerusahaan'");
    $perusahaan = mysqli_fetch_assoc($perusahaan);
    $idPerusahaan = $perusahaan["id"];

    // validasi kolom
    if (cekKosong($posisi) == true){
        if (cekKosong($lulusan) == true){
            if (cekKosong($jobdesk) == true){
                if (cekKosong($keterangan) == true){
                    mysqli_query($db, "INSERT INTO loker VALUES ('',$idPerusahaan,'$posisi','$lulusan','$jobdesk','$keterangan','Aktif')");
                    echo "
                        <script>
                            Swal.fire('LOKER BERHASIL DIPOSTING','','success').then(function(){
                                window.location = 'data-loker.php';
                            });
                        </script>
                    ";
                }
            }
        }
    }





}

?>