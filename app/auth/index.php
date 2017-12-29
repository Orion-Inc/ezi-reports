<?php 
	session_start();
	if (isset($_GET['auth'])): 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>eziReports</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="eziReports, O.Rion Ltd., Orion" />
	<link rel="shortcut icon" sizes="196x196" href="assets/images/">
	
	<link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../plugins/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../plugins/animate-css/animate.css">
	<link rel="stylesheet" href="../assets/auth/bootstrap.css">
	<link rel="stylesheet" href="../assets/auth/core.css">
	<link rel="stylesheet" href="../assets/auth/misc-pages.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>
<body class="simple-page">
	<div id="back-to-home" class="animated zoomIn hidden-xs">
		<a href="#" class="btn btn-outline btn-default"><i class="fa fa-arrow-left animated zoomIn"></i></a>
	</div>

	<div class="container">
		<div class="simple-page-logo animated zoomIn">
			<a href="#">
				<span><i class="fa fa-files-o"></i></span>
				<span>eziReports</span>
			</a>
		</div>

		<?php if ($_GET['auth']=="login"): ?>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
					<div class="simple-page-form animated zoomIn" id="login-form">
						<h4 class="form-title m-b-xl text-center">Sign In With Your ezi-Account</h4>
						<form action="../includes/auth/login.php" method="POST">
							<div class="form-group">
								<input id="eziAccountcode" name="eziAccountcode" type="text" class="form-control" placeholder="ezi-Account Code" required="" oninvalid="this.setCustomValidity('Please Enter Your eziAccountcode')" oninput="setCustomValidity('')">
							</div>

							<div class="form-group">
								<input id="access_key" name="access_key" type="password" class="form-control" placeholder="Password" required="" oninvalid="this.setCustomValidity('Enter Your Password')" oninput="setCustomValidity('')">
							</div>

							<div class="form-group m-b-xl">
								<div class="checkbox checkbox-primary">
									<input type="checkbox" id="keep_me_logged_in"/>
									<label for="keep_me_logged_in">Keep me signed in</label>
								</div>
							</div>
							<button class="btn btn-primary">Sign In</button>
						</form>
					</div>
					<div class="simple-page-footer animated zoomIn">
						<p><a href="?auth=forgot-password">Forgot Your Password?</a></p>
						<p>
							<small>Don't have an account?</small>
							<a href="#">Visit Our Website</a>
						</p>
					</div>
				</div>
			</div>
		<?php elseif($_GET['auth']=="forgot-password"): ?>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
					<div class="simple-page-form animated flipInY" id="reset-password-form">
						<h4 class="form-title m-b-xl text-center">Forgot Your Password ?</h4>

						<form action="../includes/auth/reset-password.php" method="POST">
							<div class="form-group">
								<input id="reset-password-email" type="email" class="form-control" placeholder="Enter Email Address eg. School or Individual">
							</div>
							<button type="submit" class="btn btn-primary">Rest Password</button>
						</form>
					</div>
					<div class="simple-page-footer animated zoomIn">
						<p><a href="?auth=login">Go Back</a></p>
						<p>
							<small>Don't have an account?</small>
							<a href="#">Visit Our Website</a>
						</p>
					</div>
				</div>
			</div>
		<?php else: header('Location:?auth=login');?>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
					<p class="text-center text-white">
						Redirecting <i class="fa fa-spinner fa-pulse fa-fw"></i>
					</p>
				</div>
			</div>
		<?php endif ?>

		<?php if (isset($_SESSION['ERRORS'])):?>
			<script type="text/javascript">
				var msg = <?php echo $_SESSION['ERRORS']?>;
				alert(msg.message);
			</script>
		<?php endif; unset($_SESSION['ERRORS']);?>
    </div>
</body>
</html>	
<?php else:
	header('Location:?auth=login');
endif
?>

