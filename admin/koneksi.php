<?php
$_HOST = "localhost";
$_USERNAME = "root";
$_PASSWORD = "";
$_DATABASE = "php_portfolio_3";

$koneksi = mysqli_connect(
    $_HOST,
    $_USERNAME,
    $_PASSWORD,
    $_DATABASE
);

if (!$koneksi) {
    echo "koneksi gagal";
}
