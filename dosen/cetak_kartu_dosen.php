<?php
include "../config/koneksi.php";
$nidn = $_GET['nidn'];
$data = mysqli_query($koneksi, "SELECT * FROM tbl_dosen WHERE nidn = '$nidn'");
$d = mysqli_fetch_array($data);
// Cek jika data tidak ditemukan
if (!$d) {
    echo "<script>alert('Data tidak ditemukan!');
window.location='tampil_dosen.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cetak KTM - <?= $d['nama_dosen'] ?></title>
    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* CSS Tambahan untuk desain kartu */
        .ktm-card {
            width: 550px;
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid #ccc;
        }

        .foto-mhs {
            width: 120px;
            height: 160px;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        /* Sembunyikan tombol saat dicetak */
        @media print {
            .no-print {
                display: none;
            }

            body {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="ktm-card bg-white shadow-lg">
                <div class="p-3 text-center text-white" style="background: linear-gradient(45deg,
#0d6efd, #0a58ca);">
                    <h5 class="m-0 fw-bold">KARTU DOSEN</h5>
                    <small>UNIVERSITAS PERJUANGAN</small>
                </div>
                <div class="p-4 d-flex align-items-start gap-4">
                    <div>
                        <?php
                        $path_foto = "../uploads/foto_dosen/" . $d['foto'];
                        ?>
                        <img src="<?= $path_foto ?>" class="foto-mhs rounded bg-secondary">
                    </div>
                    <div class="flex-grow-1">
                        <table class="table table-borderless table-sm m-0">
                            <tr>
                                <td class="fw-bold text-secondary" width="100">NIDN</td>
                                <td width="10">:</td>
                                <td class="fw-bold"><?= $d['nidn'] ?></td>
                            </tr>

                            <tr>
                                <td class="fw-bold text-secondary">Nama</td>
                                <td>:</td>
                                <td class="text-uppercase"><?= $d['nama_dosen'] ?></td>
                            </tr>

                            <tr>
                                <td class="fw-bold text-secondary">Jenis Kelamin</td>
                                <td>:</td>
                                <td><?= $d['jenis_kelamin'] ?></td>
                            </tr>

                            <tr>
                                <td class="fw-bold text-secondary">Alamat</td>
                                <td>:</td>
                                <td><?= $d['alamat'] ?></td>
                            </tr>

                            <tr>
                                <td class="fw-bold text-secondary">Pendidikan Terkahir</td>
                                <td>:</td>
                                <td><?= $d['pendidikan_terakhir'] ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-secondary">Jurusan</td>
                                <td>:</td>
                                <td><?= $d['jurusan'] ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-secondary">Dosen Prodi</td>
                                <td>:</td>
                                <td><?= $d['dosen_prodi'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="bg-warning" style="height: 8px;"></div>
            </div>
        </div>
        <div class="text-center mt-4 no-print">
            <button onclick="window.print()" class="btn btn-primary">
                Cetak Kartu
            </button>
            <a href="tampil_dosen.php" class="btn btn-outline-secondary">
                Kembali ke Menu
            </a>
        </div>
    </div>
</body>

</html>