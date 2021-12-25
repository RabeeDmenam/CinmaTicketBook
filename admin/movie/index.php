<?php
require '../helpers/dbConnection.php';
require '../helpers/functions.php';

require '../../checkLogin.php';
//require '../checkSuperAdmin.php';

# DB OP
$sql= 'select * from movie';
//$sql = 'select admins.* , roles.role_id from admins inner join roles on admins.role_id = roles.id';
$movie_op = mysqli_query($con, $sql);

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


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    DataTable Example
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>

                                <tr>
                                    <th>Id</th>
                                    <th>movie name</th>
                                    <th>movie type</th>
                                    <th>movie  price</th>
                                    <th>movie offer </th>
                                    <th>movie created</th>
                                    <th>movie start</th>
                                    <th>movie end </th>
                                    <th>movie show </th>
                                    <th>movie image </th>
                                    <th>movie description </th>
                                    <th>movie action </th>

                                </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>movie name</th>
                                <th>movie type</th>
                                <th>movie  price</th>
                                <th>movie offer </th>
                                <th>movie created</th>
                                <th>movie start</th>
                                <th>movie end </th>
                                <th>movie show </th>
                                <th>movie image </th>
                                <th>movie description </th>
                                <th>movie action </th>
                            </tr>
                            </tfoot>
                            <?php
                            while($movie_data = mysqli_fetch_assoc($movie_op)){
                            ?>
                            <tbody>
                            <tr>
                                <td><?php echo $movie_data['movie_id'];?></td>
                                <td><?php echo $movie_data['movie_name'];?></td>
                                <td><?php echo $movie_data['movie_type'];?></td>
                                <td><?php echo $movie_data['movie_ticket_price'];?></td>
                                <td><?php echo $movie_data['moive_offer_proce'];?></td>
                                <td><?php echo $movie_data['movie_created_date'];?></td>
                                <td><?php echo $movie_data['movie_start_date'];?></td>
                                <td><?php echo $movie_data['movie_end_date'];?></td>
                                <td><?php echo $movie_data['start_show_date'];?></td>
                                <td ><img style="max-height: 70px; max-width: 70px" src="./uploads/<?php echo $movie_data['image'];?>">   </td>
                                <td><?php echo $movie_data['movie_description'];?></td>
                                <td>
                                <td>
                                    <a href='./edit.php?movie_id=<?php echo $movie_data['movie_id']; ?>'class='btn btn-primary m-r-1em'>edit</a>
                                    <a href='./delete.php?movie_id=<?php echo $movie_data['movie_id']; ?>'class='btn btn-danger m-r-1em'>Delete</a>
                                </td>

                                </td>
                                <?php
                            }
                            ?>

                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>


        </div>
    </main>


    <?php
    
    require '../layouts/footer.php';
    ?>
