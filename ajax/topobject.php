<?php
require '../connectdb.php';
require  '../core.php';
$objectId=$_POST['objectId'];
$sql= "update objects set date = now() where objectId = $objectId";
$conn->query($sql);
    
//$sql = "update clients set balance = balance -50 where clientId = (select clientId from objects where objectId = $objectId)";
//$result = $conn->query($sql);


//определяем clientId
$sql = "select clientId from objects where objectId = $objectId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$clientId = $row['clientId'];

$sql = "SELECT * FROM clients WHERE clientId = $clientId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$balance = $row['balance'];	


echo $clientId;
echo $balance;
//добавление списаний в базу
$price = 50;
$sql= "INSERT INTO payhistory VALUES (null,$clientId,now(),$price,'top',$balance)";
$result = $conn->query($sql);

$sql = "update clients set balance = balance -$price where clientId = $clientId";
$result = $conn->query($sql);

$conn->close();
echo "все прошло успешно";
?>