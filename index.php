<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();


//konfirgurasi pagination
$jumlahDataPerHalaman = 6;
$jumlahData = mysqli_num_rows(mysqli_query($db,"SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE loker.status = 'Aktif'"));
//ceil() = pembulatan ke atas
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
//menentukan halaman aktif
//$halamanAktif = ( isset($_GET["page"]) ) ? $_GET["page"] : 1;
if ( isset($_GET["page"])){
    $halamanAktif = $_GET["page"];
}else{
    $halamanAktif = 1;
}
//data awal
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

//fungsi memasukkan data di db ke array
$loker = mysqli_query($db, "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE loker.status = 'Aktif' order by loker.id DESC LIMIT $awalData, $jumlahDataPerHalaman");

//ketika tombol cari ditekan
if ( isset($_POST["cari"])) {
  $keyword = htmlspecialchars($_POST["keyword"]);

  $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
  (perusahaan.nama LIKE '%$keyword%' OR
  perusahaan.kota LIKE '%$keyword%' OR
  perusahaan.alamat LIKE '%$keyword%' OR
  perusahaan.email LIKE '%$keyword%' OR
  perusahaan.telp LIKE '%$keyword%' OR
  loker.jobdesk LIKE '%$keyword%' OR
  loker.keterangan LIKE '%$keyword%' OR
  perusahaan.deskripsi LIKE '%$keyword%' OR
  loker.posisi LIKE '%$keyword%') AND
  loker.status = 'Aktif'
  ORDER BY loker.id DESC
  ";

  $loker = mysqli_query($db,$query);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- judul -->
    <title>Mimpy.ID</title>
    <!-- headtags -->
    <?php require "headtags.php"; ?>
</head>
<body>

    <!-- navbar -->
    <?php require "navbar.php"; ?>
    
    <?php if (isset($_SESSION["admin"])) : ?>
        <!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid bg jumbotron-index">
            <div class="container text-center">
                <h1 class="display-1">Mimpy.ID</h1>
                <p class="lead">Solusi untuk Pengangguran Tanpa Mimpi Seperti Anda.</p>
                
                <div class="row text-center mb-3">
                    <div class="col-md-3 offset-md-3">
                        <a href="profil.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Profil Admin</button></a>
                    </div>
                    <div class="col-md-3">
                        <a href="dashboard.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Dashboard Admin</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end jumbotron -->
    <?php elseif (isset($_SESSION["perusahaan"])) : ?>
        <!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid bg jumbotron-index">
            <div class="container text-center">
                <h1 class="display-1">Mimpy.ID</h1>
                <p class="lead">Solusi untuk Pengangguran Tanpa Mimpi Seperti Anda.</p>
                
                <div class="row text-center mb-3">
                    <div class="col-md-3 offset-md-3">
                        <a href="profil.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Profil Saya</button></a>
                    </div>
                    <div class="col-md-3">
                        <a href="buat-loker.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Buat Loker</button></a>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-3 offset-md-3">
                        <a href="data-loker.php">
                            <button type="button" class="btn btn-primary btn-block font-weight-bold">
                                Kelola Loker
                            </button>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="data-lamaran.php">
                            <button type="button" class="btn btn-primary btn-block font-weight-bold">
                                <?php
                                // ambil data perusahaan yg login
                                $emailPerusahaan = $_SESSION["perusahaan"];
                                $perusaahaan = mysqli_fetch_assoc(mysqli_query($db,"SELECT * from perusahaan where email = '$emailPerusahaan'"));
                                $idPerusahaan = $perusaahaan["id"];
                                // cek data lamaran
                                if (mysqli_num_rows(mysqli_query($db,"SELECT * from lamaran join loker on lamaran.idLoker = loker.id where loker.idPerusahaan = $idPerusahaan and lamaran.status = 'Menunggu'")) > 0) {
                                    echo "<i class='fa fa-exclamation-circle'></i>";
                                }
                                ?>
                                Kelola Lamaran
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end jumbotron -->
    <?php elseif (isset($_SESSION["pelamar"])) : ?>
        <!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid bg jumbotron-index">
            <div class="container text-center">
                <h1 class="display-1">Mimpy.ID</h1>
                <p class="lead">Solusi untuk Pengangguran Tanpa Mimpi Seperti Anda.</p>
                
                <div class="row text-center mb-3">
                    <div class="col-md-3 offset-md-3">
                        <a href="profil.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Profil Saya</button></a>
                    </div>
                    <div class="col-md-3">
                        <a href="edit-cv.php">
                            <button type="button" class="btn btn-primary btn-block font-weight-bold">
                                <?php 
                                $email = $_SESSION["pelamar"];
                                $pelamar = mysqli_fetch_assoc(mysqli_query($db,"SELECT * from pelamar where email = '$email'"));
                                if ($pelamar["cv"] == NULL) {
                                    echo "<i class='fa fa-exclamation-circle'></i>  ";
                                }
                                ?>
                                CV Saya
                            </button>
                        </a>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-3 offset-md-3">
                        <a href="data-lamaran.php">
                            <button type="button" class="btn btn-primary btn-block font-weight-bold">
                                <?php
                                $idPelamar = $pelamar["id"];
                                $lamaran = mysqli_query($db,"SELECT * FROM lamaran WHERE idPelamar = $idPelamar AND status != 'Menunggu' AND konfirmasi = 0");
                                ?>
                                <?php if(mysqli_num_rows($lamaran) > 0) : ?>
                                    <i class='fa fa-exclamation-circle'></i>
                                <?php endif; ?>
                                Kelola Lamaran
                            </button>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="cari-loker.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Cari Loker Lanjutan</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end jumbotron -->
    <?php else : ?>
        <!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid bg jumbotron-index">
            <div class="container text-center">
                <h1 class="display-1">Mimpy.ID</h1>
                <p class="lead">Solusi untuk Pengangguran Tanpa Mimpi Seperti Anda.</p>
                <div class="row center">
                    <div class="col text-center">
                        <a href="registrasi.php" type="button" class="btn btn-primary align-content-center">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end jumbotron -->
    <?php endif; ?>



    <!-- tampilan loker -->
    <div class="container">

        <!-- heading -->
        <div class="row">
            <div class="col text-center">
                <h1 class="display3 mb-4">Daftar Lowongan Kerja</h1>
            </div>
        </div>
        <!-- end heading -->

        <!-- search -->
        <form action="" method="post">
            <div class="row mx-5 mb-5">
                <div class="col">
                  <?php if (isset($_POST["keyword"])) : ?>
                    <input class="form-control" name="keyword" type="search" placeholder="Keyword" aria-label="Search"  value="<?= $_POST['keyword'] ?>">
                  <?php else : ?>
                    <input class="form-control" name="keyword" type="search" placeholder="Keyword" aria-label="Search">
                  <?php endif; ?>
                </div>
                <div>
                    <button class="btn btn-primary" name="cari" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <!-- end search -->


        <!-- list loker -->
        <div class="row mb-2">
            <?php foreach ($loker as $data) : ?>
                <?php $string = "Dicari " . $data["posisi"] . ", Minimal " .  $data["lulusan"] . ". " . $data["jobdesk"]; ?>
                <div class="col-md-6 mb-2">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-none d-lg-block">
                          <img src="assets/perusahaan/<?= $data['foto'] ?>" width="200" height="205" alt="">
                        </div>
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0"><?= $data["namaPerusahaan"] ?></h3>
                            <div class="mb-1 text-muted"><?= $data["alamatPerusahaan"] ?></div>
                            <p class="card-text mb-auto"><?= substr($string, 0, 90) . "..." ?></p>
                            <a href="detail-loker.php?id=<?= $data['idLoker'] ?>" class="stretched-link">read more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <?php if (!isset($_POST["cari"])) : ?>
      <!-- pagination -->
      <div class="row">
          <div class="col">
              <nav aria-label="...">
                  <ul class="pagination justify-content-center">
                      <li class="page-item">
                          <?php if( $halamanAktif > 1 ) : ?>
                              <a class="page-link" href="?page=<?= $halamanAktif - 1; ?>"><i class="fa fa-chevron-left"></i></a>
                          <?php endif; ?>
                      </li>
                      <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
                          <?php if( $i == $halamanAktif ) : ?>
                              <li class="page-item active">
                                  <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                              </li>
                          <?php else : ?>
                              <li class="page-item">
                                  <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                              </li>   
                          <?php endif; ?>
                      <?php endfor; ?>
                      <li class="page-item">
                          <?php if( $halamanAktif < $jumlahHalaman ) : ?>
                              <a class="page-link" href="?page=<?= $halamanAktif + 1; ?>"><i class="fa fa-chevron-right"></i></a>
                          <?php endif; ?>
                      </li>
                  </ul>
              </nav>
          </div>
      </div>
      <!-- end pagination -->
    <?php endif; ?>


    <!-- footer -->
    <?php include 'footer.php'; ?>
    <!-- end footer -->
</body>
</html>

