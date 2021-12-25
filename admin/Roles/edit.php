<?php

require '../helpers/dbConnection.php';
require '../helpers/functions.php';

# Get Data related to id ...... 
$role_id= $_GET['role_id'];

$sql = "select * from roles where role_id = $role_id";
$op   = mysqli_query($con,$sql);

  if(mysqli_num_rows($op) == 1){

     $data = mysqli_fetch_assoc($op);
  }else{

     $_SESSION['Message'] = "Access Denied";
     header("Location: ".url('Roles/index.php'));
  }



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // CODE ......
    $role_name = Clean($_POST['role_name']);

    # Validation ......
    $errors = [];

    # Validate Name
    if (!validate($role_id, 1)) {
        $errors['role_id'] = 'Field Required';
    }

    if (count($errors) > 0) {
        $_SESSION['Message'] = $errors;
    } else {
        // db ..........

        $sql = "update  roles  set title = '$role_name' where role_id = $role_id";
        $op = mysqli_query($con, $sql);

        if ($op) {
            $_SESSION['Message'] = ['message' => 'Raw Updated'];

            header("Location: ".url('Roles/index.php'));
            exit();

        } else {
            $_SESSION['Message'] = ['message' => 'Error Try Again'];

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

                <li class="breadcrumb-item active">Dashboard/Edit Role</li>

                <?php } ?>
            </ol>



            <div class="card-body">


                <div class="container">



                    <form action="edit.php?id=<?php echo $data['role_id']; ?>" method="post" enctype="multipart/form-data">


                        <div class="form-group">
                            <label for="exampleInputName">Title</label>
                            <input type="text" class="form-control" id="exampleInputName" name="title"
                                aria-describedby=""  value="<?php echo $data['role_name'];?>"  placeholder="Enter Title">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>



                </div>
            </div>


        </div>
    </main>


    <?php
    
    require '../layouts/footer.php';
    ?>
