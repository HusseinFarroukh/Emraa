<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

        $get_PENDCOUNTAINER = "SELECT COUNT(CONT_id) AS pending FROM container WHERE status = 1 and arrived = 0";
        $run_PENDCOUNTAINER = mysqli_query($conn,$get_PENDCOUNTAINER);                            
        $row_PENDCOUNTAINER = mysqli_fetch_array($run_PENDCOUNTAINER);                            
        $PENDCOUNTAINER = $row_PENDCOUNTAINER['pending'];

        $get_ONTHEWAY = "SELECT COUNT(CONT_id) AS ontheway FROM container WHERE status = 1 and arrived = 1";
        $run_ONTHEWAY = mysqli_query($conn,$get_ONTHEWAY);                            
        $row_ONTHEWAY = mysqli_fetch_array($run_ONTHEWAY);                            
        $ONTHEWAY = $row_ONTHEWAY['ontheway'];

        $get_ARRIVED = "SELECT COUNT(CONT_id) AS arrived FROM container WHERE status = 1 and arrived = 2";
        $run_ARRIVED = mysqli_query($conn,$get_ARRIVED);                            
        $row_ARRIVED = mysqli_fetch_array($run_ARRIVED);                            
        $ARRIVED = $row_ARRIVED['arrived'];


?>
<div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> LAYAN </h1>

        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->

                <i class="fa fa-dashboard"></i> Dashboard

            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->

    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->

<div class="row"><!-- row no: 2 begin -->

    <div class="col-lg-6 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-green"><!-- panel panel-primary begin -->

            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->

                        <i class="fa fa-ship fa-5x"></i>

                    </div><!-- col-xs-3 finish -->

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> Avilable </div>

                        <div> Container <?php echo " (".$PENDCOUNTAINER.")";?> </div>

                    </div><!-- col-xs-9 text-right finish -->

                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->

            <a href="index.php?avilable_container"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->

                    <span class="pull-left"><!-- pull-left begin -->
                        View Details
                    </span><!-- pull-left finish -->

                    <span class="pull-right"><!-- pull-right begin -->
                        <i class="fa fa-arrow-circle-right"></i>
                    </span><!-- pull-right finish -->

                    <div class="clearfix"></div>

                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->

        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-3 col-md-6 finish -->

    <?php /* <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-orange"><!-- panel panel-green begin -->

            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->

                        <i class="fa fa-road fa-5x"></i>

                    </div><!-- col-xs-3 finish -->

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> On The Way </div>

                        <div> Container <?php echo " (".$ONTHEWAY.")";?> </div>

                    </div><!-- col-xs-9 text-right finish -->

                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->

            <a href="index.php?ontheway_container"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->

                    <span class="pull-left"><!-- pull-left begin -->
                        View Details
                    </span><!-- pull-left finish -->

                    <span class="pull-right"><!-- pull-right begin -->
                        <i class="fa fa-arrow-circle-right"></i>
                    </span><!-- pull-right finish -->

                    <div class="clearfix"></div>

                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->

        </div><!-- panel panel-green finish -->
    </div><!-- col-lg-3 col-md-6 finish --> */?>

    <div class="col-lg-6 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-red"><!-- panel panel-yellow begin -->

            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->

                        <i class="fa fa-check fa-5x"></i>

                    </div><!-- col-xs-3 finish -->

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> Arrived </div>

                        <div> Container <?php echo " (".$ARRIVED.")";?> </div>

                    </div><!-- col-xs-9 text-right finish -->

                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->

            <a href="index.php?arrived_container"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->

                    <span class="pull-left"><!-- pull-left begin -->
                        View Details
                    </span><!-- pull-left finish -->

                    <span class="pull-right"><!-- pull-right begin -->
                        <i class="fa fa-arrow-circle-right"></i>
                    </span><!-- pull-right finish -->

                    <div class="clearfix"></div>

                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->

        </div><!-- panel panel-yellow finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
<div class="row"><!-- row no: 3 begin -->
    <div class="col-lg-12"><!-- col-lg-8 begin -->
        <div class="panel panel-primary"><!-- panel panel-primary begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                    <i class="fa fa-money fa-fw"></i> Avilable Containers

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- table table-hover table-striped table-bordered begin -->

                        <thead><!-- thead begin -->

                            <tr><!-- th begin -->

                                <th> NO </th>
                                <th> Loading Port </th>
                                <th> Discharge Port </th>
                                
                                <th> Departure </th>
                                <th> Arrival </th>
                               
                                <th> Code </th>
                                <th> Weight </th>
                                <th> Booked Size </th>
                                <th> Avlbl Weigh </th>
                                <th> Customers </th>
                                <th> Cartons </th>
                                <th> Status </th>

                            </tr><!-- th finish -->

                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php

                                

                                $get_container = "SELECT * FROM container 
                                                WHERE status = 1 
                                                AND arrived = 0 
                                                ORDER BY CAST(RIGHT(cont_no, CHAR_LENGTH(cont_no)-3) AS INT) DESC LIMIT 10";

                                $run_container = mysqli_query($conn,$get_container);

                                while($row_container=mysqli_fetch_array($run_container)){

                                    $cont_id = $row_container['cont_id']; 
                                    $cont_no = $row_container['cont_no'];
                                    $loading_port = $row_container['loading_port'];
                                    $discharge_port = $row_container['discharge_port'];
                                    $warehouse = $row_container['warehouse'];
                                    $dept_date = $row_container['dept_date'];
                                    $arr_date = $row_container['arr_date'];
                                    $shipper = $row_container['shipper'];
                                    $shipping_line = $row_container['shipping_line'];
                                    $code = $row_container['code'];
                                    $size = $row_container['size'];
                                    $box_qty= $row_container['box_qty'];
                                    $fright = $row_container['fright'];
                                    $seal = $row_container['seal'];
                                    $note = $row_container['cont_desc'];
                                    $cont_status =$row_container['arrived'];

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

                                    $get_bookedSize = "SELECT SUM(cbm) AS ttlSize FROM book WHERE cont_id = '$cont_id'";
                                    $run_bookedSize = mysqli_query($conn,$get_bookedSize);                            
                                    $row_bookedSize = mysqli_fetch_array($run_bookedSize);                            
                                    $bookedSize= $row_bookedSize['ttlSize'];

                                    $get_custCount = "SELECT COUNT(cust_id) AS custtotal FROM book WHERE cont_id = '$cont_id'";
                                    $run_custCount = mysqli_query($conn,$get_custCount);                            
                                    $row_custCount = mysqli_fetch_array($run_custCount);                            
                                    $custCount= $row_custCount['custtotal'];

                                    if($cont_status == '0')
                                    {
                                        $cont_sts = 'Pending';
                                    }
                                    if($cont_status == '1')
                                    {
                                        $cont_sts = 'On The Way';
                                    }
                                    if($cont_status == '2')
                                    {
                                        $cont_sts = 'Arrived';
                                    }
       

                            ?>

                            <tr><!-- tr begin -->
                                <td> <?php echo $cont_no; ?> </td>
                                <td> <?php echo $loadingport_desc; ?> </td>
                                <td> <?php echo $dischargeport_desc; ?> </td>
                               
                                <td> <?php echo $dept_date; ?> </td>
                                <td> <?php echo $arr_date; ?> </td>
                                
                                <td> <?php echo $code; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $bookedSize; ?> </td>
                                <td> <?php echo ($size - $bookedSize); ?> </td>
                                <td> <?php echo $custCount; ?> </td>
                                <td> <?php echo $box_qty; ?> </td>
                                
                               
                                
                                <td>  <?php echo $cont_sts; ?> </td>
                               
                            </tr><!-- tr finish -->

                            <?php } ?>

                        </tbody><!-- tbody finish -->

                    </table><!-- table table-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->

                <div class="text-right"><!-- text-right begin -->

                    <a href="index.php?view_all_containers"><!-- a href begin -->

                        View All Containers <i class="fa fa-arrow-circle-right"></i>

                    </a><!-- a href finish -->

                </div><!-- text-right finish -->

            </div><!-- panel-body finish -->

        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-8 finish -->



</div><!-- row no: 3 finish -->
<?php } ?>

<script>

function load_data(query)
{
	if(query.length > 2)
	{
		var form_data = new FormData();

		form_data.append('query', query);

		var ajax_request = new XMLHttpRequest();

		ajax_request.open('POST', 'process_data.php');

		ajax_request.send(form_data);

		ajax_request.onreadystatechange = function()
		{
			if(ajax_request.readyState == 4 && ajax_request.status == 200)
			{
				var response = JSON.parse(ajax_request.responseText);

				var html = '<div class="list-group">';

				if(response.length > 0)
				{
					for(var count = 0; count < response.length; count++)
					{
						html += '<a href="#" class="list-group-item list-group-item-action" onclick="get_text(this)">'+response[count].cont_no+'</a>';
					}
				}
				else
				{
					html += '<a href="#" class="list-group-item list-group-item-action disabled">No Data Found</a>';
				}

				html += '</div>';

				document.getElementById('search_result').innerHTML = html;
			}
		}
	}
	else
	{
		document.getElementById('search_result').innerHTML = '';
	}
}


function get_text(event)
{
	var string = event.textContent;
	
	document.getElementsByName('search_box')[0].value = string;
	
	document.getElementById('search_result').innerHTML = '';

	

	

}


</script>