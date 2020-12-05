<?php

// koneksi db
require "connectDB.php";
// session
session_start();

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <!-- My CSS -->
        <link rel="stylesheet" href="assets/css/mimpy.id.css">
        <!-- Sweetalert2 -->
        <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
        <!-- Sweetalert2 JS -->
        <script src="assets/sweetalert2/sweetalert2.min.js"></script>

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
        <link rel="icon" href="assets/favicon.ico" type="image/x-icon">

        <!-- Fontawesome -->
        <script src="https://kit.fontawesome.com/ac1ee11f2c.js" crossorigin="anonymous"></script>
        

        <?php require "functions.php"; ?>

        <!-- title -->
        <title><?= $title ?></title>
    </head>

    <body class="pt-5">

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
                $id = $_SESSION["perusahaan"];
                $perusahaan = mysqli_query($connectDB,"SELECT * FROM perusahaan WHERE id = $id");
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
                $pelamar = mysqli_query($connectDB,"SELECT * FROM pelamar WHERE email = '$email'");
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