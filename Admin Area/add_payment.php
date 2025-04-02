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

                <i class="fa fa-dashboard"></i> Dashboard / Add Payment

            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                    <i class="fa fa-money fa-fw"></i> Add Payment

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Customer

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="cust" type="text" class="form-control" list="customers" required>
                            <datalist id="customers">
                                <?php
                                 $get_cust = "select cust_name FROM customer where cust_act = 1";
                                 $run_getcust = mysqli_query($conn,$get_cust);
                                 while($row_getcust=mysqli_fetch_array($run_getcust)){
                                 
                                 
                                 ?>
                                 <option value="<?php echo $row_getcust['cust_name']?>">
                                 <?php } ?>
                            </datalist>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Amount

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="amount" type="text" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Type of payment

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <select name="paytype"  class="form-control" required>
                                <option value="Debit"> Debit </option>
                                <option value="Credit"> Credit </option>
                                
                            </select>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Date

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="date" type="date" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Note

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="note" type="text" class="form-control" required>

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

              $cust = $_POST['cust'];
              $amount = $_POST['amount'];
              $paytype = $_POST['paytype'];
              $date = $_POST['date'];
              $note = $_POST['note'];

             
              
              $get_cust = "select cust_id FROM customer where cust_name = '$cust' AND cust_act = 1";
              $run_getcust = mysqli_query($conn,$get_cust);
              $row_getcust=mysqli_fetch_array($run_getcust);
              $custID = $row_getcust['cust_id'];

              if($paytype == 'Credit')
              {
                $insert_payment = "INSERT INTO customeraccount(pay_cust_id, pay_debit,pay_credit,pay_date,pay_note,pay_stats)
                VALUES($custID,0,$amount,'$date','$note','1')";
              }
              else if($paytype == 'Debit')
              {
                $insert_payment = "INSERT INTO customeraccount(pay_cust_id, pay_debit,pay_credit,pay_date,pay_note,pay_stats)
                VALUES($custID,$amount,0,'$date','$note','1')";
              }

              
              
              $run_insert = mysqli_query($conn,$insert_payment);

              if($run_insert){

                  echo "<script>alert('Payment Created')</script>";

                  echo "<script>window.open('index.php','_self')</script>";

              }

          }

?>

<?php } ?>
