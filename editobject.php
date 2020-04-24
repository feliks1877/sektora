<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/edit.css">
    <title>Редактирование</title>
</head>
<body id="edit">
<?php require('header.php'); ?>

<?php
require 'connectdb.php';
$objectId = $_GET["objectId"];
$sql = "SELECT * FROM objects where objectId = $objectId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
//echo "<div class='object'>";
$name = $row["name"];
$description = $row["description"];
$address = $row["address"];
$web = $row["web"];
$telephone = $row["telephone"];
$photo = $row["photo"];
$active= $row["active"];
//$citiId = $row["cityId"];
//$typeId = $row["typeId"];
?>
<div id="editcontainer">
    <form method="post" action="lk.php" enctype="multipart/form-data">
        <h4>Редактировать оъявление</h4>

        <label for="name"><h5>Редактировать заголовок</h5></label>
        <textarea type="text" class="" id="name" name="name" placeholder="Здесь напишите назавание и краткое описание эта запись будет отображаться в общем списке 
		объявлений,а так же при добавлении в банер " value=""  cols="30"
                  rows="3" required><?php echo $name ?></textarea>

        <label for="area"><h5>Изменить описание</h5></label>

        <textarea class="" name="description" id="" cols="30" rows="10"
                  placeholder="Напишите здесь описание вашей услуги,цены режим рабрты " >
                        <?php echo $description ?>
                    </textarea>

        <label for="address"><h5>Изменить ваш адрес</h5></label>
        <input type="text" class="" id="address" name="address" value="<?php echo $address ?>" >

        <label for="web"><h5>Изменить Ваш сайт</h5></label>
        <input type="url" class="web" id="" name="web" value="<?php echo $address ?> " >

        <label for="telephone"><h5 class="tele">Добавить телефон</h5></label>

        <input type="text" name="telephone" id="" placeholder="Ваш номер телефона" value="<?php echo $telephone ?> "
               required>

        <label for="photo"><h5>Добавить фото</h5></label>
        <div class="photo">
            <input type="file" name="newphoto[]" id="photo" placeholder="Загрузите фото" multiple="multiple">
        </div>

<div class="chek">
        <input type="radio" value="1"  id="active" style="opacity: 0"
               name="active" <?php if ($active == 1) echo "checked" ?>>
    <label for="active" class="active"><span>Опубликовать </span><img src="photo/iconactiv.png"  alt=""></label>
    <label for="active" class="noactive"><span>Снять с публикации </span><img src="photo/iconnoactiv.png" alt=""></label>
        <input type="radio" value="0"  id="knopka"
               name="active" <?php if ($active == 0) echo "checked" ?>>
        <label for="noactive"  class="noactiv"></label>
</div>

        <input type="hidden" name="objectId" value="<?php echo $objectId ?>">
        <input type="hidden" name="photo" value="<?php echo $photo ?>">
        <button class="adsbtn" type="submit" value=Добавить><span>Редактировать</span></button>
    </form>
</div>

<script src="js/slide.js"></script>

</body>
</html>