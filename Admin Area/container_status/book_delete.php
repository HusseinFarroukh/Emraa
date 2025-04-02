<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['book_delete'])){

        $book_delete = $_GET['book_delete'];

        $delete_book = "update book set status= 0 where trans_id='$book_delete'";

        $run_delete = mysqli_query($conn,$delete_book);

        $get_cont = "select cont_id from book where trans_id = '$book_delete' LIMIT 1";
        $run_cont = mysqli_query($conn,$get_cont);                            
        $row_cont = mysqli_fetch_array($run_cont);                            
        $cont_id = $row_cont['cont_id'];

        if($run_delete){

            

            echo "<script>window.open('index.php?avilable_details=$cont_id','_self')</script>";

        }

    }

?>




<?php } ?>
