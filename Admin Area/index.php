<?php

    session_start();
    include("includes/dbh.inc.php");

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
      $admin_session = $_SESSION['admin_email'];

        $get_admin = "select * from admin where admin_email='$admin_session'";

        $run_admin = mysqli_query($conn,$get_admin);

        $row_admin = mysqli_fetch_array($run_admin);

        $admin_id = $row_admin['admin_id'];
        $admin_name = $row_admin['admin_name'];


        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cargo Trace</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    </head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->

       <?php include("includes/sidebar.php"); ?>

        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->

                <?php

                if(isset($_GET['dashboard'])){

                    include("dashboard.php");
                }

                if(isset($_GET['container_create'])){

                    include("container_create.php");
                }
        
                if(isset($_GET['container_view'])){

                    include("container_view.php");
                }
                if(isset($_GET['container_delete'])){

                    include("container_delete.php");
                }
                if(isset($_GET['container_edit'])){

                    include("container_edit.php");
                }

                

                if(isset($_GET['client_create'])){

                    include("client_create.php");
                }
        
                if(isset($_GET['client_view'])){

                    include("client_view.php");
                }
                if(isset($_GET['client_delete'])){

                    include("client_delete.php");
                }
                if(isset($_GET['client_edit'])){

                    include("client_edit.php");
                }



                if(isset($_GET['port'])){

                    include("port.php");
                }
                if(isset($_GET['portd'])){

                    include("portd.php");
                }
                if(isset($_GET['warehouse'])){

                    include("warehouse.php");
                }
                if(isset($_GET['shipper'])){

                    include("shipper.php");
                }
                if(isset($_GET['shipping_line'])){

                    include("shipping_line.php");
                }

                if(isset($_GET['avilable_container'])){

                    include("container_status/avilable_container.php");
                }
                if(isset($_GET['ontheway_container'])){

                    include("container_status/ontheway_container.php");
                }
                if(isset($_GET['arrived_container'])){

                    include("container_status/arrived_container.php");
                }

                if(isset($_GET['avilable_details'])){

                    include("container_status/avilable_details.php");
                }
                if(isset($_GET['ontheway_details'])){

                    include("container_status/ontheway_details.php");
                }

                if(isset($_GET['arrived_details'])){

                    include("container_status/arrived_details.php");
                }

                if(isset($_GET['book_edit'])){

                    include("container_status/book_edit.php");
                }

                if(isset($_GET['book_delete'])){

                    include("container_status/book_delete.php");
                }

                if(isset($_GET['view_invoice'])){

                    include("container_status/view_invoice.php");
                }
                if(isset($_GET['view_invoice_customer'])){

                    include("container_status/view_invoice_customer.php");
                }

                if(isset($_GET['receipt'])){

                    include("container_status/receipt.php");
                }

                 if(isset($_GET['printcost'])){

                    include("container_status/printcost.php");
                }

                if(isset($_GET['pie_chart'])){

                    include("pie_chart.php");
                }

                if(isset($_GET['view_all_containers'])){

                    include("view_all_containers.php");
                }

                /* Reports*/

                if(isset($_GET['sales_by_client'])){

                    include("reports/sales_by_client.php");
                }

                
                if(isset($_GET['sales_by_container'])){

                    include("reports/sales_by_container.php");
                }

                if(isset($_GET['container_add_cost'])){

                    include("container_add_cost.php");
                }
                if(isset($_GET['top_clients'])){

                    include("reports/top_clients.php");
                }
                
                if(isset($_GET['container_viewcust'])){

                    include("container_viewcust.php");
                }
                if(isset($_GET['view_payment'])){

                    include("view_payment.php");
                }
                if(isset($_GET['add_payment'])){

                    include("add_payment.php");
                }





                ?>

            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
</body>
</html>


<?php } ?>
