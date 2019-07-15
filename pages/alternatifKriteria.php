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
                    <h3 class="page-header">Data Alternatif</h3>
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
								<div class="col-lg-12">
									<a class="btn btn-primary pull-right" style="color: #FFF !important;" href="tambahAlternatif.php"><b>+Add Data</a></b>
								</div>
                                <thead>
                                    <tr>
                                        <th>Id Alternatif Kriteria/th>
                                        <th>Nama Alternatif</th>
                                        <th>Nama Kriteria</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
										$queryalternatif = mysql_query("SELECT * FROM alternatif ORDER BY id_alternatif");
										while ($dataalternatif = mysql_fetch_array($queryalternatif))
										{
									?>
									<tr>
										<td><?php echo $dataalternatif['id_alternatif']; ?></td>
							          	<td><?php echo $dataalternatif['nama_alternatif']; ?></td>
							          	<td><?php echo $dataalternatif['divisi']; ?></td>
                                        <td></td>
							          	<td><?php echo $dataalternatif['pendidikan']; ?></td>
							          	<td><a type="button" class="btn btn-lg-default" style="background-color: #009688; width: 30%; color: #FFF;" href="editAlternatif.php?id_alternatif=<?php echo $dataalternatif['id_alternatif']; ?>">Edit</a>
							          		<a type="button" class="btn btn-danger" style="color: #fff;" href="hapusAlternatif.php?id_alternatif=<?php echo $dataalternatif['id_alternatif']; ?>">Delete</a>
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