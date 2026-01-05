<?php
include "../config/koneksi.php";
/* Mengambil nilai nim dari parameter get yang dikirim dari tampil mahasiswa
 */
$nim = $_GET['nim'];
$cari_foto = mysqli_query($koneksi, "SELECT foto FROM tbl_mahasiswa WHERE nim='$nim'");
$data_foto = mysqli_fetch_array($cari_foto);
$nama_foto = $data_foto['foto'];

//Hapus file fisik di folder
if ($nama_foto != "") {
    $lokasi_file = "../uploads/foto_mahasiswa/" . $nama_foto;
    if (file_exists($lokasi_file)) {
        unlink($lokasi_file);
    }
}

//Menjalankan kueri delete
$delete = mysqli_query($koneksi, "DELETE FROM tbl_mahasiswa WHERE nim='$_GET[nim]'");
if ($delete) {
    //Jika proses delete berhasil
    header("location:tampil_mahasiswa.php");
} else {
    //Jika proses delete gagal
    echo "<p>Gagal Menghapus !</p>";
    echo "<a href='tampil_mahasiswa.php'>Coba Lagi</a>";
}
?>