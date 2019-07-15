<?php 
include 'head.php';
include 'sidebar.php';
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Periode Laporan Nilai Karyawan</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                 <form class="form-inline" method="post" action="laporan.php">
                     <div class="form-group ">
                         <label>Tahun</label>                    
                         <input type="text" name="periode" placeholder="Masukan Tahun" class="form-control ">
                     </div> 
                     <button class="btn btn-primary">Cetak</button>
                 </form>
                </div>
            </div>

 <?php include 'footer.php'; ?>