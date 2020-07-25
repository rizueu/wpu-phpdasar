<?php

  require_once 'functions.php';

  if( !isset($_SESSION['login']) ) {

    header('Location: login.php');

  }

  $result = mysqli_query($conn, "SELECT * FROM siswa");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Siswa</title>
</head>
<body>
  <h1>Daftar Siswa</h1>

  <a style="font-weight: bold;" href="add.php">Tambah Data</a>
  <a style="font-weight: bold; color: blue; cursor:pointer;" id="keluar">Keluar</a>
  <br><br>

  <form action="" method="get">
    <input type="text" name="keyword" id="keyword" placeholder="ketikan keyword pencarian">
  </form>

  <br>
  <div id="container">
    <table border="1" cellspacing="0" cellpadding="10">
      <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>NIS</th>
        <th>Email</th>
        <th>Jurusan</th>
      </tr>
      <?php $i = 1; ?>
      <?php while( $siswa = mysqli_fetch_assoc($result) ) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td>
          <a href="edit.php?id=<?= $siswa['id'] ?>">Edit</a> | 
          <a href="delete.php?id=<?= $siswa['id'] ?>">Delete</a>
        </td>
        <td><img src="img/<?= $siswa['gambar'] ?>" alt="<?= $siswa['gambar'] ?>" width="60"></td>
        <td><?= $siswa['nama'] ?></td>
        <td><?= $siswa['nis'] ?></td>
        <td><?= $siswa['email'] ?></td>
        <td><?= $siswa['jurusan'] ?></td>
      </tr>
      <?php $i++; ?>
      <?php endwhile; ?>
    </table>
  </div>

  <script>
    let keluar = document.getElementById('keluar');
    let keyword = document.getElementById('keyword');
    let container = document.getElementById('container');

    keluar.addEventListener('click', () => {
      
      let k = confirm('Anda yakin ingin keluar?');
      if( k == true ) {
        document.location.href = 'logout.php';
      }
      
    });

    keyword.addEventListener('keyup', () => {

      const xhr = new XMLHttpRequest()
      
      xhr.onreadystatechange = () => {

        if( xhr.readyState == 4 && xhr.status == 200 ) {

          container.innerHTML = xhr.responseText;

        }

      }

      xhr.open("GET", `ajax/siswa.php?keyword=${keyword.value}`, true);
      xhr.send();

    });
  </script>
  <!-- <script src="js/script.js"></script> -->
</body>
</html>