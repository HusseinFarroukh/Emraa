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

                <i class="fa fa-dashboard"></i> Dashboard / View Customer Payment Movement

            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                    <i class="fa fa-tags fa-fw"></i> View Customer Payment Movement

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Customer

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-4"><!-- col-md-6 begin -->

                            <input name="cust" type="text" class="form-control" list="customers" required>
                            <datalist id="customers">
                                <?php
                                 $get_cust = "select cust_name,cust_code FROM customer where cust_act = 1";
                                 $run_getcust = mysqli_query($conn,$get_cust);
                                 while($row_getcust=mysqli_fetch_array($run_getcust)){
                                 
                                 ?>
                                 <option value="<?php echo $row_getcust['cust_name']." // ".$row_getcust['cust_code'];?>">
                                 <?php } ?>
                            </datalist>

                        </div><!-- col-md-6 finish -->
                        <div class="col-md-2"><!-- col-md-6 begin -->

                            <input value="Submit" name="submit" type="submit" class="form-control btn btn-primary">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->     
            </form><!-- form-horizontal finish -->
<?php
if(isset($_POST['cust']))
{
    $customer = $_POST['cust'];
    $customerData = explode(' // ', $customer);
    $code = $customerData[1];

    $get_cust = "SELECT cust_id FROM customer where cust_code = '$code' AND cust_act = 1";
    $run_getcust = mysqli_query($conn,$get_cust);
    $row_getcust=mysqli_fetch_array($run_getcust);
    $custID = $row_getcust['cust_id'];
?>
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Customer </th>
                                <th> Debit </th>
                                <th> Credit </th>
                                <th> Date </th>
                                <th> Trans </th>
                                <th> Note </th> 
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

<?php
$debitTotal = 0;
$creditTotal = 0;
$Balance=0;
$get_move = "SELECT * FROM customeraccount WHERE pay_cust_id=$custID AND pay_stats='1' ORDER BY pay_date DESC;";
$run_move= mysqli_query($conn,$get_move);
while($row_move=mysqli_fetch_array($run_move)){
    

?>
                            <tr><!-- tr begin -->
                                <td><?php echo $customer;?></td>
                                <td><?php echo $row_move['pay_debit'];?></td>
                                <td><?php echo $row_move['pay_credit'];?></td>
                                <td><?php echo $row_move['pay_date'];?></td>
                                <td><?php echo $row_move['pay_trans_id'];?></td>
                                <td><?php echo $row_move['pay_note'];?></td>
                                
                            </tr><!-- tr finish -->
<?php 
$creditTotal = $creditTotal + $row_move['pay_credit'];
$debitTotal = $debitTotal + $row_move['pay_debit'];
}?>
                        </tbody><!-- tbody finish -->
                        <tfoot>
                            <tr>
                            <th></th>
                            <th><?php echo $debitTotal;?></th>
                            <th><?php echo $creditTotal;?></th>
                            <th>Balance:</th>
                            <th><?php echo $debitTotal - $creditTotal;?></th>
                            <th></th>
                            </tr>
                        </tfoot>
                        
                                        
                                    

                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
<?php }?>
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<?php } ?>
