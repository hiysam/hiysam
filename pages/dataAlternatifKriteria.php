<?php 
    session_start();
    include("koneksi.php");
    if (@$_SESSION['userlogin'] == "")
    {
        header("location:login.php?pesan=Belum Login");
        exit;
    }
    include 'head.php';
    include 'sidebar.php';
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Alternatif Kriteria</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table  width="100%" class="table table-striped table-bordered table-hover col-md-3 col-sm-6 col-xs-6" id="dataTables-example">
                            <div class="col-lg-12">
                                <a href="tambahAlternatifKriteria.php" class="btn btn-primary pull-right" style="color: #fff !important;">
                                    <b>+Add Data</b>
                                </a>
                            </div>
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Alternatif</th>
                                    <th>Nama Kriteria</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $queryalternatifkriteria = mysql_query("SELECT * FROM alternatif_kriteria ORDER BY id_alternatif, id_kriteria");
                                while ($dataalternatifkriteria = mysql_fetch_array($queryalternatifkriteria))
                                {
                                    $queryalternatif = mysql_query("SELECT * FROM alternatif WHERE id_alternatif = '$dataalternatifkriteria[id_alternatif]'");
                                    $dataalternatif = mysql_fetch_array($queryalternatif);
                                    $querykriteria = mysql_query("SELECT * FROM kriteria WHERE id_kriteria = '$dataalternatifkriteria[id_kriteria]'");
                                    $datakriteria = mysql_fetch_array($querykriteria);
                                ?>
                                <tr>
                                    <td><?php echo "AC".$dataalternatifkriteria ['id_alternatif_kriteria']; ?></td>
                                    <td><?php echo $dataalternatif ['nama_alternatif']; ?></td>
                                    <td><?php echo $datakriteria ['nama_kriteria']; ?></td>
                                    <td><?php echo $dataalternatifkriteria ['nilai']; ?></td>
                                    <td>
                                        <a type="button" class="btn btn-lg-default" style="background-color: #009688; color: #FFF;" href="editAlternatifKriteria.php?id_alternatif_kriteria=<?php echo $dataalternatifkriteria['id_alternatif_kriteria']; ?>"><i class="fa fa-edit"></i></a>
                                        <a type="button" class="btn btn-danger" style="color: #fff;" href="hapusAlternatifKriteria.php?id_alternatif_kriteria=<?php echo $dataalternatifkriteria['id_alternatif_kriteria']; ?>"><i class="fa fa-trash-o "></i></a>
                                    </td>
                                </tr>
                                <?php } ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- WRAPPER -->
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#Tables').DataTable({
            responsive: true,
            "order": [[ 3, "desc" ]]
        });
    });
    </script>
 <?php include 'footer.php'; ?>