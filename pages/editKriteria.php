<?php 
    include 'head.php';
    include_once '../includes/nilai.inc.php';
$pgn = new Nilai($db);

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once '../includes/kriteria.inc.php';
$eks = new Kriteria($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

    $eks->kt = $_POST['kt'];
    $eks->tp = $_POST['tp'];
    $eks->jm = $_POST['jm'];
    
    if($eks->update()){
        echo "<script>location.href='datakriteria.php'</script>";
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
                    <h3 class="page-header">Edit Data Kriteria</h1>
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
                    <label for="kt">Nama Kriteria</label>
                    <input type="text" class="form-control" id="kt" name="kt" value="<?php echo $eks->kt; ?>">
                  </div>
                  <div class="form-group">
                    <label for="tp">Tipe Kriteria</label>
                    <select class="form-control" id="tp" name="tp">
                        <option><?php echo $eks->tp; ?></option>
                        <option value='benefit'>Benefit</option>
                        <option value='cost'>Cost</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="jm">Bobot Kriteria</label>
                    <input type="text" class="form-control" id="jm" name="jm" value="<?php echo $eks->jm; ?>">
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Ubah</button>
                  <button type="button" onclick="location.href='dataKriteria.php'" class="btn btn-success">Kembali</button>
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