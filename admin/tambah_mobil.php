<?php
include "../config/koneksi.php";

if(isset($_POST['simpan'])){
    $harga = $_POST['harga'];
    $hari  = $_POST['hari'];
    $total = $harga * $hari;

    mysqli_query($koneksi, "INSERT INTO mobil 
    (nama_mobil, merk, harga_sewa, hari_sewa, total_harga, status)
    VALUES (
        '$_POST[nama]',
        '$_POST[merk]',
        '$harga',
        '$hari',
        '$total',
        'tersedia'
    )");

    header("location:mobil.php");
}
?>

<h2>Tambah Mobil</h2>
<form method="post">
    Nama Mobil <input type="text" name="nama" required><br>
    Merk <input type="text" name="merk" required><br>
    Harga / Hari <input type="number" name="harga" required><br>
    Lama Sewa (Hari) <input type="number" name="hari" required><br>
    <button type="submit" name="simpan">Simpan</button>
</form>
