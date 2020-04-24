<?php
session_start();
require "core.php";
$_SESSION = array();
session_destroy();
header("Location: $domen/signup.php");
?>