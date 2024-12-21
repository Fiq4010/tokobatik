<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Lupa Password</li>
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
                        <h3 class="title text-center">Lupa Password</h3>
                    </div>

                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "terdaftar") {
                            echo "<div class='alert alert-success text-center'>Selamat akun anda telah disimpan, silahkan login.</div>";
                        } elseif ($_GET['alert'] == "gagal") {
                            echo "<div class='alert alert-danger text-center'>Email tidak ditemukan, coba lagi.</div>";
                        }
                    }
                    ?>

                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <form action="lupa_password_act.php" method="post">
                                <div class="form-group">
                                    <label for="">Email Terdaftar</label>
                                    <input type="email" class="input" name="email" placeholder="Masukkan email anda . . ." required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="primary-btn btn-block" name="check-email" value="Lanjutkan">
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
