<?php

//connect to the database created
$conn = mysqli_connect('localhost', 'root', '', 'culinaryschool');
    if(!$conn){
        die("Connection Error" . mysqli_error($conn));
    }//else{
        //echo "success";
    //}


    //create tables in the database name culinaryschool
    $db = "CREATE TABLE course
        (
            course_code int not null auto_increment,
            course_name varchar(30) NOT NULL,
            style varchar(30) NOT NULL,
            price int NULL,
            start_date DATE NULL, 
            end_date DATE NULL,
            CONSTRAINT pk_course PRIMARY KEY(course_code)


        )";


    $db = "CREATE TABLE student
        (
            student_Code int not null auto_increment,
            first_name varchar(30) NOT NULL,
            last_name varchar(30) NOT NULL,
            home_address varchar (30) NOT NULL,
            postal_code varchar (30) NOT NULL,
            Town varchar (30) NOT NULL,
            telephone_number int (11) NOT NULL,
            email_address varchar (30) NOT NULL,
            Date_of_birth DATE NOT NULL,
            users_name varchar (30) NOT NULL,
            student_password varchar(255) NOT NULL,
            CONSTRAINT pk_student PRIMARY KEY(student_code)

        )";    

    $db = "CREATE TABLE connection
        (

            course_code int not null ,
            student_Code int not null ,
            CONSTRAINT connection_course_fk FOREIGN KEY (course_code)
            REFERENCES course (course_code)
                        ON UPDATE CASCADE
                        ON DELETE NO ACTION,

            CONSTRAINT connection_student_fk FOREIGN KEY (student_code)
            REFERENCES student (student_code)
                        ON UPDATE CASCADE
                        ON DELETE NO ACTION

    )";


    $db = "CREATE TABLE theAdmin
        (
            admin_code int not null auto_increment,
            first_name varchar(30) NOT NULL,
            last_name varchar(30) NOT NULL,
            telephone_number int(11) NOT NULL,
            email_address varchar(30) NOT NULL,
            users_name varchar (30) NOT NULL,
            admin_password varchar(255) NOT NULL,
            CONSTRAINT pk_theAdmin PRIMARY KEY(admin_code)

        )";

   


    

        $statement = mysqli_prepare($conn, $db)or
        die(mysqli_error($conn));
        mysqli_stmt_execute($statement)or
        die("There is an Error creating the Table");
        echo ("Table created");
        mysqli_stmt_close($statement);
        mysqli_close($conn);
    