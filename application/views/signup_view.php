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
 <style type="text/css">
    #register-form label.error, .output {color:#FB3A3A;font-weight:bold;margin-left:2%;}
  </style>

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
				<a class="navbar-brand"><span>Admin</span>Panel</a>
				
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
    <br><br>	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Create an account</div>
				<div class="panel-body">
					<form id ="register-form" role="form" action="addsignup" method="post" class="form-horizontal" novalidate="novalidate">
						<fieldset>
							
								<div class="form-group">
								<input id ="full_name" class="form-control" type="text"  name="full_name" placeholder="Your full name">
								</div>

								<div class="form-group">
								<input id = "email" class="form-control" type="text" name="email" placeholder="Your Email">
								</div>

								<div class="form-group">
								<input id="user_name" class="form-control" type="text" value="" name="user_name" placeholder="Your username">
								</div>

								<div class="form-group">
								<input id ="oldpwd" class="form-control" type="password" name="oldpwd"  placeholder="Your password">
								</div>

								<div class="form-group">
								<input id ="pass_word" class="form-control" type="password"  name="pass_word" placeholder="Your password confirm">
								</div>
						     
						       <button id = "btnsubmit" type="submit" class="btn btn-primary">Submit</button>
										
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<!--<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	-->
	<script src="js/validate.js"></script>
	<script src="js/common.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
  	$("#btnsubmit").click(function(event) 
  	{
  		validate();
  	});
 	</script>
		
	
</body>

</html>
