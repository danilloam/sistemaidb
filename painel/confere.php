<?php
include"conexao/conecta.php";

$login =$_POST['login'];
$senha =$_POST['senha'];

$ac=mysql_query("select * from usuarios where login='$login' and senha='$senha'");
$res=mysql_num_rows($ac);
if($res==0)
{
echo"<script language=javascript>alert('Seus dados de acesso não conferem!')</script>";
echo"<script language=javascript>location.href='login.php'</script>";
} else {

$hits=mysql_query("update usuarios set hits=hits+1 where login='$login'") or die(mysql_error());

setcookie("login", $login,   time()+86400*365);
setcookie("senha", $senha,     time()+86400*365);

header("location:membros.php");   }

?>