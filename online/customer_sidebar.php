<!-- ASIDE -->
<?php
// include '../koneksi.php';
$customer_id = $_SESSION['customer_id'];

$isi = mysqli_query($koneksi, "select customer_id from customer where customer_id = '$customer_id'");
$i = mysqli_fetch_assoc($isi);
?>


<div id="aside" class="col-md-3">

	<div class="aside">
		<ul>
			<li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer.php"> <i class="fa fa-home"></i> &nbsp; Dashboard</a></li>
			<li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_pesanan.php"> <i class="fa fa-list"></i> &nbsp; Pesanan Saya</a></li>
			<!-- <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_password.php"> <i class="fa fa-lock"></i> &nbsp; Ganti Password</a></li> -->
			<li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_profile.php?id=<?php echo $i['customer_id'] ?>"> <i class="fa fa-edit"></i> &nbsp; Edit Profile</a></li>
			<li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_logout.php"> <i class="fa fa-sign-out"></i> &nbsp; Keluar</a></li>
		</ul>
	</div>
</div>
<!-- /ASIDE -->
