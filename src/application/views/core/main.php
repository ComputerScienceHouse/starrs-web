<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		
		<title><?=$title;?></title>
		
		<link href="/bower_components/csh-material-bootstrap/dist/css/csh-material-bootstrap.css" rel="stylesheet">
		<link href="/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="/bower_components/selectize/dist/css/selectize.bootstrap3.css" rel="stylesheet">
		<link href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="/bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
		<link href="/assets/css/starrs.css" rel="stylesheet">
		
		<link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="/assets/favicon/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="/assets/favicon/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="/assets/favicon/manifest.json">
		<link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#b0197e">
		<link rel="shortcut icon" href="/assets/favicon/favicon.ico">
		<meta name="apple-mobile-web-app-title" content="STARRS">
		<meta name="application-name" content="STARRS">
		<meta name="msapplication-config" content="/assets/favicon/browserconfig.xml">
		<meta name="theme-color" content="#b0197e">
	
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>

	<body>
		<?=$navbar;?>
		
		<div class="container">
			<!--[if lt IE 9]>
				<div class="alert alert-danger">
					WARNING! You are using Microsoft Internet Explorer which is not fully supported at this time and may cause unintended operation. Please use Google Chrome or Mozilla Firefox to ensure all features function as intended.
				</div>
			<![endif]-->

			<?=$breadcrumb;?>
			
			<div class="row">
				<?=$actions;?>
				<?=$sidebar;?>
				<?=$content;?>
			</div>
		</div>
		
		<div class="container">
			<div class="footer">
                <p>
                Maintainer: <a href="<?=$maint_url?>"><?=$maint?></a>
                <br>
                Version: <?=($version)?"<a href=\"https://github.com/ComputerScienceHouse/starrs-web/commit/$version\">$version</a>":"?"?></a>
                <br>
				STARRS &copy; <?php echo date("Y"); ?> <a href="http://grantcohoe.com">Grant Cohoe</a>
                </p>
			</div>
		</div>

		<script src="/bower_components/jquery/dist/jquery.min.js"></script>
		<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="/bower_components/selectize/dist/js/standalone/selectize.min.js"></script>
		<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script src="/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
		<script src="/bower_components/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
		<script src="/bower_components/js-cookie/src/js.cookie.js"></script>
		<?=$scripts;?>
	</body>
</html>
