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
    <title>Registrasi Perusahaan</title>
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
                        <h3>Registrasi Perusahaan</h3>
                    </div>

                    <div class="card-body">
                        <div class="row mb-4">
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
                                            <input type="text" class="form-control" placeholder="Nama Perusahaan" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nomor Telp" name="telp">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Kota / Kabupaten" name="kota">
                                        </div>
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" placeholder="Deskripsi Perusahaan" name="deskripsi"></textarea>
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
    <!-- end body -->


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


if (isset($_POST["daftar"])) {
    // tangkap semua form
    $nama = htmlspecialchars($_POST["nama"]);
    $email = htmlspecialchars($_POST["email"]);
    $telp = htmlspecialchars($_POST["telp"]);
    $kota = htmlspecialchars($_POST["kota"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $password1 = htmlspecialchars($_POST["password1"]);
    $password2 = htmlspecialchars($_POST["password2"]);

    // validasi
    if (validasiNama($nama) == true){
        if (validasiTelp($telp) == true){
            if (validasiKota($kota) == true){
                if (validasiAlamat($alamat) == true){
                    if (validasiDeskripsi($deskripsi) == true){
                        if (validasiPassword($password1) == true){
                            if (validasiPassword($password2) == true){
                                
                                // cek password
                                if ($password1 != $password2) {
                                    echo "
                                        <script>
                                            Swal.fire('PENDAFTARAN GAGAL','Password Yang Anda Masukkan Tidak Sama','error');
                                        </script>
                                    ";
                                }else {
                                    $password = password_hash($password1, PASSWORD_DEFAULT);
                                    mysqli_query($db, "INSERT INTO perusahaan VALUES ('','$nama','$email','$telp','$kota','$alamat','$deskripsi','default.jpg','$password')");
                                    echo mysqli_affected_rows($db);
                                    if (mysqli_affected_rows($db) > 0) {
                                        echo "
                                            <script>
                                                Swal.fire('PENDAFTARAN BERHASIL','Silahkan Login Terlebih Dahulu','success').then(function() {
                                                    window.location = 'login.php';
                                                });
                                            </script>
                                        ";
                                    }else {
                                        echo mysqli_error($db);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }




}

?>