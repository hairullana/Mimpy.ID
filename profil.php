<!-- header -->
<?php

$title = "Profil Saya";
include '_header.php';

cekBelumLogin();

?>

<div class="container mt-5">
    <div class="card col-md-6 offset-md-3">
        <div class="card-header text-center">
            <h3>Profil Admin</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
            <?php
                if (isset($_SESSION["admin"])) :
                    $admin = mysqli_query($connectDB,"SELECT * FROM admin");
                    $admin = mysqli_fetch_assoc($admin);
            ?>
                    <div class="form-group text-center">
                        <label for="username">Username</label>
                        <input type="text" id="email" name="email" placeholder="Email" class="form-control" value="<?= $admin['email'] ?>">
                    </div>
            <?php
                elseif (isset($_SESSION["perusahaan"])) :
                    $id = $_SESSION['perusahaan'];
                    $perusahaan = mysqli_query($connectDB,"SELECT * FROM perusahaan WHERE id = $id");
                    $perusahaan = mysqli_fetch_assoc($perusahaan);
            ?>
                    <!-- image -->
                    <div class="row my-3">
                        <div class="col text-center">
                            <img src="assets/perusahaan.png" alt="" class="rounded img-fluid" width=35% style="max-width:200px">
                        </div>
                    </div>
                    <!-- end image -->

                    <!-- input file -->
                    <div class="row">
                        <div class="col-md-6 offset-md-3 active mt-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Foto</button>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                    <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama Perusahaan" name="nama" value="<?= $perusahaan['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?=$perusahaan['email'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nomor Telp" name="telp" value="<?= $perusahaan['telp'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Kota / Kabupaten" name="kota" value="<?= $perusahaan['kota'] ?>">
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" value="<?= $perusahaan['alamat'] ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea type="password" class="form-control" placeholder="Deskripsi Perusahaan" name="deskripsi" value="<?= $perusahaan['deskripsi'] ?>"></textarea>
                    </div>
            <?php
                elseif (isset($_SESSION["pelamar"])) :
                    $id = $_SESSION['pelamar'];
                    $pelamar = mysqli_query($connectDB,"SELECT * FROM pelamar WHERE id = $id");
                    $pelamar = mysqli_fetch_assoc($pelamar);
            ?>
                    <!-- image -->
                    <div class="row my-3">
                        <div class="col text-center">
                            <img src="assets/profile.jpg" alt="" class="rounded img-fluid" width=35% style="max-width:200px">
                        </div>
                    </div>
                    <!-- end image -->

                    <!-- input file -->
                    <div class="row">
                        <div class="col-md-6 offset-md-3 active mt-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Foto</button>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                    <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?= $pelamar['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?= $pelamar['email'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nomor Telp" name="telp" value="<?php $pelamar['telp'] ?>">
                    </div>
                    <div class="form-group">
                        <select name="" id="" class="form-control" name="gender">
                            <option value="pria">Laki-Laki</option>
                            <option value="wanita">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group" name="alamat">
                        <textarea type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" value="<?= $pelamar['alamat'] ?>"></textarea>
                    </div>
            <?php
                endif;
            ?>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary" name="simpanData">Simpan Data</button> <a href="ganti-password.php" class="btn btn-danger">Ganti Password</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- footer -->
<?php
include '_footer.php'
?>