<?php

$DB_HOST ="217.21.74.101";
$DB_USER ="u805562190_buku_kita";
$DB_NAME ="u805562190_buku_kita";
$DB_PASS ="u805562190_Buku_Kita";

$koneksi = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (mysqli_connect_errno()) {
    echo "koneksi gagal";
}

?>