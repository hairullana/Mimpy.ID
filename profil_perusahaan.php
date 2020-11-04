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