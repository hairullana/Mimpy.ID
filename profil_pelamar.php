<!-- header -->
<?php
$title = "Profil Saya";
include '_header.php';
?>
<!-- end header -->


<!-- body -->
<div class="row mt-5">
    <div class="col-md-6 offset-md-3">
        <div class="container">
            <div class="card"> 
                <div class="card-header text-center">
                    <h3>Profil Saya</h3>
                </div>
                <!-- form -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <table class="table">
                                <form action="">
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
                                        <input type="text" class="form-control" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nomor Telp">
                                    </div>
                                    <div class="form-group">
                                        <select name="" id="" class="form-control">
                                            <option value="">Laki-Laki</option>
                                            <option value="">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" placeholder="Alamat Lengkap"></textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary">Ubah Data</button> <a href="ganti-password.php" class="btn btn-danger">Ganti Password</a>
                                    </div>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end form -->
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