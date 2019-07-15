<?php 
    include 'head.php';
include_once '../includes/alternatif.inc.php';
include_once '../includes/kriteria.inc.php';
include_once '../includes/nilai.inc.php';
$pgn1 = new Alternatif($db);
$pgn2 = new Kriteria($db);
$pgn3 = new Nilai($db);

$ia = isset($_GET['ia']) ? $_GET['ia'] : die('ERROR: missing ID.');
$ik = isset($_GET['ik']) ? $_GET['ik'] : die('ERROR: missing ID.');

include_once '../includes/rangking.inc.php';
$eks = new Rangking($db);

$eks->ia = $ia;
$eks->ik = $ik;

$eks->readOne();

if($_POST){

    $eks->nn = $_POST['nn'];
    
    if($eks->update()){
        echo "<script>location.href='rangking.php'</script>";
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
                    <h3 class="page-header">Edit Nilai Karyawan per Kriteria</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                  <form method="post">
                  <div class="form-group">
                    <label for="nn">Nilai</label>
                    <input type="text" class="form-control" id="nn" name="nn" value="<?php echo $eks->nn; ?>">
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Ubah</button>
                  <button type="button" onclick="location.href='rangking.php'" class="btn btn-success">Kembali</button>
                </form>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
 <?php 
include 'footer.php';
  ?>