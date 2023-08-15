<?php
if (isset($_GET['page']) | isset($_GET['action'])) {
    if (isset($_GET['page'])) {
        $pilihan = $_GET['page'];
    } else {
        $pilihan = $_GET['action'];
    }
    switch ($pilihan) {
        case 'data_rental':
            $title = 'Data Rental DVD';
            $name = 'Rental';
            $table = 'rental';
            $columnName = array('Film', 'Customers', 'Tanggal Pinjam', 'Tanggal Pengembalian', 'Status');
            $column = array('film_id', 'customers_id', 'start_date', 'end_date','return_status');
            break;
        case 'data_film':
            $title = 'Data Film';
            $name = 'Film';
            $table = 'film';
            $columnName = array('Gambar','Title', 'Deskripsi', 'Tahun Release', 'Rating', 'Kategori');
            $column = array('gambar_url', 'title', 'deskripsi', 'tahun_release', 'rating','kategori_film_id');
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
        case 'admin':
            $title = 'Data User';
            $name = 'Users';
            $table = 'users';
            $columnName = array('Username', 'Password','Role');
            $column = array('username', 'password', 'role');
            break;
    }
} else {
    echo "Tidak ditemukan";
}
?>