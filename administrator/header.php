<?php
session_start();

if($_SESSION['level']==""){
    header("location:../index.php?pesan=gagal");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Administrator</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="content">