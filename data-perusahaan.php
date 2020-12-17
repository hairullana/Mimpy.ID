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

        <!-- title -->
        <title>Data Perusahaan</title>
        <?php require "headtags.php" ?>
    </head>
    <body>
        <!-- navbar -->
        <?php require "navbar.php"; ?>
        <!-- end navbar -->

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
                        <a class="nav-link text-white font-weight-bold" href="data-perusahaan.php">
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
                            <h3 class="">Data Perusahaan</h3>
                        </div>
                    <div class="card-body">
                        <!-- search -->
                        <form action="" method="post">
                            <div class="row mx-5 mb-4">
                                <div class="col">
                                    <?php if (isset($_POST["keyword"])) : ?>
                                        <input class="form-control" name="keyword" type="search" placeholder="Keyword" aria-label="Search" value="<?= $_POST['keyword'] ?>">
                                    <?php else : ?>
                                        <input class="form-control" name="keyword" type="search" placeholder="Keyword" aria-label="Search">
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <button name="cari" class="btn btn-primary" type="submit">Search</button>
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
                                    <th>E-mail</th>
                                    <th>No Telp</th>
                                    <th>Kota</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    //konfirgurasi pagination
                                    $jumlahDataPerHalaman = 3;
                                    $jumlahData = mysqli_num_rows(mysqli_query($db,"SELECT * FROM perusahaan"));
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
                                    $perusahaan = mysqli_query($db,"SELECT * FROM perusahaan order by id desc LIMIT $awalData, $jumlahDataPerHalaman");

                                    if ( isset($_POST["cari"])) {
                                        $keyword = htmlspecialchars($_POST["keyword"]);
            
                                        $query = "SELECT * from perusahaan WHERE 
                                        nama LIKE '%$keyword%' OR
                                        email LIKE '%$keyword%' OR
                                        kota LIKE '%$keyword%' OR
                                        deskripsi LIKE '%$keyword%' OR
                                        alamat LIKE '%$keyword%'
                                        ORDER BY id DESC
                                        ";
            
                                        $perusahaan = mysqli_query($db,$query);
                                    }

                                    foreach ($perusahaan as $data) :
                                ?>
                                    <tr>
                                        <td><?= $data["id"] ?></td>
                                        <td><?= $data["nama"] ?></td>
                                        <td><?= $data["email"] ?></td>
                                        <td><?= $data["telp"] ?></td>
                                        <td><?= $data["kota"] ?></td>
                                        <td>
                                            <a href="perusahaan.php?id=<?= $data['id'] ?>" class="btn btn-outline-primary btn-block">Detail</a>
                                            <a href="hapus-perusahaan.php?id=<?= $data['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Perusahaan ?')" class="btn btn-outline-danger btn-block">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                            </table>
                        </div>
                        
                        
                        <?php if(!isset($_POST["cari"])) : ?>
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

        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        -->
    </body>
</html>

<?php 
// jika bukan admin atau perusahaan, maka tendang ke index
if (!isset($_SESSION["admin"])){
    echo "
        <script>
            Swal.fire('AKSES DITOLAK','Anda Tidak Dizinkan Untuk Mengakses Halaman Ini','warning').then(function(){
                window.location = 'index.php';
            })
        </script>
    ";
}
?>