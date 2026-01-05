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
    <title>Tambah Dosen</title>
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
            <div class="card-header">Tambah Data Dosen</div>
            <div class="card-body text-success">
                <div class="row ">
                    <div class="col-md-5 ">
                        <form method="POST" action="insert_dosen.php" enctype="multipart/form-data">
                            <div class="mb-3 mt-3">
                                <label for="nidn" class="form-label">NIDN :</label>
                                <input type="text" name="nidn" class="form-control" id="nidn" placeholder="Masukan NIDN"
                                    required>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="nama_dosen" class="form-label">Nama Lengkap :</label>
                                <input type="text" name="nama_dosen" class="form-control" id="nama_dosen"
                                    placeholder="Masukan Nama Dosen" required>
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
                                <label for="alamat" class="form-label">Alamat :</label>
                                <input type="text" name="alamat" class="form-control" id="alamat"
                                    placeholder="Masukan Alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No HP :</label>
                                <input type="int" name="no_hp" class="form-control" id="no_hp"
                                    placeholder="Masukan No HP" required>
                            </div>

                            <div class="mb-3">
                                <label for="pendidikan_terakhir" class="form-label">Pendiidkan Terakhir :</label>
                                <select name="pendidikan_terakhir" class="form-control" id="pendidikan_terakhir"
                                    required>
                                    <option value=""> -- Pilih Pendidikan Terakhir --</option>
                                    <option value="D-III"> D-III </option>
                                    <option value="D-IV"> D-IV </option>
                                    <option value="S1"> S1 </option>
                                    <option value="S2"> S2 </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan :</label>
                                <input type="text" name="jurusan" class="form-control" id="jurusan"
                                    placeholder="Masukan Jurusan " required>
                            </div>
                            <div class="mb-3">
                                <label for="dosen_prodi" class="form-label"> Dosen Prodi:</label>
                                <select name="dosen_prodi" class="form-control" id="dosen_prodi" required>
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
                                <label for="foto" class="form-label">Foto Dosen:</label>
                                <input type="file" name="foto" class="form-control" id="foto" required>
                                <div class="form-text">Format JPG/PNG, Maks 1MB.</div>
                            </div>

                            <div class="mb-3">
                                <a href="tampil_dosen.php" class="btn btn-warning">Kembali</a>
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