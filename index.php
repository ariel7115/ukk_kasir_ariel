<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKK KASIR Ariel</title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="card mt-5">
                <div class="row">
                    <div class="col-6">
                        <div class="card-body">
                            <p class="text-center mt-5">Silahkan Masukkan Username dan Password</p>
                            <?php
                            if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="gagal"){
                                    echo "<div class='alert'>Username dan Password Tidak Sesuai !</div>";
                                }
                            }
                            ?>
                            <form action="cek_login.php" method="post">
                                <div class="form_group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="form_group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form_group mt-5">
                                    <button class="btn btn-primary form-control" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-body">
                            <img src="assets/login.png" width="500">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="assets/bootstrap-5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>