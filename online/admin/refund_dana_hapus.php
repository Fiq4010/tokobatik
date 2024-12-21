<?php
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM refund WHERE id = '$id'");

header("location:refund_dana.php");