<!--Created by Mr Gimli
    Date:2019/04/05
-->
<?php
require 'configDB/config.php';
?>
<!DOCTYPE HTML>
<!DOCTYPE html>
<html>
<head>
	<!-- This how we can linl--><link rel="stylesheet" type="text/css" href="style.css">
	<title>My first website</title>
	
</head>
<body style="background-color:#808080" >
	<div id="top-bar">
		<center>
			<img src="images/logo.png" class="logo">
			<h1 style="color:#DAA520">Research Conclave, 2020</h1>
			<h2  style="color:#DAA520">Indian Institute of Technology Guwahati , Assam</h2>
		</center>
	</div>
	<!--div><img src="images/iitg.jpg" class="iitg"></div-->
	<div id="main-wrapper" >

		<center>
			<h2 style="color:#00008B">Login Form</h2>
		</center>
		<form name="myform" action="index.php" method="post">
			<label><b>Username</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="username" required=""><br>
			<label><b>Password</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="password" required=""><br>
			<center>
				<input name="login_btn" type="submit" id="login_btn" value="Login"><br>
				<a href="registration.php"><input name="sign_btn" type="button" id="sign_btn" value="Sign Up">
			</center>
			
		</form>
		<?php
		if(isset($_POST['login_btn']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			//$password=$_POST['password'];

			$query="SELECT * FROM userinfo_table WHERE username='$username' AND password='$password'";
			$query_run=mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)!=0)
			{
				//valid
				$_SESSION['username']=$username;
				header('location:home.php');
			}
			else
			{
				//invalid
				echo'<script type="text/javascript">alert("Wrong input")</script>';
			}


		}
		?>

	</div>	
</body>
</html>