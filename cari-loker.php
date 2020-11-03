<!-- header -->
<?php
    $title = "Cari Loker";
    include '_header.php';
?>
<!-- end header -->


<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <h3>Pencarian Loker Spesifik</h3>
        </div>
        <div class="card-body col-md-8 offset-md-2 text-center">
            <p class="text-danger font-weight-bold">* Kosongkan form jika ingin mencari semua jenis loker</p>
            <div class="row center">
                <div class="col text-center mt-2">

                    <!-- spesifik pencarian -->
                    <form action="">
                        <div class="form-row">
                            <div class="form-group col-md-4 offset-md-2 mb-3">
                                <input type="text" class="form-control" placeholder="Daerah" value="Denpasar">
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <input type="text" class="form-control" placeholder="Gaji Minimal" value="2500000">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4 offset-md-2 mb-3">
                                <input type="text" class="form-control" placeholder="Posisi" value="Guru">
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>Lulusan</option>
                                    <option>Tanpa Ijasah</option>
                                    <option>SD</option>
                                    <option>SMP</option>
                                    <option>SMA/K</option>
                                    <option>D1</option>
                                    <option>D2</option>
                                    <option>D3</option>
                                    <option>D4</option>
                                    <option selected>S1</option>
                                    <option>S2</option>
                                    <option>S3</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary align-content-center">Cari Loker</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






<!-- list lowongan kerja -->
<div class="container">

    <div class="row my-4">
        <div class="col-md-8 offset-md-2 font-weight-bold">
            <div class="alert alert-primary">Menampilkan Lowongan Kerja dengan Syarat Lulusan S1, Posisi Guru, Gaji Minimal Rp. 2.500.000 di Daerah Denpasar</div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="205" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">Kumon Denpasar</h3>
                    <div class="mb-1 text-muted">Jl. Kampus Unud No.99, Kuta Selatan, Badung, Bali</div>
                    <p class="card-text mb-auto">Dibutuhkan segera Guru Matematika SMP, Minimal S1 Matematika</p>
                    <a href="#" class="stretched-link">read more</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="205" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">Kumon Denpasar</h3>
                    <div class="mb-1 text-muted">Jl. Kampus Unud No.99, Kuta Selatan, Badung, Bali</div>
                    <p class="card-text mb-auto">Dibutuhkan segera Guru Matematika SMP, Minimal S1 Matematika</p>
                    <a href="#" class="stretched-link">read more</a>
                </div>
            </div>
        </div>   
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="205" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">Kumon Denpasar</h3>
                    <div class="mb-1 text-muted">Jl. Kampus Unud No.99, Kuta Selatan, Badung, Bali</div>
                    <p class="card-text mb-auto">Dibutuhkan segera Guru Matematika SMP, Minimal S1 Matematika</p>
                    <a href="#" class="stretched-link">read more</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="205" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">Kumon Denpasar</h3>
                    <div class="mb-1 text-muted">Jl. Kampus Unud No.99, Kuta Selatan, Badung, Bali</div>
                    <p class="card-text mb-auto">Dibutuhkan segera Guru Matematika SMP, Minimal S1 Matematika</p>
                    <a href="#" class="stretched-link">read more</a>
                </div>
            </div>
        </div>   
    </div><div class="row mb-2">
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="205" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">Kumon Denpasar</h3>
                    <div class="mb-1 text-muted">Jl. Kampus Unud No.99, Kuta Selatan, Badung, Bali</div>
                    <p class="card-text mb-auto">Dibutuhkan segera Guru Matematika SMP, Minimal S1 Matematika</p>
                    <a href="#" class="stretched-link">read more</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="205" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">Kumon Denpasar</h3>
                    <div class="mb-1 text-muted">Jl. Kampus Unud No.99, Kuta Selatan, Badung, Bali</div>
                    <p class="card-text mb-auto">Dibutuhkan segera Guru Matematika SMP, Minimal S1 Matematika</p>
                    <a href="#" class="stretched-link">read more</a>
                </div>
            </div>
        </div>   
    </div>
</div>

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
<!-- end list lowongan kerja -->


<!-- footer -->
<?php include '_footer.php'; ?>
<!-- end foooter -->


        