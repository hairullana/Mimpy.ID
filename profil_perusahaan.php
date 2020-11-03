<!-- header -->
<?php
$title = "Registrasi Pelamar";
include '_header.php';
?>
<!-- end header -->

<!-- body -->
<div class="row mt-5">
    <div class="col-md-6 offset-md-3">
            <div class="card">
                <!-- heading -->
                <div class="card-header text-center">
                    <h3>Profil Perusahaan</h3>
                </div>
                <!-- form -->
                <div class="card-body">
                    <table class="table">
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama Perusahaan">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nomor Telp">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Kota / Kabupaten">
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" placeholder="Alamat Lengkap"></textarea>
                            </div>
                            <div class="form-group">
                                <textarea type="password" class="form-control" placeholder="Deskripsi Perusahaan"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Simpan Data</button> <a href="ganti-password.php" class="btn btn-danger">Ganti Kata Sandi</a>
                            </div>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end body -->

<!-- footer -->
<?php
include '_footer.php';
?>
<!-- end footer -->