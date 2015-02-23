<?php
require_once('config.php');

# Returns an array of all the lists
function list_lists( $member ) {
    $cmd = MAILMAN_CMD_PREFIX . 'list_lists -b';
    $lists = `$cmd`;
    if ( $lists != '' ) {
        $lists = trim( $lists );
        $lists = preg_split('/\s+/', $lists);
        return $lists;
    }
    else {
        return array();
    }
}

# Returns an array of all the members of a list
function list_members( $list ) {
    $cmd = MAILMAN_CMD_PREFIX . "list_members $list";
    $members = `$cmd`;
    if ( $members != '' ) {
        $members = trim( $members );
        $members = preg_split('/\s+/', $members);
        return $members;
    }
    else {
        return array();
    }
}

# Returns an array of all the lists that the given member is in
function find_member( $member ) {
    $cmd = MAILMAN_CMD_PREFIX . "find_member $member | grep -v 'found in'";
    $lists = `$cmd`;
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
    $cmd = MAILMAN_CMD_PREFIX . "add_members -r - --admin-notify=y $list <<< $email | grep 'Already a member:\|Subscribed:'";
    return `$cmd`;
}

# Removes an email from a list. Returns a boolean representing success or failure.
function remove_member( $email, $list ) {
    $cmd = MAILMAN_CMD_PREFIX . "remove_members -f - $list <<< $email";
    $error = `$cmd`;
    return !$error;
}

# Removes an email from all lists. Returns a boolean representing success or failure.
function remove_member_from_all_lists( $email ) {
    $cmd = MAILMAN_CMD_PREFIX . "remove_members -f - --fromall <<< $email";
    return `$cmd`;
}
?>
