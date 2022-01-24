<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);
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
         <h1><a href="index.php">Supermoto Comeback</a></h1>
         <ul>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <li><a href="logout.php">keluar</a></li>
         </ul>
      </div>
   </header>

   <div class="search">
      <div class="container">
         <form action="produk.php">
            <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
            <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
            <input type="submit" name="cari" value="Cari Produk">
         </form>
      </div>
   </div>

   <div class="section">
      <div class="container">
         <h3>Detail Produk</h3>
         <div class="box">
            <div class="col-2">
               <img src="produk/<?php echo $p->product_image ?>" width="100%">
            </div>
            <div class="col-2">
               <h3><?php echo $p->product_name ?></h3>
               <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
               <p>Deskripsi : <br>
                  <?php echo $p->product_description ?>
               </p>
               <!-- <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, saya tertarik <?php echo $p->product_name ?>" target="_blank">Hubungi Via WA</a></p> -->
            </div>
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