<?php


// create the database and then copy and paste the code inside the culinaryschool.sql file to your php admin to create the tables
    $conn = mysqli_connect('localhost', 'root', '');
    $db ="CREATE DATABASE culinarySchool";
    $statement = mysqli_prepare($conn, $db)or
     die(mysqli_error($conn));
     mysqli_stmt_execute($statement)or
     die("There is an Error creating the Database");
     echo ("Database created");
     mysqli_stmt_close($statement);
     mysqli_close($conn);


