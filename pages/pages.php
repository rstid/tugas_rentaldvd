<?php
require_once 'config/main.php';
require_once 'get_data.php';

$query = $conn->query("SELECT * FROM $table");

?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title"><?php echo $title ?> ( Terdapat <?php echo $query->num_rows; ?> Data)</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
	<!-- Cek apakah login atau tidak -->
    <?php if (isset($_SESSION['username'])): ?>
    <a href="index.php?action=<?php echo $_GET['page']; ?>&action_name=tambah" style="margin-bottom: 10px;" class="btn btn-md btn-primary"> <i class="fa fa-plus"></i> Tambah Data <?php echo $name ?> </a>
    <?php endif; ?>
	<!-- END Check Login -->
    <br>
		<table class="table table-bordered" id="tabel">
		<thead>
			<tr>
            <th>NO</th>
            <?php
                if($_GET['page'] == 'data_film') {
                    echo '<th>Gambar</th>';
                    echo '<th>Title</th>';
                    echo '<th>Deskripsi</th>';
                    echo '<th>Tahun Release</th>';
                    echo '<th>Rating</th>';
                    echo '<th>Kategori</th>';
                } elseif ($_GET['page'] == 'data_rental') {
                    echo '<th>Film</th>';
                    echo '<th>Customers</th>';
                    echo '<th>Tanggal Pinjam</th>';
                    echo '<th>Tanggal Pengembalian</th>';
                    echo '<th>Status</th>';
                } else {
                    if (isset($columnName)) {
                        foreach($columnName as $colName) {
                            echo '<th>'.$colName.'</th>';
                        }
                    }
                }
            ?>
		    <?php if (isset($_SESSION['username'])): ?>
		    <th></th>
			<?php endif; ?>
		  </tr>
		</thead>
		<tbody>
		<?php
		  $no=1;
		  while($q=$query->fetch_assoc()){
		?>
            <tr>
                <td><?php echo $no++; ?></td> 
                <?php
                    if($_GET['page'] == 'data_film') {
                        echo '<td><img src="'.$q['gambar_url'].'" alt="gambar" width="100" height="150"</td>';
                        echo '<td>'.$q['title'].'</td>';
                        echo '<td>'.$q['deskripsi'].'</td>';
                        echo '<td>'.$q['tahun_release'].'</td>';
                        echo '<td>'.$q['rating'].'</td>';
                        if(isset($q['kategori_film_id'])) {
                            $kategoriQuery = $conn->query("SELECT * FROM kategori_film WHERE id = " . $q['kategori_film_id']);
                            $kategoriData = $kategoriQuery->fetch_assoc();
                            echo '<td><span class="badge">'.$kategoriData['nama'].'</span></td>';
                        } else {
                            echo '<td>Non-Kategori</td>';
                        }
                        
                    } elseif($_GET['page'] == 'data_rental') {
                        // Film
                        if(isset($q['film_id'])) {
                            $getFilm = $conn->query("SELECT * FROM film WHERE id = " . $q['film_id']);
                            $dataFilm = $getFilm->fetch_assoc();
                            echo '<td><img src="'.$dataFilm['gambar_url'].'" alt="gambar" width="100" height="150"</td>';
                        } else {
                            echo '<td>Tidak ada Film</td>';
                        }
                        if(isset($q['customers_id'])) {
                            $getFilm = $conn->query("SELECT * FROM customers WHERE id = " . $q['customers_id']);
                            $dataFilm = $getFilm->fetch_assoc();
                            echo '<td>' . $dataFilm['nama_depan'] . ' ' . $dataFilm['nama_belakang'] .'</td>';
                        } else {
                            echo '<td>Tidak ada Customer</td>';
                        }
                        echo '<td>'.$q['start_date'].'</td>';
                        echo '<td>'.$q['end_date'].'</td>';

                        // Status
                        if($q['status'] == 1) {
                            echo '<td><span class="badge">Sudah dikembalikan</span></td>';
                        } else {
                            echo '<td><span class="badge">Belum dikembalikan</span></td>';
                        }
                    } else {
                        if (isset($columnName)) {
                            foreach($column as $col) {
                                    echo '<td>'.$q[$col].'</td>';
                            }
                        }
                    }
                ?>
                <?php if (isset($_SESSION['username'])): ?>
                <td>
                    <a class="btn btn-success" href="index.php?action=<?php echo $_GET['page']; ?>&action_name=edit&id=<?php echo $q['id']; ?>">Edit</a>
                    <a class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="hapus.php?hapus=<?php echo $_GET['page']; ?>&id=<?php echo $q['id']; ?>">Hapus</a>
                </td>
                <?php endif; ?>
            </tr>
		<?php
		    }
		?>
		</tbody>
		</table>
	</div>
</div>

<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
 <script type="text/javascript">
	 $(document).ready(function() {
	 	$('#tabel').dataTable({
	          "bPaginate": true,
	          "bLengthChange": true,
	          "bFilter": true,
	          "bSort": true,
	          "bInfo": true,
	          "bAutoWidth": true
	    });
	 });
</script>