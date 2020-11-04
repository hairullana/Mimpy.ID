<!-- header -->
<?php
$title = "Profil Saya";
include '_header.php';
?>

<div class="container mt-5">
    <div class="card col-md-6 offset-md-3">
        <div class="card-header text-center">
            <h3>Profil Admin</h3>
        </div>
        <div class="card-body">
            <form action="">
                <div class="form-group text-center">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" class="form-control" value="admin">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Ubah Data</button> <a href="ganti-password.php" class="btn btn-danger">Ganti Password</a>
                </div>
            </form>
            
        </div>
    </div>
</div>

<!-- footer -->
<?php
include '_footer.php'
?>