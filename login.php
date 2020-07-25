<?php

  require_once 'functions.php';

  if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {

    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE id=$id ");
    $row = mysqli_fetch_assoc($result);

    if( $key === hash('sha256', $row['username']) ) {

      $_SESSION['login'] = true;

    }
  }

  if( isset($_SESSION['login']) ) {

    header('Location: index.php');

  }

  if( isset($_POST['login']) ) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek akun
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    if( mysqli_num_rows($result) === 1 ) {

      $row = mysqli_fetch_assoc($result);

      if( password_verify($password, $row['password']) ) {

        $_SESSION['login'] = true;

        if( isset($_POST['remember']) ) {

          setcookie('id', $row['id'], time() + 60);
          setcookie('key', hash('sha256', $row['username']), time() + 60);

        }

        header('Location: index.php');

      } else {
        $error = true;
      }

    } else {
      echo "<script>
              alert('username anda belum terdaftar!');
            </script>";
    }

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk</title>
</head>
<body>
  <h1>Silahkan Login terlebih dahulu!</h1>
  <?php if( isset($error) ) : ?>
    <i style="color: red;">username / password anda salah!</i>
  <?php endif; ?>
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
        <input type="checkbox" name="remember" id="remember"><label for="remember">remember me</label>
      </li>
      <li>
        <button type="submit" name="login">Masuk</button>
      </li>
      <li>
        <a href="register.php"><i>don't have account?</i></a>
      </li>
    </ul>
  </form>
</body>
</html>