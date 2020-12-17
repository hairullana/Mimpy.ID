<div class="row" id="up">
    <div class="col mb-5">
        <?php if (isset($_SESSION["admin"])) : ?>
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="/mimpy.id">Mimpy.ID</a>

                    <!-- klo kecil, muncul button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto"></ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="profil.php">Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- end navbar -->
        <?php elseif (isset($_SESSION["perusahaan"]))    : ?>
            <?php
                $email = $_SESSION["perusahaan"];
                $perusahaan = mysqli_query($db,"SELECT * FROM perusahaan WHERE email = '$email'");
                $perusahaan = mysqli_fetch_assoc($perusahaan);
            ?>
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="/mimpy.id">Mimpy.ID</a>

                    <!-- klo kecil, muncul button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto"></ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="profil.php"><?= $perusahaan["nama"] ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- end navbar -->
        <?php elseif (isset($_SESSION["pelamar"])) : ?>
            <?php
                $email = $_SESSION["pelamar"];
                $pelamar = mysqli_query($db,"SELECT * FROM pelamar WHERE email = '$email'");
                $pelamar = mysqli_fetch_assoc($pelamar);
            ?>
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="/mimpy.id">Mimpy.ID</a>

                    <!-- klo kecil, muncul button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto"></ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="profil.php"><?= $pelamar["nama"] ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- end navbar -->
        <?php else : ?>
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="/mimpy.id">Mimpy.ID</a>

                    <!-- klo kecil, muncul button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto"></ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="registrasi.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- end navbar -->
                
            
        <?php endif; ?>
    </div>
</div>