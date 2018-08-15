<?php
session_start();
require_once("../web-config/config.php"); 
require_once("../web-config/database.php"); 
if(isset($_SESSION["id"]) && isset($_SESSION["email"])  && isset($_SESSION["level"])) {
      //updating last login
        $sql = "SELECT id, email, level FROM user WHERE email ='{$_SESSION["email"]}' AND id='{$_SESSION["id"]}' AND active='1' LIMIT 1";
        $query = $database->query($sql);
        $n = $database->num_rows($query);
		if($n > 0){
	     $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
         $sql = "UPDATE user SET ip='$ip', lastlogin=now() WHERE username='{$_SESSION['email']}' AND id ='{$_SESSION['id']}' LIMIT 1";
         $query = $database->query($sql);
         header("location:home");
		}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Operation Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- App style -->
  <link rel="stylesheet" href="assets/css/Operation.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box" style="padding-top: 60px">
  <div class="login-logo">
    <b>OPERATIONS</b>Dashboard
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="home.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" id="email" class="form-control" maxlength="100" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" class="form-control" maxlength="100" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <span onclick="log()" id="loginbtn" class="btn btn-primary btn-block btn-flat">Sign In</span>
        </div>
        <span id="status"></span>
        <!-- /.col -->
      </div>
    </form>

    <a href="forget-password">I forgot my password</a><br>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%'
    });
  });
</script>
<script src="js/ajax.js"></script>
<script src="js/login.js"></script>
</body>
</html>
