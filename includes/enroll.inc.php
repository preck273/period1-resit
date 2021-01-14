<?php
    require_once "conndb.php";
    session_start();

    if(isset($_POST['submit']))
    {
        $check="";
        $check = $_POST['check'];
        // var_dump($check);
       

         $sql = "INSERT INTO connection (course_code, student_code) VALUES (?, ?)";

         if($stmt = mysqli_prepare($conn, $sql))
         {
            //bind variable
            foreach($check as $element)
            {
                mysqli_stmt_bind_param($stmt, 'ii', $element, $_SESSION['valid_id']);

                if(mysqli_stmt_execute($stmt))
                {
                    //Statement succesfull
                    header('Refresh:1; url=..\enrollment.php');
                    echo '<script language="javascript">';
                    echo 'alert("Enrolled successfully ")';
                    echo '</script>';
                    exit;
                }
                else
                {
                    echo mysqli_error($conn);
                    exit;
                }
            }
         }
         else{
             echo mysqli_error($conn);
         }

         mysqli_stmt_close($stmt);
         mysqli_close($conn);
  }