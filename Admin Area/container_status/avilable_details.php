<br><br>
<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

        if(isset($_GET['avilable_details'])){

            $container_id = $_GET['avilable_details'];
    
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
<script>

function fnExcelReport() {
 var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
 tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

 tab_text = tab_text + '<x:Name><?php echo $container_LB."_DETAILS"?></x:Name>';

 tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
 tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

 tab_text = tab_text + "<table border='1px'>";
 tab_text = tab_text + $('#myTable').html();
 tab_text = tab_text + '</table></body></html>';

 var data_type = 'data:application/vnd.ms-excel';
 
 var ua = window.navigator.userAgent;
 var msie = ua.indexOf("MSIE ");
 
 if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
     if (window.navigator.msSaveBlob) {
         var blob = new Blob([tab_text], {
             type: "application/csv;charset=utf-8;"
         });
         navigator.msSaveBlob(blob, '<?php echo $container_LB."_DETAILS";?>.xls');
     }
 } else {
     $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
     $('#test').attr('download', '<?php echo $container_LB."_DETAILS";?>.xls');
 }

}
</script>

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
            
            <form action="includes/changeToArrived.inc.php" class="form-horizontal" method="post"><!-- form-horizontal begin -->
             <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->



                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-12"><!-- col-md-6 begin -->

                        <input value=" <?php echo $container_id; ?> " name="container" type="hidden" class="form-control">
                            <input value="Change to Arrived" type="submit" class="form-control btn btn-primary">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
             
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
                    <table id="myTable" class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> NO </th>
                                
                                <th> Customer Code </th>
                                <th> Variable Code </th>
                                <th> CustomerAcc</th>
                                <th> CustomerName </th>
                          
                                <th> WEIGHT (KG) </th>
                                <th> Goods </th>
                                <th> PRICE </th>
                                <th> Extra </th>
                               
                                <th> Reason </th>
                                
                                <th> Total Service  </th>
                                <th> Total Invoice  </th>
                                <th> Notes  </th>
                                <th> Edit  </th>
                                <th> Delete  </th>
                                <th> Print  </th>
                                
                                
                                
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php

                                
                                $no = 1;
                                $totalcbm=0;
                                $totalprice=0;
                                $get_bookdetails = "SELECT * FROM book WHERE cont_id = '$container_id' and status= 1";

                                $run_bookdetails = mysqli_query($conn,$get_bookdetails);

                                while($row_bookdetails=mysqli_fetch_array($run_bookdetails)){

                                   $trans_id = $row_bookdetails['trans_id'];
                                   $cust_id = $row_bookdetails['cust_id'];
                                   $var_code = $row_bookdetails['var_code'];
                                   $date = $row_bookdetails['transdate'];
                                   $cbm = $row_bookdetails['cbm'];
                                   $goods_price = $row_bookdetails['goods_price'];
                                   $totalcbm = $totalcbm + $cbm;
                                   $price = $row_bookdetails['price'];
                                   $extra = $row_bookdetails['extra'];
                                   $reason = $row_bookdetails['reason'];
                                   $collected_by = $row_bookdetails['collected'];
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
                                <td> <?php echo $var_code; ?> </td>
                                <td> <?php echo "ACC000".$cust_id; ?> </td>
                                <td> <?php echo $cust_name; ?> </td>
                                
             
                                
                                
                                <td> <?php echo $cbm; ?> </td>
                                <td> <?php echo $goods_price; ?> </td>
                                <td> <?php echo $price; ?> </td>
                                <td> <?php echo $extra; ?></td>
                                <td> <?php echo $reason; ?></td>
                                
                                <td> <?php echo ($cbm * $price) + $extra." $"; ?>  </td>
                                <td> <?php echo (($cbm * $price) + $extra + $goods_price)." $"; ?>  </td>
                                <td> <?php echo $note; ?> </td>
                                <td>
                                    <a href="index.php?book_edit= <?php echo $trans_id; ?> ">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                </td>
                                <td>
                                
                                    <a href="index.php?book_delete= <?php echo $trans_id; ?>">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </td>
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
<div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    
                    
                     <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Client </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="trans_cust" class="form-control" required><!-- form-control Begin -->

                              

                              <?php

                              $get_customer = "select cust_id,cust_name,cust_code from customer where cust_act=1";
                              $run_customer = mysqli_query($conn,$get_customer);

                              while ($row_customer=mysqli_fetch_array($run_customer)){

                                  $customer_id = $row_customer['cust_id'];
                                  $customer_name = $row_customer['cust_name'];
                                  $customer_code = $row_customer['cust_code'];

                                  echo "

                                  <option value='$customer_id'> $customer_name ($customer_code) </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->
                           </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                          Variable Code

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="variable_code" type="text" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Goods Price

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="goods_price" type="text" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    
                   
                   
                        <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Kilos (KG)

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="trans_cbm" type="text" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->


                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Price / Kilo ($)

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="trans_price" type="text" class="form-control" required>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                     <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           + / -

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="extra" type="text" value ="0" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Reason

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="reason" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Payment Collected by </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="pay_collected" class="form-control" required><!-- form-control Begin -->

                              

                             

                                  <option value='MOHAMAD'> MOHAMAD </option>
                                  <option value='STEAVE'> STEAVE </option>


                          </select><!-- form-control Finish -->
                           </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                           Notes

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input name="trans_notes" type="text" class="form-control" required>

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
                            </div>
           
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
  ['Still Not Booked',<?php echo $cont_cbm - $totalcbm;?>]
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
            <h></h>
            <a href="#" id="test" onClick="javascript:fnExcelReport();" style="padding-left:100px"> <i class="fa fa-file-excel-o"></i> Export to Excel </a>
            <?php

          if(isset($_POST['submit'])){

              $cust_insert = $_POST['trans_cust'];
              $variable_code = $_POST['variable_code'];
              $date_insert = $_POST['trans_date'];
              $cbm_insert = $_POST['trans_cbm'];
              $goods_price = $_POST['goods_price'];
              $price_insert = $_POST['trans_price'];
              $price_extra = $_POST['extra'];
              $reason = $_POST['reason'];
              $collected_by = $_POST['pay_collected'];
              $note_insert = $_POST['trans_notes'];

              $note = $note_insert;
              $note_insert = $container_LB." / ".$container_F." / ".$note_insert;

              $finalPrice = ($cbm_insert * $price_insert) + $price_extra + $goods_price;
              
             

              $insert_book = "insert into book(cust_id,var_code,cont_id,realdate,transdate,cbm,goods_price,price,extra,reason,collected,notes) values('$cust_insert','$variable_code','$container_id',NOW(),'$date_insert','$cbm_insert','$goods_price','$price_insert','$price_extra','$reason','$collected_by','$note')";

              $run_insert = mysqli_query($conn,$insert_book);

              $getlasttrans = ("SELECT trans_id FROM book ORDER BY realdate DESC LIMIT 1");
              $runlasttrans = mysqli_query($conn,$getlasttrans);
              $rowlasttrans = mysqli_fetch_array($runlasttrans);
              $trans_inserted = $rowlasttrans['trans_id'];

              $insert_acc = "INSERT INTO customeraccount(pay_cust_id ,pay_debit,pay_credit,pay_date,pay_trans_id,pay_note)VALUE($cust_insert,0,$finalPrice,NOW(),$trans_inserted,'$note_insert')";
              $run_insert_acct = mysqli_query($conn,$insert_acc);
              if($run_insert){

                  

                  echo "<script>window.open('index.php?avilable_details=$container_id','_self')</script>";

              }

          }

?>

<?php } ?>
