<?php 
include 'head.php';
$config = new Config();
$db = $config->getConnection();
    
if($_POST) {
    
    include_once '../includes/login.inc.php';
    $login = new Login($db);

    $login->userid = $_POST['username'];
    $login->passid = md5($_POST['password']);
    
    if($login->login()){
        echo "<script>location.href='admin.php'</script>";
    }
    
    else{
        echo "<script>alert('Gagal Total')</script>";
    }
}
 ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">                
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login Admin</h3>
                    </div>
                    <div class="panel-body">
                        <div class="span10 offset1">
                        <div id="formAlert" class="alert hide">  
                        <a class="close">×</a>  
                      <strong>Warning!</strong> Make sure all fields are filled and try again.
                    </div>
                    <form method="post">
                          <div class="form-group">
                            <label for="InputUsername1">Username</label>
                            <input type="text" class="form-control" name="username"  id="InputUsername1" placeholder="Username">
                          </div>
                          <div class="form-group">
                            <label for="InputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="InputPassword1" placeholder="Password">
                          </div>
                          <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include 'footer.php'; ?>
