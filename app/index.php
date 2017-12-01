<?php 
    spl_autoload_register(function ($class_name){
        if (file_exists('includes/Classes/'.$class_name.'.Class.php')) {
            require_once 'includes/Classes/'.$class_name.'.Class.php';
        }else if (file_exists('includes/Controllers/'.$class_name.'.php')) {
            require_once 'includes/Controllers/'.$class_name.'.php';
        }
    });
?>
<!DOCTYPE html>
<html lang="en" style="height: 100%">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>eziReports</title>
        <!-- PACE-->
        <link rel="stylesheet" type="text/css" href="plugins/PACE/themes/blue/pace-theme-bounce.css">
        <script type="text/javascript" src="plugins/PACE/pace.min.js"></script>
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" type="text/css" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <!-- Fonts-->
        <link rel="stylesheet" type="text/css" href="plugins/themify-icons/themify-icons.css">
        <!-- Primary Style-->
        <link rel="stylesheet" type="text/css" href="build/css/app-layout.css">
        
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
        <!-- WARNING: Respond.js doesn't work if you view the page via file://--> 
        <!--[if lt IE 9]>
        <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body style="background-image: url('assets/images/doodle.png')" class="body-bg-full">
        <?php if (empty($_GET)): ?>
            <?php App::ViewPartial('splash-screen','app','')?>
        <?php endif ?> 

        <!-- jQuery-->
            <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap JavaScript-->
            <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- jQuery Easy Pie Chart-->
            <script type="text/javascript" src="plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
</html>