<?php
include "../config/koneksi.php";
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mobil WHERE id='$_GET[id]'"));

if(isset($_POST['update'])){
    $harga = $_POST['harga'];
    $hari  = $_POST['hari'];
    $total = $harga * $hari;

    mysqli_query($koneksi, "UPDATE mobil SET
        nama_mobil='$_POST[nama]',
        merk='$_POST[merk]',
        harga_sewa='$harga',
        hari_sewa='$hari',
        total_harga='$total',
        status='$_POST[status]'
        WHERE id='$_GET[id]'
    ");
    header("location:mobil.php");
}

?>

<h2>Edit Mobil</h2>
<form method="post">
    Nama <input type="text" name="nama" value="<?= $data['nama_mobil'] ?>"><br>
    Merk <input type="text" name="merk" value="<?= $data['merk'] ?>"><br>
   Harga <input type="number" name="harga" value="<?= $data['harga_sewa'] ?>"><br>
    Hari <input type="number" name="hari" value="<?= $data['hari_sewa'] ?>"><br>

    Status 
    <select name="status">
        <option value="tersedia">Tersedia</option>
        <option value="disewa">Disewa</option>
    </select><br>
    <button name="update">Update</button>
</form>
