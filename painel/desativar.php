<?php
	include("configuracao.php");
 include ("conexao/conecta.php");
     $idmembro=$_GET["id"];
	 $ativo=$_GET["ativo"];
	 if($ativo==1){
	 $inserir = mysqli_query($conecta,"update pessoa set status='desativado' where id={$idmembro}")or die(mysqli_error());
	 echo"<script language=javascript>location.href='index.php?view=membros'</script>";
	 }else{
		 $inserir = mysqli_query($conecta,"update pessoa set status='ativo' where id={$idmembro}")or die(mysqli_error());
	 	 echo"<script language=javascript>location.href='index.php?view=membros'</script>";
	 }
	 ?>