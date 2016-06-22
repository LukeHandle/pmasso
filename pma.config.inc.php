<?php
/*
LukeH sometime around ~2014

This is for granting trusted users access to backend DBs without MySQL password entry.
For use behind an existing authentication platform (eg. https://github.com/bitly/oauth2_proxy )

This is the config for phpMyAdmin which sits at https://admin.example.com/db/

This will call mysql.php when auth is needed and the custom logout page as required (a page to unset your auth cookie)

*/

/* Servers configuration */
$i = 0;

/* Server: MySQL 1 */
$i++;
$cfg['Servers'][$i]['host'] = 'mysql_hostname1';
$cfg['Servers'][$i]['connect_type'] = 'tcp';
$cfg['Servers'][$i]['auth_type'] = 'signon';
$cfg['Servers'][$i]['SignonSession'] = 'Signon1';
$cfg['Servers'][$i]['SignonURL'] = 'https://admin.example.com/mysql.php?host=mysql_hostname1';
$cfg['Servers'][$i]['LogoutURL'] = 'https://admin.example.com/logout';

/* Server: MySQL 2 */
$i++;
$cfg['Servers'][$i]['host'] = 'mysql_hostname2';
$cfg['Servers'][$i]['connect_type'] = 'tcp';
$cfg['Servers'][$i]['auth_type'] = 'signon';
$cfg['Servers'][$i]['SignonSession'] = 'Signon2';
$cfg['Servers'][$i]['SignonURL'] = 'https://admin.example.com/mysql.php?host=mysql_hostname2';
$cfg['Servers'][$i]['LogoutURL'] = 'https://admin.example.com/logout';

/* End of servers configuration */

$cfg['Error_Handler']['display'];

$cfg['DefaultLang'] = 'en';
$cfg['ServerDefault'] = 2;
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';

$cfg['TitleTable'] = '@VSERVER@ / @DATABASE@ / @TABLE@ | @PHPMYADMIN@';
$cfg['TitleDatabase'] = '@VSERVER@ / @DATABASE@ | @PHPMYADMIN@';
$cfg['TitleServer'] = '@VSERVER@ | @PHPMYADMIN@';
$cfg['TitleDefault'] = '@HTTP_HOST@  | @PHPMYADMIN@';
?>