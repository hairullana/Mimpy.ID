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
                Ganti Password
                </div>
                <div class="card-body">
                <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password Lama</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password Lama">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password Baru</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password Baru">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Retype Password Baru</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Retype Password Baru">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- end form -->

<!-- footer -->
<?php include '_footer.php' ?>