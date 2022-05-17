<?php
	include("configuracao.php");
 include ("conexao/conecta.php");
     $id=$_GET["id"];

$selectpastor = mysql_query("SELECT * FROM pastor WHERE id=$id");
$dadospastor = mysql_fetch_array($selectpastor);
	$id_pastor=$dadospastor["usuario_id"];
	 $inserir = mysql_query("update usuario set senha='e10adc3949ba59abbe56e057f20f883e' where id={$id_pastor}")or die(mysql_error());
	 echo"<script language=javascript>alert('Senha resetada com Sucesso!')</script>";
	 echo"<script language=javascript>alert('Nova senha: 123456')</script>";
 echo"<script language=javascript>location.href='index.php?view=pastores'</script>";
	 

	 ?>