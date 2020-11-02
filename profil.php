<?php
$title = "Profil Saya";
include '_header.php';
?>


<div class="row mt-5">
    <div class="col">
        <div class="container">
            <div class="card"> 
                <div class="card-header text-center">
                    <h3>Profil Saya</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <table class="table">
                                <form action="">
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
                                        <button type="submit" class="btn btn-primary">Ubah Data</button> <button type="submit" class="btn btn-danger">Ganti Password</button> 
                                    </div>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
include '_footer.php';
?>