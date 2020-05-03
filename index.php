<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Da+2|Comfortaa&display=swap" rel="stylesheet">
    <meta name="google-site-verification" content="-adfSxSW9RtauCIWq8JN8mmYEkef1x7wK0RovoC_zYs" />
    <meta name="yandex-verification" content="724ab3cc9f32ca50" />
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(62469496, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165133218-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-165133218-1');
    </script>

    <noscript><div><img src="https://mc.yandex.ru/watch/62469496" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <link rel="stylesheet" href="css/indexstyle.css">
    <link rel="icon" type="image/png" href="favicon.png" />
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
<?php require'footerfixed.php';?>
</body>
</html>
