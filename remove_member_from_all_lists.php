<?php

# Removes an email from all lists.
# query params:
#  - member: email address to remove (e.g., john.doe@abc.com)

require_once('mailman.php');
require_once('JSON.php');

# prepare the response as JSON
header('Content-Type: application/json');

if ( !isset( $_GET["member"] ) ) {
    header('X-PHP-Response-Code: 400', true, 400);
    exit();
}

$email = $_GET["member"];

if ( !remove_member_from_all_lists( $email ) ) {
    header('X-PHP-Response-Code: 400', true, 400);
}

?>
