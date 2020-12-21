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
    <title>Registrasi Pelamar</title>
    <?php require "headtags.php" ?>
</head>
<body>
    

    <!-- navbar -->
    <?php require "navbar.php" ?>


    <!-- body -->
    <div class="row mt-5">
        <div class="col">
            <div class="container">
                <div class="card shadow-lg">
                    <!-- heading -->
                    <div class="card-header text-center">
                        <h3>Registrasi Pelamar</h3>
                    </div>
                    <div class="card-body">
                        <div class="row pb-4">
                            <!-- syarat dan ketentuan -->
                            <div class="col-md-5 offset-md-1">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h3>Syarat Dan Ketentuan</h3>
                                    </div>
                                    <div class="card-body p-4 text-justify">
                                        <h5>Selamat datang di website Mimpy.ID.</h5>
                                        <p>Terms and Condition of Use berikut adalah ketentuan dalam pengunjungan situs, layanan dan fitur yang ada di website Mimpy.ID<p>
                                        <p>Harapan kami Anda membaca Terms and Condition of Use ini dengan seksama. Dengan mengakses dan menggunakan website Mimpy.ID berarti Anda telah memahami dan menyetujui untuk terikat dan tunduk dengan semua peraturan yang berlaku di situs ini. Apabila Anda tidak menerima Syarat dan Ketentuan dan/atau Pernyataan Privasi, mohon untuk tidak bergabung, mengakses, melihat, mengunduh atau dengan cara lain menggunakan layanan apa pun yang ditawarkan oleh Mimpy.ID melalui Situs.
                                        <p><a href="terms.php" class="btn btn-primary"><i class="fa fa-forward"></i> Baca Selengkapnya</a></p>
                                    </div>
                                </div>
                            </div>
                            <!-- form -->
                            <div class="col-md-5">
                                <table class="table">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nomor Telp" name="telp">
                                        </div>
                                        <div class="form-group">
                                            <select name="gender" id="" class="form-control">
                                                <option value="pria">Laki-Laki</option>
                                                <option value="wanita">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password1">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Ulangi Password" name="password2">
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary" name="daftar">Registrasi</button>
                                        </div>
                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include 'footer.php';
    ?>
    <!-- end footer -->

</body>
</html>



<?php

// cek apakah sudah login atau belum
cekSudahLogin();

// jika tombol daftar sudah di klik
if (isset($_POST["daftar"])) {

    // tangkap semua isi form
    $nama = htmlspecialchars($_POST["nama"]);
    $email = htmlspecialchars($_POST["email"]);
    $telp = htmlspecialchars($_POST["telp"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $password1 = htmlspecialchars($_POST["password1"]);
    $password2 = htmlspecialchars($_POST["password2"]);

    // validasi form
    if (validasiNama($nama)== true){
        if (validasiTelp($telp) == true){
            if (validasiAlamat($alamat) == true){
                if (validasiPassword($password1) == true){
                    if (validasiPassword($password2) == true){
                        // cek apakah email sudah terdaftar
                        $cekEmail = mysqli_query($db, "SELECT * FROM pelamar WHERE email = '$email'");
                        if (mysqli_num_rows($cekEmail) == 1){
                            // jika email sudah terdaftar
                            echo "
                                <script>
                                    Swal.fire(
                                        'PENDAFTARAN GAGAL',
                                        'Email Sudah Terdaftar',
                                        'error'
                                    );
                                </script>
                            ";
                        }else {
                            // jika email belum terdaftar
                            if($password1 != $password2){
                                // jika password tidak sama
                                echo "
                                    <script>
                                        Swal.fire(
                                            'PENDAFTARAN GAGAL',
                                            'Password Tidak Sama',
                                            'error'
                                        );
                                    </script>
                                ";
                            }else {
                                // jika password sama
                                // pendaftaran berhasil
                    
                                $password = password_hash($password1, PASSWORD_DEFAULT);
                                mysqli_query($db,"INSERT INTO pelamar VALUES ('','$nama','$email','$telp','$gender','$alamat','default.jpg','','$password')");
                    
                                echo "
                                    <script>
                                        Swal.fire('PENDAFTARAN BERHASIL','Silahkan Login Terlebih Dahulu','success').then(function() {
                                            window.location = 'login.php';
                                        });
                                    </script>
                                ";
                            }
                        }
                    }
                }
            }
        }
    }
    
    
    
}

?>