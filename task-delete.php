<?php 

    include_once('database.php');

    if(isset( $_POST['id'])){

        $id = $_POST['id'];
        $query = "delete from task where id = $id";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die('Query Failed');
        }
        
        echo "Task deleted Successfuly";
    }