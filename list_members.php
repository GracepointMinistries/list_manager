<?php

# Returns list of list names that the given member is in.
#
# query params:
#  - member: email address to find (e.g., john.doe@abc.com)

require_once('mailman.php');
require_once('JSON.php');

# prepare the response as JSON
header('Content-Type: application/json');

if ( !isset( $_GET["list"] ) ) {
    header('X-PHP-Response-Code: 400', true, 400);
    exit();
}

$list = $_GET["list"];

$members = list_members( $list );

# output the body as JSON
$json = new Services_JSON();
print $json->encode( $members );


?>
