<?php
//    echo basename($_SERVER['PHP_SELF']);
$pagename = basename($_SERVER['PHP_SELF']);
if($pagename == 'main.php'){
    echo '
   <link rel="stylesheet" href="css/mainstyle.css">
   <title>Объявления</title>';
}
else if($pagename == 'lk.php'){
    echo "<title>Личный кабинет</title>";
}
else if($pagename == 'feedback.php'){
    echo "<title>Обратная связь</title>";
}
else if($pagename == 'search.php'){
    echo "<title>Поиск</title>";
}
else if($pagename == 'details.php'){
    echo "<title>Описание</title>";
}
else if($pagename == 'ads.php') {
    echo '<link rel="stylesheet" href="css/adsstyle.css">
          <title>Добавление объявления</title>';
}
else if($pagename == 'signup.php'){
    echo '<script src="https://www.google.com/recaptcha/api.js?render=6LekZvAUAAAAAKe-JWSgmKbBWktKQxpqOreyQ2Rl"></script>
       <title>Регистрация</title>';
    }
else if($pagename == 'editobject.php'){
    echo "<title>Редактирование</title>";
}
else if($pagename == 'signin.php'){
    echo '<link rel="stylesheet" href="css/signin.css">
    <title>Вход</title> ';
}
?>