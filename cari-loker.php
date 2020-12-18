<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- judul -->
    <title>Cari Loker</title>
    <!-- headtags -->
    <?php require "headtags.php" ?>
</head>
<body>

    <!-- navbar -->
    <?php require "navbar.php" ?>
    
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
                        <form action="" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-4 mb-3">
                                    <input type="text" name="kota" class="form-control" placeholder="Kota">
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <input type="text" name="posisi" class="form-control" placeholder="Posisi">
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <select class="form-control" name="lulusan" id="exampleFormControlSelect1">
                                        <option selected value="Tanpa Ijasah">Tanpa Ijasah</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA/K</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="D4">D4</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                            </div>
                            <button type="cari" name="cari" class="btn btn-primary align-content-center">Cari Loker</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- list lowongan kerja -->
    <div class="container mt-4">

        <?php if(isset($_POST["cari"])) : ?>
            

            <?php 

            $posisi = $_POST["posisi"];
            $lulusan = $_POST["lulusan"];
            $kota = $_POST["kota"];

            if ($kota == "" && $posisi == ""){
                if ($lulusan == "Tanpa Ijasah") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        loker.lulusan = 'Tanpa Ijasah' OR
                        loker.lulusan = 'SD' OR
                        loker.lulusan = 'SMP' OR
                        loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3'
                        order by loker.id desc
                    ";
                }else if ($lulusan == "SD") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        loker.lulusan = 'SD' OR
                        loker.lulusan = 'SMP' OR
                        loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3'
                        order by loker.id desc
                    ";
                }else if ($lulusan == "SMP") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        loker.lulusan = 'SMP' OR
                        loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3'
                        order by loker.id desc
                    ";
                }else if ($lulusan == "SMA") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3'
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D1") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3'
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D2") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3'
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D3") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3'
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D4") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3'
                        order by loker.id desc
                    ";
                }else if ($lulusan == "S1") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3'
                        order by loker.id desc
                    ";
                }else if ($lulusan == "S2") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3'
                        order by loker.id desc
                    ";
                }else if ($lulusan == "S3") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        loker.lulusan = 'S3'
                        order by loker.id desc
                    ";
                }
            }else if ($posisi == ""){
                if ($lulusan == "Tanpa Ijasah") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.lulusan = 'Tanpa Ijasah' OR
                        loker.lulusan = 'SD' OR
                        loker.lulusan = 'SMP' OR
                        loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "SD") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.lulusan = 'SD' OR
                        loker.lulusan = 'SMP' OR
                        loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "SMP") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.lulusan = 'SMP' OR
                        loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "SMA") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D1") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D2") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D3") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D4") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "S1") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "S2") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "S3") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }
            }else if ($kota == ""){
                if ($lulusan == "Tanpa Ijasah") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'Tanpa Ijasah' OR
                        loker.lulusan = 'SD' OR
                        loker.lulusan = 'SMP' OR
                        loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "SD") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'SD' OR
                        loker.lulusan = 'SMP' OR
                        loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3' OR
                        loker.lulusan = 'SD')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "SMP") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'SMP' OR
                        loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3' OR
                        loker.lulusan = '%$lulusan$')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "SMA") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D1") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D2") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D3") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D4") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "S1") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "S2") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "S3") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'S3')
                        order by loker.id desc
                    ";
                }
            }else {
                if ($lulusan == "Tanpa Ijasah") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'Tanpa Ijasah' OR
                        loker.lulusan = 'SD' OR
                        loker.lulusan = 'SMP' OR
                        loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "SD") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'SD' OR
                        loker.lulusan = 'SMP' OR
                        loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3' OR) AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "SMP") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'SMP' OR
                        loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3' OR
                        loker.lulusan = '%$lulusan$') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "SMA") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'SMA' OR
                        loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D1") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'D1' OR
                        loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D2") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'D2' OR
                        loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D3") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'D3' OR
                        loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "D4") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'D4' OR
                        loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "S1") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'S1' OR
                        loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "S2") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'S2' OR
                        loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }else if ($lulusan == "S3") {
                    $query = "SELECT perusahaan.foto as foto, loker.posisi as posisi, loker.lulusan as lulusan, loker.jobdesk as jobdesk, loker.id as idLoker, perusahaan.nama as namaPerusahaan, perusahaan.alamat as alamatPerusahaan from loker inner join perusahaan on loker.idPerusahaan = perusahaan.id WHERE
                        (loker.posisi LIKE '%$posisi%') AND
                        (loker.lulusan = 'S3') AND
                        (perusahaan.kota LIKE '%$kota%' OR
                        perusahaan.alamat LIKE '%$kota%')
                        order by loker.id desc
                    ";
                }
            }



            $loker = mysqli_query($db,$query);

            ?>
            <div class="row mb-4">
                <div class="col-md-8 offset-md-2 font-weight-bold text-center">
                    <?php if($kota == "" && $posisi == "") : ?>
                        <div class="alert alert-primary">Menampilkan <?= mysqli_num_rows($loker) ?> Lowongan Kerja dengan Syarat  Lulusan Minimal "<?= $lulusan ?>"</div>
                    <?php elseif ($posisi == "") : ?>
                        <div class="alert alert-primary">Menampilkan <?= mysqli_num_rows($loker) ?> Lowongan Kerja dengan Syarat  Lulusan Minimal "<?= $lulusan ?>" di Daerah "<?= $kota ?>"</div>
                    <?php elseif($kota == "") : ?>
                        <div class="alert alert-primary">Menampilkan <?= mysqli_num_rows($loker) ?> Lowongan Kerja dengan Syarat  Lulusan Minimal "<?= $lulusan ?>" dan Posisi "<?= $posisi ?>"</div>
                    <?php else : ?>
                        <div class="alert alert-primary">Menampilkan <?= mysqli_num_rows($loker) ?> Lowongan Kerja dengan Syarat  Lulusan Minimal "<?= $lulusan ?>" dan Posisi "<?= $posisi ?>" di Daerah "<?= $kota ?>"</div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row mb-2">
                <?php foreach($loker as $data) : ?>
                    <?php $string = "Dicari " . $data["posisi"] . ", Minimal " .  $data["lulusan"] . ". " . $data["jobdesk"]; ?>
                    <div class="col-md-6 mb-2">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col-auto d-none d-lg-block">
                            <img src="assets/perusahaan/<?= $data['foto'] ?>" width="200" height="205" alt="">
                            </div>
                            <div class="col p-4 d-flex flex-column position-static">
                                <h3 class="mb-0"><?= $data["namaPerusahaan"] ?></h3>
                                <div class="mb-1 text-muted"><?= $data["alamatPerusahaan"] ?></div>
                                <p class="card-text mb-auto"><?= substr($string, 0, 90) . "..." ?></p>
                                <a href="detail-loker.php?id=<?= $data['idLoker'] ?>" class="stretched-link">read more</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            
        <?php endif; ?>

    </div>
    <!-- footer -->
    <?php include 'footer.php'; ?>
    <!-- end foooter -->
</body>
</html>