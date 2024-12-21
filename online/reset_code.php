<?php
include 'header.php'; 
require_once 'password_controller.php';
?>

<?php
$email = $_SESSION['email'];
?>
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Reset Code</li>
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
                        <h3 class="title">Enter Reset Code</h3>
                    </div>
                    <form action="reset_code.php" method="post" autocomplete="off">
                        <div class="form-group">
                            <label for="otp">Reset Code</label>
                            <input type="text" class="input" name="otp" placeholder="Enter the reset code" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="primary-btn btn-block" name="check-reset-otp" value="Submit">
                        </div>
                    </form>
                    <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<?php include 'footer.php'; ?>
