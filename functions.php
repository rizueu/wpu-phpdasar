<?php

  session_start();

  $conn = mysqli_connect('localhost','root','','wpu-phpdasar');

  function query($query) {

    global $conn;
    $rows = [];

    $result = mysqli_query($conn, $query);

    while( $row = mysqli_fetch_assoc($result) ) {

      $rows[] = $row;

    }
    return $rows;

  }

  function signUp($method) {
    global $conn;

    $username = strip_tags($method['username']);
    $password = strip_tags($method['password']);
    $konfirmasiPassword = strip_tags($method['c_password']);

    // Cek password konfirmasi
    if( $password !== $konfirmasiPassword ) {

      echo "<script>
              alert('Konfirmasi Password tidak sesuai!')
            </script>";
      return false;

    }

    // Cek username
    // max character pada username
    if( strlen($username) > 16 ) {

      echo "<script>
              alert('Maksimal username adalah 16 karakter!')
            </script>";
      return false;

    }

    // cek username pada database
    $queryUsername = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    if( mysqli_num_rows($queryUsername) > 0 ) {

      echo "<script>
              alert('Username sudah terpakai!')
            </script>";
      return false;

    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    // Insert kedalam database
    mysqli_query($conn, "INSERT INTO user VALUES(null,'$username','$password')");
    return mysqli_affected_rows($conn);

  }

  function upload() {

    $namaGambar = $_FILES['gambar']['name'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    $error = $_FILES['gambar']['error'];
    $size = $_FILES['gambar']['size'];

    // Cek file yang di upload
    if( $error === 4 ) {

      echo "<script>
              alert('Anda belum mengisi gambar!')
            </script>";
      return false;

    }

    // Cek ekstensi file
    $validExtension = ['jpg','png','gif'];
    $ekstensiGambar = pathinfo($namaGambar, PATHINFO_EXTENSION);
    
    if( !in_array(strtolower($ekstensiGambar), $validExtension) ) {

      echo "<script>
              alert('Format file salah!')
            </script>";
      return false;

    }

    // Cek ukuran file
    if( $size > 1000000 ) {

      echo "<script>
              alert('Maksimal size file hanya 1Mb')
            </script>";
      return false;

    }

    // Acak nama file
    $namaGambar = uniqid();
    $namaGambar = $namaGambar . '.' . $ekstensiGambar;

    move_uploaded_file($tmpName, "img/$namaGambar");
    return $namaGambar;

  }

  function addData($method) {
    
    global $conn;

    $namaLengkap = strip_tags($method['nama_lengkap']);
    $nis = strip_tags($method['nis']);
    $email = strip_tags($method['email']);
    $jurusan = strip_tags($method['jurusan']);
    $namaGambar = upload();

    if( !$namaGambar ) {
      return false;
    }

    mysqli_query($conn, "INSERT INTO siswa VALUES(null, '$namaGambar', '$namaLengkap', '$nis', '$email', '$jurusan')");

    return mysqli_affected_rows($conn);

  }

  function edit($method, $id) {

    global $conn;

    $gambarLama = query("SELECT gambar FROM siswa WHERE id=$id")[0]['gambar'];

    if( $_FILES['gambar']['error'] === 4 ) {

      $gambar = $gambarLama;

    } else {
      unlink('img/'.$gambarLama);
      $gambar = upload();
    }

    $nama = strip_tags($_POST['nama_lengkap']);
    $nis = strip_tags($_POST['nis']);
    $email = strip_tags($_POST['email']);
    $jurusan = strip_tags($_POST['jurusan']);

    mysqli_query($conn, "UPDATE siswa SET gambar='$gambar', nama='$nama', nis='$nis', email='$email', jurusan='$jurusan' WHERE id=$id");

    return mysqli_affected_rows($conn);

  }

?>