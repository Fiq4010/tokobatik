<?php 
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$password = md5($_POST['password']);

$rand = rand();
$allowed = array('gif', 'png', 'jpg', 'jpeg', 'webp', 'GIF', 'PNG', 'JPG', 'JPEG', 'WEBP');
$filename = $_FILES['foto']['name'];

// Cek apakah email sudah terdaftar
$cek_email = mysqli_query($koneksi, "SELECT * FROM customer WHERE customer_email='$email'");
if (mysqli_num_rows($cek_email) > 0) {
    header("location:daftar.php?alert=duplikat");
    exit;
}

if($filename == ""){
	mysqli_query($koneksi, "insert into customer values (NULL,'$nama','$email','$hp','$alamat','$password','')");
	header("location:masuk.php");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:daftar.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], './gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into customer values (NULL,'$nama','$email','$hp','$alamat','$password','$file_gambar')");
		header("location:masuk.php?alert=terdaftar");
	}
}
