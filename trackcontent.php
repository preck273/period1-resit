	<?php 
		// Multi-dimentional array to store info on all three tracks
		$tracksinfo = [];
		$tracksinfo['italian'] = [
			"pageTitle" => "Italian Track",
			"pageHeading" =>"The Italian Track",
			"track-heading" => "Welcome to the Italian track",
			"image-position1" => "img/italia1.jpg",
			"image-position2" => "img/italia2.jpg",
			"subheading1" => "Vivamus a tellus",
			"subheading2" => "Voluptate velit",
			"subheading3" => "Ut enim ad minim veniam",
			"subheading4" => "minim veniam",
			"subheading5" => "semper risus"];
			
		$tracksinfo['asian'] = [
			"pageTitle" => "Asian Track",
			"pageHeading" =>"The Asian Track",
			"track-heading" => "Welcome to the Asian track",
			"background =>" => "asianbackground1",
			"image-position1" => "img/asia1.jpg",
			"image-position2" => "img/asia2.jpg",
			"subheading1" => "sodales ut etiam",
			"subheading2" => "habitasse platea dictumst",
			"subheading3" => "Mattis molestie",
			"subheading4" => "Ac auctor augue mauris",
			"subheading5" => "consectetur adipiscing",
			"background1" => "asianbackground2",
			"arrow"       => "asianarrow"];
		
		$tracksinfo['eastern'] = [
			"pageTitle" => "Eastern European Track",
			"pageHeading" =>"The Eastern European Track",
			"track-heading" => "Welcome to the Eastern European track",
			"background =>" => "easternbackground1",
			"image-position1" => "img/eastern1.jpg",
			"image-position2" => "img/eastern2.jpg",
			"subheading1" => "mauris commodo",
			"subheading2" => "Tortor dignissim convallis",
			"subheading3" => "ultrices sagittis orci",
			"subheading4" => "voluptate velit esse",
			"subheading5" => "commodo nulla facilisi",
			"background1" => "easternbackground2",
			"arrow"       => "easternarrow"];
			
			
		$track = "italian";			
		// using the $_GET to call the $page variable when clicked on a track then use statements to sort the information.
		if($_GET["page"] == "italian"){
			$track = "italian";
		}elseif($_GET["page"] == "asian"){
			$track = "asian";
		}elseif($_GET["page"] == "eastern"){
			$track = "eastern";
		}else{
			$track = NULL;
		}
			
		$pageTitle = $tracksinfo[$track]["pageTitle"];
		$pageHeading = $tracksinfo[$track]["pageHeading"];	
		$background = false;
		
		include("includes/header.php"); ?>
		
		<main>
			<h2 class="track-heading"><?php echo $tracksinfo[$track]["track-heading"]; ?></h2>
			<section class="track-section1" id="<?php echo $tracksinfo[$track]["background"]; ?>"">				
				<div class="info-block">
					<img src="<?php echo $tracksinfo[$track]["image-position1"]; ?>" alt="food" class="image-position">
					<div  class="info-position">
						<p class="para-style">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere,
					magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna</p>
						<p class="para-style">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
						Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
						Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
					</div>
				</div>
				<div class="info-block">
					<div class="info-position">
						<p class="para-style">Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
					Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. 
					Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. 
					Ut nonummy.</p>
						<p class="para-style">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
						Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
						Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
					</div>
					<img src="<?php echo $tracksinfo[$track]["image-position2"]; ?>" alt="food" class="image-position">
				</div>				
			</section>
			<section>
				<h2 class="track-heading">List of courses you can expect from this track</h2>
				<h3 class="subheading"><?php echo $tracksinfo[$track]["subheading1"]; ?></h3>
				<p class="para-style">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
					Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
					nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
					
				<h3 class="subheading"><?php echo $tracksinfo[$track]["subheading2"]; ?></h3>
				<p class="para-style">Tincidunt arcu non sodales neque sodales ut etiam. In nisl nisi scelerisque eu ultrices vitae auctor. 
				Velit egestas dui id ornare. Amet commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Eget felis eget nunc lobortis mattis. 
				Pretium viverra suspendisse potenti nullam ac tortor vitae. Ac auctor augue mauris augue neque gravida in fermentum. 
				Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis. Varius quam quisque id diam vel. Est lorem ipsum dolor sit amet.
				Eu feugiat pretium nibh ipsum. In iaculis nunc sed augue lacus viverra. Tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. </p>

				<h3 class="subheading"><?php echo $tracksinfo[$track]["subheading3"]; ?></h3>
				<p class="para-style">Orci eu lobortis elementum nibh tellus molestie. Cursus in hac habitasse platea dictumst quisque sagittis purus. Tellus in metus vulputate eu. 
				Rhoncus urna neque viverra justo nec ultrices dui sapien. Luctus accumsan tortor posuere ac ut consequat. Quam adipiscing vitae proin sagittis. 
				Pellentesque habitant morbi tristique senectus. Sit amet massa vitae tortor condimentum lacinia quis vel eros. Cursus metus aliquam eleifend mi in nulla. 
				Amet facilisis magna etiam tempor orci eu lobortis elementum nibh. Et malesuada fames ac turpis egestas sed tempus urna et. </p>
				
				<h3 class="subheading"><?php echo $tracksinfo[$track]["subheading4"]; ?></h3>
				<p class="para-style">Pretium viverra suspendisse potenti nullam. Id semper risus in hendrerit gravida rutrum quisque non. Accumsan lacus vel facilisis volutpat est velit. 
				Aliquet eget sit amet tellus cras adipiscing enim. Sollicitudin aliquam ultrices sagittis orci a. Tortor dignissim convallis aenean et tortor at. 
				Neque gravida in fermentum et sollicitudin ac orci. Etiam non quam lacus suspendisse faucibus. Egestas erat imperdiet sed euismod nisi porta lorem. </p>
				
				<h3 class="subheading"><?php echo $tracksinfo[$track]["subheading5"]; ?></h3>
				<p class="para-style">Mattis molestie a iaculis at. Egestas purus viverra accumsan in nisl nisi scelerisque eu ultrices. Est ullamcorper eget nulla facilisi etiam dignissim. 
				Morbi tincidunt augue interdum velit euismod. Elit sed vulputate mi sit amet mauris commodo. Pellentesque adipiscing commodo elit at imperdiet dui accumsan sit. 
				Praesent tristique magna sit amet purus gravida. Quam viverra orci sagittis eu volutpat odio facilisis mauris sit. Condimentum vitae sapien pellentesque habitant morbi. </p>
			</section>
			<section class="track-section3" id="<?php echo $tracksinfo[$track]["background1"]; ?>"">
				<h2 class="track-heading1">Interested!! After you have signed up, come and enroll below</h2>
				<span class="down-arrow" id="<?php echo $tracksinfo[$track]["arrow"]; ?>"">&dArr;</span>
				<a href="login.php"><button class="enroll">Enroll</a></button>
			</section>
		</main>
	<?php include("includes/footer.php"); ?>