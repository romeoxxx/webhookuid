<?php


$verify_token = "atp"; // Verify token
$token = "EAAB16RCqjswBAIER9W93fqdX3SsSz71VJTZBsSyVXyJAeZCrXGHCNwy8AaNmGBfPctOPXWov5p5hG0970rwUiu2oI8opaNrKLlPdXb9ZCtxFVws8Mzd1KWnwnMyeY2yTs2P8wGdryYeZBph4SUG6kMiKq96oSKFqjPjrh5afhgZDZD"; // Page token

// Receive something
if (!empty($_REQUEST['hub_mode']) && $_REQUEST['hub_mode'] == 'subscribe' && $_REQUEST['hub_verify_token'] == $verify_token) {

    // Webhook setup request
    echo $_REQUEST['hub_challenge'];
} else {

    $data = json_decode(file_get_contents("php://input"), true, 512, JSON_BIGINT_AS_STRING);
    $myfile = file_put_contents('logs.txt', $data.PHP_EOL , FILE_APPEND);
}
