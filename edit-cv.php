<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

$email = $_SESSION["pelamar"];
$pelamar = mysqli_fetch_assoc(mysqli_query($db,"SELECT * from pelamar where email = '$email'"));

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit CV</title>
    <?php require "headtags.php" ?>
</head>
<body>
    
    <!-- navbar -->
    <?php require "navbar.php" ?>

    <!-- body -->
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg">
                <div class="card-header text-center">
                    <h3>Edit CV</h3>
                </div>
                <div class="card-body">
                    <?php if ($pelamar["cv"] != NULL) : ?>
                        <p>Download CV : <a href="assets/cv/<?= $pelamar['cv'] ?>"><?= $pelamar['cv'] ?></a></p>
                    <?php else : ?>
                        <p class="text-danger">* Belum Mengupload CV</p>
                    <?php endif; ?>

                    <!-- form upload -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <span>File : <i>jpg, jpeg, png, pdf, doc, docx</i></span>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="cv" class="custom-file-input" id="cv" aria-describedby="cv">
                                <label class="custom-file-label" for="cv">Upload CV</label>
                            </div>
                            <div class="input-group-append">
                                <button name="simpan" class="btn btn-outline-secondary" type="submit" id="cv">Simpan</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php" ?>

</body>
</html>

<?php

// jika yg bukan pelamar
if (!isset($_SESSION["pelamar"])){
    echo "
        <script>
            Swal.fire('Akses Ditolak','Anda Tidak Diizinkan Mengakses Halaman Ini','warning').then(function(){
                window.location = 'index.php';
            });
        </script>
    ";
}

// upload cv
if ( isset($_POST["simpan"]) ){

    
    $ukuranFile = $_FILES["cv"]["size"];
    $temp = $_FILES["cv"]["tmp_name"];
    $namaFile = $_FILES["cv"]["name"];
    $error = $_FILES["cv"]["error"];

    //cek apakah file adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png','pdf','doc','docx'];
    // explode = memecah string menjadi array (dg pemisah delimiter)
    $ekstensiGambar = explode('.',$namaFile);
    //mengambil ekstensi gambar yg paling belakang dg strltolower (mengecilkan semua huruf)
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    
    //CEK $ekstensiGambar ada di array $ekstensiGambarValid
    if (!in_array($ekstensiGambar,$ekstensiGambarValid) ){
        echo "
            <script>
                Swal.fire('Gagal Upload CV','Format File Tidak Valid','warning').then(function(){
                    window.location = 'edit-cv.php';
                });
            </script>
        ";
    }else if ( $ukuranFile > 3000000 ) {        // cek ukuran max 3000000 byte atau 3 mb
        echo "
            <script>
                Swal.fire('Gagal Upload CV','Ukuran Gambar Telalu Besar','warning').then(function(){
                    window.location = 'edit-cv.php';
                });
            </script>
        ";
    }else {
        //LOLOS CEK BROOO
        //generate nama baru random
        $namaFileBaru = 'cv' . $pelamar['id'] . '.' . $ekstensiGambar;
        move_uploaded_file($temp,'assets/cv/'.$namaFileBaru);
        
        mysqli_query($db,"UPDATE pelamar SET cv = '$namaFileBaru' where email = '$email'");
    
        if ( mysqli_affected_rows($db) > 0){
            echo "
                <script>
                    Swal.fire('Berhasil Upload CV','','success').then(function(){
                        window.location = 'edit-cv.php';
                    });
                </script>
            ";
        }
    }
    

}

?>