<?php session_start();
require "core.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    require 'connectdb.php';
    $sql = "SELECT * FROM clients WHERE email='{$email}' and password='{$pass}'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Авторизация успешна
        //определение Iduser
        $row = $result->fetch_assoc();
        $_SESSION["clientId"] = $row["clientId"];
        $_SESSION['email'] = $email;
        $_SESSION['login'] = 1;
        //проверка на авторизацию и переход
        header("Location: $domen/lk.php");
        exit;
//        echo 'Успешная авторизация';
    } else {
        $_SESSION['login'] = 0;
        echo '<h4>Нет такого пользователя</h4>';
        echo $result->num_rows;
        echo $email . $password;
    }
    $conn->close();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/signin.css">
    <title>Авторизация</title>
</head>
<body>
<?php
require('header.php');
?>
<div class="signin">
    <form method="post" action="signin.php">
        <label for="exampleInputEmail1"><h5>Введите Ваш Email</h5></label>
        <input type="email" name="email" class="inp1" id="exampleInputEmail1" placeholder="Ваш email"
               autocomplete="off" required>

        <label for="exampleInputPassword1"><h5>Введите пароль</h5></label>
        <input type="password" name="password" class="inp1" id="exampleInputPassword1" placeholder="Password"
               autocomplete="off" required>

        <button type="submit" class="btn" value="Продолжить"><span>Войти</span></button><br>
    </form>
    <a href="<?php echo $domen ?>/signup.php"><button type="" class="btn" value="Регистрация"><span>Регистрация</span></button></a>

</div>
</body>
</html>