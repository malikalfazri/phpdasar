<?php
sleep(1);
require '../p9.._crudlivesearch/functions.php';

$keyword = $_GET["keyword"];
$query = "SELECT * FROM mahasiswa WHERE
nama LIKE '%$keyword%' OR
nobp LIKE '%$keyword%'  
";

$mahasiswa = query($query);

?>

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