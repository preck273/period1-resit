<?php
    include_once "includes/signup.inc.php";
?>

<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="UFT-8">
			<link rel="stylesheet" href="css/signup.css">
			<link rel="stylesheet" href="css/style.css">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Registration</title>
		</head>
		<body>
			<div>
				<a href="index.php"><img src="img/logo3.jpg" alt="logo picture" class="logo"></a>
				<nav class="thenav">
					<a href="index.php">Home</a>
					<div class="tracks">
						<button class="trackbtn">Tracks</button>
						<div class="track-menu">
							<a href="italiantrack.php">Italian</a>
							<a href="asiantrack.php">Asian</a>
							<a href="easterntrack.php">East-European</a>
						</div>
					</div>
					<a href="signup.php">Sign-up</a>
					<a href="login.php">Login</a>
				</nav>
		</div>
			<div class="wrapper">
				<div class="container">
					<div class="signup-form">
						<form action="" method="post">
                            <div class="success"> <?php echo $success_msg; ?></div>
							<h2>Create an account</h2><br>
							<p><lable for="first-name">First Name</lable></p>
							<p><input type="text" name="first-name" value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>">
							<div class="error"> <?php echo $firstName_err;?> </div></p><br>

							<p><lable for="last-name">Last Name</lable></p>
							<p><input type="text" name="last-name" value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>">
							<div class="error"> <?php echo $lastName_err;?> </div></p><br>

							<p><lable for="home-address">Home Address</lable></p>
							<p><input type="text" name="home-address" value="<?php echo isset($_POST['home-address']) ? $_POST['home-address'] : '' ?>">
							<div class="error"> <?php echo $address_err;?> </div></p><br>

							<p><lable for="postal-code">Postal Code</lable></p>
							<p><input type="text" name="postal-code" value="<?php echo isset($_POST['postal-code']) ? $_POST['postal-code'] : '' ?>">
							<div class="error"> <?php echo $postal_err;?> </div></p><br>

							<p><lable for="town">Town</lable><br></p>
							<p><input type="text" name="town" value="<?php echo isset($_POST['town']) ? $_POST['town'] : '' ?>">
							<div class="error"> <?php echo $town_err;?> </div></p><br>

							<p><lable for="phone">Telephone Number</lable></p>
							<p><input type="text" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
							<div class="error"> <?php echo $phone_err;?> </div></p><br>

							<p><lable for="email">Email Address</lable></p>
							<p><input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
							<div class="error"> <?php echo $email_err;?> </div></p><br>

							<p><lable for="dob">DOB</lable></p>
							<p><input type="text" name="dob" placeholder="yyy-mm-dd" value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : '' ?>">
							<div class="error"> <?php echo $dob_err;?> </div></p><br>

							<p><lable for="username">Username</lable></p>
							<p><input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>">
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
			</div><br>
		</body>
	</html>