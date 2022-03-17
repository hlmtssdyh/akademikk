<?php
include 'koneksi.php';
$nim = $_GET['nim'];
$sql = "DELETE FROM mahasiswa WHERE nim ='$nim'";
$q = mysqli_query($koneksi, $sql);
if (!$q) {
    echo "Gagal melakukan delete data";
} else {
    header('location:index.php');
}