<?php

require '../helpers/dbConnection.php';
require '../helpers/functions.php';

# Get Data related to id ......
$movie_id = $_GET['movie_id'];

$sql = "select * from movie where movie_id = $movie_id";
$op = mysqli_query($con, $sql);

if (mysqli_num_rows($op) == 1) {
    $data_movie = mysqli_fetch_assoc($op);
} else {
    $_SESSION['Message'] = ['Message' => 'Access Denied'];
    header('Location: ' . url('./movie/index.php'));
}

# Fetch Role Data .....
$sql = 'select * from roles';
$roleData = mysqli_query($con, $sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // CODE ......
    $movie_name=Clean($_POST['movie_name']);
    $movie_type= Clean($_POST['movie_type']);
    $movie_description=Clean($_POST['movie_description']);
    $movie_ticket_price= Clean($_POST['movie_ticket_price']);
    $moive_offer_proce=Clean($_POST['moive_offer_proce']);
    $movie_created_date=Clean($_POST['movie_created_date']);
    $movie_start_date= Clean($_POST['movie_start_date']);
    $movie_end_date=Clean($_POST['movie_end_date']);
    $start_show_date= Clean($_POST['start_show_date']);
    # Validation ......
    # Validation ......
    $errors = [];

    # Validate Name
    if (!validate($movie_name, 1))
    {
        $errors['movie_name'] = 'Field Required';
    } elseif (!validate($movie_name, 7))
    {
        $errors['movie_name'] = 'Invalid String';
    }

    if (!validate($movie_type, 1))
    {
        $errors['movie_type'] = 'Field Required';
    }

    if (!validate($movie_description, 1))
    {
        $errors['movie_description'] = 'Field Required';
    }

    if (!validate($movie_ticket_price, 1))
    {
        $errors['movie_ticket_price'] = 'Field Required';
    }
    if (!validate($moive_offer_proce, 1))
    {
        $errors['moive_offer_proce'] = 'Field Required';
    }
    if (!validate($movie_created_date, 1))
    {
        $errors['movie_created_date'] = 'Field Required';
    }
    if (!validate($movie_start_date, 1))
    {
        $errors['movie_start_date'] ='Field Required';
    }
    if (!validate($movie_end_date, 1))
    {
        $errors['movie_end_date'] = 'Field Required';
    }

    if (!validate($start_show_date, 1))
    {
        $errors['start_show_date'] = 'Field Required';
    }
    # Validate image
    if(!validate($_FILES['image']['name'],1)){
        $errors['Image'] = "Field Required";
    }else{

        $tmpPath    =  $_FILES['image']['tmp_name'];
        $imageName  =  $_FILES['image']['name'];
        $imageSize  =  $_FILES['image']['size'];
        $imageType  =  $_FILES['image']['type'];

        $exArray   = explode('.',$imageName);
        $extension = end($exArray);

        $FinalName = rand().time().'.'.$extension;

        $allowedExtension = ["png",'jpg'];

        if(!validate($extension,5)){
            $errors['Image'] = "Error In Extension";
        }

    }

    if(count($errors) > 0){
        foreach ($errors as $key => $value) {
            # code...
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{

        // db ..........

        $desPath = './uploads/'.$FinalName;

        if(move_uploaded_file($tmpPath,$desPath)){


            $sql_update_movie = "update movie set movie_name = '$movie_name' , movie_type = '$movie_type',movie_description = '$movie_description',movie_ticket_price = '$movie_ticket_price',moive_offer_proce = '$$moive_offer_proce',movie_created_date = '$$movie_created_date',movie_start_date = '$$movie_start_date',movie_end_date = '$$movie_end_date',movie_created_date = '$$movie_created_date' where id = $moive_id";
            $op_moive  = mysqli_query($con,$sql_update_movie);


            if($op_moive){
                echo 'Data Inserted';
            }else{
                echo 'Error Try Again';
            }
        }else{
            echo 'Error In Uploading file';
        }

    }
}

require '../layouts/header.php';
require '../layouts/nav.php';
require '../layouts/sidNav.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">

            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">

                <?php
                              if(isset($_SESSION['Message'])){
                                foreach($_SESSION['Message'] as $key => $val){
                                echo '* '.$key.' : '.$val;
                                }
                                unset($_SESSION['Message']); 
                            }else{
                            
                            ?>

                <li class="breadcrumb-item active">Dashboard/Edit movie</li>

                <?php } ?>
            </ol>


            <div class="card-body">

                <div class="container">

                    <div class="table-responsive">

                        <form  action="edit.php?movie_id=<?php echo $data_movie['movie_id'];?>"  enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleInputName">movie name</label>
                                <input value="<?php echo  $data_movie['movie_name']?>" type="text" class="form-control" id="exampleInputName" name="movie_name"
                                       placeholder="Enter movie name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail">movie type</label>
                                <input value="<?php echo  $data_movie['movie_type']?>" type="text" class="form-control" name="movie_type"
                                       placeholder="Enter movie type">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword">movie description</label>
                                <input value="<?php echo  $data_movie['movie_description']?>" type="text" class="form-control" id="exampleInputPassword1" name="movie_description"
                                       placeholder="movie description">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword">movie_ticket_price</label>
                                <input value="<?php echo  $data_movie['movie_ticket_price']?>" type="number" class="form-control"  name="movie_ticket_price"
                                       placeholder="movie ticket price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">movie offer price </label>
                                <input value="<?php echo  $data_movie['moive_offer_proce']?>"type="number" class="form-control"  name="moive_offer_proce"
                                       placeholder="movie offer price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">movie start date</label>
                                <input  value="<?php echo  $data_movie['movie_start_date']?>" type="text" class="form-control"  name="movie_start_date"
                                       placeholder="movie start date">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword"> movie end date</label>
                                <input  value="<?php echo  $data_movie['movie_end_date']?>" type="date" class="form-control"  name="movie_end_date"
                                       placeholder="movie end date">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword"> start show date</label>
                                <input  value="<?php echo  $data_movie['start_show_date']?>" type="date" class="form-control"  name="start_show_date"
                                       placeholder="start show date">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword"> movie created date</label>
                                <input value="<?php echo  $data_movie['movie_created_date']?>" type="date" class="form-control"  name="movie_created_date"
                                       placeholder="movie_created_date">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword">Image</label><br>
                                <input  value="<?php echo  $data_movie['image']?>" type="file" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </main>


    <?php
    
    require '../layouts/footer.php';
    ?>
