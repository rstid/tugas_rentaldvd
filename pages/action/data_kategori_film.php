<?php require_once('config/main.php'); 
if ($_GET['action_name'] == 'edit' && isset($_GET['id'])) {
	$actionEdit = TRUE;
    // Sesuaikan dengan Table untuk mendapatkan data berdasarkan id
	$query = $conn->query("select * from kategori_film where id=".$_GET['id']);
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
	          <h3 class="box-title"><?php echo $actionEdit?'Edit':'Tambah'?> Kategori Film</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	            <!-- text input -->
                <input type="hidden" name="id" value="<?php echo $actionEdit?$data['id']:'' ?>">
	            <input type="hidden" name="type" value="data_kategori_film">
	            <input type="hidden" name="cmd" value="<?php echo $actionEdit?'edit':'tambah' ?>">
	            <div class="form-group">
	              <label>Nama Kategori</label>
	              <input type="text" class="form-control" name="nama" placeholder="Nama Kategori" value="<?php echo $actionEdit?$data['nama']:'' ?>"/>
	            </div>
	            <!-- textarea -->
	            <div class="form-group">
	              <label>Keterangan</label>
	              <textarea class="form-control" rows="3" name="keterangan" placeholder="Keterangan"><?php echo $actionEdit?$data['keterangan']:'' ?></textarea>
	            </div>

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
	            <a href="index.php?page=data_kategori_film" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>