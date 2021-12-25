<?php

  // Include database connection file
include_once('./helpers/dbConnection.php');
include_once('./helpers/functions.php');
//get roles
$sql_role = "select * from roles";
$roles_op = mysqli_query($con,$sql_role);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone= $_POST['phone'];
    $password = md5($_POST['password']);
    $created    = $_POST['created'];
    $role_id   = $_POST['role_id'];


        if (!validate($name, 1)) {
            $errors['name'] = 'Field Required';
        }
        if (!validate($email, 1)) {
            $errors['email'] = 'Field Required';
        }elseif (!validate($email, 2))
        {
            $errors['email'] = 'Invalid email ';
        }
        }
        if (!validate($password, 1)) {
            $errors['password'] = 'Field Required';
        }
        if (!validate($created, 1)) {
            $errors['created'] = 'Field Required';
        }
        if (!validate($phone, 1)) {
            $errors['phone'] = 'Field Required';
        } elseif (!validate($phone, 6))
        {
            $errors['phone'] = 'Invalid Phone Number';
        }

# Validate image

    if (!validate($_FILES['image']['name'], 1)) {
        $errors['Image'] = 'Field Required';
    } else {
        $tmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];
        $imageType = $_FILES['image']['type'];

        $exArray = explode('.', $imageName);
        $extension = end($exArray);

        $FinalName = rand() . time() . '.' . $extension;

        $allowedExtension = ['png', 'jpg'];

        if (!validate($extension, 5)) {
            $errors['Image'] = 'Error In Extension';
        }
    }

    if (count($errors) > 0) {
        $_SESSION['Message'] = $errors;
    } else {
        // db ..........
        $desPath = './uploads/' .   $FinalName;
        $query = "INSERT INTO admins (name,email,phone,image,role_id,password,created) VALUES ('$name','$email','$phone','$FinalName','$role_id','$password','$created')";
        $result = $con->query($query);

        if ($result == true) {
            header("Location:login.php");
            die();
        } else {
            $errorMsg = "You are not Registered..Please Try again";
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Multi user role based application login in php mysqli</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<div class="card text-center" style="padding:20px;">
  <h3>join now </h3>
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
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
          </div>
            <div class="form-group">
                <label for="name">email:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
            </div>
          <div class="form-group">  
            <label for="username">phone:</label>
            <input type="text" class="form-control" name="phone" placeholder="Enter phone" required="">
          </div>
              <div class="form-group">
                  <label for="created">created:</label>
                  <input type="date" class="form-control" name="created" placeholder="Enter created " required="">
              </div>
          <div class="form-group">  
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
          </div>
            <div class="form-group">
                <label for="image">image:</label>
                <input type="file" class="form-control" name="image" placeholder="Enter image" required="">
            </div>
          <div class="form-group">

            <label for="roles">Role:</label>

              <select class="form-control"  name="role_id">
                  <?php
                  while($roles_data = mysqli_fetch_assoc($roles_op)){

                      ?>
                      <option  value="<?php echo $roles_data['role_id'];?>"><?php echo $roles_data['role_name'];?></option>

                  <?php } ?>
              </select>
          </div>
          <div class="form-group">
            <p>Already have account ?<a href="login.php"> Login</a></p>
            <input type="submit" name="submit" class="btn btn-primary">
          </div>
        </form>
      </div>
  </div>
</div>
</body>
</html>