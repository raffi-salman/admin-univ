<?php session_start();
include "config/koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$cari = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username'
AND password='$password'");
$data = mysqli_fetch_array($cari);
if (!empty($data['username'])) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
    $_SESSION['level'] = $data['level'];
    echo "<script>alert('Berhasil Login'); window.location='mahasiswa/tampil_mahasiswa.php';</script>";
} else {
    echo "<script>alert('Gagal Login'); window.location='login.php';</script>";
}
?>