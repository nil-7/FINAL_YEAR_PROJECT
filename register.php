<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$showAlert = false;	
	$showError = false;
	$usernameError = false;
	$emailError = false;
	include '_dbConn\dbConnect.php';
	$username=$_POST["username"];
	$password=$_POST["password"];
	$cPassword=$_POST["cPassword"];
	$email=$_POST["email"];
// $exists=false;
	$existSql = "SELECT * FROM `users` WHERE username = '$username'";
	$existEmail = "SELECT * FROM `users` WHERE email = '$email'";
	$result = mysqli_query($conn,$existSql);
	$resultEmail = mysqli_query($conn,$existEmail);
	$numExistRows =mysqli_num_rows($result);
	$numExistEmail=mysqli_num_rows($resultEmail);
	if($numExistRows>0 ){
	// $exists = true;
		$usernameError = true;
	}
	else {
		if(($password == $cPassword)){
			if($numExistEmail>0){
				$emailError = true;
			}
			else{
				$sql="INSERT INTO `users` (`username`, `password`, `cPassword`, `email`) VALUES ('$username', '$password', '$cPassword', '$email')";
				$result = mysqli_query($conn,$sql);
				if($result){
					$showAlert = true;
				}
  			}
		}
		else{
			$showError = true;
 		}
	}
}?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="register_style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
	<title>Login Page</title>
</head>
<body>
<a href="newhtml.html"><img src="Images/LOGO - Dark Mode.png" class="logo" style="border-left-width: 0px;
	border-left-style: solid;border-right-style: solid;
	border-right-width: 0px;border-bottom-style: solid;
	border-bottom-width: 0px;
	border-top-width: 0px;border-top-style: solid;margin-left: 39px;margin-bottom: -6px;padding-bottom: 0px;
	padding-top: -1px;padding-right: 1px;padding-left: 0px;margin-top: 20px;
	margin-right: 8px;">
	</a>
	
<div class="login-page">

	<div class="form" style="border-top-width: 0px;border-top-style: solid;margin-top: 0px;top: -60px;">
		<h1 class="heading" style="font-size: 2.3rem;font-family: Times New Roman;margin-top: -23px;
		padding-top: 38px;border-bottom-width: 0px;
		border-bottom-style: solid;padding-bottom: 8px;">Register</h1>
	
		<form class="register-form" action="\Final Year Project\FINAL_YEAR_PROJECT-main\register.php" method="post">

			<input type="text" id="username" name="username" placeholder="Username" required  pattern="[A-Za-z]{3,49}" />
			<input type="password" id="password" name="password" placeholder="Password" required pattern="[a-zA-Z0-9]{3,49}" />
			<input type="password" id="cPassword" name="cPassword" placeholder="Confirm Password" required pattern="[a-zA-Z0-9]{3,49}" />
			<input type="email" id="email" name="email" required placeholder="Email ID"  />
			<button type="submit" class="btn btn-primary"
			style="border-bottom-width: 0px;border-top-width: 0px;border-right-width: 0px;
			border-left-width: 0px;padding-bottom: 14px;padding-top: 14px;">Create</button>
			<p class="message">Already Registered? <a href="login.php">Login</a></p>

</form>
	</div>

	<?php
	if(!empty($showAlert) || !empty($showError) || !empty($usernameError) || !empty($emailError)){
	if($showAlert){
		echo '
		<div class="alert alert-success" role="alert" style="margin-top: -138px;">
		<strong>Success! </strong>Your Account is Created.
		</div> ';
	}
	if($usernameError){
		echo '
		<div class="alert alert-danger" role="alert" style="margin-top: -138px;">
		Username Already <strong>Exists</strong> !
		</div> ';
	}
	if($emailError){
		echo '
		<div class="alert alert-danger" role="alert" style="margin-top: -138px;">
		Email Already <strong>Exists</strong> !
		</div> ';
	}
	if($showError){
		echo '
		<div class="alert alert-danger" role="alert" style="margin-top: -138px;">
		<strong>Error!</strong> Passwords Do not Match.
		</div> ';
	}
}?>
</div>
</body>
</html>