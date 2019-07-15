<?php 
    include 'head.php';
    include_once '../includes/alternatif.inc.php';
        $pro = new Alternatif($db);
        $stmt = $pro->readAll();
    include_once '../includes/rangking.inc.php';
        $pro = new Rangking($db);
    include 'sidebar.php';
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Karyawan</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table  width="100%" class="table table-striped table-bordered table-hover col-md-3 col-sm-6 col-xs-6" id="dataTables-example">
                            <thead>
            <tr>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>


        <tbody>
<?php
$no=1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
            <tr>
                <td><?php echo $row['nik']?></td>
                <td><?php echo $row['nama_karyawan'] ?></td>
                <td><?php echo $row['alamat_karyawan'] ?></td>
                <td><?php echo $row['telepon'] ?></td>
                <td class="text-center">
                    <a href="editAlternatif.php?id=<?php echo $row['nik'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="hapusAlternatif.php?id=<?php echo $row['nik'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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