<br><br>
<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('../login.php','_self')</script>";

    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>

                <i class="fa fa-dashboard"></i> Dashboard / Insert User

            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                    <i class="fa fa-money fa-fw"></i> Insert User

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Name

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="admin_name" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Designation

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="admin_job" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Phone

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="admin_phone" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Email

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="admin_email" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Access Level

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="acc_lvl" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Password

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="admin_pass" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->



                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="Submit" name="submit" type="submit" class="form-control btn btn-primary">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->

        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php

          if(isset($_POST['submit'])){

              $admin_name = $_POST['admin_name'];

              $admin_job = $_POST['admin_job'];

              $admin_phone = $_POST['admin_phone'];

              $admin_email = $_POST['admin_email'];

              $admin_pass = $_POST['admin_pass'];

              $acc_lvl = $_POST['acc_lvl'];

              $insert_admin = "insert into admins (admin_name,admin_job,admin_phone,admin_email,acc_lvl,admin_pass) values ('$admin_name','$admin_job','$admin_phone','$admin_email','$acc_lvl','$admin_pass')";

              $run_admin = mysqli_query($conn,$insert_admin);

              if($run_admin){

                  echo "<script>alert('Admin Inserted')</script>";

                  echo "<script>window.open('index.php?view_users','_self')</script>";

              }

          }

?>

<?php } ?>
