<?php
error_reporting(0);
session_start();
// *** Logout the current user.
$logoutGoTo = "login.php";
$_SESSION['MM_Username'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;
unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
if ($logoutGoTo != "") { 
?>
<meta http-equiv="refresh" content="0;URL=login.php">
<?php
exit;
}
?>