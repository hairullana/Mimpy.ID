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
    <title>Ganti Password</title>
    <?php require "headtags.php" ?>
</head>
<body>

    <!-- navbar -->
    <?php require "navbar.php" ?>

    <!-- form -->
    <div class="container my-5">
        <div class="row">
            <div class="col-xl-6 offset-xl-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Ganti Kata Sandi</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kata Sand Lama</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kata Sandi Lama" name="passwordLama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kata Sandi Baru</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Kata Sandi Baru" name="password1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ulangi Kata Sandi Baru</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ulangi Kata Sandi Baru" name="password2">
                            </div>
                            <button type="submit" name="simpanData" class="btn btn-primary btn-block">Ganti Kata Sandi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end form -->

    <!-- footer -->
    <?php include 'footer.php' ?>

</body>
</html>




<?php

cekBelumLogin();

// jika tombol ganti kata sandi di tekan
if (isset($_POST["simpanData"])) {
    // ambil data form
    $passwordLama = $_POST["passwordLama"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    // validasi
    validasiPassword($password1);
    validasiPassword($password2);

    // cek jika password baru tidak sama
    if ($password1 != $password2){
        echo "
            <script>
                Swal.fire('PERUBAHAN GAGAL','Password Baru Tidak Sama','error');
            </script>
        ";
    }else{      // jika password baru sama
        // jika role user = admin
        if (isset($_SESSION["admin"])){
            // ambil data admin
            $admin = mysqli_query($db, "SELECT * FROM admin");
            $admin = mysqli_fetch_assoc($admin);
    
            // cek password lama
            // jika tidak sama
            if (password_verify($passwordLama, $admin["password"])){
                $password = password_hash($password1, PASSWORD_DEFAULT);
                mysqli_query($db, "UPDATE admin SET password = '$password'");
                echo "
                    <script>
                        Swal.fire('PERUBAHAN BERHASIL','Password Berhasil Diganti','success').then(function(){
                            window.location = 'ganti-password.php';
                        });
                    </script>
                ";
            }else {
                echo "
                    <script>
                        Swal.fire('PERUBAHAN GAGAL','Password Lama Salah','error');
                    </script>
                ";
            }
        }else if (isset($_SESSION["perusahaan"])){     // jika role user = perusahaan
            // ambil data perusahaan
            $email = $_SESSION["perusahaan"];
            $perusahaan = mysqli_query($db, "SELECT * FROM perusahaan WHERE email = '$email'");
            $perusahaan = mysqli_fetch_assoc($perusahaan);
    
            // cek password lama
            // jika tidak sama
            if (password_verify($passwordLama, $perusahaan["password"])){
                $password = password_hash($password1, PASSWORD_DEFAULT);
                mysqli_query($db, "UPDATE perusahaan SET password = '$password' WHERE email = '$email'");
                echo "
                    <script>
                        Swal.fire('PERUBAHAN BERHASIL','Password Berhasil Diganti','success').then(function(){
                            window.location = 'ganti-password.php';
                        });
                    </script>
                ";
            }else {
                echo "
                    <script>
                        Swal.fire('PERUBAHAN GAGAL','Password Lama Salah','error');
                    </script>
                ";
            }
        }else if (isset($_SESSION["pelamar"])){        // jika role user = pelamar
            // ambil data pelamar
            $email = $_SESSION["pelamar"];
            $pelamar = mysqli_query($db, "SELECT * FROM pelamar WHERE email = '$email'");
            $pelamar = mysqli_fetch_assoc($pelamar);
    
            // cek password lama
            // jika tidak sama
            if (password_verify($passwordLama, $pelamar["password"])){
                $password = password_hash($password1, PASSWORD_DEFAULT);
                mysqli_query($db, "UPDATE pelamar SET password = '$password' WHERE email = '$email'");
                echo "
                    <script>
                        Swal.fire('PERUBAHAN BERHASIL','Password Berhasil Diganti','success').then(function(){
                            window.location = 'ganti-password.php';
                        });
                    </script>
                ";
            }else {
                echo "
                    <script>
                        Swal.fire('PERUBAHAN GAGAL','Password Lama Salah','error');
                    </script>
                ";
            }
        }
    }

}

?>