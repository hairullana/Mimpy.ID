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
    <title>Curiculum Vitae</title>
    <!-- headtags -->
    <?php require "headtags.php"; ?>
</head>
<body>

    <!-- navbar -->
    <?php require "navbar.php"; ?>

    <div class="row mt-5">
        <div class="col mt-5">
            <h3>TES</h3>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php"; ?>


</body>
</html>