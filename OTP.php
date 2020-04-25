<?php require_once("session.php"); ?>
<?php require_once("function.php"); ?>
<?php
if(isset($_POST['send']))
{
	$mobile = $_POST['num'];
	if(empty($mobile)){
		$_SESSION['ErrorMessage']="Please enter mobile no";
		redirect("OTP.php");
	}/*
	elseif(strlen($mobile>10)){
		$_SESSION['ErrorMessage']="Invalid Phone No. ";
		redirect("OTP.php");
	}*/
	else{
	$gotp = mt_rand(100000,999999);
	$field = array(
    "sender_id" => "FSTSMS",
    "language" => "english",
    "route" => "qt",
    "numbers" => $nu,
    "message" => "YOUR TEMPLATE ID",
    "variables" => "YOUR VARIBALE NAMES here",
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
    "authorization: YOUR API KEY HERE",
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
	redirect("Verify.php");
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
                    <input type="number" name="num" id="num" class="form-control input-lg" placeholder="Phone Number">
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" name="send" class="btn btn-lg btn-primary btn-block" value="Sign Up">
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