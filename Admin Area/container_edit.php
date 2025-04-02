<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['container_edit'])){

        $edit_ccont_id = $_GET['container_edit'];

        $edit_cont_query = "select * from container where cont_id='$edit_ccont_id'";

        $run_edit = mysqli_query($conn,$edit_cont_query);

        $row_edit = mysqli_fetch_array($run_edit);

        $cont_id = $row_edit['cont_id'];
        $cont_no=substr($row_edit['cont_no'],3);
        $loading_port = $row_edit['loading_port'];
        $discharge_port = $row_edit['discharge_port'];
        $warehouse = $row_edit['warehouse'];
        $dept_date = $row_edit['dept_date'];
        $arr_date = $row_edit['arr_date'];
        $shipper = $row_edit['shipper'];
        $shipping_line = $row_edit['shipping_line'];
        $code = $row_edit['code'];
        $size = $row_edit['size'];
        $box_qty = $row_edit['box_qty'];
        $fright = $row_edit['fright'];
        $seal = $row_edit['seal'];
        $cont_desc = $row_edit['cont_desc'];
        $consignee = $row_edit['consignee'];
        $blno = $row_edit['blno'];

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

                    <i class="fa fa-pencil fa-fw"></i> Edit Container

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Container LB#

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="<?php echo $cont_no;?>" name="cont_no" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Loading Port </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="loading_port" class="form-control"><!-- form-control Begin -->

                              <option value="<?php echo $loading_portid; ?>"> <?php echo $loading_port; ?> </option>

                              <?php

                              $get_loadingport = "select * from port";
                              $run_loadingport = mysqli_query($conn,$get_loadingport);

                              while ($row_loadingport=mysqli_fetch_array($run_loadingport)){

                                $loading_portid = $row_loadingport['port_id'];
                                $loading_port = $row_loadingport['port_name'];

                                  echo "

                                  <option value='$loading_portid'> $loading_port </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Discharging Port </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="discharge_port" class="form-control"><!-- form-control Begin -->

                              <option value="<?php echo $discharge_portid; ?>"> <?php echo $discharge_port; ?> </option>

                              <?php

                              $get_dischargeport = "select * from portd";
                              $run_dischargeport = mysqli_query($conn,$get_dischargeport);

                              while ($row_dischargeport=mysqli_fetch_array($run_dischargeport)){

                                $discharge_portid = $row_dischargeport['port_id'];
                                $discharge_port = $row_dischargeport['port_name'];

                                  echo "

                                  <option value='$discharge_portid'> $discharge_port </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Warehouse </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="warehouse" class="form-control"><!-- form-control Begin -->

                              <option value="<?php echo $warehouse_id; ?>"> <?php echo $warehouse; ?> </option>

                              <?php

                              $get_warehouse = "select * from warehosue";
                              $run_warehouse = mysqli_query($conn,$get_warehouse);

                              while ($row_warehouse=mysqli_fetch_array($run_warehouse)){

                                $warehouse_id = $row_warehouse['warehouse_id'];
                                $warehouse = $row_warehouse['warehouse_desc'];

                                  echo "

                                  <option value='$warehouse_id'> $warehouse </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->


                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Departure Date

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input type="date" value="<?php echo $dept_date?>" name="deptdate"  class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Arrival Date

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input type="date" value="<?php echo $arr_date;?>" name="arrdate" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Shipper </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="shipper" class="form-control"><!-- form-control Begin -->

                              <option value="<?php echo $shipper_id; ?>"> <?php echo $shipper; ?> </option>

                              <?php

                              $get_shipper = "select * from shipper";
                              $run_shipper = mysqli_query($conn,$get_shipper);

                              while ($row_shipper=mysqli_fetch_array($run_shipper)){

                                $shipper_id = $row_shipper['shipper_id'];
                                $shipper = $row_shipper['shipper_name'];

                                  echo "

                                  <option value='$shipper_id'> $shipper </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Shipping Line </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="shipping_line" class="form-control"><!-- form-control Begin -->

                              <option value="<?php echo $shipping_line; ?>"> <?php echo $shipline ; ?> </option>

                              <?php

                              $get_shippingline = "select * from shippingline";
                              $run_shippingline = mysqli_query($conn,$get_shippingline);

                              while ($row_shippingline=mysqli_fetch_array($run_shippingline)){

                                $shippingline_id = $row_shippingline['shipline_id'];
                                $shippingline = $row_shippingline['shipline_desc'];

                                  echo "

                                  <option value='$shippingline_id'> $shippingline </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Shipping Number

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $code; ?> " name="code" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Size

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $size; ?> " name="size" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Box Qty

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $box_qty; ?> " name="box_qty" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Frieght </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="fright" class="form-control"><!-- form-control Begin -->

                                <option value="<?php echo $fright?>"> <?php echo $fright?> </option>

                                <option value="AIR"> AIR </option>
                                <option value="SEA"> SEA </option>
                                <option value="LAND"> LAND </option>

                          </select><!-- form-control Finish -->

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Seal#

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $seal; ?> " name="seal" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Consignee

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $consignee; ?> " name="consignee" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            BLNO

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $blno; ?> " name="blno" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Note

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $cont_desc; ?> " name="cont_desc" type="text" class="form-control">

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
           

            $cont_no= "TR-".$_POST['cont_no'];
            $loading_port = $_POST['loading_port'];
            $discharge_port = $_POST['discharge_port'];
            $warehouse = $_POST['warehouse'];
            $dept_date = $_POST['deptdate'];
            $arr_date = $_POST['arrdate'];
            $shipper = $_POST['shipper'];
            $shipping_line = $_POST['shipping_line'];
            $code = $_POST['code'];
            $size = $_POST['size'];
            $box_qty = $_POST['box_qty'];
            $fright = $_POST['fright'];
            $consignee = $_POST['consignee'];
            $seal = $_POST['seal'];
            $cont_desc = $_POST['cont_desc'];
            $blno = $_POST['blno'];

              $update_container= "update container set cont_no='$cont_no', loading_port='$loading_port', discharge_port='$discharge_port',warehouse='$warehouse',dept_date='$dept_date',arr_date='$arr_date', shipper='$shipper', shipping_line='$shipping_line',code='$code',size='$size',box_qty='$box_qty',fright='$fright',seal='$seal',consignee='$consignee',blno='$blno',cont_desc='$cont_desc' where cont_id='$edit_ccont_id'";

              $run_container= mysqli_query($conn,$update_container);

              if($run_container){

                  echo "<script>alert('Container Updated')</script>";

                  echo "<script>window.open('index.php?container_view','_self')</script>";

              }

          }

?>



<?php } ?>
