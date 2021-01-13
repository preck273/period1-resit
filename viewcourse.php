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
    require_once "includes/conndb.php";

    $fetch = "SELECT course_code, course_name, style, start_date, end_date, price FROM course";
            
        if($statement = mysqli_prepare($conn, $fetch)){
                    
            if(mysqli_stmt_execute($statement)){
                //echo 'Execution Successful';
            }else{
                die("Excution fail" . mysqli_error($conn));
            }
        } 

        mysqli_stmt_bind_result($statement, $id, $courseName, $track, $sd, $ed, $price);
        mysqli_stmt_store_result($statement);

        //Check if there are results in the statement
        if(mysqli_stmt_num_rows($statement) != 0){

        ?>

                <div style="overflow-x:auto;">
                    <table>
                        <th>S/N</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Style(Track)</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Price</th>
                        <th>Action</th>
                        <th>Action</th>

                        <?php
                        $counter = 1;
                        //Fetch all rows of data from the result statement
                        while(mysqli_stmt_fetch($statement)){
                            echo '<tr>';
                            
                            echo "<td>" . $counter++ . "</td>";
                            echo "<td>" . $id . "</td>" ;
                            echo "<td>" . $courseName . "</td>" ;
                            echo "<td>" . $track . "</td>" ;
                            echo "<td>" . $sd . "</td>" ;
                            echo "<td>" . $ed . "</td>" ;
                            echo "<td> $" . $price . "</td>" ;
                            
                            echo "<td id='edit-btn'><a href='edit.php?id=" . $id. "'>Edit</td>";
                            echo "<td id='danger-btn'><a onClick=\"javascript: return confirm('Are you sure you want to delete this?');\" href='includes/delete.inc.php?id=".$id."'>Delete</td>";                  
                            echo '</tr>';
                        }
                        ?>
                                                                                        
                    </table>
                </div>
             </div>
         </div>								
           
                <?php
                    
                    }
                    mysqli_stmt_close($statement);

                    mysqli_close($conn);

                    include_once "footer.php";
                ?>

