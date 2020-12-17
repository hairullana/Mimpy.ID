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

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- Fontawesome -->
        <script src="https://kit.fontawesome.com/ac1ee11f2c.js" crossorigin="anonymous"></script>

        <!-- My CSS -->
        <link rel="stylesheet" href="css/mimpy.id.css">
        <link rel="stylesheet" href="css/dashboard.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
        <link rel="icon" href="assets/favicon.ico" type="image/x-icon">

        <!-- panggil headtags -->
        <?php require "headtags.php" ?>

        <!-- title -->
        <title>Data Loker</title>
    </head>
    <body>
        <!-- navbar -->
        <?php require "navbar.php" ?>
        <!-- end navbar -->

        <?php if (isset($_SESSION["admin"])) : ?>

            <!-- Nav -->
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
                            <a class="nav-link text-white font-weight-bold" href="data-loker.php">
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
                            <a class="nav-link text-white" href="data-lamaran.php">
                                <i class="fas fa-address-book"></i>
                                Data Lamaran
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 p-5">
                        <div class="card shadow mb-4">
                          <div class="card-header text-center">
                              <h3 class="">Data Lowongan Kerja</h3>
                          </div>
                        <div class="card-body">
                            <!-- search -->
                            <form action="" method="post">
                                <div class="row mx-5">
                                    <div class="col">
                                        <div class="form-group">
                                            <?php if (isset($_POST["keyword"])) : ?>
                                              <input class="form-control" name="keyword" type="search" placeholder="Keyword" aria-label="Search" value="<?= $_POST['keyword'] ?>">
                                            <?php else : ?>
                                              <input class="form-control" name="keyword" type="search" placeholder="Keyword" aria-label="Search">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" name="cari" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                            <!-- end search -->
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Posisi</th>
                                        <th>Lulusan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //konfirgurasi pagination
                                    $jumlahDataPerHalaman = 3;
                                    $jumlahData = mysqli_num_rows(mysqli_query($db,"SELECT * FROM loker"));
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
                                    $loker = mysqli_query($db, "SELECT *, loker.id as idLoker, perusahaan.nama as namaPerusahaan FROM loker INNER JOIN perusahaan  ON loker.idPerusahaan = perusahaan.id ORDER BY loker.id DESC LIMIT $awalData, $jumlahDataPerHalaman");

                                    //ketika tombol cari ditekan
                                    if ( isset($_POST["cari"])) {
                                        $keyword = htmlspecialchars($_POST["keyword"]);

                                        $query = "SELECT *, loker.id as idLoker, perusahaan.nama as namaPerusahaan FROM loker
                                            INNER JOIN perusahaan  ON loker.idPerusahaan = perusahaan.id WHERE 
                                            perusahaan.nama LIKE '%$keyword%' OR
                                            loker.lulusan LIKE '%$keyword%' OR
                                            loker.posisi LIKE '%$keyword%'
                                            ORDER BY loker.id DESC
                                            ";

                                        $loker = mysqli_query($db,$query);
                                    }

                                    
                                    if (mysqli_num_rows($loker) > 0) :
                                    foreach ($loker as $data) :
                                    ?>
                                            <tr>
                                                <td><?= $data["idLoker"] ?></td>
                                                <td><?= $data["namaPerusahaan"] ?></td>
                                                <td><?= $data["posisi"] ?></td>
                                                <td><?= $data["lulusan"] ?></td>
                                                <td><?= $data["status"] ?></td>
                                                <td>
                                                    <a href="detail-loker.php?id=<?= $data['idLoker'] ?>" class="btn btn-outline-primary">Detail</a>
                                                    <a href="hapus-loker.php?id=<?= $data['idLoker'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Lowongan Kerja ?')" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                    <?php
                                            endforeach;
                                        else :
                                    ?>
                                            <tr class="text-center">
                                                <td colspan=4><h3>BELUM ADA DATA</h3></td>
                                            </tr>
                                    <?php endif; ?>
                                </tbody>
                                </table>
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
                        </div>
                    </div>
                </div>
            </div>
        
        <?php elseif(isset($_SESSION["perusahaan"])) : ?>

            <!-- body -->
            <div class="row mt-5">
                <div class="col">
                    <div class="container">
                        <div class="card shadow-lg">
                            <div class="card-header text-center">
                                <h3>Kelola Lowongan Kerja</h3>
                            </div>
                            <div class="card-body">
                                
                                <!-- search -->
                                <form action="" method="post">
                                    <div class="row mx-5">
                                        <div class="col">
                                            <div class="form-group">
                                              <?php if (isset($_POST["keyword"])) : ?>
                                                <input class="form-control" name="keyword" type="search" placeholder="Keyword" aria-label="Search" value="<?= $_POST['keyword'] ?>">
                                              <?php else : ?>
                                                <input class="form-control" name="keyword" type="search" placeholder="Keyword" aria-label="Search">
                                              <?php endif; ?>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary" name="cari" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- end search -->
                                
                                <table class="table text-center">
                                    <tr>
                                        <th>ID Loker</th>
                                        <th>Posisi</th>
                                        <th>Syarat Lulusan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php
                                    // ambil id perusahaan 
                                    $emailPerusahaan = $_SESSION["perusahaan"];
                                    $perusahaan = mysqli_query($db, "SELECT * from perusahaan where email = '$emailPerusahaan'");
                                    $perusahaan = mysqli_fetch_assoc($perusahaan);
                                    $idPerusahaan = $perusahaan["id"];

                                    //konfirgurasi pagination
                                    $jumlahDataPerHalaman = 3;
                                    $jumlahData = mysqli_num_rows(mysqli_query($db,"SELECT * FROM loker where idPerusahaan = $idPerusahaan"));
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
                                    $loker = mysqli_query($db, "SELECT * FROM loker WHERE idPerusahaan = $idPerusahaan order by id DESC LIMIT $awalData, $jumlahDataPerHalaman");

                                    //ketika tombol cari ditekan
                                    if ( isset($_POST["cari"])) {
                                      $keyword = htmlspecialchars($_POST["keyword"]);

                                      $query = "SELECT * FROM loker WHERE 
                                      (posisi LIKE '%$keyword%' OR
                                      lulusan LIKE '%$keyword%') AND
                                      idPerusahaan = $idPerusahaan
                                      ORDER BY id DESC
                                      ";

                                      $loker = mysqli_query($db,$query);
                                    }
                                    foreach ($loker as $data) :
                                    ?>
                                      <tr>
                                          <td><?= $data["id"] ?></td>
                                          <td><?= $data["posisi"] ?></td>
                                          <td><?= $data["lulusan"] ?></td>
                                          <td><?= $data["status"] ?></td>
                                          <td>
                                              <a href="detail-loker.php?id=<?= $data['id'] ?>" class="btn btn-outline-primary">Detail</a>
                                              <a href="edit-loker.php?id=<?= $data['id'] ?>" class="btn btn-outline-success">Edit</a>
                                              <a href="hapus-loker.php?id=<?= $data['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Lowongan Kerja ?')" class="btn btn-outline-danger">Hapus</a>
                                              <?php if($data['status'] == 'Aktif') : ?>
                                                  <a href="tutup-loker.php?id=<?=  $data['id']?>" onclick="return confirm('Apakah Anda Yakin Ingin Menutup Loker Ini ?')" class="btn btn-outline-warning">Tutup Loker</a>
                                              <?php endif; ?>
                                          </td>
                                      </tr>
                                    <?php endforeach; ?>
                                </table>

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


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer -->
            <?php include 'footer.php' ?>

        <?php endif; ?>

        
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!-- My Javascript -->
        <script src="js/script.js"></script>

        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        -->
    </body>
</html>

<?php

// jika bukan admin atau perusahaan, maka tendang ke index
if (!(isset($_SESSION["admin"]) || isset($_SESSION["perusahaan"]))){
    echo "
        <script>
            Swal.fire('AKSES DITOLAK','Anda Tidak Dizinkan Untuk Mengakses Halaman Ini','warning').then(function(){
                window.location = 'index.php';
            });
        </script>
    ";
}

?>