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
  <style>
    .loader {
      width: 150px;
      position: absolute;
      top: 95px;
      z-index: -1;
      left: 200px;
      display: none;



    }
  </style>

  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/script1.js"></script>
</head>

<body>
  <a href="logout.php">LOGOUT</a>
  <h1>Daftar Mahasiswa</h1>

  <a href="tambah.php">Tambah Data</a><br><br>

  <form action="" method="post">
    <input type="text" name="keyword" size="30" autofocus placeholder="Search..." autocomplete="off" id="keyword">
    <button type="submit" id="tombol-cari">cari</button><br><br>
    <img src="img/loader.gif" class="loader">

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




</body>

</html>