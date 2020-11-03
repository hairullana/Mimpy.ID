<?php
$title = "Kelola Lamaran";
include '_header.php';
?>


<div class="card mt-5">
    <div class="card-header text-center">
        <h3>Kelola Lamaran</h3>
    </div>
    <div class="card-body container ">

        <!-- search -->
        <form action="">
            <div class="row mx-5 my-3">
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

        <table class="table table-responsive-md">
            <tr>
                <th>ID Loker</th>
                <th>Perusahaan</th>
                <th>Pelamar</th>
                <th>Posisi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td>1</td>
                <td>PT. Abdi Jaya</td>
                <td>Febri Wira</td>
                <td>Manager</td>
                <td>Diterima</td>
                <td><a href=""><button class="btn btn-primary">Detail</button></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>PT. Abdi Jaya</td>
                <td>Febri Wira</td>
                <td>Manager</td>
                <td>Menunggu</td>
                <td><a href=""><button class="btn btn-primary">Detail</button></a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>PT. Abdi Jaya</td>
                <td>Febri Wira</td>
                <td>Manager</td>
                <td>Ditolak</td>
                <td><a href=""><button class="btn btn-primary">Detail</button></a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>PT. Abdi Jaya</td>
                <td>Febri Wira</td>
                <td>Manager</td>
                <td>Menunggu</td>
                <td><a href=""><button class="btn btn-primary">Detail</button></a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>PT. Abdi Jaya</td>
                <td>Febri Wira</td>
                <td>Manager</td>
                <td>Diterima</td>
                <td><a href=""><button class="btn btn-primary">Detail</button></a></td>
            </tr>
        </table>
    </div>
</div>

<div class="row mt-3">
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



<?php
include '_footer.php';
?>