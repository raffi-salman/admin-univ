<?php
include "../config/koneksi.php";
$nim_lama = $_POST['nim_tmp'];
$nim_baru = $_POST['nim'];
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$tahun_masuk = $_POST['tahun_masuk'];
$prodi = $_POST['prodi'];
$foto_lama = $_POST['foto_lama'];

/* CEK APAKAH ADA FOTO BARU */
if (!empty($_FILES['foto']['name'])) {
    // --- ambil data file baru ---
    $nama_foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];
    $ukuran = $_FILES['foto']['size'];
    $ekstensi_valid = ['jpg', 'jpeg', 'png'];
    $pisahkan_eks = explode('.', $nama_foto);
    $ekstensi = strtolower(end($pisahkan_eks));

    if (!in_array($ekstensi, $ekstensi_valid)) {
        echo "<script>alert('Gagal: Tipe file harus JPG, JPEG, atau PNG!');
window.history.back();</script>";
        exit;
    }
    if ($ukuran > 1044070) {
        echo "<script>alert('Gagal: Ukuran file maksimal 1 MB!');
window.history.back();</script>";
        exit;
    }
    $foto_baru = $nim_baru . '_' . $nama_foto;
    // Upload foto baru
    move_uploaded_file($tmp_foto, "../uploads/foto_mahasiswa/" . $foto_baru);
    // Hapus foto lama dari folder (Kecuali jika foto lama kosong)
    if ($foto_lama != "" && file_exists("../uploads/foto_mahasiswa/" . $foto_lama)) {
        unlink("../uploads/foto_mahasiswa/" . $foto_lama);
    }
} else {
    // Jika user tidak upload foto baru, pakai foto lama
    $foto_baru = $foto_lama;
}
$update = mysqli_query($koneksi, "
UPDATE tbl_mahasiswa SET
nim = '$nim_baru',
nama_mahasiswa = '$nama_mahasiswa',
jenis_kelamin = '$jenis_kelamin',
tempat_lahir = '$tempat_lahir',
tanggal_lahir = '$tanggal_lahir',
tahun_masuk = '$tahun_masuk',
prodi = '$prodi',
foto = '$foto_baru'
WHERE nim = '$nim_lama'
");

if ($update) {
    header("location:tampil_mahasiswa.php");
} else {
    echo "<p>Gagal Menyimpan !</p>";
    echo "<a href='tampil_mahasiswa.php'>Coba Lagi</a>";
}
?>