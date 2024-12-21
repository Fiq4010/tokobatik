<?php include 'header.php';
// session_start();
?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Reset Password</li>
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
                        <h3 class="title">Reset Password</h3>
                    </div>

                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "terdaftar") {
                            echo "<div class='alert alert-success text-center'>Selamat password anda berhasil diubah, silahkan login.</div>";
                        } elseif ($_GET['alert'] == "gagal") {
                            echo "<div class='alert alert-danger text-center'>Password dan konfirmasi password tidak cocok.</div>";
                        }
                    }
                    ?>

                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <?php if (isset($_SESSION['reset_email'])) : ?>
                                <form action="reset_password_act.php" method="post">
                                    <div class="form-group">
                                        <label for="password">Password Baru</label>
                                        <input type="password" class="input" name="password" id="password" placeholder="Masukkan password baru" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password2">Konfirmasi Password</label>
                                        <input type="password" class="input" name="password2" id="password2" placeholder="Konfirmasi password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="primary-btn btn-block" name="check-reset" value="Reset Password">
                                    </div>
                                </form>
                            <?php endif; ?>
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