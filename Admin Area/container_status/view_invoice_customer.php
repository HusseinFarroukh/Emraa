<br><br>
<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

        if (isset($_GET['view_invoice_customer'])) {
            $trans_id = $_GET['view_invoice_customer'];

            $edit_cont_query = "select * from book where trans_id='$trans_id'";

            $run_edit = mysqli_query($conn,$edit_cont_query);
    
            $row_edit = mysqli_fetch_array($run_edit);
            
            $cust_id= $row_edit['cust_id'];
            $cont_id= $row_edit['cont_id'];
            $date= $row_edit['realdate'];
            $cbm= $row_edit['cbm'];
            $goods_price= $row_edit['goods_price'];
            $price= $row_edit['price'];
            $notes= $row_edit['notes'];
    
            $get_customer= "select * from customer where cust_id='$cust_id'";
            $run_customer = mysqli_query($conn,$get_customer);
            $row_customer = mysqli_fetch_array($run_customer);
            $cust_name = $row_customer['cust_name'];
            $cust_code = $row_customer['cust_code'];
    
            $get_container= "select * from container where cont_id='$cont_id'";
            $run_container = mysqli_query($conn,$get_container);
            $row_container = mysqli_fetch_array($run_container);
            $cont_no = $row_container['cont_no'];
            $code = $row_container['code']; 

            $edit_cont_cust = "select count(cust_id) AS custcount from book where cont_id='$cont_id' and status=1";

            $run_custcount = mysqli_query($conn,$edit_cont_cust);
    
            $row_custcount = mysqli_fetch_array($run_custcount);
            $custcount = $row_custcount['custcount'];

            $edit_pos_cust = "select cust_id from book where cont_id='$cont_id' and status=1";

            $run_custpos = mysqli_query($conn,$edit_pos_cust);
    
            
            $custposition=1;
            $i=0;
            while($row_custpos=mysqli_fetch_array($run_custpos)){
                if($row_custpos['cust_id'] == $cust_id)
                {
                        $i= $custposition;
                        break;
                }
                $custposition=$custposition + 1;
            }
    
            
    
            
            }
             ?>
             <head>
            
             </head>
             <link type="text/css" media="print" rel="stylesheet" href="../css/print.css">
             <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
             </head>
            <div class="container">
               <div class="col-md-12">
                  <div class="invoice">
                     <!-- begin invoice-company -->
                     <div class="invoice-company text-inverse f-w-600">
                        <span class="pull-right hidden-print">
                          <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a> 
                        </span>
                       
                        <div class="main-title">
                            
                                LAYAN
                            
                        </div>
                        <div class="invoice-header">
            <div class="invoice-from">
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">Customer: <?php echo $cust_name; ?></strong><br>
                  CN: <?php echo $cust_code;?><br>
                  ACC: <?php echo 'ACC00'.$cust_id;?><br>
                  Container NB: <?php echo $code;?><br>
                  TR-NO: <?php echo $cont_no;?><br>
               </address>
            </div>
           
            <div class="invoice-date">
              <p><?php echo date("l");echo ",  ";echo date("Y/m/d"); ?></p>
             

               
               <p><?php echo $i.'/'.$custcount;?></p>
               <p><?php echo "LAYAN"?></p>
               <p><?php echo "phone - email"?></p>
               <h3>Invoice NB:0000<?php echo $trans_id;?></h3><br>
                 
               
            </div>
         </div>
         <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->

                       
                            <!-- tr finish<tr>
                                <th style="text-align:right; height:40px;"></th>
                            </tr> -->
                            

                            
                       


                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->

                       
                            <tr><!-- tr begin -->
                                <th style="text-align:center; height:40px;" class="invtotal">Payemnt Type<div class="invtotal" style="text-align:center;padding-top:30px;">Service</div></th>
                                <th style="text-align:center; height:40px;" class="invtotal">Weight<div class="invtotal" style="text-align:center;padding-top:30px;"><?php echo $cbm;?></div></th>
                                <th style="text-align:center; height:40px;" class="invtotal">Cost/KG<div class="invtotal" style="text-align:center;padding-top:30px;"><?php echo $price.' $';?></div></th>
                                <th style="text-align:center; height:40px;" class="invtotal">Total<div class="invtotal" style="text-align:center;padding-top:30px;"><?php echo $price * $cbm.' $';?></div></th>
                            </tr><!-- tr finish -->

                            <tr><!-- tr begin -->
                                <th style="text-align:center; height:40px;" class="invtotal"><div class="invtotal" style="text-align:center;padding-top:30px;">Goods Price</div></th>
                                <th style="text-align:center; height:40px;" class="invtotal"><div class="invtotal" style="text-align:center;padding-top:30px;"></div></th>
                                <th style="text-align:center; height:40px;" class="invtotal"><div class="invtotal" style="text-align:center;padding-top:30px;"></div></th>
                                <th style="text-align:center; height:40px;" class="invtotal"><div class="invtotal" style="text-align:center;padding-top:30px;"><?php echo $goods_price.' $';?></div></th>
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                <th style="text-align:center; height:40px;" class="invtotal"><div class="invtotal" style="text-align:center;padding-top:30px;">TOTAL</div></th>
                                <th style="text-align:center; height:40px;" class="invtotal"><div class="invtotal" style="text-align:center;padding-top:30px;">TOTAL</div></th>
                                <th style="text-align:center; height:40px;" class="invtotal"><div class="invtotal" style="text-align:center;padding-top:30px;">TOTAL</div></th>
                                <th style="text-align:center; height:40px;" class="invtotal"><div class="invtotal" style="text-align:center;padding-top:30px;"><?php echo ($price * $cbm) + $goods_price.' $';?></div></th>
                            </tr><!-- tr finish -->
                            
                       


                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->

                       
                            <tr><!-- tr begin -->
                                <th style="text-align:right; height:40px;"></th>
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                <th style="text-align:right; height:40px;"></th>
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                <th style="text-align:right; height:40px;"></th>
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                <th style="text-align:right; height:40px;"></th>
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                <th style="text-align:right; height:40px;"></th>
                            </tr><!-- tr finish -->
                            <tr><!-- tr begin -->
                                <th style="text-align:right; height:40px;"></th>
                            </tr><!-- tr finish -->
                       


                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
               
               
                    
            <?php } ?>
            