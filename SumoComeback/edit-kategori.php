<?php
include 'db.php';
session_start();
if ($_SESSION['status_login'] != true) {
   echo '<script>window.location="login.php"</script>';
}

$kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '" . $_GET['id'] . "' ");
if (mysqli_num_rows($kategori) == 0) {
   echo '<script>window.location="data-kategori.php"</script>';
}
$k = mysqli_fetch_object($kategori);

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
         <h3>Edit Data Kategori</h3>
         <div class="box">
            <form action="" method="POST">
               <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k->category_name ?>" required>
               <input type="submit" name="submit" value="Submit" class="btn">
            </form>
            <?php
            if (isset($_POST['submit'])) {
               $nama = ucwords($_POST['nama']);

               $update = mysqli_query($conn, "UPDATE tb_category SET
                                       category_name = '" . $nama . "'
                                       WHERE category_id = '" . $k->category_id . "' ");
               if ($update) {
                  echo '<script>alert("Edit data berhasil")</script>';
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