<?php
include "../config/koneksi.php";

$id = $_GET['id'];

$pengajuan = mysqli_fetch_assoc(
    mysqli_query($koneksi,"SELECT * FROM pengajuan WHERE id='$id'")
);

mysqli_query($koneksi,"
    UPDATE pengajuan SET status='disetujui' WHERE id='$id'
");

mysqli_query($koneksi,"
    UPDATE mobil SET status='disewa' WHERE id='{$pengajuan['id_mobil']}'
");

header("location:pengajuan.php");
