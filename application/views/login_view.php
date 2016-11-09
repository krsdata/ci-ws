<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin panel</title>
<base href="<?php echo base_url(); ?>" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/common.css" rel="stylesheet">


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>
 <!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MGVT9X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MGVT9X');</script>
<!-- End Google Tag Manager -->


 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a  href="<?php echo base_url().'login' ?>"><img alt="" src="<?php echo base_url().'img/logo_xxhdpi.png' ?> "><span class="navbar-brand">Free As Air</span></a>
			
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
	<br/><br/><br/>	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					<form id="normal" role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="User Name" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password">
							</div>
							<div class="checkbox">
							<?php if($check=='0')
							{ 
							?>
								<a href="signup">Signup!</a>
								<br><br>
							<?php } ?>
								<div id ="alertmsg" style = "padding:5px;border-radius: 15px;display:none;" class="alert alert-danger" role="alert">
								</div>
							</div>
							<a id = "btnlogin" class="btn btn-primary" onclick="userauth();">Login</a>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		
    
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery.jcryption.3.1.0.js"></script>
	<script src="js/common.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
		$(function() {
   		 $("form").jCryption();
		});
	</script>
		
</body>

</html>
