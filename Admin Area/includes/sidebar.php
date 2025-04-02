<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
      $accessuser = $admin_id;
?>

<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top begin -->
    <div class="navbar-header"><!-- navbar-header begin -->

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle begin -->

            <span class="sr-only">Toggle Navigation</span>

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        </button><!-- navbar-toggle finish -->

        <a href="index.php?dashboard" class="navbar-brand"> LAYAN </a>

    </div><!-- navbar-header finish -->

    <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav begin -->

        <li class="dropdown"><!-- dropdown begin -->

            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle begin -->

                <i class="fa fa-user"></i> <?php echo $admin_name; ?> <b class="caret"></b>

            </a><!-- dropdown-toggle finish -->

            <ul class="dropdown-menu"><!-- dropdown-menu begin -->
                <li><!-- li begin -->
                    <a href="index.php?port"><!-- a href begin -->

                        <i class="fa fa-fw fa-plane"></i> Loading Port

                    </a><!-- a href finish -->
                </li><!-- li finish -->

                <li><!-- li begin -->
                    <a href="index.php?portd"><!-- a href begin -->

                        <i class="fa fa-fw fa-plane"></i> Discharge Port

                    </a><!-- a href finish -->
                </li><!-- li finish -->

                <li><!-- li begin -->
                    <a href="index.php?warehouse"><!-- a href begin -->

                        <i class="fa fa-fw fa-building"></i> Warehouse

                    </a><!-- a href finish -->
                </li><!-- li finish -->
                <li class="divider"></li>
                <li><!-- li begin -->
                    <a href="index.php?shipper"><!-- a href begin -->

                        <i class="fa fa-fw fa-truck"></i> Shipper

                        <span class="badge"></span>

                    </a><!-- a href finish -->
                </li><!-- li finish -->

                <li><!-- li begin -->
                    <a href="index.php?shipping_line"><!-- a href begin -->

                        <i class="fa fa-fw fa-ship"></i> Shipping Line

                        <span class="badge"></span>

                    </a><!-- a href finish -->
                </li><!-- li finish -->

                

                <li class="divider"></li>

                

                

                <li><!-- li begin -->
                    <a href="includes/logout.inc.php"><!-- a href begin -->

                        <i class="fa fa-fw fa-power-off"></i> Log Out

                    </a><!-- a href finish -->
                </li><!-- li finish -->

            </ul><!-- dropdown-menu finish -->

        </li><!-- dropdown finish -->

    </ul><!-- nav navbar-right top-nav finish -->
    

    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse begin -->
        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav begin -->
            <li><!-- li begin -->
                <a href="index.php?dashboard"><!-- a href begin -->

                        <i class="fa fa-fw fa-dashboard"></i> Dashboard

                </a><!-- a href finish -->

            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#products"><!-- a href begin -->

                        <i class="fa fa-fw fa-ship"></i> Container
                        <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href finish -->

                <ul id="products" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?container_create"> Create Container </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?container_view"> View Container </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->

            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#client"><!-- a href begin -->

                        <i class="fa fa-fw fa-user"></i> Client
                        <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href finish -->

                <ul id="client" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?client_create"> Create Client </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?client_view"> View Client </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->

            </li><!-- li finish -->
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#account"><!-- a href begin -->

                        <i class="fa fa-fw fa-usd"></i> Clients Accounts
                        <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href finish -->

                <ul id="account" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?add_payment"> Add Payments </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_payment"> View Payments </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->

            </li><!-- li finish -->
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#search"><!-- a href begin -->

                        <i class="fa fa-fw fa-file-text"></i> Search
                        <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href finish -->

                <ul id="search" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin LB container-->
                    <form action="index.php?" class="form-horizontal" method="get"><!-- form-horizontal begin -->
                        <div class="form-group"><!-- form-group begin -->

                        <div class="col-md-12"><!-- col-md-6 begin -->

                            <div class="dropdown">
    				            <input type="text" name="container_view" class="form-control form-control-lg" placeholder="TR no..." id="search_box" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onkeyup="javascript:load_data(this.value)" style="margin:auto !important; width:200px !important;"  />
    				            <span id="search_result" style="width:15px !important;"></span>
    			            </div>

                        </div><!-- col-md-6 finish -->

                         </div><!-- form-group finish -->
                   
                    </form><!-- form-horizontal finish -->
                    </li><!-- li finish -->
                    <li><!-- li begin Customer-->
                    <form action="index.php?" class="form-horizontal" method="get"><!-- form-horizontal begin -->
                        <div class="form-group"><!-- form-group begin -->

                        <div class="col-md-12"><!-- col-md-6 begin -->

                        <div class="dropdown">
    				<input type="text" name="container_viewcust" class="form-control form-control-lg" placeholder="Customer..." id="search_boxcust" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onkeyup="javascript:load_datacust(this.value)" style="margin:auto !important; width:200px !important;" />
    				<span id="search_resultcust"></span>
    			</div>

                        </div><!-- col-md-6 finish -->

                         </div><!-- form-group finish -->
                   
                    </form><!-- form-horizontal finish -->
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                       
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->

            </li><!-- li finish -->


          

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#reports"><!-- a href begin -->

                        <i class="fa fa-fw fa-file-text"></i> Reports
                        <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href finish -->

                <ul id="reports" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?sales_by_client"> Sales By Client </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?top_clients"> TOP 10 Clients </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?sales_by_container"> Sales By Container</a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->

            </li><!-- li finish -->



            


            <li><!-- li begin -->
                <a href="includes/logout.inc.php"><!-- a href begin -->
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a><!-- a href finish -->
            </li><!-- li finish -->

        </ul><!-- nav navbar-nav side-nav finish -->
    </div><!-- collapse navbar-collapse navbar-ex1-collapse finish -->

</nav><!-- navbar navbar-inverse navbar-fixed-top finish -->

    
   
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

				var html = '<div class="list-group" style="width:180px !important; margin:0 !important;margin:auto !important;">';

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
	
	document.getElementsByName('container_view')[0].value = string;
	
	document.getElementById('search_result').innerHTML = '';
}



function load_datacust(query)
{
	if(query.length > 2)
	{
		var form_data = new FormData();

		form_data.append('queryc', query);

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
						html += '<a href="#" class="list-group-item list-group-item-action" onclick="get_textcust(this)">'+response[count].cust_name+'</a>';
					}
				}
				else
				{
					html += '<a href="#" class="list-group-item list-group-item-action disabled">No Data Found</a>';
				}

				html += '</div>';

				document.getElementById('search_resultcust').innerHTML = html;
			}
		}
	}
	else
	{
		document.getElementById('search_resultcust').innerHTML = '';
	}
}
function get_textcust(event)
{
	var string = event.textContent;
	
	document.getElementsByName('container_viewcust')[0].value = string;
	
	document.getElementById('search_resultcust').innerHTML = '';

	

	

}
</script>
