<?php
$_HOST = "localhost";
$_USERNAME = "root";
$_PASSWORD = "";
$_DATABASE = "db_php_portofolio_angkatan3";

$koneksi = mysqli_connect(
    $_HOST,
    $_USERNAME,
    $_PASSWORD,
    $_DATABASE
);

if (!$koneksi) {
    echo "koneksi gagal";
}
