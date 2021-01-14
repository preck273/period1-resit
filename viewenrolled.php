<?php
    include_once "header.php";
    require_once "includes/conndb.php";

    $fetch = "SELECT c.course_code, c.course_name, c.style, s.student_Code, s.first_name, s.last_name
                FROM course AS c
                JOIN connection AS con ON con.course_code=c.course_code
                JOIN student AS s ON  s.student_Code=con.student_code";
            
        if($statement = mysqli_prepare($conn, $fetch)){
                    
            if(mysqli_stmt_execute($statement)){
                //echo 'Execution Successful';
            }else{
                die("Excution fail" . mysqli_error($conn));
            }
        } 

        mysqli_stmt_bind_result($statement, $id, $courseName, $track, $studentCode, $firstname, $lastname);
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
                        <th>Student Code</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        
                        <?php
                        $counter = 1;
                        //Fetch all rows of data from the result statement
                        while(mysqli_stmt_fetch($statement)){
                            echo '<tr>';
                            
                            echo "<td>" . $counter++ . "</td>";
                            echo "<td>" . $id . "</td>" ;
                            echo "<td>" . $courseName . "</td>" ;
                            echo "<td>" . $track . "</td>" ;
                            echo "<td>" . $studentCode . "</td>" ;
                            echo "<td>" . $firstname . "</td>" ;
                            echo "<td>" . $lastname . "</td>" ;           
                            echo '</tr>';
                        }
                        ?>
                                                                                        
                    </table>
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
