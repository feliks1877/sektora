<?php
session_start();

require '../connectdb.php';
require '../core.php';
//$objectId=$_POST['objectId'];

//$sql= "update objects set date = now()  where objectId = $objectId";
//echo "все прошло успешно" . "<br>" . $date . "<br>" . $objectId;

$objectId = $_POST['objectId'];
$sql = "INSERT INTO baner VALUES (null,".$objectId.",now())";
$conn->query($sql);
echo "добавленно в банер";

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
$price = 200;
$sql= "INSERT INTO payhistory VALUES (null,$clientId,now(),$price,'baner',$balance)";
$result = $conn->query($sql);

$sql = "update clients set balance = balance -$price where clientId = $clientId";
$result = $conn->query($sql);


$conn->close();
?>