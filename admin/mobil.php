`<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("location:../auth/login.php");
    exit;
}

include "../config/koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM mobil");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mobil</title>
</head>
<body>

<h2>Data Mobil</h2>

<a href="tambah_mobil.php">Tambah Mobil</a> |
<a href="../auth/logout.php">Logout</a>

<br><br>

<table border="1" cellpadding="5" cellspacing="0">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Merk</th>
    <th>Harga / Hari</th>
    <th>Hari</th>
    <th>Total Harga</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
while($d = mysqli_fetch_assoc($data)){
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($d['nama_mobil']) ?></td>
    <td><?= htmlspecialchars($d['merk']) ?></td>
    <td>Rp <?= number_format($d['harga_sewa']) ?></td>
    <td><?= $d['hari_sewa'] ?> Hari</td>
    <td>Rp <?= number_format($d['total_harga']) ?></td>
    <td><?= $d['status'] ?></td>
   <td>
    <td>
    <a href="edit_mobil.php?id=<?= $d['id'] ?>">Edit</a> |
    <a href="pengajuan.php">Approval Rental</a> |
    <a href="hapus_mobil.php?id=<?= $d['id'] ?>"
       onclick="return confirm('Yakin ingin menghapus data?')">
       Hapus
    </a>
</td>


</tr>
<?php } ?>

</table>

</body>
</html>
`