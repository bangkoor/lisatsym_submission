<?php
include "config.php";

$query = mysqli_query($link, "SELECT * FROM tbl_user");
$query_user = mysqli_fetch_array($query);

if(isset($_POST['submitProfile'])){
	$firstname 		= @$_POST['firstname'];
	$lastname 		= @$_POST['lastname'];
	$username 		= @$_POST['username'];
	$email 			= @$_POST['email'];
	$password 		= @$_POST['password'];
	$salutation 	= @$_POST['salutation'];
	$type 			= @$_POST['type'];
	$topic 			= @$_POST['topic'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LISAT Symposium | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
	<style>
	html{
	background: url(assets/images/background.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
	}
	</style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index2.html"><b>The 3rd International Symposium on LISAT 2016</b><br/>Administration Page</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="register.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="First name" name="fname" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Last name" name="lname" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" name="password2" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
	  <h3>Register as:</h3>
	  <div class="radio">
                    <label>
                      <input type="radio" name="type" id="type1" value="oral presenter" checked>
                      Oral Presenter
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="type" id="type2" value="poster presenter">
                     Poster Presenter
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="type" id="type3" value="non-paper participant">
                      Non-paper Participant
                    </label>
                  </div>
		<h3>Topic in parallel session:</h3>
	  <div class="radio">
                    <label>
                      <input type="radio" name="topic" id="type1" value="Agriculture" checked>
                      Agriculture
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="topic" id="type2" value="Marine and Fisheries">
                     Marine & Fisheries
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="topic" id="type3" value="Climate">
                      Climate
                    </label>
                  </div>
				  <div class="radio">
                    <label>
                      <input type="radio" name="topic" id="type3" value="Forestry">
                      Forestry
                    </label>
                  </div>
				  <div class="radio">
                    <label>
                      <input type="radio" name="topic" id="type3" value="Satellite Technology">
                      Satellite Technology
                    </label>
                  </div>
	  <div class="g-recaptcha" data-sitekey="6Ld5wBwTAAAAAESXzdFqC5VdApQ4SqZ-92N3vRTs"></div><br/><br/>
      <div align="center">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submitRegister">Register</button>
        </div>
        <!-- /.col -->
      </div>
	  
    </form>
    <a href="login.php" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
