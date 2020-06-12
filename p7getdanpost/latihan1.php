<?php
// variable scope / lingkup variable

// variable superglobals
// variable global milik php
// merupakan array associative

// $_GET
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
  <ul>
    <?php foreach ($mahasiswa as $mhs) : ?>
      <li>
        <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nobp=<?= $mhs["nobp"]; ?>"><?= $mhs["nama"]; ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</body>

</html>