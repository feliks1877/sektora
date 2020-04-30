<?php
require 'core.php';
require('header.php');
?>
<link rel="stylesheet" href="css/signupstyle.css">
<?php
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    $email = $_POST["email"];
//    $pass = $_POST["password"];
//    $login = $_POST["login"];
//
//    require 'connectdb.php';
//
//    $sql = "INSERT INTO clients VALUES (null,'" . $login . "','" . $pass . "','" . $email . "','',100)";
//
//    if ($conn->query($sql) === TRUE) {
//        echo "<h5 style='border: 2px solid yellow; border-radius: 15px;padding: 7px;'>
//                                Вы успешно зарегестрировались, спасибо что выбрали нас<br>
//                                войдите в личный кабинет и ознакомьтесь с условиями размещения<br>
//                                <a href='signin.php' style='color: white;'>
//                                <em>→ Личный кабинет</em></a></h5>";
//    } else {
//        echo "<h5 style='border: 2px solid yellow; border-radius: 15px;padding: 7px;'>
//              Что-то пошло не так, если у Вас не получаетсая зарегистрироваться, напишите нам,<br>
//              мы ответим Вам в течении часа<br>
//              <a style='color: white;' href='feedback.php'>
//              <em>→ Напишите здесь</em></a></h5>";
////            echo "Error: " . $sql . "<br>" . $conn->error;
//    }
//
//    $conn->close();
//}
?>
<div class="container">
    <div id="verysignup">

    </div>
    <h1 class="mycity">Регистрация</h1>

    <div class="signup">
        <form id="signup_form" method="post" action="signup.php">
            <div class="form1">
                <label for="exampleInputEmail1"><h5>Введите Ваш Email</h5></label>
                <input type="email" name="email" class="inp1" id="exampleInputEmail1" placeholder="Ваш email"
                       autocomplete="off" required>
            </div>
            <div class="form1">
                <label for="exampleInputLogin"><h5>Придумайте себе Login</h5></label>
                <input type="text" name="login" class="inp1" id="exampleInputLogin" placeholder="login" required>
            </div>
            <div class="form1">
                <label for="exampleInputPassword1"><h5>Задайте пароль</h5></label>
                <input type="password" name="password" class="inp1" id="exampleInputPassword1" placeholder="Password"
                       autocomplete="off" required>
            </div>
            <button type="submit" class="btn" value="Продолжить"><span class="next">Регистрация</span></button>
        </form>
        <script>
            // when form is submit
            $('#signup_form').submit(function () {
                // we stoped it
                event.preventDefault();
                var email = $('#exampleInputEmail1').val();
                var pass = $("#exampleInputPassword1").val();
                var login = $("#exampleInputLogin").val();
                // needs for recaptacha ready
                grecaptcha.ready(function () {
                    // do request for recaptcha token
                    // response is promise with passed token
                    grecaptcha.execute('6LekZvAUAAAAAKe-JWSgmKbBWktKQxpqOreyQ2Rl', {action: 'create_comment'}).then(function (token) {
                        // add token to form
                        $('#signup_form').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                        $.post("form_v3.php", {
                            email: email,
                            login: login,
                            pass: pass,
                            token: token
                        }, function (result) {
                            console.log(result);
                            if (result.success) {
                                // alert('Всё прошло удачно')
                                document.getElementById('verysignup').innerHTML =
                                    "<h5 style='border: 2px solid yellow; border-radius: 15px;padding: 7px;'>\n" +
                                    "                                Вы успешно зарегестрировались, спасибо что выбрали нас<br>\n" +
                                    "                                войдите в личный кабинет и ознакомьтесь с условиями размещения<br>\n" +
                                    "                                <a href='signin.php' style='color: white;'>\n" +
                                    "                               <em>→ Личный кабинет</em></a></h5>";
                                document.getElementById('signup_form').style.display="none";

                            } else {
                                alert('Ты какой то не такой')
                            }
                        });
                    });
                });
            });
        </script>
        <br><a href="signin.php">
            <button type="button" class="btn" value="Продолжить"><span class="next">Войти</span></button>
        </a>

    </div>
</div>
<?php require 'footerfixed.php'; ?>

