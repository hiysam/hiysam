<?php
include 'head.php';
include_once '../includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
$stmt1x = $pro1->readAll();
$stmt1y = $pro1->readAll();
include_once '../includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
$stmt2x = $pro2->readAll();
$stmt2y = $pro2->readAll();
$stmt2yx = $pro2->readAll();
include_once '../includes/rangking.inc.php';
$pro = new Rangking($db);
$stmt = $pro->readKhusus();
$stmtx = $pro->readKhusus();
$stmty = $pro->readKhusus();

include 'sidebar.php';
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Hasil Nilai Normalisasi</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <h4>Nilai Normalisasi</h4>
            <table width="100%" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">Nama Karyawan</th>
                        <th colspan="<?php echo $stmt2y->rowCount(); ?>" class="text-center">Kriteria</th>
                    </tr>
                    <tr>
                    <?php
                    while ($row2y = $stmt2y->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <th><?php echo $row2y['nama_kriteria'] ?></th>
                    <?php
                    }
                    ?>
                    </tr>
                </thead>
        
                <tbody>
        <?php
        while ($row1y = $stmt1y->fetch(PDO::FETCH_ASSOC)){
        ?>
                    <tr>
                        <th><?php echo $row1y['nama_karyawan'] ?></th>
                        <?php
                        $ay= $row1y['nik'];
                        $stmtry = $pro->readR($ay);
                        while ($rowry = $stmtry->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <td>
                            <?php 
                            echo $rowry['nilai_normalisasi'];
                            ?>
                        </td>
                        <?php
                        }
                        ?>
                    </tr>
        <?php
        }
        ?><tr>
            <td><b>Bobot</b></td>
                    <?php
                    while ($row2yx = $stmt2yx->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <td><b><?php echo $row2yx['bobot_kriteria'] ?></b></td>
                    <?php
                    }
                    ?>
                    </tr>
                </tbody>
        
            </table>
        
       
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- WRAPPER -->
</div>


<?php include 'footer.php'; ?>