<?php
session_start();

$product_id = $_GET['id'];


if (isset($_SESSION['keranjang'][$product_id])) {
   $_SESSION['keranjang'][$product_id] += 1;
} else {
   $_SESSION['keranjang'][$product_id] = 1;
}

echo "<script>alert('Produk telah masuk ke keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
