<?php
session_start();
if (
    empty($_SESSION['username']) AND
    empty($_SESSION['password'])
) {
    echo "<script>alert('Anda tidak memiliki akses'); window.location
= 'login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Mata Kuliah</title>
    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <?php include "menu.php"; ?>
            </div>
        </div>
        <div class="card border-success mb-3">
            <div class="card-header">Data Mata Kuliah</div>
            <div class="card-body text-success">
                <div class="row">
                    <div class="col-md-6 mb-2 ">
                        <a href='tambah_matakuliah.php' class='btn btn-primary'>Tambah Data</a>
                    </div>
                    <div class="col-md-6 ">
                        <form action="cari_matakuliah.php" method="GET">
                            <div class="btn-group float-end" role="group">
                                <input type="text" name="keyword" class="form-control" placeholder="Masukan keyword"
                                    required>
                                <button type="submit" class="btn btn-primary">Pencarian</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Mata Kuliah</th>
                                    <th>Nama Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Jenis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../config/koneksi.php";
                                $i = 0;
                                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah");
                                while ($data = mysqli_fetch_array($tampil)) {
                                    $i++;

                                    9

                                        ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $data['kode_matakuliah'] ?></td>
                                        <td><?= $data['nama_matakuliah'] ?></td>
                                        <td><?= $data['sks'] ?></td>
                                        <td><?= $data['jenis'] ?></td>
                                        <td>
                                            <a href="edit_matakuliah.php?kode_matakuliah=<?= $data['kode_matakuliah'] ?>"
                                                class='btn btn-primary'>Edit</a>
                                            <a href="delete_matakuliah.php?kode_matakuliah=<?= $data['kode_matakuliah'] ?>" class='btn btn-danger'
                                                onclick="return confirm('Apakah anda yakin ingin menghapus ini ?')">
                                                Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>