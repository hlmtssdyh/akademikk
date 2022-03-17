<?php
include 'koneksi.php';
$nim      = $_POST['nim'];
$nama     = $_POST['nama'];
$alamat   = $_POST['alamat'];
$fakultas = $_POST['fakultas'];

$sql = "UPDATE mahasiswa SET nim='$nim',nama='$nama',alamat ='$alamat',fakultas='$fakultas' where nim = $nim";
$q = mysqli_query($koneksi, $sql);
if (!$q) {
    echo 'data gagal di perbarui';
} else {
    header('location:index.php');
}