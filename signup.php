<?php require_once("session.php"); ?>
<?php
$nm = (isset($_POST['name']) ? $_POST['name'] : '');
$nu = (isset($_POST['num']) ? $_POST['num'] : '');
if(isset($_POST['send']))
{
	$gotp = mt_rand(100000,999999);
	$field = array(
    "sender_id" => "FSTSMS",
    "language" => "english",
    "route" => "qt",
    "numbers" => $nu,
    "message" => "26136",
    "variables" => "{#BB#}",
    "variables_values" => $gotp
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($field),
  CURLOPT_HTTPHEADER => array(
    "authorization: N6HPbQ57hIgWkkGKKB6PLjLumdb9xAZjKRp8qrd5Jg2so421SJTzo0RVQAOf",
    "cache-control: no-cache",
    "accept: */*",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	echo $response;
	setcookie('sotp',$gotp,2*30);
	$_SESSION['SuccessMessage']="OTP sent successfully";
}
}
if (isset($_POST['conotp'])) {
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
<title>Sign Up</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!--- Include the above in your HEAD tag -->
</head>
<body>
<div class="container">
<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form method="POST">
			<fieldset>
				<h2>Sign Up</h2>
				<hr class="colorgraph">
				<div> <?php echo Message(); 
			echo SuccessMessage();?> </div>
				<div class="form-group">
                    <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Name" value="<?php echo $nm; ?>" required>
				</div>
				<div class="form-group">
                    <input type="number" name="num" id="num" class="form-control input-lg" placeholder="Phone Number" value="<?php echo $nu; ?>" required>
                   <span class="button-checkbox">
                   Verify Phone number? 
                   <input type="submit" name="send" class="btn-link pull-center " value="Send OTP">
				</span>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
                    		<input type="number" name="otp" id="otp" class="form-control input-sl" placeholder="Enter OTP" required>
                		</div>
                		<div class="col-xs-6 col-sm-6 col-md-6">
                        	<input type="submit" name="conotp" class="btn btn-sl btn-primary btn-block" value="Submit">
						</div>
                	</div>
				</div>
				<div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" required>
				</div>
				<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required>
				</div>
				<div class="form-group">
                    <input type="password" name="cpassword" id="cpassword" class="form-control input-lg" placeholder="Confirm Password" required>
				</div>
				<span class="button-checkbox">
					Already an Account? 
					<a href="index.php" name="signup" class="btn btn-link pull-center">Sign In</a>
				</span>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" name="sign" class="btn btn-lg btn-success btn-block" value="Sign Up">
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
