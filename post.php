<?php
session_start();	
$name = $_GET['name'];
$email = $_GET['email'];
$message = $_GET['message'];
$subject = 'FORMULARIO DE CONTATO - SISTEMA IDB | ' . $name;
if(strtolower($_REQUEST['code']) == strtolower($_SESSION['random_number']))
{
$TO = "sistemaidb@gmail.com";
$h = "From: " . $email;
$content = "$name ($email) Enviou uma mensagem :\n\n$message";
mail($TO, $subject, $content, $h);		
	echo 1;		
}	
else
{
	echo 0; // invalid code
}
?>
