<?php

  //Initialize the session
  session_start();
  // Check if the user is logged in(In the correct way before accessing this page), if not then redirect him to login page
  if(!isset($_SESSION["valid_id"]) || !isset($_SESSION["valid_useradmin"])){
      //redirect to login page
         header("location: adminlogin.php");
          exit();
  }

    include_once "header.php";
    require_once "includes/add.inc.php";
?>

    <div class="add-wrapper">
		<div class="add-container">
			<div class="signup-form">
                <form action="" method="post">
                    <div class="success"> <?php echo $success_msg; ?></div> 
                    <h2>Add new course</h2><br>
                    <p><label for="courseCode">Course Code</label></p>
                    <p><input type="text" name="courseCode" value="<?php echo isset($_POST['courseCode']) ? $_POST['courseCode'] : '' ?>">
                    <div class="error"> <?php echo $cc_err;?> </div></p><br>
                    <p><label for="courseName">Course Name</label></p>
                    <p><input type="text" name="courseName"  value="<?php echo isset($_POST['courseName']) ? $_POST['courseName'] : '' ?>">
                    <div class="error"> <?php echo $cn_err;?> </div></p><br>
                    <p><label for="track">Style(Track)</label></p>
                    <p><input type="text" name="track"  value="<?php echo isset($_POST['track']) ? $_POST['track'] : '' ?>"></p>
                    <div class="error"> <?php echo $tr_err;?> </div></p><br>

                    <p><label for="start-date">Start Date</label></p>
                    <p><input type="text" name="start-date" placeholder="yyy-mm-dd"  value="<?php echo isset($_POST['sd']) ? $_POST['sd'] : '' ?>"></p>
                    <div class="error"> <?php echo $sd_err;?> </div></p><br>

                    <p><label for="end-date">End Date</label></p>
                    <p><input type="text" name="end-date" placeholder="yyy-mm-dd"  value="<?php echo isset($_POST['ed']) ? $_POST['ed'] : '' ?>"></p>
                    <div class="error"> <?php echo $ed_err;?> </div></p><br>

                    <p><label for="price">Price</label></p>
                    <p><input type="text" name="price"  value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>">
                    <div class="error"> <?php echo $pr_err;?> </div></p><br>

                    <input type="submit" name="submit" value="Submit" id="add">
                
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>
    