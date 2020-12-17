<?php

// validasi nama
function validasiNama ($nama) {
    if (empty($nama)) {
        // jika nama kosong
        echo "
            <script>
                Swal.fire(
                    'GAGAL !',
                    'Form Nama Tidak Boleh Kosong !',
                    'error'
                );
            </script>
        ";
        return false;
    }else if (strlen($nama) < 3) {
        // jika nama pendek
        echo "
            <script>
                Swal.fire(
                    'GAGAL !',
                    'Nama Terlalu Pendek !',
                    'error'
                );
            </script>
        ";
        return false;
    }else {
        // jika berhasil melewati semua validasi
        return true;
    }
}

// validasi nomor telepon
function validasiTelp($telp) {
    if (empty($telp)) {
        // jika form kosong
        echo "
            <script>
                Swal.fire(
                    'GAGAL !',
                    'Form Nomor Telepon Tidak Boleh Kosong !',
                    'error'
                );
            </script>
        ";
        return false;
    }else if (!is_numeric($telp)) {
        // jika bukan angka
        echo "
            <script>
                Swal.fire(
                    'GAGAL !',
                    'Nomor Telepon Harus Angka !',
                    'error'
                );
            </script>
        ";
        return false;
    }else {
        // jika berhasil melewati validasi
        return true;
    }
}

// validasi Kota
function validasiKota ($kota) {
    if (empty($kota)) {
        // jika kota kosong
        echo "
            <script>
                Swal.fire(
                    'GAGAL !',
                    'Form Kota / Kabupaten Tidak Boleh Kosong !',
                    'error'
                );
            </script>
        ";
        return false;
    }else if (strlen($kota) < 3) {
        // jika kota pendek
        echo "
            <script>
                Swal.fire(
                    'GAGAL !',
                    'Nama Kota / Kabupaten Terlalu Pendek !',
                    'error'
                );
            </script>
        ";
        return false;
    }else {
        // jika berhasil melewati semua validasi
        return true;
    }
}

// validasi alamat
function validasiAlamat ($alamat) {
    if (empty($alamat)) {
        // jika alamat kosong
        echo "
            <script>
                Swal.fire(
                    'GAGAL !',
                    'Form Alamat Tidak Boleh Kosong !',
                    'error'
                );
            </script>
        ";
        return false;
    }else if (strlen($alamat) < 15) {
        // jika alamat pendek
        echo "
            <script>
                Swal.fire(
                    'GAGAL !',
                    'Alamat Terlalu Pendek !',
                    'error'
                );
            </script>
        ";
        return false;
    }else {
        // jika berhasil melewati semua validasi
        return true;
    }
}

// validasi deskpripsi
function validasiDeskripsi ($deskripsi) {
    if (empty($deskripsi)) {
        // jika deskripsi kosong
        echo "
            <script>
                Swal.fire(
                    'GAGAL !',
                    'Form Deskripsi Tidak Boleh Kosong !',
                    'error'
                );
            </script>
        ";
        return false;
    }else if (strlen($deskripsi) < 15) {
        // jika deskripsi pendek
        echo "
            <script>
                Swal.fire(
                    'GAGAL !',
                    'Deskripsi Terlalu Pendek !',
                    'error'
                );
            </script>
        ";
        return false;
    }else {
        // jika berhasil melewati semua validasi
        return true;
    }
}

// validasi password
function validasiPassword ($password) {
    if (empty($password)) {
        // jika password kosong
        echo "
            <script>
                Swal.fire(
                    'GAGAL !',
                    'Form Password Tidak Boleh Kosong !',
                    'error'
                );
            </script>
        ";
        return false;
    }else if (strlen($password) < 10) {
        // jika password pendek
        echo "
            <script>
                Swal.fire(
                    'GAGAL !',
                    'Password Terlalu Pendek !',
                    'error'
                );
            </script>
        ";
        return false;
    }else {
        // jika berhasil melewati semua validasi
        return true;
    }
}

// cek apakah user sudah login atau belum
// kalau sudah login, tendang ke index
function cekSudahLogin(){
    if (isset($_SESSION["admin"]) || isset($_SESSION["perusahaan"]) || isset($_SESSION["pelamar"])) {
        echo "
            <script>
                Swal.fire('AKSES DITOLAK','Anda Sudah Login','warning').then(function(){
                        window.location = 'index.php';
                });
            </script>
        ";
    }
}

// cek apakah user sudah login atau belum
// kalau sudah belum, tendang ke login.php
function cekBelumLogin(){
    if (!isset($_SESSION["admin"]) && !isset($_SESSION["perusahaan"]) && !isset($_SESSION["pelamar"])) {
        echo "
            <script>
                Swal.fire('AKSES DITOLAK','Silahkan Login Untuk Mengakses Halaman Ini','warning').then(function(){
                        window.location = 'login.php';
                });
            </script>
        ";
    }
}

// cek login admin
function cekLoginAdmin(){
    if (!isset($_SESSION["admin"])){
        echo "
            <script>
                Swal.fire('ANDA BUKAN ADMIN','Silahkan Login Sebagai Admin Terlebih Dahulu','warning').then(function(){
                    window.location = 'index.php';
                });
            </script>
        ";
    }
}

// cek login perusahaan
function cekLoginPerusahaan(){
    if (!isset($_SESSION["perusahaan"])){
        echo "
            <script>
                Swal.fire('Akses Ditolak !','Anda Tidak Diizinkan Untuk Mengakses Halaman Ini','warning').then(function(){
                    window.location = 'index.php';
                });
            </script>
        ";
    }
}

// cek login perusahaan
function cekLoginPelamar(){
    if (!isset($_SESSION["pelamar"])){
        echo "
            <script>
                Swal.fire('Akses Ditolak !','Anda Tidak Diizinkan Untuk Mengakses Halaman Ini','warning').then(function(){
                    window.location = 'index.php';
                });
            </script>
        ";
    }
}

// cek form kosong
function cekKosong($var){
    if (empty($var)){
        echo "
            <script>
                Swal.fire('ERROR','Lengkapi Semua Form Nya Bro !','error').then(function(){
                    window.location = '#';
                });
            </script>
        ";
        return false;
    }
    return true;
}

?>