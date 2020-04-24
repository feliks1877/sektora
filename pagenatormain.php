<ol id='list'>
<?php

require 'core.php';
require 'connectdb.php';

$sql="SELECT count(*) as total FROM objects WHERE active = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total = $row['total']; 

for($i=1; $i<=$total/$adsAmount+7; $i++){
    echo "";
	echo "<li id='pagin'><a href='main.php?page=$i'>$i</a></li> ";
	echo "";
}
$conn->close();
?>
</ol>
<script src="js/stylepaginator.js"></script>