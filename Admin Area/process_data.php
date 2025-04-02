<?php

//process_data.php

session_start();
    include("includes/dbh.inc.php");
    

    if(isset($_POST["query"]))
    {	
    
        $data = array();
    
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["query"]);
    
        $query = "SELECT cont_no from container WHERE cont_no LIKE '%".$condition."%' ORDER BY cont_no LIMIT 10";
    
        $result = $conn->query($query);
    
        $replace_string = '<b>'.$condition.'</b>';
    
        foreach($result as $row)
        {
            $data[] = array(
                'cont_no'		=>	str_ireplace($condition, $replace_string, $row["cont_no"])
            );
        }
    
        echo json_encode($data);
    }

    if(isset($_POST["queryc"]))
    {	
    
        $data = array();
    
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["queryc"]);
    
        $query = "SELECT cust_name from customer WHERE cust_name LIKE '%".$condition."%' ORDER BY cust_name LIMIT 10";
    
        $result = $conn->query($query);
    
        $replace_string = '<b>'.$condition.'</b>';
    
        foreach($result as $row)
        {
            $data[] = array(
                'cust_name'		=>	str_ireplace($condition, $replace_string, $row["cust_name"])
            );
        }
    
        echo json_encode($data);
    }
    

    


?>