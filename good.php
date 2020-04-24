<?php

// регистрационная информация (пароль #2)
// registration info (password #2)
$mrh_pass2 = "CpIKCSw2";

//установка текущего времени
//current date
$tm=getdate(time()+9*3600);
$date="$tm[year]-$tm[mon]-$tm[mday] $tm[hours]:$tm[minutes]:$tm[seconds]";

// чтение параметров
// read parameters
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$shp_item = $_REQUEST["Shp_item"];
$crc = $_REQUEST["SignatureValue"];


$crc = strtoupper($crc);

$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:Shp_item=$shp_item"));

// проверка корректности подписи
// check signature
if ($my_crc !=$crc)
{
  echo "bad sign\n";
  exit();
}

// признак успешно проведенной операции
// success
echo "OK$inv_id\n";

$servername = "localhost";
$username = "u0893076_u098716";
$password = "zkIUpBDL9E4ZXJYAkv";
$dbname = "u0893076_spav";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
$clientId = $inv_id;
$sql="update clients set balance=balance+$out_summ where clientId=$clientId";
$conn->query($sql); 
$conn->close();
?>


