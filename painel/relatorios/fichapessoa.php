<?php

session_start();
$igreja_id=$_GET["ig"];
 $idmembro=$_GET["id"];


include("../conexao/conecta.php");

include("../func.php");

$ano=date("Y");

$mes=date("m");

$MM_authorizedUsers = "";

$MM_donotCheckaccess = "true";



// *** Restrict Access To Page: Grant or deny access to this page

function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 

  // For security, start by assuming the visitor is NOT authorized. 

  $isValid = False; 



  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 

  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 

  if (!empty($UserName)) { 

    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 

    // Parse the strings into arrays. 

    $arrUsers = Explode(",", $strUsers); 

    $arrGroups = Explode(",", $strGroups); 

    if (in_array($UserName, $arrUsers)) { 

      $isValid = true; 

    } 

    // Or, you may restrict access to only certain users based on their username. 

    if (in_array($UserGroup, $arrGroups)) { 

      $isValid = true; 

    } 

    if (($strUsers == "") && true) { 

      $isValid = true; 

    } 

  } 

  return $isValid; 

}



$MM_restrictGoTo = "login.php";

if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   

  $MM_qsChar = "?";

  $MM_referrer = $_SERVER['PHP_SELF'];

  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";

  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 

  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];

  

  function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)

		{

		$lmin = 'abcdefghijklmnopqrstuvwxyz';

		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

		$num = '1234567890';

		$simb = '!@#$%*-';

		$retorno = '';

		$caracteres = '';



		$caracteres .= $lmin;

		if ($maiusculas) $caracteres .= $lmai;

		if ($numeros) $caracteres .= $num;

		if ($simbolos) $caracteres .= $simb;



		$len = strlen($caracteres);

		for ($n = 1; $n <= $tamanho; $n++) {

		$rand = mt_rand(1, $len);

		$retorno .= $caracteres[$rand-1];

		}

		return $retorno;

		}

	

	

	

	//

	$chave = geraSenha(40, true, false);


	

  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . $chave;

  header("Location: ". $MM_restrictGoTo); 

  exit;

}




$sql=mysqli_query($conecta,"select * from pessoa where id=$idmembro and igreja_id=$igreja_id");

$ver=mysqli_fetch_array($sql);

$sql1=mysqli_query($conecta,"select * from igreja where id=$igreja_id");

$ver1=mysqli_fetch_array($sql1);

$selectestadopessoa = mysqli_query($conecta,"SELECT * FROM estado WHERE id=$ver[estado]")or die(mysqli_error($conecta));

$dadosestadopessoa = mysqli_fetch_array($selectestadopessoa);

$estado_nome_pessoa=$dadosestadopessoa["descricao"];

$selectestadoigreja = mysqli_query($conecta,"SELECT * FROM estado WHERE id=$ver1[estado_id]")or die(mysqli_error($conecta));

$dadosestadoigreja = mysqli_fetch_array($selectestadoigreja);

$estado_nome_igreja=$dadosestadoigreja["descricao"];


?>

<html lang="en">
	<head><meta charset="windows-1252">
			
		<title>Ficha do(a) Pessoa - SistemaIDB</title>
		<link rel="shortcut icon" href="/public/img/favicon.png">
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<style>
							body					{  font-family: "Lucida Sans", Geneva, Verdana, Arial, Helvetica, sans-serif; font-size:14px;}
				strong					{  display:block;}
				button					{  padding: 10px;}
				table					{  font-size:10px; width: 100%; border-collapse: collapse; border: solid 1px #bbb; }
				
				table thead tr			{ height: 30px; }	
				table thead tr th		{ padding: 5px; text-transform: uppercase; background-color: #00968a; color: white !important; font-size: 11px;}
				table thead tr td		{ padding: 5px; text-transform: uppercase; text-align: center; color: black !important; background-color: #f1f1f1;}
				table thead tr td:last-child { border-right: solid 1px #f1f1f1 }
	
				table tbody				{  width: 100%; }
				table tbody tr td		{  border: solid 1px #ddd; padding: 8px; }
				table tbody tr th		{  border: solid 1px #bbb}
				table tbody tr td.money {width: 11.5%; background: white; height: 100%}
				table tbody tr td.blue	{color: blue;}
				table tbody tr td.red	{color: red;}

				table tfoot tr td				{ color: black !important; text-align: center !important;}
				table tfoot tr td:first-child	{ background-color: #f1f1f1;}
				table tfoot tr td:last-child	{ background-color: #f9f9f9; }
				table tfoot tr td.money			{ height: 30px; }
				table tfoot tr td.money div		{ margin-left: -1px; border: none; }
				table tfoot tr td.money span	{ background: none; }
	
				table  tr td.money div  { width: 30px;  border-right: dotted 1px #DDDDDD; display: block; float: left; margin: -8px; text-align: center; color: black; line-height: 31px;}
				table  tr td.money span {  background: white; display: inline-block; float: right; text-align:right;}

				.tfooter td				{ color: black !important; text-align: center !important; }
				.tfooter td:first-child	{ background-color: #f1f1f1; }
				.tfooter td:last-child	{ background-color: #f9f9f9; }
				.tfooter td.money		{ height: 30px; background-color: #f1f1f1; }
				.tfooter td.money div	{ margin-left: -1px; border: none; }
				.tfooter td.money span	{ background-color: #f1f1f1; }

				table thead tr td, 
				table tfoot tr td, th {
					font-family: arial; font-size: 12px; font-weight: bold; padding: 2px; color: white; text-align: center; 
				}

				.bold			{ font-weight: bold}
				.uppercase		{ text-transform: uppercase}
				
				
				div#content		{ max-width: 900px; width: 100%; margin: 30px  auto; position: relative; display: block}
				
				.tac			{ text-align: center !important}
				.tar			{ text-align: right !important}
				.tal			{ text-align: left !important}
				.width50		{ width: 50px !important;}
				.width100		{ width: 100px !important;}
				.width110		{ width: 110px !important;}
				.width120		{ width: 120px !important;}
				.width130		{ width: 130px !important;}
				.width140		{ width: 140px !important;}
				.width150		{ width: 150px !important;}
				.width200		{ width: 200px !important;}
				.width250		{ width: 250px !important;}
				.width300		{ width: 300px !important;}
				.break-after	{margin-bottom: 30px; !important}
				
				h6 {padding: 5px;  margin: 0; margin-top: -22px; text-transform: uppercase; font-size: 20px; text-align: center;}
				h1 {color: #A69E91; font-size: 20px; text-align: center; text-transform: uppercase;  margin-top: 10px; font-weight: normal; }
				table.explain {width: 100%; border: none; margin-bottom: 20px;}
				table.explain tr td { width: 20%; border: none;}
				table.explain tr td.heading {text-align: right; width: 20%; font-weight: bold}
				div.clear-both	{margin-bottom: 20px; height: 20px; display: block;}

				.divDivisoria	{margin-top: 5px; border-top: 1px solid #ddd; padding-top: 5px;}
				
			   
				@media print
				{
					a { text-decoration: none; color: black;}
					body			{ font-size: 9px; margin-top: 20px; font-family: Arial, Helvetica, sans-serif}
					button			{  display: none;}
					.no-print		{  display: none;}
					
					h6 {font-size: 10px; font-style: italic; text-align: left; margin: 0px; background: none; color: #CCCCCC}
					h1 { font-size: 14px; text-transform: uppercase; margin: 0;}
					@page { width: 100%; margin-top: 0px; margin-bottom: 0px; }
															
					div#content { max-width: 2000px!important; margin: 0 auto; position: relative; display: block}
					
					table.explain { font-size: 10px; margin-top: 15px; }
					table.explain tr td { margin: 2px; padding: 3px }
					
					table {font-size: 9px; margin: 0px;}
					table tbody tr td { padding: 2px 8px;}
					table thead tr th, table thead tr td { font-size: 9px; padding: 2px;}
					table tfoot tr th, table tfoot tr td { font-size: 9px; padding: 2px; }
					@page {
				        margin: 1.5cm;
				    }
					table tbody tr td:before, table tbody tr td:after {
				        content : "" ;
				        height : 4px ;
				        display : block ;
				    }
					.quebra-pagina{
					    page-break-after: always;
					}
				} 
			
			@media print {
				table tbody tr td, table thead tr td:last-child {
					border-color: inherit;
				}

				table thead tr td, table thead tr th{
					background-color: #749dc1!important;
				}

				table thead tr th {
					color: inherit !important;
				}
			}
		</style>
		<script src="/public/js/jquery.min.js" type="text/javascript"></script>
		<script src="https://kit.fontawesome.com/ad19f5a821.js" crossorigin="anonymous"></script>
	</head>
	<body>
			<div id="content">
							<img src='../img/logo.png' style = 'float: left; max-height: 85px; max-width: 150px;' class = 'img-polaroid' >						<h6 class="tac">SISTEMA IDB</h6>			<h1>Ficha do(a) Pessoa </h1>
			
			
			
<style>
	td	{
			border-color: #000 !important;
			line-height: 10px;
		}

	td h2, td h4 { margin: 0; }
</style>

<table class="table" border="1" style='border-color: #000'>
	<tr>
		<td colspan='3' rowspan='1' height='20' class="tac">
			<h2><?php 
					echo strtoupper($ver1["nome"]);
									?> </h2>
		</td>
		<td rowspan='4' class="tac" style='width: 130px;'>
			<img src='../img/pessoas/<?php 
									if($ver["foto"]==""){
									echo "profile-pic.jpg";
									}else{
										echo $ver["foto"];
										}?>' style = 'width:80px; margin:1px;' >		</td>
	</tr>
	<tr></tr>
	<tr>
		<td colspan=3>
			<center>
									<h3><?php 
					echo mb_strtoupper(utf8_encode($ver1["logradouro"].", Nº ".$ver1["numero"]." - ".$ver1["bairro"]));
									?> </h3>
									<h3><?php 
					echo mb_strtoupper(utf8_encode($ver1["cidade"].", ".$estado_nome_igreja));
									?> </h3>
									<h3><?php 
					echo mb_strtoupper(utf8_encode("CEP: ".$ver1["cep"]." | Telefone: ".$ver1["telefone"]));
									?> </h3>
		</td></center>
			
	
	</tr>
	<tr>
	
	</tr>		
	<tr>
		<td >
			<h4 >Tipo de Pessoa</h4>
		</td>
		<td colspan=2>
			<h4>Nome</h4>
		</td>
		<td >
			<h4 >Identifica&ccedil;&atilde;o</h4>
		</td>
	</tr>
	<tr>
		<td >
			<?php 
					echo mb_strtoupper(utf8_encode($ver["funcao"]));
									?>
		</td>
		<td colspan=2>
			<?php 
					echo mb_strtoupper(utf8_encode($ver["nome"]." ".$ver["sobrenome"]));
									?>
		</td>
		<td >
	<?php 
					echo $ver["id"];
									?>
		</td>
	</tr>
	<tr>
		<td >
			<h4>Nascimento</h4>
		</td>
		<td >
			<h4>Sexo</h4>
		</td>
		<td >
			<h4>Naturalidade</h4>
		</td>
		<td >
			<h4>Nacionalidade</h4>
		</td>
	</tr>
	<tr>
		<td >
			<?php 
					echo $ver["dataNascimento"];
									?>
		</td>
		<td >
			<?php 
					echo strtoupper($ver["sexo"]);?>
		</td>
		<td >
			<?php 
					echo mb_strtoupper(utf8_encode($ver["naturalidade"]));?>
		</td>
		<td >
			<?php 
					echo mb_strtoupper(utf8_encode($ver["nacionalidade"]));?>
					
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<h4>Nome da M&atilde;e</h4>
		</td>
		<td colspan="2">
			<h4>Nome do Pai</h4>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<?php 
					echo mb_strtoupper(utf8_encode($ver["nomemae"]));?>
		</td>
		<td colspan="2">
			<?php 
					echo mb_strtoupper(utf8_encode($ver["nomepai"]));?>
		</td>
	</tr>
	<?php 
									
if($ver["ecivil"]==2) { ?>
	
	<tr>
		<td colspan="2">
			<h4>C&ocirc;njuge</h4>
		</td>
		<td colspan="2">
			<h4>Data de Casamento</h4>
		</td>
	</tr>
	<tr>
			<td colspan="2">
			<?php 
					echo mb_strtoupper(utf8_encode($ver["conjuge"]));?>
		</td>

		<td colspan="2">
			<?php 
					echo strtoupper($ver["dataCasamento"]);?>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan=4 rowspan=1 height=20 class="tac">
			<h2>Endere&ccedil;o</h2>
		</td>
	</tr>
	<tr></tr>
	<tr>
		<td>
			<h4>CEP</h4>
		</td>
		<td>
			<h4>Estado</h4>
		</td>
		<td>
			<h4>Cidade</h4>
		</td>
		<td>
			<h4>Bairro</h4>
		</td>
	</tr>
	<tr>
		<td >
			<?php 
					echo strtoupper($ver["cep"]);?>
		</td>
		<td >
			<?php 
					echo mb_strtoupper(utf8_encode($estado_nome_pessoa));?>
		</td>
		<td >
			<?php 
					echo mb_strtoupper(utf8_encode($ver["cidade"]));?>
		</td>
		<td >
			<?php 
					echo mb_strtoupper(utf8_encode($ver["bairro"]));?>
		</td>
	</tr>
	<tr>
		<td colspan=2 >
			<h4>Logradouro</h4>
		</td>
		<td colspan=2>
			<h4>N&uacute;mero</h4>
		</td>
	
	</tr>
	<tr>
		<td colspan=2 >
				<?php 
					echo mb_strtoupper(utf8_encode($ver["logradouro"]));?>
		</td>
		<td colspan=2>
						<?php 
					echo mb_strtoupper(utf8_encode($ver["numero"]));?>
		</td>
	
	</tr>
	<tr>
		<td colspan=4 rowspan=1 height=20 class="tac">
			<h2>Contato</h2>
		</td>
	</tr>
	<tr></tr>
	<tr>
		<td colspan=2 class=" tal">
			<h4>Nome</h4>
		</td>
		<td colspan=2 class=" tal">
			<h4>Email</h4>
		</td>
	</tr>
	<tr>
		<td colspan=2 class=" tal  ">
						<?php 
					echo mb_strtoupper(utf8_encode($ver["nome"]." ".$ver["sobrenome"]));
									?>
		</td>
		<td colspan=2 class="tal">
						<?php 
					echo strtoupper($ver["email"]);
									?>
		</td>
	</tr>
	<tr>
		<td height=10  class=" tal  ">
			<h4 >Celular Principal <?php
						
					if($ver["cel1wp"]==1){?>
					<i class="fas fa-phone-alt"></i>
					<i class="fas fa-sms"></i>
					<i class="fab fa-whatsapp"></i>
					<?php
						}else{?>
						<i class="fas fa-phone-alt"></i>
						<i class="fas fa-sms"></i>
						<?php
						}?>

				</h4>
		</td>
		<td height=5  class="tal">
			<h4 >Operadora</h4>
		</td>
		<td height=20  class="tal">
			<h4 >Celular secund&aacute;rio <?php
						
					if($ver["cel2wp"]==1){?>
					<i class="fas fa-phone-alt"></i>
					<i class="fas fa-sms"></i>
					<i class="fab fa-whatsapp"></i>
					<?php
						}else{?>
						<i class="fas fa-phone-alt"></i>
						<i class="fas fa-sms"></i>
						<?php
						}?></h4>
		</td>
		<td colspan=2 class="tal">
			<h4 >Operadora</h4>
		</td>
	</tr>
	<tr>
		<td class=" tal  ">
	
						<?php
						
					echo mb_strtoupper(utf8_encode($ver["celular1"]));?>
		</td>

		<td class="tal">
					<?php 
					echo mb_strtoupper(utf8_encode($ver["opercel1"]));?>
		</td>
		<td class="tal">
				<?php 
					echo mb_strtoupper(utf8_encode($ver["celular2"]));?>
		</td>
		<td class="tal">
					<?php 
					echo mb_strtoupper(utf8_encode($ver["opercel2"]));?>
		</td>
	</tr>
	<tr>
		<td  colspan=2 class=" tal  ">
			<h4 >Telefone Fixo</h4>
		</td>
		<td  colspan=2 class="tal">
			<h4>&nbsp;</h4>
		</td>
		
	</tr>

	<tr>
		<td colspan=4 rowspan=1 height=20 class="tac">
			<h2 >Informa&ccedil;&otilde;es Adicionais</h2>
		</td>
	</tr>
	<tr></tr>
	<tr>
		<td  colspan=2 class=" tal  ">
			<h4 >Estado Civil</h4>
		</td>
		<td  colspan=2 class="tal">
			<h4 >Grau de Instru&ccedil;&atilde;o</h4>
		</td>
	</tr>
	<tr>
		<td colspan="2">
					<?php 
									
switch($ver["ecivil"]) { 

case "1":
$nomeesocial="SOLTEIRO(A)";
break;
case "2":
$nomeesocial="CASADO(A)";
break;
case "3":
$nomeesocial="VIÚVO(A)";
break;
case "4":
$nomeesocial="DIVORCIADO(A)";
break;	
case "5":
$nomeesocial="SEPARADO(A)";
break;
default: 
$nomeesocial="NÃO IDENTIFICADO";
break; 
  }
echo mb_strtoupper(utf8_encode($nomeesocial));	 ?>
		</td>
		<td colspan=2 class="tal">
								<?php 
									
switch($ver["escolaridade"]) { 

case "1":
$estudo="Fundamental incompleto";
break;
case "2":
$estudo="Fundamental completo";
break;
case "3":
$estudo="Médio incompleto";
break;
case "4":
$estudo="Médio completo";
break;
case "5":
$estudo="Superior incompleto";
break;
case "6":
$estudo="Superior completo";
break;
default: 
$estudo="NÃO IDENTIFICADO";
break; 
  }
echo mb_strtoupper(utf8_encode($estudo));	 ?>
		</td>
		
	
				<tr>
			<td colspan=4 rowspan=1 height=20 class="tac">
				<h2 >Principais Ocorr&ecirc;ncias</h2>
			</td>
		</tr>
		<tr></tr>
		<tr><td>DATA DO CADASTRO</td><td>PRIMEIROS PASSOS</td><td>DATA DO BATISMO</td><td>BATISMO NO ESP&Iacute;RITO SANTO</td></tr>
		<tr>
		<td>	<?php 
					echo mb_strtoupper(utf8_encode($ver["datacadastro"]));
									?></td>
		<td>	<?php 
					echo mb_strtoupper(utf8_encode($ver["dataprimeiropassos"]));
									?></td>
		<td>	<?php 
					echo mb_strtoupper(utf8_encode($ver["data_batismo"]));
									?></td>
		<td>	<?php 
					echo mb_strtoupper(utf8_encode($ver["databatismoespiritosanto"]));
									?></td>
		</tr>
		<?php if ($ver["falecido"]==1){?>
		<tr>
		<td colspan=2><i class="fas fa-baby"></i> NASCEU</td>
		<td colspan=2><i class="fas fa-cross"></i> FALECEU</td>
		</tr>
		<tr>
		<td colspan=2><?php 
					echo $ver["dataNascimento"];
									?></td>
		<td colspan=2><?php 
					echo $ver["datafalecimento"];
									?></td></tr>
		<?php }?>
		</table>			<br />
			<center>
				<!--<button onclick="window.open('?pdf=1')">Gerar PDF</button>-->
								<button onclick="self.print();">Imprimir Relat&oacute;rio</button></center>	
		</div>
		<p class="no-print" style="width: 100%; margin: 0 auto 20px; text-align: center; font-size: 12px;">* Para salvar o relat&eacute;rio em PDF clique em <b>Imprimir Relat&oacute;rio</b>, depois em <b>Destino</b> clique em <b>Alterar</b> e escolha a op&ccedil;&atilde;o <b>Salvar como PDF</b>. Para finalizar clique <b>Salvar</b>.</p>
		<p style="width: 100%; margin: auto; text-align: center">Sistema IDB</p>
	</body>
</html>