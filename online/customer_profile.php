<?php include 'header.php'; ?>


<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Edit Profile Customer</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<div class="section">
    <div class="container">
        <div class="row">

            <?php
            include 'customer_sidebar.php';
            ?>

            <div id="main" class="col-md-9">

                <h4>EDIT PROFILE</h4>

                <div id="store">
                    <div class="row">

                        <div class="col-lg-12">
                            <?php
                            if (isset($_GET['alert'])) {
                                if ($_GET['alert'] == "sukses") {
                                    echo "<div class='alert alert-success'>Profile anda berhasil diedit!</div>";
                                }
                            }
                            ?>

                            <form action="customer_profile_act.php" method="post" enctype="multipart/form-data">
                                <?php
                                $id = $_GET['id'];
                                $isi = mysqli_query($koneksi, "select * from customer where customer_id='$id'");
                                while ($i = mysqli_fetch_array($isi)) {
                                ?>
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" class="input" required="required" name="nama" value="<?php echo $i['customer_nama'] ?>">
                                        <input type="hidden" class="input" required="required" name="id" value="<?php echo $i['customer_id'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="input" required="required" name="email" value="<?php echo $i['customer_email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Handphone</label>
                                        <input type="text" class="input" required="required" name="hp" value="<?php echo $i['customer_hp'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" class="input" required="required" name="alamat" value="<?php echo $i['customer_alamat'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="input" name="password" placeholder="Kosongkan jika tidak ingin di ganti" min="5">
                                        <small class="text-muted">Kosongkan jika tidak ingin di ganti</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input type="file" name="foto">
                                        <small class="text-muted">Kosongkan jika tidak ingin di ganti</small>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="primary-btn" value="Simpan">
                                    </div>
                                <?php
                                }
                                ?>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>