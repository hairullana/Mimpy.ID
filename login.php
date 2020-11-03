<!-- header -->
<?php 
$title = "Halaman Login";
include '_header.php';
?>
<!-- end header -->


<!-- body -->
<div class="container my-5">
    <div class="row">
        <div class="col-xl-6 offset-xl-3">
            <div class="card">
            <div class="card-header text-center">
                Silahkan Login Terlebih Dahulu
                </div>
                <!-- form login -->
                <div class="card-body">
                <form>
                <div class="text-center mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="admin">
                        <label class="form-check-label" for="exampleRadios1">Admin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="perusahaan">
                        <label class="form-check-label" for="exampleRadios2">Perusahaan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="pelamar">
                        <label class="form-check-label" for="exampleRadios3">Pelamar</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Address / Username</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email / Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- end body -->

<!-- footer -->
<?php include '_footer.php' ?>
<!-- end footer -->