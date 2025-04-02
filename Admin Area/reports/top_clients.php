<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
         
        if(isset($_GET['top_clients'])){
?>




<br><br>
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->

                <i class="fa fa-dashboard"></i> Reports / Top 10 Clients

            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->

                   <i class="fa fa-tags"></i>  Top 10 Clients

               </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
          
            <form action="" class="form-horizontal" method="get" enctype="multipart/form-data"><!-- form-horizontal begin -->    
        <div class="row" style="padding-right: 30px !important; padding-left: 30px !important;"><!-- row 2 begin -->
            <div class=""><!-- form-group Begin -->

                      

                      <div class="col-md-6"><!-- col-md-6 Begin -->
                      <div class="col-md-3"><!-- col-md-6 Begin -->
                      <input value="" name="top_clients" type="date" class="form-control" required>
                        </div>
                      <div class="col-md-3"><!-- col-md-6 Begin -->
                      <input value="" name="top_clients_to" type="date" class="form-control" required>
                     </div>
                     <div class="col-md-3"><!-- col-md-6 Begin -->
                     <input value="submit" name="submit" type="SUBMIT" class="btn btn-primary col-md-3" style="width:200px;">
                     </div>
                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                    
                    
            </div><!-- row 2 begin -->
        </div><!-- row 2 begin -->
                            </form>
            


       
<script>

function fnExcelReport() {
 var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
 tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

 tab_text = tab_text + '<x:Name>TOP_10_CLIENTS</x:Name>';

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
         navigator.msSaveBlob(blob, 'TOP_10_CLIENTS.xls');
     }
 } else {
     $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
     $('#test').attr('download', 'TOP_10_CLIENTS.xls');
 }

}
</script>
<?php 
        
        if(isset($_GET['submit']))
           {
          

           $dateFrom= $_GET['top_clients']; 
           $dateTo= $_GET['top_clients_to']; 

          
               
       
       ?>

        
      <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table id="myTable" class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> RANK </th>
                                <th> ACC </th>
                                <th> CODE </th>
                                <th> NAME </th>
                                <th> CONTACT </th>
                                <th> PHONE </th>
                                <th> WEIGHT-Total </th>
                                <th> TOTAL </th>
                                <th> AVERAGE/CBM </th>
                                <th>  </th>
                                <th> GOODS </th>
                                
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php
                           
                            $get_cust = "SELECT c.cust_id, c.cust_code, c.cust_name, c.cust_contact, c.cust_phone,sum(b.cbm) AS totalcbm,SUM(b.cbm * b.price)+extra AS total,
                            SUM(goods_price) AS goods
                            FROM book b, customer c
                            WHERE c.cust_id = b.cust_id AND b.status = 1 AND DATE(b.realdate) BETWEEN '$dateFrom' AND '$dateTo' 
                            GROUP BY c.cust_name ORDER BY SUM(b.cbm * b.price) DESC
                            LIMIT 10";
                            $run_cust = mysqli_query($conn,$get_cust);
                $totalcbm=0;
                $totalprice=0;
                $rank = 0;
                            while ($row_cust=mysqli_fetch_array($run_cust)){
                
                                $cust_id = $row_cust['cust_id'];
                                $cust_code = $row_cust['cust_code'];
                                $cust_name = $row_cust['cust_name'];
                                $cust_contact = $row_cust['cust_contact'];
                                $cust_phone = $row_cust['cust_phone'];
                                $cust_cbm = $row_cust['totalcbm'];
                                $total = $row_cust['total'];
                                $goods = $row_cust['goods'];
                                
                                $totalcbm = $totalcbm + $cust_cbm;
                                $totalprice = $totalprice + $total;
                                $rank++;  
                                   
                                    
                            ?>

                            <tr><!-- tr begin -->
                                <td> <?php echo $rank; ?> </td>
                                <td> <?php echo "ACC000".$cust_id; ?> </td>
                                <td> <?php echo $cust_code; ?> </td>
                                <td> <?php echo $cust_name; ?> </td>
                                <td> <?php echo $cust_contact; ?> </td>
                                <td> <?php echo $cust_phone ?> </td>
                                <td> <?php echo (INT)$cust_cbm; ?></td>
                                <td> <?php echo (INT)$total; ?> $</td>
                                <td> <?php echo (INT)($total / $cust_cbm);?> $<td>
                                
                                <td> <?php echo $goods;?> $<td>
                                
                                
                            </tr><!-- tr finish -->
                                <?php 

                            }
                            
                             ?>
                             <tr><!-- tr begin -->
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th> <?php echo (INT)$totalcbm;?> </th>
                                <th> <?php echo (INT)$totalprice;?> $ </th>
                                <th> <?php echo (INT)($totalprice / $totalcbm);?> $</th>
                                
                                
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



