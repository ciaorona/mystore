<?php
session_start();

include "db.php";
if(isset( $_SESSION['name'])){
    $query = "INSERT INTO cart (product_id, username) VALUES (?,?)";
    $connect= $connection->prepare($query);
    $connect->execute([$_POST['id'],$_SESSION['name']]);
        
    $count =$connection->prepare("SELECT * FROM cart WHERE username=?" );
    $count->execute([$_SESSION['name']]);
    $num = $count->rowCount();
    if($num>0){
        echo $num;   
    }
}
