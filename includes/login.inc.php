<?php
      
        session_start();
       
        //link to database
       require_once 'conndb.php';

       // define variables and set to empty values else the error message won't display on the form.
       $user_err = $pass_err = $success_msg = "";

       if(isset($_POST['submit']))
       {
           $username = $_POST['username'];          
           $pass = $_POST['pass'];

           

           //clean data before sending it to the database to avoid SQL injection
           $user_nam = mysqli_real_escape_string($conn, $username);
           $user_pass = mysqli_real_escape_string($conn, $pass);

            //check if form is empty
            if(empty($username)){
                $user_err = "Please enter your email";
            }

            if(empty($pass)){
                $pass_err = "Please enter your password";
            }

             //check if all fields are not empty and then proceed
            if(!empty($username) && !empty($pass)){

                // Prepare a select statement
                $sql = "SELECT student_code, users_name, student_password FROM student WHERE users_name = ?";	

		  		
                if($stmt = mysqli_prepare($conn, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        
                    }else{
                        echo "Error could not execute" . mysqli_error($conn);
                    }
                        //Bind result to variables when fetching.
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashedpwd);

                         // Store result
                        mysqli_stmt_store_result($stmt);

                        //Check if there are results in the statement
                        if(mysqli_stmt_num_rows($stmt) != 0){
                           // fetch result from the database
                            if(mysqli_stmt_fetch($stmt)){
                                //verify if password matches the one in the database
                                if($verify = password_verify($pass, $hashedpwd)){
                                    // if username and Password is correct, start a new session
                                    if($username == true && $verify == true){
                                        
                                        $_SESSION["valid_id"] = $id;
                                        $_SESSION["valid_username"] = $username;
                                        if(isset($_SESSION["valid_id"]) && isset($_SESSION["valid_username"])){
                                            //wait for 2 seconds to display the success msg before redirect to profile.php page 
                                            header('Refresh:2; url=profile.php');   
                                            $success_msg = "Login successful";
                                            
                                                                                   
                                        }   
                                                                          
                                    }else{
                                        $user_err =  "Usersname or Password is incorrect";
                                    }
                                                                        
                                }else{
                                    $user_err ="Username or Password is incorrect";
                                }
                            }
                        }else{
                            $user_err = "No account found with this Username";
                        }
                    }else{
                        echo "Oops! Something went wrong. Please try again later";
                    }
                    mysqli_stmt_free_result($stmt);
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                }
                
            }
                

       
    
    
    

    
   