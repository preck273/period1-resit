<?php
    include_once "includes/signup.inc.php";
?>

<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="UFT-8">
			<link rel="stylesheet" href="css/signup.css">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Registration</title>
		</head>
		<body>
			<div class="wrapper">
				<div class="container">
					<div class="signup-form">
						<form action="" method="post">
                            <div class="success"> <?php echo $success_msg; ?></div>
							<h2>Create an account</h2><br>
							<p><lable for="first-name">First Name</lable></p>
							<p><input type="text" name="first-name">
							<div class="error"> <?php echo $firstName_err;?> </div></p><br>

							<p><lable for="last-name">Last Name</lable></p>
							<p><input type="text" name="last-name">
							<div class="error"> <?php echo $lastName_err;?> </div></p><br>

							<p><lable for="home-address">Home Address</lable></p>
							<p><input type="text" name="home-address">
							<div class="error"> <?php echo $address_err;?> </div></p><br>

							<p><lable for="postal-code">Postal Code</lable></p>
							<p><input type="text" name="postal-code">
							<div class="error"> <?php echo $postal_err;?> </div></p><br>

							<p><lable for="town">Town</lable><br></p>
							<p><input type="text" name="town">
							<div class="error"> <?php echo $town_err;?> </div></p><br>

							<p><lable for="phone">Telephone Number</lable></p>
							<p><input type="text" name="phone">
							<div class="error"> <?php echo $phone_err;?> </div></p><br>

							<p><lable for="email">Email Address</lable></p>
							<p><input type="text" name="email">
							<div class="error"> <?php echo $email_err;?> </div></p><br>

							<p><lable for="dob">DOB</lable></p>
							<p><input type="date" name="dob">
							<div class="error"> <?php echo $dob_err;?> </div></p><br>

							<p><lable for="username">Username</lable></p>
							<p><input type="text" name="username">
							<div class="error"> <?php echo $usrn_err;?> </div></p><br>

							<p><lable for="pass1">Password</lable></p>
							<p><input type="password" name="pass1">
							<div class="error"> <?php echo $pass1_err;?> </div></p><br>

							<p><lable for="pass2">Comfirm Password</lable></p>
							<p><input type="password" name="pass2">
							<div class="error"> <?php echo $pass2_err;?> </div></p><br>

							<p><input type="submit" name="submit" id="submit" value="Create an account"></p><br>
							<p>Do you already have an account?<a href="login.php"> Log In</a></p>

						</form>
					</div>
				</div>
			</div>
		</body>
	</html>