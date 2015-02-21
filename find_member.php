<?php

require_once('mailman.php');
require_once('JSON.php');

# prepare the response as JSON
header('Content-Type: application/json');

if ( !isset( $_GET["member"] ) ) {
    header('X-PHP-Response-Code: 400', true, 400);
    exit();
}

$email = $_GET["member"];

$lists = find_member( $email );

# output the body as JSON
$json = new Services_JSON();
print $json->encode( $lists );


?>
