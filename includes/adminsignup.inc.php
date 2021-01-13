<?php

require_once "conndb.php";

// define variables and set to empty values else the error message won't display on the form.
$firstName_err = $lastName_err = $email_err = $phone_err = $usrn_err = $pass1_err = $pass2_err = $success_msg = "";



if( isset($_POST['submit'])){

   
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $usrn = $_POST['username'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

   


    //check if form is empty and validate the form
    if(empty($firstName))
    {
        $firstName_err = "Please enter your first name.";
    }
        elseif(!preg_match("/^[a-zA-Z ]*$/", $firstName))
         {  // check if name contains only letters
            $firstName_err = "Please enter a valid name";
        }

    if(empty($lastName))
    {
        $lastName_err = "Please enter your last name.";
    }
        elseif(!preg_match("/^[a-zA-Z ]*$/", $lastName))
         {
          $lastName_err = "Please enter a valid name";
         }

    if(empty($phone))
    {
        $phone_err =  "Please enter your phone number.";
    }

    if(empty($email))
    {
        $email_err = "Please enter your email";
    }
         elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))  //check if email is valid
         {   
             $email_err = "Invalid email";
         } 
    

    if(empty($usrn))
    {
        $usrn_err = "Please enter your username.";  //check if username is empty
    }
    
    if(empty($pass1))
    {
        $pass1_err = "Please enter your password.";
    }

    if(empty($pass2))
    {
        $pass2_err =  "Password confirm your password.";
    }
        elseif($pass1 !== $pass2)   // check if password match
        {                  
          $pass2_err =  "Password do not match.";
        }
    
    
   
   
        //if all fields are not empty save user details to the database
        if(!empty($firstName) && !empty($lastName) && !empty($phone) 
        && !empty($email)&& !empty($usrn) && !empty($pass1) && !empty($pass2) ){

            //clean the form data before sending to database
            $fname = mysqli_real_escape_string($conn, $firstName);
            $lname = mysqli_real_escape_string($conn, $lastName);
            $adminphone = mysqli_real_escape_string($conn, $phone);
            $adminemail = mysqli_real_escape_string($conn, $email);
            $adminname = mysqli_real_escape_string($conn, $usrn);
            $password1 = mysqli_real_escape_string($conn, $pass1);
            $password2 = mysqli_real_escape_string($conn, $pass2);

            //check if email already exist in the database.
            $sql_check = mysqli_query($conn, "SELECT email_address, users_name FROM theadmin WHERE email_address = '$email' AND users_name = '$usrn' ");
            if( mysqli_num_rows($sql_check)>0){
                $email_err = "Email already exist";
                $usrn_err = "Username already exist";
            }else{
                $sql = "INSERT INTO theadmin (first_name, last_name, telephone_number, email_address, users_name, admin_Password) 
                        VALUES (?,?,?,?,?,?)";
                if($stmt = mysqli_prepare($conn,$sql)){
                    $hashedpass = password_hash($pass1, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssssss", $firstName, $lastName, $phone, $email,
                                           $usrn, $hashedpass);
                    if(mysqli_stmt_execute($stmt)){
                        
                        header('Refresh:2; url=adminlogin.php');
                        $success_msg = "Registration successful";
                    }else{
                        echo "SOmething went wrong. Please try again later.".mysqli_error($conn);
                    }
                    mysqli_stmt_close($stmt);
                }
                mysqli_close($conn);
            }
    }
}


?>