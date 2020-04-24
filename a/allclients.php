<?php session_start();
if (!isset($_SESSION['clientId'])) {
    header('Location: ../signin.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Allclients</title>
</head>
<body style="display: flex; justify-content: center; flex-direction: column; background: #f2f2f8">
<h4 style="text-align: center">Список пользователей</h4>
<?php

require '../connectdb.php';
$sql = "SELECT * FROM clients where clientId  order by clientId ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$balance = $row['balance'];
$email = $row['email'];
while ($row = $result->fetch_assoc()) {

    echo "<div style=\"text-align: center; margin-bottom: 20px;border: 2px solid blue\">";
    echo "  " . $row["clientId"];
    echo "  " . $row["email"];
    echo "  " . $row["login"];
    echo "  " . $row["balance"];
    if($balance<10){
        $myemail = 'sektora.ru@gmail.com';
        $tema = 'tema';
        $email = $row['email'];
        $message = 'низкий баланс';
        mail($myemail, $tema, $email, $message);

        echo 'Слишком низкий баланс объявления не доступны к просмотру(<br>';
    };

    echo "</div>";
}

$conn->close()
?>

</body>
</html>
