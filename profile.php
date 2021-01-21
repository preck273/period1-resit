<?php
    //Initialize the session
    session_start();
    // Check if the user is logged in(In the correct way before accessing this page), if not then redirect him to login page
    if(!isset($_SESSION["valid_id"]) || !isset($_SESSION["valid_username"])){
        //redirect to login page
           header("location: login.php");
            exit();
    }
			
		require_once 'includes/conndb.php';
		 include_once "header2.php";
		 
		 $valid_user = $_SESSION["valid_username"]; // uses session to get the user information


		 $fetch = "SELECT student_code, first_name, last_name, telephone_number, email_address, date_of_birth, users_name FROM student WHERE users_name ='$valid_user'";
            
		 if($statement = mysqli_prepare($conn, $fetch)){
					 
			 if(mysqli_stmt_execute($statement)){
				 //echo 'Execution Successful';
			 }else{
				 die("Excution fail" . mysqli_error($conn));
			 }
		 } 
 
		 mysqli_stmt_bind_result($statement, $id, $firstName, $lastName,  $phone, $email, $dob, $usrn);
		 mysqli_stmt_store_result($statement);
 
		 //Check if there are results in the statement
		 if(mysqli_stmt_num_rows($statement) != 0){

			while(mysqli_stmt_fetch($statement)){
 
		 ?>        
		 
		           <div class="info">
					   <h2>Welcome <?php echo $firstName; ?> </h2>
					<h3>Student Info</h3><br>
					<table>
							<tr>
							<th>Student Code:</th> 
								<td><?php echo $id;?></td>
							</tr>
						
							<tr>
							<th>Username:</th>
								 <td> <?php echo $usrn; ?></td>
							</tr>

							<tr>
								<th>First Name: </th>
								<td><?php echo $firstName;?></td>
							</tr>

							<tr>
								<th>Last Name:</th> 
									<td><?php echo $lastName;?></td>
							</tr>

							<tr>
								<th>Email:</th>
								<td><?php echo $email;?></td>
							</tr>

							<tr>
								<th>Date Of Birth:</th>
								<td><?php echo $dob;?></td>
							</tr>

							<tr>
								 <th>Phone Number:</th>
								 <td><?php echo $phone;?></td>
							</tr>

							
						<?php
                       
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

