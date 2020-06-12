<?php

require 'functions.php';

if (isset($_POST["submit"])) {
  if (tambah($_POST) > 0) {
    echo "
    <script>
    alert('Data berhasil ditambahkan');
    document.location.href = 'index.php';
    </script>";
  } else {
    echo "
    <script>
    alert('Data gagal ditambahkan');
    
    </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
</head>

<body>
  <h1>Tambah Data Mahasiswa</h1>

  <form action="" method="POST">
    <ul>
      <li>
        <label for="nama">Nama :</label>
        <input type="text" name="nama" required>
      </li>
      <li>
        <label for="nobp">NoBp :</label>
        <input type="text" name="nobp">
      </li>
      <li>
        <label for="gambar">Gambar :</label>
        <input type="text" name="gambar"> </li>
      <li>
        <button type="submit" name="submit">Simpan</button>
      </li>
    </ul>
  </form>
</body>

</html>