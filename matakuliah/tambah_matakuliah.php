<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
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
            <div class="card-header">Tambah Data Mata Kuliah</div>
            <div class="card-body text-success">
                <div class="row ">
                    <div class="col-md-5 ">
                        <form method="POST" action="insert_matakuliah.php">
                            <div class="mb-3 mt-3">
                                <label for="kode_matakuliah" class="form-label">Kode Mata Kuliah : </label>
                                <input type="text" name="kode_matakuliah" class="form-control" id="kode_matakuliah"
                                    placeholder="Masukan Kode Mata Kuliah" required>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="nama_matakuliah" class="form-label">Nama Mata Kuliah :</label>
                                <input type="text" name="nama_matakuliah" class="form-control" id="nama_matakuliah"
                                    placeholder="Masukan Nama Mata Kuliah" required>
                            </div>

                            <div class="mb-3">
                                <label for="sks" class="form-label">SKS :</label>
                                <input type="number" name="sks" class="form-control" id="sks" placeholder="Masukan SKS"
                                    required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="jenis" class="form-label">Jenis Mata Kuliah :</label>
                                <select for="jenis" name="jenis" class="form-control" id="jenis"
                                    required>
                                    <option value=""> -- Pilih Jenis Mata Kuliah --</option>
                                    <option value="teori"> Teori</option>
                                    <option value="Praktikum"> Praktikum</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <a href="tampil_matakuliah.php" class="btn btn-warning">Kembali</a>
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