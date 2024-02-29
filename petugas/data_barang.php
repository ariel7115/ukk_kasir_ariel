<?php
include "header.php";
include "navbar.php";
?>
<div class="card mt-2">
    <div class="card-body">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-data">
            Tambah Data
        </button>
    </div>
    <div class="card-body">
        <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="simpan"){?>
                <div class="alert alert-success" role="alert">
                    Data Berhasil Di Simpan
                </div>
            <?php } ?>
            <?php if($_GET['pesan']=="update"){?>
                <div class="alert alert-success" role="alert">
                    Data Berhasil Di Update
                </div>
            <?php } ?>
            <?php if($_GET['pesan']=="hapus"){?>
                <div class="alert alert-success" role="alert">
                    Data Berhasil Di Hapus
                </div>
            <?php } ?>
            <?php
        }
        ?>
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                include "../koneksi.php";
                $no = 1;
                $data = mysqli_query($koneksi, "select * from produk");
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_produk']; ?></td>
                        <td>Rp. <?php echo $d['harga']; ?></td>
                        <td><?php echo $d['stok']; ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#edit-data<?php echo $d['id_produk']; ?>">
                                Edit
                            </button>
                            <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#hapus-data<?php echo $d['id_produk']; ?>">
                                Hapus
                            </button>
                        </td>
                    </tr>

                    <!-- modal edit data -->
                    <div class="modal fade" id="edit-data<?php echo $d['id_produk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="proses_update_barang.php" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Nama Produk</label>
                                            <input type="hidden" name="id_produk" value="<?php echo $d['id_produk']; ?>">
                                            <input type="text" name="nama_produk" class="form-control" value="<?php echo $d['nama_produk']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga Produk</label>
                                            <input type="number" name="harga" class="form-control" value="<?php echo $d['harga']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Stok Produk</label>
                                            <input type="number" name="stok" class="form-control" value="<?php echo $d['stok']; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- modal hapus data -->
                    <div class="modal fade" id="hapus-data<?php echo $d['id_produk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="proses_hapus_barang.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="id_produk" value="<?php echo $d['id_produk']; ?>">
                                        Apakah Anda Yakin Ingin Menghapus Data <b><?php echo $d['id_produk']; ?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- modal tambah data -->
<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="proses_simpan_barang.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Harga Produk</label>
                        <input type="number" name="harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Stok Produk</label>
                        <input type="number" name="stok" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>