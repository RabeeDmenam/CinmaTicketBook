<?php
   // Database configuration    
   $hostname = "localhost"; 
   $username = "root"; 
   $password = "";
   $dbname   = "nit";
    
   // Create database connection 
   $con = new mysqli($hostname, $username, $password, $dbname);




if(!$con){
    die("Error : ".mysqli_connect_error());
}else {
    //echo "you are connected to DB ";
}

