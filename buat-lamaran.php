<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

// ambil get id
$id = $_GET["id"];
// ambil data loker
$loker = mysqli_fetch_assoc(mysqli_query($db,"SELECT *, perusahaan.nama as namaPerusahaan from loker inner join perusahaan on perusahaan.id = loker.idPerusahaan where loker.id = $id"));

// ambil data pelamar
$email = $_SESSION["pelamar"];
$pelamar = mysqli_fetch_assoc(mysqli_query($db,"SELECT * from pelamar where email = '$email'"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- judul -->
    <title>Buat Lamaran</title>
    <!-- headtags -->
    <?php require "headtags.php" ?>
</head>
<body>


    <!-- navbar -->
    <?php require "navbar.php" ?>


    <!-- body -->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-5 shadow-lg">
                <div class="card-header text-center">
                    <h3>Lamaran untuk Posisi <?= $loker["posisi"] ?> di <?= $loker["namaPerusahaan"] ?></h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp. </div>
                                </div>
                                <input type="text" id="gaji" class="form-control" name="gaji" placeholder="Negosiasi Gaji">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="suratLamaran" id="suratLamaran" style="height:300px;" class="form-control">Kepada Yth. Bapak/ Ibu Pimpinan <?= $loker["namaPerusahaan"] ?>&#13;Dengan hormat,&#13;&#13;Dengan ini saya, <?= $pelamar["nama"] ?> ingin mengajukan lamaran kerja di <?= $loker["namaPerusahaan"] ?> sebagai “<?= $loker["posisi"] ?>”.&#13;Saya memiliki semangat kerja yang tinggi dan ingin berkembang.&#13;Saya siap untuk memberikan kompensasi waktu dan tenaga saya apabila diperlukan dan sangat besar harapan saya agar dapat diberikan kesempatan wawancara.&#13;Sebagai bahan pertimbangan, bersama ini saya lampirkan Dokumen Curriculum Vitae (CV).&#13;Terima Kasih.</textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 offset-sm-1">
                                <button type="submit" name="kirimLamaran" class="btn btn-primary btn-block">Kirim Lamaran</button></a>
                                <br>
                            </div>
                            <div class="col-sm-5">
                                <a href="assets/cv/<?= $pelamar['cv'] ?>" class="btn btn-success btn-block">Lihat CV Saya</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end body -->


    <!-- footer -->
    <?php 
    include 'footer.php';
    ?>
    
</body>
</html>

<?php

// jika bukan pelamar, maka tendang ke index
if (!isset($_SESSION["pelamar"])){
    echo "
        <script>
            Swal.fire('Akses Ditolak !','Hanya Pelamar Yang Bisa Mengakses Halaman Ini','warning').then(function(){
                window.location = 'index.php';
            });
        </script>
    ";
}else if ($loker["status"] == "Tidak Aktif"){     // jika loker sudah tidak aktif
    echo "
        <script>
            Swal.fire('Akses Ditolak !','Lowongan Kerja Sudah Tidak Aktif','warning').then(function(){
                window.location = 'index.php';
            });
        </script>
    ";
}


if (isset($_POST["kirimLamaran"])){     // jika sudah mengirim lamaran
    // ambil value method post
    $suratLamaran = htmlspecialchars($_POST["suratLamaran"]);
    $gaji = htmlspecialchars($_POST["gaji"]);
    // tanggal
    $tanggal = date('Y-m-d');

    // ambil id pelamar
    $idPelamar = $pelamar["id"];
    $idLoker = $id;
    // validasi
    if ($gaji != ""){
        if (!is_numeric($gaji)){
            echo "
                <script>
                    Swal.fire('Lamaran Gagal Dikirim','Form Gaji Harus Angka','error').then(function(){
                        window.location = '#';
                    });
                </script>
            ";
        }else {
            mysqli_query($db, "INSERT into lamaran values('','$idPelamar','$idLoker','$tanggal','$gaji','$suratLamaran','Menunggu','0','')");
            if (mysqli_affected_rows($db) > 0){
                echo "
                    <script>
                        Swal.fire('Lamaran Berhasil Dikirim','Have A Nice Day Bruh !','success').then(function(){
                            window.location = 'data-lamaran.php';
                        });
                    </script>
                ";
            }else {
                echo mysqli_error($db);
            }
        }
    }else {
        echo "
            <script>
                Swal.fire('Lamaran Gagal Dikirim','Masukkan Jumlah Negoisasi Gaji','error').then(function(){
                    window.location = '#';
                });
            </script>
        ";
    }
}

?>