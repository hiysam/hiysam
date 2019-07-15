<?php 
   // 1
    include 'head.php';
include_once '../includes/alternatif.inc.php';
$pgn1 = new Alternatif($db);
include_once '../includes/kriteria.inc.php';
$pgn2 = new Kriteria($db);
include_once '../includes/nilai.inc.php';
$pgn3 = new Nilai($db);
if($_POST){
    
    include_once '../includes/rangking.inc.php';
    $eks = new rangking($db);

    $eks->ia = $_POST['ia'];
    $eks->ik = $_POST['ik'];
    $eks->nn = $_POST['nn'];
    
    if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="rangking.php">lihat semua data</a>.
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
                    <h3 class="page-header">Tambah Nilai Karyawan per Kriteria</h1>
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
                    <label for="ia">Nama Karyawan</label>
                    <select class="form-control" id="ia" name="ia">
                        <?php
                        $stmt3 = $pgn1->readAll();
                        while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
                            extract($row3);
                            echo "<option value='{$nik}'>{$nama_karyawan}</option>";
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="ik">Kriteria</label>
                    <select class="form-control" id="ik" name="ik">
                        <?php
                        $stmt2 = $pgn2->readAll();
                        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                            extract($row2);
                            echo "<option value='{$id_kriteria}'>{$nama_kriteria}</option>";
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nn">Nilai</label>
                    <input type="text" class="form-control" id="nn" name="nn" required>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="button" onclick="location.href='rangking.php'" class="btn btn-success">Kembali</button>
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