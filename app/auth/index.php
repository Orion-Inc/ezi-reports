<?php 
	require_once ('../includes/Autoloader.php');
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
	<link rel="shortcut icon" sizes="196x196" href="../assets/images/logo-2.png">
	
	<link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../plugins/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../plugins/animate-css/animate.css">
	<link rel="stylesheet" href="../assets/auth/bootstrap.css">
	<link rel="stylesheet" href="../assets/auth/core.css">
	<link rel="stylesheet" href="../assets/auth/misc-pages.css">
	<!-- Sweet Alert-->
    <link rel="stylesheet" type="text/css" href="../plugins/bootstrap-sweetalert/lib/sweet-alert.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>
<body class="simple-page">
	<div id="back-to-home" class="animated zoomIn hidden">
		<a href="#" class="btn btn-outline btn-default"><i class="fa fa-arrow-left animated zoomIn"></i></a>
	</div>

	<div class="container">
		<div class="simple-page-logo animated zoomIn">
			<a href="">
				<img src="../assets/images/logo-1.png" alt="eziReports" style="height:60px;">
				<span class="hidden">eziReports</span>
			</a>
		</div>

		<?php if ($_GET['auth']=="login"): App::ViewPartial('login','auth-forms')?>
			
		<?php elseif($_GET['auth']=="forgot-password"): ?>
		<!-- Work on Reset Password -->
			<?php if($_GET['auth']=="forgot-password" && isset($_GET['token'])): 
				App::ViewPartial('verify','auth-forms');
			?>
			<?php else:  App::ViewPartial('forgot','auth-forms')?>
			<?php endif ?>
		<?php else: header('Location:?auth=login');?>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
					<p class="text-center text-white">
						Redirecting <i class="fa fa-spinner fa-pulse fa-fw"></i>
					</p>
				</div>
			</div>
		<?php endif ?>
	</div>
	<?php if (isset($_SESSION['ERRORS'])):;?>
		<!-- Sweet Alert-->
		<script type="text/javascript" src="../plugins/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
		<script type="text/javascript">
			var msg = <?php echo json_encode($_SESSION['ERRORS']);?>;
			setTimeout(function () {
				swal({
					title:"Oops!",
					text:msg.message,
					type:"error",
					confirmButtonClass:"btn-sm",
					confirmButtonText:"OK"
				});
			}, 1000);
		</script>
	<?php endif; unset($_SESSION['ERRORS']);?>
</body>
</html>	
<?php else:
	header('Location:?auth=login');
endif
?>

