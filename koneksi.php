<?php
$koneksi = mysqli_connect("localhost", "root", "", "ukk_kasir_ariel");

if(mysqli_connect_errno()){
    echo "Koneksi Database Gagal : " . mysqli_connect_error();
}
?>