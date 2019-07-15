<?php
	session_start();
	include("koneksi.php");
	if (@$_SESSION['userlogin'] == "")
	{
		header("location:login.php?pesan=Belum Login");
		exit;
	}
	if (isset($_POST['button']))
	{
		mysql_query("UPDATE alternatif_kriteria SET id_alternatif='$_POST[id_alternatif]', id_kriteria='$_POST[id_kriteria]', nilai='$_POST[nilai]' WHERE id_alternatif_kriteria = '$_POST[id_alternatif_kriteria]'");
		header("location:dataAlternatifKriteria.php");
	}
	include 'head.php';
	include 'sidebar.php';
?>
<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Edit Alternatif Kriteria</h1>
			</div>
		</div>
		<?php
			$queryalternatifkriteria = mysql_query("SELECT * FROM alternatif_kriteria WHERE id_alternatif_kriteria = '$_GET[id_alternatif_kriteria]'");
			$dataalternatifkriteria = mysql_fetch_array($queryalternatifkriteria);
		?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form action="" role="form" method="post">
									<div class="col-lg-6">
										<div class="form-group">
										<input type="hidden" class="form-control" name="id_alternatif_kriteria" id="id_alternatif_kriteria"
										value="<?php echo $dataalternatifkriteria['id_alternatif_kriteria']; ?>" readonly/>
									</div>
									<div class="form-group">
										<label>Alternatif</label>
										<select name="id_alternatif" id="id_alternatif" class="form-control">
											<option value=""></option>
											<?php
						      					$queryalternatif = mysql_query("SELECT * FROM alternatif ORDER BY id_alternatif");
						      					while ($dataalternatif = mysql_fetch_array($queryalternatif))
						      					{
						      				?>
											<option value="<?php echo $dataalternatif['id_alternatif']; ?>" <?php if ($dataalternatifkriteria['id_alternatif'] == $dataalternatif['id_alternatif']) { echo " selected"; } ?>><?php echo $dataalternatif['nama_alternatif']; ?></option>
							            	<?php
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Kriteria</label>
										<select name="id_kriteria" id="id_kriteria" class="form-control">
											<option value="">-Pilih-</option>
							                <?php
												$querykriteria = mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria");
												while ($datakriteria = mysql_fetch_array($querykriteria))
												{
											?>
							                <option value="<?php echo $datakriteria['id_kriteria']; ?>" <?php if ($dataalternatifkriteria['id_kriteria'] == $datakriteria['id_kriteria']) { echo "selected"; } ?>><?php echo $datakriteria['nama_kriteria']; ?></option>
							                <?php
												}
											?>
										</select>
									</div>
									<div class="form-group">
                                        <label>Bobot</label>
                                        <select class="form-control" name="nilai" id="nilai">
                                        	<option value="">-Pilih-</option>
                                            <option value="<?php echo $dataalternatifkriteria['id_alternatif_kriteria']; ?>" <?php if ($dataalternatifkriteria['id_alternatif_kriteria'] == $dataalternatifkriteria['id_alternatif_kriteria']) { echo " selected"; } ?> hidden><?php echo $dataalternatifkriteria['nilai']; ?></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        </div>
									</div>
									<div class="col-lg-6">
	                                    <div class="panel ">
	                                    <div class="panel-heading">
	                                        <div class="panel-title">Bobot Nilai</div>
	                                    </div>
	                                    <div class="table-responsive">
	                                        <table class="table table-striped table-bordered table-hover" >
	                                    <thead>
	                                        
	                                    </thead>
	                                    <tbody>                                                
	                                        <tr><td>Bobot 1 : Sangat Rendah </td></tr>                                              
	                                        <tr><td>Bobot 2 : Rendah</td></tr>
	                                        <tr><td>Bobot 3 : Cukup</td></tr>
	                                        <tr><td>Bobot 4 : Tinggi</td></tr>
	                                        <tr><td>Bobot 5 : Sangat Tinggi</td></tr>
	                                    </tbody>
	                                    </table>
	                                        </div>
	                                    </div>
                                    </div> 
                                    <div class="col-lg-12">
                                    	<input type="submit" name="button" id="button" class="btn btn-primary" value="Simpan"
	                                    ></input>
	                                    <input type="reset" class="btn btn-warning" value="Ulang"
	                                    ></input>
                                    </div>							                  
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