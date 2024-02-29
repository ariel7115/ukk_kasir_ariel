<?php
include "../koneksi.php";

$stok = $_POST['stok'];
$id_produk = $_POST['id_produk'];
$jumlah_produk = $_POST['jumlah_produk'];
$harga = $_POST['harga'];
$id_detail = $_POST['id_detail'];
$id_pelanggan = $_POST['id_pelanggan'];
$subtotal = $jumlah_produk * $harga;
$stok_total = $stok - $jumlah_produk;

mysqli_query($koneksi, "update detail_penjualan set subtotal='$subtotal', jumlah_produk='$jumlah_produk' where id_detail='$id_detail'");
mysqli_query($koneksi, "update produk set stok='$stok_total' where id_produk='$id_produk'");

header("location:detail_pembelian.php?id_pelanggan=$id_pelanggan");
?>