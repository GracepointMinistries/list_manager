<?php

# Returns an array of all the liss that the given member is in
function find_member( $member ) {
    $lists = `sudo /usr/lib/mailman/bin/find_member $member | grep -v 'found in'`;
    if ( $lists != '' ) {
        $lists = trim( $lists );
        $lists = preg_split('/\s+/', $lists);
        return $lists;
    }
    else {
        return array();
    }
}

# Adds an email to a list. Returns a boolean representing success or failure.
function add_member( $email, $list ) {
    return `sudo /usr/lib/mailman/bin/add_members -r - --admin-notify=y $list <<< $email | grep "Already a member:\|Subscribed:"`;
}

# Removes an email from a list. Returns a boolean representing success or failure.
function remove_member( $email, $list ) {
    $error = `sudo /usr/lib/mailman/bin/remove_members -f - $list <<< $email`;
    return !$error;
}

# Removes an email from all lists. Returns a boolean representing success or failure.
function remove_member_from_all_lists( $email ) {
    return `sudo /usr/lib/mailman/bin/remove_members -f - --fromall <<< $email`;
}
?>
