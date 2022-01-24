<?php
session_start();
include 'db.php';
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
         <h3>Data Kategori</h3>
         <div class="box">
            <p><a href="tambah-kategori.php">Tambah Data</a></p>
            <table border="1" cellspacing="0" class="table">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Kategori</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $no = 1;
                  $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                  if (mysqli_num_rows($kategori) > 0) {
                     while ($row = mysqli_fetch_array($kategori)) {

                  ?>
                        <tr>
                           <td><?php echo $no++ ?></td>
                           <td><?php echo $row['category_name'] ?></td>
                           <td>
                              <a href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> || <a href="hapus-kategori.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</a>
                           </td>
                        </tr>
                     <?php }
                  } else { ?>
                     <tr>
                        <td colspan="3">tidak ada data</td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
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