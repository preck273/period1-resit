<?php

    include_once "header2.php";
    require_once "includes/conndb.php";

    $fetch = "SELECT DISTINCT style, course_code, course_name, start_date, end_date, price FROM course WHERE style = ?";

            if($statement = mysqli_prepare($conn, $fetch))
            {
                //use the $_GET to access the id via the url
                 mysqli_stmt_bind_param($statement, "s", $_GET["id"]);

                if(mysqli_stmt_execute($statement)){
                    //echo 'Execution Successful';
                }else{
                    die("Excution fail" . mysqli_error($conn));
                }
            } 
            
            mysqli_stmt_bind_result($statement, $track, $id, $courseName, $startDate, $endDate, $price);
            mysqli_stmt_store_result($statement);


            //Check if there are results in the stmt
            if(mysqli_stmt_num_rows($statement) != 0){
                 
                ?>
                <div class="enroll">
                <div style="overflow-x:auto;"> 
                <form method="post" action="includes/enroll.inc.php">
                     <table>
                        <th>S/N</th>
                        <th>Track</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Price</th>
                        <th>Check in</th>
                        
                     
                    <?php
                         $counter = 1;
                //Fetch all rows of data from the result stmt
            while(mysqli_stmt_fetch($statement)){
                echo '<tr>';
                    
                     echo "<td>" . $counter++ . "</td>";
                     echo "<td>" . $track . "</td>";
                     echo "<td>" . $id . "</td>" ;
                     echo "<td>" . $courseName . "</td>" ;
                     echo "<td>" . $startDate . "</td>" ;
                     echo "<td>" . $endDate . "</td>" ;
                     echo "<td>" . $price . "</td>" ;
                     echo "<td id ='edit-btn'><input type ='checkbox' name='check[]' value='".$id."'></td>";
                 echo '</tr>';
            }
                 ?>															
                 </table>
                 <input type="submit" name="submit" id="enroll-btn" value="Enroll">  
                 </form>
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