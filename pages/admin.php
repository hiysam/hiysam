<?php 
include 'head.php';
include_once '../includes/nilai.inc.php';
$pro3 = new Nilai($db);
$stmt3 = $pro3->readAll();
include_once '../includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
$stmt4 = $pro1->readAll();
include_once '../includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
include 'sidebar.php';
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="page-header">
              <h5>Data Penilaian</h5>
            </div>
            <div class="panel panel-default">
              <div class="panel-body">
                <ol>
                    <?php
                    while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <li><?php echo $row3['ket_nilai'] ?> (<?php echo $row3['jum_nilai'] ?>)</li>
                    <?php
                    }
                    ?>
                </ol>
              </div>
            </div>
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="page-header">
              <h5>Data Kriteria</h5>
            </div>
            <div class="panel panel-default">
              <div class="panel-body">
                <ol class="list-unstyled">
                    <?php
                    while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <li>(<?php echo $row2['id_kriteria'] ?>) <?php echo $row2['nama_kriteria'] ?></li>
                    <?php
                    }
                    ?>
                </ol>
              </div>
            </div>
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="page-header">
              <h5>Nama Karyawan</h5>
            </div>
            <div class="panel panel-default">
              <div class="panel-body">
                <ol class="list-unstyled">
                    <?php
                    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <li>(<?php echo $row1['nik'] ?>) <?php echo $row1['nama_karyawan'] ?></li>
                    <?php
                    }
                    ?>
                </ol>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
<?php 
include 'footer.php';
?>

