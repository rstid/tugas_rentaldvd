<?php require_once('config/main.php'); 
if ($_GET['action_name'] == 'edit' && isset($_GET['id'])) {
	$actionEdit = TRUE;
	$query = $conn->query("select * from customers where id=".$_GET['id']);
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
	          <h3 class="box-title"><?php echo $actionEdit?'Edit':'Tambah'?> Customer</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	          <input type="hidden" name="id" value="<?php echo $actionEdit?$data['id']:'' ?>">
	           <input type="hidden" name="type" value="data_customer">
	            <input type="hidden" name="cmd" value="<?php echo $actionEdit?'edit':'tambah' ?>">
	            <!-- text input -->
	            <div class="form-group">
	              <label>Nama Depan</label>
	              <input type="text" class="form-control" name="nama_depan" placeholder="Nama Depan" value="<?php echo $actionEdit?$data['id']:'' ?>"/>
	            </div>
				<!-- text input -->
				<div class="form-group">
	              <label>Nama Belakang</label>
	              <input type="text" class="form-control" name="nama_belakang" placeholder="Nama Belakang" value="<?php echo $actionEdit?$data['nama_belakang']:'' ?>"/>
	            </div>
	            <!-- textarea -->
	            <div class="form-group">
	              <label>Alamat</label>
	              <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"><?php echo $actionEdit?$data['alamat']:'' ?></textarea>
	            </div>
	            <div class="form-group">
	              <label>Telepon</label>
	              <input type="text" class="form-control" name="telepon" placeholder="Telepon" value="<?php echo $actionEdit?$data['telepon']:'' ?>"/>
	            </div>
	            <div class="form-group">
	              <label>Kontak</label>
	              <input type="text" class="form-control" name="email" placeholder="Kontak" value="<?php echo $actionEdit?$data['email']:'' ?>"/>
	            </div>

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-backward"></i> Kembalikan Data</button>
	            <a href="index.php?page=data_customer" class="btn btn-danger"> <i class="fa fa-times"></i>  Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>