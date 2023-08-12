<?php
if (isset($_GET['page']) | isset($_GET['action'])) {
    if (isset($_GET['page'])) {
        $pilihan = $_GET['page'];
    } else {
        $pilihan = $_GET['action'];
    }
    switch ($pilihan) {
        case 'data_rental':
            $title = 'Data Rental';
            $name = 'Rental';
            $table = 'rental';
            $columnName = array('Film', 'Customer', 'Tanggal Pinjam', 'Tanggal Pengembalian', 'Status');
            $column = array('film_id', 'customer_id', 'start_date', 'end_date','return_status');
            break;
        case 'data_film':
            $title = 'Data Film';
            $name = 'Film';
            $table = 'film';
            $columnName = array('Title', 'Deskripsi', 'Tahun Release', 'Rating', 'Kategori', 'Gambar');
            $column = array('title', 'deskripsi', 'tahun_release', 'rating','kategori_film_id', 'gambar_url');
            break;
        case 'data_kategori_film':
            $title = 'Data Kategori Film';
            $name = 'Kategori Film';
            $table = 'kategori_film';
            $columnName = array('Nama', 'Keterangan');
            $column = array('nama', 'keterangan');
            break;
        case 'data_customer':
            $title = 'Data Customers';
            $name = 'Customer';
            $table = 'customers';
            $columnName = array('Nama Depan', 'Nama Belakang', 'Email', 'Alamat');
            $column = array('nama_depan', 'nama_belakang', 'email', 'alamat');
            break;
    }
} else {
    echo "Tidak ditemukan";
}
?>