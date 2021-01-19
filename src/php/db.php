<?php

function Createdb(){
    // local 
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "bookstore";

    // heroku
    $servername = "us-cdbr-east-03.cleardb.com";
    $username = "b2e7185b924846";
    $password = "7305f455";
    $dbname = "heroku_1f0170230277329";

    // create connection
    $con = mysqli_connect($servername, $username, $password);

    // Check Connection
    if (!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }

    // create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";


    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);
        
        $sql = "
                CREATE TABLE IF NOT EXISTS books(
                    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    book_name VARCHAR (25) NOT NULL,
                    book_publisher VARCHAR (20),
                    book_price FLOAT 
                );

                SET @@auto_increment_increment=1
        ";

        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo"cannot create table...!";
        }

    }else{
        echo "Error while creating database ". mysqli_error($con);
    }

}