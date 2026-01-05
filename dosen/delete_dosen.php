<?php
include "../config/koneksi.php";
/* Mengambil nilai nidn dari parameter get yang dikirim dari tampil dosen
 */
$nidn = $_GET['nidn'];
$cari_foto = mysqli_query($koneksi, "SELECT foto FROM tbl_dosen WHERE nidn=$nidn");
$data_foto = mysqli_fetch_array($cari_foto);
$nama_foto = $data_foto['foto'];

//hapus file fisik di folder
if ($nama_foto != "") {
    $lokasi_file = "../uploads/foto_dosen/" . $nama_foto;
    if (file_exists($lokasi_file)) {
        unlink($lokasi_file);
    }
}

//Menjalankan kueri delete
$delete = mysqli_query($koneksi, "DELETE FROM tbl_dosen WHERE nidn='$_GET[nidn]'");
if ($delete) {
    //Jika proses delete berhasil
    header("location:tampil_dosen.php");
} else {
    //Jika proses delete gagal
    echo "<p>Gagal Menghapus !</p>";
    echo "<a href='tampil_dosen.php'>Coba Lagi</a>";
}
?>