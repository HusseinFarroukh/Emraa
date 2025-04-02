<br><br>
<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>

                <i class="fa fa-dashboard"></i> Dashboard / View Clients

            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                    <i class="fa fa-tags fa-fw"></i> View Clients

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> CN </th>
                                <th> Code </th>
                                <th> Company </th>
                                <th> Contact </th>
                                <th> Phone </th>
                                <th> Email </th>
                                <th> Address </th>
                                
                                <th> Edit </th>
                                <th> Delete </th>
                               
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php

                                

                                $get_customer = "select * from customer where cust_act = 1 order by cust_id DESC";

                                $run_customer = mysqli_query($conn,$get_customer);

                                while($row_customer=mysqli_fetch_array($run_customer)){

                                    $id = $row_customer['cust_id'];
                                    $customer = $row_customer['cust_name']; 
                                    $contact = $row_customer['cust_contact'];
                                    $phone = $row_customer['cust_phone'];
                                    $email = $row_customer['cust_email'];
                                    $add = $row_customer['cust_address'];
                                    $cust_code = $row_customer['cust_code'];


                                   

                            ?>

                            <tr><!-- tr begin -->
                                <td> <?php echo $cust_code; ?> </td>
                                <td> <?php echo 'ACC00'.$id; ?> </td>
                                <td> <?php echo $customer; ?> </td>
                                <td> <?php echo $contact; ?> </td>
                                <td> <?php echo $phone; ?> </td>
                                <td> <?php echo $email; ?> </td>
                                <td> <?php echo $add; ?> </td>
                                
                               
                                <td>
                                    <a href="index.php?client_edit= <?php echo $id; ?> ">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?client_delete= <?php echo $id; ?> ">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr><!-- tr finish -->

                            <?php } ?>

                        </tbody><!-- tbody finish -->

                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->

        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<?php } ?>
