<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['book_edit'])){

        $book_edit = $_GET['book_edit'];

        $edit_book = "select * from book where trans_id='$book_edit'";

        $run_edit = mysqli_query($conn,$edit_book);

        $row_edit = mysqli_fetch_array($run_edit);

        $cust_id = $row_edit['cust_id'];
        $cont_id = $row_edit['cont_id'];
        $cbm = $row_edit['cbm'];
        $goods_price = $row_edit['goods_price'];
        $price = $row_edit['price'];
        $extra = $row_edit['extra'];
        $reason = $row_edit['reason'];
        $COLLECTEDBY = $row_edit['collected'];
        $notes = $row_edit['notes'];
        
        $get_customer= "select cust_name,cust_code from customer where cust_id='$cust_id'";
        $run_customer= mysqli_query($conn,$get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_name = $row_customer['cust_name'];
        $customer_code = $row_customer['cust_code'];

        $get_container = "select * from container where cont_id='$cont_id'";
    
        $run_container = mysqli_query($conn,$get_container);

        $row_container = mysqli_fetch_array($run_container);

        $container_LB = $row_container['cont_no'];

      

    }

?>
<br><br>
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>

                <i class="fa fa-dashboard"></i> Dashboard / Edit Container

            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                <i class="fa fa-tags fa-fw"></i><b> <?php echo $container_LB;?> </b>

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->

                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Customer </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="customer" class="form-control"><!-- form-control Begin -->

                              <option value="<?php echo $cust_id; ?>"> <?php echo $customer_name.' ('.$customer_code.')'; ?> </option>

                              <?php

                              $get_cust = "select * from customer where cust_act=1";
                              $run_cust = mysqli_query($conn,$get_cust);

                              while ($row_cust=mysqli_fetch_array($run_cust)){

                                $cust_id = $row_cust['cust_id'];
                                $cust_name = $row_cust['cust_name'];
                                $cust_code = $row_cust['cust_code'];

                                  echo "

                                  <option value='$cust_id'> $cust_name. (.$cust_code.) </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->


                   <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Goods Price

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $goods_price; ?> " name="goods_price" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->


                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            CBM

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $cbm; ?> " name="cbm" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                     <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Price / CBM

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $price; ?> " name="price" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                     <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           + / -

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="extra" type="text" value ="<?php echo $extra;?>" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->


                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Reason

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $reason; ?> " name="reason" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Collected BY </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="colby" class="form-control"><!-- form-control Begin -->

                              <option value="<?php echo $COLLECTEDBY; ?>"> <?php echo $COLLECTEDBY; ?> </option>

                            

                                  <option value="STEAVE">STEAVE</option>
                                  <option value="SAMER">SAMER</option>

                            

                          </select><!-- form-control Finish -->

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                     <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Notes

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $notes; ?> " name="notes" type="text" class="form-control">

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
           

            $cust_id= $_POST['customer'];
            $cbm= $_POST['cbm'];
            $goods_price= $_POST['goods_price'];
            $price= $_POST['price'];
            $extra= $_POST['extra'];
            $reason= $_POST['reason'];
            $COLLECTED = $_POST['colby'];
            $notes= $_POST['notes'];

            $totalprice= $goods_price + ($cbm * $price) + $extra;

              $update_book= "update book set cust_id='$cust_id', goods_price='$goods_price',cbm='$cbm', price='$price',extra='$extra',reason='$reason',notes='$notes',collected='$COLLECTED' where trans_id=$book_edit";

              $run_book= mysqli_query($conn,$update_book);
              
              $update_acc= "update customeraccount set pay_credit = $totalprice where pay_trans_id=$book_edit";

              $run_update_acc= mysqli_query($conn,$update_acc);

              if($run_book){

                 

                  echo "<script>window.open('index.php?avilable_details=$cont_id','_self')</script>";

              }

          }

?>



<?php } ?>
