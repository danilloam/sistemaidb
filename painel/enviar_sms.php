<?php	   include ("conexao/conecta.php");    include ("func.php");		$dia= date("d");	$mes=date("m");	$membros1busca = mysqli_query($conecta,"SELECT * FROM pessoa where status='ativo' and dataNascimento LIKE '%".$dia."/".$mes."/%' ORDER BY nome asc");	while($resultadomembros1 = mysqli_fetch_array($membros1busca)){    $membro=utf8_encode($resultadomembros1["nome"]);    $telefone=deixarNumero($resultadomembros1["celular1"]);    $key=$resultadomembros1["id"];    $igreja_id= $resultadomembros1["igreja_id"];    $sqligreja=mysqli_query($conecta,"select * from igreja where id=$igreja_id");	$verigreja=mysqli_fetch_array($sqligreja);	$mensagem_igreja= utf8_encode($verigreja["mensagem"]);    $nova_string= "Olá ".$membro." ".$mensagem_igreja;         $mensagem=$nova_string;$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', ' ');$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', ' ');$msgEncoded = str_replace($comAcentos, $semAcentos, $mensagem); 	enviar_sms($msgEncoded,$telefone,$key);}?>