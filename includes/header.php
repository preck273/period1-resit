<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UFT-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $pageTitle; ?></title>
		<link rel="stylesheet" type="text/css" href="css/signup.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="<?php if($background)echo "background"; ?>">
		<div>
			<header class="<?php if(!$background) echo "theheader"; else echo "header-padding"; ?>">
			<img src="img/logo3.jpg" alt="logo picture" class="logo">
				<nav class="thenav">
					<a href="index.php">Home</a>
					<div class="tracks">
						<button class="trackbtn">Tracks</button>
						<div class="track-menu">
							<a href="trackcontent.php?page=italian">Italian</a>
							<a href="trackcontent.php?page=asian">Asian</a>
							<a href="trackcontent.php?page=eastern">East-European</a>
						</div>
					</div>
					<a href="signup.php">Sign-up</a>
					<a href="login.php">Login</a>
				</nav>
				<h1 class="title"><?php echo $pageHeading ?></h1>
				<span class="slogan">
					<?php if(!$background) echo "<p><i>A trusted place where your turn your cooking passion into a culinary career with in-demand skills </i></p>"; ?>
				</span>
			</header>