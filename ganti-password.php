<!-- header -->
<?php 
$title = "Ganti Password";
include '_header.php' ?>



<!-- form -->
<div class="container my-5">
    <div class="row">
        <div class="col-xl-6 offset-xl-3">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Ganti Kata Sandi</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kata Sand Lama</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kata Sandi Lama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kata Sandi Baru</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Kata Sandi Baru">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ulangi Kata Sandi Baru</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ulangi Kata Sandi Baru">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Ganti Kata Sandi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end form -->

<!-- footer -->
<?php include '_footer.php' ?>