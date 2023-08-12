<?php
require "config/main.php";

$user 	= $_POST['tUser'];
$pwd   	= $_POST['tPwd'];

$hasil  = $conn->query("SELECT * FROM users WHERE username='$user' AND password='$pwd'");

$hitung = $hasil->num_rows;
$data   = $hasil->fetch_assoc();

if ($hitung > 0){
	session_start();
	$_SESSION['username'] = $data['username'];
	$_SESSION['password'] = $data['password'];
	$_SESSION['nama'] = $data['nama'];
	
	header('Location:index.php');
}else{
   echo "<script>alert('GAGAL..!!!!!, Silakan Ulangi Lagi'); window.location = 'login.php'</script>";
}
?>