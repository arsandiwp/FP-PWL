<?php
include 'db.php';
session_start();
if ($_SESSION['status_login'] != true) {
   echo '<script>window.location="login.php"</script>';
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
</head>

<body>
   <header>
      <div class="container">
         <h1><a href="dashboard.php">Supermoto Comeback</a></h1>
         <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-kategori.php">Data Kategori</a></li>
            <li><a href="data-produk.php">Data Produk</a></li>
            <li><a href="keluar.php">Keluar</a></li>
         </ul>
      </div>
   </header>

   <div class="section">
      <div class="container">
         <h3>Tambah Data Kategori</h3>
         <div class="box">
            <form action="" method="POST">
               <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
               <input type="submit" name="submit" value="Submit" class="btn">
            </form>
            <?php
            if (isset($_POST['submit'])) {
               $nama = ucwords($_POST['nama']);

               $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
                           null,
                           '" . $nama . "') ");
               if ($insert) {
                  echo '<script>alert("Tambah data berhasil")</script>';
                  echo '<script>window.location="data-kategori.php"</script>';
               } else {
                  echo 'gagal' . mysqli_error($conn);
               }
            }

            ?>
         </div>
      </div>
   </div>

   <footer>
      <div class="container">
         <small>Copyright &copy; 2021 - SupermotoComeback</small>
      </div>
   </footer>
</body>

</html>