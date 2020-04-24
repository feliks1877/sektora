<?php session_start();
if (!isset($_SESSION['clientId'])) {
    header('Location: ../signin.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body style="display: flex; justify-content: center; flex-direction: column; background: #f2f2f8">

<h4>Пополнение баланса по clientId</h4>
<br>
<form method="post" action="../a/updatebalance.php">
    <label for="clientId">clientId</label>
    <input type="text" name="clientId" id="clientId" style="border: 3px solid blue; border-radius: 10px; margin-bottom: 20px"><br>

    <label for="balance">balance</label>
    <input type="number" id="balance" name="balance" style="border: 3px solid blue; border-radius: 10px;margin-bottom: 20px"><br>
    <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientId = $_SESSION['clientId'];
    require '../connectdb.php';
    require '../core.php';
   // require '../connectdb.php';

    $newbalance = $_POST['balance'];
    $clientId = $_POST['clientId'];
    
	$sql = "SELECT * FROM clients WHERE clientId = $clientId";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$balance = $row['balance'];
	
    $sql = "UPDATE clients SET balance = ($balance + $newbalance) WHERE clientId=$clientId";
    $result = $conn->query($sql);

    $sql = "SELECT * FROM clients WHERE clientId = $clientId";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$balance = $row['balance'];
	echo  $balance;

}
?>

</body>
</html>
