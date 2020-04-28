<?php session_start();
require 'core.php';
require 'header.php';
?>

    <link rel="stylesheet" href="css/signin.css">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["token"])) {
    $email = $_POST['email'];
    $to = $email; // note the comma
    $token = md5(time() . $email);
    $link = "reset.php?token=$token&email=$email";
    echo $to;
// subject
    $subject = 'Сброс пароля';
// message
    $message = "<html>
<head>
  <title>Перейдите по ссылке</title>
</head>
<body>
  <strong>Ссылка</strong> для востановления пароляЖ <a href='$domen/$link'>Восстановить</a>;
</body>
</html>";

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf8' . "\r\n";

    require 'connectdb.php';

    $sql = "SELECT count(*) as result
    FROM clients 
    WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['result'] == 1) {
        $result = mail($to, $subject, $message, $headers);
        $sql = "INSERT INTO reset
                VALUES (null,'$email','$token',now())";
        $conn->query($sql);
    }

    echo "<h5 style='border: 2px solid yellow;
              padding: 15px;border-radius: 15px;'>
              Письмо отправлено на Ваш email , 
              проверьте папку 'спам', переместите письмо из папки 'спам'
                в папку 'входящие' и перейдите по ссылкe после чего задайте новый пароль</h5>";
} else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["token"])) {
    $token = $_GET['token'];
    $email = $_GET['email'];
    echo "<form method='post' action='reset.php'>
           <label for='newpass'>Введите новый пароль</label>
           <input type='text' name='newpass' id='newpass'>
           <input type='hidden' name='email' value='$email'>
           <input type='hidden' name='token' value='$token'>
           <input type='submit'>
           </form>";
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["newpass"])) {
    $token = $_POST['token'];
    $email = $_POST['email'];
    $newpass = $_POST['newpass'];
    require 'connectdb.php';
    $sql = "SELECT count(*) as result
            FROM reset
            WHERE token = '$token' AND date BETWEEN NOW() - INTERVAL 1 DAY AND NOW()";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result == 1) {
        $sql = "UPDATE clients 
                SET password = '$newpass' 
                WHERE email = '$email'";
        $result = $conn->query($sql);
        echo "<h5 style='border: 2px solid yellow;
              padding: 15px;border-radius: 15px;'>
              Пароль успешно обновлен<br></h5>
              <a href='lk.php'><h4>Войти</h4></a>";
    } else {
        echo "<h5>Ссылка устарела</h5>";
    }
} else {
    ?>
    <form action="reset.php" method="post">
        <input type="text" name="email" placeholder="email">
        <input type="submit" value="восстаноить">
    </form>
<?php } ?>