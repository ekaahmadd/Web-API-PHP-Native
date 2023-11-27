<?php
$hostname = "localhost";
$database = "buku_kita";
$username = "root";
$password = "";
$connect = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "koneksi gagal";
}
?>