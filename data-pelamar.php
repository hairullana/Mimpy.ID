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
  <title>Data Pelamar</title>
  <!-- headtags.php -->
  <?php require "headtags.php" ?>
</head>
<body>

  <!-- navbar -->
  <?php require "navbar.php" ?>

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
                  <a class="nav-link text-white font-weight-bold" href="data-pelamar.php">
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
                              <th>ID Pelamar</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Telepon</th>
                              <th>Alamat</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          $pelamar = mysqli_query($db, "SELECT * FROM pelamar");
                          ?>
                          <?php foreach ($pelamar as $data) : ?>
                              <tr>
                                  <td><?= $data["id"] ?></td>
                                  <td><?= $data["nama"] ?></td>
                                  <td><?= $data["email"] ?></td>
                                  <td><?= $data["telp"] ?></td>
                                  <td><?= $data["alamat"] ?></td>
                                  <td>
                                      <a href="#" class="btn btn-primary">Detail</a>
                                      <a href="#" class="btn btn-danger">Delete</a>
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
</body>
</html>

<?php

// jika bukan admin, tendang ke index
if (!isset($_SESSION["admin"])){
  echo "
    <script>
      Swal.fire('Akses Ditolak !','Maaf Anda Tidak Dapat Mengakses Halaman Ini','warning').then(function(){
          window.location = 'index.php';
      });
    </script>
  ";
}

?>
