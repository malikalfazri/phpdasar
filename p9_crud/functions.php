<?php
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  //ambil data dari tiap elemen dalam form
  global $conn;
  $nama = htmlspecialchars($data["nama"]);
  $nobp = htmlspecialchars($data["nobp"]);

  // upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  // query insert data
  $query = "INSERT INTO mahasiswa
              VALUES
              ('', '$nama', '$nobp', '$gambar')
              ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function upload()
{
  $namafile = $_FILES['gambar']['name'];
  $ukuranfile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tempname = $_FILES['gambar']['tmp_name'];

  if ($error === 4) {
    echo "<script>
        alert('pilih gambar!');
        </script>";
    return false;
  }

  //cek gambar atau tidak
  $eksgambarvalid = ['jpg', 'jpeg', 'png'];
  $ekstensigambar = explode('.', $namafile);
  $ekstensigambar = strtolower(end($ekstensigambar));
  if (!in_array($ekstensigambar, $eksgambarvalid)) {
    echo "<script>
          alert('Bukan Gambar!');
          </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if ($ukuranfile > 1000000) {
    echo "<script>
          alert('Ukuran Gambar terlalu besar!');
          </script>";
    return false;
  }
  // generate nama gambar baru
  $namafilebaru = uniqid();
  $namafilebaru .= '.';
  $namafilebaru .= $ekstensigambar;


  // lolos pengecekan, gambar diupload
  move_uploaded_file($tempname, 'img/' . $namafilebaru);
  return $namafilebaru;
}


function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM mahasiswa where id = $id");

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;
  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $nobp = htmlspecialchars($data["nobp"]);
  $gambarlama = htmlspecialchars($data["gambarlama"]);

  // cek apakah user pilih gambar baru


  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarlama;
  } else {
    $gambar = upload();
  }
  $query = "UPDATE mahasiswa
  SET
  nama = '$nama', 
   nobp = '$nobp', 
   gambar = '$gambar' WHERE id= $id
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cari($key)
{
  $query = "SELECT * FROM mahasiswa
              WHERE
             nama LIKE '%$key%' OR
             nobp LIKE '%$key' ;
            ";

  return query($query);
}
