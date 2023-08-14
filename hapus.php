<?php 
if (isset($_GET['hapus'])) {
	require_once "config/main.php";
	switch ($_GET['hapus']) {
		case 'data_customer':
			$conn->query("DELETE FROM customers WHERE id=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'data_kategori_film':
			$conn->query("DELETE FROM kategori_film WHERE id=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'data_film':
			$conn->query("DELETE FROM film WHERE id=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'data_teknisi':
			$conn->query("DELETE FROM teknisi1 WHERE id=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'spk':
			$conn->query("DELETE FROM teknisi WHERE id=".$_GET[id]);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'admin':
			$conn->query("DELETE FROM admin WHERE id=".$_GET[id]);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		
		default:
			require_once("pages/404.php");
			break;
	}
}
else {
	require_once("pages/home.php");
}

 ?>