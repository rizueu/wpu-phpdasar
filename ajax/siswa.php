<?php

  require_once '../functions.php';

  $keyword = strip_tags($_GET['keyword']);

  $result = mysqli_query($conn, "SELECT * FROM siswa WHERE nama LIKE '%$keyword%' OR nis LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'");

?>
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