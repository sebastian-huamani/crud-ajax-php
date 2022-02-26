<?php 

    include('database.php');

    $search = $_POST['search'];
    if(!empty($search)){
        $query = "select * from task where name like '$search%' ";
        $result = mysqli_query($conn,$query);
        if(!$result){
            die('query error' .mysqli_error($conn));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'name' => $row['name'],
                'description'  => $row['description'],
                'id' => $row['id'] 
            );
        }    

        $jsonStr = json_encode($json);
        echo $jsonStr;
    }


?>