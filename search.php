<?php
require 'core.php';
require 'header.php';
?>

<link rel="stylesheet" href="css/mainstyle.css">
    <div class="main" style="margin-top: 110px;">

        <ul id="spisok">
<?php
require 'connectdb.php';

    echo "<div id='formsearch'><form method='post'>
<label for='search' name='search'><h6 style='    margin-right: 109px; margin-bottom: 0px;'>Найти по ключевым словам</h6></label>
<input type='search' name='search' id='search' required>
<input type='submit' id='searchbtn' value='Найти'>
</form></div>";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search'];

        $sql = "SELECT *
        FROM objects
        WHERE name LIKE '%$search%'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $objectId = $row['objectId'];
            $name = $row['name'];
            $description = $row['description'];
//            echo "<h6>$objectId,$name,$description</h6>";
            echo "<li id='element'>";
            echo "<div class='object'><a class='sulka' href='details.php?objectId=$objectId'>";

            $photo1 = explode(';', $row['photo'])[0];
            echo "<div class='izob' style='background: url(photo/$photo1); background-size: 25px;'>";
            echo "<img class='photoobject' src='photo/$photo1'>";
            echo "</div>";
            echo "<div class='disc' id='disk'>";
            echo "" . $row["name"];
            echo "</div>";
            echo "<div class='address'>";
            echo "" . $row["address"];
            echo "" . $row["objectId"];
            echo "</div>";
            echo "<div class='tel'>";
            echo "" . $row["telephone"];
            echo "</div>";
            echo "</a></div>";
            echo "</li>";
        }

    }

//require 'pagenatormain.php';
?>
        </ul>
    </div>
