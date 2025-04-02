<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['client_delete'])){

        $delete_customer = $_GET['client_delete'];

        $delete_cust = "update customer set cust_act= 0 where cust_id='$delete_customer'";

        $run_delete = mysqli_query($conn,$delete_cust);

        if($run_delete){

            echo "<script>alert('customer Deleted')</script>";

            echo "<script>window.open('index.php?client_view','_self')</script>";

        }

    }

?>




<?php } ?>
