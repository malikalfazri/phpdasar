<?php

require 'functions.php';
// ambil data / query
$mahasiswa = query("SELECT * FROM mahasiswa");

// ambil data (fecth) dari object result
// mysqli_fetch_row() // mengembalikan array numeric
// mysqli_fetch_assoc() // array assosiativ
// mysqli_fetch_array() // array numerik & assoc  
// mysqli_fetch_object()

// while ($mhs = mysqli_fetch_assoc($result)) {
//   var_dump($mhs);
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>

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
          <a href="">ubah</a> |
          <a href="">hapus</a></td>
        <td><img src="img/<?php echo $row["gambar"] ?>" width="60" alt=""></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["nobp"]; ?></td>
      </tr>
      <?php $i++; ?>
    <?php endforeach; ?>
  </table>
</body>

</html>