<?php 
include 'head.php';
include_once '../includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
if (isset($_POST['tahun'])) {
    $stmt1 = $pro1->readAll($_POST['tahun']);
}else{    
    $stmt1 = $pro1->readAll();
}
include_once '../includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
include_once '../includes/rangking.inc.php';
$pro = new Rangking($db);
$stmt = $pro->readKhusus();
include 'sidebar.php';

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Nilai Karyawan dan Hasil Perhitungan</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                   <div>
    
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#lihat" aria-controls="lihat" role="tab" data-toggle="tab">Nilai Karyawan per Kriteria</a></li>
        <li role="presentation"><a href="#rangking" aria-controls="rangking" role="tab" data-toggle="tab">Hasil Normalisasi dan SAW</a></li>
        <li role="presentation"><a href="tambahRangking.php" role="tab">Tambah Nilai Karyawan per Kriteria</a></li>
      </ul>
    
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="lihat">
            <br/>
            <div class="row">
                <div class="col-md-6 text-left">
                    <h4>Data Nilai Karyawan per Kriteria</h4>
                    <?php
                        $tahun = date('Y');
                        $i = $tahun - 10;
                    ?>
                    <form class="form-inline" method="post">
                        <div class="form-group">
                            <label for="tahun">Pilih Tahun :</label>
                            <select name="tahun" id="tahun" class="form-control">
                            <?php while($i <= $tahun){?>
                                <option value="<?= $tahun ?>"><?= $tahun ?></option>
                            <?php $tahun--; }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
            <br/>
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Data Karyawan</th>
                        <th>Kriteria</th>
                        <th>Nilai</th>
                        <th width="120px">Aksi</th>
                    </tr>
                </thead>
        
        
                <tbody>
        <?php
        $no=1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama_karyawan'] ?></td>
                        <td><?php echo $row['nama_kriteria'] ?></td>
                        <td><?php echo $row['nilai_rangking'] ?></td>
                        <td class="text-center">
                            <a href="editRangking.php?ia=<?php echo $row['nik'] ?>&ik=<?php echo $row['id_kriteria'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            <a href="hapusRangking.php?ia=<?php echo $row['nik'] ?>&ik=<?php echo $row['id_kriteria'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </td>
                    </tr>
        <?php
        }
        ?>
                </tbody>
        
            </table>
                    
        </div>

        
        <div role="tabpanel" class="tab-pane" id="rangking">
            <br/>
            <h4>Hasil Nomalisasi dan SAW</h4>
            <font size="3"><p class="text-center">Periode : <?php echo $_POST['tahun'] ?></p></font>
            <table width="100%" class="table table-striped table-bordered">
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
                            $b = $rowr['id_kriteria'];
                            $tipe = $rowr['tipe_kriteria'];
                            $bobot = $rowr['bobot_kriteria'];
                        ?>
                        <td>
                            <?php 
                            if($tipe=='benefit'){
                                $stmtmax = $pro->readMax($b);
                                $maxnr = $stmtmax->fetch(PDO::FETCH_ASSOC);
                                echo $nor = $rowr['nilai_rangking']/$maxnr['mnr1'];
                            } else{
                                $stmtmin = $pro->readMin($b);
                                $minnr = $stmtmin->fetch(PDO::FETCH_ASSOC);
                                echo $nor = $minnr['mnr2']/$rowr['nilai_rangking'];
                            }
                            $pro->ia = $a;
                            $pro->ik = $b;
                            $pro->nn2 = $nor;
                            $pro->nn3 = $bobot*$nor;
                            $pro->normalisasi();
                            ?>
                        </td>
                        <?php
                        }
                        ?>
                        <td>
                            <?php 
                            $stmthasil = $pro->readHasil($a);
                            $hasil = $stmthasil->fetch(PDO::FETCH_ASSOC);
                            echo $hasil['bbn'];
                            $pro->ia = $a;
                            $pro->has = $hasil['bbn'];
                            $pro->hasil();
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
    
    </div
                    </div>
                </div>
            </div>
        </div>

 <?php include 'footer.php'; ?>