<?php
// cek tombol submit ditekan atau belum
if (isset($_POST["submit"])) {
  //cek username & pasword
  if ($_POST["username"] == "admin" && $_POST["password"] == "123") {

    // benar, redirect ke hal admin
    header("Location: admin.php");
    exit;
  } else
    $error = true;
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>

  <h1>Login</h1>

  <?php if (isset($error)) : ?>
    <p style="color : red; font-style: italic;">username/password salah</p>
  <?php endif; ?>
  <ul>
    <form action="" method="POST">
      <li>
        <label for="usernm">Username</label>
        <input type="text" name="username" id="usernm">
      </li>
      <li><label>
          <label for="pass">Password</label>
          <input type="password" name="password" id="pass">
        </label></li>

      <li><button type="submit" name="submit">Login</button></li>
    </form>
  </ul>
</body>

</html>