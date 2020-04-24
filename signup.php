<?php
require('header.php');
?>
<link rel="stylesheet" href="css/signupstyle.css">
<!--    <h1 class="mycity">Регистрация</h1>-->
<!--    <div class="signup">-->
<!--        <form method="post" action="signup.php">-->
<!--            <div class="form1">-->
<!--                <label for="exampleInputEmail1"><h5>Введите Ваш Email</h5></label>-->
<!--                <input type="email" name="email" class="inp1" id="exampleInputEmail1" placeholder="Ваш email" autocomplete="off" required>-->
<!--            </div>-->
<!--            <div class="form1">-->
<!--                <label for="exampleInputLogin"><h5>Придумайте себе Login</h5></label>-->
<!--                <input type="text" name="login" class="inp1" id="exampleInputLogin" placeholder="login" required>-->
<!--            </div>-->
<!--            <div class="form1">-->
<!--                <label for="exampleInputPassword1"><h5>Задайте пароль</h5></label>-->
<!--                <input type="password" name="password" class="inp1" id="exampleInputPassword1" placeholder="Password" autocomplete="off" required>-->
<!--            </div>-->
<!--            <button type="submit" class="btn" value="Продолжить"><span class="next">Далее</span></button>-->
<!--        </form>-->
<!--    </div>-->
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $login = $_POST["login"];

        require 'connectdb.php';

        $sql = "INSERT INTO clients VALUES (null,'" . $login . "','" . $pass . "','" . $email . "','',100)";

        if ($conn->query($sql) === TRUE) {
            echo "<h5>Вы успешно зарегестрировались, спасибо что выбрали нас<br>
                       войдите в личный кабинет и ознакомьтесь с условиями размещения<br>
                       <h4><a href='signin.php'><em>Личный кабинет</em></a></h4></h5>";
        } else {
            echo '<h5>Что-то пошло не так, если у Вас не получаетсая зарегистрироваться, напишите нам,<br>
                   мы ответим Вам в течении часа</h5><br><a href="feedback.php"><em>Напишите здесь</em></a>';
//            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

<h1 class="mycity">Регистрация</h1>
<div class="signup">
    <form method="post" action="signup.php">
        <div class="form1">
            <label for="exampleInputEmail1"><h5>Введите Ваш Email</h5></label>
            <input type="email" name="email" class="inp1" id="exampleInputEmail1" placeholder="Ваш email" autocomplete="off" required>
        </div>
        <div class="form1">
            <label for="exampleInputLogin"><h5>Придумайте себе Login</h5></label>
            <input type="text" name="login" class="inp1" id="exampleInputLogin" placeholder="login" required>
        </div>
        <div class="form1">
            <label for="exampleInputPassword1"><h5>Задайте пароль</h5></label>
            <input type="password" name="password" class="inp1" id="exampleInputPassword1" placeholder="Password" autocomplete="off" required>
        </div>
        <button type="submit" class="btn" value="Продолжить"><span class="next">Далее</span></button>
    </form>
</div>
