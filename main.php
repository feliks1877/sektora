<?php
require 'core.php';
require 'header.php';
//проверка,если не выбран город
if (!isset($_GET['cityId'])&&!isset($_SESSION['cityId'])){
   	header("Location: $domen");
}
?>
<link rel="stylesheet" href="css/mainstyle.css">
<?php
require 'connectdb.php';
$typeId = isset($_GET['typeId'])?$_GET['typeId']:'';
if ($typeId == ""){
    echo '<br><h4>Вы смотрите все объявления</h4>';
}
else if ($typeId == 7){
    echo '<br><h4>Лучшие салоны красоты</h4>';
}
else if ($typeId == 6){
    echo '<br><h5>Самые опытные мастера по уходу за своей внешностью</h5>';
}
else if ($typeId == 3){
    echo '<br><h4>Мастера массажа и релакса</h4>';
}
else if ($typeId == 2){
    echo '<br><h5>Лучшие Спа-центры и места для Вашего релакса</h5>';
}
else if ($typeId == 4){
    echo '<br><h4>Лучшие Barbershop и парикмахерские</h4>';
}
else if ($typeId == 1){
    echo '<br><h4>Лучшие сауны и баные комплексы</h4>';
}
//определяем cityId
$cityId="";
if(isset($_GET['cityId']))$cityId=$_GET['cityId'];
else if(isset($_SESSION['cityId']))$cityId=$_SESSION['cityId'];
else {
	die('Город не выбран');
}

if($cityId != "") {
      
      $sql = "SELECT * FROM city where cityId = $cityId ";
      $result=$conn->query($sql);
      $row = $result->fetch_assoc();
	  $city=$row['name'];
    echo "<h4>$city</h4>";
}
require 'banermain.php';
?>

<div class="main">
   
<ul id="spisok">
<?php

   require 'connectdb.php';

if(isset($_GET['cityId'])/*||isset( $_SESSION['cityId'])*/){
    $cityId = $_GET['cityId'];
    $_SESSION['cityId']=$cityId;
    $sql = "SELECT *
            FROM objects ,clients 
            where cityId = $cityId and active=1 and objects.clientId=clients.clientId and clients.balance>0
            order by date desc ";
}else{
    if(isset($_SESSION['cityId'])&&isset($_GET['typeId'])){
        $typeId = $_GET['typeId'];
        $cityId = $_SESSION['cityId'];
        $sql = "SELECT * 
                FROM objects,clients 
                where cityId = $cityId and active=1 and typeId = $typeId  and objects.clientId=clients.clientId and clients.balance>0
                order by date desc";
    }else{
		$cityId = $_SESSION['cityId'];
		$page = isset($_GET['page'])?$_GET['page']:1;
		$start = ($page -1)*$adsAmount;
		$end = $start + $adsAmount;
        $sql = "SELECT * 
                FROM objects ,clients
                where cityId = $cityId and active=1  and objects.clientId=clients.clientId and clients.balance>0
                order by date desc
				limit $start,$end";
    }
}

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
         
    $objectId=$row['objectId'];
    echo "<li id='element'>";
    echo "<div class='object'><a class='sulka' href='details.php?objectId=$objectId'>";

    $photo1 = explode(';', $row['photo'])[0];
	echo "<div class='izob' style='background: url(photo/$photo1); background-size: 25px;'>";
    echo "<img class='photoobject' src='photo/$photo1'>";
    echo "</div>";
    echo "<div class='disc' id='disk'>";
    echo "" . $row["name"];
    echo "</div>";
    echo "<div class='address'>";
    echo "" . $row["address"];
    echo "" . $row["objectId"];
    echo "</div>";
    echo "<div class='tel'>";
    echo "" . $row["telephone"];
    echo "</div>";
    echo "</a></div>";
    echo "</li>";

}
$conn->close();
?>
</ul>
</div>

    <?php require 'pagenatormain.php'; ?>
<footer>
    <h5>©2020 of Work</h5>
</footer>
<?php //require 'footer.php'; ?>
