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

	$_SESSION['perfil']	=$dadosperfil["descricao"];

switch($perfil) { 



case "Administrador":

$nome="Administrador";

$local="Acesso Total";
$ativa=1;
$selectigrejas = mysqli_query($conecta,"SELECT * FROM igreja where igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas=mysqli_num_rows($selectigrejas);

$selectigrejasnordeste = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=1 and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_nordeste=mysqli_num_rows($selectigrejasnordeste);

$selectpastoresnordeste = mysqli_query($conecta,"SELECT * FROM pastor where regiao_id=1") or die(mysqli_error($conecta));	
$total_pastores_nordeste=mysqli_num_rows($selectpastoresnordeste);

$selectigrejascentrooeste = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=2  and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_centro_oeste=mysqli_num_rows($selectigrejascentrooeste);


$selectpastorescentrooeste = mysqli_query($conecta,"SELECT * FROM pastor where regiao_id=2") or die(mysqli_error($conecta));	
$total_pastores_centro_oeste=mysqli_num_rows($selectpastorescentrooeste);

$selectigrejasdistritofederal = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=3  and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_distrito_federal=mysqli_num_rows($selectigrejasdistritofederal);

$selectpastoresdistritofederal = mysqli_query($conecta,"SELECT * FROM pastor where regiao_id=3") or die(mysqli_error($conecta));	
$total_pastores_distrito_federal=mysqli_num_rows($selectpastoresdistritofederal);

$selectigrejasnorte = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=4  and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_norte=mysqli_num_rows($selectigrejasnorte);

$selectpastoresnorte = mysqli_query($conecta,"SELECT * FROM pastor where regiao_id=4") or die(mysqli_error($conecta));	
$total_pastores_norte=mysqli_num_rows($selectpastoresnorte);

$selectigrejassudeste = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=5 and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_sudeste=mysqli_num_rows($selectigrejassudeste);

$selectpastoressudeste = mysqli_query($conecta,"SELECT * FROM pastor where regiao_id=5") or die(mysqli_error($conecta));	
$total_pastores_sudeste=mysqli_num_rows($selectpastoressudeste);

$selectigrejassul = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=6  and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_sul=mysqli_num_rows($selectigrejassul);

$selectpastoressul = mysqli_query($conecta,"SELECT * FROM pastor where regiao_id=6") or die(mysqli_error($conecta));	
$total_pastores_sul=mysqli_num_rows($selectpastoressul);


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



$sqlAC = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=1") or die(mysqli_error($conecta));
$sqlAL = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=2") or die(mysqli_error($conecta));
$sqlAP = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=3") or die(mysqli_error($conecta));
$sqlAM = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=4") or die(mysqli_error($conecta));
$sqlBA = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=5") or die(mysqli_error($conecta));
$sqlCE = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=6") or die(mysqli_error($conecta));
$sqlDF = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=7") or die(mysqli_error($conecta));
$sqlES = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=8") or die(mysqli_error($conecta));
$sqlGO = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=9") or die(mysqli_error($conecta));
$sqlMA = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=10") or die(mysqli_error($conecta));
$sqlMT = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=11") or die(mysqli_error($conecta));
$sqlMS = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=12") or die(mysqli_error($conecta));
$sqlMG = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=13") or die(mysqli_error($conecta));
$sqlPA = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=14") or die(mysqli_error($conecta));
$sqlPB = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=15") or die(mysqli_error($conecta));
$sqlPR = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=16") or die(mysqli_error($conecta));
$sqlPE = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=17") or die(mysqli_error($conecta));
$sqlPI = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=18") or die(mysqli_error($conecta));
$sqlRJ = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=19") or die(mysqli_error($conecta));
$sqlRN = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=20") or die(mysqli_error($conecta));
$sqlRS = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=21") or die(mysqli_error($conecta));
$sqlRO = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=22") or die(mysqli_error($conecta));
$sqlRR = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=23") or die(mysqli_error($conecta));
$sqlSC = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=24") or die(mysqli_error($conecta));
$sqlSP  = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=25") or die(mysqli_error($conecta));
$sqlSE = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=26") or die(mysqli_error($conecta));
$sqlTO = mysqli_query($conecta,"SELECT count(i.id) as total from igreja i where i.estado_id=27") or die(mysqli_error($conecta));

$AC = mysqli_fetch_array($sqlAC);
$AL = mysqli_fetch_array($sqlAL);
$AP = mysqli_fetch_array($sqlAP);
$AM = mysqli_fetch_array($sqlAM);
$BA = mysqli_fetch_array($sqlBA);
$CE = mysqli_fetch_array($sqlCE);
$DF = mysqli_fetch_array($sqlDF);
$ES = mysqli_fetch_array($sqlES);
$GO = mysqli_fetch_array($sqlGO);
$MA = mysqli_fetch_array($sqlMA);
$MT = mysqli_fetch_array($sqlMT);
$MS = mysqli_fetch_array($sqlMS);
$MG = mysqli_fetch_array($sqlMG);
$PA = mysqli_fetch_array($sqlPA);
$PB = mysqli_fetch_array($sqlPB);
$PR = mysqli_fetch_array($sqlPR);
$PE = mysqli_fetch_array($sqlPE);
$PI = mysqli_fetch_array($sqlPI);
$RJ = mysqli_fetch_array($sqlRJ);
$RN = mysqli_fetch_array($sqlRN);
$RS = mysqli_fetch_array($sqlRS);
$RO = mysqli_fetch_array($sqlRO);
$RR = mysqli_fetch_array($sqlRR);
$SC = mysqli_fetch_array($sqlSC);
$SP  = mysqli_fetch_array($sqlSP);
$SE = mysqli_fetch_array($sqlSE);
$TO = mysqli_fetch_array($sqlTO);


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


$selectcadastros = mysqli_query($conecta,"SELECT * FROM pessoa where status='ativo' and igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_cadastros=mysqli_num_rows($selectcadastros);

$selectcadastrosdesatualizados = mysqli_query($conecta,"SELECT * FROM pessoa where data_modificacao='' and status='ativo' and igreja_id={$igreja_id}") or die(mysqli_error($conecta));	
$total_cadastros_desatualizados=mysqli_num_rows($selectcadastrosdesatualizados);
$selectpessoasdesatualizadas = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=1 and status='ativo'  and data_modificacao=''") or die(mysqli_error($conecta));	
$total_membrosdesatualizadas=mysqli_num_rows($selectpessoasdesatualizadas);
$selectcriancasqtddesatualizados = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id={$igreja_id} and funcao='".utf8_decode("Criança")."' and membro=0 and status='ativo'  and data_modificacao='' ") or die(mysqli_error($conecta));	
$total_criancasdesatualizados=mysqli_num_rows($selectcriancasqtddesatualizados);
$selectnovoconvertidodesatualizados = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=0 and funcao='Novo Convertido' and status='ativo' and data_modificacao=''") or die(mysqli_error($conecta));	
$total_novos_convertidosdesatualizados=mysqli_num_rows($selectnovoconvertidodesatualizados);
$selectcongregadosdesatualizados = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=0 and funcao='Congregado' and status='ativo' and data_modificacao=''") or die(mysqli_error($conecta));	
$total_congregadosdesatualizados=mysqli_num_rows($selectcongregadosdesatualizados);


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

$total_afastados=0;
$selectafastadosqtd = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and funcao='Afastado' and status='ativo'") or die(mysqli_error($conecta));	
$total_afastados=mysqli_num_rows($selectafastadosqtd);

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

$porcentagemdesatualizados = ($total_cadastros_desatualizados/$total_cadastros)*100;

break;

case "Financeiro Local":

$selectfinanceiro = mysqli_query($conecta,"SELECT * FROM setorfinanceiro WHERE usuario_id=".$id)or die(mysqli_error($conecta));

$dadosfinanceiro = mysqli_fetch_array($selectfinanceiro);

$financeiro_id=$dadosfinanceiro["id"];

$pessoa_id=$dadosfinanceiro["membro_id"];

$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE status='ativo' and id=".$pessoa_id)or die(mysqli_error($conecta));

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
$total_afastados=0;
$selectafastadosqtd = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and funcao='Afastado' and status='ativo'") or die(mysqli_error($conecta));	
$total_afastados=mysqli_num_rows($selectafastadosqtd);




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
$total_afastados=0;
$selectafastadosqtd = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and funcao='".utf8_decode("Afastado")."' and status='ativo'") or die(mysqli_error($conecta));	
$total_afastados=mysqli_num_rows($selectafastadosqtd);


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
if($dadospastor["tipo"]=="Bispo"){
    
    $cargo="Bispo";
}else{
    
    $cargo="Pastor ".$dadospastor["tipo"];
}
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
$entradas_mes_distrito = 0;
$entradas_mes_fundoministerial = 0;
$selectpastor = mysqli_query($conecta,"SELECT * FROM pastor WHERE usuario_id=".$id)or die(mysqli_error($conecta));

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
$selectpastores = mysqli_query($conecta	,"SELECT * FROM pastor INNER JOIN pessoa p ON pastor.membro_id = p.id and status='ativo' and p.regiao_id=".$regiao_id) or die(mysqli_error($conecta));			
$selectcongregacoes = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=$regiao_id and igreja_id IS NOT NULL") or die(mysqli_error($conecta));
$total_congregacoes=mysqli_num_rows($selectcongregacoes);
$total_pastor=mysqli_num_rows($selectpastores);
$selectevangelistas = mysqli_query($conecta	,"SELECT * FROM evangelista INNER JOIN pessoa p ON evangelista.membro_id = p.id and status='ativo' and p.regiao_id=".$regiao_id) or die(mysqli_error($conecta));
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

			
    $nomeUsuario=$dadospessoa["nome"]." ".$dadospessoa["sobrenome"];
    $partes = explode(' ', $nomeUsuario);
    $primeiroNome = array_shift($partes);
    $ultimoNome = array_pop($partes);
    $funcao=$cargo;
    
?>




<!doctype html>
<html lang="en" class="light-theme">
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
        <!--plugins-->
        <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
        <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
        <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
        <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
        <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
        <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
        <link href="assets/css/icons.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
          <link href="assets/plugins/fullcalendar/css/main.min.css" rel="stylesheet" />
        <!-- loader-->
        <link href="assets/css/pace.min.css" rel="stylesheet" />
        
        <!--Theme Styles-->
        <link href="assets/css/dark-theme.css" rel="stylesheet" />
        <link href="assets/css/light-theme.css" rel="stylesheet" />
        <link href="assets/css/semi-dark.css" rel="stylesheet" />
        <link href="assets/css/header-colors.css" rel="stylesheet" />
          <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
          
        <title>SGE - Sistema de Gestão Estratégica - Igreja de Deus no Brasil</title>
            <!-- Bootstrap bundle JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!--plugins-->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
       
        <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
         <style>
    #svg-map path { fill:#c7c9c9 }
    #svg-map  .active { fill:#0094d9 }
    #svg-map text { fill:#fff; font:12px Arial-BoldMT, sans-serif; cursor:pointer }
    #svg-map a{ text-decoration:none }
  
    #svg-map a:hover { cursor:pointer; text-decoration:none }
    #svg-map a:hover path{ fill:#003399 !important }
    #svg-map .circle { fill:#66ccff }
   
    #svg-map a:hover .circle { fill:#003399 !important; cursor:pointer }
  </style>
    </head>
    
