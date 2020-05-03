<?php session_start();
require 'core.php';
require 'header.php';
require 'connectdb.php';
?>
<form method="post" action="oplata.php">
    <label for="summ">Введите сумму</label>
    <input type="text" name="summ" id="summ">
    <input type="submit" value="далее">
</form>
