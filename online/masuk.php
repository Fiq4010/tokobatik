<?php include 'header.php'; 
// require_once 'password_controller.php';
?>



<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Login Customer</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<div class="order-summary clearfix">
					<div class="section-title">
						<h3 class="title">Login Customer</h3>
					</div>

					<?php
					if (isset($_GET['alert'])) {
						if ($_GET['alert'] == "terdaftar") {
							echo "<div class='alert alert-success text-center'>Selamat akun anda telah disimpan, silahkan login.</div>";
						} elseif ($_GET['alert'] == "gagal") {
							echo "<div class='alert alert-danger text-center'>Email atau Password tidak sesuai, coba lagi.</div>";
						} elseif ($_GET['alert'] == "login-dulu") {
							echo "<div class='alert alert-warning text-center'>Silahkan login terlebih dulu untuk membuat pesanan.</div>";
						}
					}
					?>


					<div class="row">
						<div class="col-lg-6 col-lg-offset-3">

							<form action="masuk_act.php" method="post">

								<div class="form-group">
									<label for="">Email</label>
									<input type="email" class="input" required="required" name="email" placeholder="Masukkan email ..">
								</div>

								<div class="form-group">
									<label for="">Password</label>
									<input type="password" class="input" required="required" name="password" placeholder="Masukkan password ..">
								</div>
								<div style="margin-bottom: 15px; text-align: right;">
									<a href="lupa_password.php" class="text-primary font-weight-bold" style="text-decoration: none;" onmouseover="style='text-decoration: underline';" onmouseout="style='text-decoration: none';">Lupa password ?</a>
								</div>

								<div class="form-group">
									<input type="submit" class="primary-btn btn-block" value="Login">
									<!-- <a href="daftar.php" class="main-btn btn-block text-center">Daftar</a> -->
								</div>
								<div class="text-center" style="margin-top: -5px;">
									<span>Belum punya akun? </span><a href="daftar.php" class="text-primary font-weight-bold" style="text-decoration: none;" onmouseover="style='text-decoration: underline';" onmouseout="style='text-decoration: none';">Daftar sekarang</a>
								</div>
							</form>

						</div>
					</div>
				</div>

			</div>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->



<?php include 'footer.php'; ?>