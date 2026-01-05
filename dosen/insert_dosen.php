<?php
include "../config/koneksi.php";
/* memasukan setiap data inputan kedalam setiap variabel
 */
$nidn = $_POST['nidn'];
$nama_dosen = $_POST['nama_dosen'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$jurusan = $_POST['jurusan'];
$dosen_prodi = $_POST['dosen_prodi'];
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
            $nama_file_baru = $nidn . '_' . $foto_nama;
            move_uploaded_file($foto_tmp, '../uploads/foto_dosen/' . $nama_file_baru);
            //--- Menjalankan kueri insert
            $query = "INSERT INTO tbl_dosen(nidn, nama_dosen, jenis_kelamin, alamat, no_hp, pendidikan_terakhir, jurusan, dosen_prodi,
foto)
VALUES('$nidn', '$nama_dosen', '$jenis_kelamin', '$alamat', '$no_hp',
'$pendidikan_terakhir', '$jurusan', '$dosen_prodi', '$nama_file_baru')";
            $insert = mysqli_query($koneksi, $query);
            if ($insert) {
                header("location:tampil_dosen.php");
            } else {
                echo "<p>Gagal Menyimpan !</p>";
                echo "<a href='tampil_dosen.php'>Coba Lagi</a>";
            }
        } else {
            echo "<script>alert('GAGAL: Ukuran file terlalu besar! Maksimal 1MB.');
window.location='tambah_dosen.php';</script>";
        }
    } else {
        echo "<script>alert('GAGAL: Format file tidak sesuai! Hanya boleh JPG/PNG.');
window.location='tambah_dosen.php';</script>";
    }
} else {
    echo "<script>alert('Harap upload foto!');
window.location='tambah_dosen.php';</script>";
}
?>