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
                <form action="" method="POST" enctype="multipart/form-data">
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
                                <img src="assets/perusahaan/<?= $perusahaan['foto'] ?>" alt="" class="rounded img-fluid" width=35% style="max-width:200px">
                            </div>
                        </div>
                        <!-- end image -->

                        <!-- input file -->
                        <div class="row">
                            <div class="col-md-6 offset-md-3 active mt-3">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" id="name" aria-describedby="name">
                                        <label class="custom-file-label" for="name">Foto Profil</label>
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
                                <img src="assets/pelamar/<?= $pelamar['foto'] ?>" alt="" class="rounded img-fluid" width=35% style="max-width:200px">
                            </div>
                        </div>
                        <!-- end image -->

                        <!-- input file -->
                        <div class="row">
                            <div class="col-md-6 offset-md-3 active mt-3">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" id="name" aria-describedby="name">
                                        <label class="custom-file-label" for="name">Foto Profil</label>
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
                            <select id="" class="form-control" name="gender">
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

        if (strlen($_FILES["foto"]["name"]) > 0){
            $ukuranFile = $_FILES["foto"]["size"];
            $temp = $_FILES["foto"]["tmp_name"];
            $namaFile = $_FILES["foto"]["name"];
            $error = $_FILES["foto"]["error"];
    
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
                        Swal.fire('Gagal Upload Foto Profil','Format File Tidak Valid','warning').then(function(){
                            window.location = 'profil.php';
                        });
                    </script>
                ";
            }else if ( $ukuranFile > 3000000 ) {        // cek ukuran max 3000000 byte atau 3 mb
                echo "
                    <script>
                        Swal.fire('Gagal Upload Foto Profil','Ukuran Gambar Telalu Besar','warning').then(function(){
                            window.location = 'profil.php';
                        });
                    </script>
                ";
            }
            //generate nama baru
            $namaFileBaru = 'perusahaan' . $perusahaan['id'] . '.' . $ekstensiGambar;
            move_uploaded_file($temp,'assets/perusahaan/'.$namaFileBaru);
        }else{
            $namaFileBaru = $perusahaan["foto"];
        }

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
                                //LOLOS CEK BROOO
                                
                                // update db
                                mysqli_query($db,"UPDATE perusahaan SET foto = '$namaFileBaru', nama = '$nama', email = '$email', telp = '$telp', kota = '$kota', alamat = '$alamat', deskripsi = '$deskripsi' WHERE email = '$emailLama'");
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

        // jika upload foto
        if (strlen($_FILES["foto"]["name"]) > 0){
            $ukuranFile = $_FILES["foto"]["size"];
            $temp = $_FILES["foto"]["tmp_name"];
            $namaFile = $_FILES["foto"]["name"];
            $error = $_FILES["foto"]["error"];
    
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
                        Swal.fire('Gagal Upload Foto Profil','Format File Tidak Valid','warning').then(function(){
                            window.location = 'profil.php';
                        });
                    </script>
                ";
            }else if ( $ukuranFile > 3000000 ) {        // cek ukuran max 3000000 byte atau 3 mb
                echo "
                    <script>
                        Swal.fire('Gagal Upload Foto Profil','Ukuran Gambar Telalu Besar','warning').then(function(){
                            window.location = 'profil.php';
                        });
                    </script>
                ";
            }
            //generate nama baru
            $namaFileBaru = 'pelamar' . $pelamar['id'] . '.' . $ekstensiGambar;
            move_uploaded_file($temp,'assets/pelamar/'.$namaFileBaru);
        }else{
            $namaFileBaru = $pelamar["foto"];
        }

        // ambil data email
        $emailLama = $_SESSION["pelamar"];
        // ambil isi form
        $nama = htmlspecialchars($_POST["nama"]);
        $email = htmlspecialchars($_POST["email"]);
        $telp = htmlspecialchars($_POST["telp"]);
        $gender = htmlspecialchars($_POST["gender"]);
        $alamat = htmlspecialchars($_POST["alamat"]);
        // validasi form
        if (cekKosong($email)== true){
            if (validasiNama($nama) == true){
                if (validasiTelp($telp) == true){
                    if (validasiAlamat($alamat) == true){
                        // update db
                        mysqli_query($db,"UPDATE pelamar SET foto = '$namaFileBaru', nama = '$nama', email = '$email', telp = '$telp', gender = '$gender', alamat = '$alamat' WHERE email = '$emailLama'");
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
            }
        }
        
        
        


        
    }

}

?>