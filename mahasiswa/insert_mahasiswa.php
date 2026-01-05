<?php
include "../config/koneksi.php";

$nim = $_POST['nim'];
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$tahun_masuk = $_POST['tahun_masuk'];
$prodi = $_POST['prodi'];
$foto_nama = $_FILES['foto']['name'];
$foto_tmp = $_FILES['foto']['tmp_name'];
$foto_ukuran = $_FILES['foto']['size'];

if ($foto_nama != "") {
    // Daftar Ekstensi yang Diperbolehkan
    $ekstensi_izin = array('png', 'jpg', 'jpeg');
    $pisahkan = explode('.', $foto_nama);
    $ekstensi = strtolower(end($pisahkan));
    // CEK 1: Apakah ekstensi sesuai?
    if (in_array($ekstensi, $ekstensi_izin) === true) {
        // CEK 2: Apakah ukuran di bawah 1MB?
        if ($foto_ukuran < 1044070) {
            // --- JIKA LOLOS SEMUA CEK ---
            $nama_file_baru = $nim . '_' . $foto_nama;
            move_uploaded_file($foto_tmp, '../uploads/foto_mahasiswa/' . $nama_file_baru);
            //--- Menjalankan kueri insert
            $query = "INSERT INTO tbl_mahasiswa(nim, nama_mahasiswa, jenis_kelamin, tempat_lahir, tanggal_lahir, tahun_masuk, prodi,
foto)
VALUES('$nim', '$nama_mahasiswa', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir',
'$tahun_masuk', '$prodi', '$nama_file_baru')";
            $insert = mysqli_query($koneksi, $query);
            if ($insert) {
                header("location:tampil_mahasiswa.php");
            } else {
                echo "<p>Gagal Menyimpan !</p>";
                echo "<a href='tampil_mahasiswa.php'>Coba Lagi</a>";
            }
        } else {
            echo "<script>alert('GAGAL: Ukuran file terlalu besar! Maksimal 1MB.');
window.location='tambah_mahasiswa.php';</script>";
        }
    } else {
        echo "<script>alert('GAGAL: Format file tidak sesuai! Hanya boleh JPG/PNG.');
window.location='tambah_mahasiswa.php';</script>";
    }
} else {
    echo "<script>alert('Harap upload foto!');
window.location='tambah_mahasiswa.php';</script>";
}
?>