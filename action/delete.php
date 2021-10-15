<?php 
    // file include
    include_once '../app/function.php'; 
    include_once '../app/database.php';

    $id=$_GET['id'];

    $sql="DELETE FROM measurement WHERE id=$id";
    $connection->query($sql);

    header('location:../data-table.php');

