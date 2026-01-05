<?php
include "../config/koneksi.php";
/* memasukan setiap data inputan kedalam setiap variabel
*/
$nidn_tmp = $_POST['nidn_tmp'];
$nidn = $_POST['nidn'];
$nama_dosen = $_POST['nama_dosen'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$jurusan = $_POST['jurusan'];
$dosen_prodi = $_POST['dosen_prodi'];
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
    $foto_baru = $nidn . '_' . $nama_foto;
    // Upload foto baru

    move_uploaded_file($tmp_foto, "../uploads/foto_dosen/" . $foto_baru);
    // Hapus foto lama dari folder (Kecuali jika foto lama kosong)
    if ($foto_lama != "" && file_exists("../uploads/foto_dosen/" . $foto_lama)) {
        unlink("../uploads/foto_dosen/" . $foto_lama);
    }
} else {
    $foto_baru = $foto_lama;
}


//Menjalankan kueri update lama
$update = mysqli_query($koneksi, "UPDATE tbl_dosen SET nidn='$nidn',
nama_dosen='$nama_dosen', jenis_kelamin='$jenis_kelamin', alamat='$alamat', dosen_prodi='$dosen_prodi',
no_hp='$no_hp', pendidikan_terakhir='$pendidikan_terakhir', jurusan='$jurusan', foto='$foto_baru'
WHERE nidn='$nidn_tmp' ");
if ($update) {
    //Jika proses delete berhasil
    header("location:tampil_dosen.php");
} else {
    //Jika proses update gagal
    echo "<p>Gagal Menyimpan !</p>";
    echo "<a href='tampil_dosen.php'>Coba Lagi</a>";
}
