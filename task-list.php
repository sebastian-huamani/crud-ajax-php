<?php 

    include_once('database.php');

    $query = "select * from task";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die('query Failed' . mysqli_error($conn)); 
    }

    $json = array();
    while( $row = mysqli_fetch_array($result)){
        $json[] = array(
            'name' => $row['name'],
            'description' => $row['description'],
            'id' => $row['id']
        );
    }
    $jsonStr = json_encode($json);
    echo $jsonStr;



?>