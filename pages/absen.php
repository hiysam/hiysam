<?php
include 'head.php';
include_once '../includes/alternatif.inc.php';
$pro = new Alternatif($db);
$stmt = $pro->readAll();
$stmt1 = $pro->readKar();

if($_POST){
    
    include_once '../includes/absen.inc.php';
    $eks = new Absen($db);

    $eks->nik = $_POST['karyawan'];
    $eks->tahun = date('Y');
    $eks->rata = $_POST['rata'];
    
    if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="datakriteria.php">lihat semua data</a>.
</div>
<?php
    }
}

include 'sidebar.php';
include 'footer.php';
?>


	
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Entry Absensi</h3>
			</div>
			<!--/.col-lg-12 -->
		</div>
		<!--/.row -->
		
		
		<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form method="post" action="">
									<p><font size="3">Data Karyawan</font></p>
								<p>
									<label style="word-spacing: 50px">NIK/Nama :</label>
									<select class="js-example-basic-single" name="karyawan">
									  <!-- <option value="AL">Alabama</option>
									  <option value="WY">Wyoming</option> -->
									 	<?php
					                        $stmt3 = $pro->readKar();
					                        while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
					                            extract($row3);
					                            echo "<option value='{$nik}'>{$nama_karyawan} ({$nik})</option>";
					                    }
					                    ?>
									</select>
								</p>
									<p>
										<label style="word-spacing: 5px">Januari :</label>
										<input type="number" name="jan" placeholder=" Masukkan Nilai" id="jan">
										<span>%</span>
										<label style="word-spacing: 52px">Juli :</label>
										<input type="number" name="jul" placeholder=" Masukkan Nilai" id="jul">
										<span>%</span>
									</p>
									<p>
										<label>Februari :</label>
										<input type="number" name="feb" placeholder=" Masukkan Nilai" id="feb">
										<span>%</span>
										<label style="word-spacing: 20px">Agustus :</label>
										<input type="number" name="agu" placeholder=" Masukkan Nilai" id="agu">
										<span>%</span>
									</p>
									<p>
										<label style="word-spacing: 18px">Maret :</label>
										<input type="number" name="mar" placeholder=" Masukkan Nilai" id="mar">
										<span>%</span>
										<label style="word-spacing: 5px">September :</label>
										<input type="number" name="sep" placeholder=" Masukkan Nilai" id="sep">
										<span>%</span>
									</p>
									<p>
										<label style="word-spacing: 25px">April :</label>
										<input type="number" name="apr" placeholder=" Masukkan Nilai" id="apr">
										<span>%</span>
										<label style="word-spacing: 22px">Oktober :</label>
										<input type="number" name="okt" placeholder=" Masukkan Nilai" id="okt">
										<span>%</span>
									</p>
									<p>
										<label style="word-spacing: 33px">Mei :</label>
										<input type="number" name="mei" placeholder=" Masukkan Nilai" id="mei">
										<span>%</span>
										<label style="word-spacing: 9px">November :</label>
										<input type="number" name="nov" placeholder=" Masukkan Nilai" id="nov">
										<span>%</span>
									</p>
									<p>
										<label style="word-spacing: 29px">Juni :</label>
										<input type="number" name="jun" placeholder=" Masukkan Nilai" id="jun">
										<span>%</span>
										<label style="word-spacing: 9px">Desember :</label>
										<input type="number" name="des" placeholder=" Masukkan Nilai" id="des">
										<span>%</span>
									</p>
									

										<td><input type="button" name="jumlahkan" id="jumlahkan" value="Hitung"></td>
										<td><input type="text" name="rata" readonly="" id="rata" ></td>

										<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
               							<button type="button" onclick="location.href='admin.php'" class="btn btn-success">Kembali</button>
								</form>
									<br>
									
							</div>
							
							<!--/.col-lg-12 -->
						</div>
						<!--/.row -->
					</div>
					<!--/.panel-body -->
				</div>
				<!--/.panel -->
				
	</div>