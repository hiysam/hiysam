<?php 
include 'head.php';
include_once '../includes/alternatif.inc.php';
$per = $_POST['periode'];
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll($per,5);
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
    <style type="text/css">
        .kanan{text-align:right;}
    </style>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#rangking" aria-controls="rangking" role="tab" data-toggle="tab">Laporan Perangkingan</a></li>
        <li role="presentation" style="cursor: pointer;" href="cetaklaporan2.php" target="_blank" onClick="printContent('cetak1')"><a id="cetak" role="tab">Cetak Laporan (Printout)</a>  
      </ul>
    
      <!-- Tab panes -->
      <div class="tab-content" id="cetak1">
        <div role="tabpanel" class="tab-pane active" id="rangking">
            <br/>
            <font size="5"><b>Armorindo Artha </b></font>
            <br>PT.ARMORINDO ARTHA</br>
            <tr>Jl.Palmerah Utara Raya No.32A Jakarta Barat 11480 Phone: (021)221-227-59 Fax:(021)221-227-49</tr>
            <hr />
            <font size="5"><p class="text-center">Laporan Perangkingan Karyawan</p></font>
            <font size="3"><p class="text-center">Periode : <?php echo $_POST['periode'] ?></p></font>
            <table width="100%" id="table-akhir" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">No</th>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">NIK</th>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">Nama Karyawan</th>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">Alamat</th>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">Nomor Teleon</th>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">Hasil</th>
                    </tr>
                </thead>
        
                <tbody>
        <?php
        $no=1;
        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
        ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <th><?php echo $row1['nik'] ?></th>
                        <th><?php echo $row1['nama_karyawan'] ?></th>
                        <th><?php echo $row1['alamat_karyawan'] ?></th>
                        <th><?php echo $row1['telepon'] ?></th>
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
            <div class="float-right" style="width: 90%;">
            </div>
                <p class="text-right" style="width: 87%" >Manager</p>
                <div style="height: 50px;"></div>
                <hr align="right" width="30%" >
                <p class="text-right align-bottom border-top border-dark" style="width: 90%">(Andre Davinci)</p>
            
    
        </div>
                    </div>
                </div>
            </div>

 <?php include 'footer.php'; ?>

