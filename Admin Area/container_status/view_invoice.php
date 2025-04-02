<br><br>
<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

        if (isset($_GET['view_invoice'])) {
            $container_id = $_GET['view_invoice'];

            $edit_cont_query = "select * from container where cont_id='$container_id'";

            $run_edit = mysqli_query($conn,$edit_cont_query);
    
            $row_edit = mysqli_fetch_array($run_edit);
            
            
            $cont_no= $row_edit['cont_no'];
            $loading_port = $row_edit['loading_port'];
            $discharge_port = $row_edit['discharge_port'];
            $warehouse = $row_edit['warehouse'];
            $dept_date = $row_edit['dept_date'];
            $arr_date = $row_edit['arr_date'];
            $real_arr = $row_edit['real_arr'];
            $shipper = $row_edit['shipper'];
            $shipping_line = $row_edit['shipping_line'];
            $code = $row_edit['code'];
            $size = $row_edit['size'];
            $box_qty = $row_edit['box_qty'];
            $fright = $row_edit['fright'];
            $seal = $row_edit['seal'];
            $consignee = $row_edit['consignee'];
            $blno = $row_edit['blno'];
            $cont_desc = $row_edit['cont_desc'];
    
            $get_loadingport= "select * from port where port_id='$loading_port'";
            $run_loadingport = mysqli_query($conn,$get_loadingport);
            $row_loadingport = mysqli_fetch_array($run_loadingport);
            $loading_portid = $row_loadingport['port_id'];
            $loading_port = $row_loadingport['port_name'];
    
            $get_dichargeport= "select * from portd where port_id='$discharge_port'";
            $run_dichargeport= mysqli_query($conn,$get_dichargeport);
            $row_dichargeport = mysqli_fetch_array($run_dichargeport);
            $discharge_portid = $row_dichargeport['port_id'];
            $discharge_port = $row_dichargeport['port_name'];
    
            $get_warehouse= "select * from warehosue where warehouse_id='$warehouse'";
            $run_warehouse= mysqli_query($conn,$get_warehouse);
            $row_warehouse = mysqli_fetch_array($run_warehouse);
            $warehouse_id = $row_warehouse['warehouse_id'];
            $warehouse = $row_warehouse['warehouse_desc'];
    
            $get_shipper= "select * from shipper where shipper_id='$shipper'";
            $run_shipper= mysqli_query($conn,$get_shipper);
            $row_shipper = mysqli_fetch_array($run_shipper);
            $shipper_id = $row_shipper['shipper_id'];
            $shipper = $row_shipper['shipper_name'];
    
            $get_shipline= "select * from shippingline where shipline_id= '$shipping_line'";
            $run_shipline= mysqli_query($conn,$get_shipline);
            $row_shipline = mysqli_fetch_array($run_shipline);
            $shipline = $row_shipline['shipline_desc'];
    
            
            }
             ?>
             <head>
            
             </head>
             <link type="text/css" media="print" rel="stylesheet" href="../css/print.css">
             <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
             </head>
            <div class="container">
               <div class="col-md-12">
                  <div class="invoice">
                     <!-- begin invoice-company -->
                     <div class="invoice-company text-inverse f-w-600">
                        <span class="pull-right hidden-print">
                          <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a> 
                        </span>
                        <p class="pull-right">
                          <a><i class="t-plus-1 fa-fw fa-lg"></i> <?php echo "SN00000".$container_id?></a> 
                        </p>
                        <div class="main-title">
                            
                                Container Report
                            
                        </div>
                           
<BR>
                        <div class="container_lb">
                            
                                <?php echo "Lebanon's Code..........................................".$cont_no."..........................................رمز لبنان"?>
                            
                        </div>
                        <br>
                        <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped"><!-- tabel tabel-hover table-striped table-bordered begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                
                                <th> <div class="square">
                                    <p>البلد المنشأ</p>
                                    <p>Country of Origin</p></row>
                                    <p><?php echo $loading_port; ?></p>
                                </div>
                         </th>
                         <th> 
                         </th>
                                <th> <div class="square">
                                    <p>رقم الرصاصة</p>
                                    <p>Port Seal</p></row>
                                    <p>..............</p>
                                </div>
                         </th>
                                
                               
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                
                                <th> <div class="square">
                                    <p>رقم حاوية التاجر</p>
                                    <p>ٍSupplier Code</p></row>
                                    <p><?php echo $shipper; ?></p>
                                </div>
                         </th>
                         <th>
                         <div class="square">
                                    <p>رقم الحاوية</p>
                                    <p>Container Number</p></row>
                                    <p><?php echo $code; ?></p>
                                </div> 
                         </th>
                                <th> <div class="square">
                                    <p>تاريخ الاستلام</p>
                                    <p>Receiving Date</p></row>
                                    <p><?php echo $arr_date; ?></p>
                                </div>
                         </th>
                                
                               
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                
                                <th> <div class="square">
                                    <p>عدد العلب</p>
                                    <p>QTY BOX</p></row>
                                    <p><?php echo $box_qty; ?></p>
                                </div>
                         </th>
                         <th> <div class="square">
                                     <p>مستودع التفريغ</p>
                                    <p>ًWarehouse Receiving</p></row>
                                    <p>..............</p>
                                    </div>
                         </th>
                                <th> <div class="square">
                                    <p>حجم الحاوية</p>
                                    <p>Container Size</p></row>
                                    <p><?php echo $size; ?></p>
                                </div>
                         </th>
                                
                               
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                       

                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
                <br>
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                
                                <th> CBM </th>
                                <th style="text-align:right;"> CUSTOMER NAME / اسم الزبون </th>
                               
                               
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php

                                

                                $get_custcbm = "select cust_id, cbm from book where cont_id='$container_id' and status = 1";

                                $run_custcbm = mysqli_query($conn,$get_custcbm);

                                while($row_custcbm=mysqli_fetch_array($run_custcbm)){

                                    $cust_id = $row_custcbm['cust_id'];
                                    $cbm = $row_custcbm['cbm']; 

                                    $get_customer = "select cust_name, cust_code from customer where cust_id='$cust_id'";

                                    $run_customer = mysqli_query($conn,$get_customer);
    
                                    $row_customer=mysqli_fetch_array($run_customer);    
                                        $cust_name = $row_customer['cust_name'];
                                        $cust_code = $row_customer['cust_code']; 


                                    

                            ?>

                            <tr><!-- tr begin -->
                                <td> <?php echo $cbm; ?> </td>
                                <td style="text-align:right;"> <?php echo $cust_name.' (ACC000'.$cust_id." / ".$cust_code.')' ?> </td>
                                
                            </tr><!-- tr finish -->

                            <?php } ?>

                        </tbody><!-- tbody finish -->

                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
                <br>
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered tabledriver"><!-- tabel tabel-hover table-striped table-bordered begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                
                                <th>  </th>
                                <th style="text-align:right;"> Employees' Names / اسماء الموظفين <th>
                               
                               
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                           

                            <tr><!-- tr begin -->
                                <td>........................................</td>
                                <td>........................................</td>
                                
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                <td>........................................</td>
                                <td>........................................</td>
                                
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                <td>........................................</td>
                                <td>........................................</td>
                                
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                <td>........................................</td>
                                <td>........................................</td>
                                
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                <td>........................................</td>
                                <td>........................................</td>
                                
                            </tr><!-- tr finish -->
                           

                           

                        </tbody><!-- tbody finish -->

                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
                <br>
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                
                                <th>  </th>
                                <th style="text-align:right;"> Driver / السائق<th>
                               
                               
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody class="tabledriver"><!-- tbody begin -->

                           

                            <tr><!-- tr begin -->
                                <td>........................................</td>
                                <td> Name / الاسم </td>
                                
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                <td>........................................</td>
                                <td> Telephone / الهاتف </td>
                                
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                <td>........................................</td>
                                <td> Plaque / رقم اللوحة </td>
                                
                            </tr><!-- tr finish -->
                            
                           

                           

                        </tbody><!-- tbody finish -->

                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
                <br>
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->

                        <thead class="tabledriver"><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> ناقص 
                                    <div class="checkcomplete">
                                </div>
                                </th>
                                <th> كامل
                                    <div class="checkcomplete">
                                </div>
                                </th>
                                <th style="text-align:right;"> تم استلام الحاوية<th>

                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->


                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
                <br>
                <div>
                    <div class="titleinvoice"> النواقص و الاخطاء
                    </div>
                    <br><br>
                    <div class="notesbox">
                    </div>
                </div>
                                        <br>
                
<br>
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th>  </th>
                                <th>  </th>
                                <th style="text-align:right;"> Signature / الامضاء<th>
                               
                               
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody class="tabledriver"><!-- tbody begin -->

                           

                            <tr><!-- tr begin -->
                                <td>........................................</td>
                                <td>........................................</td>
                                <td>........................................</td>
                                
                            </tr><!-- tr finish -->
                            
                            
                           

                           

                        </tbody><!-- tbody finish -->

                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->

                       
                     </div> </div> </div>
                     <!-- end invoice-company -->
                     <!-- begin invoice-header -->
                     <div class="invoice-header">
                       
                       
                        <div class="invoice-date white">
                          <div class="date text-inverse m-t-5 white"><?php echo date("l");echo ",  ";echo date("Y/m/d"); ?></div>
                           
            
                           <div class="invoice-detail white">
                              ___________________________________________________________________________________________________________________________________________________________________
                             
                           </div>
                        </div>
                     </div>
                     </div><!-- end invoice-header -->
                     </div><!-- begin invoice-content -->
                    
                     </div><!-- end table-responsive -->
                     </div><!-- begin invoice-price -->
                     </div>
                     </div><!-- end invoice-header -->
                     </div><!-- begin invoice-content -->
                    
                     </div><!-- end table-responsive -->
                     </div><!-- begin invoice-price -->
                        
                    
            <?php } ?>
            