<?php
include "../config/koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"
    UPDATE pengajuan SET status='ditolak' WHERE id='$id'
");

header("location:pengajuan.php");
