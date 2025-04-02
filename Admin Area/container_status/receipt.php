<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{


if (isset($_GET['receipt'])) {
$container_id = $_GET['receipt'];

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
                $color="red";
            }
            if($status == "1"){
                $status = "On The Way";
            }
            if($status == "2"){
                $status = "Arrived";
                $color="green";
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
                       <h3><b>LAYAN Receipt</b></h3>
                    </div>
                    <!-- col-lg-6 end here -->
                    <div class="col-lg-6">
                        <!-- col-lg-6 start here -->
                        <div class="invoice-from">
                            <ul class="list-unstyled text-right">
                                <li></li>
                                <li>LAYAN ADDRESS</li>
                                <li>LAYAN PHONE</li>
                                <li>LAYAN EMAIL</li>
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
                                    <li><strong>Status:</strong> <span class="label label-danger" style=""><?php echo $status;?></span></li>
                                </ul>
                            </div>
                        </div>
                       
                        <div class="invoice-items">
                            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="per10 text-center">NO</th>
                                            <th class="per40 text-center">Customer</th>
                                            <th class="per10 text-center">CBM</th>
                                            <th class="per10 text-center">Price</th>
                                            <th class="per10 text-center">Adj</th>
                                            <th class="per20 text-center">Total</th>
                                            <th class="per20 text-center">Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $totalcbm=0;
                                        $totalprice=0;
                                        $get_bookdetails = "SELECT * FROM book WHERE cont_id = '$container_id' and status=1";
        
                                        $run_bookdetails = mysqli_query($conn,$get_bookdetails);
        
                                        while($row_bookdetails=mysqli_fetch_array($run_bookdetails)){
        
                                           $trans_id = $row_bookdetails['trans_id'];
                                           $cust_id = $row_bookdetails['cust_id'];
                                           
                                           $cbm = $row_bookdetails['cbm'];
                                           $totalcbm = $totalcbm + $cbm;
                                           $price = $row_bookdetails['price'];
                                           $extra = $row_bookdetails['extra'];
                                           $totalprice= $totalprice + ($price * $cbm) + $extra;
                                           $note = $row_bookdetails['notes'];
                                           
                                           
                                            $get_customer = "select * from customer where cust_id = '$cust_id'";
                                            $run_customer = mysqli_query($conn,$get_customer);                            
                                            $row_customer = mysqli_fetch_array($run_customer);  

                                            $cust_name = $row_customer['cust_name'];
                                            $cust_id = "ACC000".$row_customer['cust_id'];
                                            $cust_code = $row_customer['cust_code'];
                                            $cust_phone = $row_customer['cust_phone'];
                                        ?>
                                        <tr>
                                            <td> <?php echo $no."/".$custcount_LB;?></td>
                                            <td> <?php echo $cust_name?></td>
                                            <td class="text-center"><?php echo $cbm;?></td>
                                            <td class="text-center"><?php echo (int)$price;?></td>
                                            <td class="text-center"><?php echo (int)$extra;?></td>
                                            <td class="text-center"><?php echo ($cbm * $price) + $extra;?></td>
                                            <td class="text-center"><?php echo $note;?></td>
                                        </tr>
                                        <?php $no++;}?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5" class="text-right">Total:</th>
                                            <th class="text-center"><?php echo $totalprice?> USD</th>
                                        </tr>
                                        <tr>
                                            <th colspan="5" class="text-right">Booked CBM:</th>
                                            <th class="text-center"><?php echo $totalcbm?> CBM</th>
                                        </tr>
                                        
                                    </tfoot>
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
