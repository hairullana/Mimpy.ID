<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

// ambil id
$id = $_GET["id"];
$perusahaan = mysqli_fetch_assoc(mysqli_query($db,"SELECT * from perusahaan where id = $id"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perusahaan - <?= $perusahaan["nama"] ?></title>
    <?php require "headtags.php" ?>
</head>
<body>
    
    <!-- navbar -->
    <?php require "navbar.php" ?>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center">Profil Perusahaan</h3>
                </div>
                <div class="card-body ml-4 p-4">
                    <div class="row">
                        <div class="col-md-4 text-center my-auto">
                            <img src="assets/perusahaan/<?= $perusahaan['foto']?>" class="img-fluid" style="max-width:80%;height:auto" alt="">
                        </div>
                        <div class="col-md-8">
                            <table cellpadding=10px>
                                <tr>
                                    <td>ID Perusahaan</td>
                                    <td>:</td>
                                    <td><?= $perusahaan["id"] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $perusahaan["nama"] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= $perusahaan["email"] ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telp</td>
                                    <td>:</td>
                                    <td><?= $perusahaan["telp"] ?></td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td>:</td>
                                    <td><?= $perusahaan["kota"] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $perusahaan["alamat"] ?></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td><?= $perusahaan["deskripsi"] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php" ?>

</body>
</html>

<?php

if (!isset($_GET["id"])){
  echo "
    <script>
      Swal.fire('Halaman Error !','Halaman Tidak Menerima Informasi Pelamar','error').then(function(){
          window.location = 'index.php';
      });
    </script>
  ";
}

?>