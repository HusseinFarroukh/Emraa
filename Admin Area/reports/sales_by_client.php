<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
         
        if(isset($_GET['sales_by_client'])){
?>




<br><br>
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->

                <i class="fa fa-dashboard"></i> Reports / Sales By Client 

            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->

                   <i class="fa fa-tags"></i>  Sales By Client

               </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
          
        <form action="" class="form-horizontal" method="get" enctype="multipart/form-data"><!-- form-horizontal begin -->    
        <div class="row" style="padding-right: 30px !important; padding-left: 30px !important;"><!-- row 2 begin -->
            <div class=""><!-- form-group Begin -->

                      

                      <div class="col-md-3"><!-- col-md-6 Begin -->

                          <select name="sales_by_client" class="form-control" style="width:200px !important; margin-right:100px;"><!-- form-control Begin -->

                              <option> Select a Client </option>

                              <?php
        
                              $get_cust = "select cust_id,cust_name,cust_code from customer ORDER BY cust_name ASC";
                              $run_cust = mysqli_query($conn,$get_cust);

                              while ($row_cust=mysqli_fetch_array($run_cust)){

                                  $cust_id = $row_cust['cust_id'];
                                  $cust_code = $row_cust['cust_code'];
                                  $cust_name = $row_cust['cust_name'];

                                  echo "

                                  <option value='$cust_id'> $cust_name  ($cust_code , ACC000$cust_id) </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                    <input value="submit" name="submit" type="SUBMIT" class="btn btn-primary col-md-3" style="width:200px !important; margin-right:100px;">
                    
                    
            </div><!-- row 2 begin -->
        </div><!-- row 2 begin -->
                            </form>
            


        <?php 
        
         if(isset($_GET['submit']))
            {
           

            $client= $_GET['sales_by_client'];  

            $get_custo = "select cust_id,cust_name,cust_code,cust_phone from customer where cust_id='$client'";
            $run_custo = mysqli_query($conn,$get_custo);

            $row_custo=mysqli_fetch_array($run_custo);

                $custo_id = $row_custo['cust_id'];
                $custo_code = $row_custo['cust_code'];
                $custo_name = $row_custo['cust_name'];
                $custo_phone = $row_custo['cust_phone'];
        
        ?>

<script>

function fnExcelReport() {
 var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
 tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

 tab_text = tab_text + '<x:Name><?php echo $custo_name."SalesReport";?></x:Name>';

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
         navigator.msSaveBlob(blob, '<?php echo $custo_name."SalesReport";?>.xls');
     }
 } else {
     $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
     $('#test').attr('download', '<?php echo $custo_name."SalesReport";?>.xls');
 }

}
</script>
        
      <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table id="myTable" class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> ACC</th>
                                <th> CODE </th>
                                <th> NAME </th>
                                <th> CONTACT </th>
                                <th> CONTAINER LB</th> 
                                <th> INVOICE# </th>
                                <th> DATE </th>
                                <th> GOODS </th>
                                <th> WEIGHT </th>
                                <th> PRICE </th>
                                <th> EXTRA </th>
                                <th> TOTAL SERVICE </th>
                                <th> TOTAL INVOICE </th>
                                    
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php
                            
                            $totalOfTotal = 0;
                            $total_all_invoices=0;
                                $get_trans= "select * from book where cust_id='$client' and status=1";
                                $run_trans = mysqli_query($conn,$get_trans);
                                while($row_trans=mysqli_fetch_array($run_trans)){
                                
                                    $container_id = $row_trans['cont_id'];
                                    $invoiceno = $row_trans['trans_id'];
                                    $cbm = $row_trans['cbm'];
                                    $price = $row_trans['price'];
                                    $extra = $row_trans['extra'];
                                    $goods_price=$row_trans['goods_price'];
                                    $total = $cbm * $price + $extra;

                                    $totalOfTotal = $totalOfTotal + $total;
                                    $total_invoice=$total + $goods_price;
                                    $total_all_invoices = $total_all_invoices + $total_invoice;



                                $get_cont_details = "SELECT * FROM container where cont_id = $container_id";

                                $run_cont_details = mysqli_query($conn,$get_cont_details);

                                    $row_cont_details=mysqli_fetch_array($run_cont_details);
                                    $container_LB = $row_cont_details['cont_no'];
                                    $container_date = $row_cont_details['arr_date'];

                                    
                                   
                                    
                            ?>

                            <tr><!-- tr begin -->
                                <td> <?php echo "ACC000".$custo_id; ?> </td>
                                <td> <?php echo $custo_code; ?> </td>
                                <td> <?php echo $custo_name ?> </td>
                                <td> <?php echo $custo_phone ?> </td>
                                <td> <?php echo $container_LB ?> </td>
                                <td> <?php echo $invoiceno ?> </td>
                                <td> <?php echo $container_date; ?> </td>
                                <td> <?php echo $goods_price; ?> </td>
                                <td> <?php echo $cbm; ?> </td>
                                <td> <?php echo $price; ?> </td>
                                <td> <?php echo $extra; ?> </td>
                                <td> <?php echo $total." $"; ?> </td>
                                <td> <?php echo $total_invoice." $";?> </td>
                                
                            </tr><!-- tr finish -->
                                <?php 

                                }
                            
                             ?>
                             <tr><!-- tr begin -->
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b> <?php echo $totalOfTotal." $"; ?> </b></td>
                                <td><b> <?php echo $total_all_invoices." $"; ?> </b></td>
                                
                            </tr><!-- tr finish -->   


                           
                            
                        </tbody><!-- tbody finish -->

                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->

        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<a href="#" id="test" onClick="javascript:fnExcelReport();"><button class="btn btn-primary" style="background-color:#008000; border-color:#008000;"><i class="fa fa-file-excel-o"></i></button></a>
<?php }}} ?>



