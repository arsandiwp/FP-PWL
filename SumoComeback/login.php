<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login | SupermotoComeback</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=UnifrakturMaguntia&display=swap" rel="stylesheet">
</head>

<body>
   <section>
      <div class="imgbox">
         <img src="image/logo.jpg" alt="">
      </div>
      <div class="contentbox">
         <div class="formbox">
            <h2>Login</h2>
            <form action="" method="POST">
               <div class="inputbox">
                  <span>Username</span>
                  <input type="text" name="user">
               </div>
               <div class="inputbox">
                  <span>Password</span>
                  <input type="password" name="pass">
               </div>
               <div class="inputbox">
                  <input type="submit" value="Sign in" name="submit">
               </div>
            </form>
            <h3>Social Media</h3>
            <ul class="sci">
               <li><a href="https://www.instagram.com/supermotocomeback/" target="_blank"><i class="fab fa-instagram fa-lg"></i></a></li>
               <li><a href="https://www.facebook.com/supermoto.comeback" target="_blank"><i class="fab fa-facebook fa-lg"></i></a></li>
               <li><a href="https://shopee.co.id/supermotocomebackstore?categoryId=100011&itemId=4584539178" target="_blank"><i class="fas fa-shopping-cart fa-lg"></i></a></li>
            </ul>
         </div>
      </div>
      <?php
      if (isset($_POST['submit'])) {
         session_start();
         include 'db.php';

         $user = mysqli_real_escape_string($conn, $_POST['user']);
         $pass = mysqli_real_escape_string($conn, $_POST['pass']);

         $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '" . $user . "' AND password = '" . MD5($pass) . "'");
         if (mysqli_num_rows($cek) > 0) {
            $d = mysqli_fetch_object($cek);
            $_SESSION['status_login'] = true;
            $_SESSION['a_global'] = $d;
            $_SESSION['id'] = $d->admin_id;
            echo '<script>window.location="dashboard.php"</script>';
         } else {
            echo '<script>alert("Username atau Password Anda Salah!")</script>';
         }
      }

      ?>
   </section>
</body>

</html>