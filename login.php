<!-- header -->
<?php 
$title = "Login";
include '_header.php';
?>
<!-- end header -->

<?php

// kalau sudah login, tendang ke index
if (isset($_SESSION["admin"]) || isset($_SESSION["perusahaan"]) || isset($_SESSION["pelamar"])) {
    echo "
        <script>
            alert('Ups, Anda Sudah Login Gan !');
            document.location.href = 'index.php';
        </script>
    ";
}

// jika sudah memasukkan info login
if (isset($_POST["login"])){
    // tangkap variabel post
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);


    if($_POST["user"] == "admin") {
        // login sebagai admin
        $cekUser = mysqli_query($connectDB,"SELECT * FROM admin WHERE email = '$email'");
        if (mysqli_affected_rows($connectDB) > 0){
            // jika email ditemukan
            // cek passwordnya
            $cekUser = mysqli_fetch_assoc($cekUser);
            if ($cekUser["password"] != $password){
                // kalau password tidak cocok
                echo "
                    <script>
                        alert('Ups, Password Salah Bosku !');
                        document.location.href = 'login.php';
                    </script>
                ";
            }
        }else {
            // kalau email tidak ditemukan
            echo "
                <script>
                    alert('Email Tidak Ditemukan Gan !');
                    document.location.href = 'login.php';
                </script>
            ";
        }
        $_SESSION["admin"] = $email;
    }else if ($_POST["user"] == "perusahaan"){
        // login sebagai perusahaan
        $cekUser = mysqli_query($connectDB,"SELECT * FROM perusahaan WHERE email = $email");
        if (mysqli_affected_rows($cekUser) > 0){
            // jika email ditemukan
            // cek passwordnya
            $cekUser = mysqli_fetch_assoc($cekUser);
            if ($cekUser["password"] != $password){
                // kalau password tidak cocok
                echo "
                    <script>
                        alert('Ups, Password Salah Bosku !');
                        document.location.href = 'login.php';
                    </script>
                ";
            }
        }else {
            // kalau email tidak ditemukan
            echo "
                <script>
                    alert('Email Tidak Ditemukan Gan !');
                    document.location.href = 'login.php';
                </script>
            ";
        }
        $_SESSION["perusahaan"] = $email;
    }else if ($_POST["user"] == "pelamar"){
        // login sebagai pelamar
        $cekUser = mysqli_query($connectDB,"SELECT * FROM perusahaan WHERE email = $email");
        if (mysqli_affected_rows($cekUser) > 0){
            // jika email ditemukan
            // cek passwordnya
            $cekUser = mysqli_fetch_assoc($cekUser);
            if ($cekUser["password"] != $password){
                // kalau password tidak cocok
                echo "
                    <script>
                        alert('Ups, Password Salah Bosku !');
                        document.location.href = 'login.php';
                    </script>
                ";
            }
        }else {
            // kalau email tidak ditemukan
            echo "
                <script>
                    alert('Email Tidak Ditemukan Gan !');
                    document.location.href = 'login.php';
                </script>
            ";
        }
        $_SESSION["pelamar"] = $email;
    }else {
        echo "
            <script>
                alert('Ups, Pilih Jenis Usernya Dulu Cuy !');
                document.location.href = 'login.php';
            </script>
        ";
    }
    echo "
        <script>
            document.location.href = 'index.php';
        </script>
    ";
}

?>


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
                <form action="" method="POST">
                <div class="text-center mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user" id="exampleRadios1" value="admin">
                        <label class="form-check-label" for="exampleRadios1">Admin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user" id="exampleRadios2" value="perusahaan">
                        <label class="form-check-label" for="exampleRadios2">Perusahaan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user" id="exampleRadios3" value="pelamar">
                        <label class="form-check-label" for="exampleRadios3">Pelamar</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
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