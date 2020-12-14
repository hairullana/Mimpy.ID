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
                                        $loker = mysqli_query($db, "SELECT *, loker.id as idLoker, perusahaan.nama as namaPerusahaan FROM loker INNER JOIN perusahaan  ON loker.idPerusahaan = perusahaan.id");
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
                                                    <a href="detail-loker.php?id=<?= $data['idLoker'] ?>" class="btn btn-primary">Detail</a>
                                                    <a href="hapus-loker.php?id=<?= $data['idLoker'] ?>" class="btn btn-danger">Delete</a>
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
            </div>
        
        <?php elseif(isset($_SESSION["perusahaan"])) : ?>

            <!-- body -->
            <div class="row mt-5">
                <div class="col">
                    <div class="container">
                        <div class="card">
                            <div class="card-header text-center">
                                <h3>Kelola Lowongan Kerja</h3>
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
                                
                                <table class="table text-center">
                                    <tr>
                                        <th>ID Loker</th>
                                        <th>Posisi</th>
                                        <th>Syarat Lulusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php
                                    // ambil id perusahaan 
                                    $emailPerusahaan = $_SESSION["perusahaan"];
                                    $perusahaan = mysqli_query($db, "SELECT * from perusahaan where email = '$emailPerusahaan'");
                                    $perusahaan = mysqli_fetch_assoc($perusahaan);
                                    $idPerusahaan = $perusahaan["id"];
                                    // cari loker yang dimiliki oleh perusahaan yang sudah login
                                    $loker = mysqli_query($db,"SELECT * FROM loker WHERE idPerusahaan = $idPerusahaan");
                                    // jika terdapat loker
                                    if (mysqli_num_rows($loker) > 0) :
                                        foreach ($loker as $data) :
                                    ?>
                                            <tr>
                                                <td><?= $data["id"] ?></td>
                                                <td><?= $data["posisi"] ?></td>
                                                <td><?= $data["lulusan"] ?></td>
                                                <td><a href="detail-loker.php?id=<?= $data['id'] ?>" class="btn btn-primary">Detail</a> <a href="edit-loker.php?id=<?= $data['id'] ?>" class="btn btn-success">Edit</a> <a href="hapus-loker.php?id=<?= $data['id'] ?>" class="btn btn-danger">Hapus</a></td>
                                            </tr>
                                    <?php
                                        endforeach;
                                    else :
                                    ?>
                                        <tr class="text-center">
                                            <td colspan=4><h3>BELUM ADA DATA</h3></td>
                                        </tr>
                                    <?php endif; ?>
                                </table>

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
            })
        </script>
    ";
}

?>