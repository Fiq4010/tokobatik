<?php
session_start();
include 'koneksi.php';

if (isset($_POST['check-email'])) {
    $email = trim($_POST['email']);

    // Menggunakan prepared statements untuk mencegah SQL injection
    $stmt = $koneksi->prepare("SELECT * FROM customer WHERE customer_email = ?");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $_SESSION['reset_email'] = $email;
            echo '<script type="text/javascript">
                alert("Email benar! Anda akan diarahkan ke halaman reset password.");
                window.location.href = "reset_password.php?alert=sukses";
              </script>';
        } else {
            header('Location: lupa_password.php?alert=gagal');
        }
    } else {
        // Menangani kesalahan eksekusi query
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
