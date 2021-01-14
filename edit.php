<?php

    include_once "header.php";
    require_once "includes/update.inc.php";
?>
    
    <div class="add-wrapper">
		<div class="add-container">
			<div class="signup-form">
                <form action="" method="post">
                    <div class="success"> <?php  echo $success_msg; ?></div> 
                    <h2>Update Track/course</h2><br>
                    <p><label for="courseCode">Course Code</label></p>
                    <p><input type="text" name="courseCode" value="<?php echo $courseCode ?>"></p><br>
                    
                    <p><label for="courseName">Course Name</label></p>
                    <p><input type="text" name="courseName"  value="<?php echo $courseName; ?>"></p><br>
                    
                    <p><label for="track">Style(Track)</label></p>
                    <p><input type="text" name="track"  value="<?php echo $track; ?>"></p><br>

                    <p><label for="start-date">Start Date</label></p>
                    <p><input type="text" name="start-date" placeholder="yyy-mm-dd"  value="<?php echo $startDate; ?>"></p><br>

                    <p><label for="end-date">End Date</label></p>
                    <p><input type="text" name="end-date" placeholder="yyy-mm-dd" value="<?php echo $endDate; ?>"></p><br>
                
                    <p><label for="price">Price</label></p>
                    <p><input type="text" name="price"  value="<?php echo $price; ?>"></p><br>
                    
                    <input type="submit" name="submit" value="Update" id="add">               
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>