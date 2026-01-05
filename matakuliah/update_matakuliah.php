<?php
include "../config/koneksi.php";
/* memasukan setiap data inputan kedalam setiap variabel
 */
$kode_matakuliah_tmp = $_POST['kode_matakuliah_tmp'];
$kode_matakuliah = $_POST['kode_matakuliah'];
$nama_matakuliah = $_POST['nama_matakuliah'];
$sks = $_POST['sks'];
$jenis = $_POST['jenis'];
//Menjalankan kueri update
$update = mysqli_query($koneksi, "UPDATE tbl_matakuliah SET kode_matakuliah='$kode_matakuliah',
nama_matakuliah='$nama_matakuliah', sks='$sks', jenis='$jenis' WHERE kode_matakuliah='$kode_matakuliah_tmp' ");
if ($update) {
    //Jika proses delete berhasil
    header("location:tampil_matakuliah.php");
} else {
    //Jika proses update gagal
    echo "<p>Gagal Menyimpan !</p>";
    echo "<a href='tampil_matakuliah.php'>Coba Lagi</a>";
}
?>