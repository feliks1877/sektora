<?php session_start();
require 'core.php';
require 'header.php';

?>
<div id="mainzagolovok" style="padding: 1px">
    <?php
    require 'connectdb.php';
    $typeId = isset($_GET['typeId']) ? $_GET['typeId'] : '';
    if ($typeId == "") {
        echo '<br><h1 style="font-size: large;">Вы смотрите все объявления</h1>';
    } else if ($typeId == 7) {
        echo '<br><h1 style="font-size: large;">Лучшие салоны красоты</h1>';
    } else if ($typeId == 6) {
        echo '<br><h1 style="font-size: medium;">Самые опытные мастера маникюра, педикюра,визажисты.</h1>';
    } else if ($typeId == 3) {
        echo '<br><h1 style="font-size: large;">Мастера массажа и релакса</h1>';
    } else if ($typeId == 2) {
        echo '<br><h1 style="font-size: large;">Лучшие Спа-центры и места для Вашего релакса</h1>';
    } else if ($typeId == 4) {
        echo '<br><h1 style="font-size: large;">Лучшие Barbershop и парикмахерские</h1>';
    } else if ($typeId == 1) {
        echo '<br><h1 style="font-size: large;">Лучшие сауны и баные комплексы</h1>';
    };
    //определяем cityId
    $cityId = "";
    //проверка,если не выбран город
    if (isset($_GET['cityId'])) $cityId = $_GET['cityId'];
    else if (isset($_SESSION['cityId'])) $cityId = $_SESSION['cityId'];
    else {
        die('<h5>Город не выбран<br></h5><a href="index.php"><em><h3 style="border: 2px solid yellow;
          border-radius: 15px; color: lightyellow;">→ Сначала выберите город</h3></em></a>');
    }

    if ($cityId != "") {

        $sql = "SELECT * FROM city where cityId = $cityId ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $city = $row['name'];
        echo "<h4>$city</h4>";
    }

    ?>
</div>
<?php
require 'banermain.php';
?>

<div class="main">

    <ul id="spisok">
        <?php

        require 'connectdb.php';

        if (isset($_GET['cityId'])/*||isset( $_SESSION['cityId'])*/) {
            $cityId = $_GET['cityId'];
            $_SESSION['cityId'] = $cityId;
            $sql = "SELECT *
            FROM objects ,clients 
            where cityId = $cityId and active=1 and objects.clientId=clients.clientId and clients.balance>0
            order by date desc ";
        } else {
            if (isset($_SESSION['cityId']) && isset($_GET['typeId'])) {
                $typeId = $_GET['typeId'];
                $cityId = $_SESSION['cityId'];
                $sql = "SELECT * 
                FROM objects,clients 
                where cityId = $cityId and active=1 and typeId = $typeId  and objects.clientId=clients.clientId and clients.balance>0
                order by date desc";
            } else {
                $cityId = $_SESSION['cityId'];
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($page - 1) * $adsAmount;
                $end = $start + $adsAmount;
                $sql = "SELECT * 
                FROM objects ,clients
                where cityId = $cityId and active=1  and objects.clientId=clients.clientId and clients.balance>0
                order by date desc
				limit $start,$end";
            }
        }

        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {

            $objectId = $row['objectId'];
            echo "<li id='element'>";
            echo "<div class='object'><a class='sulka' href='details.php?objectId=$objectId'>";

            $photo1 = explode(';', $row['photo'])[0];
            echo "<div class='izob' style='background: url(photoads/$photo1); background-size: 25px;'>";
            echo "<img class='photoobject' src='photoads/$photo1'>";
            echo "</div>";
            echo "<div class='disc' id='disk'>";
            echo "" . $row["name"];
            echo "</div>";
            echo "<div class='address'>";
            echo "" . $row["address"];
//            echo "" . $row["objectId"];
            echo "</div>";
            echo "<div class='tel'>";
            echo "" . $row["telephone"];
            echo "</div>";
            echo "</a></div>";
            echo "</li>";

        }
        $conn->close();
        ?>
    </ul>
</div>

<?php require 'pagenatormain.php'; ?>
<?php require "footer.php"; ?>


