<?php
//    echo basename($_SERVER['PHP_SELF']);
$pagename = basename($_SERVER['PHP_SELF']);
if($pagename == 'main.php'){
   echo '<link rel="stylesheet" href="css/mainstyle.css">';

    $typeId = isset($_GET['typeId'])?$_GET['typeId']:'';
    if($typeId = ''){
        echo "<title>Здесь Вы сможете найти лучшие Салоны красоты, Спа, 
                     Мастеров по уходу за своей внешностью, 
                     Мастеров массажа и Барбершопы</title>";
    }
    else if($typeId == 1){
        echo "<title>Самый удобный поиск саун и бань в вашем городе</title>";
        echo '<meta name="description" content="В этом каталоге представлены сауны. Сауна и баня, 
                                                     лучшее место для вашего отдыха с дрзъями и семьей" />';
    }
   else if($typeId == 3){
       echo "<title>Самый удобный поиск массажных салонов в вашем городе</title>";
       echo '<meta name="description" content="Здесь представлены лучшие массажные салоны.Массаж от лечебного до расслаюляющего На ваш выбор - заведения, 
                                                     где можно устроить досуг на любой вкус" />';

    }
   else if($typeId == 7){
       echo "<title>Самый удобный поиск салонов красоты в вашем городе</title>";
       echo '<meta name="description" content="Здесь представлены лучшие салоны красоты.
                                        Самый удобный поиск нужных вам специалистов" />';

   }
   else if($typeId == 6){
       echo "<title>Самый удобный поиск специалистов по уходу за внешностью в вашем городе</title>";
       echo '<meta name="description" content="Здесь Вы найдете лучших профессионалов маникюра и педикюра,
                                                   визажистов и парикмахеров. Маникюр и педикюр на любой выбор." />';
       }
   else if($typeId == 2){
       echo "<title>Самый удобный поиск спа салонов в вашем городе</title>";
       echo '<meta name="description" content="Здесь представлены лучшие спа салоны. На ваш выбор - спа, 
                                                     где можно устроить релакс на любой вкус" />';

   }
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