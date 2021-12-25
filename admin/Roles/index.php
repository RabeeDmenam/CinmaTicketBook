<?php
require '../helpers/dbConnection.php';
require '../helpers/functions.php';


# DB OP
$sql = 'select * from roles';
$op = mysqli_query($con, $sql);

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
                                    <th>Title</th>
                                    <th>Control</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Control</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php 
                                            
                                   while($data = mysqli_fetch_assoc($op)){
                                            
                                            ?>
                                <tr>
                                    <td><?php echo $data['role_id']; ?></td>
                                    <td><?php echo $data['role_name']; ?></td>
                                    <td>
                                    <td>
                                        <a href='./edit.php?role_id=<?php echo $data['role_id']; ?>'class='btn btn-primary m-r-1em'>edit</a>
                                        <a href='./delete.php?role_id=<?php echo $data['role_id']; ?>'class='btn btn-danger m-r-1em'>Delete</a>
                                    </td>
                                    </td>

                                </tr>
                                <?php } ?>



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
