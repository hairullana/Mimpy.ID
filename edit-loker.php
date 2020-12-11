<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

// ambil id loker
$id = $_GET["id"];
// ambil data loker
$loker = mysqli_query($db, "SELECT * from loker where id = $id");
$loker = mysqli_fetch_assoc($loker);
// ambil id perusahaan
$idPerusahaan = $loker["idPerusahaan"];
// ambil data perusahaan 
$perusahaan = mysqli_query($db, "SELECT * from perusahaan where id = $idPerusahaan");
$perusahaan = mysqli_fetch_assoc($perusahaan);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- judul -->
    <title>Edit Data Loker</title>
    <!-- panggil headtags -->
    <?php require "headtags.php" ?>
</head>
<body>

    <!-- navbar -->
    <?php require "navbar.php" ?>

    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Edit Data Loker</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php" ?>

</body>
</html>


<?php

// jika yg login bukan yg punya perusahaan, tendang ke index
if ($perusahaan["email"] != $_SESSION["perusahaan"]){
    echo "
        <script>
            Swal.fire('AKSES DITOLAK','Anda Tidak Berhak Ke Halaman Ini','warning').then(function(){
                window.location = 'index.php';
            });
        </script>
    ";
}

// jika belum login perusahaan, tendang ke index
if (!isset($_SESSION["perusahaan"])){
    echo "
        <script>
            Swal.fire('AKSES DITOLAK','','success').then(function(){
                window.location = 'data-loker.php';
            });
        </script>
    ";
}else {
    // jika tidak menerima inputan get id
    if (!isset($_GET["id"])) {
        echo "
            <script>
                Swal.fire('AKSI DITOLAK','Tidak Dapat Mengakses Halaman','error').then(function(){
                    window.location = 'data-loker-perusahaan.php';
                });
            </script>
        ";
    }else {     // jika menerima inputan get id
        // ambil data id 
        $id = $_GET["id"];
        // ambil data loker
        $loker = mysqli_query($db, "SELECT * from loker where id = $id");
        $loker = mysqli_fetch_assoc($loker);
        // ambil data perusahaan
        $idPerusahaan = $loker["idPerusahaan"];
        $perusahaan = mysqli_query($db, "SELECT * from perusahaan where id = $idPerusahaan");
        $perusahaan = mysqli_fetch_assoc($perusahaan);

        // jika yang login perushaaan yg punya loker
        if($perusahaan["email"] != $_SESSION["perusahaan"]){
            echo "
                <script>
                    Swal.fire('AKSES DITOLAK','Loker Ini Bukan Milik Perusahaan Anda','success').then(function(){
                        window.location = 'data-loker-perusahaan.php';
                    });
                </script>
            ";
        }
    }
}


?>