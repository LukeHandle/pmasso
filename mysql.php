<?php
/*
LukeH sometime around ~2014

This is for granting trusted users access to backend DBs without MySQL password entry.
For use behind an existing authentication platform (eg. https://github.com/bitly/oauth2_proxy )

phpMyAdmin sits at https://admin.example.com/db/ and this script sets appropriate session details for MySQL auth

Access this at /mysql.php?host=mysql_hostname1

*/

if(!isset($_GET['host'])) {
    header('Location: https://admin.example.com/');
    die();
}

if($_GET['host'] === 'mysql_hostname1') {
    $configHost = array(
        'id' => '1',
        'session_name' => 'Signon1',
        'signon_user' => 'mysql_username1',
        'signon_password' => 'mysql_password1',
        'signon_host' => 'mysql_hostname1',
        'signon_cfgupdate' => array('verbose' => 'MySQL 1')
    );
} elseif($_GET['host'] === 'mysql_hostname2') {
    $configHost = array(
        'id' => '2',
        'session_name' => 'Signon2',
        'signon_user' => 'mysql_username2',
        'signon_password' => 'mysql_password2',
        'signon_host' => 'mysql_hostname2',
        'signon_cfgupdate' => array('verbose' => 'MySQL 2')
    );
} else {
    header('Location: https://admin.example.com/');
    die();
}

/* Need to have cookie visible from parent directory */
session_set_cookie_params(0, '/db/', '', false);

session_name($configHost['session_name']);
session_start();

$_SESSION['PMA_single_signon_user'] = $configHost['signon_user'];
$_SESSION['PMA_single_signon_password'] = $configHost['signon_password'];
$_SESSION['PMA_single_signon_host'] = $configHost['signon_host'];

$_SESSION['PMA_single_signon_cfgupdate'] = $configHost['signon_cfgupdate'];

$id = session_id();
session_write_close();

header('Location: https://admin.example.com/db/?server='.$configHost['id']);

?>
