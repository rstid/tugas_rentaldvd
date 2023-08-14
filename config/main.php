<?php
$server = "localhost"; //nama server
$username = "rst"; // username 
$password = "Hujan404"; //  standarnya kosong
$database = "db_rentaldvd"; // buat nama database harus sama 

$conn = mysqli_connect($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>