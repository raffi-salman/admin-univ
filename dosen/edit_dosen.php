<?php
session_start();
if (
    empty($_SESSION['username']) AND
    empty($_SESSION['password'])
) {
    echo "<script>alert('Anda tidak memiliki akses');
window.location = 'login.php'</script>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dosen</title>
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
            <div class="card-header">Edit Data Dosen</div>
            <div class="card-body text-success">
                <div class="row">
                    <div class="col-md-5 ">

                        <form method="POST" action="update_dosen.php" enctype="multipart/form-data">
                            <?php
                                include "../config/koneksi.php";
                                $nidn = $_GET['nidn'];
                                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_dosen WHERE nidn='$nidn'");
                                $data = mysqli_fetch_array($tampil);
                            ?>

                            
                            <input type="hidden" name="nidn_tmp" value="<?= $data['nidn'] ?>">
                            <input type="hidden" name="foto_lama" value="<?= $data['foto'] ?>">

                            <div class="mb-3 mt-3">
                                <label for="nidn" class="form-label">NIDN :</label>
                                <input type="text" name="nidn" value="<?= $data['nidn'] ?>" class="form- control"
                                    id="nidn" placeholder="Masukan NIDN" required>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="nama_dosen" class="form-label">Nama Lengkap : </label>
                                <input type="text" name="nama_dosen" value="<?=

                                    $data['nama_dosen'] ?>" class="form-control" id="nama_dosen"
                                    placeholder="Masukan Nama Dosen" required>
                            </div>


                            <div class="mb-3 mt-3"></div>
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin :</label>
                            <select for="jenis_kelamin" name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                <option value="<?= $data['jenis_kelamin'] ?>">
                                    <?=
                                        $data['jenis_kelamin'] ?>
                                </option>
                                <option value=""> -- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki"> Laki-laki</option>
                                <option value="Perempuan"> Perempuan</option>
                            </select>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat : </label>
                                <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control"
                                    id="alamat" placeholder="Masukan Alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No HP :</label>
                                <input type="number" name="no_hp" value="<?= $data['no_hp'] ?>" class="form-control"
                                    id="no_hp" placeholder="Masukan No HP" required>
                            </div>

                            <div class="mb-3">
                                <label for="pendidikan_terakhir" class="form-label">Pendidikan Terkahir :</label>
                                <select name="pendidikan_terakhir" class="form-control" id="pendidikan_terakhir"
                                    required>
                                    <option value="<?= $data['pendidikan_terakhir'] ?>">
                                        <?= $data['pendidikan_terakhir'] ?>
                                    </option>
                                    <option value=""> -- Pilih Pendidikan Terakhir --</option>
                                    <option value="D-III"> D-III </option>
                                    <option value="D-IV"> D-IV </option>
                                    <option value="S-1"> S1</option>
                                    <option value="S2"> S2</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan :</label>
                                <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>" class="form-control"
                                    id="jurusan" placeholder="Masukan Jurusan " required>
                            </div>

                            <div class="mb-3">
                                <label for="dosen_prodi" class="form-label">Dosen Prodi :</label>
                                <select name="dosen_prodi" class="form-control" id="dosen_prodi" required>
                                    <option value="<?= $data['dosen_prodi'] ?>"><?= $data['dosen_prodi'] ?></option>
                                    <option value=""> -- Pilih Dosen Prodi --</option>
                                    <option value="Teknik Informatika"> Teknik Informatika </option>
                                    <option value="Teknik Sipil"> Teknik Sipil </option>
                                    <option value="PGSD"> PGSD</option>
                                    <option value="Agro Bisnis"> Agro Bisnis</option>
                                    <option value="Farmasi"> Farmasi</option>
                                    <option value="Manajemen"> Manajemen</option>
                                    <option value="Bahasa Inggris"> Bahasa Inggris</option>
                                    <option value="Peternakan"> Peternakan</option>
                                    <option value="Pertanian"> Pertanian</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Saat Ini :</label><br>
                                <img src="../uploads/foto_dosen/<?= $data['foto'] ?>" width="120">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ganti Foto (Opsional) :</label>
                                <input type="file" name="foto" class="form-control">
                            </div>

                            <div class="mb-3">
                                <a href="tampil_dosen.php" class="btn btn-warning">Kembali</a>
                                <button type="submit" class="btn btn-primary">Perbaharui</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>