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
    <title>Hapus Data Loker</title>
    <!-- panggil headtags -->
    <?php require "headtags.php" ?>
</head>
<body>
    
</body>
</html>


<?php

// jika belum login perusahaan, tendang ke index
if (!isset($_SESSION["perusahaan"])){
    echo "
        <script>
            Swal.fire('AKSES DITOLAK','','success').then(function(){
                window.location = 'data-loker-perusahaan.php';
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
        if($perusahaan["email"] == $_SESSION["perusahaan"]){
            mysqli_query($db, "DELETE from loker WHERE id = $id");
            // jika berhasil di hapus
            if (mysqli_affected_rows($db) > 0){
                echo "
                    <script>
                        Swal.fire('Data Loker Berhasil Di Hapus','','success').then(function(){
                            window.location = 'data-loker-perusahaan.php';
                        });
                    </script>
                ";
            }else {     // jika gagal di hapus karena id loker tidak ada
                echo "
                    <script>
                        Swal.fire('Data Loker Gagal Di Hapus','Data Loker Tidak Ditemukan','success').then(function(){
                            window.location = 'data-loker-perusahaan.php';
                        });
                    </script>
                ";
            }
        }else {     // jika yg login bukan perusahaan yang bukan punya loker
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