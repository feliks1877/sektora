<?php
require "core.php";
require 'header.php';
$inactive = 60 * 60 * 24;
if (!isset($_SESSION['timeout']))
    $_SESSION['timeout'] = time() + $inactive;

$session_life = time() - $_SESSION['timeout'];

if ($session_life > $inactive) {
    session_destroy();
    header("Location:index.php");
}

$_SESSION['timeout'] = time();
?>

<link rel="stylesheet" href="css/galery.css">

<div class="detail">

    <div>
        <?php
        require 'functions.php';
        require 'connectdb.php';
        $objectId = $_GET["objectId"];

        $sql = "SELECT * FROM objects where objectId = $objectId";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $clientId = $row['clientId'];
        $web = $row["web"];

        anticlick($objectId, $clientId);

        echo "<div class='object'>";
        $p = explode(';', $row['photo']);
        $n = count($p);
        $click = $row["click"];
        $click++;
        //запись просмотров страницы
        $sql = "update objects set click = $click where objectId = $objectId";
        $result = $conn->query($sql);
        ?>


        <?php
        echo "<div style='font-size: 15px; float: right; margin-right: 10px; margin-top: 10px;'>";
        echo "" . $row["date"];
        echo "</div> <br>";
        echo "<div class='name' id=''>";
        echo "" . $row["name"];
        echo "<div class='disc' id='disk'>";
        echo "" . $row["description"];
        echo "</div>";
        echo "<div class='address'>Наш адрес: ";
        echo "" . $row["address"];
        echo "</div>";
        echo "<div class='tel'>";
        echo "" . $row["telephone"];
        echo "</div>";
        echo "<div class='click'>";
        echo "" . $row["click"];
        echo "</div>";
        ?>
    </div>
    <a id="web" href="<?php echo $web ?>">Наш сайт</a>
    <div class="slideshow-container">
        <?php
        for ($i = 0; $i < $n - 1; $i++) {
            ?>
            <div class="mySlides fade">
                <div class="numbertext"></div>
                <?php
                $photo = $p[$i];
                echo "<img style='width:100%' src='$domen/photo/$photo'>"; ?>'
                <div class="text"></div>

            </div>
            <?php
        }
        ?>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>


    <script src="js/slide.js"></script>
</div>
