<?php session_start();
require "core.php";
//проверка, если не авторизованы переход
if (!isset($_SESSION['clientId'])){
   	header("Location: $domen/signin.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/lk.css">
    <title>История платежей</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/lk.js"></script>
</head>
<body>
<?php require('header.php'); ?>
<?php
require 'connectdb.php';

$clientId = $_SESSION['clientId'];
echo "<h4>История платежей</h4>";
$sql = "SELECT * FROM payhistory WHERE clientId = $clientId order by date desc";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$amount = $row['amount'];
$operation = $row['operation'];
$balance = $row['balance'];
$date = $row['date'];
$pay_id = $row['pay_id'];
while ($row = $result->fetch_assoc()) {

    echo "<div style=\"display: flex; flex-direction: column; background: white; padding: 5px; text-align: center; margin-bottom: 20px;border: 2px solid blue\">";
    echo "Сумма списания:  " . $row["amount"] . "руб.";
    echo "<br>Услуга:  " . $row["operation"];
	echo "<br>Текущий баланс:  " . $row["balance"] . "руб.";
    echo "<br>Дата списания:  " . $row["date"];
//    echo "<br>№ОПЕРАЦИИ:  " . $row["pay_id"];
  
    echo "</div>";
}

$conn->close()

?>