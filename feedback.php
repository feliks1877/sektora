<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/feedbackstyle.css">
    <title>feedback</title>
</head>
<body>
<?php require('header.php') ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myemail = 'sektora.ru@gmail.com';
    $tema = 'tema';
    $email = $_POST['email'];
    $message = $_POST['message'];
    $a=mail($myemail, $tema, $email, $message);
    var_dump($a);
}
?>
<div class="feed">
    <div class="feed2">
        <form action="feedback.php" method="post">
            <label for="name"><h5>Ваш email</h5></label>
            <input type="text" class="" id="email" name="email" placeholder="Введите email для обратной связи" required>

            <label for="address"><h5>Введите текст</h5></label>
            <textarea class="address" name="message" id="message" cols="20" rows="5"
                      placeholder="Введите текст Вашего обращения" required></textarea><br>
            <button type="submit" id="submit" value="Отрпавить"><h6 id="send" style="margin-top: 6px">Отправить</h6></button>
        </form>
    </div>
</div>
<?php require('footer.php') ?>
</body>
</html>