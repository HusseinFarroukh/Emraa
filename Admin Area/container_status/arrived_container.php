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

                <i class="fa fa-dashboard"></i> Dashboard / Arrived Containers

            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                    <i class="fa fa-tags fa-fw"></i> Arrived Containers

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> NO </th>
                                <th> Loading Port </th>
                                <th> Discharge Port </th>
                                
                                <th> Departure </th>
                                <th> Estimated Arrival </th>
                                <th> Real Arrival </th>
                                <th> Code </th>
                                <th> Size </th>
                                <th> Booked Size </th>
                                <th> Avlbl Size </th>
                                <th> Customers </th>
                                <th> Cartons </th>
                                
                               
                               
                                <th> Details </th>
                                
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->
 
                            <?php

                                

                                $get_container = "select * from container where status = 1 and arrived = 2 order by cont_no";

                                $run_container = mysqli_query($conn,$get_container);

                                while($row_container=mysqli_fetch_array($run_container)){

                                    $cont_id = $row_container['cont_id']; 
                                    $cont_no = $row_container['cont_no'];
                                    $loading_port = $row_container['loading_port'];
                                    $discharge_port = $row_container['discharge_port'];
                                    $warehouse = $row_container['warehouse'];
                                    $dept_date = $row_container['dept_date'];
                                    $arr_date = $row_container['arr_date'];
                                    $arr_real = $row_container['real_arr'];
                                    $shipper = $row_container['shipper'];
                                    $shipping_line = $row_container['shipping_line'];
                                    $code = $row_container['code'];
                                    $size = $row_container['size'];
                                    $box_qty= $row_container['box_qty'];
                                    $fright = $row_container['fright'];
                                    $seal = $row_container['seal'];
                                    $note = $row_container['cont_desc'];

                                    $get_loadingport = "select * from port where port_id = '$loading_port'";
                                    $run_loadingport = mysqli_query($conn,$get_loadingport);                            
                                    $row_loadingport = mysqli_fetch_array($run_loadingport);                            
                                    $loadingport_desc = $row_loadingport['port_name'];

                                    $get_dischargeport = "select * from portd where port_id = '$discharge_port'";
                                    $run_dischargeport = mysqli_query($conn,$get_dischargeport);                            
                                    $row_dischargeport = mysqli_fetch_array($run_dischargeport);                            
                                    $dischargeport_desc = $row_dischargeport['port_name'];

                                    $get_warehouse = "select * from warehosue where warehouse_id = '$warehouse'";
                                    $run_warehouse = mysqli_query($conn,$get_warehouse);                            
                                    $row_warehouse = mysqli_fetch_array($run_warehouse);                            
                                    $warehouse_desc = $row_warehouse['warehouse_desc'];

                                    $get_shipper = "select * from shipper where shipper_id = '$shipper'";
                                    $run_shipper = mysqli_query($conn,$get_shipper);                            
                                    $row_shipper = mysqli_fetch_array($run_shipper);                            
                                    $shipper_desc = $row_shipper['shipper_name'];

                                    $get_shipline = "select * from shippingline where shipline_id = '$shipping_line'";
                                    $run_shipline = mysqli_query($conn,$get_shipline);                            
                                    $row_shipline = mysqli_fetch_array($run_shipline);                            
                                    $shipline_desc = $row_shipline['shipline_desc'];

                                    $get_bookedSize = "SELECT SUM(cbm) AS ttlSize FROM book WHERE cont_id = '$cont_id' and status=1";
                                    $run_bookedSize = mysqli_query($conn,$get_bookedSize);                            
                                    $row_bookedSize = mysqli_fetch_array($run_bookedSize);                            
                                    $bookedSize= $row_bookedSize['ttlSize'];

                                    $get_custCount = "SELECT COUNT(cust_id) AS custtotal FROM book WHERE cont_id = '$cont_id' and status=1";
                                    $run_custCount = mysqli_query($conn,$get_custCount);                            
                                    $row_custCount = mysqli_fetch_array($run_custCount);                            
                                    $custCount= $row_custCount['custtotal'];





                                   

                            ?>

                            <tr><!-- tr begin -->
                                <td> <?php echo $cont_no; ?> </td>
                                <td> <?php echo $loadingport_desc; ?> </td>
                                <td> <?php echo $dischargeport_desc; ?> </td>
                               
                                <td> <?php echo $dept_date; ?> </td>
                                <td> <?php echo $arr_date; ?> </td>
                                <td> <?php echo $arr_real ?> </td>
                                <td> <?php echo $code; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $bookedSize; ?> </td>
                                <td> <?php echo ($size - $bookedSize); ?> </td>
                                <td> <?php echo $custCount; ?> </td>
                                <td> <?php echo $box_qty; ?> </td>
                                
                               
                                
                                <td>
                                    <a href="index.php?arrived_details= <?php echo $cont_id; ?> ">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                </td>
                               
                            </tr><!-- tr finish -->

                            <?php } ?>

                        </tbody><!-- tbody finish -->

                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->

        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<?php } ?>
