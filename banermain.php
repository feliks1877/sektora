<?php
//генерация банер
require 'connectdb.php';

$sql1 = "SELECT * 
FROM   baner
WHERE   date BETWEEN NOW() - INTERVAL 1 DAY AND NOW()
order by rand() limit 1 " ;

$result=$conn->query($sql1);
$row = $result->fetch_assoc();
$objectId = $row['objectId'];
var_dump($objectId);
echo "objectId = $objectId";
if($objectId != ""){
    $sql2 = "select * from objects where objectId=$objectId";
    $result=$conn->query($sql2);
    $row = $result->fetch_assoc();
    $objectId = $row['objectId'];
    $photo=$row['photo'];
    $name=$row['name'];
    $tel=$row['telephone'];
    $photo1 = explode(";",$photo)[0];


    ?>
    <a href='details.php?objectId=<?php echo $objectId ?>'>
    <div  class="baner">
    <p id="textbaner"><?php echo $tel ?></p>
    <img id="banerimg" src="photo/<?php echo $photo1;?>">
    </div>
    </a>
    <!--<img  src="../photo/<?php //echo $photo1;?>">-->

<?php
 }else{
   echo '
<div  class="baner">
<span id="textbaner">Sektora.ru</span>
<img id="banerimg" src="photo/zastavka.jpg">
</div>';
}
$conn->close();
?>