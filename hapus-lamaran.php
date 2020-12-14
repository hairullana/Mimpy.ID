<?php

// mulai session
session_start();
// mulai fungsi
require "functions.php";
// koneksi db
require "db.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- judul -->
    <title>Hapus Data Lamaran</title>
    <!-- headtags -->
    <?php require "headtags.php" ?>
</head>
<body>
    <!-- navbar -->
    <?php require "navbar.php" ?>

    <div class="row mt-5">
        <div class="col">
            <h3 class="text-center">Sedang Mencoba Menghapus Data Lamaran</h3>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php" ?>
</body>
</html>

<?php

// jika bukan pelamar atau admin
if (!(isset($_SESSION["pelamar"]) || isset($_SESSION["admin"]))){
    echo "
        <script>
            Swal.fire('Akses Ditolak','Maaf Anda Tidak Diizinkan Mengakses Halaman Ini','warning').then(function(){
                window.location = 'index.php';
            });
        </script>
    ";
}


if ($_GET["id"] == NULL){
    echo "
    <script>
        Swal.fire('Akses Ditolak','Maaf, Halaman Belum Menerima Inputan ID Lamaran','warning').then(function(){
            window.location = 'index.php';
        });
    </script>
    ";
}

// ambil get
$id = $_GET["id"];
// hapus data lamaran
mysqli_query($db,"DELETE from lamaran where id = $id");
// jika berhasil di hapus
if (mysqli_affected_rows($db)){
    echo "
        <script>
            Swal.fire('Data Lamaran Berhasil Di Hapus','','success').then(function(){
                window.location = 'data-lamaran.php';
            });
        </script>
    ";
    
}else{
    echo "
        <script>
            Swal.fire('Data Lamaran Gagal Di Hapus','','success').then(function(){
                window.location = 'data-lamaran.php';
            });
        </script>
    ";

}

?>