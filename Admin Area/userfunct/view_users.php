<br><br>
<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('../login.php','_self')</script>";

    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->

                <i class="fa fa-dashboard"></i> Dashboard / View Users

            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->

                   <i class="fa fa-tags"></i>  View Users

               </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Name: </th>
                                <th> Designation: </th>
                                <th> telephone: </th>
                                <th> Email: </th>
                                <th> Access Level: </th>


                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php



                                $get_admin = "select * from admins";

                                $run_admin = mysqli_query($conn,$get_admin);

                                while($row_admin=mysqli_fetch_array($run_admin)){

                                    $name = $row_admin['admin_name'];

                                    $job = $row_admin['admin_job'];

                                    $tel = $row_admin['admin_phone'];

                                    $mail = $row_admin['admin_email'];

                                    $acc_lvl = $row_admin['acc_lvl'];


                            ?>

                            <tr><!-- tr begin -->
                                <td> <?php echo $name; ?></td>
                                <td> <?php echo $job; ?> </td>
                                <td> <?php echo $tel; ?> </td>
                                <td> <?php echo $mail; ?> </td>
                                <td> <?php echo $acc_lvl; ?> </td>


                            </tr><!-- tr finish -->

                            <?php } ?>

                        </tbody><!-- tbody finish -->

                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->

        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>
