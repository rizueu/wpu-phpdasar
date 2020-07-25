<?php

  require_once 'functions.php';

  if( isset($_POST['signup']) ) {

    if( signUp($_POST) > 0 ) {

      echo "<script>
              alert('Pendaftaran anda berhasil!')
              document.location.href = 'login.php'
            </script>";

    }

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar</title>
</head>
<body>
  <h1>Halaman Daftar account.</h1>
  
  <form action="" method="post">
    <ul>
      <li>
        <label for="username">Username :</label><br>
        <input type="text" name="username" id="username">
      </li>
      <li>
        <label for="password">Password :</label><br>
        <input type="password" name="password" id="password">
      </li>
      <li>
        <label for="c_password">Konfirmasi Password :</label><br>
        <input type="password" name="c_password" id="c_password">
      </li>
      <li>
        <button type="submit" name="signup">Daftar</button>
      </li>
      <li>
        <a href="login.php"><i>already have account?</i></a>
      </li>
    </ul>
  </form>
</body>
</html>