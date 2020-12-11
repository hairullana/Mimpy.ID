<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

// ambil id loker
$id = $_GET["id"];
// ambil data loker
$loker = mysqli_query($db, "SELECT * from loker where id = $id");
$loker = mysqli_fetch_assoc($loker);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- judul -->
    <title>Edit Data Loker</title>
    <!-- panggil headtags -->
    <?php require "headtags.php" ?>
</head>
<body>

    <!-- navbar -->
    <?php require "navbar.php" ?>

    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg">
                <div class="card-header text-center">
                    <h3>Edit Data Loker</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Posisi" name="posisi" value="<?= $loker["posisi"] ?>">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="lulusan">
                                <?php if ($loker["lulusan"] == "Tanpa Ijasah") : ?>
                                    <option selected value="Tanpa Ijasah">Tanpa Ijasah</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA/K</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                <?php elseif ($loker["lulusan"] == "SD") : ?>
                                    <option value="Tanpa Ijasah">Tanpa Ijasah</option>
                                    <option selected value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA/K</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                <?php elseif ($loker["lulusan"] == "SMP") : ?>
                                    <option value="Tanpa Ijasah">Tanpa Ijasah</option>
                                    <option value="SD">SD</option>
                                    <option selected value="SMP">SMP</option>
                                    <option value="SMA">SMA/K</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                <?php elseif ($loker["lulusan"] == "SMA") : ?>
                                    <option value="Tanpa Ijasah">Tanpa Ijasah</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option selected value="SMA">SMA/K</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                <?php elseif ($loker["lulusan"] == "D1") : ?>
                                    <option value="Tanpa Ijasah">Tanpa Ijasah</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA/K</option>
                                    <option selected value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                <?php elseif ($loker["lulusan"] == "D2") : ?>
                                    <option value="Tanpa Ijasah">Tanpa Ijasah</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA/K</option>
                                    <option value="D1">D1</option>
                                    <option selected value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                <?php elseif ($loker["lulusan"] == "D3") : ?>
                                    <option value="Tanpa Ijasah">Tanpa Ijasah</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA/K</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option selected value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                <?php elseif ($loker["lulusan"] == "D4") : ?>
                                    <option value="Tanpa Ijasah">Tanpa Ijasah</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA/K</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option selected value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                <?php elseif ($loker["lulusan"] == "S1") : ?>
                                    <option value="Tanpa Ijasah">Tanpa Ijasah</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA/K</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option selected value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                <?php elseif ($loker["lulusan"] == "S2") : ?>
                                    <option value="Tanpa Ijasah">Tanpa Ijasah</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA/K</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option selected value="S2">S2</option>
                                    <option value="S3">S3</option>
                                <?php elseif ($loker["lulusan"] == "S3") : ?>
                                    <option value="Tanpa Ijasah">Tanpa Ijasah</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA/K</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option selected value="S3">S3</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="jobdesk" id="" placeholder="Jobdesk" name="jobdesk"><?= $loker["jobdesk"] ?></textarea>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="keterangan" id="" placeholder="Keterangan" name="keterangan"><?= $loker["keterangan"] ?></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" name="simpanPerubahan">Simpan Perubahan</button>
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

// jika belum login perusahaan, tendang ke index
if (!isset($_SESSION["perusahaan"])){
    echo "
        <script>
            Swal.fire('AKSES DITOLAK','','success').then(function(){
                window.location = 'index.php';
            });
        </script>
    ";
}else {
    // jika tidak menerima inputan get id
    if (!isset($_GET["id"])) {
        echo "
            <script>
                Swal.fire('AKSI DITOLAK','Tidak Dapat Mengakses Halaman','error').then(function(){
                    window.location = 'data-loker.php';
                });
            </script>
        ";
    }else {     // jika menerima inputan get id
        // ambil data perusahaan
        $idPerusahaan = $loker["idPerusahaan"];
        $perusahaan = mysqli_query($db, "SELECT * from perusahaan where id = $idPerusahaan");
        $perusahaan = mysqli_fetch_assoc($perusahaan);

        // jika yang login perushaaan yg punya loker
        if($perusahaan["email"] != $_SESSION["perusahaan"]){
            echo "
                <script>
                    Swal.fire('AKSES DITOLAK','Loker Ini Bukan Milik Perusahaan Anda','success').then(function(){
                        window.location = 'data-loker.php';
                    });
                </script>
            ";
        }
    }
}


// jika tombol Simpan Perubahan di klik
if (isset($_POST["simpanPerubahan"])){
    // ambil value form
    $posisi = htmlspecialchars($_POST["posisi"]);
    $lulusan = htmlspecialchars($_POST["lulusan"]);
    $jobdesk = htmlspecialchars($_POST["jobdesk"]);
    $keterangan = htmlspecialchars($_POST["keterangan"]);

    if (cekKosong($posisi) == true){
        if (cekKosong($jobdesk) == true){
            if (cekKosong($keterangan) == true){
                mysqli_query($db, "UPDATE loker SET posisi = '$posisi', lulusan = '$lulusan', jobdesk = '$jobdesk', keterangan = '$keterangan' where id = $id");
                if (mysqli_affected_rows($db) > 0){
                    echo "
                        <script>
                            Swal.fire('Perubahan Berhasil Disimpan','','success').then(function(){
                                window.location = 'data-loker.php';
                            });
                        </script>
                    ";
                }
            }
        }
    }
}

?>