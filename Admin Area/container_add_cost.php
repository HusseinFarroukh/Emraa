<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['container_add_cost'])){

        $edit_cost = $_GET['container_add_cost'];

        $edit_cost_query = "select * from cost where cont_id='$edit_cost'";

        $run_edit = mysqli_query($conn,$edit_cost_query);

        $row_edit = mysqli_fetch_array($run_edit);

        $lebanese_customs = $row_edit['lebanese_customs'];
        $turkish_customs = $row_edit['turkish_customs'];
        $transportation = $row_edit['transportation'];
        $utilities = $row_edit['utilities'];
        $others1 = $row_edit['others1'];
        $others2 = $row_edit['others2'];
        $note = $row_edit['note'];
       


        $get_container = "select cont_no, size,code,arr_date from container where cont_id='$edit_cost'";
    
        $run_get_container = mysqli_query($conn,$get_container);
    
        $row_get_container = mysqli_fetch_array($run_get_container);
    
        $containerLB = $row_get_container['cont_no'];
        $code = $row_get_container['code'];
        $size = $row_get_container['size'];
        $arr_date=$row_get_container['arr_date'];

        $get_sum_cbm = "SELECT SUM(cbm) AS customercbm FROM book where status = 1 and cont_id = '$edit_cost'";
        
        $run_sum_cbm = mysqli_query($conn,$get_sum_cbm);
    
        $row_sum_cbm = mysqli_fetch_array($run_sum_cbm);
    
        $sum_cust_cbm = $row_sum_cbm['customercbm'];

        $sum_karout_cbm = $size - $sum_cust_cbm;



        $get_sumcost = "SELECT (lebanese_customs+turkish_customs+transportation+utilities+others1+others2) AS sumcost, note FROM cost WHERE cont_id ='$edit_cost'";

        $run_get_sumcost = mysqli_query($conn,$get_sumcost);
    
        $row_get_sumcost = mysqli_fetch_array($run_get_sumcost);
    
        $sumcost = $row_get_sumcost['sumcost'];
        $note = $row_get_sumcost['note'];

        $get_sumcust = "SELECT COUNT(cust_id) as sumcust FROM book WHERE cont_id = '$edit_cost' AND status = 1";
                            
                                   $run_get_sumcust = mysqli_query($conn,$get_sumcust);
                               
                                   $row_get_sumcust = mysqli_fetch_array($run_get_sumcust);
                               
                                   $sumcust = $row_get_sumcust['sumcust'];

        $get_sumpay = "SELECT SUM(price * cbm) + extra AS totalpay FROM book WHERE cont_id = '$edit_cost' AND status = 1";

        $run_get_sumpay = mysqli_query($conn,$get_sumpay);
                               
        $row_get_sumpay = mysqli_fetch_array($run_get_sumpay);
                               
        $sumpay = $row_get_sumpay['totalpay'];

        $color="#000000";
        if($sumpay - $sumcost >= 0){
            $color= "#589c14";
        }else{
            $color="#ff0000";
        }

       

    }

?>
<br><br>
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>

                <i class="fa fa-dashboard"></i> Dashboard / Container Cost

            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                    <i class="fa fa-pencil fa-fw"></i> Container Cost <b><?php echo $containerLB." / ".$code." / VOL: ".$size." KG";?></b>

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
             
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->





                    <div class="form-group"><!-- form-group begin -->

                    <div class="col-md-3"><!-- col-md-6 begin -->

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                     var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Avilable (<?php echo $sum_karout_cbm;?>)',     <?php echo $sum_karout_cbm;?>],
                        
                        ['Others (<?php echo $sum_cust_cbm;?>)',    <?php echo $sum_cust_cbm;?>]
                    ]);

                    var options = {
                        title: 'CBM Quota'
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                     }
                    </script>
  
                    <div id="piechart" style="width: 450px; height: 250px;"></div>

                            

                        </div><!-- col-md-6 finish -->

                        

                        <div class="col-md-3"><!-- col-md-6 begin -->

                        <label for="" class="addcostlbl col-md-12"><!-- control-label col-md-3 begin -->

                            No Customers: <?php echo $sumcust;?>

                        </label><!-- control-label col-md-3 finish -->
                        <label for="" class="addcostlbl col-md-12"><!-- control-label col-md-3 begin -->

                            Total Cost: <?php echo (int)$sumcost." $ // ".$sumcost/$size." $";?>

                        </label><!-- control-label col-md-3 finish -->
                        <label for="" class="addcostlbl col-md-12" style="color:<?php echo $color;?>; size: 50px;"><!-- control-label col-md-3 begin -->

                            P\L: <?php echo (int)($sumpay - $sumcost)." $";?>

                        </label><!-- control-label col-md-3 finish -->

                            

                        </div><!-- col-md-6 finish -->
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        <label for="" class="addcostlbl col-md-12"><!-- control-label col-md-3 begin -->

                            Weight / Container: <?php echo $sum_cust_cbm."/".$size;?>

                        </label><!-- control-label col-md-3 finish -->

                        <label for="" class="addcostlbl col-md-12"><!-- control-label col-md-3 begin -->

                            Paid Amount: <?php echo (int)$sumpay." $";?>

                        </label><!-- control-label col-md-3 finish -->
                        <label for="" class="addcostlbl col-md-12"><!-- control-label col-md-3 begin -->

                            

                        </label><!-- control-label col-md-3 finish -->

                            

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <!--new - start-->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            LEBANESE CUSTOMS

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $lebanese_customs;?>" name="lebanese_customs" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->
                        

                    </div><!-- form-group finish -->
                    <!--new - finish-->
                    <!--new - start-->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            TURKISH CUSTOMS

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $turkish_customs;?>" name="turkish_customs" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->
                        

                    </div><!-- form-group finish -->
                    <!--new - finish-->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            TRANSPORTATION/PORTRAGE

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $transportation;?>" name="transportation" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->
                        

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            UTILITIES

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $utilities;?>" name="utilities" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->
                       

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           UNFORESEEN EXPENSES

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $others1;?>" name="other1" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->
                       

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            OTHER

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $others2;?>" name="other2" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->
                        

                    </div><!-- form-group finish -->
                    <!--new - start-->
                    
                    <!--new - finish-->


                     <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Total

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $sumcost;?>" name="" type="text" class="form-control" style="font-weight:bold;">

                        </div><!-- col-md-6 finish -->
                       

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            KG Value (Total Cost / Total KG)

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                        <input value="<?php echo $sumcost / $size; ?>" name="" type="text" class="form-control" style="font-weight:bold;">

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
                <a href="index.php?printcost= <?php echo $edit_cost; ?> " target="_blank"> <i class="fa fa-print"></i> Print Cost Details</a>
            </div><!-- panel-body finish -->

        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->





<?php
/** COST UPDATE - START*/

if(isset($_POST['update'])){
           
    $lebanese_customs= $_POST['lebanese_customs'];
    $turkish_customs= $_POST['turkish_customs'];
    $transportation= $_POST['transportation'];
    $utilities= $_POST['utilities'];
    $other1= $_POST['other1'];
    $other2= $_POST['other2'];
  

      $update_cost= "UPDATE cost SET lebanese_customs='$lebanese_customs', turkish_customs='$turkish_customs', transportation='$transportation',
      utilities='$utilities', others1='$other1', others2='$other2'
       WHERE cont_id = '$edit_cost';";

      $run_cost= mysqli_query($conn,$update_cost);

      if($run_cost){

          

          echo "<script>window.open('index.php?container_add_cost=$edit_cost','_self')</script>";

      }

  }

/** COST UPDATE - FINISH */


} ?>
