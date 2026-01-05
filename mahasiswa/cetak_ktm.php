<?php
include "../config/koneksi.php";
$nim = $_GET['nim'];
$data = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nim = '$nim'");
$d = mysqli_fetch_array($data);
// Cek jika data tidak ditemukan
if (!$d) {
    echo "<script>alert('Data tidak ditemukan!');
window.location='tampil_mahasiswa.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cetak KTM - <?= $d['nama_mahasiswa'] ?></title>
    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <style>
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
                <div class="p-3 text-center text-white" style="background: linear-gradient(45deg, #0d6efd, #0a58ca);">
                    <h5 class="m-0 fw-bold">KARTU TANDA MAHASISWA</h5>
                    <small>UNIVERSITAS PERJUANGAN</small>
                </div>
                <div class="p-4 d-flex align-items-start gap-4">
                    <div>
                        <?php
                        $path_foto = "../uploads/foto_mahasiswa/" . $d['foto'];
                        ?>
                        <img src="<?= $path_foto ?>" class="foto-mhs rounded bg-secondary">
                    </div>
                    <div class="flex-grow-1">
                        <table class="table table-borderless table-sm m-0">
                            <tr>
                                <td class="fw-bold text-secondary" width="100">NIM</td>
                                <td width="10">:</td>
                                <td class="fw-bold"><?= $d['nim'] ?></td>
                            </tr>

                            <tr>
                                <td class="fw-bold text-secondary">Nama</td>
                                <td>:</td>
                                <td class="text-uppercase"><?= $d['nama_mahasiswa'] ?></td>
                            </tr>

                            <tr>
                                <td class="fw-bold text-secondary">Jenis Kelamin</td>
                                <td>:</td>
                                <td><?= $d['jenis_kelamin'] ?></td>
                            </tr>

                            <tr>
                                <td class="fw-bold text-secondary">TTL</td>
                                <td>:</td>
                                <td><?= $d['tempat_lahir'], ', ', date('d-m-Y', strtotime($d['tanggal_lahir'])); ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="fw-bold text-secondary">Prodi</td>
                                <td>:</td>
                                <td><?= $d['prodi'] ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-secondary">Masuk</td>
                                <td>:</td>
                                <td><?= $d['tahun_masuk'] ?></td>
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
            <a href="tampil_mahasiswa.php" class="btn btn-outline-secondary">
                Kembali ke Menu
            </a>
        </div>
    </div>
</body>

</html>