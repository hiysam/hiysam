<?php
	include 'head.php';
	if($_POST){
	
	include_once '../includes/nilai.inc.php';
	$eks = new Nilai($db);

	$eks->kt = $_POST['kt'];
	$eks->jm = $_POST['jm'];
	
	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="dataNilai.php">lihat semua data</a>.
</div>
<?php
	}
	
	else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Tambah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
	}
}
	include 'sidebar.php';
?>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Tambah Nilai Bobot</h1>
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
				    <input type="text" class="form-control" id="kt" name="kt" required>
				  </div>
				  <div class="form-group">
				    <label for="jm">Jumlah Nilai</label>
				    <input type="text" class="form-control" id="jm" name="jm" required>
				  </div>
				  <button type="submit" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='dataNilai.php'" class="btn btn-success">Kembali</button>
				</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Wrapper -->
</div>
<?php include 'footer.php'; ?>