<?php

  require_once 'functions.php';

  if( isset($_GET['id']) ) {

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT gambar FROM siswa WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $gambar = $row['gambar'];

    unlink("img/$gambar");

    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");

    echo "<script>
            alert('Data berhasil dihapus!')
            document.location.href = 'index.php'
          </script>";

  } else {

    header('Location: index.php');exit;

  }

?>