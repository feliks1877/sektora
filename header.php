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
    <noscript><div><img src="https://mc.yandex.ru/watch/62469496" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Da+2|Comfortaa&display=swap" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165133218-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-165133218-1');
    </script>
    <link rel="icon" type="image/png" href="favicon.png" />
    <link rel="stylesheet" href="css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/lk.js"></script>
    <?php require 'title.php'; ?>
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
