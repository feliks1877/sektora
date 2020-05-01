<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>oplata</title>
</head>
<body>
<h1>Пополните баланс</h1>

<?php
echo $_SESSION['clientId'];
// 1.
// Оплата заданной суммы с выбором валюты на сайте мерчанта
// Payment of the set sum with a choice of currency on merchant site 

// регистрационная информация (логин, пароль #1)
// registration info (login, password #1)
$mrh_login = "sektoratest";
$mrh_pass1 = "p7vpVdo7";

// номер заказа
// number of order
$inv_id = $_SESSION['clientId'];;

// описание заказа
// order description
$inv_desc = "платеж";

// сумма заказа
// sum of order
$out_summ = "300";

// тип товара
// code of goods
$shp_item = 1;

// предлагаемая валюта платежа
// default payment e-currency
$in_curr = "";

// язык
// language
$culture = "ru";

// кодировка
// encoding
$encoding = "utf-8";

// формирование подписи
// generate signature
$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");

// HTML-страница с кассой
// ROBOKASSA HTML-page
print "<script language=JavaScript ".
      "src='https://auth.robokassa.ru/Merchant/PaymentForm/FormFLS.js?".
      "MerchantLogin=$mrh_login&OutSum=$out_summ&InvId=$inv_id&IncCurrLabel=$in_curr".
      "&Description=$inv_desc&SignatureValue=$crc&Shp_item=$shp_item".
      "&Culture=$culture&Encoding=$encoding&IsTest=1'></script>";
?>
</body>
</html>