<?php	include("configuracao.php");include("func.php");     $idmembro=$_GET["id"];	 $igreja_id=$_GET["ig"];	 $inserir = mysqli_query($conecta,"update pessoa set funcao='Afastado' where id={$idmembro} and igreja_id={$igreja_id}")or die(mysqli_error($conecta));	     echo"<script language=javascript>alert('Pessoa Afastada com Sucesso!')</script>";echo "<script language=javascript>location.href='visualizarpessoa.php?ig=$igreja_id&id=$idmembro'</script>";	 ?>