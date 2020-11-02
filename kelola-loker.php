<?php
$title = "Kelola Lowongan Kerja";
include '_header.php';
?>


<div class="row mt-5">
    <div class="col">
        <div class="container">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Kelola Lowongan Kerja</h3>
                </div>
                <div class="card-body">
                    <!-- search -->
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
                    <!-- end search -->
                    <table class="table text-center">
                        <tr>
                            <th>ID Loker</th>
                            <th>Tanggal</th>
                            <th>Posisi</th>
                            <th>Syarat Lulusan</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1 Januari 2020</td>
                            <td>Admin</td>
                            <td>SMA/K</td>
                            <td><button class="btn btn-primary">Detail</button> <button class="btn btn-success">Ubah</button> <button class="btn btn-danger">Hapus</button></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1 Januari 2020</td>
                            <td>Admin</td>
                            <td>SMA/K</td>
                            <td><button class="btn btn-primary">Detail</button> <button class="btn btn-success">Ubah</button> <button class="btn btn-danger">Hapus</button></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1 Januari 2020</td>
                            <td>Admin</td>
                            <td>SMA/K</td>
                            <td><button class="btn btn-primary">Detail</button> <button class="btn btn-success">Ubah</button> <button class="btn btn-danger">Hapus</button></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1 Januari 2020</td>
                            <td>Admin</td>
                            <td>SMA/K</td>
                            <td><button class="btn btn-primary">Detail</button> <button class="btn btn-success">Ubah</button> <button class="btn btn-danger">Hapus</button></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1 Januari 2020</td>
                            <td>Admin</td>
                            <td>SMA/K</td>
                            <td><button class="btn btn-primary">Detail</button> <button class="btn btn-success">Ubah</button> <button class="btn btn-danger">Hapus</button></td>
                        </tr>
                    </table>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include '_footer.php'
?>