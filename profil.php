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
    <title>Profil</title>
    <?php require "headtags.php" ?>
</head>
<body>
    
    <!-- navbar -->
    <?php require "navbar.php" ?>


    <div class="container mt-5">
        <div class="card col-md-6 offset-md-3">
            <div class="card-header text-center">
                <h3>Profil</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                <?php
                    if (isset($_SESSION["admin"])) :
                        $admin = mysqli_query($db,"SELECT * FROM admin");
                        $admin = mysqli_fetch_assoc($admin);
                ?>
                        <div class="form-group text-center">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?= $admin['email'] ?>">
                        </div>
                <?php
                    elseif (isset($_SESSION["perusahaan"])) :
                        $email = $_SESSION['perusahaan'];
                        $perusahaan = mysqli_query($db,"SELECT * FROM perusahaan WHERE email = '$email'");
                        $perusahaan = mysqli_fetch_assoc($perusahaan);
                ?>
                        <!-- image -->
                        <div class="row my-3">
                            <div class="col text-center">
                                <img src="assets/perusahaan.png" alt="" class="rounded img-fluid" width=35% style="max-width:200px">
                            </div>
                        </div>
                        <!-- end image -->

                        <!-- input file -->
                        <div class="row">
                            <div class="col-md-6 offset-md-3 active mt-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Foto</button>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                        <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama Perusahaan" name="nama" value="<?= $perusahaan['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $perusahaan['email'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nomor Telp" name="telp" value="<?= $perusahaan['telp'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Kota / Kabupaten" name="kota" value="<?= $perusahaan['kota'] ?>">
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat"><?= $perusahaan['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <textarea type="password" class="form-control" placeholder="Deskripsi Perusahaan" name="deskripsi"><?= $perusahaan['deskripsi'] ?></textarea>
                        </div>
                <?php
                    elseif (isset($_SESSION["pelamar"])) :
                        $email = $_SESSION['pelamar'];
                        $pelamar = mysqli_query($db,"SELECT * FROM pelamar WHERE email = '$email'");
                        $pelamar = mysqli_fetch_assoc($pelamar);
                ?>
                        <!-- image -->
                        <div class="row my-3">
                            <div class="col text-center">
                                <img src="assets/profile.jpg" alt="" class="rounded img-fluid" width=35% style="max-width:200px">
                            </div>
                        </div>
                        <!-- end image -->

                        <!-- input file -->
                        <div class="row">
                            <div class="col-md-6 offset-md-3 active mt-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Foto</button>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                        <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?= $pelamar['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $pelamar['email'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nomor Telp" name="telp" value="<?= $pelamar['telp'] ?>">
                        </div>
                        <div class="form-group">
                            <select name="" id="" class="form-control" name="gender">
                                <?php if ($pelamar["gender"] == "pria") : ?>
                                    <option value="pria" selected>Laki-Laki</option>
                                    <option value="wanita">Perempuan</option>
                                <?php else : ?>
                                    <option value="pria">Laki-Laki</option>
                                    <option value="wanita" selected>Perempuan</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group" name="alamat">
                            <textarea type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat"><?= $pelamar['alamat'] ?></textarea>
                        </div>
                <?php
                    endif;
                ?>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" name="simpanData">Simpan Data</button> <a href="ganti-password.php" class="btn btn-danger">Ganti Password</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include 'footer.php'
    ?>

</body>
</html>



<?php

// cek apakah sudah login atau belum
cekBelumLogin();

// jika melakukan perubahan profil
if (isset($_POST["simpanData"])) {
    

    // jika role user = admin
    if (isset($_SESSION["admin"])){
        // ambil isi form
        $email = htmlspecialchars($_POST["email"]);
        // update db
        mysqli_query($db, "UPDATE admin SET email = '$email'");
        // alert
        echo "
            <script>
                Swal.fire('SUCCESS','Perubahan Berhasil Disimpan','success').then(function(){
                    window.location = 'profil.php';
                });
            </script>
        ";
    }else if (isset($_SESSION["perusahaan"])){      // jika role user = perusahaan
        // ambil data email
        $emailLama = $_SESSION["perusahaan"];
        // ambil isi form
        $nama = htmlspecialchars($_POST["nama"]);
        $email = htmlspecialchars($_POST["email"]);
        $telp = htmlspecialchars($_POST["telp"]);
        $kota = htmlspecialchars($_POST["kota"]);
        $alamat = htmlspecialchars($_POST["alamat"]);
        $deskripsi = htmlspecialchars($_POST["deskripsi"]);

        // validasi form
        if (cekKosong($email) == true) {
            if (validasiNama($nama) == true){
                if (validasiTelp($telp) == true) {
                    if (validasiKota($kota) == true){
                        if (validasiAlamat($alamat) == true) {
                            if (validasiDeskripsi($deskripsi) == true){
                                // update db
                                mysqli_query($db,"UPDATE perusahaan SET nama = '$nama', email = '$email', telp = '$telp', kota = '$kota', alamat = '$alamat', deskripsi = '$deskripsi' WHERE email = '$emailLama'");
                                // ubah nilai session
                                $_SESSION["perusahaan"] = $email;
                                // alert
                                echo "
                                    <script>
                                        Swal.fire('UPDATE PROFIL BERHASIL','','success').then(function(){
                                            window.location = 'profil.php';
                                        });
                                    </script>
                                ";
                            }
                        }
                    }
                }
            }
        }
    }else if ($_SESSION["pelamar"]){        // jika role user = pelamar
        // ambil data email
        $emailLama = $_SESSION["pelamar"];
        // ambil isi form
        $nama = htmlspecialchars($_POST["nama"]);
        $email = htmlspecialchars($_POST["email"]);
        $telp = htmlspecialchars($_POST["telp"]);
        $gender = htmlspecialchars($_POST["gender"]);
        $alamat = htmlspecialchars($_POST["alamat"]);
        // validasi form
        cekKosong($email);
        validasiNama($nama);
        validasiTelp($telp);
        validasiAlamat($alamat);
        // update db
        mysqli_query($db,"UPDATE pelamar SET nama = '$nama', email = '$email', telp = '$telp', gender = '$gender', alamat = '$alamat' WHERE email = '$emailLama'");
        // ubah nilai session
        $_SESSION["pelamar"] = $email;
        // alert
        echo "
            <script>
                Swal.fire('SUCCESS','Perubahan Berhasil Disimpan','success').then(function(){
                    window.location = 'profil.php';
                });
            </script>
        ";
    }

}

?>