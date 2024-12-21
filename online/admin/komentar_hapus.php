<?php
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM komentar WHERE komentar_id = '$id'");

header("location:komentar.php");