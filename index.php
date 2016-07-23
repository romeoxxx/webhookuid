<?php
$verify_token = "atp"; // Verify token
// Receive something
if (!empty($_REQUEST['hub_mode']) && $_REQUEST['hub_mode'] == 'subscribe' && $_REQUEST['hub_verify_token'] == $verify_token) {

    // Webhook setup request
    echo $_REQUEST['hub_challenge'];
} else {

    $data = json_decode(file_get_contents("php://input"), true, 512, JSON_BIGINT_AS_STRING);
    if (!empty($data['entry'][0]['changes'][0]['value']['user_id'])) {
    	$uid = $data['entry'][0]['changes'][0]['value']['user_id'];
    	$data = file_get_contents("http://tiepcankhachhang.com/like/add.php?uid=".$uid);
    }
}
