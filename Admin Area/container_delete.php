<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['container_delete'])){

        $delete_cont_id = $_GET['container_delete'];

        $delete_cont = "update container set status= 0 where cont_id='$delete_cont_id'";

        $run_delete = mysqli_query($conn,$delete_cont);

        if($run_delete){

            echo "<script>alert('Container Deleted')</script>";

            echo "<script>window.open('index.php?container_view','_self')</script>";

        }

    }

?>




<?php } ?>
