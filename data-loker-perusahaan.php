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
    <!-- judul -->
    <title>Data Lowongan Kerja</title>
    <!-- headtags -->
    <?php require "headtags.php" ?>
</head>
<body>

    <!-- navbar -->
    <?php require "navbar.php" ?>
    
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
                                    <td><h3>BELUM ADA DATA</h3></td>
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

</body>
</html>

