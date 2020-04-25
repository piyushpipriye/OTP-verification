<?php require_once("session.php"); ?>
<?php require_once("function.php"); ?>
<?php
if (isset($_POST['conotp'])) {
		$otp = $_POST['otp'];
	if(empty($otp)){
		$_SESSION['ErrorMessage']="Please enter OTP";
		redirect("OTP.php");
	}
	elseif(strlen($otp>10)){
		$_SESSION['ErrorMessage']="OTP must be contain six no.";
		redirect("OTP.php");
	}
	$enotp = $_POST['otp'];
	if($_COOKIE['sotp']==$enotp){
		$_SESSION["SuccessMessage"] = "Mobile no. verified";
	}
	else{
		$_SESSION["ErrorMessage"] = "Incorrect OTP entered";
	}
}
?>
<html>
<head>
<title>Mobile No. Verification</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!--- Include the above in your HEAD tag -->
</head>
<body>
<div class="container">
<div class="row" style="margin-top:130px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form method="POST">
			<fieldset>
				<h2>Mobile No. Verification</h2>
				<hr class="colorgraph">
				<div> <?php echo Message(); 
			echo SuccessMessage();?> </div>
				<div class="form-group">
                    <input type="number" name="otp" id="otp" class="form-control input-lg" placeholder="Enter OTP">
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" name="conotp" class="btn btn-lg btn-success btn-block" value="Sign Up">
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
