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
    <title>Document</title>
    <?php require "headtags.php" ?>
</head>
<body>
    <!-- navbar -->
    <?php require "navbar.php" ?>

    <div class="row mt-5">
        <div class="col text-center">
            <h3>Sistem Sedang Mengkonfirmasi Lamaran</h3>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php" ?>

</body>
</html>

<?php

// jika bukan login pelamar
if (!isset($_SESSION["pelamar"])){
    echo "
        <script>
            Swal.fire('Akses Ditolak !','Anda Tidak Diizinkan Untuk Mengakses Halaman Ini','warning').then(function(){
                window.location = 'data-lamaran.php';
            });
        </script>
    ";
}else if (isset($_GET["id"]) == NULL){
    echo "
        <script>
            Swal.fire('Halaman Error !','Halaman Tidak Menerima Informasi Pelamar','error').then(function(){
                window.location = 'data-lamaran.php';
            });
        </script>
    ";
}else {
    // ambil data yg login
    $email = $_SESSION["pelamar"];
    $pelamar = mysqli_fetch_assoc(mysqli_query($db, "SELECT * from pelamar where email = '$email'"));
    // ambil data yg punya loker
    $id = $_GET["id"];
    $lamaran = mysqli_fetch_assoc(mysqli_query($db, "SELECT * from lamaran where id = $id"));

    // cek apakah yg login benar yg punya lamaran
    if ($pelamar["id"] != $lamaran["idPelamar"]){
        echo "
            <script>
                Swal.fire('Akses Ditolak !','Anda Tidak Diizinkan Untuk Mengakses Halaman Ini','warning').then(function(){
                    window.location = 'data-lamaran.php';
                });
            </script>
        ";
    }else{
        // cek jika lamaran masih menunggu
        $id = $_GET["id"];
        $lamaran = mysqli_fetch_assoc(mysqli_query($db, "SELECT * from lamaran where id = $id"));
        
        if ($lamaran["status"] == "Menunggu"){
            echo "
                <script>
                    Swal.fire('Aksi Ditolak !','Status Loker Masih Menunggu Bro. Sabarlah Sikit !','warning').then(function(){
                        window.location = 'data-lamaran.php';
                    });
                </script>
            ";
        }else{
            mysqli_query($db, "UPDATE lamaran set konfirmasi = 1 where id = $id");
            if (mysqli_affected_rows($db)){
                echo "
                    <script>
                        Swal.fire('Konfirmasi Berhasil !','','success').then(function(){
                            window.location = 'data-lamaran.php';
                        });
                    </script>
                ";
            }
        }
    }
}
    


?>