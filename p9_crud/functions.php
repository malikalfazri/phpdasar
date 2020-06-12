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
  $gambar = htmlspecialchars($data["gambar"]);

  // query insert data
  $query = "INSERT INTO mahasiswa
              VALUES
              ('', '$nama', '$nobp', '$gambar')
              ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
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
  $gambar = htmlspecialchars($data["gambar"]);

  $query = "UPDATE mahasiswa
  SET
  nama = '$nama', 
   nobp = '$nobp', 
   gambar = '$gambar' WHERE id= $id
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
