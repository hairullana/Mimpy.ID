<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();


// ambil inputan id
$id = $_GET["id"];
// ambil data lamaran
$lamaran = mysqli_query($db, "SELECT lamaran.suratLamaran as suratLamaran, pelamar.id as idPelamar, pelamar.nama as namaPelamar, lamaran.status as status, lamaran.tanggal as tanggal, lamaran.id as idLamaran, perusahaan.nama as namaPerusahaan, loker.posisi as posisi from lamaran inner join loker on loker.id = lamaran.idLoker inner join perusahaan on perusahaan.id = loker.idPerusahaan inner join pelamar on lamaran.idPelamar = pelamar.id where lamaran.id = $id");
$lamaran = mysqli_fetch_assoc($lamaran);
// ambil cv
$idPelamar = $lamaran["idPelamar"];
$pelamar = mysqli_fetch_assoc(mysqli_query($db, "SELECT * from pelamar where id = $idPelamar"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Lamaran</title>
    <?php require "headtags.php" ?>
</head>
<body>
    
    <!-- navbar -->
    <?php require "navbar.php" ?>


    <!-- body -->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="container mt-5 ">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Lamaran</h3>
                    </div>
                    <!-- biodata singkat -->
                    <div class="card-body">
                        <p>Tanggal Lamaran : <?= $lamaran["tanggal"] ?></p>
                        <p>Pelamar : <?= $lamaran["namaPelamar"] ?></p>
                        <p>Perusahaan : <?= $lamaran["namaPerusahaan"] ?></p>
                        <p>Posisi : <?= $lamaran["posisi"] ?></p>
                        <p>Status : <?= $lamaran["status"] ?></p>
                        <p><a href="assets/cv/<?= $pelamar['cv'] ?>" class="btn btn-primary">Selengkapnya Lihat CV</a></p>

                        <!-- surat lamaran -->
                        <div class="mt-5">
                            <h5>Surat Lamaran</h5>
                            <p>
                                <?= nl2br(str_replace(' ','  ', htmlspecialchars($lamaran["suratLamaran"]))); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end body -->


    <!-- footer -->
    <?php
    include 'footer.php'
    ?>
    <!-- end footer -->

</body>
</html>


<?php

// jika tidak menerima inputan id
if (!isset($_GET["id"])){
    echo "
        <script>
            Swal.fire('Akses Ditolak !','','success').then(function(){
                window.location = 'data-lamaran.php';
            });
        </script>
    ";
}





?>