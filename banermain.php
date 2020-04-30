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
        <p id="namebaner"><?php echo $name ?></p>
    <p id="textbaner"><?php echo $tel ?></p>
    <img id="banerimg" src="photoads/<?php echo $photo1;?>">
    </div>
    </a>
<?php
 }else{
   echo '
<a href="lk.php">
<div  class="baner">
<h2 id="namebaner">SEKTORA.RU<br>
Разместите ваше ообъявление,нa нашем ресурсе.
Здесь только реальные пользователи и ничего лишнего.
</h2>    
<span id="textbaner">Sektora.ru</span>
<img id="banerimg" src="photo/fonbaner2.jpg">
</div></a>';
}
$conn->close();
?>