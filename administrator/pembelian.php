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
                <th>ID Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Total Pembayaran</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                include "../koneksi.php";
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.id_pelanggan=penjualan.id_pelanggan");
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['id_pelanggan']; ?></td>
                        <td><?php echo $d['nama_pelanggan']; ?></td>
                        <td><?php echo $d['nomor_telepon']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['total_harga']; ?></td>
                        <td>
                            <a href="detail_pembelian.php?id_pelanggan=<?php echo $d['id_pelanggan'] ?>" class="btn btn-info btn-sm" >Detail</a>
                            <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#edit-data<?php echo $d['id_pelanggan']; ?>">
                                Edit
                            </button>
                            <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#hapus-data<?php echo $d['id_pelanggan']; ?>">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <!--Modal Edit Data -->
                    <div class="modal fade" id="edit-data<?php echo $d['id_pelanggan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="proses_update_pembelian.php" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" name="id_pelanggan" value="<?php echo $d['id_pelanggan']; ?>" class="form-control" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Pelanggan</label>
                                            <input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $d['nama_pelanggan']; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">No. Telepon</label>
                                            <input type="number" name="nomor_telepon" class="form-control" value="<?php echo $d['nomor_telepon']; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="<?php echo $d['alamat']; ?>" class="form-control">
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
                    <div class="modal fade" id="hapus-data<?php echo $d['id_pelanggan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="proses_hapus_pembelian.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="id_pelanggan" value="<?php echo $d['id_pelanggan']; ?>">
                                        Apakah Anda Yakin Ingin Menghapus Data <b><?php echo $d['nama_pelanggan']; ?></b>
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
            <form action="proses_pembelian.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">ID Pelanggan</label>
                        <input type="text" name="id_pelanggan" value="<?php echo date("dmHis") ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">No. Telepon</label>
                        <input type="number" name="nomor_telepon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                        <input type="hidden" name="tanggal_penjualan" value="<?php echo date("Y-m-d") ?>" class="form-control">
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