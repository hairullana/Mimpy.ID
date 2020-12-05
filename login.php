<?php 
// header
$title = "Login";
include '_header.php';
// end header

cekSudahLogin();

// jika sudah memasukkan info login
if (isset($_POST["login"])){
    // tangkap variabel
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if (isset($_POST["user"])){

        if($_POST["user"] == "admin") {
            // login sebagai admin
            $cekUser = mysqli_query($connectDB,"SELECT * FROM admin WHERE email = '$email'");
    
            if (mysqli_num_rows($cekUser) > 0){
                // jika email ditemukan
                // cek passwordnya
                $admin = mysqli_fetch_assoc($cekUser);
                
                if (password_verify($password, $admin["password"])){
                    // jika password cocok
                    echo "
                        <script>
                            Swal.fire('LOGIN BERHASIL','','success').then(function() {
                                window.location = 'index.php';
                            });
                        </script>
                    ";
                    $_SESSION["admin"] = $email;
                }else{
                    // jika password tidak cocok
                    echo "
                        <script>
                            Swal.fire('LOGIN GAGAL','Password Yang Anda Masukkan Salah','error');
                        </script>
                    ";
                    
                }
            }else {
                // kalau email tidak ditemukan
                echo "
                    <script>
                        Swal.fire('LOGIN GAGAL','Email Tidak Ditemukan','error');
                    </script>
                ";
            }
        }else if ($_POST["user"] == "perusahaan"){
            // login sebagai perusahaan
            $cekUser = mysqli_query($connectDB,"SELECT * FROM perusahaan WHERE email = '$email'");
            if (mysqli_num_rows($cekUser) > 0){
                // jika email ditemukan
                // cek passwordnya
                $perusahaan = mysqli_fetch_assoc($cekUser);
    
                if (password_verify($password, $perusahaan["password"])){
                    // kalau password cocok
                    echo "
                        <script>
                            Swal.fire('LOGIN BERHASIL','','success').then(function() {
                                window.location = 'index.php';
                            });
                        </script>
                    ";
                    $_SESSION["perusahaan"] = $perusahaan['id'];
                }else {
                    // jika password tidak cocok
                    echo "
                        <script>
                            Swal.fire('LOGIN GAGAL','Password Yang Anda Masukkan Salah','error');
                        </script>
                    ";
                }
            }else {
                // kalau email tidak ditemukan
                echo "
                    <script>
                        Swal.fire('LOGIN GAGAL','Email Tidak Ditemukan','error');
                    </script>
                ";
            
            }
        }else if ($_POST["user"] == "pelamar"){
            // login sebagai pelamar
            $cekUser = mysqli_query($connectDB,"SELECT * FROM pelamar WHERE email = '$email'");
            if (mysqli_num_rows($cekUser) == 1){
                // jika email ditemukan
                $pelamar = mysqli_fetch_assoc($cekUser);
    
                if (password_verify($password, $pelamar["password"])){
                    // kalau password tidak cocok
                    echo "
                        <script>
                            Swal.fire('LOGIN BERHASIL','','success').then(function() {
                                window.location = 'index.php';
                            });
                        </script>
                    ";
                    // buat session pelamar
                    $_SESSION["pelamar"] = $email;
                }else {
                    // jika password tidak cocok
                    echo "
                        <script>
                            Swal.fire('LOGIN GAGAL','Password Yang Anda Masukkan Salah','error');
                        </script>
                    ";
                }
            }else {
                // kalau email tidak ditemukan
                echo "
                    <script>
                        Swal.fire('LOGIN GAGAL','Email Tidak Ditemukan','error');
                    </script>
                ";
            }
        }
    }else{
        // jika belum memilih jenis user
        echo "
            <script>
                Swal.fire('LOGIN GAGAL','Pilh Jenis User Terlebih Dahulu','error');
            </script>
        ";
    }
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