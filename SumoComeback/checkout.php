<?php
session_start();

// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);
if ($_SESSION['status_login_user'] != true) {
   echo '<script>window.location="index.php"</script>';
}

// if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
//    echo "<script>alert('Keranjang kosong, Silahkan belanja dulu');</script>";
//    echo "<script>location='halaman.php';</script>";
// }



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard | SupermotoComeback</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=UnifrakturMaguntia&display=swap" rel="stylesheet">
</head>

<body>
   <header>
      <div class="container">
         <h1><a href="halaman.php">Supermoto Comeback</a></h1>
         <ul>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <li><a href="logout.php">keluar</a></li>
      </div>
      </ul>
      </div>
   </header>

   <div class="section">
      <div class="container">
         <h3>Keranjang</h3>
         <div class="box">
            <table border="1" cellspacing="0" class="table">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Produk</th>
                     <th>Harga</th>
                     <th>Jumlah</th>
                     <th>Subharga</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $nomor = 1; ?>
                  <?php $totalbelanja = 0; ?>
                  <?php foreach ($_SESSION["keranjang"] as $product_id => $jumlah) : ?>
                     <?php
                     $ambil = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '$product_id' ");
                     $pecah = mysqli_fetch_assoc($ambil);
                     $subharga = $pecah["product_price"] * $jumlah;

                     ?>
                     <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["product_name"]; ?></td>
                        <td><?php echo number_format($pecah["product_price"]); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo number_format($subharga); ?></td>
                     </tr>
                     <?php $nomor++; ?>
                     <?php $totalbelanja += $subharga; ?>
                  <?php endforeach ?>
               </tbody>
               <tfoot>
                  <tr>
                     <th>Total belanja</th>
                     <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                  </tr>
               </tfoot>
               <p>Silahkan Screenshot keranjang belanja sebelum lanjut Checkout</p>
            </table>
            <a href="https://wa.wizard.id/fee4fa" target="_blank"><input type="submit" name="checkout" value="Checkout" class="btn"></a>
         </div>
      </div>
   </div>

   <!-- <div class="footer">
      <div class="container">
         <h4>Alamat</h4>
         <p><?php echo $a->admin_address ?></p>

         <h4>Email</h4>
         <p><?php echo $a->admin_email ?></p>

         <h4>No. Hp</h4>
         <p><?php echo $a->admin_telp ?></p>
         <small>Copyright &copy; 2021 - SupermotoComeback</small>
      </div>
   </div> -->


</body>

</html>