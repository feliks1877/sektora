<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Da+2|Comfortaa&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/indexstyle.css">
    <title>Выбрать город</title>
</head>
<body>
<h1 id="sektor">Sektora</h1>
<a href="../lk.php"><img src="photo/iconprof.png" class="iconlk" alt="icon"></a>
<h3 style="margin-left: 15px;margin-right: 15px">Здесь Вы сможете найти лучшие Салоны красоты, Спа, Мастеров по уходу за своей внешностью, Мастеров массажа и Барбершопы</3>
 <h4>Выберите Ваш город</h4>
        <form action="main.php" id="" method="get">
            <label for="exampleInputname"><h4>Город</h4></label>
            <select class="city" type="name" name="cityId" required>
                <option value="">Выбрать город</option>
                <option value="466">Москва</option>
                <option value="467">Санкт-Петербург</option>
                <option value="468">Нижний Новгород</option>
                <option value="469">Иркутск</option>
                <option value="470">Красноярск</option>
                <option value="491">Екатеринбург</option>
                <option value="492">Ростов-на-Дону</option>
                <option value="493">Новосибирск</option>
            </select>
            <br>
            <button class="inp" type="submit" value="Далее"><span>Продолжить</span></button>
        </form>
        <br>
<?php
//возможность добавления города в бд
/*if (isset($_POST["address"])) {
    $cityId = $_POST["cityId"];
    $name = $_POST["name"];
        $servername = "localhost";
    $username = "u0893076_u098716";
    $password = "zkIUpBDL9E4ZXJYAkv";
    $dbname = "u0893076_spav";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO city VALUES ('" . $cityId . "','" . $name . "')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}*/
?>

</body>
</html>