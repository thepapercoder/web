<?php
global $baseLink;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Quản Lý Lịch Tập</title>
	<base href="<?php echo $baseLink."\\" ?>"/>
	<link rel="stylesheet" type="text/css" href="public/theme/css/main.index.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
  	<div class="container">
  		<div class="login">
  			<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
  				
  				<form action="<?php echo "$baseLink/main/login"?>" method="POST" role="form">
	  				<div class="imgcontainer text-center">
	  					<img src="public/theme/img/imgLogin.png" class="img-responsive avatar" alt="Image">
	  				</div>
<!--	  				<div class="title">-->
<!--	  					<h2>TRAINING MANAGEMENT SYSTEM</h2>-->
<!--	  				</div>  				-->
            <div class="form-group">
              <p><?php echo isset($error)? $error : "" ?></p>
            </div>
  					<div class="form-group <?php echo isset($error)? "has-warning" : "" ?>">
  						<label for="">Username</label>
  						<input type="text" class="form-control" name="username" id="" placeholder="Enter Username" value="<?php echo isset($username)? $username : "" ?>">
  					</div>
  					<div class="form-group">
  						<label for="">Password</label>
  						<input type="password" class="form-control"  name="password" id="" placeholder="Enter Password">
  					</div>
  					<div class="form-group row">
  						<div class="col-sm-6"><input type="checkbox" name="remember_me" value="checked" checked="checked"> Remember me</div>
  						<div class="col-sm-6 text-right"><a href="">Forget password</a></div>
  					</div>		
  					<button type="submit" class="btn">Login</button>
  				</form>
  			</div>
  		</div>
  	</div>
  </body>
  </html>