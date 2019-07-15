<?php 
    include 'head.php';
    include_once '../includes/nilai.inc.php';
        $pro = new Nilai($db);
        $stmt = $pro->readAll();
    include 'sidebar.php';
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Nilai Bobot</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table  width="100%" class="table table-striped table-bordered table-hover col-md-3 col-sm-6 col-xs-6" id="dataTables-example">
                            <thead>
                                <tr>
                                 <th>No</th>
                                 <th>Keterangan Nilai</th>
                                 <th>Jumlah Nilai</th>
                                <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
$no=1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['ket_nilai'] ?></td>
                <td><?php echo $row['jum_nilai'] ?></td>
                <td class="text-center">
                    <a href="editNilai.php?id=<?php echo $row['id_nilai'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="hapusNilai.php?id=<?php echo $row['id_nilai'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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