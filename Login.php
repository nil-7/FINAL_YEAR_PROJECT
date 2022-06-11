<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$login = false;	
	$showError = false;
	include '_dbConn\dbConnect.php';
	$username=$_POST["username"];
	$password=$_POST["password"];
	$sql="select * from users where username='$username' AND password='$password'";
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);
	if($num == 1){
		$login = true;
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header("location: newhtml.html");

	}
	else{
		$showError = true;

 	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="login_style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
	crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
  
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
		<h1 class="heading" style='font-family: "Times New Roman", Times, serif;'>Login</h1>
		

		<form class="login-form" action="\Final Year Project\FINAL_YEAR_PROJECT-main\Login.php" method="post">
			<input type="text" name="username" placeholder="Username"required pattern="[a-zA-Z]{3,49}" />
			<input type="password" name="password" placeholder="Password" required pattern="[a-zA-Z0-9]{3,49}" />
			<button type="submit" class="btn btn-primary"
			style="border-bottom-width: 0px;border-top-width: 0px;border-right-width: 0px;
			border-left-width: 0px;padding-bottom: 14px;padding-top: 14px;">Login</button>
			<p class="message">Not Registered? <a href="register.php">Register</a></p>
		</form>
	</div>
	<?php
	if(!empty($login) || !empty($showError)){
	if($login){
	echo '
	<div class="alert alert-success" role="alert" style="margin-top: -138px;">
	Your are now Logged in !
</div> ';}
if($showError){
	echo '
	<div class="alert alert-danger" role="alert" style="margin-top: -138px;">
	<strong>Error!</strong> Invaid Credentials..
</div> ';}}
	?>
</div>



 <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
 <script type="text/javascript">
 	$('.message a').click(function(){
 		$('form').animate({height:"toggle",opacity:"toggle"},"slow");
 	});
 	
 
 </script> -->
</body>
</html>