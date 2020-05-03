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
<?

// 2.
// Оплата заданной суммы с выбором валюты на сайте ROBOKASSA
// Payment of the set sum with a choice of currency on site ROBOKASSA

// регистрационная информация (логин, пароль #1)
// registration info (login, password #1)
$mrh_login = "sektora.ru";
$mrh_pass1 = "GQzvyeR23fPPsJD99HT6";

// номер заказа
// number of order
$inv_id = "";

// описание заказа
// order description
$inv_desc = 'заказ';

// сумма заказа
// sum of order
$out_summ = $_POST['summ'];

// тип товара
// code of goods
$shp_item = $_SESSION['clientId'];

// предлагаемая валюта платежа
// default payment e-currency
$in_curr = "";

// язык
// language
$culture = "ru";

// формирование подписи
// generate signature
$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");

// форма оплаты товара
// payment form
print "<html>".
    "<form action='https://auth.robokassa.ru/Merchant/Index.aspx' method=POST>".
    "<input type=hidden name=MerchantLogin value=$mrh_login>".
    "<input type=hidden name=OutSum value=$out_summ>".
    "<input type=hidden name=InvId value=$inv_id>".
    "<input type=hidden name=Description value='$inv_desc'>".
    "<input type=hidden name=SignatureValue value=$crc>".
    "<input type=hidden name=Shp_item value='$shp_item'>".
    "<input type=hidden name=IncCurrLabel value=$in_curr>".
    "<input type=hidden name=Culture value=$culture>".
    "<input type=submit value='Pay'>".
    "</form></html>";
?>