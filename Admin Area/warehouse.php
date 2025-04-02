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

                <i class="fa fa-dashboard"></i> Dashboard / Insert Warehouse

            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                    <i class="fa fa-money fa-fw"></i> Insert Warehouse

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Warehouse

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="warehouse_desc" type="text" class="form-control" required>

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

              $warehouse_desc = $_POST['warehouse_desc'];
             
              $insert_ware = "insert into warehosue (warehouse_desc) values ('$warehouse_desc')";

              $run_insert = mysqli_query($conn,$insert_ware);

              if($run_insert){

                  echo "<script>alert('Warehouse Created')</script>";

                  echo "<script>window.open('index.php?dashboard','_self')</script>";

              }

          }

?>

<?php } ?>
