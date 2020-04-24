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
    <title>Admin</title>
</head>
<body style="display: flex; justify-content: center; flex-direction: column; background: #f2f2f8">

<div style="text-align: center; margin-bottom: 20px">
    <h3>Поиск пользователей</h3>
    <form method="post" action="../a/searchclients.php">
        <input type="text" id="search" name="search" style="border: 3px solid blue; border-radius: 10px">
        <input type="submit">
    </form>

</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '../connectdb.php';
	require '../core.php';
    $search = $_POST["search"];
    $sql = "SELECT * FROM clients where clientId = $search";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $clientId = $row['clientId'];
    $balance = $row['balance'];
    $email = $row['email'];
    $login = $row['login'];


    $sql = "SELECT  sum(amount) as total
    FROM    payhistory
    WHERE   date BETWEEN NOW() - INTERVAL 30 DAY AND NOW() and clientId = $clientId" ;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total = (int)$row['total'];
	
	
    echo "<div style='border: 2px solid blue; text-align: center; margin: 10px';>$clientId<br>";
	echo "total = $total";
    echo "<span>Баланс: $balance</span><br>";
    echo "$email<br>";
    echo "$login</div>";

    $sql = "SELECT * FROM objects where clientId=$clientId order by objectId desc ";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $objectId = $row['objectId'];

        echo "<div style='display: inline-block;text-align: center; border: 2px solid blue; margin: 10px;padding: 10px'>";
        echo "" . $row["date"];
        echo "<br><span>Заголовок: </span> " . $row["name"];
        echo "<span><br>№</span> " . $row["objectId"];
        if ($row['active'] == TRUE) {
            $active = $row['active'];
            echo "<br>Активно";
        } else {
            $noactiv = $row['active'];
            echo "<br>Не активно";
        };

        echo "<br><span>Просмотры </span>" . $row['click'];
        echo "</div>";
    }
}

?>

</body>
</html>
