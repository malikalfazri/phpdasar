<?php
// pengulangan pada array
// for / foreach
$angka = [2, 3, 1, 5, 1, 6, 3, 4, 6, 7, 10, 9];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>latihan 2</title>
  <style>
    .kotak {
      width: 50px;
      height: 50px;
      background-color: salmon;
      text-align: center;
      line-height: 50px;
      margin: 3px;
      float: left;
      transition: 1s;
    }

    .kotak:hover {
      transform: rotate(360deg);
      border-radius: 60%;
    }

    .clear {
      clear: both;
    }
  </style>
  </h ead>

<body>

  <?php for ($i = 0; $i < count($angka); $i++) {
  ?>
    <div class="kotak"><?= $angka[$i]; ?></div>
  <?php  } ?>

  <div class="clear">
  </div>

  <?php foreach ($angka as $a) { ?>
    <div class="kotak"><?= $a; ?></div>
  <?php } ?>

  <div class="clear"></div>

  <?php foreach ($angka as $a) : ?>
    <div class="kotak"><?php echo $a ?></div>
  <?php endforeach; ?>
</body>

</html>