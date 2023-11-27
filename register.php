<?php
include 'koneksi.php';

// Autentikasi user saat form register disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Generate username from phone number
    $username = $phone;

    // Insert data ke database
    $query = "INSERT INTO users (name, email, phone, username, password, group_id) VALUES ('$name', '$email', '$phone', '$username', '$password', 3)";
    mysqli_query($koneksi, $query);

    // Redirect ke halaman login atau halaman lain sesuai kebutuhan
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Include CSS and JS libraries -->
    <!-- Add links to your CSS and JS files -->
</head>

<body>
    <h2>Register</h2>
    <form action="" method="post">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        No. HP: <input type="text" name="phone" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
    <!-- Add additional styling and scripting as needed -->
</body>

</html>
