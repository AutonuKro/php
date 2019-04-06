
<?php
require 'configDB/config.php';
?>
<!DOCTYPE HTML>
<!DOCTYPE html>
<html>
<head>
	<!-- This how we can linl-->
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>My first website</title>
	
</head>
<body style="background-color:#808080">
	<div id="top-bar">
		<center>
			<img src="images/logo.png" class="logo">
			<h1 style="color:#DAA520">Research Conclave, 2020</h1>
			<h2  style="color:#DAA520">Indian Institute of Technology Guwahati , Assam</h2>
		</center>
	</div>
	<div id="main-wrapper" >
		<center>
			<h2 style="color:#00008B">Registration Form</h2>
		</center>
		<form name="myform" action="registration.php" method="post">
			<label><b>Username</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="username" required><br>
			<label><b>Password</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="password" required><br>
			<label>Confirm Password</label><br>
			<input name="confirm" type="password" class="inputvalues" placeholder="retype password" required><br>
			<center>
				<input name="confirm_btn" type="submit" id="confirm_btn" value="Confirm"><br>
				<a href="index.php"><input name="back_btn" type="button" id="back_btn" value="Back">
			</center>
		</form>
			<?php
			if(isset($_POST['confirm_btn']))
			{
				//alert box
				//echo '<script type="text/javascript">alert("Confirm is clicked")</script>';
				$username=$_POST['username'];
				$password=$_POST['password'];
				$confirm=$_POST['confirm'];

				if($password==$confirm)
				{
					$query="SELECT * FROM userinfo_table WHERE username = '$username'";
					$query_run=mysqli_query($con,$query);
					if(mysqli_num_rows($query_run)!=0)
					{
						//uesrname already exit.
						echo '<script type="text/javascript">alert("Username already exits...try another name!")</script>';
					}
					else
					{
						$query="INSERT INTO userinfo_table VALUES('$username','$password')";
						$query_run=mysqli_query($con,$query);
						if($query_run)
						{
							echo '<script type="text/javascript">alert("Ok")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Not ok")</script>';
						}
					}
				}
			}
			?>

	</div>	
</body>
</html>