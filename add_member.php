<?php

# Adds an email to a list.
# query params:
#  - member: email address to add (e.g., john.doe@abc.com)
#  - list: mailman list (e.g., my_mailing_list)

require_once('mailman.php');
require_once('JSON.php');

# prepare the response as JSON
header('Content-Type: application/json');

if ( !isset( $_GET["member"] ) || !isset( $_GET["list"] ) ) {
    header('X-PHP-Response-Code: 400', true, 400);
    exit();
}

$email = $_GET["member"];
$list = $_GET["list"];

if ( !add_member( $email, $list ) ) {
    header('X-PHP-Response-Code: 400', true, 400);
}

?>
