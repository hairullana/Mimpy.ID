<!-- header -->
<?php
$title = "Buat Lamaran";
include '_header.php';
?>
<!-- end header -->


<!-- body -->
<div class="container">

    <div class="card mt-5">
        <div class="card-header text-center">
            <h3>Buat Lamaran</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Ringkasan Pekerjaan
                        </div>
                        <!-- overview -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Perusahaan : PT. Ayam Geprek Rainord</li>
                            <li class="list-group-item">Jabatan : Koki</li>
                            <li class="list-group-item">Minimal Lulusan : SMA/K</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
            <!-- surat lamaran -->
                <div class="col">
                    <strong>Surat Lamaran Anda</strong>
                    <form action="" class="mt-4">
                        <div class="form-group col-sm-12">
                            <textarea name="" id="" style="height:300px;" class="form-control"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 offset-sm-1">
                                <a href="cv.php" class="btn btn-primary btn-block">Lihat CV Saya</a>
                                <br>
                            </div>
                            <div class="col-sm-5">
                                <a href="kirim-lamaran.php"><button class="btn btn-danger btn-block">Kirim Lamaran</button></a>
                            </div>
                        </div>
                    </form>
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