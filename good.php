<?php

// регистрационная информация (пароль #2)
// registration info (password #2)
$mrh_pass2 = "e5N1VsS1gj8I9tkgTqyF";

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

require 'core.php';
require 'connectdb.php';

$clientId = $_REQUEST['Shp_item'];
$sql="update clients set balance=balance+$out_summ where clientId=$clientId";
$conn->query($sql); 
$conn->close();
?>


