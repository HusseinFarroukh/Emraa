<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['client_edit'])){

        $edit_customer = $_GET['client_edit'];

        $edit_cust_query = "select * from customer where cust_id='$edit_customer'";

        $run_edit = mysqli_query($conn,$edit_cust_query);

        $row_edit = mysqli_fetch_array($run_edit);

        $cust_id = $row_edit['cust_id'];
        $cust_name = $row_edit['cust_name'];
        $cust_contact = $row_edit['cust_contact'];
        $cust_phone = $row_edit['cust_phone'];
        $cust_email = $row_edit['cust_email'];
        $cust_address = $row_edit['cust_address'];
        $cust_code = $row_edit['cust_code'];

    }

?>
<br><br>
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>

                <i class="fa fa-dashboard"></i> Dashboard / Edit Customer

            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                    <i class="fa fa-pencil fa-fw"></i> Edit Customer

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Name

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $cust_name; ?> " name="cust_name" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Contact

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $cust_contact; ?> " name="cust_contact" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Phone

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $cust_phone; ?> " name="cust_phone" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            E-mail

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $cust_email; ?> " name="cust_email" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Address

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $cust_address; ?> " name="cust_address" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                     <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Customer Code

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $cust_code; ?> " name="cust_code" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                   


                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->



                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="update" name="update" type="submit" class="form-control btn btn-primary">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->

        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php

          if(isset($_POST['update'])){
           

            $cust_name= $_POST['cust_name'];
            $cust_contact= $_POST['cust_contact'];
            $cust_phone= $_POST['cust_phone'];
            $cust_email= $_POST['cust_email'];
            $cust_address= $_POST['cust_address'];
            $cust_code= $_POST['cust_code'];
           

              $update_customer= "update customer set cust_name='$cust_name',cust_contact='$cust_contact',cust_phone='$cust_phone',cust_email='$cust_email',cust_address='$cust_address',cust_code='$cust_code' where cust_id='$edit_customer'";

              $run_customer= mysqli_query($conn,$update_customer);

              if($run_customer){

                  echo "<script>alert('Client Updated')</script>";

                  echo "<script>window.open('index.php?client_view','_self')</script>";

              }

          }

?>



<?php } ?>
