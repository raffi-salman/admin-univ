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
    <title>Tambah Mahasiswa</title>
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
            <div class="card-header">Tambah Data Mahasiswa</div>
            <div class="card-body text-success">
                <div class="row ">
                    <div class="col-md-5 ">
                        <form method="POST" action="insert_mahasiswa.php" enctype="multipart/form-data">

                            <div class="mb-3 mt-3">
                                <label for="nim" class="form-label">NIM :</label>
                                <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukan NIM"
                                    required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="nama_mahasiswa" class="form-label">Nama Lengkap :</label>
                                <input type="text" name="nama_mahasiswa" class="form-control" id="nama_mahasiswa"
                                    placeholder="Masukan Nama Mahasiswa" required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin :</label>
                                <select for="jenis_kelamin" name="jenis_kelamin" class="form-control" id="jenis_kelamin"
                                    required>
                                    <option value=""> -- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki"> Laki-laki</op tion>
                                    <option value="Perempuan"> Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir:</label>
                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                    placeholder="Masukan Tempat Lahir" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                                    placeholder="Masukan Tanggal Lahir" required>
                            </div>

                            <div class="mb-3">
                                <label for="tahun_masuk" class="form-label">Tahun Masuk:</label>
                                <input type="number" name="tahun_masuk" class="form-control" id="tahun_masuk"
                                    placeholder="Masukan Tahun Masuk " required>
                            </div>

                            <div class="mb-3">
                                <label for="prodi" class="form-label">Prodi:</label>
                                <select name="prodi" class="form-control" id="prodi" required>
                                    <option value=""> -- Pilih Prodi --</option>
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
                                <label for="foto" class="form-label">Foto Mahasiswa:</label>
                                <input type="file" name="foto" class="form-control" id="foto" required>
                                <div class="form-text">Format JPG/PNG, Maks 1MB.</div>
                            </div>

                            <div class="mb-3">
                                <a href="tampil_mahasiswa.php" class="btn btn-warning">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>