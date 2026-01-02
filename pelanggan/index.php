<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'pelanggan'){
    header("location:../auth/login.php");
    exit;
}

include "../config/koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM mobil WHERE status='tersedia'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mobil</title>
</head>
<body>

<h2>Daftar Mobil Tersedia</h2>
<a href="../auth/logout.php">Logout</a>

<br><br>

<table border="1" cellpadding="5" cellspacing="0">
<tr>
    <th>Nama</th>
    <th>Merk</th>
    <th>Harga / Hari</th>
    <th>Aksi</th>
</tr>

<?php while($d = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $d['nama_mobil'] ?></td>
    <td><?= $d['merk'] ?></td>
    <td>Rp <?= number_format($d['harga_sewa']) ?></td>
    <td>
        <a href="ajukan_sewa.php?id=<?= $d['id'] ?>">
            Ajukan Rental
        </a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
