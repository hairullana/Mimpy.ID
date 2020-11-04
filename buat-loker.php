<!-- header -->
<?php
$title="Buat Loker Baru";
include '_header.php';
?>


<!-- body -->
<div class="container mt-5">
    <div class="card col-md-8 offset-md-2">
        <div class="card-header text-center">
            <h3>Buat Loker Baru</h3>
        </div>
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Posisi">
                </div>
                <div class="form-group">
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
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Gaji">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="" id="" placeholder="Jobdesk"></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="" id="" placeholder="Keahlian Utama"></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="" id="" placeholder="Keterangan"></textarea>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary">Posting Loker</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- footer -->
<?php
include '_footer.php';
?>