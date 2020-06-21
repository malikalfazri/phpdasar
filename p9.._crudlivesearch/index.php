<?php

session_start();



if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';



// ambil data / query
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari diklik
if (isset($_POST["cari"])) {
  $mahasiswa = cari($_POST['keyword']);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
</head>

<body>
  <a href="logout.php">LOGOUT</a>
  <h1>Daftar Mahasiswa</h1>

  <a href="tambah.php">Tambah Data</a><br><br>

  <form action="" method="post">
    <input type="text" name="keyword" size="30" autofocus placeholder="Search..." autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari</button></form><br>


  <div id="container">
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Nobp</th>
      </tr>

      <?php $i = 1;  ?>
      <?php foreach ($mahasiswa as $row) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a></td>
          <td><img src="img/<?php echo $row["gambar"] ?>" width="50"></td>
          <td><?= $row["nama"]; ?></td>
          <td><?= $row["nobp"]; ?></td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    </table>
  </div>
  <script src="../js/script.js">

  </script>


</body>

</html>