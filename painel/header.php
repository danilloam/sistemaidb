<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

include("conexao/conecta.php");

include("func.php");

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



$datahj = date("Y-m-d");

$login = $_SESSION['MM_Username'];

$selectdados = mysqli_query($conecta,"SELECT * FROM usuario WHERE login='".$login."'")or die(mysqli_error($conecta));

$dados = mysqli_fetch_array($selectdados);

	$id=$dados["id"];

	$perfil_id=$dados["id_perfil"];

$selectperfil = mysqli_query($conecta,"SELECT * FROM perfil WHERE id=".$perfil_id)or die(mysqli_error($conecta));

$dadosperfil = mysqli_fetch_array($selectperfil);

	$id_perfil=$dadosperfil["id"];

	$perfil=$dadosperfil["descricao"];

				// Informa dados iniciais para sistema

			

switch($perfil) { 



case "Administrador":

$nome="Administrador";

$local="Acesso Total";
$ativa=1;

$selectigrejasnordeste = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=1 and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_nordeste=mysqli_num_rows($selectigrejasnordeste);

$selectigrejascentrooeste = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=2  and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_centro_oeste=mysqli_num_rows($selectigrejascentrooeste);


$selectigrejasdistritofederal = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=3  and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_distrito_federal=mysqli_num_rows($selectigrejasdistritofederal);


$selectigrejasnorte = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=4  and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_norte=mysqli_num_rows($selectigrejasnorte);


$selectigrejassudeste = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=5 and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_sudeste=mysqli_num_rows($selectigrejassudeste);


$selectigrejassul = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=6  and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_sul=mysqli_num_rows($selectigrejassul);

$selectigrejas = mysqli_query($conecta,"SELECT * FROM igreja where igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas=mysqli_num_rows($selectigrejas);

$selectcongregacoes = mysqli_query($conecta,"SELECT * FROM igreja where igreja_id is not NULL") or die(mysqli_error($conecta));	
$total_congregacoes=mysqli_num_rows($selectcongregacoes);

$selectpessoas = mysqli_query($conecta,"SELECT * FROM pessoa where membro=1 and status='ativo'") or die(mysqli_error($conecta));	
$total_membros=mysqli_num_rows($selectpessoas);

$selectpastores = mysqli_query($conecta,"SELECT * FROM pastor") or die(mysqli_error($conecta));	
$total_pastores=mysqli_num_rows($selectpastores);

$selectcongregados = mysqli_query($conecta,"SELECT * FROM pessoa where membro=0 and funcao='Congregado' and status='ativo'") or die(mysqli_error($conecta));	

$total_congregados=mysqli_num_rows($selectcongregados);
$dadospessoa["foto"]=="";
break;

case "Secretaria Local":

$selectsecretaria = mysqli_query($conecta,"SELECT * FROM secretaria WHERE usuario_id=".$id)or die(mysqli_error($conecta));

$dadossecretaria = mysqli_fetch_array($selectsecretaria);

$secretaria_id=$dadossecretaria["id"];

$pessoa_id=$dadossecretaria["membro_id"];

$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$pessoa_id)or die(mysqli_error($conecta));

$dadospessoa = mysqli_fetch_array($selectpessoa);

$nome=$dadospessoa["nome"]." ".$dadospessoa["sobrenome"];

$selectigreja = mysqli_query($conecta,"SELECT * FROM igreja WHERE secretaria_id=".$secretaria_id)or die(mysqli_error($conecta));

$dadosigreja = mysqli_fetch_array($selectigreja);

$igreja_id=$dadosigreja["id"];
$plano_igreja=$dadosigreja["plano"];

$sqlplano=mysqli_query($conecta,"select * from planos where id={$plano_igreja}");
$verplano=mysqli_fetch_array($sqlplano);
$qdt_membros=$verplano["membros"];


$selectcadastros = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_cadastros=mysqli_num_rows($selectcadastros);

$selectcadastrosdesatualizados = mysqli_query($conecta,"SELECT * FROM pessoa where data_modificacao='' and igreja_id={$igreja_id}") or die(mysqli_error($conecta));	
$total_cadastros_desatualizados=mysqli_num_rows($selectcadastrosdesatualizados);

$porcentagemdesatualizados = round($total_cadastros_desatualizados/$total_cadastros,2);


$local="da ".$dadosigreja["nome"];
$ativa=$dadosigreja["ativa"];

$estado_id=$dadosigreja["estado_id"];

$regiao_id=$dadosigreja["regiao_id"];

$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE id=".$estado_id)or die(mysqli_error($conecta));

$dadosestado= mysqli_fetch_array($selectestado);

$estado_nome=$dadosestado["descricao"];
$estadouf=$dadosestado["uf"];

$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE id=".$regiao_id)or die(mysqli_error($conecta));
$dadosregiao= mysqli_fetch_array($selectregiao);
$regiao_nome=$dadosregiao["descricao"];

$selectpessoas = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=1 and status='ativo'") or die(mysqli_error($conecta));	
$total_membros=mysqli_num_rows($selectpessoas);

$selectcongregados = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=0 and funcao='Congregado' and status='ativo'") or die(mysqli_error($conecta));	
$total_congregados=mysqli_num_rows($selectcongregados);
$selectnovoconvertido = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and funcao='Novo Convertido' and status='ativo'") or die(mysqli_error($conecta));	
$total_novos_convertidos=mysqli_num_rows($selectnovoconvertido);
$selectcriancasqtd = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id={$igreja_id} and funcao='".utf8_decode("Criança")."' and status='ativo'") or die(mysqli_error($conecta));	
$total_criancas=mysqli_num_rows($selectcriancasqtd);
$selectmasculino = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id={$igreja_id} and sexo='Masculino' and status='ativo'") or die(mysqli_error($conecta));	
$total_masculino=mysqli_num_rows($selectmasculino);
$selectfeminino = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id={$igreja_id} and sexo='Feminino' and status='ativo'") or die(mysqli_error($conecta));	
$total_feminino=mysqli_num_rows($selectfeminino);
$selectGcs = mysqli_query($conecta,"SELECT * FROM gcs where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_gcs=mysqli_num_rows($selectGcs);
$selectcongregacoes = mysqli_query($conecta,"SELECT * FROM igreja where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_congregacoes=mysqli_num_rows($selectcongregacoes);
$saude=100;

break;

case "Financeiro Local":

$selectfinanceiro = mysqli_query($conecta,"SELECT * FROM setorfinanceiro WHERE usuario_id=".$id)or die(mysqli_error($conecta));

$dadosfinanceiro = mysqli_fetch_array($selectfinanceiro);

$financeiro_id=$dadosfinanceiro["id"];

$pessoa_id=$dadosfinanceiro["membro_id"];

$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$pessoa_id)or die(mysqli_error($conecta));

$dadospessoa = mysqli_fetch_array($selectpessoa);

$nome=$dadospessoa["nome"]." ".$dadospessoa["sobrenome"];

$selectigreja = mysqli_query($conecta,"SELECT * FROM igreja WHERE financeiro_id=".$financeiro_id)or die(mysqli_error($conecta));

$dadosigreja = mysqli_fetch_array($selectigreja);

$igreja_id=$dadosigreja["id"];
$plano_igreja=$dadosigreja["plano"];

$sqlplano=mysqli_query($conecta,"select * from planos where id={$plano_igreja}");
$verplano=mysqli_fetch_array($sqlplano);
$qdt_membros=$verplano["membros"];


$selectcadastros = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_cadastros=mysqli_num_rows($selectcadastros);

$selectcadastrosdesatualizados = mysqli_query($conecta,"SELECT * FROM pessoa where data_modificacao='' and igreja_id={$igreja_id}") or die(mysqli_error($conecta));	
$total_cadastros_desatualizados=mysqli_num_rows($selectcadastrosdesatualizados);


$local="da ".$dadosigreja["nome"];
$ativa=$dadosigreja["ativa"];

$estado_id=$dadosigreja["estado_id"];

$regiao_id=$dadosigreja["regiao_id"];

$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE id=".$estado_id)or die(mysqli_error($conecta));

$dadosestado= mysqli_fetch_array($selectestado);

$estado_nome=$dadosestado["descricao"];
$estadouf=$dadosestado["uf"];

$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE id=".$regiao_id)or die(mysqli_error($conecta));
$dadosregiao= mysqli_fetch_array($selectregiao);
$regiao_nome=$dadosregiao["descricao"];

$selectpessoas = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=1 and status='ativo'") or die(mysqli_error($conecta));	
$total_membros=mysqli_num_rows($selectpessoas);

$selectcongregados = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=0 and funcao='Congregado' and status='ativo'") or die(mysqli_error($conecta));	
$total_congregados=mysqli_num_rows($selectcongregados);
$selectnovoconvertido = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and funcao='Novo Convertido' and status='ativo'") or die(mysqli_error($conecta));	
$total_novos_convertidos=mysqli_num_rows($selectnovoconvertido);
$selectcriancasqtd = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id={$igreja_id} and funcao='".utf8_decode("Criança")."' and status='ativo'") or die(mysqli_error($conecta));	
$total_criancas=mysqli_num_rows($selectcriancasqtd);
$selectmasculino = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id={$igreja_id} and sexo='Masculino' and status='ativo'") or die(mysqli_error($conecta));	
$total_masculino=mysqli_num_rows($selectmasculino);
$selectfeminino = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id={$igreja_id} and sexo='Feminino' and status='ativo'") or die(mysqli_error($conecta));	
$total_feminino=mysqli_num_rows($selectfeminino);
$selectGcs = mysqli_query($conecta,"SELECT * FROM gcs where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_gcs=mysqli_num_rows($selectGcs);
$selectcongregacoes = mysqli_query($conecta,"SELECT * FROM igreja where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_congregacoes=mysqli_num_rows($selectcongregacoes);
$saude=100;

break;
case "Pastor Local":
$total_salas_ebd=0;
$selectpastor = mysqli_query($conecta,"SELECT * FROM pastor WHERE usuario_id={$id}")or die(msqli_error($conecta));

$dadospastor = mysqli_fetch_array($selectpastor);

$pastor_id=$dadospastor["id"];

$pessoa_id=$dadospastor["membro_id"];

if($dadospastor["tipo"]=="Bispo"){
    
    $cargo="Bispo";
}else{
    
    $cargo="Pastor ".$dadospastor["tipo"];
}

$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$pessoa_id)or die(mysqli_error($conecta));

$dadospessoa = mysqli_fetch_array($selectpessoa);

$nome= mb_strtoupper($cargo." ".$dadospessoa["nome"]." ".$dadospessoa["sobrenome"], 'UTF-8');

$selectigreja = mysqli_query($conecta,"SELECT * FROM igreja WHERE pastor_id=".$pastor_id)or die(mysqli_error($conecta));

$dadosigreja = mysqli_fetch_array($selectigreja);

$igreja_id=$dadosigreja["id"];
$plano_igreja=$dadosigreja["plano"];

$sqlplano=mysqli_query($conecta,"select * from planos where id=".$plano_igreja);
$verplano=mysqli_fetch_array($sqlplano);
$qdt_membros=$verplano["membros"];

$selectcadastros = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_cadastros=mysqli_num_rows($selectcadastros);

$selectcadastrosdesatualizados = mysqli_query($conecta,"SELECT * FROM pessoa where data_modificacao='' and igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_cadastros_desatualizados=mysqli_num_rows($selectcadastrosdesatualizados);


$local="da ".$dadosigreja["nome"];
$ativa=$dadosigreja["ativa"];

$estado_id=$dadosigreja["estado_id"];

$regiao_id=$dadosigreja["regiao_id"];

$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE id=".$estado_id)or die(mysqli_error($conecta));

$dadosestado= mysqli_fetch_array($selectestado);

$estado_nome=$dadosestado["descricao"];
$estadouf=$dadosestado["uf"];

$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE id=".$regiao_id)or die(mysqli_error($conecta));
$dadosregiao= mysqli_fetch_array($selectregiao);
$regiao_nome=$dadosregiao["descricao"];
$total_membros=0;
$selectpessoas = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=1 and status='ativo'") or die(mysqli_error($conecta));	
$total_membros=mysqli_num_rows($selectpessoas);
$total_congregados=0;
$selectcongregados = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=0 and funcao='Congregado' and status='ativo'") or die(mysqli_error($conecta));	
$total_congregados=mysqli_num_rows($selectcongregados);
$total_novos_convertidos=0;
$selectnovoconvertido = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and funcao='Novo Convertido' and status='ativo'") or die(mysqli_error($conecta));	
$total_novos_convertidos=mysqli_num_rows($selectnovoconvertido);
$total_criancas=0;
$selectcriancasqtd = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and funcao='".utf8_decode("Criança")."' and status='ativo'") or die(mysqli_error($conecta));	
$total_criancas=mysqli_num_rows($selectcriancasqtd);


$selectmasculino = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and sexo='Masculino' and status='ativo'") or die(mysqli_error($conecta));	
$total_masculino=mysqli_num_rows($selectmasculino);
$selectfeminino = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and sexo='Feminino' and status='ativo'") or die(mysqli_error($conecta));	
$total_feminino=mysqli_num_rows($selectfeminino);
$selectGcs = mysqli_query($conecta,"SELECT * FROM gcs where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_gcs=mysqli_num_rows($selectGcs);
$selectcongregacoes = mysqli_query($conecta,"SELECT * FROM igreja where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_congregacoes=mysqli_num_rows($selectcongregacoes);

$selectturmaebd = mysqli_query($conecta,"SELECT * FROM ebd_turma where igreja_id=".$igreja_id." and ano=".$ano) or die(mysqli_error($conecta));	
$turma_retorno=mysqli_fetch_array($selectturmaebd);
$turma_id=$turma_retorno["id"];
if($turma_id>0){
$selectsalasebd = mysqli_query($conecta,"SELECT * FROM ebd_sala where igreja_id=".$igreja_id." and turma_id=".$turma_id) or die(mysqli_error($conecta));	
$total_salas_ebd=mysqli_num_rows($selectsalasebd);
}
$saude=100;
break;

case "Pastor Estadual":

$selectpastor = mysqli_query($conecta,"SELECT * FROM pastor WHERE usuario_id=".$id)or die(mysqli_error($conecta));

$dadospastor = mysqli_fetch_array($selectpastor);

$pastor_id=$dadospastor["id"];

$pessoa_id=$dadospastor["pessoa_id"];

$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$pessoa_id)or die(mysqli_error($conecta));

$dadospessoa = mysqli_fetch_array($selectpessoa);

$nome=$dadospastor["tipo"]." ".$dadospessoa["nome"];

$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE pastor_id=".$pastor_id)or die(mysqli_error($conecta));

$dadosestado = mysqli_fetch_array($selectestado);

$estado_id=$dadosestado["id"];

$local="do estado de ".$dadosestado["descricao"];

break;

case "Pastor Regional":

$selectpastor = mysqli_query($conecta,"SELECT * FROM pastor WHERE usuario_id=".$id)or die(mysqli_error($conecta));

$dadospastor = mysqli_fetch_array($selectpastor);

$pastor_id=$dadospastor["id"];

$pessoa_id=$dadospastor["membro_id"];


$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$pessoa_id)or die(mysqli_error($conecta));

$dadospessoa = mysqli_fetch_array($selectpessoa);

$igreja_id=$dadospessoa["igreja_id"];

$nome=$dadospastor["tipo"]." ".$dadospessoa["nome"]." ".$dadospessoa["sobrenome"];

$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE pastor_id=".$pastor_id)or die(mysqli_error($conecta));

$dadosregiao = mysqli_fetch_array($selectregiao);

$regiao_id=$dadosregiao["id"];

$local="da ".utf8_encode($dadosregiao["descricao"]);

$selectpagamentos = mysqli_query($conecta,"SELECT * FROM pagamentos WHERE regiao_id=".$regiao_id." and status='VERIFICAR' ORDER BY id ASC")or die(mysqli_error($conecta));

$pagamentos_pendentes=mysqli_num_rows($selectpagamentos);

$selectigrejas = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=$regiao_id and igreja_id IS NULL")or die(mysqli_error($conecta));
$total_igrejas=mysqli_num_rows($selectigrejas);
$selectpastores = mysqli_query($conecta	,"SELECT * FROM pastor where regiao_id=".$regiao_id) or die(mysqli_error($conecta));			
$selectcongregacoes = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=$regiao_id and igreja_id IS NOT NULL") or die(mysqli_error($conecta));
$total_congregacoes=mysqli_num_rows($selectcongregacoes);
$total_pastor=mysqli_num_rows($selectpastores);
$selectevangelistas = mysqli_query($conecta	,"SELECT * FROM evangelista where regiao_id=".$regiao_id) or die(mysqli_error($conecta));
$total_evangelista=mysqli_num_rows($selectevangelistas);
$selectpessoas = mysqli_query($conecta,"SELECT * FROM pessoa where regiao_id=".$regiao_id." and membro=1 and status='ativo'") or die(mysqli_error($conecta));	
$total_membros=mysqli_num_rows($selectpessoas);

$selectcongregados = mysqli_query($conecta,"SELECT * FROM pessoa where regiao_id=".$regiao_id." and membro=0 and funcao='Congregado' and status='ativo'") or die(mysqli_error($conecta));	
$total_congregados=mysqli_num_rows($selectcongregados);

$ativa=1;

break;

case "Secretaria Regional":

$selectsecretaria = mysqli_query($conecta,"SELECT * FROM secretaria WHERE usuario_id=".$id)or die(mysqli_error($conecta));

$dadossecretaria = mysqli_fetch_array($selectsecretaria);

$secretaria_id=$dadossecretaria["id"];

$pessoa_id=$dadossecretaria["pessoa_id"];

$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$pessoa_id)or die(mysqli_error($conecta));

$dadospessoa = mysqli_fetch_array($selectpessoa);

$nome=$dadospessoa["nome"]." ".$dadospessoa["sobrenome"];

$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE secretaria_id=".$secretaria_id)or die(mysqli_error($conecta));

$dadosregiao = mysqli_fetch_array($selectregiao);

$regiao_id=$dadosregiao["id"];

$local="da ".$dadosregiao["descricao"];

$selectigrejas = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=".$regiao_id) or die(mysql_error());

$selectpastores = mysqli_query($conecta,"SELECT * FROM pastor where regiao_id=".$regiao_id) or die(mysql_error());			

$total_igrejas=mysqli_num_rows($selectigrejas);

$total_pastor=mysqli_num_rows($selectpastores);

break;

case "Lider":

$selectlider = mysqli_query($conecta,"SELECT * FROM lider WHERE usuario_id=".$id)or die(mysqli_error($conecta));

$dadoslider = mysqli_fetch_array($selectlider);
$lider_id=$dadoslider["id"];
$pessoa_id=$dadoslider["pessoa_id"];
$igreja_id=$dadoslider["igreja_id"];
$max_idade=$dadoslider["max_idade"];
$min_idade=$dadoslider["min_idade"];
$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$pessoa_id)or die(mysqli_error($conecta));

$dadospessoa = mysqli_fetch_array($selectpessoa);

$nome=$dadospessoa["nome"]." ".$dadospessoa["sobrenome"];

$selectigreja = mysqli_query($conecta,"SELECT * FROM igreja WHERE id=".$igreja_id)or die(mysqli_error($conecta));

$dadosigreja = mysqli_fetch_array($selectigreja);
$plano_igreja=$dadosigreja["plano"];
$igreja_id=$dadosigreja["id"];

$local="da ".$dadosigreja["nome"];
$ativa=$dadosigreja["ativa"];

$estado_id=$dadosigreja["estado_id"];

$regiao_id=$dadosigreja["regiao_id"];

$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE id=".$estado_id)or die(mysqli_error($conecta));

$dadosestado= mysqli_fetch_array($selectestado);
$estadouf=$dadosestado["uf"];
$estado_nome=$dadosestado["descricao"];

$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE id=".$regiao_id)or die(mysqli_error($conecta));

$dadosregiao= mysqli_fetch_array($selectregiao);

$regiao_nome=$dadosregiao["descricao"];



$sqlplano=mysqli_query($conecta,"select * from planos where id={$plano_igreja}");
$verplano=mysqli_fetch_array($sqlplano);
$qdt_membros=$verplano["membros"];


$selectcadastros = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_cadastros=mysqli_num_rows($selectcadastros);

$selectpessoas = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=1 and status='ativo'") or die(mysqli_error($conecta));	

$total_membros=mysqli_num_rows($selectpessoas);
$selectcongregados = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=0 and funcao='congregado' and status='ativo'") or die(mysqli_error($conecta));	

$total_congregados=mysqli_num_rows($selectcongregados);
$selectcriancas = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=0 and funcao='criança' and status='ativo'") or die(mysqli_error($conecta));	
$total_criancas=mysqli_num_rows($selectcriancas);
$selectGcs = mysqli_query($conecta,"SELECT * FROM gcs where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_gcs=mysqli_num_rows($selectGcs);
$selectcongregacoes = mysqli_query($conecta,"SELECT * FROM igreja where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_congregacoes=mysqli_num_rows($selectcongregacoes);




$membrosbusca_lideres = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=$igreja_id ORDER BY nome ASC") or die(mysqli_error($conecta));
$total_membros_lideres=0;;
$total_congregados_lideres=0;
$total_novos_convertidos_lideres=0;
$total_cadastros_desatualizados_lideres=0;
$total_afastados_lideres=0;
while($resultadomembros_lideres = mysqli_fetch_assoc($membrosbusca_lideres)){
$idade_lideres= (int)date("Y")-(int)substr($resultadomembros_lideres['dataNascimento'],-4);

            
if($min_idade==0 && $max_idade==0){
if(($dadoslider["sexo"]=="Masculino")&& ($resultadomembros_lideres['sexo']=="Masculino")){
 if(($resultadomembros_lideres['funcao']=="Afastado")&&($resultadomembros_lideres['status']=="ativo")){$total_afastados_lideres=$total_afastados_lideres+1;}
if(($resultadomembros_lideres['membro']==1)&&($resultadomembros_lideres['status']=="ativo")){$total_membros_lideres=$total_membros_lideres+1;}
if(($resultadomembros_lideres['membro']==0)&&($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['funcao']=="Congregado")){$total_congregados_lideres=$total_congregados_lideres+1;}
if(($resultadomembros_lideres['funcao']=="Novo Convertido")&&($resultadomembros_lideres['status']=="ativo")){$total_novoconvertido_lideres=$total_novoconvertido_lideres+1;}
if(($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['data_modificacao']=="")){$total_cadastros_desatualizados_lideres=$total_cadastros_desatualizados_lideres+1;}
  
}else if(($dadoslider["sexo"]=="Feminino")&& ($resultadomembros_lideres['sexo']=="Feminino")){
  if(($resultadomembros_lideres['funcao']=="Afastado")&&($resultadomembros_lideres['status']=="ativo")){$total_afastados_lideres=$total_afastados_lideres+1;}
if(($resultadomembros_lideres['membro']==1)&&($resultadomembros_lideres['status']=="ativo")){$total_membros_lideres=$total_membros_lideres+1;}
if(($resultadomembros_lideres['membro']==0)&&($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['funcao']=="Congregado")){$total_congregados_lideres=$total_congregados_lideres+1;}
if(($resultadomembros_lideres['funcao']=="Novo Convertido")&&($resultadomembros_lideres['status']=="ativo")){$total_novoconvertido_lideres=$total_novoconvertido_lideres+1;}
if(($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['data_modificacao']=="")){$total_cadastros_desatualizados_lideres=$total_cadastros_desatualizados_lideres+1;}
                  
}else if($dadoslider["sexo"]=="Ambos"){
if(($dadoslider['novoconvertido']==1) && ($resultadomembros_lideres['funcao']=="Novo Convertido")){ 
 if(($resultadomembros_lideres['funcao']=="Afastado")&&($resultadomembros_lideres['status']=="ativo")){$total_afastados_lideres=$total_afastados_lideres+1;}
if(($resultadomembros_lideres['membro']==1)&&($resultadomembros_lideres['status']=="ativo")){$total_membros_lideres=$total_membros_lideres+1;}
if(($resultadomembros_lideres['membro']==0)&&($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['funcao']=="Congregado")){$total_congregados_lideres=$total_congregados_lideres+1;}
if(($resultadomembros_lideres['funcao']=="Novo Convertido")&&($resultadomembros_lideres['status']=="ativo")){$total_novoconvertido_lideres=$total_novoconvertido_lideres+1;}
if(($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['data_modificacao']=="")&&($resultadomembros_lideres['funcao']=="Novo Convertido")){$total_cadastros_desatualizados_lideres=$total_cadastros_desatualizados_lideres+1;}    
                
}
else{
 if(($resultadomembros_lideres['funcao']=="Afastado")&&($resultadomembros_lideres['status']=="ativo")){$total_afastados_lideres=$total_afastados_lideres+1;}
if(($resultadomembros_lideres['membro']==1)&&($resultadomembros_lideres['status']=="ativo")){$total_membros_lideres=$total_membros_lideres+1;}
if(($resultadomembros_lideres['membro']==0)&&($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['funcao']=="Congregado")){$total_congregados_lideres=$total_congregados_lideres+1;}
if(($resultadomembros_lideres['funcao']=="Novo Convertido")&&($resultadomembros_lideres['status']=="ativo")){$total_novoconvertido_lideres=$total_novoconvertido_lideres+1;}
if(($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['data_modificacao']=="")){$total_cadastros_desatualizados_lideres=$total_cadastros_desatualizados_lideres+1;}             
                       
}
}
}
else{
if($idade_lideres>=$min_idade && $idade_lideres<=$max_idade){
 if(($resultadomembros_lideres['funcao']=="Afastado")&&($resultadomembros_lideres['status']=="ativo")){$total_afastados_lideres=$total_afastados_lideres+1;}
if(($resultadomembros_lideres['membro']==1)&&($resultadomembros_lideres['status']=="ativo")){$total_membros_lideres=$total_membros_lideres+1;}
if(($resultadomembros_lideres['membro']==0)&&($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['funcao']=="Congregado")){$total_congregados_lideres=$total_congregados_lideres+1;}
if(($resultadomembros_lideres['funcao']=="Novo Convertido")&&($resultadomembros_lideres['status']=="ativo")){$total_novoconvertido_lideres=$total_novoconvertido_lideres+1;}
if(($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['data_modificacao']=="")){$total_cadastros_desatualizados_lideres=$total_cadastros_desatualizados_lideres+1;}
}
}
}




























break;






// Agora definiremos o default, que será a pagina que será aberta quando não houver um valor para o $id 

default: 

$nome="N&atilde;o Identificado";

$local="N&atilde;o Identificado";

break; 
		
}

			

?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">





<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title> Sistema de Gest&atilde;o | Igreja de Deus</title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all" />

	<link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="all" />

   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />

	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"  media="all"/>

	<link href="css/style.css" rel="stylesheet" media="all" />

	<link href="css/style_responsive.css" rel="stylesheet" media="all" />

	<link href="css/style_default.css" rel="stylesheet" id="style_color"  media="all"/>

	<link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css"  media="all"/>

	<link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon">

	<link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet"  media="all"/>

	<link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css"  media="all" />





</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="fixed-top">

	<!-- BEGIN HEADER -->

	<div id="header" class="navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container-fluid">

				<!-- BEGIN LOGO -->

				<a class="brand" href="index.php">

				    <img src="img/logo_branca.png" alt="Igreja de Deus no Brasil" />

				</a>

				<!-- END LOGO -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->

				<a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="arrow"></span>

				</a>

				<!-- END RESPONSIVE MENU TOGGLER -->

				<div id="top_menu" class="nav notify-row">

                    <!-- BEGIN NOTIFICATION -->

					<ul class="nav top-menu">

                        <!-- BEGIN INBOX DROPDOWN -->

                        <li class="dropdown" id="header_inbox_bar">

                        	<?php 

                            $sql=mysqli_query($conecta,"select * from msg where para='".$login."' and status='unread'")or die(mysqli_error($conecta));

							$total=mysqli_num_rows($sql);

                             ?>

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <i class="icon-envelope-alt"></i>

                                <span class="badge badge-important"><?php echo $total; ?></span>

                            </a>

                            

                            <ul class="dropdown-menu extended inbox">

                                <li>

                                    <p>Você tem <?php echo $total; ?> Novas Mensagens</p>

                                </li>

                                <?php 

                                while($ver=mysqli_fetch_array($sql)){

                                 ?>

                                <li>

                                    <a href="#">

                                        <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>

									<span class="subject">

									<span class="from"><?php echo $ver["de"]; ?></span>

									<span class="time">ás <?php echo date("H:i:s", $ver["data"]);?></span>

									</span>

									<span class="message">

									    <?php echo $ver["texto"]; ?>

									</span>

                                    </a>

                                </li>

                                <?php } ?>

                                <li>

                                    <a href="index.php?view=pm">Ver Todas as Mensagens</a>

                                </li>

                            </ul>

                        </li>

                        <!-- END INBOX DROPDOWN -->

						<!-- BEGIN NOTIFICATION DROPDOWN -->

						<li class="dropdown" id="header_notification_bar">

							<?php 

                            $sql2=mysqli_query($conecta,"select * from msg where status='unread' and situacao='importante' OR situacao='informativo' OR situacao='atualizacao' OR situacao='error'and para='".$login."' and status='unread'")or die(mysqli_error($conecta));

							$total2=mysqli_num_rows($sql2);

                             ?>

							<a href="#" class="dropdown-toggle" data-toggle="dropdown">



							<i class="icon-bell-alt"></i>

							<span class="badge badge-warning"><?php echo $total2; ?></span>

							</a>

							<ul class="dropdown-menu extended notification">

								<li>

									<p>Você tem <?php echo $total2; ?> Novas Notificações</p>

								</li>

								<?php 

                                while($ver=mysqli_fetch_array($sql2)){

                                 ?>

								<li>

									<a href="#">

									<?php 

									$situacao=$ver["situacao"];

									if($situacao=="importante"){

									echo "<span class='label label-important'><i class='icon-bolt'></i></span>";

									}

									if($situacao=="informativo"){

									echo "<span class='label label-info'><i class='icon-bullhorn'></i></span>";

									}

									if($situacao=="atualizacao"){

									echo "<span class='label label-success'><i class='icon-plus'></i></span>";

									}

									if($situacao=="error"){

									echo "<span class='label label-warning'><i class='icon-bell'></i></span>";

									}

									 ?>

									<?php echo $ver["assunto"]; ?>

									<span class="small italic">ás <?php echo date("H:i:s", $ver["data"]);?></span>

									</a>

								</li>

								<?php } ?>



								<li>

									<a href="index.php?view=pm">Ver Todas Notificações</a>

								</li>

							</ul>

						</li>

						<!-- END NOTIFICATION DROPDOWN -->



					</ul>

                </div>

                    <!-- END  NOTIFICATION -->

                <div class="top-nav ">

                    <ul class="nav pull-right top-menu" >

                        <!-- BEGIN SUPPORT -->

      



                        <!-- END SUPPORT -->

						<!-- BEGIN USER LOGIN DROPDOWN -->

						<li class="dropdown">

							<a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <img src="img/pessoas/<?php  if($dadospessoa["foto"]==""){
                                
                               echo "profile-pic.jpg";
                            }else{
                                echo $dadospessoa["foto"];
                            
                            }; ?>" alt="" class="img-circle" height="45" width="45">

                                <span class="username"><?php echo utf8_encode($nome); ?></span>

							<b class="caret"></b>

							</a>

							<ul class="dropdown-menu">

</br>	

                                                               <li> <center><img src="img/pessoas/<?php if($dadospessoa["foto"]==""){
                                
                               echo "profile-pic.jpg";
                            }else{
                                echo $dadospessoa["foto"];
                            
                            };  ?>" alt="" class="img-circle" height="120" width="120"></center></li>

</br>								
<?php if($perfil !="Adminstrador"){ ?>
<li><a href="visualizarpessoa.php?ig=<?php echo $igreja_id;?>&id=<?php echo $pessoa_id; ?>" class="various" data-fancybox-type="iframe"><i class="icon-user"></i> Editar Dados</a></li>
<?php } ?>
								<li><a href="editar-senha.php"><i class="icon-key"></i> Alterar Senha</a></li>

								<li class="divider"></li>

								<li><a href="logout.php"><i class="icon-off"></i> Sair</a></li>

							</ul>

						</li>

						<!-- END USER LOGIN DROPDOWN -->

					</ul>

					<!-- END TOP NAVIGATION MENU -->

				</div>

			</div>

		</div>

		<!-- END TOP NAVIGATION BAR -->

	</div>

	<!-- END HEADER -->

	<!-- BEGIN CONTAINER -->	