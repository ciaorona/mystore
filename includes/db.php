<?php 
$dbs = 'mysql:host=localhost;dbname=mystore';
$dbname = 'root';
$dbpassword = '';
try{
 $connection = new PDO($dbs , $dbname, $dbpassword);
}catch(PDOException $e){
    die($e -> getMessage());
}
?>