<?php session_start();
require 'core.php';
if (!isset($_SESSION['clientId'])) {
header("Location: $domen/signin.php");
}
require'header.php';
?>

<link rel="stylesheet" href="css/adsstyle.css">
<?php

//   проверяем пришли ли данные с формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_POST["address"];
    $telephone = $_POST["telephone"];
    $typeId = $_POST["typeId"];
    $cityId = $_POST["cityId"];
    $name = $_POST["name"];
    $date = date("d.m.y h:m:s");
    echo date("d.m.y h:m:s");
    $description = $_POST["description"];
    $web = $_POST["web"];
    $insta = $_POST["insta"];
    $total = count($_FILES['photo']['name']);
    $photo = "";
    for ($i = 0; $i < $total; $i++) {
        $photo .= basename($_FILES["photo"]["name"][$i]);
        $photo .= ";";
    }
//    $photo = basename($_FILES["photo"]["name"]) . ";" .
//        basename($_FILES["photo"]["name"]) . ";" .
//        basename($_FILES["photo"]["name"]) . ";" .
//        basename($_FILES["photo"]["name"]) . ";";
    $clientId = $_SESSION['clientId'];
    require 'connectdb.php';
//    echo $clientId . "<br>" . $typeId . "<br>" . $address . "<br>" . $telephone . "<br>" . $cityId . "<br>" . $description . "<br>" . $photo . "<br>" .$date ."<br>";
    $sql = "INSERT INTO objects VALUES (null," . $clientId . " , " . $typeId . " , '" . $address . "','" . $telephone .
        "'," . $cityId . ",'" . $name . "','" . $description . "','" . $web . "','" .$insta . "','" . $photo . "',0,'". $date ."',1,0)";
//  echo "<pre>".$sql."</pre>";
    if ($conn->query($sql) === TRUE) {
        echo "<h4>Объявлениe успешно добавлено<br>Спасибо что выбрали нас</h4>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    //сохранение фото
    $total = count($_FILES['photo']['name']);

    for ($i = 0; $i < $total; $i++) {
        $tmpFilePath = $_FILES['photo']['tmp_name'][$i];
        if ($tmpFilePath != "") {
            $newFilePath = "./photo/" . $_FILES['photo']['name'][$i];
            move_uploaded_file($tmpFilePath, $newFilePath);
        }
    }
//    $target_dir = "photo/";
//    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
//    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
//        echo "фаил " . basename($_FILES["photo"]["name"]) . " сохранен.";
//    } else {
//        echo "Ошибка сохранения";
//    }
//    move_uploaded_file($_FILES["photo1"]["tmp_name"], $target_dir . basename($_FILES["photo1"]["name"]));


}
?>

<div class="container">
    <div class="ads">
        <form method="post" action="ads.php" enctype="multipart/form-data">
            <h1>Добавить оъявление</h1>
            <div class="">
                <label for="cytiId"><h5>Выберите город</h5></label>
                <select class="section" name="cityId" id="cityId" required>
                    <option value="">Выбрать</option>
                    <option value="466">Москва</option>
                    <option value="467">Санкт-Петербург</option>
                    <option value="468">Нижний Новгород</option>
                    <option value="469">Иркутск</option>
                    <option value="470">Красноярск</option>
                    <option value="491">Екатеринбург</option>
                    <option value="492">Ростов-на-Дону</option>
                    <option value="493">Новосибирск</option>
                </select>
                <label for="typeId"><h5 class="">Выбрать раздел</h5></label>

                <select class="section" name="typeId" id="typeId" required>
                    <option>Выбрать</option>
                    <option value="1">Сауны</option>
					<option value="6">Мастера</option>
                    <option value="3">Массаж</option>
                    <option value="4">Барбершоп</option>
                    <option value="2">Спа</option>
                    <option value="7">Салон красоты</option>
                </select>
                <div class="">
                    <label for="name"><h5>Название и краткое описание</h5></label>
                    <textarea class="area" name="name" id="name" cols="40" rows="7"
                              placeholder="Добавьте здесь название Вашей организации и заголовок,эта запись будет отображаться в общем списке объявлений, максимальное колличество
                            символов не должно превышать 130"  title="Добавьте здесь название Вашей организации и заголовок,это будет отображаться в общем списке объявлений. Максимальное колличество символов не должно превышать 130" maxlength="130" required></textarea>
                </div>
                <label for="area"><h5>Добавить полное описание</h5></label>
                <div class="text">
                    <textarea class="area" name="description" id="area" cols="40" rows="15"
                              placeholder="Добавьте здесь название Вашей организации и заголовок(полное описание),эта запись будет отображаться на внутренией странице Вашего объявления максимальное колличество
                            символов не должно превышать 1500"  title="Добавьте здесь название Вашей организации и заголовок, максимальное колличество
                            символов не должно превышать 1500" maxlength="1500" required></textarea>
                </div>
                <div class="">
                    <label for="address"><h5>Напишите ваш адрес</h5></label>
                    <input type="text" class="address" id="address" name="address" required>
                </div>
                <div class="">
                    <label for="web"><h5>Укажите Ваш сайт</h5></label>
                    <input type="text" class="address" id="web" name="web"placeholder="Укажите свой сайт или аккаунт в соцсетях" required>
                </div>
                <div class="">
                    <label for="insta"><h5>Укажите Ваш Instagram</h5></label>
                    <input type="text" class="address" id="insta" name="insta"placeholder="Ваш Instagram">
                </div>
                <label for="photo"><h5>Добавить фото</h5></label>
                <div class="photo">
                    <input type="file" name="photo[]" id="photo" placeholder="Загрузите фото" multiple="multiple"
                           style="margin-left: 18%;width: 63%;height: 50px;">

                </div>
                <label for="telephone"><h5 class="tele">Добавить телефон</h5></label>
                <div class="tel">
                    <input type="text" name="telephone" id="telephone" placeholder="Ваш номер телефона"
                          pattern="+7\([0-9]{3})[0-9]{3}-[0-9]{2}-[0-9]{2}" maxlength="11" required>
                </div>
                <button class="adsbtn" type="submit" value='Добавить' style="width: 130px; margin-left: 32%"><p>Добавить</p></button>
            </div>
        </form>
    </div>
</div>
<?php require 'footerfixed.php';?>
</body>
</html>
