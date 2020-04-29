<?php session_start() ?>

<title>feedback</title>
<link rel="stylesheet" href="css/feedbackstyle.css">
<?php
require 'core.php';
require'header.php';

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
            <textarea class="address" name="message" id="message" cols="20" rows="10"
                      placeholder="Введите текст Вашего обращения" required></textarea><br>
            <button type="submit" id="submit" value="Отрпавить"><span id="send" style="margin-top: 6px;
                             color: yellow">Отправить</span></button>
        </form>
    </div>
</div>
<?php require 'footerfixed.php'; ?>
