<br><br>
<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

        if(isset($_GET['arrived_details'])){

            $container_id = $_GET['arrived_details'];
    
            $get_container = "select * from container where cont_id='$container_id'";
    
            $run_container = mysqli_query($conn,$get_container);
    
            $row_container = mysqli_fetch_array($run_container);
    
            $container_LB = $row_container['cont_no'];
            $container_F = $row_container['code'];
            $cont_cbm = $row_container['size'];

            $get_custcount = "select count(cust_id) AS custcount from book where cont_id='$container_id' and status=1";
    
            $run_custcount = mysqli_query($conn,$get_custcount);
    
            $row_custcount = mysqli_fetch_array($run_custcount);
    
            $custcount_LB = $row_custcount['custcount'];
        }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-6"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>

                <i class="fa fa-dashboard"></i> Dashboard / Container Details

            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
    
    <div class="col-lg-6"><!-- col-lg-6 begin -->
        <ol class="breadcrumb btnupdate"><!-- breadcrumb begin -->
            <li>

            
                
            </li>
        </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-6 finish -->
        
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                <i class="fa fa-tags fa-fw"></i><b> <?php echo $container_LB." / ".$container_F." (CustomersCount: ". $custcount_LB.")";?> </b>

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> NO </th>
                                <th> CustomerCode </th>
                                <th> CustomerAcc</th>
                                <th> CustomerName </th>
                                
                                <th> Contact </th>
                                <th> Phone </th>
                                
                                <th> CBM </th>
                                <th> PRICE </th>
                                <th> Extra </th>
                                <th> Total  </th>
                                <th> Notes  </th>
                                
                                <th> Print  </th>
                                
                                
                                
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php

                                
                                $no = 1;
                                $totalcbm=0;
                                $totalprice=0;
                                $get_bookdetails = "SELECT * FROM book WHERE cont_id = '$container_id' and status=1";

                                $run_bookdetails = mysqli_query($conn,$get_bookdetails);

                                while($row_bookdetails=mysqli_fetch_array($run_bookdetails)){

                                   $trans_id = $row_bookdetails['trans_id'];
                                   $cust_id = $row_bookdetails['cust_id'];
                                   $date = $row_bookdetails['transdate'];
                                   $cbm = $row_bookdetails['cbm'];
                                   $totalcbm = $totalcbm + $cbm;
                                   $price = $row_bookdetails['price'];
                                   $extra = $row_bookdetails['extra'];
                                   $totalprice= $totalprice + ($price * $cbm) + $extra;
                                   $note = $row_bookdetails['notes'];
                                   
                                    $get_customer = "select * from customer where cust_id = '$cust_id'";
                                    $run_customer = mysqli_query($conn,$get_customer);                            
                                    $row_customer = mysqli_fetch_array($run_customer); 
                                    $cust_id = $row_customer['cust_id'];                           
                                    $cust_name = $row_customer['cust_name'];
                                    $cust_contact = $row_customer['cust_contact'];
                                    $cust_code = $row_customer['cust_code'];
                                    $cust_phone = $row_customer['cust_phone'];
      

                            ?>

                            <tr><!-- tr begin -->
                            <td> <?php echo $no."/".$custcount_LB; $no++;?> </td>
                                <td> <?php echo $cust_code; ?> </td>
                                <td> <?php echo "ACC000".$cust_id; ?> </td>
                                <td> <?php echo $cust_name; ?> </td>
                                
                                <td> <?php echo $cust_contact; ?> </td>
                                <td> <?php echo $cust_phone; ?> </td>
                                
                                <td> <?php echo $cbm; ?> </td>
                                <td> <?php echo $price; ?> </td>
                                <td> <?php echo $extra; ?></td>
                                <td> <?php echo ($cbm * $price) + $extra." $"; ?>  </td>
                                <td> <?php echo $note; ?> </td>
                                
                                <td>
                                    <a href="index.php?view_invoice_customer=<?php echo $trans_id; ?> ">
                                        <i class="fa fa-print"></i> Print
                                    </a>
                                </td>
                                
                               
                                
                               
                               
                            </tr><!-- tr finish -->

                            <?php } ?>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                
                                <th><?php echo $totalcbm." / ".$cont_cbm;?></th>
                                <th></th>
                                <th></th>
                                <th><?php echo $totalprice." $";?></th>
                                <th></th>
                                <th></th>
                                <th></th>

                                
                            </tr>
                        </tbody><!-- tbody finish -->

                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->

        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<!-- 2nd part Book new space for new customer on this container -->

            
            <div class="col-lg-6"><!-- col-lg-6 begin -->
                                    <div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Client', 'CBM'],

                            
        <?php 
        $totalcbm =0;
        $get_bookdetails = "SELECT cust_id,cbm FROM book WHERE cont_id = '$container_id' and status=1";

        $run_bookdetails = mysqli_query($conn,$get_bookdetails);

        while($row_bookdetails=mysqli_fetch_array($run_bookdetails)){

           
           $cust_id = $row_bookdetails['cust_id'];
           
           $cbm = $row_bookdetails['cbm'];
           $totalcbm=$totalcbm + $cbm;
           
            $get_customer = "select * from customer where cust_id = '$cust_id'";
            $run_customer = mysqli_query($conn,$get_customer);                            
            $row_customer = mysqli_fetch_array($run_customer);                            
            $cust_name = $row_customer['cust_name'];
            
            $cust_code = $row_customer['cust_code'];
            
        ?>                          
 
  
  ['<?php echo $cust_name;?>', <?php echo $cbm;?>],
  <?php } ?>
  ['Karout',<?php echo $cont_cbm - $totalcbm;?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'CBM per Container', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
</div>
</div>
<a href="index.php?view_invoice= <?php echo $container_id; ?> " > <i class="fa fa-print"></i> Print Container Details</a>
            <h></h>
            <a href="index.php?receipt= <?php echo $container_id; ?> " style="padding-left:100px"> <i class="fa fa-print"></i> Receipt to Mustafa</a>
            <?php

          if(isset($_POST['submit'])){

              $cust_insert = $_POST['trans_cust'];
              $date_insert = $_POST['trans_date'];
              $cbm_insert = $_POST['trans_cbm'];
              $price_insert = $_POST['trans_price'];
              $price_extra = $_POST['extra'];
              $note_insert = $_POST['trans_notes'];
              
             

              $insert_book = "insert into book(cust_id,cont_id,realdate,transdate,cbm,price,extra,notes) values('$cust_insert','$container_id',NOW(),'$date_insert','$cbm_insert','$price_insert','$price_extra','$note_insert')";

              $run_insert = mysqli_query($conn,$insert_book);

              if($run_insert){

                  

                  echo "<script>window.open('index.php?avilable_details=$container_id','_self')</script>";

              }

          }

?>

<?php } ?>
