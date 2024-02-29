<?php
include "../koneksi.php";

$id_detail = $_POST['id_detail'];
$id_pelanggan = $_POST['id_pelanggan'];

mysqli_query($koneksi, "delete from detail_penjualan where id_detail='$id_detail'");

header("location:detail_pembelian.php?id_pelanggan=$id_pelanggan");
?>