<?php
    require_once "conndb.php";
  // define variables and set to empty values else the error message won't display on the form.
    $cc_err = $cn_err = $tr_err = $sd_err = $ed_err = $pr_err = $success_msg = "";
    
    if(isset($_POST['submit']))
    {
        $courseCode = $_POST['courseCode'];
        $courseName = $_POST['courseName'];
        $track = $_POST['track'];
        $startDate = $_POST['start-date'];
        $endDate = $_POST['end-date'];
        $price = $_POST['price'];

        //validate form
        if(empty($courseCode))
        {
            $cc_err = "Please fill in the Course code";
        }

        if(empty($courseName))
        {
            $cn_err = "Please fill in the Course name";
        }

        if(empty($track))
        {
            $tr_err = "Please fill in the course track";
        }

        if(empty($startDate))
        {
            $sd_err = "Please fill in the start date";
        }

        if(empty($endDate))
        {
            $ed_err = "Please fill in the end date";
        }

        if(empty($price))
        {
            $pr_err = "Please fill in the Course price";
        }

          //if all fields are not empty save user details to the database
        if(!empty($courseCode) && !empty($courseName) && !empty($track) && !empty($startDate) && !empty($endDate) && !empty($price))
        {
             //clean the form data before sending to database
             $cc = mysqli_real_escape_string($conn, $courseCode);
             $cn = mysqli_real_escape_string($conn, $courseName);
             $tr = mysqli_real_escape_string($conn, $track);
             $std = mysqli_real_escape_string($conn, $startDate);
             $edd = mysqli_real_escape_string($conn, $endDate);
             $pr = mysqli_real_escape_string($conn, $price);

             //insert into database
             $sql = "INSERT INTO course (course_code, course_name, style, start_date, end_date, price) 
             VALUES (?,?,?,?,?,?)";
                //prepare and bind the statment
             if($stmt = mysqli_prepare($conn,$sql))
             {
                $startDate = new DateTime;
                $start=$startDate->format('Y-m-d');
                $endDate = new DateTime;
                $end=$endDate->format('Y-m-d');
                mysqli_stmt_bind_param($stmt, "ssssss", $courseCode, $courseName, $track, $start, $end, $price);
                if(mysqli_stmt_execute($stmt))
                {                        
                    header('Refresh:2; url=viewcourse.php');
                    $success_msg = "New course added successful";
                }
                else
                {
                    echo "SOmething went wrong. Please try again later.".mysqli_error($conn);
                }
                mysqli_stmt_close($stmt);
            }
            mysqli_close($conn);
        
        }
    }
