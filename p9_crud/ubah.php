<?php

require 'functions.php';
// ambil id di url
$id = $_GET["id"];

// query data mhs berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id= $id")[0];



if (isset($_POST["ubah"])) {
  if (ubah($_POST) > 0) {
    echo "
    <script>
    alert('Data berhasil diybah');
    document.location.href = 'index.php';
    </script>";
  } else {
    echo "
    <script>
    alert('Data gagal diubah');
     
    </script>";
    echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data</title>
</head>

<body>
  <h1>Ubah Data Mahasiswa</h1>

  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <input type="hidden" name="gambarlama" value="<?= $mhs['gambar']; ?>">
    <ul>
      <li>
        <label for="nama">Nama :</label>
        <input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>">
      </li>
      <li>
        <label for="nobp">NoBp :</label>
        <input type="text" name="nobp" id="nobp" value="<?= $mhs["nobp"]; ?>">
      </li>
      <li>
        <label for="gambar">Gambar :</label><br>
        <img src="img/<?= $mhs["gambar"]; ?>" width="80" alt=""><br>
        <input type="file" name="gambar" id="gambar"> </li>
      <li>
        <button type="submit" name="ubah">Ubah</button>
      </li>
    </ul>
  </form>
</body>

</html>