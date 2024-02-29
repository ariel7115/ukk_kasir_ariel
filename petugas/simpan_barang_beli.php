<?php
include "../koneksi.php";

$id_produk = $_POST['id_produk'];
$id_detail = $_POST['id_detail'];
$id_pelanggan = $_POST['id_pelanggan'];

mysqli_query($koneksi, "update detail_penjualan set id_produk='$id_produk' where id_detail='$id_detail'");

header("location:detail_pembelian.php?id_pelanggan=$id_pelanggan");
?>