<?php 

    include_once('database.php');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description =  $_POST['description'];

    $query = "update task set name = '$name', description = '$description' where id = '$id' ";
    $result = mysqli_query($conn , $query);

    if(!$result){
        die('Query Failed');
    }
    echo "Update Task Successfuly";
