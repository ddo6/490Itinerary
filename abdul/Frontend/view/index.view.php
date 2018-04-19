<!DOCTYPE html>
<html lang="en">
<head>
	<title>Weather To Eat</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/23eat1-master768-v5.jpg" alt="IMG">
				</div>

        <div class="login-box row h-100 justify-content-center align-items-center">
        			<form method="post" class="col-12 login-form" action='../scripts/login.php'>
        				<h1 id="login-title">WeatherToEat</h1>
        				<p id="login-subtitle">Get the weather, what to eat, and what to see all in one place</p>
        				<div class="error-div">
        					<span class="error"><?php echo $error; ?></span>
        				</div>
        				<div class="form-group row">
        					<label class='col-md-12 col-form-label col-form-label-lg'>Username</label>
        					<div class="col-md-12">
        						<input type="text" name="username" placeholder="Enter your username" class="form-control input-lg">
        					</div>
        				</div>
        				<div class="form-group row">
        					<label class='col-md-12 col-form-label col-form-label-lg'>Password</label>
        					<div class="col-md-12">
        						<input type="password" name="password" placeholder="Enter your password" class="form-control input-lg">
        					</div>
        				</div>
        				<div class="form-group row">
        					<div class="col-md-12">
        						<input type="submit" class="btn btn-success btn-lg btn-block" value="SIGN IN" name="login">
        					</div>
        					<div class="col-md-12">
        						<input type="submit" class="btn btn-success btn-lg btn-block" value="CREATE AN ACCOUNT" name="register">
        					</div>
        				</div>
        			</form>
        		</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
