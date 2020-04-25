<html>
<head>
<title>Sign In</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!--- Include the above in your HEAD tag -->
</head>
<body>
<div class="container">
<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form method="post">
			<fieldset>
				<h2>Please Sign In</h2>
				<hr class="colorgraph">
				<div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" required>
				</div>
				<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required>
				</div>
				<span class="button-checkbox">
					Want to create new user? 
					<a href="signup.php" name="signup" class="btn btn-link pull-center">Sign Up<a>
					<a href="forgot.php" name="forgot" class="btn btn-link pull-right">Forgot Password?</a>
				</span>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" name="sign" class="btn btn-lg btn-success btn-block" value="Sign In">
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="reset" name="sign" class="btn btn-lg btn-danger btn-block" value="Clear">
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/index.min.js"></script>
</body>
</html>