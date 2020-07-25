<?php

  require_once 'functions.php';

  $id = $_GET['id'];

  $siswa = query("SELECT * FROM siswa WHERE id=$id")[0];

  if( isset($_POST['submit']) ) {

    if( edit($_POST, $id) > 0 ) {

      echo "<script>
              alert('Data berhasil terupdate!')
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
  <title>Rubah Data "<?= $siswa['nama'] ?>"</title>
</head>
<body>
  <h1>Halaman Rubah Data siswa.</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <ul>
      <li>
        <label for="nis">NIS :</label><br>
        <input type="text" name="nis" id="nis" value="<?= $siswa['nis'] ?>">
      </li>
      <li>
        <label for="nama_lengkap">Nama Lengkap :</label><br>
        <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?= $siswa['nama'] ?>">
      </li>
      <li>
        <label for="email">Email :</label><br>
        <input type="text" name="email" id="email" value="<?= $siswa['email'] ?>">
      </li>
      <li>
        <label for="jurusan">Jurusan :</label><br>
        <input type="text" name="jurusan" id="jurusan" value="<?= $siswa['jurusan'] ?>">
      </li>
      <li>
        <img src="img/<?= $siswa['gambar'] ?>" alt="<?= $siswa['gambar'] ?>" width="100"><br>
        <input type="file" name="gambar" id="gambar">
      </li>
      <li>
        <button type="submit" name="submit">Submit</button>
      </li>
    </ul>
  </form>
</body>
</html>