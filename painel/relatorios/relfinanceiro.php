<?php 
date_default_timezone_set('America/Sao_Paulo');
session_start();

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



$MM_restrictGoTo = "../login.php";

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


$regiao_id=$_GET["r"];
$estado_id=$_GET["e"];
$mes=$_GET["m"];
$ano=$_GET["a"];







switch($mes) { 







    case 1:



        $mes_nome="JANEIRO";



        break;



    case 2:



        $mes_nome="FEVEREIRO";



        break;



    case 3:



        $mes_nome="MARÇO";



        break;



    case 4:



        $mes_nome="ABRIL";



        break;



    case 5:



        $mes_nome="MAIO";



        break;



    case 6:



        $mes_nome="JUNHO";



        break;



    case 7:



        $mes_nome="JULHO";



        break;



    case 8:



        $mes_nome="AGOSTO";



        break;



    case 9:



        $mes_nome="SETEMBRO";



        break;



    case 10:



        $mes_nome="OUTUBRO";



        break;



    case 11:



        $mes_nome="NOVEMBRO";



        break;



            case 12:



        $mes_nome="DEZEMBRO";



        break;



}

$mes_referencia=$ano."-".$mes;

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
      <meta name="author" content="Eleve Comunicações" />
    <style type="text/css">
      html { font-family:Calibri, Arial, Helvetica, sans-serif; font-size:11pt; background-color:white }
      a.comment-indicator:hover + div.comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em }
      a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em }
      div.comment { display:none }
      table { border-collapse:collapse; page-break-after:always }
      .gridlines td { border:1px dotted black }
      .gridlines th { border:1px dotted black }
      .b { text-align:center }
      .e { text-align:center }
      .f { text-align:right }
      .inlineStr { text-align:left }
      .n { text-align:right }
      .s { text-align:left }
      td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style1 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style1 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style2 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:#FFFF00 }
      th.style2 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:#FFFF00 }
      td.style3 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style3 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style4 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style4 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style5 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Aharoni'; font-size:14pt; background-color:#CCFFCC }
      th.style5 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Aharoni'; font-size:14pt; background-color:#CCFFCC }
      td.style6 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0000FF; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      th.style6 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0000FF; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      td.style7 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      th.style7 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      td.style8 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#003366; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      th.style8 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#003366; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      td.style9 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0000FF; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      th.style9 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0000FF; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      td.style10 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      th.style10 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      td.style11 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      th.style11 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      td.style12 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:#C8C8C8 }
      th.style12 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:#C8C8C8 }
      td.style13 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      th.style13 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#CCFFCC }
      td.style14 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:#CCFFCC }
      th.style14 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:#CCFFCC }
      td.style15 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:#FFFF00 }
      th.style15 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:#FFFF00 }
      td.style16 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:#CCFFCC }
      th.style16 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:#CCFFCC }
      td.style17 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#6DFF6D }
      th.style17 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#6DFF6D }
      td.style18 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#CCFFCC }
      th.style18 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#CCFFCC }
      td.style19 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Cambria'; font-size:10pt; background-color:#FFFFFF }
      th.style19 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Cambria'; font-size:10pt; background-color:#FFFFFF }
      td.style20 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style20 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style21 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Cambria'; font-size:10pt; background-color:#FFFFFF }
      th.style21 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Cambria'; font-size:10pt; background-color:#FFFFFF }
      td.style22 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style22 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style23 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Latha'; font-size:10pt; background-color:#FFFFFF }
      th.style23 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Latha'; font-size:10pt; background-color:#FFFFFF }
      td.style24 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style24 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style25 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Cambria'; font-size:10pt; background-color:#FFFFFF }
      th.style25 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Cambria'; font-size:10pt; background-color:#FFFFFF }
      td.style26 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Cambria'; font-size:10pt; background-color:#FFFFFF }
      th.style26 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Cambria'; font-size:10pt; background-color:#FFFFFF }
      td.style27 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
      th.style27 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
      td.style28 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style28 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style29 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Latha'; font-size:10pt; background-color:#FFFFFF }
      th.style29 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Latha'; font-size:10pt; background-color:#FFFFFF }
      td.style30 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      th.style30 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      td.style31 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Cambria'; font-size:10pt; background-color:#FFFFFF }
      th.style31 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Cambria'; font-size:10pt; background-color:#FFFFFF }
      td.style32 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style32 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style33 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Latha'; font-size:9pt; background-color:#FFFFFF }
      th.style33 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Latha'; font-size:9pt; background-color:#FFFFFF }
      td.style34 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style34 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style35 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style35 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style36 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Cambria'; font-size:10pt; background-color:#FFFFFF }
      th.style36 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Cambria'; font-size:10pt; background-color:#FFFFFF }
      td.style37 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      th.style37 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      td.style38 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Latha'; font-size:7pt; background-color:#FFFFFF }
      th.style38 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Latha'; font-size:7pt; background-color:#FFFFFF }
      td.style39 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style39 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style40 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.	 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style41 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style41 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style42 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Arial'; font-size:12pt; background-color:#D8D8D8 }
      th.style42 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Arial'; font-size:12pt; background-color:#D8D8D8 }
      td.style43 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0000FF; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      th.style43 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0000FF; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      td.style44 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:8pt; background-color:#FFFF99 }
      th.style44 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:8pt; background-color:#FFFF99 }
      td.style45 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Latha'; font-size:7pt; background-color:#FFFF99 }
      th.style45 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Latha'; font-size:7pt; background-color:#FFFF99 }
      td.style46 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0000FF; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      th.style46 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0000FF; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      td.style47 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      th.style47 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      td.style48 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#008000; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      th.style48 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#008000; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      td.style49 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#008000; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      th.style49 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#008000; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      td.style50 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      th.style50 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      td.style51 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#003366; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      th.style51 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#003366; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      td.style52 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:7pt; background-color:#FFFF99 }
      th.style52 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:7pt; background-color:#FFFF99 }
      td.style53 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#008000; font-family:'Calibri'; font-size:8pt; background-color:#FFFF99 }
      th.style53 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#008000; font-family:'Calibri'; font-size:8pt; background-color:#FFFF99 }
      td.style54 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      th.style54 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      td.style55 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#003366; font-family:'Arial'; font-size:7pt; background-color:#FFFF99 }
      th.style55 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#003366; font-family:'Arial'; font-size:7pt; background-color:#FFFF99 }
      td.style56 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style56 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style57 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:#FFFF00 }
      th.style57 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:#FFFF00 }
      td.style58 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
      th.style58 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
      td.style59 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style59 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style60 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      th.style60 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      td.style61 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style61 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style62 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      th.style62 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      td.style63 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style63 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style64 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:9pt; background-color:white }
      th.style64 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:9pt; background-color:white }
      td.style65 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style65 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style66 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style66 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style67 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:8pt; background-color:#FFFF00 }
      th.style67 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:8pt; background-color:#FFFF00 }
      td.style68 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#D8D8D8 }
      th.style68 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#D8D8D8 }
      td.style69 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      th.style69 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      td.style70 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:#F7CAAC }
      th.style70 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:#F7CAAC }
      td.style71 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      th.style71 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      td.style72 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      th.style72 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      td.style73 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style73 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style74 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style74 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style75 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      th.style75 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      td.style76 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style76 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style77 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      th.style77 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      td.style78 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style78 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style79 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:#FFFF99 }
      th.style79 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:#FFFF99 }
      td.style80 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:#FFFF99 }
      th.style80 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:#FFFF99 }
      td.style81 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      th.style81 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFF99 }
      td.style82 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style82 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style83 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style83 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style84 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      th.style84 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      td.style85 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style85 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style86 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:6.5pt; background-color:white }
      th.style86 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:6.5pt; background-color:white }
      td.style87 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:6.5pt; background-color:white }
      th.style87 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:6.5pt; background-color:white }
      td.style88 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style88 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style89 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      th.style89 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      td.style90 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:7pt; background-color:white }
      th.style90 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:7pt; background-color:white }
      td.style91 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style91 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style92 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      th.style92 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      td.style93 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      th.style93 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      td.style94 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style94 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style95 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      th.style95 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      td.style96 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style96 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style97 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      th.style97 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      td.style98 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      th.style98 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      td.style99 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      th.style99 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      td.style100 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style100 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style101 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style101 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style102 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      th.style102 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      td.style103 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style103 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style104 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      th.style104 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      td.style105 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      th.style105 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      td.style106 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
      th.style106 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
      td.style107 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
      th.style107 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
      td.style108 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style108 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style109 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      th.style109 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      td.style110 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style110 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style111 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      th.style111 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      td.style112 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style112 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style113 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      th.style113 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      td.style114 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style114 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style115 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
      th.style115 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
      td.style116 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      th.style116 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      td.style117 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style117 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style118 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      th.style118 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      td.style119 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style119 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style120 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style120 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style121 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style121 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style122 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style122 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style123 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      th.style123 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:5pt; background-color:white }
      td.style124 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      th.style124 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
      td.style125 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      th.style125 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      td.style126 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:6pt; background-color:white }
      th.style126 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:6pt; background-color:white }
      td.style127 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      th.style127 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      td.style128 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:6pt; background-color:white }
      th.style128 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial'; font-size:6pt; background-color:white }
      td.style129 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style129 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style130 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style130 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style131 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Latha'; font-size:7pt; background-color:white }
      th.style131 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Latha'; font-size:7pt; background-color:white }
      td.style132 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style132 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style133 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:6pt; background-color:white }
      th.style133 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:6pt; background-color:white }
      td.style134 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      th.style134 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:7pt; background-color:white }
      td.style135 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style135 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style136 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style136 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style137 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style137 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style138 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style138 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style139 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style139 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style140 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style140 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style141 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:10pt; background-color:white }
      th.style141 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:10pt; background-color:white }
      td.style142 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#FF0000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style142 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#FF0000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style143 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style143 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style144 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style144 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style145 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style145 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style146 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#525252; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style146 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#525252; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style147 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style147 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style148 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style148 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style149 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:11pt; background-color:white }
      th.style149 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:11pt; background-color:white }
      td.style150 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:11pt; background-color:#FFFF00 }
      th.style150 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:11pt; background-color:#FFFF00 }
      td.style151 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style151 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style152 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style152 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style153 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style153 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style154 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style154 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style155 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style155 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style156 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style156 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style157 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style157 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style158 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#525252; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style158 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#525252; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style159 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style159 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style160 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style160 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style161 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style161 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style162 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#6DFF6D }
      th.style162 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#6DFF6D }
      td.style163 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style163 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style164 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:6pt; background-color:white }
      th.style164 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:6pt; background-color:white }
      td.style165 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:6pt; background-color:white }
      th.style165 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:6pt; background-color:white }
      td.style166 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:6pt; background-color:white }
      th.style166 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:6pt; background-color:white }
      td.style167 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:6pt; background-color:white }
      th.style167 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:6pt; background-color:white }
      td.style168 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:6pt; background-color:white }
      th.style168 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:6pt; background-color:white }
      td.style169 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:6pt; background-color:white }
      th.style169 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:6pt; background-color:white }
      td.style170 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style170 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style171 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
      th.style171 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
      td.style172 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style172 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style173 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style173 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style174 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      th.style174 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      td.style175 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      th.style175 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      td.style176 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style176 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style177 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      th.style177 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      td.style178 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
      th.style178 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
      td.style179 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style179 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style180 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style180 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style181 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style181 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style182 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style182 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style183 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style183 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style184 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
      th.style184 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
      td.style185 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
      th.style185 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
      td.style186 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style186 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style187 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:8pt; background-color:white }
      th.style187 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:8pt; background-color:white }
      td.style188 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style188 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style189 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style189 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style190 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style190 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style191 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style191 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style192 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style192 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style193 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      th.style193 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      td.style194 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
      th.style194 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
      td.style195 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
      th.style195 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
      td.style196 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style196 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style197 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style197 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style198 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style198 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style199 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style199 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style200 { vertical-align:middle; text-align:middle; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
      th.style200 { vertical-align:middle; text-align:middle; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
      td.style201 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#F7CAAC }
      th.style201 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#F7CAAC }
      td.style202 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#F7CAAC }
      th.style202 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#F7CAAC }
      td.style203 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#FFFF99 }
      th.style203 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#FFFF99 }
      td.style204 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#F7CAAC }
      th.style204 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#F7CAAC }
      td.style205 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:#F7CAAC }
      th.style205 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:#F7CAAC }
      td.style206 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#F7CAAC }
      th.style206 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#F7CAAC }
      td.style207 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#F7CAAC }
      th.style207 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#F7CAAC }
      td.style208 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style208 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style209 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style209 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style210 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style210 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style211 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style211 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style212 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style212 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style213 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style213 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style214 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style214 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style215 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style215 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style216 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Latha'; font-size:10pt; background-color:#FFFFFF }
      th.style216 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Latha'; font-size:10pt; background-color:#FFFFFF }
      td.style217 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Latha'; font-size:10pt; background-color:#FFFFFF }
      th.style217 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Latha'; font-size:10pt; background-color:#FFFFFF }
      td.style218 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:#FFFF00 }
      th.style218 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:#FFFF00 }
      td.style219 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style219 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style220 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style220 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style221 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style221 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style222 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style222 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style223 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style223 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style224 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style224 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style225 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style225 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style226 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style226 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style227 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style227 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style228 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style228 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      table.sheet0 col.col0 { width:143.01110947pt }
      table.sheet0 col.col1 { width:67.777777pt }
      table.sheet0 col.col2 { width:56.25555491pt }
      table.sheet0 col.col3 { width:148.43333163pt }
      table.sheet0 col.col4 { width:67.09999923pt }
      table.sheet0 col.col5 { width:59.64444376pt }
      table.sheet0 col.col6 { width:52.86666606pt }
      table.sheet0 col.col7 { width:48.79999944pt }
      table.sheet0 col.col8 { width:50.83333275pt }
      table.sheet0 col.col9 { width:54.89999937pt }
      table.sheet0 col.col10 { width:53.54444383pt }
      table.sheet0 col.col11 { width:53.54444383pt }
      table.sheet0 col.col12 { width:53.54444383pt }
      table.sheet0 col.col13 { width:48.79999944pt }
      table.sheet0 col.col14 { width:48.12222167pt }
      table.sheet0 col.col15 { width:78.62222132pt }
      table.sheet0 col.col16 { width:73.87777693pt }
      table.sheet0 col.col17 { width:53.54444383pt }
      table.sheet0 col.col18 { width:29.82222188pt }
      table.sheet0 col.col19 { width:42pt }
      table.sheet0 tr { height:15pt }
      table.sheet0 tr.row0 { height:pt }
      table.sheet0 tr.row1 { height:12.75pt }
      table.sheet0 tr.row2 { height:12pt }
      table.sheet0 tr.row3 { height:11.25pt }
      table.sheet0 tr.row4 { height:11.25pt }
      table.sheet0 tr.row5 { height:11.25pt }
      table.sheet0 tr.row6 { height:12pt }
      table.sheet0 tr.row7 { height:11.25pt }
      table.sheet0 tr.row8 { height:10.5pt }
      table.sheet0 tr.row9 { height:11.25pt }
      table.sheet0 tr.row10 { height:11.25pt }
      table.sheet0 tr.row11 { height:11.25pt }
      table.sheet0 tr.row12 { height:9.75pt }
      table.sheet0 tr.row13 { height:11.25pt }
      table.sheet0 tr.row14 { height:10.5pt }
      table.sheet0 tr.row15 { height:11.25pt }
      table.sheet0 tr.row16 { height:11.25pt }
      table.sheet0 tr.row17 { height:12pt }
      table.sheet0 tr.row18 { height:11.25pt }
      table.sheet0 tr.row19 { height:12pt }
      table.sheet0 tr.row20 { height:11.25pt }
      table.sheet0 tr.row21 { height:12.75pt }
      table.sheet0 tr.row22 { height:11.25pt }
      table.sheet0 tr.row23 { height:12pt }
      table.sheet0 tr.row24 { height:12pt }
      table.sheet0 tr.row25 { height:11.25pt }
      table.sheet0 tr.row26 { height:11.25pt }
      table.sheet0 tr.row27 { height:10.5pt }
      table.sheet0 tr.row28 { height:12pt }
      table.sheet0 tr.row29 { height:11.25pt }
      table.sheet0 tr.row30 { height:11.25pt }
      table.sheet0 tr.row31 { height:12pt }
      table.sheet0 tr.row32 { height:12pt }
      table.sheet0 tr.row33 { height:10.5pt }
      table.sheet0 tr.row34 { height:10.5pt }
      table.sheet0 tr.row35 { height:10.5pt }
      table.sheet0 tr.row36 { height:12pt }
      table.sheet0 tr.row37 { height:12pt }
      table.sheet0 tr.row38 { height:10.5pt }
      table.sheet0 tr.row39 { height:12pt }
      table.sheet0 tr.row40 { height:11.25pt }
      table.sheet0 tr.row41 { height:11.25pt }
      table.sheet0 tr.row42 { height:11.25pt }
      table.sheet0 tr.row43 { height:11.25pt }
      table.sheet0 tr.row44 { height:11.25pt }
      table.sheet0 tr.row45 { height:11.25pt }
      table.sheet0 tr.row46 { height:12pt }
      table.sheet0 tr.row47 { height:10.5pt }
      table.sheet0 tr.row48 { height:9.75pt }
      table.sheet0 tr.row49 { height:11.25pt }
      table.sheet0 tr.row50 { height:11.25pt }
      table.sheet0 tr.row51 { height:10.5pt }
      table.sheet0 tr.row52 { height:12pt }
      table.sheet0 tr.row53 { height:11.25pt }
      table.sheet0 tr.row54 { height:10.5pt }
      table.sheet0 tr.row55 { height:12pt }
      table.sheet0 tr.row56 { height:14.25pt }
      table.sheet0 tr.row57 { height:13.5pt }
      table.sheet0 tr.row58 { height:11.25pt }
      table.sheet0 tr.row59 { height:11.25pt }
      table.sheet0 tr.row60 { height:12pt }
      table.sheet0 tr.row61 { height:12pt }
      table.sheet0 tr.row62 { height:12pt }
      table.sheet0 tr.row63 { height:12pt }
      table.sheet0 tr.row64 { height:12pt }
      table.sheet0 tr.row65 { height:12pt }
      table.sheet0 tr.row66 { height:12pt }
      table.sheet0 tr.row67 { height:12pt }
      table.sheet0 tr.row68 { height:12pt }
      table.sheet0 tr.row69 { height:12pt }
      table.sheet0 tr.row70 { height:12pt }
      table.sheet0 tr.row71 { height:12pt }
      table.sheet0 tr.row72 { height:12pt }
      table.sheet0 tr.row73 { height:12pt }
      table.sheet0 tr.row74 { height:12pt }
      table.sheet0 tr.row75 { height:12pt }
      table.sheet0 tr.row76 { height:12pt }
      table.sheet0 tr.row77 { height:12pt }
      table.sheet0 tr.row78 { height:12pt }
      table.sheet0 tr.row79 { height:15pt }
      table.sheet0 tr.row80 { height:12.75pt }
      table.sheet0 tr.row81 { height:12.75pt }
      table.sheet0 tr.row82 { height:12.75pt }
      table.sheet0 tr.row83 { height:15.75pt }
      table.sheet0 tr.row84 { height:13.5pt }
      table.sheet0 tr.row85 { height:22.5pt }
      table.sheet0 tr.row86 { height:11.25pt }
      table.sheet0 tr.row87 { height:11.25pt }
      table.sheet0 tr.row88 { height:11.25pt }
      table.sheet0 tr.row89 { height:11.25pt }
      table.sheet0 tr.row90 { height:11.25pt }
      table.sheet0 tr.row91 { height:11.25pt }
      table.sheet0 tr.row92 { height:11.25pt }
      table.sheet0 tr.row93 { height:11.25pt }
      table.sheet0 tr.row94 { height:11.25pt }
      table.sheet0 tr.row95 { height:11.25pt }
      table.sheet0 tr.row96 { height:11.25pt }
      table.sheet0 tr.row97 { height:11.25pt }
      table.sheet0 tr.row98 { height:11.25pt }
      table.sheet0 tr.row99 { height:11.25pt }
      table.sheet0 tr.row100 { height:11.25pt }
      table.sheet0 tr.row101 { height:11.25pt }
      table.sheet0 tr.row102 { height:10.5pt }
      table.sheet0 tr.row103 { height:11.25pt }
      table.sheet0 tr.row104 { height:10.5pt }
      table.sheet0 tr.row105 { height:10.5pt }
      table.sheet0 tr.row106 { height:10.5pt }
      table.sheet0 tr.row107 { height:10.5pt }
      table.sheet0 tr.row108 { height:11.25pt }
      table.sheet0 tr.row109 { height:11.25pt }
      table.sheet0 tr.row110 { height:11.25pt }
      table.sheet0 tr.row111 { height:12.75pt }
      table.sheet0 tr.row112 { height:10.5pt }
      table.sheet0 tr.row113 { height:11.25pt }
      table.sheet0 tr.row114 { height:13.5pt }
      table.sheet0 tr.row115 { height:13.5pt }
      table.sheet0 tr.row116 { height:12pt }
      table.sheet0 tr.row117 { height:11.25pt }
      table.sheet0 tr.row118 { height:11.25pt }
      table.sheet0 tr.row119 { height:11.25pt }
      table.sheet0 tr.row120 { height:12.75pt }
      table.sheet0 tr.row121 { height:12pt }
      table.sheet0 tr.row122 { height:11.25pt }
      table.sheet0 tr.row123 { height:11.25pt }
      table.sheet0 tr.row124 { height:12pt }
      table.sheet0 tr.row125 { height:12pt }
      table.sheet0 tr.row126 { height:11.25pt }
      table.sheet0 tr.row127 { height:13.5pt }
      table.sheet0 tr.row128 { height:12.75pt }
      table.sheet0 tr.row129 { height:14.25pt }
      table.sheet0 tr.row130 { height:13.5pt }
      table.sheet0 tr.row131 { height:13.5pt }
      table.sheet0 tr.row132 { height:15pt }
      table.sheet0 tr.row133 { height:15pt }
      table.sheet0 tr.row134 { height:15pt }
      table.sheet0 tr.row135 { height:12pt }
      table.sheet0 tr.row136 { height:13.5pt }
      table.sheet0 tr.row137 { height:13.5pt }
      table.sheet0 tr.row138 { height:13.5pt }
      table.sheet0 tr.row139 { height:13.5pt }
      table.sheet0 tr.row140 { height:11.25pt }
      table.sheet0 tr.row141 { height:11.25pt }
      table.sheet0 tr.row142 { height:11.25pt }
      table.sheet0 tr.row143 { height:11.25pt }
      table.sheet0 tr.row144 { height:11.25pt }
      table.sheet0 tr.row145 { height:12pt }
      table.sheet0 tr.row146 { height:12pt }
      table.sheet0 tr.row147 { height:12pt }
   
   table.sheet0 th {
    width: auto;

}
table.sheet0 tr {
    width: auto;

}
table.sheet0 table td {
    width: auto;
  
}
   
    </style>
  </head>

  <body>
<style>
@page { margin-left: 0in; margin-right: 0in; margin-top: 0.78740157480315in; margin-bottom: 0.78740157480315in; }
body { margin-left: 0in; margin-right: 0in; margin-top: 0.78740157480315in; margin-bottom: 0.78740157480315in; }
</style>
    <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
        <col class="col0">
        <col class="col1">
        <col class="col2">
        <col class="col3">
        <col class="col4">
        <col class="col5">
        <col class="col6">
        <col class="col7">
        <col class="col8">
        <col class="col9">
        <col class="col10">
        <col class="col11">
        <col class="col12">
        <col class="col13">
        <col class="col14">
        <col class="col15">
        <col class="col16">
        <col class="col17">
        <col class="col18">
        <col class="col19">
        <tbody>
          <?php 
          	$estadobusca = mysqli_query($conecta,"SELECT * FROM estado where regiao_id=".$regiao_id." ORDER BY id ASC");

		while($resultadoestados = mysqli_fetch_array($estadobusca)){
       
       
       
       
          ?>  
            
          <tr class="row0">
            <td class="column0 style1 null"></td>
            <td class="column1 style2 e">RELATÓRIO  </td>
            <td class="column2 style2 e">  POR </td>
            <td class="column3 style2 s">ESTADO: </td>
            <td class="column3 style2 null"><?php echo strtoupper(utf8_encode($resultadoestados["descricao"]));?></td>
            <td class="column5 style3 null"></td>
            <td class="column6 style3 null"></td>
            <td class="column7 style3 null"></td>
            <td class="column8 style3 null"></td>
            <td class="column9 style3 null"></td>
            <td class="column10 style3 null"></td>
            <td class="column11 style3 null"></td>
            <td class="column12 style3 null"></td>
            <td class="column13 style3 null"></td>
            <td class="column14 style3 null"></td>
            <td class="column15 style218 s style218" colspan="2"><?php echo $mes_nome." / ".$ano;?></td>
           <?php if($resultadoestados["porcentagem"]>0){ ?> <td class="column17 style3 null"></td> <?php } ?>


          </tr>
          <tr class="row1">
            <td class="column0 style5 e">IGREJAS</td>
            <td class="column1 style6 e">DIZ. IGREJA</td>
            <td class="column2 style7 e">DIZ. DOS DIZ.</td>
            <td class="column3 style8 e">PASTOR</td>
            <td class="column4 style9 e">AJUDA</td>
            <td class="column5 style7 e">DIZ. DO M.</td>
            <td class="column6 style10 s">SEGURO</td>
            <td class="column7 style7 s">EVANG.</td>
            <td class="column8 style10 s">DISTRITO</td>
            <td class="column9 style11 s">MISSÕES</td>
            <td class="column10 style9 s">ESC. D.</td>
            <td class="column11 style7 s">M. FEM.</td>
            <td class="column12 style10 s">M. MASC.</td>
            <td class="column13 style7 s">M. JUV.</td>
            <td class="column14 style9 e">D. INF</td>
            <td class="column15 style8 s">FUNDO MINIST.</td>
            <td class="column16 style8 e">TOTAL</td>
            <?php if($resultadoestados["porcentagem"]>0){ ?>
            <td class="column17 style12 e"><?php echo $resultadoestados["porcentagem"]*100;?>% RS</td>
             <?php } ?>
          </tr>
          <?php 
       
          	$igrejasbusca = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." ORDER BY nome ASC");

		while($resultadoigrejas = mysqli_fetch_array($igrejasbusca)){
       $selectrelatorio = mysqli_query($conecta,"SELECT * FROM caixa_regiao WHERE igreja_id=".$resultadoigrejas["id"]." and regiao_id=".$regiao_id." and data LIKE '".$mes_referencia."-%'");
$dadosrelatorio = mysqli_fetch_array($selectrelatorio);
       
          ?>
          <tr class="row2">
            <td class="column0 style137 s"><?php echo utf8_encode($resultadoigrejas["nome"]);?></td>
            <td class="column1 style136 e">R$ <?php echo moeda($dadosrelatorio["entrada_igreja"]); ?></td>
            <td class="column2 style136 e">R$ <?php echo moeda($dadosrelatorio["10_igreja"]); ?></td>
            <td class="column3 style164 s"><?php 
            
$selectpastor = mysqli_query($conecta,"SELECT * FROM pastor WHERE id=".$resultadoigrejas["pastor_id"]);
$dadospastor = mysqli_fetch_array($selectpastor);
$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$dadospastor["membro_id"]);
$dadospessoa = mysqli_fetch_array($selectpessoa);         
            
            echo utf8_encode($dadospessoa["nome"]." ".$dadospessoa["sobrenome"]);?></td>
            <td class="column4 style136 e">R$ <?php echo moeda($dadosrelatorio["ajuda_pastor"]); ?></td>
            <td class="column5 style136 e">R$ <?php echo moeda($dadosrelatorio["diz_pastor"]); ?></td>
            <td class="column6 style136 e">R$ <?php echo moeda($dadosrelatorio["seguro"]); ?></td>
            <td class="column7 style136 e">R$ <?php echo moeda($dadosrelatorio["evangelismo"]); ?></td>
            <td class="column8 style136 e">R$ <?php echo moeda($dadosrelatorio["distrito"]); ?></td>
            <td class="column9 style136 e">R$ <?php echo moeda($dadosrelatorio["missoes"]); ?></td>
            <td class="column10 style228 e">R$ <?php echo moeda($dadosrelatorio["ebd"]); ?></td>
            <td class="column11 style228 e">R$ <?php echo moeda($dadosrelatorio["mulher"]); ?></td>
            <td class="column12 style228 e">R$ <?php echo moeda($dadosrelatorio["homens"]); ?></td>
            <td class="column13 style228 e">R$ <?php echo moeda($dadosrelatorio["jovens"]); ?></td>
            <td class="column14 style228 e">R$ <?php echo moeda($dadosrelatorio["criancas"]); ?></td>
            <td class="column15 style136 e">R$ <?php echo moeda($dadosrelatorio["fundoministerial"]); ?></td>
            <td class="column16 style136 e">R$ <?php echo moeda($dadosrelatorio["10_igreja"]+$dadosrelatorio["diz_pastor"]+$dadosrelatorio["seguro"]+$dadosrelatorio["evangelismo"]+$dadosrelatorio["distrito"]+$dadosrelatorio["missoes"]+$dadosrelatorio["ebd"]+$dadosrelatorio["mulher"]+$dadosrelatorio["homens"]+$dadosrelatorio["jovens"]+$dadosrelatorio["criancas"]+$dadosrelatorio["fundoministerial"]); ?></td>
             <?php if($resultadoestados["porcentagem"]>0){ ?>
            <td class="column17 style136 e">0</td>
            <?php } ?>
          </tr>
		  <?php } ?>
          <tr class="row79">
            <td class="column0 style18 s">TOTAIS </td>
            <td class="column1 style136 e">R$ <?php echo moeda($rowentradaigreja['sum(entrada_igreja)']);?></td>
            <td class="column2 style136 e">R$ <?php echo moeda($rowdizimoigreja['sum(10_igreja)']);?></td>
            <td class="column3 style136 null"></td>
            <td class="column4 style136 e">R$ <?php echo moeda($rowajudapastor['sum(ajuda_pastor)']);?></td>
            <td class="column5 style136 e">R$ <?php echo moeda($rowdizimopastor['sum(diz_pastor)']);?></td>
            <td class="column6 style136 e">R$ <?php echo moeda($rowseguro['sum(seguro)']);?></td>
            <td class="column7 style136 e">R$ <?php echo moeda($rowevangelismo['sum(evangelismo)']);?></td>
            <td class="column8 style136 e">R$ <?php echo moeda($rowdistrito['sum(distrito)']);?></td>
            <td class="column9 style136 e">R$ <?php echo moeda($rowmissoes['sum(missoes)']);?></td>
            <td class="column10 style136 e">R$ <?php echo moeda($rowebd['sum(ebd)']);?></td>
            <td class="column11 style136 e">R$ <?php echo moeda($rowfeminino['sum(mulher)']);?></td>
            <td class="column12 style136 e">R$ <?php echo moeda($rowmasculino['sum(homens)']);?></td>
            <td class="column13 style136 e">R$ <?php echo moeda($rowjovens['sum(jovens)']);?></td>
            <td class="column14 style136 e">R$ <?php echo moeda($rowcriancas['sum(criancas)']);?></td>
            <td class="column15 style136 e">R$ <?php echo moeda($rowfundoministerial['sum(fundoministerial)']);?></td>
            <td class="column16 style136 e">R$ <?php echo moeda(0);?></td>
              <?php if($resultadoestados["porcentagem"]>0){ ?>
            <td class="column17 style136 e">0</td>
		<?php } 
		
		  $query_entradaigreja = "SELECT sum(entrada_igreja) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_entradaigreja = mysqli_query($conecta,$query_entradaigreja) or die(mysqli_error($conecta));
        $rowentradaigreja = mysqli_fetch_array($result_entradaigreja); 
        $query_dizimoigreja = "SELECT sum(10_igreja) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_dizimoigreja = mysqli_query($conecta,$query_dizimoigreja) or die(mysqli_error($conecta));
        $rowdizimoigreja = mysqli_fetch_array($result_dizimoigreja); 
        $query_ajudapastor = "SELECT sum(ajuda_pastor) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_ajudapastor = mysqli_query($conecta,$query_ajudapastor) or die(mysqli_error($conecta));
        $rowajudapastor = mysqli_fetch_array($result_ajudapastor); 
        $query_dizimopastor = "SELECT sum(diz_pastor) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_dizimopastor = mysqli_query($conecta,$query_dizimopastor) or die(mysqli_error($conecta));
        $rowdizimopastor = mysqli_fetch_array($result_dizimopastor); 
          
        $query_seguro = "SELECT sum(seguro) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_seguro = mysqli_query($conecta,$query_seguro) or die(mysqli_error($conecta));
        $rowseguro = mysqli_fetch_array($result_seguro);  
        $query_evangelismo = "SELECT sum(evangelismo) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_evangelismo = mysqli_query($conecta,$query_evangelismo) or die(mysqli_error($conecta));
        $rowevangelismo = mysqli_fetch_array($result_evangelismo);  
        $query_distrito = "SELECT sum(distrito) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_distrito = mysqli_query($conecta,$query_distrito) or die(mysqli_error($conecta));
        $rowdistrito = mysqli_fetch_array($result_distrito);  
        $query_missoes = "SELECT sum(missoes) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_missoes = mysqli_query($conecta,$query_missoes) or die(mysqli_error($conecta));
        $rowmissoes = mysqli_fetch_array($result_missoes);  
          
          
        $query_ebd = "SELECT sum(ebd) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_ebd = mysqli_query($conecta,$query_ebd) or die(mysqli_error($conecta));
        $rowebd = mysqli_fetch_array($result_ebd);
        $query_feminino = "SELECT sum(mulher) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_feminino = mysqli_query($conecta,$query_feminino) or die(mysqli_error($conecta));
        $rowfeminino = mysqli_fetch_array($result_feminino);        
        $query_masculino = "SELECT sum(homens) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_masculino = mysqli_query($conecta,$query_masculino) or die(mysqli_error($conecta));
        $rowmasculino = mysqli_fetch_array($result_masculino);  
        $query_jovens = "SELECT sum(jovens) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_jovens = mysqli_query($conecta,$query_jovens) or die(mysqli_error($conecta));
        $rowjovens = mysqli_fetch_array($result_jovens);  
        $query_criancas = "SELECT sum(criancas) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_criancas = mysqli_query($conecta,$query_criancas) or die(mysqli_error($conecta));
        $rowcriancas = mysqli_fetch_array($result_criancas);  
        $query_fundoministerial = "SELECT sum(fundoministerial) FROM caixa_regiao WHERE regiao_id=".$regiao_id." and estado_id=".$resultadoestados["id"]." and `tipo`='entrada' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
        $result_fundoministerial = mysqli_query($conecta,$query_fundoministerial) or die(mysqli_error($conecta));
        $rowfundoministerial = mysqli_fetch_array($result_fundoministerial);  
        
        
		
		?>
          </tr>
          <tr class="row80">
            <td class="column0 style19 s">FUNDO DIZ. / DIZIMOS.</td>
            <td class="column1 style136 e">R$ <?php echo moeda($rowdizimoigreja['sum(10_igreja)']);?></td>
            <td class="column2 style20 null"></td>
            <td class="column3 style21 s">EDUCAÇÃO REGIONAL</td>
            <td class="column4 style136 e">R$ <?php echo moeda($rowdizimoigreja['sum(10_igreja)']*0.05);?></td>
            <td class="column5 style216 s style217" colspan="2">FUNDO DIZ.  OBREIROS.</td>
            <td class="column7 style195 e">R$ <?php echo moeda($rowdizimopastor['sum(diz_pastor)']);?></td>
            <td class="column8 style23 s">ORFANATO  NACIONAL</td>
            <td class="column9 style22 null"></td>
            <td class="column10 style198 e">R$ <?php echo moeda($rowdizimopastor['sum(diz_pastor)']*0.1);?></td>
            <td class="column11 style219 null style227" colspan="<?php if($resultadoestados["porcentagem"]>0){ echo "7"; }else { echo "6"; }?>" rowspan="4"></td>
            <td class="column18 style24 null"></td>
            <td class="column19">&nbsp;</td>
          </tr>
          <tr class="row81">
            <td class="column0 style25 s">AJUDA AO SUPERVISOR.</td>
            <td class="column1 style136 e">R$ <?php echo moeda($rowdizimoigreja['sum(10_igreja)']*0.3);?></td>
            <td class="column2 style20 null"></td>
            <td class="column3 style26 s">FUNDO MINISTERIAL</td>
            <td class="column4 style136 e">R$ <?php echo moeda($rowfundoministerial['sum(fundoministerial)']);?></td>
            <td class="column5 style216 s style217" colspan="2">AJUDA AO SUPERVISOR </td>
            <td class="column7 style196 e">R$ <?php echo moeda($rowdizimopastor['sum(diz_pastor)']*0.3);?></td>
            <td class="column8 style29 s">PARA O SEGURO</td>
            <td class="column9 style28 null"></td>
            <td class="column10 style197 e">R$ <?php echo moeda($rowdizimopastor['sum(diz_pastor)']*0.3);?></td>
            <td class="column18 style30 null"></td>
            <td class="column19">&nbsp;</td>
          </tr>
          <tr class="row82">
            <td class="column0 style25 s">SUPERVISÃO NACIONAL.</td>
            <td class="column1 style136 e">R$ <?php echo moeda($rowdizimoigreja['sum(10_igreja)']*0.1);?></td>
            <td class="column2 style20 null"></td>
            <td class="column3 style31 s">TOTAL SAÍDAS</td>
            <td class="column4 style136 e"><?php echo moeda(($rowdizimoigreja['sum(10_igreja)']*0.1)+($rowdizimoigreja['sum(10_igreja)']*0.3)+($rowdizimoigreja['sum(10_igreja)']*0.1)+$rowdizimoigreja['sum(10_igreja)']*0.05) ?></td>
            <td class="column5 style216 s style217" colspan="2">SUPERVISÃO NACIONAL.</td>
            <td class="column7 style197 e">0</td>
            <td class="column8 style33 s">TOTAL SAÍDAS</td>
            <td class="column9 style34 null"></td>
            <td class="column10 style199 e">0</td>
            <td class="column18 style30 null"></td>
            <td class="column19">&nbsp;</td>
          </tr>
          <tr class="row83">
            <td class="column0 style26 s">EDUCAÇÃO NACIONAL</td>
            <td class="column1 style136 e">R$ <?php echo moeda($rowdizimoigreja['sum(10_igreja)']*0.1);?></td>
            <td class="column2 style35 null"></td>
            <td class="column3 style36 s">SALDO</td>
            <td class="column4 style136 e">0</td>
            <td class="column5 style37 null"></td>
            <td class="column6 style32 null"></td>
            <td class="column7 style27 null"></td>
            <td class="column8 style38 s">SALDO</td>
            <td class="column9 style39 null"></td>
            <td class="column10 style200 e">0</td>
            <td class="column18 style30 null"></td>
            <td class="column19">&nbsp;</td>
          </tr>
         
          <tr class="row84">

          </tr>
		    <?php } ?>
          
         
        </tbody>
    </table>
  </body>
</html>
