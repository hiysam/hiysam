<?php 

    include 'head.php';
    if($_POST){
    
    include_once '../includes/alternatif.inc.php';
    $eks = new Alternatif($db);
    
    $eks->id = $_POST['id'];
    $eks->kt = $_POST['kt'];
    $eks->ad = $_POST['ad'];
    $eks->td = $_POST['td'];
    
    if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="dataAlternatif.php">lihat semua data</a>.
</div>
<?php
    }
    
    else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Tambah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
    }
}
    include 'sidebar.php';
 ?>
     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Tambah Data Karyawan</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                               <form method="post">

                  <div class="form-group">
                    <label for="id">NIK</label>
                    <input type="text" class="form-control" id="id" name="id" required>
                  </div>

                  <div class="form-group">
                    <label for="kt">Nama Karyawan</label>
                    <input type="text" class="form-control" id="kt" name="kt" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="ad">Alamat</label>
                    <input type="text" class="form-control" id="ad" name="ad" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="td">Telepon</label>
                    <input type="text" class="form-control" id="td" name="td" onkeypress="return hanyaAngka(event)" maxlength='12' required>
                    <script>
                    function hanyaAngka(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                    return true;
                    }
                    </script>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="button" onclick="location.href='dataAlternatif.php'" class="btn btn-success">Kembali</button>
                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--WRAPPER-->
</div>
<?php
include 'footer.php';
  ?>