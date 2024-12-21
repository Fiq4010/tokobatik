<?php
session_start();

include 'koneksi.php';

if (isset($_POST['check-reset'])) {
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (validatePassword($password, $password2)) {
        $hashed_password = md5($password); 
        $email = $_SESSION['reset_email'];

        // Query untuk update password
        $query = "UPDATE customer SET customer_password='$hashed_password' WHERE customer_email='$email'";

        if (mysqli_query($koneksi, $query)) {
            // header('Location: masuk.php?alert=sukses');
            echo '<script type="text/javascript">
                alert("Password anda berhasil direset, silahkan login.");
                window.location.href = "masuk.php";
              </script>';
            exit();
        } else {
            header('Location: reset_password.php?alert=gagal');
            exit();
        }
    } else {
        header('Location: reset_password.php?alert=gagal');
        exit();
    }
} else {
    header('Location: reset_password.php');
    exit();
}

// Fungsi validasi password
function validatePassword($password1, $password2)
{
    if ($password1 != $password2) {
        return false;
    }
    return true;
}
