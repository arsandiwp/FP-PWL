<?php
session_start();
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);
if ($_SESSION['status_login_user'] != true) {
   echo '<script>window.location="index.php"</script>';
}
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

   <div class="search">
      <div class="container">
         <form action="produk.php">
            <input type="text" name="search" placeholder="Cari Produk">
            <input type="submit" name="cari" value="Cari Produk">
         </form>
      </div>
   </div>

   <div class="section">
      <div class="container">
         <h3>Kategori</h3>
         <div class="box">
            <?php
            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
            if (mysqli_num_rows($kategori) > 0) {
               while ($k = mysqli_fetch_array($kategori)) {
            ?>
                  <a href="produk.php?kat=<?php echo $k['category_id'] ?>">
                     <div class="col-5">
                        <span><i class="fas fa-list fa-3x" style="margin-bottom:10px;"></i></span>
                        <p><?php echo $k['category_name'] ?></p>
                     </div>
                  </a>
               <?php }
            } else { ?>
               <p>Kategori tidak ada</p>
            <?php } ?>
         </div>
      </div>
   </div>

   <div class="section">
      <div class="container">
         <h3>Produk Terbaru</h3>
         <div class="box">
            <?php
            $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
            if (mysqli_num_rows($produk) > 0) {
               while ($p = mysqli_fetch_array($produk)) {
            ?>
                  <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                     <div class="col-4">
                        <img src="produk/<?php echo $p['product_image'] ?>">
                        <p class="nama"><?php echo $p['product_name'] ?></p>
                        <p class="harga">Rp. <?php echo $p['product_price'] ?></p>
                        <p><a href="beli.php?id=<?php echo $p['product_id']; ?>"><input type="submit" name="beli" value="Beli" class="btn"></a></p>
                     </div>
                  </a>
               <?php }
            } else { ?>
               <p>Produk tidak ada</p>
            <?php } ?>
         </div>
      </div>
   </div>

   <div class="footer">
      <div class="container">
         <h4>Alamat</h4>
         <p><?php echo $a->admin_address ?></p>

         <h4>Email</h4>
         <p><?php echo $a->admin_email ?></p>

         <h4>No. Hp</h4>
         <p><?php echo $a->admin_telp ?></p>
         <small>Copyright &copy; 2021 - SupermotoComeback</small>
      </div>
   </div>


</body>

</html>