<?php 

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

// ambil id lamaran
$idLamaran = $_GET["id"];
$lamaran = mysqli_fetch_assoc(mysqli_query($db,"SELECT * from lamaran where id = $idLamaran"));
// ambil id pelamar
$idPelamar = $lamaran["idPelamar"];
$pelamar = mysqli_fetch_assoc(mysqli_query($db, "SELECT * from pelamar where id = $idPelamar"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- headtags -->
  <?php require "headtags.php" ?>
  <title>Hapus Data Lamaran</title>
</head>
<body>
    <!-- navbar -->
    <?php require "navbar.php" ?>

    <div class="row mt-5">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header text-center">
            <h3>Kirim Pesan Ke Pelamar</h3>
          </div>
          <div class="card-body">
            <!-- kirim pesan kepada pelamar -->
            <form action="" method="POST">
              <div class="input-group">
                <textarea style="height:300px;" class="form-control" name="pesanPerusahaan" id="pesanPerusahaan" cols="30" rows="10">Kepada yth.&#13;Saudara <?= $pelamar['nama'] ?>&#13;Di <?= $pelamar['alamat'] ?>&#13;&#13;Dengan hormat,&#13;Sehubungan dengan lamaran yang telah diajukan saudari dan kami terima pada tanggal <?= $lamaran['tanggal'] ?> maka saudara dinyatakan memenuhi syarat administrasi sebagai pelamar kerja di perusahaan kami dan kami mengharapkan kedatangan saudari untuk melakukan tes wawancara kerja di perusahaan kami. Oleh karenanya diharapkan kedatangan saudari di Kantor Pusat pada:&#13;&#13;Hari dan tanggal : &#13;Waktu                  : &#13;Tempat                : &#13;&#13;Demikian surat ini kami sampaikan. Atas partisipasi dan kedatangan saudari kami mengucapkan terimakasih.&#13;</textarea>
              </div>
              <div class="form-group mt-3">
                <button type="submit" name="kirimPesan" class="btn btn-primary">Kirim Pesan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <?php require "footer.php" ?>
</body>
</html>

<?php

// jika tidak login sbg perusahaan, tendang ke index
if (!isset($_SESSION["perusahaan"])){
  echo "
    <script>
      Swal.fire('Akses Ditolak','Maaf Anda Tidak Dapat Mengakses Halaman Ini','warning').then(function(){
        window.location = 'index.php';
      });
    </script>
  ";
}else if (!isset($_GET["id"])){ // jika tidak mendapatkan data id
  echo "
    <script>
      Swal.fire('Halaman Tidak Memproses','Halaman Tidak Menerima Inputan Data Lamaran','warning').then(function(){
        window.location = 'data-lamaran.php';
      });
    </script>
  ";
}else if (mysqli_num_rows(mysqli_query($db,"SELECT * from lamaran where id = $idLamaran")) < 1){  // jika id lamaran tidak ada di db
  echo "
    <script>
      Swal.fire('Halaman Tidak Memproses','ID Lamaran Tidak Ditemukan','warning').then(function(){
        window.location = 'data-lamaran.php';
      });
    </script>
  ";
}else {

  $lamaran = mysqli_fetch_assoc(mysqli_query($db,"SELECT loker.idPerusahaan as idPerusahaan from lamaran join loker on lamaran.idLoker = loker.id where lamaran.id = $idLamaran"));
  $idPerusahaanLoker = $lamaran["idPerusahaan"];


  $emailPerusahaan = $_SESSION["perusahaan"];
  $perusahaan = mysqli_fetch_assoc(mysqli_query($db, "SELECT * from perusahaan where email = '$email'"));
  $idPerusahaanLogin = $perusahaan["id"];
  
  // jika yg masuk bkn perusahaan yg punya loker
  if ($idPerusahaanLoker != $idPerusahaanLogin){
    echo "
      <script>
        Swal.fire('Akses Ditolak','Lamaran Ini Bukan Untuk Perusahaan Anda','warning').then(function(){
          window.location = 'data-lamaran.php';
        });
      </script>
    ";
  }
}

if (isset($_POST["kirimPesan"])){
  $pesanPerusahaan = $_POST["pesanPerusahaan"];
  mysqli_query($db,"UPDATE lamaran SET status = 'Diterima', pesanPerusahaan = '$pesanPerusahaan' where id = $idLamaran");
  if (mysqli_affected_rows($db) == 1){
    echo "
      <script>
        Swal.fire('Data Lamaran Diterima','Pesan Berhasil Dikirimkan !','success').then(function(){
          window.location = 'data-lamaran.php';
        });
      </script>
    ";
  }else {
    echo mysqli_error($db);
  }
}



?>