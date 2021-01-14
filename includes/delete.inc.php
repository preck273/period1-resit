<?php
    require_once "conndb.php";

        $delete = "DELETE FROM course WHERE course_code =?";
    if($stmt = mysqli_prepare($conn, $delete))
    {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);
        if(mysqli_stmt_execute($stmt))
        {
            header('location: ..\viewcourse.php');
            //echo "delete successful";       
        }
        else
        {
            echo "Error could not execute" . mysqli_error($conn);
        }
        
    } 
    mysqli_stmt_close($stmt);
    mysqli_close($conn);