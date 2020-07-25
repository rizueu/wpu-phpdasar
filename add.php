<?php

  require_once 'functions.php';

  if( isset($_POST['submit']) ) {

    if( addData($_POST) > 0 ) {

      echo "<script>
              alert('Data berhasil ditambahkan!')
              document.location.href = 'index.php'
            </script>";

    }

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data!</title>
</head>
<body>
  <h1>Halaman Tambah Data siswa.</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <ul>
      <li>
        <label for="nis">NIS :</label><br>
        <input type="text" name="nis" id="nis">
      </li>
      <li>
        <label for="nama_lengkap">Nama Lengkap :</label><br>
        <input type="text" name="nama_lengkap" id="nama_lengkap">
      </li>
      <li>
        <label for="email">Email :</label><br>
        <input type="text" name="email" id="email">
      </li>
      <li>
        <label for="jurusan">Jurusan :</label><br>
        <input type="text" name="jurusan" id="jurusan">
      </li>
      <li>
        <input type="file" name="gambar" id="gambar">
      </li>
      <li>
        <button type="submit" name="submit">Submit</button>
      </li>
    </ul>
  </form>
</body>
</html>