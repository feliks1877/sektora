<?php
$email;
$login;
$pass;
$captcha;
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$captcha = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
if (!$captcha) {
    echo '<h2>Please check the the captcha form.</h2>';
    exit;
}
$secretKey = "6LekZvAUAAAAABjyXWiBE2huVCtJXKVCkl1ofv6i";
$ip = $_SERVER['REMOTE_ADDR'];

// post request to server
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array('secret' => $secretKey, 'response' => $captcha);

$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
$responseKeys = json_decode($response, true);
header('Content-type: application/json');
if ($responseKeys["success"]) {
    echo json_encode(array('success' => 'true'));
    require 'core.php';
    require 'connectdb.php';

    $sql = "INSERT INTO clients VALUES (null,'" . $login . "','" . $pass . "','" . $email . "','',100)";
    $conn->query($sql);
    $conn->close();
} else {
    echo json_encode(array('success' => 'false'));
}
?>
