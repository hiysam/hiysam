<?php 
include_once 'includes/config.php';

$config = new Config();
$db = $config->getConnection();
    
if($_POST){
    
    include_once 'includes/login.inc.php';
    $login = new Login($db);

    $login->userid = $_POST['username'];
    $login->passid = md5($_POST['password']);
    
    if($login->login()){
        echo "<script>location.href='pages/admin.php'</script>";
    }
    
    else{
        echo "<script>alert('Gagal Total')</script>";
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT.ARMORINDO ARTHA</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="dist/css/custom.css">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body style="background: #ffffff url(images/back.jpg) bottom;">
    <div class="container">
        <div class="row">
		<h1 align="center"><font face="algerian" color="green"><b> Silahkan Anda Login Untuk Melanjutkan </b></font></h1> </marquee>
            <div class="col-md-4 col-md-offset-4">
				<div class="text-center login-title">
				<marquee direction="left" scrollamount="5" align="center"> <h2><font face="algerian" color="green"><b> PT. ARMORINDO ARTHA </b></font></h2> </marquee>
				<div class="account-wall">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><font face="Castellar" color="green">Login Admin</font></h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                          <div class="form-group">
                            <font align="left" face="Bodoni MT Black" color="green"><h4><label for="InputUsername1">Username</label></h4></font>
                            <input type="text" class="form-control" name="username"  id="InputUsername1" placeholder="Username">
                          </div>
                          <div class="form-group">
                            <font align="left" face="Bodoni MT Black" color="green"><h4><label for="InputPassword1">Password</label></h4></font>
                            <input type="password" class="form-control" name="password" id="InputPassword1" placeholder="Password">
                          </div>
                          <a><button type="submit" class="btn btn-primary">Login</button></a>
						  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

   <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
</body>
</html>
