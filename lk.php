<?php session_start();
require 'core.php';
//проверка, если не авторизованы переход
if (!isset($_SESSION['clientId'])) {
    header("Location: $domen/signin.php");
}
require 'connectdb.php';
?>

<head>
    <link rel="stylesheet" href="css/lk.css">
    <title>Личный кабинет</title>
</head>

<?php require'header.php'; ?>
<div id="lkblock">
<h4>Увидевший прекрасное — соучастник его создания</h4>
<?php

if ($_SESSION['login'] == 1) {
    echo '<h5>Мы рады Тебя видеть) А это номер Tвоего личного кабинета, укажи его если будешь писать нам → ';
    echo $_SESSION['clientId'];
    echo '</h5>';
} else {
    echo 'Что-то пошло не так,попробй ещё <a href=\'signup.php\'>Зарегестрироваться</a> <br>';
    echo 'Или <a href=\'signin.php\'>Войти</a> <br>';
}
?>
    <a href="price.php">Условия размещения</a><br>
    <br>
<a href="payhistory.php">История платежей</a>
<?php
$clientId = $_SESSION['clientId'];
/*усли пришли из редактирования объекта ,сохраняется*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $address = $_POST["address"];
    $web = $_POST["web"];
    $telephone = $_POST["telephone"];
    $objectId = $_POST["objectId"];
    $photo = $_POST["photo"];
    $active = $_POST["active"];
    if ($active == false) {
        echo "<h6>Объявление снято с публикации</h6><br>";
    } else {
        echo '<h6>Объявление активно</h6><br>';
    }
    //сохранение фото
    $total = count($_FILES['newphoto']['name']);

    for ($i = 0; $i < $total; $i++) {
        $tmpFilePath = $_FILES['newphoto']['tmp_name'][$i];
        $photo .= basename($_FILES["newphoto"]["name"][$i]);
        $photo .= ";";
        if ($tmpFilePath != "") {
            $newFilePath = "./photoads/" . $_FILES['newphoto']['name'][$i];
            move_uploaded_file($tmpFilePath, $newFilePath);
        }
    }
    $sql = "UPDATE objects SET name='$name',description='$description',
            address='$address',web='$web',telephone='$telephone',photo='$photo',active=$active

            WHERE objectId=$objectId";

    $result = $conn->query($sql);
    echo "<h6>Объект отредактирован</h6>";
}
//получаем данные из таблицы clients
$sql = "select * from clients where clientId = $clientId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$balance = $row['balance'];
$email = $row['email'];

echo "<div class='balance'><h4>";
$balance = $row['balance'];
if ($balance < 10) {
    $myemail = 'sektora.ru@gmail.com';
    $tema = 'tema';
    $message = 'низкий баланс';
    $issend = mail($myemail, $tema, $message);
    if ($issend == true) {
        echo "<h5>Письмо отправлено</h5>";
    } else {
        $errorMessage = error_get_last()['message'];
        print_r(error_get_last());
        echo "Ошибка отправки: $myemail, $tema, $message";
    }
    echo '<h4>Слишком низкий баланс объявления не доступны к просмотру(</h4><br>';
}
echo "Баланс: " . $row['balance'] . "руб";
echo "</h4></div>";

echo "<div id='opads'>";
echo "<button>";
echo "<a href='pay_form.php'><span>Пополнить</span></a>";
echo "</button>";
echo "<button class='adsbtn'>";
echo "<a href='ads.php'><span>Добавить</span></a>";
echo "</button>";
echo "<button class='adsbtn'>";
echo "<a href='logout.php'><span>Выйти</span></a>";
echo "</button>";
echo "</div>";

$sql = "SELECT * FROM objects where clientId=$clientId order by objectId desc ";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $objectId = $row['objectId'];

    echo "<div class='object'><a href='editobject.php?objectId=$objectId'><p>Редактировать</p>";
    echo "";
    echo "<br>№ " . $row["objectId"];
    echo "<br>" . $row["name"];

    if ($row['active'] == TRUE) {
        $active = $row['active'];
        echo "<br>Активно";
    } else {
        $noactiv = $row['active'];
        echo "<br>Не активно";
    };
    echo "</a>";

    echo "<div class='objectbutton'>";
    $disabled = $balance > 0 ? "" : "disabled";
    echo "<button type='button' id='btn1' objectId='$objectId' class='topBtn'  $disabled ><span>Поднять</span></button>";

    echo "<button type='button' id='btn2' objectId='$objectId' class='tobaner' >";
    echo "<span>В баннер</span>";
    echo "</button>";
    echo "</div>";
    echo "</div>";


//echo  "<button>";
//echo  "<a href=''><span>в баннер</span></a>";
//echo  "</button>";

//echo  "<button type='button' objectId='$objectId' class='topBtn$objectId'  $disabled><span>Поднять</span></button>";
//echo  "</div>";
}
?>
</div>
<?php require 'footerfixed.php';?>