<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

?>


<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- include headtags -->
        <?php require "headtags.php" ?>

        <!-- title -->
        <title>Data Lamaran</title>
    </head>
    <body>
        <!-- navbar -->
        <?php require "navbar.php" ?>
        <!-- end navbar -->


        <?php if(isset($_SESSION["admin"])) : ?>
        
          <!-- body -->
          <div class="row no-gutters">
              <div class="col-md-2 bg-dark pr-3 pt-4"> 
                  <ul class="nav flex-column ml-3 mb-5">
                      <li class="nav-item">
                              <a class="nav-link active text-white" href="dashboard.php">
                                  <i class="fas fa-tachometer-alt"></i>
                                  Dashboard
                              </a>
                          <hr class="bg-secondary">
                      </li>
                      <li class="nav-item">  
                          <a class="nav-link text-white" href="data-perusahaan.php">
                              <i class="fas fa-building"></i>
                              Data Perusahaan
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link text-white" href="data-loker.php">
                              <i class="fas fa-sticky-note"></i>
                              Data Loker
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link text-white" href="data-pelamar.php">
                              <i class="fas fa-address-card"></i>
                              Data Pelamar
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link text-white font-weight-bold" href="data-lamaran.php">
                              <i class="fas fa-address-book"></i>
                              Data Lamaran
                          </a>
                      </li>
                  </ul>
              </div>
              <div class="col-md-10 p-5">
                      <div class="card shadow mb-4">
                          <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">Data Pelamar</h6>
                          </div>
                      <div class="card-body">
                          <!-- search -->
                          <form action="">
                              <div class="row mx-5">
                                  <div class="col">
                                      <div class="form-group">
                                          <input class="form-control" type="search" placeholder="Keyword" aria-label="Search">
                                      </div>
                                  </div>
                                  <div>
                                      <button class="btn btn-primary" type="submit">Search</button>
                                  </div>
                              </div>
                          </form>
                          <!-- end search -->
                          <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th>ID Lamaran</th>
                                      <th>Pelamar</th>
                                      <th>Perusahaan</th>
                                      <th>Posisi</th>
                                      <th>Status</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody> 
                                  <?php
                                  //konfirgurasi pagination
                                  $jumlahDataPerHalaman = 3;
                                  $jumlahData = mysqli_num_rows(mysqli_query($db,"SELECT * FROM lamaran"));
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
                                  $lamaran = mysqli_query($db, "SELECT loker.idPerusahaan as idPerusahaan, loker.id as idLoker, lamaran.id as idLamaran, pelamar.nama as namaPelamar, loker.posisi as posisi, lamaran.status as status FROM lamaran join pelamar on pelamar.id = lamaran.idPelamar join loker on loker.id = lamaran.idLoker LIMIT $awalData, $jumlahDataPerHalaman");
                                  foreach ($lamaran as $data) :
                                  ?>
                                      <tr>
                                          <?php
                                          // ambil nama perusahaan
                                          $idPerusahaan = $data['idPerusahaan'];
                                          $perusahaan = mysqli_fetch_assoc(mysqli_query($db,"SELECT * from perusahaan where id = $idPerusahaan"));
                                          ?>
                                          <td><?= $data["idLamaran"] ?></td>
                                          <td><?= $data["namaPelamar"] ?></td>
                                          <td><?= $perusahaan["nama"] ?></td>
                                          <td><?= $data["posisi"] ?></td>
                                          <td><?= $data["status"] ?></td>
                                          <td>
                                              <a href="lamaran.php?id=<?= $data['idLamaran'] ?>" class="btn btn-outline-primary">Detail</a>
                                              <a href="hapus-lamaran.php?id=<?= $data['idLamaran'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Lamaran ?')" class="btn btn-outline-danger">Delete</a>
                                          </td>
                                      </tr>
                                  <?php
                                      endforeach;
                                  ?>
                              </tbody>
                              </table>
                          </div>

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


                      </div>
                  </div>
              </div>
          </div>
          <!-- end nav --> 

          <!-- end footer -->

          
          <!-- Optional JavaScript; choose one of the two! -->

          <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
          <script src="js/jquery.min.js"></script>
          <!-- My Javascript -->
          <script src="js/script.js"></script>
        <?php elseif(isset($_SESSION["perusahaan"])) : ?>
          <div class="container mt-5">
            <div class="card">
              <div class="card-header text-center">
                  <h3>Data Pelamar</h3>
              </div>
              <div class="card-body">
                  
                  <!-- search -->
                  <form action="">
                      <div class="row mx-5">
                          <div class="col">
                              <div class="form-group">
                                  <input class="form-control" type="search" placeholder="Keyword" aria-label="Search">
                              </div>
                          </div>
                          <div>
                              <button class="btn btn-primary" type="submit">Search</button>
                          </div>
                      </div>
                  </form>
                  <!-- end search -->


                  <!-- data pelamar -->
                  <table class="table text-center">
                      <tr>
                          <th>ID Lamaran</th>
                          <th>Nama Pelamar</th>
                          <th>Posisi</th>
                          <th>Detail</th>
                          <th>Aksi</th>
                      </tr>
                      <?php
                      // ambil data lamaran
                      $email = $_SESSION["perusahaan"];
                      $perusahaan = mysqli_fetch_assoc(mysqli_query($db,"SELECT * from perusahaan where email = '$email'"));
                      $idPerusahaan = $perusahaan['id'];
                      $lamaran = mysqli_query($db,"SELECT *, lamaran.status as statusLamaran, lamaran.id as idLamaran , pelamar.nama as namaPelamar from lamaran inner join pelamar on pelamar.id = lamaran.idPelamar inner join loker on lamaran.idLoker = loker.id where loker.idPerusahaan = $idPerusahaan");
                      ?>
                      <?php foreach ($lamaran as $data) : ?>
                        <tr>
                            <td><?= $data["idLamaran"] ?></td>
                            <td><?= $data["namaPelamar"] ?></td>
                            <td><?= $data["posisi"] ?></td>
                            <td><a href="cv.php?id=<?= $data['idPelamar'] ?>" class="btn btn-outline-primary">Lihat CV</a> <a href="surat-lamaran.php?id=<?= $data['idLamaran'] ?>" class="btn btn-outline-primary">Lihat Lamaran</a></td>
                            <td>
                              <?php if ($data["statusLamaran"] == "Menunggu") : ?>
                                <a href="terima-lamaran.php?id=<?= $data['idLamaran'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menerima Lamaran ?')" type="submit" class="btn btn-outline-success">Terima<a> <a href="tolak-lamaran.php?id=<?= $data['idLamaran'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menolak Lamaran ?')" type="submit" class="btn btn-outline-danger">Tolak<a>
                              <?php elseif ($data["statusLamaran"] == "Diterima") : ?>
                                Diterima
                              <?php elseif ($data["statusLamaran"] == "Ditolak") : ?>
                                Ditolak
                              <?php endif; ?>
                            </td>
                        </tr>
                      <?php endforeach; ?>
                  </table>
                  <!-- end data pelamar -->


                  <!-- pagination -->
                  <div class="row">
                      <div class="col">
                          <nav aria-label="...">
                              <ul class="pagination justify-content-center">
                                  <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>
                                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item" aria-current="page"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                              </ul>
                          </nav> 
                      </div>
                  </div>
                  <!-- end pagination -->
                </div>
            </div>
        </div>


        <!-- footer -->
        <?php
        include 'footer.php';
        ?>
      <?php elseif(isset($_SESSION["pelamar"])) : ?>
        <div class="container mt-5">
            <div class="card">
              <div class="card-header text-center">
                  <h3>Data Lamaran
                  </h3>
              </div>
              <div class="card-body">
                  
                  <!-- search -->
                  <form action="">
                      <div class="row mx-5">
                          <div class="col">
                              <div class="form-group">
                                  <input class="form-control" type="search" placeholder="Keyword" aria-label="Search">
                              </div>
                          </div>
                          <div>
                              <button class="btn btn-primary" type="submit">Search</button>
                          </div>
                      </div>
                  </form>
                  <!-- end search -->


                  <!-- data pelamar --> 
                  <table class="table text-center">
                      <tr>
                          <th>ID</th>
                          <th>Perusahaan</th>
                          <th>Posisi</th>
                          <th>Negoisasi Gaji</th>
                          <th>Lamaran</th>
                          <th>Status</th>
                      </tr>
                      <?php
                      // ambil data lamaran
                      $email = $_SESSION["pelamar"];
                      $pelamar = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM pelamar where email = '$email'"));
                      $idPelamar = $pelamar['id'];
                      $lamaran = mysqli_query($db,"SELECT lamaran.gaji as gaji, loker.posisi as posisi, lamaran.status as statusLamaran, lamaran.id as idLamaran, perusahaan.nama as namaPerusahaan from lamaran join loker on lamaran.idLoker = loker.id join perusahaan on perusahaan.id = loker.idPerusahaan where lamaran.idPelamar = $idPelamar");
                      ?>
                      <?php foreach ($lamaran as $data) : ?>
                        <tr>
                            <td><?= $data["idLamaran"] ?></td>
                            <td><?= $data["namaPerusahaan"] ?></td>
                            <td><?= $data["posisi"] ?></td>
                            <td><?= "Rp. " . number_format($data["gaji"]) ?></td>
                            <td><a href="lamaran.php?id=<?= $data['idLamaran'] ?>">Surat Lamaran</a></td>
                            <td><?= $data["statusLamaran"] ?></td>
                        </tr>
                      <?php endforeach; ?>
                  </table> 
                  <!-- end data pelamar -->


                  <!-- pagination -->
                  <div class="row">
                      <div class="col">
                          <nav aria-label="...">
                              <ul class="pagination justify-content-center">
                                  <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>
                                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item" aria-current="page"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                              </ul>
                          </nav>
                      </div>
                  </div>
                  <!-- end pagination -->
                </div>
            </div>
        </div>


        <!-- footer -->
        <?php
        include 'footer.php';
        ?>
      <?php else : ?>
        <h1 class="display-4 m-5 text-center">AKSES DITOLAK !</h1>
      <?php endif; ?>
    </body>
</html>

<?php

// jika bukan admin atau perusahaan maka tendang ke index
cekBelumLogin();

?>