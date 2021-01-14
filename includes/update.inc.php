<?php
    require_once "conndb.php";
    
     $success_msg = "";

    if(isset($_POST['submit']))
    {

        $courseCode = $_POST['courseCode'];
        $courseName = $_POST['courseName'];
        $track = $_POST['track'];
        $startDate = $_POST['start-date'];
        $endDate = $_POST['end-date'];
        $price = $_POST['price'];

        // query to update, we use the ? since the value to be updated is unknown.
        $query = "UPDATE course SET course_code =?, course_name =?, style=?, start_date =?, end_date =?, price=? WHERE course_code =?";

        if($stmt=mysqli_prepare($conn,$query)){
		
			 // bind_param tells php which variables that should be substituted for the ?	
			// the variable is bind to the user input
			mysqli_stmt_bind_param($stmt,"issssii",$courseCode, $courseName, $track, $startDate, $endDate, $price, $_GET["id"]);
            if(mysqli_stmt_execute($stmt))
            {
			
                $success_msg = "Updated Successfully";			

            }
            else
            {
                echo "Unable to Update ".mysqli_error($conn);            
            }

			mysqli_stmt_close($stmt);
        }
        header('Refresh:2; url=viewcourse.php'); //redirect to the viewcourse after updating
	}	

		
    
        
	//To display the values you want to update in the form you have to first of all query the db to select from the database
	$fetch = "SELECT course_code, course_name, style, start_date, end_date, price  FROM course WHERE course_code=?";

	if($stmt = mysqli_prepare($conn,$fetch)){

        // the i is an integer repesenting the bugreportid =?
        //use the $_GET to access the id via the url
        mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);
        
		if(mysqli_stmt_execute($stmt)){
            //echo 'Execution Successful';
        }else{
            die("Excution fail" . mysqli_error($conn));
          }
        }
    
       echo "<br>";
		//bind and store result for select query to fetch and display the data
		mysqli_stmt_bind_result($stmt, $courseCode, $courseName, $track, $startDate, $endDate, $price);
		mysqli_stmt_store_result($stmt);

        //Check if there are results in the stmt
        if(mysqli_stmt_num_rows($stmt) != 0){
            //Fetch all rows of data from the result stmt
		while(mysqli_stmt_fetch($stmt)){
		
        }	
	mysqli_stmt_close($stmt);
      }
    
	mysqli_close($conn);
  