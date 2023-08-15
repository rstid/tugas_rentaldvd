<?php 
require_once "config/main.php";
$type = trim($_POST['type']);
$cmd = trim($_POST['cmd']);

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo $output;
}

switch ($type) {
	case 'data_customer':
		if ($cmd=="tambah") {
			$stmt = $conn->prepare("INSERT INTO customers (nama_depan, nama_belakang, alamat, telepon, email) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $_POST['nama_depan'], $_POST['nama_belakang'], $_POST['alamat'], $_POST['telepon'], $_POST['email']);
            $stmt->execute();
            $stmt->close();
		}
		elseif($cmd=="edit") {
			$stmt = $conn->prepare("UPDATE customers SET nama_depan=?, nama_belakang=?, alamat=?, telepon=?, email=? WHERE id=?");
            $stmt->bind_param("sssssi", $_POST['nama_depan'], $_POST['nama_belakang'], $_POST['alamat'], $_POST['telepon'], $_POST['email'], $_POST['id']);
            $stmt->execute();
            $stmt->close();
		}
		else {
			die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
		}
		header('Location:index.php?page=data_customer');
		break;
	// Methods Untuk Data Kategori Film
	case 'data_kategori_film':
		if ($cmd=="tambah") {
			$stmt = $conn->prepare("INSERT INTO kategori_film (nama, keterangan) VALUES (?, ?)");
            $stmt->bind_param("ss", $_POST['nama'], $_POST['keterangan']);
            $stmt->execute();
            $stmt->close();
		} elseif ($cmd=="edit") {
			$stmt = $conn->prepare("UPDATE kategori_film SET nama=?, keterangan=? WHERE id=?");
            $stmt->bind_param("ssi", $_POST['nama'], $_POST['keterangan'],  $_POST['id']);
            $stmt->execute();
            $stmt->close();
		} else {
			die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
		}
		header('Location:index.php?page=data_kategori_film');
		break;

	case 'data_film':
		if ($cmd=="tambah") {
			$stmt = $conn->prepare("INSERT INTO film (title, deskripsi, tahun_release, rating, kategori_film_id, gambar_url) VALUES (?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("ssssss", $_POST['title'], $_POST['deskripsi'], $_POST['tahun_release'], $_POST['rating'], $_POST['kategori_film_id'], $_POST['gambar_url']);
			$stmt->execute();
            $stmt->close();
		} elseif ($cmd=="edit") {
			$stmt = $conn->prepare("UPDATE film SET title=?, deskripsi=?, tahun_release=?, rating=?, kategori_film_id=?, gambar_url=? WHERE id=?");
            $stmt->bind_param("ssssssi", $_POST['title'], $_POST['deskripsi'], $_POST['tahun_release'], $_POST['rating'], $_POST['kategori_film_id'], $_POST['gambar_url'], $_POST['id']);
            $stmt->execute();
            $stmt->close();
		} else {
			die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
		}
		header('Location:index.php?page=data_film');
		break;
	
	case 'data_rental':
		if ($cmd=="tambah") {
			$stmt = $conn->prepare("INSERT INTO rental (film_id, customers_id, start_date, end_date) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $_POST['film'], $_POST['customers'], $_POST['start_date'], $_POST['end_date']);
			$stmt->execute();
            $stmt->close();
		} elseif ($cmd=="edit") {
			$stmt = $conn->prepare("UPDATE rental SET film_id=?, customer_id=?, start_date=?, end_date=? WHERE id=?");
            $stmt->bind_param("ssssi", $_POST['film_id'], $_POST['customer_id'], $_POST['start_date'], $_POST['end_date'], $_POST['id']);
            $stmt->execute();
            $stmt->close();
		} else {
			die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
		}
		header('Location:index.php?page=data_rental');
		break;

	case 'admin':
		if ($cmd=="tambah") {
			mysql_query("INSERT INTO admin(nama,username,password)
			VALUES('$_POST[nama]',
			'$_POST[username]',
			'$_POST[password]')");
		}
		elseif($cmd=="edit") {
			mysql_query("UPDATE admin SET nama='$_POST[nama]',
				username='$_POST[username]',
				password='$_POST[password]'
				WHERE id=".$_POST[id]);
			
		}
		else {
			die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
		}
		header('Location:index.php?page=admin');
		break;
	
	default:
		require_once("pages/404.php");
		break;
}

 ?>