<?php
 include 'head.php';
	$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once '../includes/alternatif.inc.php';
$eks = new Alternatif($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->kt = $_POST['kt'];
	$eks->ad = $_POST['ad'];
	$eks->td = $_POST['td'];
	
	if($eks->update()){
		echo "<script>location.href='dataAlternatif.php'</script>";
	} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Ubah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
	}
}
	include 'sidebar.php';
?>
<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Edit Data Karyawan</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								 <form method="post">
				  
				  <div class="form-group">
				    <label for="kt">Nama Karyawan</label>
				    <input type="text" class="form-control" id="kt" name="kt" value="<?php echo $eks->kt; ?>">
				  </div>
				  
				  <div class="form-group">
				    <label for="ad">Alamat</label>
				    <input type="text" class="form-control" id="ad" name="ad" value="<?php echo $eks->ad; ?>">
				  </div>
				  
				  <div class="form-group">
				    <label for="td">Telepon</label>
				    <input type="text" class="form-control" id="td" name="td" onkeypress="return hanyaAngka(event)" maxlength='12' value="<?php echo $eks->td; ?>">
					<script>
					function hanyaAngka(evt) {
					var charCode = (evt.which) ? evt.which : event.keyCode
					if (charCode > 31 && (charCode < 48 || charCode > 57))
					return false;
					return true;
					}
					</script>
				  </div>
				  
				  <button type="submit" class="btn btn-primary">Ubah</button>
				  <button type="button" onclick="location.href='dataAlternatif.php'" class="btn btn-success">Kembali</button>
				</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- WRAPPER -->
</div>
<?php include 'footer.php'; ?>