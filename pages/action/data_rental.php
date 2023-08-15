<?php
require_once('config/main.php'); 
require_once('get_data.php');

if ($_GET['action_name'] == 'edit' && isset($_GET['id'])) {
	$actionEdit = TRUE;
    // Sesuaikan dengan Table untuk mendapatkan data berdasarkan id
	$query = $conn->query("select * from $table where id=".$_GET['id']);
	$data = $query->fetch_assoc();
} else {
	$actionEdit = FALSE;
}
?>

<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title"><?php echo $actionEdit?'Edit':'Tambah'?> <?php echo $title; ?></h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	            <!-- text input -->
                <input type="hidden" name="id" value="<?php echo $actionEdit?$data['id']:'' ?>">
	            <input type="hidden" name="type" value="<?php echo $_GET['action'] ?>">
	            <input type="hidden" name="cmd" value="<?php echo $actionEdit?'edit':'tambah' ?>">
				<!-- Option Kategori -->
				<div class="form-group">
					<label for="customers">Nama Customer: </label><br>
					<select name="customers" id="customers">
						<?php
							if ($actionEdit) {
								$stmt = $conn->prepare("SELECT * FROM customers WHERE id = ?");
								$stmt->bind_param("i", $data['customers_id']);
								$stmt->execute();
								$result = $stmt->get_result();
								$customer = $result->fetch_assoc();
								echo '<option value="' . $customer['id'] . '" disabled selected>' . $customer['nama_depan'] . '' . $customer['nama_belakang'] . '</option>';
							} else {
								echo '<option disabled selected>Pilih</option>';
							}
						?>
						<?php
							$stmt = $conn->query("SELECT * FROM customers");
							while ($custome = $stmt->fetch_assoc()) {
								echo '<option value="' . $custome['id'] . '">' . $custome['nama_depan'] . ' ' . $custome['nama_belakang'] . '</option>';
							}
						?>
					</select>
				</div>
				<!-- Option Kategori -->
				<div class="form-group">
					<label for="film">Film: </label><br>
					<select name="film" id="film">
						<?php
							if ($actionEdit) {
								$stmt = $conn->prepare("SELECT * FROM film WHERE id = ?");
								$stmt->bind_param("i", $data['film_id']);
								$stmt->execute();
								$result = $stmt->get_result();
								$customer = $result->fetch_assoc();
								echo '<option value="' . $customer['id'] . '" disabled selected>' . $customer['nama_depan'] . '' . $customer['nama_belakang'] . '</option>';
							} else {
								echo '<option disabled selected>Pilih</option>';
							}
						?>
						<?php
							$stmt = $conn->query("SELECT * FROM film");
							while ($fil = $stmt->fetch_assoc()) {
								echo '<option value="' . $fil['id'] . '">' . $fil['title'] . '</option>';
							}
						?>
					</select>
				</div>
	            <!-- textarea -->
	            <div class="form-group">
	              <label>Tanggal Meminjam:</label><br>
				  <input type="date" id="start_date" name="start_date" value="<?php echo $actionEdit?$data['start_date']:'' ?>">
	            </div>
				<!-- text -->
	            <div class="form-group">
	              <label>Tanggal Pengembalian:</label><br>
	              <input type="date" id="end_date" name="end_date" value="<?php echo $actionEdit?$data['end_date']:'' ?>">
	            </div>
				<!-- text -->
	            <div class="form-group">
	              	<label>Status:</label><br>
	              	<select id="status" name="status">
						<option value="0">Belum Kembali</option>
						<option value="1">Sudah Kembali</option>
					</select>
	            </div>
	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
	            <a href="index.php?page=<?php echo $_GET['action'] ?>" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>