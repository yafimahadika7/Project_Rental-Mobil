<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'pelanggan'){
    header("location:../auth/login.php");
    exit;
}

include "../config/koneksi.php";

// Ambil ID mobil dari URL
$id_mobil = $_GET['id'];

// Ambil data mobil
$mobil = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM mobil WHERE id='$id_mobil'")
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajukan Rental Mobil</title>
</head>
<body>

<h2>Form Pengajuan Rental Mobil</h2>

<form method="post">
    <p>
        Nama Customer:<br>
        <input type="text" name="nama_customer" required>
    </p>

    <p>
        Mobil:<br>
        <b><?= htmlspecialchars($mobil['nama_mobil']) ?></b>
    </p>

    <p>
        Harga / Hari:<br>
        <b>Rp <?= number_format($mobil['harga_sewa']) ?></b>
    </p>

    <p>
        Lama Sewa (Hari):<br>
        <input type="number" name="hari" required>
    </p>

    <button type="submit" name="ajukan">Ajukan Rental</button>
</form>

<?php
if(isset($_POST['ajukan'])){
    $nama  = $_POST['nama_customer'];
    $hari  = $_POST['hari'];
    $total = $mobil['harga_sewa'] * $hari;

    mysqli_query($koneksi,"
        INSERT INTO pengajuan
        (nama_customer, hari_sewa, id_mobil, total_harga, status)
        VALUES ('$nama','$hari','$id_mobil','$total','menunggu')
    ");

    echo "<script>
        alert('Pengajuan berhasil, menunggu persetujuan admin');
        location='index.php';
    </script>";
}
?>

</body>
</html>
