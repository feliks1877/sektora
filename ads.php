<?php session_start();
require 'core.php';
if (!isset($_SESSION['clientId'])) {
header("Location: $domen/signin.php");
}
require'header.php';
function compressImage($source, $destination, $quality) {
    // Get image info
    $imgInfo = getimagesize($source);
    $mime = $imgInfo['mime'];

    // Create a new image from file
    switch($mime){
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        default:
            $image = imagecreatefromjpeg($source);
    }

    // Save image
    imagejpeg($image, $destination, $quality);

    // Return compressed image
    return $destination;
}

//   проверяем пришли ли данные с формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_POST["address"];
    $telephone = $_POST["telephone"];
    $typeId = $_POST["typeId"];
    $cityId = $_POST["cityId"];
    $name = $_POST["name"];
    $date = date("d.m.y h:m:s");
//    echo date("d.m.y h:m:s");
    $description = $_POST["description"];
    $web = $_POST["web"];
    $insta = $_POST["insta"];
    $total = count($_FILES['photo']['name']);

    //сохранение фото
    $photo = "";
    for ($i = 0; $i < $total; $i++) {
        $tmpFilePath = $_FILES['photo']['tmp_name'][$i];
        $imgInfo = getimagesize($tmpFilePath);
        $mime = $imgInfo['mime'];
        if ($tmpFilePath != "") {
//            $newFilePath = "./photoads/" . $_FILES['photo']['name'][$i];
            $uniqPhotoName = $_SESSION['clientId'] . "_" . substr(md5(time() + $i), 0,4);
            if($mime == 'image/jpeg'){
                $uniqPhotoName .= '.jpg';
            }
            if($mime == 'image/png'){
                $uniqPhotoName .= '.png';
            }
            $photo .= $uniqPhotoName . ";";
            $newFilePath = "./photoads/" . $uniqPhotoName;
            $compressedImage = compressImage($tmpFilePath, $newFilePath, 30);

            if($compressedImage){

            }else{
                echo "Всё сломалось";
            }
        }
    }

//    for ($i = 0; $i < $total; $i++) {
//        $photo .= basename($_FILES["photo"]["name"][$i]);
//        $photo .= ";";
//    }
    $clientId = $_SESSION['clientId'];
    require 'connectdb.php';
    $sql = "INSERT INTO objects VALUES (null," . $clientId . " , " . $typeId . " , '" . $address . "','" . $telephone .
        "'," . $cityId . ",'" . $name . "','" . $description . "','" . $web . "','" .$insta . "','" . $photo . "',0,'". $date ."',1,0)";
    if ($conn->query($sql) === TRUE) {
        echo "<h4>Объявлениe успешно добавлено<br>Спасибо что выбрали нас</h4>";
    } else {
//        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "ВЫ ЗАБЫЛИ АВТОРИЗОВАТЬСЯ";
    }
    $conn->close();
}
?>

<div class="container">
    <div class="ads">
        <form method="post" action="ads.php" enctype="multipart/form-data">
            <h1 style="font-size: large;">Добавить оъявление</h1>
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
                    <input type="text" class="address" id="web" name="web"placeholder="Укажите свой сайт или аккаунт в соцсетях">
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
                          pattern="+7\([0-9]{3})[0-9]{3}-[0-9]{2}-[0-9]{2}" maxlength="12" required>
                </div>
                <button class="adsbtn" type="submit" value='Добавить' style="width: 130px; margin-left: 32%"><p>Добавить</p></button>
            </div>
        </form>
    </div>
</div>
<?php require 'footerfixed.php';?>
</body>
</html>
