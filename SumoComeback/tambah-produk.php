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
   <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
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
         <h3>Tambah Data Produk</h3>
         <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
               <select class="input-control" name="kategori" required>
                  <option value="">--Pilih--</option>
                  <?php
                  $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                  while ($r = mysqli_fetch_array($kategori)) {

                  ?>
                     <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                  <?php } ?>
               </select>

               <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
               <input type="text" name="harga" class="input-control" placeholder="Harga" required>
               <input type="file" name="gambar" class="input-control" required>
               <textarea name="deskripsi" class="input-control" placeholder="Deskripsi"></textarea><br><br>
               <select name="status" class="input-control">
                  <option value="">--Pilih--</option>
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
               </select>
               <input type="submit" name="submit" value="Submit" class="btn">
            </form>
            <?php
            if (isset($_POST['submit'])) {

               // menampung inputan
               $kategori = $_POST['kategori'];
               $nama = $_POST['nama'];
               $harga = $_POST['harga'];
               $deskripsi = $_POST['deskripsi'];
               $status = $_POST['status'];

               //menampung data file yang diupload
               $filename = $_FILES['gambar']['name'];
               $tmp_name = $_FILES['gambar']['tmp_name'];

               $type1 = explode('.', $filename);
               $type2 = $type1[1];

               $newname = 'produk' . time() . '.' . $type2;

               // menampung data format file yang diizinkan
               $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

               //validasi format file
               if (!in_array($type2, $tipe_diizinkan)) {
                  // jika format file tidak ada
                  echo '<script>alert("Format file tidak diizinkan")</script>';
               } else {
                  // jiak format file sesuia dengan yang ada
                  // proses upload file sekaligus insert
                  move_uploaded_file($tmp_name, './produk/' . $newname);

                  $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                              null,
                              '" . $kategori . "',
                              '" . $nama . "',
                              '" . $harga . "',
                              '" . $deskripsi . "',
                              '" . $newname . "',
                              '" . $status . "',
                              null
                  ) ");

                  if ($insert) {
                     echo '<script>alert("Tambah data berhasil")</script>';
                     echo '<script>window.location="data-produk.php"</script>';
                  } else {
                     echo 'Gagal' . mysqli_error($conn);
                  }
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
   <script>
      CKEDITOR.replace('deskripsi');
   </script>
</body>

</html>