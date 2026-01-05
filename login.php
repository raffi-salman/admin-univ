<?php
session_start();
if (
    !empty($_SESSION['username']) AND
    !empty($_SESSION['password'])
) {
    header("location:mahasiswa/tampil_mahasiswa.php");
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Data Mahasiswa</title>
        <link href="bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <div class="container-fluid ">
            <div class="row justify-content-center ">
                <div class="col-md-3 mt-5">
                    <div class="card border-success mb-3 ">
                        <div class="card-header" style="text-align : center;">LOGIN FORM UY</div>
                        <div class="card-body text-success">
                            <div class="row ">
                                <div class="col-md-12 ">
                                    <form method="POST" action="cek_login.php">
                                        <div class="mb-3 mt-3">
                                            <label for="username" class="form-label">Username :</label>
                                            <input type="text" name="username" class="form-control" id="username"
                                                placeholder="Masukan Username" required>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="password" class="form-label">Password :</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Masukan Password" required>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php
}
?>