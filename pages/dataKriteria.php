<?php
	
	include 'head.php';
    include_once '../includes/kriteria.inc.php';
$pro = new Kriteria($db);
$stmt = $pro->readAll();
	include 'sidebar.php';
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Kriteria</h3>
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
                        <thead>
            <tr>
                <th>ID Kriteria</th>
                <th>Nama Kriteria</th>
                <th>Tipe Kriteria</th>
                <th>Bobot Kriteria</th>
                <th width="115px">Aksi</th>
            </tr>
        </thead>
        
        <tbody>
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
            <tr>                
                <td><?php echo "C". $row['id_kriteria'] ?></td>
                <td><?php echo $row['nama_kriteria'] ?></td>
                <td><?php echo $row['tipe_kriteria'] ?></td>
                <td><?php echo $row['bobot_kriteria'] ?></td>
                <td class="text-center">
                    <a href="editKriteria.php?id=<?php echo $row['id_kriteria'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="hapusKriteria.php?id=<?php echo $row['id_kriteria'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
<!-- WRAPPER -->
</div>


<?php include 'footer.php'; ?>