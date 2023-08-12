<?php 

if (isset($_GET['page'])) {
	switch ($_GET['page']) {
		case 'data_pembelian':
			$title = "Data Pembelian";
			break;
		case 'data_film':
			$title = "Data Film";
			break;
		case 'data_customer':
			$title = "Data Customer";
			break;
		case 'spk':
			$title = "Data SPK";
			break;
		
		default:
			$title = "Halaman Tidak Ditemukan";
			break;
	}
	echo $title;
}
else {
	echo "Halaman Utama";
}

 ?>