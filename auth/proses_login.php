<?php
session_start();
include "../config/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi,
    "SELECT * FROM users 
     WHERE username='$username' 
     AND password='$password'"
);

$data = mysqli_fetch_array($query);

if($data){
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];

    if($data['role'] == 'admin'){
        header("location:../admin/mobil.php");
    } else {
        header("location:../pelanggan/index.php");
    }
} else {
    echo "Login gagal!";
}
