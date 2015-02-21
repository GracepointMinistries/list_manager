<?php

# Returns list of list names

require_once('mailman.php');
require_once('JSON.php');

# prepare the response as JSON
header('Content-Type: application/json');

$lists = list_lists();

# output the body as JSON
$json = new Services_JSON();
print $json->encode( $lists );


?>
