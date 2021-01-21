<?php
  session_start();
  include_once "header2.php";
  require_once "includes/conndb.php";
  $valid_user = $_SESSION["valid_id"]; // uses session to get the user information
    $fetch = "SELECT  DISTINCT c.course_code,  c.style, c.course_name, c.start_date
                FROM course AS c
                JOIN connection AS con ON con.course_code=c.course_code
                JOIN student AS s ON  s.student_Code=con.student_code WHERE s.student_code ='$valid_user'";
            
        if($statement = mysqli_prepare($conn, $fetch)){
                    
            if(mysqli_stmt_execute($statement)){
                //echo 'Execution Successful';
            }else{
                die("Excution fail" . mysqli_error($conn));
            }
        } 

        mysqli_stmt_bind_result($statement, $id, $track,  $courseName, $startDate);
        mysqli_stmt_store_result($statement);

        //Check if there are results in the statement
        if(mysqli_stmt_num_rows($statement) != 0){

            ?>
                <div class="enroll">
                <div style="overflow-x:auto;">
                    <table>
                        <th>S/N</th>
                        <th>Course Code</th>
                        <th>Style(Track)</th>
                        <th>Course Name</th>
                        <th> Start Date</th>
                        <?php
                        $counter = 1;
                        //Fetch all rows of data from the result statement
                        while(mysqli_stmt_fetch($statement)){
                            echo '<tr>';
                            
                            echo "<td>" . $counter++ . "</td>";
                            echo "<td>" . $id . "</td>" ;
                            echo "<td>" . $track . "</td>" ;
                            echo "<td>" . $courseName . "</td>";
                            echo "<td>" . $startDate . "</td>";

                            
                           // echo "<td id='edit-btn'><a href='edit.php?id=" . $id. "'>Edit</td>";
                            //echo "<td id='danger-btn'><a onClick=\"javascript: return confirm('Are you sure you want to delete this?');\" href='includes/delete.inc.php?id=".$id."'>Delete</td>";                  
                            echo '</tr>';
                        }
                        ?>
                                                                                        
                    </table>
                </div>
             </div>
         </div>
        </div>
         </body>
        </html>								
           
                <?php     
                    }
                    mysqli_stmt_close($statement);
                    mysqli_close($conn);               
                ?>
