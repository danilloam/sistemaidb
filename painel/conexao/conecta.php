<?php


# FileName="Connection_php_mysql.htm"
# Type="MYSQLi"
# HTTP="true"			

$hostname_conecta = "50.62.137.49";				$database_conecta = "sistemaidb";				$username_conecta = "sistemaidb";				$password_conecta = "@K3f7b9h1T7a3k9w2y";	$conecta = mysqli_connect($hostname_conecta, $username_conecta, $password_conecta) or trigger_error(mysqli_error(),E_USER_ERROR);$db = mysqli_select_db($conecta,$database_conecta);?><?php $titulo="Gest&atilde;o IDB";$ano=date("Y");$copy="&copy Todos os Direitos Reservados a $titulo"; ?>