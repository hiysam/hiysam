<?php
	include 'head.php';
	$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once '../includes/nilai.inc.php';
$eks = new Nilai($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->kt = $_POST['kt'];
	$eks->jm = $_POST['jm'];
	
	if($eks->update()){
		echo "<script>location.href='dataNilai.php'</script>";
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
				<h3 class="page-header">Edit Alternatif Kriteria</h1>
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
				    <label for="kt">Keterangan Nilai</label>
				    <input type="text" class="form-control" id="kt" name="kt" value="<?php echo $eks->kt; ?>">
				  </div>
				  <div class="form-group">
				    <label for="jm">Jumlah Nilai</label>
				    <input type="text" class="form-control" id="jm" name="jm" value="<?php echo $eks->jm; ?>">
				  </div>
				  <button type="submit" class="btn btn-primary">Ubah</button>
				  <button type="button" onclick="location.href='dataNilai.php'" class="btn btn-success">Kembali</button>
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