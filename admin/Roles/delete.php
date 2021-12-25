<?php 
/// delete ...... 
require '../helpers/dbConnection.php';
require '../helpers/functions.php';

$role_id = $_GET['role_id'];


if(!validate($role_id,1)){
    $message =  'Invalid Number';
}else{

   $sql = "select * from roles where role_id = $role_id";
   $op   = mysqli_query($con,$sql);

     if(mysqli_num_rows($op) == 1){
   
 $data = mysqli_fetch_assoc($op);

   $sql = "delete from roles where role_id = $role_id ";
   $op  = mysqli_query($con,$sql);


   if($op){

    $message = 'raw deleted';
   }else{
    $message = 'error Try Again !!!!!! ';
   }
}else{
    $message = 'Error In role ';
}

}



$_SESSION['Message'] = ["Message" =>  $message];

   header("Location: ".url('/Roles/index.php'));


?>