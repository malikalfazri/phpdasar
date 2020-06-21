<?php

session_start();



if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// pagination 
// jumlah data = total data / data perhalaman
// konfigurasi
$jumdataperhal = 3;
$jumdata = count(query("SELECT * FROM mahasiswa"));
$jumhal = ceil($jumdata / $jumdataperhal);
$halaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($jumdataperhal * $halaktif) - $jumdataperhal;


// ambil data / query
$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awaldata, $jumdataperhal");

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
    <input type="text" name="keyword" size="30" autofocus placeholder="Search..." autocomplete="off">
    <button type="submit" name="cari">Cari</button></form><br>

  <!-- navigasi -->
  <?php if ($halaktif > 1) : ?>
    <a href="?halaman=<?= $halaktif - 1; ?>">&laquo</a>
  <?php endif; ?>

  <?php for ($i = 1; $i <= $jumhal; $i++) : ?>
    <?php if ($i == $halaktif) : ?>

      <a href="?halaman=<?= $i; ?>" style="font-weight:bold ; color:red;"><?= $i; ?></a>
    <?php else : ?>
      <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>

    <?php endif; ?>
  <?php endfor; ?>

  <?php if ($halaktif < $jumhal) : ?>
    <a href="?halaman=<?= $halaktif + 1; ?>">&raquo</a>
  <?php endif; ?>

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
</body>

</html>