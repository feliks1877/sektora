<?php
require 'core.php';

function anticlick($objectId,$clientId){
    require 'connectdb.php';
	//защита от скликивания(через сессию)
	$objectsId = "";
	if(isset($_SESSION['objectsId'])){
		$objectsId=$_SESSION['objectsId'];
	}
	//проверяем есть ли Id объявления
	$objects=explode(';',$objectsId);
	$isFound=false;
	foreach($objects as $object){
		if($object==$objectId)$isFound=true;
	}


	//находим сумму списаний за сутки за клики


	$sql = "SELECT sum(amount) as total
            FROM payhistory
            WHERE clientId = clientId and date BETWEEN NOW() - INTERVAL 1 DAY AND NOW() and operation = 'click'";
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$total = (int)$row['total'];
	echo "total = $total";


	if($isFound==false && $total <= 50){
		$objectsId.=$objectId.";";
		//спсисание баланса за посещения


		$price = 5;
        $sql = "update clients set balance = balance -$price where clientId = $clientId";
        $result = $conn->query($sql);

		$sql = "SELECT * FROM clients WHERE clientId = $clientId";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$balance = $row['balance'];

		echo $clientId;
		echo $balance;
		//добавление списаний в базу
		$sql= "INSERT INTO payhistory VALUES (null,$clientId,now(),$price,'click',$balance)";
		$result = $conn->query($sql);


        $conn->close();
	}
	$_SESSION['objectsId']=$objectsId;
	echo "$objectsId";

}
?>
