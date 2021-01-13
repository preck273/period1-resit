<?php

require_once "conndb.php";

// define variables and set to empty values else the error message won't display on the form.
$firstName_err = $lastName_err = $email_err = $phone_err = $address_err = $postal_err 
= $town_err = $dob_err = $usrn_err = $pass1_err = $pass2_err = $success_msg = "";



if( isset($_POST['submit']))
{ 
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $address = $_POST['home-address'];
    $postal = $_POST['postal-code'];
    $town = $_POST['town'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
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

    if(empty($address))
    {
        $address_err =  "Please enter your address.";
    }
     

    if(empty($postal))
    {
        $postal_err =  "Please enter your postal code.";
    }
    
    if(empty($town))
    {
        $town_err = "Please enter your city.";
    }
        elseif(!preg_match("/^[a-zA-Z ]*$/", $town))
         {
            $city_err = "Please enter a valid name";
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
    
    if(empty($dob))
    {
        $dob_err =  "Please enter your date of birth.";
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
        elseif($pass1 !== $pass2)   // check is password match
        {                  
          $pass2_err =  "Password do not match.";
        }
    
    
   
   
        //if all fields are not empty save user details to the database
        if(!empty($firstName) && !empty($lastName) && !empty($address) && !empty($postal) && !empty($town) && !empty($phone) 
        && !empty($email)&& !empty($dob) && !empty($usrn) && !empty($pass1) && !empty($pass2) ){

            //clean the form data before sending to database
            $fname = mysqli_real_escape_string($conn, $firstName);
            $lname = mysqli_real_escape_string($conn, $lastName);
            $useraddress = mysqli_real_escape_string($conn, $address);
            $userpostal = mysqli_real_escape_string($conn, $postal);
            $usertown = mysqli_real_escape_string($conn, $town);
            $userphone = mysqli_real_escape_string($conn, $phone);
            $useremail = mysqli_real_escape_string($conn, $email);
            $userdob = mysqli_real_escape_string($conn, $dob);
            $usrname = mysqli_real_escape_string($conn, $usrn);
            $password1 = mysqli_real_escape_string($conn, $pass1);
            $password1 = mysqli_real_escape_string($conn, $pass2);

            //check if email already exist in the database.
            $sql_check = mysqli_query($conn, "SELECT email_address, users_name FROM student WHERE email_address = '$email' AND users_name = '$usrn'");
            if( mysqli_num_rows($sql_check)>0){
                $email_err = "Email already exist";
                $usrn_err = "Username already exist";
            }else{
                $sql = "INSERT INTO student (first_name, last_name, home_address, postal_code, town, telephone_number, email_address, date_of_birth, users_name, student_Password) 
                        VALUES (?,?,?,?,?,?,?,?,?,?)";
                if($stmt = mysqli_prepare($conn,$sql)){
                    $dob = new DateTime;
                    $dt=$dob->format('Y-m-d');
                    $hashedpass = password_hash($pass1, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssssssssss", $firstName, $lastName, $address, $postal, $town, $phone, $email, $dt, $usrn, $hashedpass);
                    if(mysqli_stmt_execute($stmt)){
                        
                       // header('Refresh:2; url=login.php');
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