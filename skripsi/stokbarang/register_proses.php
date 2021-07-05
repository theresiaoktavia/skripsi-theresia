<?php 

require_once 'config.php';
require_once 'cek.php';

$username = $_POST['username'];
$nama_warung = $_POST['nama_warung'];
$email = $_POST['email'];
$password = $_POST['password'];

$register = mysqli_query($conn,"insert into user (username, email, nama_warung,password) values('$username','$email','$nama_warung',$password')");

if($register){
    header('location:login.php');
} else {
    echo 'Gagal';
    header('location:register.php');
}

?>