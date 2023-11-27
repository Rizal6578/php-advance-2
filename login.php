<?php
include 'koneksi.php';

session_start();

// Jika user sudah login, redirect ke halaman dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

// Autentikasi user saat form login disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['user_id'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error_message = "Autentikasi gagal. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include CSS and JS libraries -->
    <!-- Add links to your CSS and JS files -->
</head>

<body>
    <h2>Login</h2>
    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
    <form action="" method="post">
        Username (No. HP): <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <!-- Add additional styling and scripting as needed -->
</body>

</html>
