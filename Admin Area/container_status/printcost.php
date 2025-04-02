<?php

if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}else{


if (isset($_GET['printcost'])) {
    $container_id = $_GET['printcost'];

$get_container = "select * from container where cont_id='$container_id'";

        $run_container = mysqli_query($conn,$get_container);

        $row_container = mysqli_fetch_array($run_container);

        $container_LB = $row_container['cont_no'];
        $code = $row_container['code'];
        $cont_cbm = $row_container['size'];
        $real_arr = $row_container['real_arr'];
        $arr_date = $row_container['arr_date'];
        $status = $row_container['arrived'];

        if($status == "0"){
            $status = "Pending";
        }
        if($status == "1"){
            $status = "On The Way";
        }
        if($status == "0"){
            $status = "Arrived";
        }

        $get_custcount = "select count(cust_id) AS custcount from book where cont_id='$container_id' and status = 1";

        $run_custcount = mysqli_query($conn,$get_custcount);

        $row_custcount = mysqli_fetch_array($run_custcount);

        $custcount_LB = $row_custcount['custcount'];

}
?>
<div class="container bootdey">
<div class="row invoice row-printable">
<div class="col-md-10">
    <!-- col-lg-12 start here -->
    <div class="panel panel-default plain" id="dash_0">
        <!-- Start .panel -->
        <div class="panel-body p30">
            <div class="row">
                <!-- Start .row -->
                <div class="col-lg-6">
                   <h3><b>Cost List</b></h3>
                </div>
                <!-- col-lg-6 end here -->
                <div class="col-lg-6">
                    <!-- col-lg-6 start here -->
                    <div class="invoice-from">
                        <ul class="list-unstyled text-right">
                            <li>Karout Mall</li>
                            <li>Gallery Semaan</li>
                            <li>01-542077</li>
                            <li>www.karoutmall.com</li>
                        </ul>
                    </div>
                </div>
                <!-- col-lg-6 end here -->
                <div class="col-lg-12">
                    <!-- col-lg-12 start here -->
                    <div class="invoice-details mt25">
                        <div class="well">
                            <ul class="list-unstyled mb0">
                                <li><strong>Container NO:</strong><?php echo $container_LB." / "."$code";?></li>
                                <li><strong>Customer NOs:</strong> <?php echo $custcount_LB;?></li>
                                <li><strong>Date:</strong> <?php echo $arr_date;?></li>
                                <li><strong>Status:</strong> <span class="label label-danger"><?php echo $status;?></span></li>
                            </ul>
                        </div>
                    </div>
                   
                    <div class="invoice-items">
                        <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="per10 text-center">PAYMENT DESCRIPTION</th>
                                        <th class="per40 text-center">AMOUNT ($)</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <?php
                                 $get_cost = "SELECT * FROM cost WHERE cont_id=".$container_id;

                                 $run_get_cost = mysqli_query($conn,$get_cost);
                         
                                 $row_cost = mysqli_fetch_array($run_get_cost);
                                ?>
                                <tbody>
                                    <tr>
                                        <td>LEBANESE CUSTOMS/td>
                                        <td><?php echo $row_cost["lebanese_customs"];?></td>
                                                                               
                                    </tr>
                                    <tr>
                                        <td>TURKISH CUSTOMS</td>
                                        <td><?php echo $row_cost["turkish_customs"];?></td>
                                                                              
                                    </tr>
                                    <tr>
                                        <td>TRANSPORTATION</td>
                                        <td><?php echo $row_cost["transportation"];?></td>                                     
                                    </tr>
                                    <tr>
                                        <td>UTILITIES</td>
                                        <td><?php echo $row_cost["utilities"];?></td>                                      
                                    </tr>
                                    <tr>
                                        <td>UNFORESEEN EXPENSES</td>
                                        <td><?php echo $row_cost["others1"];?></td>                                      
                                    </tr>
                                    <tr>
                                        <td>OTHER</td>
                                        <td><?php echo $row_cost["others2"];?></td>                                       
                                    </tr>
                                    <tr>
                                        <td><b>TOTAL</b></td>
                                        <td><b><?php echo $row_cost["lebanese_customs"]+$row_cost["turkish_customs"]+$row_cost["transportation"]+
                                        $row_cost["utilities"]+$row_cost["others1"]+$row_cost["others2"];?></b></td>                                       
                                    </tr>
                                  
                                  
                                  
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                    <div class="invoice-footer mt25">
                        <p class="text-center">Generated on <?php echo date("l");echo ",  ";echo date("Y/m/d"); ?></p>
                    </div>
                    <span class="pull-right hidden-print">
                      <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a> 
                    </span>
                </div>
                <!-- col-lg-12 end here -->
            </div>
            <!-- End .row -->
        </div>
    </div>
    <!-- End .panel -->
</div>
<!-- col-lg-12 end here -->
</div>
</div>
<?php } ?>
