<?php 
   
    include 'head.php';
include_once '../includes/nilai.inc.php';
$pgn = new Nilai($db);
if($_POST){
    
    include_once '../includes/kriteria.inc.php';
    $eks = new Kriteria($db);

    $eks->kt = $_POST['kt'];
    $eks->tp = $_POST['tp'];
    $eks->jm = $_POST['jm'];
    
    if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="datakriteria.php">lihat semua data</a>.
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
                    <h3 class="page-header">Tambah Data Kriteria</h1>
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
                    <input type="text" class="form-control" id="kt" name="kt" required>
                  </div>
                  <div class="form-group">
                    <label for="tp">Tipe Kriteria</label>
                    <select class="form-control" id="tp" name="tp">
                        <option value='benefit'>Benefit</option>
                        <option value='cost'>Cost</option>
                    </select>
                  </div>
                  <!-- <div class="form-group">
                    <label for="jm">Bobot Kriteria</label>
                    <select class="form-control" id="jm" name="jm">
                        <?php
                        $stmt2 = $pgn->readAll();
                        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                            extract($row2);
                            echo "<option value='{$jum_nilai}'>{$jum_nilai}</option>";
                        }
                        ?>
                    </select>
                  </div> -->
                  <div class="row">
                      <div class="form-group col-md-6">
                          <label for="kt">Bobot Kriteria</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="bkk" name="bkk" required>
                            <span class="input-group-addon">%</span>
                           </div>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="kt">Bobot Kriteria Desimal</label>
                          <input type="text" class="form-control" id="jm" name="jm" required readonly>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="button" onclick="location.href='dataKriteria.php'" class="btn btn-success">Kembali</button>
                </form>
                                </div>
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