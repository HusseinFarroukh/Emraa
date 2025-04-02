<?php


include ("dbh.inc.php"); // connect to DB



$container = $_POST['container'];

$update_container= "update container set arrived = 2, real_arr=NOW() where cont_id='$container'";

$run_container= mysqli_query($conn,$update_container);

if($run_container){

    

    echo "<script>window.open('../index.php?arrived_container','_self')</script>";


}

