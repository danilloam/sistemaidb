<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php 
include ("conexao/conecta.php");

$liberar=$_GET["liberar"];
$doador=$_GET["doador"];
$login=$_GET["login"];
if($liberar=="sim"){
	
$sql=mysql_query("update pagamentos set status='pago' where indicador='$login' and login='$doador'");
	
$valor="10.00";

$sql=mysql_query("update usuarios set saldo=saldo+$valor where login='$login'");	

echo"<script language=javascript>alert('Usuário Liberado com Sucesso')</script>";
echo"<script language=javascript>location.href='index.php?view=ganhos'</script>";	
}

 ?>