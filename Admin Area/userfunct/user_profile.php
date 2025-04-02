<br><br>
<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('../login.php','_self')</script>";

    }else{
 $useremail = $_SESSION['admin_email'];
?>

<?php

    if(isset($_POST['user_profile'])){



        $edit_user_query = "select * from admins where admin_email='$admin_email'";

        $run_edit = mysqli_query($conn,$edit_user_query);

        $row_edit = mysqli_fetch_array($run_edit);

        $admin_name = $row_edit['admin_name'];

        $admin_job = $row_edit['admin_job'];

        $admin_phone = $row_edit['admin_phone'];

        $acc_lvl = $row_edit['acc_lvl'];

        $admin_email = $row_edit['admin_email'];

        $admin_pass = $row_edit['admin_pass'];

    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>

                <i class="fa fa-dashboard"></i> Dashboard / Edit Admin

            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                    <i class="fa fa-pencil fa-fw"></i> Edit Admin

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Name

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $admin_name;?>"name="admin_name" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Designation

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $admin_job;?>"name="admin_job" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Telephone

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $admin_phone;?>"name="admin_phone" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Access Level

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $acc_lvl;?>"name="acc_lvl" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Email

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $admin_email;?>"name="admin_email" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Password

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $admin_pass;?>"name="admin_pass" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->



                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="Update" name="update" type="submit" class="form-control btn btn-primary">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->

        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php

          if(isset($_POST['update'])){

              $admin_name = $_POST['admin_name'];

              $admin_job = $_POST['admin_job'];

              $admin_phone = $_POST['admin_phone'];

              $admin_email = $_POST['admin_email'];

              $admin_pass = $_POST['admin_pass'];

              $acc_lvl = $_POST['acc_lvl'];

              $update_admin = "update admins set acc_lvl='$acc_lvl',admin_name='$admin_name',admin_job='$admin_job',admin_phone='$admin_phone',admin_email = '$admin_email', admin_pass = '$admin_pass' where admin_email='$useremail'";

              $run_admin = mysqli_query($conn,$update_admin);

              if($run_admin){

                  echo "<script>alert('Profile Updated, Please relogin to complete')</script>";

                  echo "<script>window.open('includes/logout.inc.php','_self')</script>";

              }

          }

?>



<?php } ?>
