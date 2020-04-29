<div class="blockpage">
    <?php

    require 'core.php';
    require 'connectdb.php';

    $sql = "SELECT count(*) as total FROM objects WHERE active = 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total = $row['total'];
    echo "<ol id='list'>";
    $typeIdText = "";
    if ($typeId != "") {
        $typeIdText = "&typeId=$typeId";
    }
    for ($i = 1; $i <= $total / $adsAmount + 25; $i++) {

        echo "<a href='main.php?page=$i$typeIdText'><li class='pagin'><a href='main.php?page=$i$typeIdText'>$i</a></li></a> ";

    }
    echo "</ol>";
    $conn->close();
    $page = isset($_GET['page'])?$_GET['page']:1;
    ?>
</div>
<link rel="stylesheet" href="css/mainstyle.css">

<a  href="main.php?page=<?php echo ($page-1 > 0?$page-1:1).$typeIdText?>">
    <img id="strelkal" src="photo/strelkal.png" alt="" style="position: absolute;height: 38px;left: 5px;
z-index: 1;filter: drop-shadow(1px 1px 2px black); margin-top: -42px;"></a>

<a href="main.php?page=<?php echo ($page+1).$typeIdText?>">
    <img src="photo/strelkar.png" alt="" style="position: absolute;height: 38px; right: 5px;
z-index: 1;filter: drop-shadow(1px 1px 2px black);margin-top: -43px;"></a>

<script src="js/stylepaginator.js"></script>
