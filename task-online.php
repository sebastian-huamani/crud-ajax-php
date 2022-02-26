<?php 

    include_once('database.php');

    $id = $_POST['id'];
    $query = "select * from task where id = $id";
    $result = mysqli_query($conn , $query);

    if(!$result){
        die('Query Failed');
    }

    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'name' => $row['name'],
            'description' => $row['description'],
            'id' => $row['id']
        );
    }

    $jsonStr = json_encode($json[0]);
    echo $jsonStr;