<?php
/// delete ......
require '../helpers/dbConnection.php';
require '../helpers/functions.php';
require '../../checkLogin.php';

$movie_id = $_GET['movie_id'];


if(!validate($movie_id,4)){
    $message =  'Invalid Number';
}else{

    $sql = "select * from movie where movie_id = $movie_id";
    $op   = mysqli_query($con,$sql);

    if(mysqli_num_rows($op) == 1){

        $data = mysqli_fetch_assoc($op);

        $sql = "delete from movie where movie_id = $movie_id ";
        $op  = mysqli_query($con,$sql);


        if($op){

            unlink('./uploads/'.$data['image']);

            $message = 'raw deleted';
        }else{
            $message = 'error Try Again !!!!!! ';
        }
    }else{
        $message = 'Error In movie ';
    }

}

$_SESSION['Message'] = ["Message" =>  $message];

header("Location: ".url('movie/index.php'));


?>