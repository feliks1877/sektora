<?php
require 'core.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Da+2|Comfortaa&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/lk.js"></script>

    <?php
    if(isset($_GET['main.php']) == TRUE){
        echo "попал в иф";
       echo "<title>Объявления</title>";
    };
    ?>
</head>
<body>
<header>
     <div id="zagolovok">
    <h1 id="sek"><a href="main.php" style="text-decoration: none; color: #ffe649;">Sektora</a></h1>
    </div>
    <a href='<?php echo "$domen/lk.php"; ?>'><img src="photo/iconprof.png" class="iconlk" alt="icon"></a>
    
    <input type="checkbox" name="sub" id="sub">
    <label for="sub" class="icon">
        <img class="icon" src="photo/iconmenuyell.png">
    </label>
    <label for="sub" id="icon2">
        <img class="icon" src="photo/iconeys.png">
    </label>
    <div class="submenu">
        <nav>
            <ul class="menu">
                <li id="liMenu"><a class="saidbar" href="index.php">Выбрать город</a></li>
                <li id="liMenu"><a class="saidbar" href="main.php">Все объявления</a></li>
                <li id="liMenu"><a class="saidbar"  href="main.php?typeId=7">Салон красоты</a></li>
				<li id="liMenu"><a class="saidbar"  href="main.php?typeId=6">Мастера</a></li>
                <li id="liMenu"><a class="saidbar" href="main.php?typeId=2">Спа центры</a></li>
                <li id="liMenu"><a class="saidbar" href="main.php?typeId=1">Сауны</a></li>
                <li id="liMenu"><a class="saidbar" href="main.php?typeId=3">Услуги массажа</a></li>
                <li id="liMenu"><a class="saidbar" href="main.php?typeId=4">Барбершопы</a></li>
                <li id="liMenu"><a class="saidbar" href="ads.php">Добавить объявление</a></li>
                <li id="liMenu"><a class="saidbar" href="search.php">Поиск</a></li>
                <li id="liMenu"><a class="saidbar" href="feedback.php">Написать нам&nbsp</a></li>
            </ul>
        </nav>
    </div>
</header>
