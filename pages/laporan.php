<?php 
include 'head.php';
include_once '../includes/alternatif.inc.php';
$per = $_POST['periode'];
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll($per);
$stmt1x = $pro1->readAll($per);
$stmt1y = $pro1->readAll($per);
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
<script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    location.reload(true);
    document.body.innerHTML = restorepage;
}
</script>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Laporan</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                  <div>
    
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#rangking" aria-controls="rangking" role="tab" data-toggle="tab">Laporan Perangkingan</a></li>
        <li role="presentation" style="cursor: pointer;" href="laporan.php" onClick="printContent('cetak1')" ><a id="cetak" role="tab" target="_blank">Cetak Laporan (Printout)</a>  
    </li>
      </ul>
    
      <!-- Tab panes -->
      <div class="tab-content" id="cetak1">
        <div role="tabpanel" class="tab-pane active" id="rangking">
            <br/>
            <h4>Nilai Karyawan</h4>
            <table width="100%" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">Nama Karyawan</th>
                        <th colspan="<?php echo $stmt2x->rowCount(); ?>" class="text-center">Kriteria</th>
                    </tr>
                    <tr>
                    <?php
                    while ($row2x = $stmt2x->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <th><?php echo $row2x['nama_kriteria'] ?><br/>(<?php echo $row2x['tipe_kriteria'] ?>)</th>
                    <?php
                    }
                    ?>
                    </tr>
                </thead>
        
                <tbody>
        <?php
        while ($row1x = $stmt1x->fetch(PDO::FETCH_ASSOC)){
        ?>
                    <tr>
                        <th><?php echo $row1x['nama_karyawan'] ?></th>
                        <?php
                        $ax= $row1x['nik'];
                        $stmtrx = $pro->readR($ax);
                        while ($rowrx = $stmtrx->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <td>
                            <?php 
                            echo $rowrx['nilai_rangking'];
                            ?>
                        </td>
                        <?php
                        }
                        ?>
                    </tr>
        <?php
        }
        ?>
                </tbody>
        
            </table>
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
                        $stmtry = $pro->readR($ay,$per);
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
            <h4>Hasil Akhir (Bobot) </h4>
            <table width="100%" id="table-akhir" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">Nama Karyawan</th>
                        <th colspan="<?php echo $stmt2->rowCount(); ?>" class="text-center">Kriteria</th>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">Hasil</th>
                    </tr>
                    <tr>
                    <?php
                    while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <th><?php echo $row2['nama_kriteria'] ?></th>
                    <?php
                    }
                    ?>
                    </tr>
                </thead>
        
                <tbody>
        <?php
        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
        ?>
                    <tr>
                        <th><?php echo $row1['nama_karyawan'] ?></th>
                        <?php
                        $a= $row1['nik'];
                        $stmtr = $pro->readR($a);
                        while ($rowr = $stmtr->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <td>
                            <?php 
                            echo $rowr['bobot_normalisasi'];
                            ?>
                        </td>
                        <?php
                        }
                        ?>
                        <td>
                            <?php 
                            echo $row1['hasil_karyawan'];
                            ?>
                        </td>
                    </tr>
        <?php
        }
        ?>
                </tbody>
        
            </table>
                
        </div>
      </div>
    
    </div>
                    </div>
                </div>
            </div>

 <?php include 'footer.php'; ?>