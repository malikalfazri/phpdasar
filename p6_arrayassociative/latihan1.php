<?php
// array associative = keynya string yang dibuat sendiri
$mahasiswa = [
  [
    "nama" => "Ikhsan",
    "nobp" => "1803"
  ],
  [
    "nama" => "rizal",
    "nobp" => "1802"
  ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>
  <?php foreach ($mahasiswa as $mhs) : ?>
    <ul>
      <li><?= $mhs["nama"]; ?></li>
      <li><?= $mhs["nobp"]; ?></li>
    </ul>
  <?php endforeach; ?>
</body>

</html>