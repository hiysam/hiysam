<?php
    
    include 'head.php';
    include_once '../includes/user.inc.php';
    $pro = new User($db);
    $stmt = $pro->readAll();
    include 'sidebar.php';
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Admin</h3>
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
                <th width="70px">NO</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th width="115px">Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
            <tr>
                <td><?php echo $row['id_pengguna'] ?></td>
            <td><?php echo $row['nama_lengkap'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td class="text-center">
              <a href="editAdmin.php?id=<?php echo $row['id_pengguna'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
              <a href="hapusAdmin.php?id=<?php echo $row['id_pengguna'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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