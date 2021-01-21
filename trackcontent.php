	<?php 
		include("includes/trackdata.php"); 
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
		
		include("includes/header.php"); 
	?>
		
		<main>
			<h2 class="track-heading"><?php echo $tracksinfo[$track]["track-heading"]; ?></h2>
			<section class="track-section1" id="<?php echo $tracksinfo[$track]["background"]; ?>">				
				<div class="info-blocka">
					<img src="<?php echo $tracksinfo[$track]["image-position1"]; ?>" alt="food" class="image-position">
					<div  class="info-position">
						<p class="para-style"><?php echo $tracksinfo[$track]["para1"]; ?></p>
						<p class="para-style"><?php echo $tracksinfo[$track]["para2"]; ?></p>
					</div>
				</div>
				<div class="info-blockb">
					<div class="info-position">
						<p class="para-style"><?php echo $tracksinfo[$track]["para3"]; ?></p>
						<p class="para-style"><?php echo $tracksinfo[$track]["para4"]; ?></p>
					</div>
					<img src="<?php echo $tracksinfo[$track]["image-position2"]; ?>" alt="food" class="image-position">
				</div>				
			</section>
			<section>
				<h2 class="track-heading">List of courses you can expect from this track</h2>
				<h3 class="subheading"><?php echo $tracksinfo[$track]["subheading1"]; ?></h3>
				<p class="para-style"><?php echo $tracksinfo[$track]["course-para1"]; ?></p>
					
				<h3 class="subheading"><?php echo $tracksinfo[$track]["subheading2"]; ?></h3>
				<p class="para-style"><?php echo $tracksinfo[$track]["course-para2"]; ?></p>

				<h3 class="subheading"><?php echo $tracksinfo[$track]["subheading3"]; ?></h3>
				<p class="para-style"><?php echo $tracksinfo[$track]["course-para3"]; ?></p>
				
				<h3 class="subheading"><?php echo $tracksinfo[$track]["subheading4"]; ?></h3>
				<p class="para-style"><?php echo $tracksinfo[$track]["course-para4"]; ?></p>
				
				<h3 class="subheading"><?php echo $tracksinfo[$track]["subheading5"]; ?></h3>
				<p class="para-style"><?php echo $tracksinfo[$track]["course-para5"]; ?></p>
			</section>
			<section class="track-section3" id="<?php echo $tracksinfo[$track]["background1"]; ?>">
				<h2 class="track-heading1">Interested!! After you have signed up, come and enroll below</h2>
				<span class="down-arrow" id="<?php echo $tracksinfo[$track]["arrow"]; ?>">&dArr;</span>
				<a href="login.php"><button>Enroll</button></a>
			</section>
		</main>
	<?php include("includes/footer.php"); ?>