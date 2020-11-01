<!-- header -->
<?php 
$title = "My Curriculum Vitae";
include '_header.php' ?>



<!-- form -->
<div class="container my-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="display-4">Curriculum Vitae</h3>
                </div>
                <div class="card-body">
                    <!-- image -->
                    <div class="row my-3">
                        <div class="col text-center">
                            <img src="assets/profile.jpg" alt="" class="rounded img-fluid" width=35% style="max-width:200px">
                        </div>
                    </div>
                    <!-- end image -->



                    <!-- input file -->
                    <div class="row">
                        <div class="col-md-6 offset-md-3 active mt-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Foto</button>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                    <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end input file -->


                    <form action="">
                        <div class="form-row mt-5">
                            <div class="col-md-12 mb-3">
                            <h3>Biodata</h3>
                            <div class="form-group col-md-6">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" value="Hairul Lana">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Tanggal Lahir</label>
                                <input type="text" class="form-control" value="27 Oktober 1999">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Jenis Kelamin</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Email</label>
                                <input type="text" class="form-control" value="hairullana99@gmail.com">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Nomor Telepon</label>
                                <input type="text" class="form-control" value="081234567890">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Alamat</label>
                                <textarea class="form-control">Hairul Lana</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Ubah Data</button>
                            </div>
                        </div>
                        <div class="form-row mt-5 ml-3">
                            <div class="col-md-12 mb-3">
                                <h3>Riwayat Pendidikan</h3>
                                <br>2006 - 2012 : SD N 1 Jimbaran
                                <br>2012 - 2015 : SMP N 1 Jimbaran
                                <br>2015 - 2018 : SMA N 1 Jimbaran (IPA)
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" placeholder="Riwayat Pendidikan">
                            </div>
                            <div class="form-group col-sm-2">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>Dari</option>
                                    <option>2015</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-2">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>Sampai</option>
                                    <option>2015</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </div>
                        <div class="form-row mt-5 ml-3">
                            <div class="col-md-12 mb-3">
                                <h3>Riwayat Prestasi</h3>
                                <br>2006 : Juara 1 Makan Krupuk
                                <br>2012 : Juara 1 Lomba Memancing Amarah
                                <br>2015 : Juara 2 Lomba Debat Nasional
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" placeholder="Riwayat Prestasi">
                            </div>
                            <div class="form-group col-sm-2">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>Tahun</option>
                                    <option>2015</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </div>
                        <div class="form-row mt-5 ml-3">
                            <div class="col-md-12 mb-3">
                                <h3>Riwayat Pekerjaan</h3>
                                <br>2018 - 2019 : Customer Service di PT. Anjay
                                <br>2019 - 2020 : Mekanik di Bengkel Anjay
                            </div>
                            <div class="form-group col-sm-5">
                                <input type="text" class="form-control" placeholder="Nama Perusahaan">
                            </div>
                            <div class="form-group col-sm-3">
                                <input type="text" class="form-control" placeholder="Posisi">
                            </div>
                            <div class="form-group col-sm-2">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>Dari</option>
                                    <option>2015</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-2">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>Sampai</option>
                                    <option>2015</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                    <option>Sekarang</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </div>
                        <div class="form-row mt-5 ml-3">
                            <div class="col-md-12 mb-3">
                                <h3>Keahlian dan Hobi</h3>
                                <br>Otomotif
                                <br>Web Programming
                                <br>Rebahan Bagai di Surga
                            </div>
                            <div class="form-group col-sm-10">
                                <input type="text" class="form-control" placeholder="Keahlian dan Hobi">
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end form -->

<!-- footer -->
<?php include '_footer.php' ?>