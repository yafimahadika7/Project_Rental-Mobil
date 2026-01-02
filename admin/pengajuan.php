<?php
session_start();
if($_SESSION['role'] != 'admin'){
    header("location:../auth/login.php");
    exit;
}

include "../config/koneksi.php";

$data = mysqli_query($koneksi,"
    SELECT p.*, m.nama_mobil
    FROM pengajuan p
    JOIN mobil m ON p.id_mobil = m.id
");
?>

<h2>Data Pengajuan Rental</h2>
<a href="mobil.php">Kembali</a>
<br><br>

<table border="1" cellpadding="5">
<tr>
    <th>Nama Customer</th>
    <th>Mobil</th>
    <th>Hari</th>
    <th>Total Harga</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php while($d=mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $d['nama_customer'] ?></td>
    <td><?= $d['nama_mobil'] ?></td>
    <td><?= $d['hari_sewa'] ?> Hari</td>
    <td>Rp <?= number_format($d['total_harga']) ?></td>
    <td><?= $d['status'] ?></td>
    <td>
        <?php if($d['status']=='menunggu'){ ?>
            <a href="approve.php?id=<?= $d['id'] ?>">Setujui</a> |
            <a href="tolak.php?id=<?= $d['id'] ?>">Tolak</a>
        <?php } ?>
    </td>
</tr>
<?php } ?>
</table>
