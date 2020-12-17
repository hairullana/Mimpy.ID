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
                        <div class="row">
                            <!-- syarat dan ketentuan -->
                            <div class="col-md-5 offset-md-1">
                                <h5>Term and Condition</h5>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa odio deleniti placeat sit? Maxime, quos? Quaerat quod magnam alias pariatur, a error expedita molestiae, obcaecati voluptatem, harum saepe minus omnis.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam eius facilis culpa rem voluptatum adipisci dolorum non odio ut sit, sed maxime necessitatibus ea possimus, maiores quas laboriosam voluptates dolor?</p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe sapiente assumenda ea quia amet incidunt labore voluptatem debitis inventore modi sunt, architecto maiores officia pariatur dicta, alias cumque deserunt explicabo!</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt aliquam animi mollitia quasi omnis, eius voluptate aperiam earum reprehenderit dolore adipisci nihil, nisi accusamus doloribus, fugit beatae unde praesentium dolorum.</p>
                            </div>
                            <!-- form -->
                            <div class="col-md-5">
                                <table class="table">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email" name="email">
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
    validasiNama($nama);
    validasiTelp($telp);
    validasiAlamat($alamat);
    validasiPassword($password1);
    validasiPassword($password2);
    
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

?>