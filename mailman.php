<?php

function find_member($email) {
    $lists = `sudo /usr/lib/mailman/bin/find_member $email | grep -v 'found in'`;
    if ( $lists != '' ) {
        $lists = trim( $lists );
        $lists = preg_split('/\s+/', $lists);
        return $lists;
    }
    else {
        return array();
    }
}

?>
