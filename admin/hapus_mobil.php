<?php
include "../config/koneksi.php";
mysqli_query($koneksi, "DELETE FROM mobil WHERE id='$_GET[id]'");
header("location:mobil.php");
