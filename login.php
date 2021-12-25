<?php
require './admin/helpers/dbConnection.php';
require './admin/helpers/functions.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){

    // CODE ......
    $email    = Clean($_POST['email']);
    $password = Clean($_POST['password']);


    # Validation ......
    $errors = [];

    # Validate Email
    if(!validate($email,1)){
        $errors['Email'] = "Field Required";
    }elseif(!validate($email,2)){
        $errors['Email'] = "Invalid Email Format";
    }


    # Validate Password
    if(!validate($password,1)){
        $errors['password'] = "Field Required";
    }elseif(!validate($password,3)){
        $errors['password'] = "Length Must >= 6 chs";
    }



    if(count($errors) > 0){
        foreach ($errors as $key => $value) {
            # code...
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{

        // Login Code .......
        $password = md5($password);

        $sql = "select * from admins where email = '$email' and password = '$password' ";

        $op = mysqli_query($con,$sql);

        if(mysqli_num_rows($op) == 1){

            $data = mysqli_fetch_assoc($op);

            $_SESSION['user'] = $data;


            header("Location: ".url('./index.php'));


        }else{
            echo 'Error in Email || Password Try Again !!!';
        }


    }


}




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<div class="card text-center" style="padding:20px;">
  <h3>Sign in  </h3>
</div><br>

<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="form-group">  
            <label for="username">email:</label>
            <input type="text" class="form-control" name="email" placeholder="Enter email" >
          </div>
          <div class="form-group">  
            <label for="password">Password:</label> 
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <p>Not registered yet ?<a href="signup.php"> Register here</a></p>
            <input type="submit" name="submit" class="btn btn-success" value="Login"> 
          </div>
        </form>
      </div>
  </div>
</div>
</body>
</html>