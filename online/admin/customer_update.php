<?php 
include '../koneksi.php';

$id  = $_POST['id'];
$nama  = $_POST['nama'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);

// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
	mysqli_query($koneksi, "update customer set customer_nama='$nama', customer_email='$email', customer_hp='$hp', customer_alamat='$alamat' where customer_id='$id'");
	header("location:customer.php");
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
		header("location:customer.php");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "update customer set customer_nama='$nama', customer_email='$email', customer_hp='$hp', customer_alamat='$alamat', customer_foto='$x' where customer_id='$id'");		
		header("location:customer.php");
	}
}elseif($filename==""){
	mysqli_query($koneksi, "update customer set customer_nama='$nama', customer_email='$email', customer_hp='$hp', customer_alamat='$alamat', customer_password='$password' where customer_id='$id'");
	header("location:customer.php");
}

