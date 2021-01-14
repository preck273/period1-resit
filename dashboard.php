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

    $fetch = "SELECT student_code, first_name, last_name, home_address, postal_code, town, telephone_number, email_address, date_of_birth, users_name FROM student";
            
        if($statement = mysqli_prepare($conn, $fetch)){
                    
            if(mysqli_stmt_execute($statement)){
                //echo 'Execution Successful';
            }else{
                die("Excution fail" . mysqli_error($conn));
            }
        } 

        mysqli_stmt_bind_result($statement, $id, $firstName, $lastName, $address, $postal, $town, $phone, $email, $dob, $usrn);
        mysqli_stmt_store_result($statement);

        //Check if there are results in the statement
        if(mysqli_stmt_num_rows($statement) != 0){

        ?>

                <div style="overflow-x:auto;">
                    <table>
                        <th>S/N</th>
						<th>Student Code</th>
						<th>Username</th>
                        <th>First Name</th>
						<th>Last Name</th>
                        <th>Email Address</th>
                        <th>Date Of Birth</th>
						<th>Telephone Number</th>
                        <th>Home Address</th>
						<th>Postal Code</th>
						<th>Town</th>
                        <?php
                        $counter = 1;
                        //Fetch all rows of data from the result statement
                        while(mysqli_stmt_fetch($statement)){
                            echo '<tr>';
                            
							echo "<td>" . $counter++ . "</td>";
							echo "<td>" . $id . "</td>" ;
							echo "<td>" . $usrn . "</td>" ;
                            echo "<td>" . $firstName . "</td>" ;
							echo "<td>" . $lastName . "</td>" ;
                            echo "<td>" . $email . "</td>" ; 
                            echo "<td>" . $dob . "</td>" ;                          
							echo "<td>" . $phone . "</td>" ;							
                            echo "<td>" . $address . "</td>" ;
							echo "<td>" . $postal . "</td>" ;
							echo "<td>" . $town . "</td>" ;
							
                            
                            //echo "<td id ='edit-btn'><a href='edit.php?id=" . $id. "'>Edit</td>";
                           // echo "<td id='danger-btn'><a onClick=\"javascript: return confirm('Are you sure you want to delete this?');\" href='includes/delete.inc.php?id=".$id."'>Delete</td>";                  
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



