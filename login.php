<?php

    include_once 'includes/login.inc.php';
	
	$pageTitle = "Sign UP";
	$pageHeading = "Welcome Back!";
	$background = true;
	include('includes/header.php');
?>


			<div class="wrapper">
				<div class="container">
					<div class="signup-form">
						<form action="" method="post">
                            <h2>Log In</h2><br>
                            <div class="error-login"> <?php echo $user_err.'<br>' ;?></div>
                            <div class="error-login"> <?php echo $pass_err; ?></div>
                            <div class="success"> <?php echo $success_msg; ?></div>

							<p><lable id="user" for="username">Username</lable></p>
							<p><input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"></p><br>
							
							<p><lable for="pass1">Password</lable></p>
							<p><input type="password" name="pass"></p><br>
					
							<p><input type="submit" name="submit" id="submit" value="Log In"></p><br>
							<p>Don't have an account yet?<a href="signup.php"> Register Now</a></p>

						</form>
					</div>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>
		