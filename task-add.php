<?php 

    include_once('database.php');
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $query = "insert into task(name, description) values ('$name','$description')";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die('query failed');
        } else {
            echo 'Task added successfuly';
        }
    }
?>