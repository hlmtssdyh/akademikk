<?php
include 'koneksi.php';
$nim      = $_POST['nim'];
$nama     = $_POST['nama'];
$alamat   = $_POST['alamat'];
$fakultas = $_POST['fakultas'];

$sql = " INSERT INTO mahasiswa (nim,nama,alamat,fakultas) VALUES ('$nim', '$nama', '$alamat', '$fakultas')";
$q  = mysqli_query($koneksi, $sql);
if (!$q) {
    echo "Gagal memasukkan data";
} else {
    header('location:index.php');  
}