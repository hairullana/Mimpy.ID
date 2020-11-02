<?php
$title = "Registrasi Perusahaan";
include '_header.php';
?>


<div class="row">
    <div class="col">
        <div class="container">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Registrasi Pelamar</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 offset-md-1">
                            <h5>Term and Condition</h5>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa odio deleniti placeat sit? Maxime, quos? Quaerat quod magnam alias pariatur, a error expedita molestiae, obcaecati voluptatem, harum saepe minus omnis.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam eius facilis culpa rem voluptatum adipisci dolorum non odio ut sit, sed maxime necessitatibus ea possimus, maiores quas laboriosam voluptates dolor?</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe sapiente assumenda ea quia amet incidunt labore voluptatem debitis inventore modi sunt, architecto maiores officia pariatur dicta, alias cumque deserunt explicabo!</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt aliquam animi mollitia quasi omnis, eius voluptate aperiam earum reprehenderit dolore adipisci nihil, nisi accusamus doloribus, fugit beatae unde praesentium dolorum.</p>
                        </div>
                        <div class="col-md-5">
                            <table class="table">
                                <form action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nama Perusahaan">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nomor Telp">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Kota / Kabupaten">
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" placeholder="Alamat Lengkap"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" placeholder="Deskripsi Perusahaan"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Ulangi Password">
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary">Registrasi</button>
                                    </div>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include '_footer.php';
?>