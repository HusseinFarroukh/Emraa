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

                <i class="fa fa-dashboard"></i> Dashboard / Insert Container

            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                    <i class="fa fa-money fa-fw"></i> Insert Container

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Container TR#

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="cont_no" type="text" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Shipper </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="shipper" class="form-control"><!-- form-control Begin -->

                              <option> select shipper </option>

                              <?php

                              $get_shipper = "select * from shipper";
                              $run_shipper = mysqli_query($conn,$get_shipper);

                              while ($row_type=mysqli_fetch_array($run_shipper)){

                                  $shipper_id = $row_type['shipper_id'];
                                  $shipper_desc = $row_type['shipper_name'];

                                  echo "

                                  <option value='$shipper_id'> $shipper_desc </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->
                           </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Consignee

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="consignee" type="text" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                   <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Shipper NO

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="code" type="text" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Loading Port </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="loading_port" class="form-control"><!-- form-control Begin -->

                              <option> select a source port </option>

                              <?php

                              $get_port = "select * from port";
                              $run_port = mysqli_query($conn,$get_port);

                              while ($row_type=mysqli_fetch_array($run_port)){

                                  $port_id = $row_type['port_id'];
                                  $port_desc = $row_type['port_name'];

                                  echo "

                                  <option value='$port_id'> $port_desc </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->
                           </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->
                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Discharge Port </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="discharge_port" class="form-control"><!-- form-control Begin -->

                              <option> select a destination port </option>

                              <?php

                              $get_port = "select * from portd";
                              $run_port = mysqli_query($conn,$get_port);

                              while ($row_type=mysqli_fetch_array($run_port)){

                                  $port_id = $row_type['port_id'];
                                  $port_desc = $row_type['port_name'];

                                  echo "

                                  <option value='$port_id'> $port_desc </option>

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

                            <input name="dept_date" type="date" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Arrival Date

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="arr_date" type="date" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Type of Shipping

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <select name="fright"  class="form-control" required>
                                <option> pick a fright type </option>
                                <option value="AIR"> AIR </option>
                                <option value="SEA"> SEA </option>
                                <option value="LAND"> LAND </option>
                            </select>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    

                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Shipping Line </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="shipping_line" class="form-control"><!-- form-control Begin -->

                              <option> select shipping line </option>

                              <?php

                              $get_shipline = "select * from shippingline";
                              $run_shipline = mysqli_query($conn,$get_shipline);

                              while ($row_type=mysqli_fetch_array($run_shipline)){

                                  $shipline_id = $row_type['shipline_id'];
                                  $shipline_desc = $row_type['shipline_desc'];

                                  echo "

                                  <option value='$shipline_id'> $shipline_desc </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->
                           </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                    

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                          Weight (KG)

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="size" type="text" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           B/L NO

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="blno" type="text" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Seal #

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="seal" type="text" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           BOX QTY

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="box_qty" type="text" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    

                   

                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Warehouse </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="warehouse" class="form-control"><!-- form-control Begin -->

                              <option> select a warehouse </option>

                              <?php

                              $get_warehouse = "select * from warehosue";
                              $run_warehouse = mysqli_query($conn,$get_warehouse);

                              while ($row_type=mysqli_fetch_array($run_warehouse)){

                                  $warehouse_id = $row_type['warehouse_id'];
                                  $warehouse_desc = $row_type['warehouse_desc'];

                                  echo "

                                  <option value='$warehouse_id'> $warehouse_desc </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Note

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="desc" type="text" class="form-control" required>

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

              $cont_no = "TR-".$_POST['cont_no'];
              $loading_port = $_POST['loading_port'];
              $discharge_port = $_POST['discharge_port'];
              $warehouse= $_POST['warehouse'];
              $dept_date = $_POST['dept_date'];
              $arr_date = $_POST['arr_date'];
              $shipper = $_POST['shipper'];
              $shipping_line = $_POST['shipping_line'];
              $code = $_POST['code'];
              $size = $_POST['size'];
              $box_qty = $_POST['box_qty'];
              $fright= $_POST['fright'];
              $cont_seal = $_POST['seal'];
              $cont_desc= $_POST['desc'];
              $cont_consignee = $_POST['consignee'];
              $cont_blno= $_POST['blno'];
              
             

              $insert_container = "insert into container (cont_no,loading_port,discharge_port,warehouse,dept_date,arr_date,shipper,shipping_line,code,size,box_qty,fright,seal,consignee,blno,cont_desc) 
              values ('$cont_no','$loading_port ','$discharge_port','$warehouse','$dept_date','$arr_date','$shipper','$shipping_line','$code','$size','$box_qty','$fright','$cont_seal','$cont_consignee','$cont_blno','$cont_desc')";

              $run_insert = mysqli_query($conn,$insert_container);

                
                $get_new_cont = "SELECT MAX(cont_id) AS newcont from container;";
                $run_get = mysqli_query($conn,$get_new_cont);
                $row_new_cont=mysqli_fetch_array($run_get);
                $new_cont_id = $row_new_cont['newcont'];

                $insert_cont_cost = "INSERT INTO cost(cont_id) VALUES('$new_cont_id')";
  
                $run_insert_new = mysqli_query($conn,$insert_cont_cost);

              if($run_insert){

                  echo "<script>alert('Container Created')</script>";

                  echo "<script>window.open('index.php?container_view','_self')</script>";

              }

          }

?>

<?php } ?>
