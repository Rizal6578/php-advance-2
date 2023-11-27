<?php
include 'koneksi.php';

session_start();

// Jika user belum login, redirect ke halaman login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Tampilkan waktu server pada navbar
echo "Waktu Server: " . date("l, d F Y H:i:s");
?>

<!-- Tampilkan statistik sederhana -->
<div>Total Produk: <?php echo $row_products['total_products']; ?></div>
<div>Total Pelanggan: <?php echo $row_customers['total_customers']; ?></div>
<div>Total Vendor: <?php echo $row_vendors['total_vendors']; ?></div>

<!-- Add additional content of the dashboard -->
