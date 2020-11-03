<!-- header -->
<?php
$title = "Data Pelamar";
include '_header.php';
?>


<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h3>Data Pelamar</h3>
        </div>
        <div class="card-body">
            
            <!-- search -->
            <form action="">
                <div class="row mx-5">
                    <div class="col">
                        <div class="form-group">
                            <input class="form-control" type="search" placeholder="Keyword" aria-label="Search">
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
            <!-- end search -->


            <!-- data pelamar -->
            <table class="table text-center">
                <tr>
                    <th>ID Lamaran</th>
                    <th>Nama Pelamar</th>
                    <th>Posisi</th>
                    <th>Detail</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Hairul Lana</td>
                    <td>Admin</td>
                    <td><a href="cv.php" class="btn btn-primary">Lihat CV</a></td>
                    <td><button class="btn btn-success">Diterima</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Derwi Rainord</td>
                    <td>Manager</td>
                    <td><a href="cv.php" class="btn btn-primary">Lihat CV</a></td>
                    <td><button class="btn btn-primary">Terima</button> <button class="btn btn-primary">Tolak</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Arya Dwisada</td>
                    <td>Manager</td>
                    <td><a href="cv.php" class="btn btn-primary">Lihat CV</a></td>
                    <td><button class="btn btn-primary">Terima</button> <button class="btn btn-primary">Tolak</button></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Febri Wira</td>
                    <td>Akuntan</td>
                    <td><a href="cv.php" class="btn btn-primary">Lihat CV</a></td>
                    <td><button class="btn btn-danger">Ditolak</button></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Farin</td>
                    <td>Tim Media</td>
                    <td><a href="cv.php" class="btn btn-primary">Lihat CV</a></td>
                    <td><button class="btn btn-success">Diterima</button></td>
                </tr>
            </table>
            <!-- end data pelamar -->


            <!-- pagination -->
            <div class="row">
                <div class="col">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item" aria-current="page"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- end pagination -->


        </div>
    </div>
</div>


<!-- footer -->
<?php
include '_footer.php';
?>

