<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
        
        if(isset($_GET['sales_by_container'])){

?>

<br><br>
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->

                <i class="fa fa-dashboard"></i> Reports / Sales By Container 

            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->

                   <i class="fa fa-tags"></i>  Sales By Container

               </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
          
        <form action="" class="form-horizontal" method="get" enctype="multipart/form-data"><!-- form-horizontal begin -->    
        <div class="row" style="padding-right: 30px !important; padding-left: 30px !important;"><!-- row 2 begin -->
            <div class=""><!-- form-group Begin -->

                      

                      <div class="col-md-6"><!-- col-md-6 Begin -->
                      <div class="col-md-3"><!-- col-md-6 Begin -->
                      <input value="" name="sales_by_container" type="text" class="form-control" placeholder="from TR" required>
                        </div>
                      <div class="col-md-3"><!-- col-md-6 Begin -->
                      <input value="" name="sales_by_container2" type="text" class="form-control" placeholder="to TR" required>
                     </div>
                     <div class="col-md-3"><!-- col-md-6 Begin -->
                     <input value="submit" name="submit" type="SUBMIT" class="btn btn-primary col-md-3" style="width:200px;">
                     </div>
                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                    
                    
            </div><!-- row 2 begin -->
        </div><!-- row 2 begin -->
                            </form>
            
<?php
                            if(isset($_GET['submit']))
            {
           

            $containerfrom= $_GET['sales_by_container']; 
            $containerto= $_GET['sales_by_container2']; 
            
            ?>
            <script>

function fnExcelReport() {
 var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
 tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

 tab_text = tab_text + '<x:Name>Sales_by_container</x:Name>';

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
         navigator.msSaveBlob(blob, 'Sales_by_container.xls');
     }
 } else {
     $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
     $('#test').attr('download', 'Sales_by_container.xls');
 }

}
</script>

      <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table id="myTable" class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> TR </th>
                                <th> CODE </th>
                                <th> Arrival</th>
                                <th> SIZE </th>
                                <th> BOOKED CBM</th>
                                <th> KAROUT CBM</th> 
                                <th> NO_CLIENTS </th>
                                <th> COST </th>
                                <th> COST/CBM </th>
                                <th> RETAIL </th>
                                <th> P/L </th>
                                
                                    
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php
                            

                            $allcost =0;
                            $allcust =0;
                            $allsumpay =0;
                                //$get_containerfrom= "select cont_id from container where cont_no like '%$containerfrom%'";
                                //$run_get = mysqli_query($conn,$get_containerfrom);
                                //$row_trans=mysqli_fetch_array($run_get);
                                //$containerfrom = $row_trans['cont_id'];
                                   
                                //$get_containerto= "select cont_id from container where cont_no like '%$containerto%'";
                                //$run_get = mysqli_query($conn,$get_containerto);
                                //$row_transto=mysqli_fetch_array($run_get);
                                //$containerto = $row_transto['cont_id'];

                                $get_contframe = "SELECT cont_id,cont_no,arr_date, code, size, arrived 
                                FROM container 
                                WHERE CAST(RIGHT(cont_no, CHAR_LENGTH(cont_no)-3) AS INT) >= '$containerfrom' AND CAST(RIGHT(cont_no, CHAR_LENGTH(cont_no)-3) AS INT) <= '$containerto' AND status = 1
                                ORDER BY CAST(RIGHT(cont_no, CHAR_LENGTH(cont_no)-3) AS INT);";
                                $run_contframe = mysqli_query($conn,$get_contframe ); 

                                while($row_contframe=mysqli_fetch_array($run_contframe)){
                                    $cont_id = $row_contframe['cont_id'];
                                    $cont_lb=$row_contframe['cont_no'];
                                    $arr_date=$row_contframe['arr_date'];
                                    $code=$row_contframe['code'];
                                    $size=$row_contframe['size'];
                                    $arrived=$row_contframe['arrived'];
                                    $sum_cust_cbm = 0;
                                    $get_sum_cbm = "SELECT SUM(cbm) AS customercbm FROM book where status = 1 and cont_id = '$cont_id'";
        
                                    $run_sum_cbm = mysqli_query($conn,$get_sum_cbm);
                                
                                    $row_sum_cbm = mysqli_fetch_array($run_sum_cbm);
                                
                                    $sum_cust_cbm = $row_sum_cbm['customercbm'];
                            
                                    $sum_karout_cbm = $size - $sum_cust_cbm;

                                    $get_sumcost = "SELECT (lebanese_customs+turkish_customs+transportation+utilities+others1+others2) AS sumcost FROM cost WHERE cont_id ='$cont_id'";

                                    $run_get_sumcost = mysqli_query($conn,$get_sumcost);
                                
                                    $row_get_sumcost = mysqli_fetch_array($run_get_sumcost);
                                
                                    $sumcost = $row_get_sumcost['sumcost'];
                                    $allcost=$allcost+$sumcost;

                                    $get_sumpay = "SELECT SUM(price * cbm) + extra AS totalpay FROM book WHERE cont_id = '$cont_id' AND status = 1";

                                    $run_get_sumpay = mysqli_query($conn,$get_sumpay);
                                
                                    $row_get_sumpay = mysqli_fetch_array($run_get_sumpay);
                                
                                    $sumpay = $row_get_sumpay['totalpay'];
                                    $allsumpay = $allsumpay + $sumpay;
                            
                                  
                            
                                   $get_sumcust = "SELECT COUNT(cust_id) as sumcust FROM book WHERE cont_id = '$cont_id' AND status = 1";
                            
                                   $run_get_sumcust = mysqli_query($conn,$get_sumcust);
                               
                                   $row_get_sumcust = mysqli_fetch_array($run_get_sumcust);
                               
                                   $sumcust = $row_get_sumcust['sumcust'];
                                   $allcust = $allcust+$sumcust;
                            ?>

                            <tr><!-- tr begin -->
                                <td> <?php echo $cont_lb; ?> </td>
                                <td> <?php echo $code; ?> </td>
                                <td> <?php echo $arr_date; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $sum_cust_cbm; ?> </td>
                                <td> <?php echo $sum_karout_cbm; ?> </td>
                                <td> <?php echo $sumcust;?> </td>
                                <td> <?php echo (int)$sumcost;?> $ </td>
                            
                                <td> <?php echo (int)($sumcost / $size);?> $</td>
                                 
                                <td> <?php echo (int)$sumpay?> $ </td>
                                <?php
                                if($sumpay - ($sum_cust_cbm * ($sumcost / $size)) >=0){
                                    $color = "#00FF00";
                            
                                   }else{
                                    $color = "#ff0000";
                                   }
?>
                                <td style="color: <?php echo $color;?>;"> <b><?php echo (int)($sumpay - ($sum_cust_cbm * ($sumcost / $size)));?></b></td>
                               
                                
                            </tr><!-- tr finish -->
                            <?php }?>
                             <tr><!-- tr begin -->
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th><?php echo (int)$allcust;?></th>
                                <th><?php echo (int)$allcost;?> $</th>
                                <td>  </td>
                                <th><?php echo (int)$allsumpay;?> $</th>
                                <td></td>
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
