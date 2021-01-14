<?php
    $track = "";
    //Initialize the session
    session_start();
    // Check if the user is logged in(In the correct way before accessing this page), if not then redirect him to login page
    if(!isset($_SESSION["valid_id"]) || !isset($_SESSION["valid_username"]))
    {
        //redirect to login page
           header("location: login.php");
            exit();
    }

    include_once "header2.php";
    require_once "includes/conndb.php";
        
        $fetch = "SELECT  DISTINCT style FROM course";

            if($statement = mysqli_prepare($conn, $fetch))
            {
                if(mysqli_stmt_execute($statement)){
                    //echo 'Execution Successful';
                }else{
                    die("Excution fail" . mysqli_error($conn));
                }
            } 
            
            mysqli_stmt_bind_result($statement, $track);
            mysqli_stmt_store_result($statement);


            //Check if there are results in the stmt
            if(mysqli_stmt_num_rows($statement) != 0)
            {
                ?>
                <div class="container">
                <div class="info-content"> 
                    <div class="track">
                        <table>
                            <th>S/N</th>
                            <th>Tracks</th>
                    <?php
                         $counter = 1;
                //Fetch all rows of data from the result stmt
            while(mysqli_stmt_fetch($statement))
            {
                echo '<tr>';
                     echo "<td>" . $counter++ . "</td>";
                     echo "<td><a href='enroll.php?id=" . $track. "'>" . $track . "</a></td>" ;
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