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

echo $perfil_id;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">      
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
      td.style0 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style0 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style1 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style1 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style2 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFF00 }
      th.style2 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFF00 }
      td.style3 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style3 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style4 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:12pt; background-color:#FFFF00 }
      th.style4 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:12pt; background-color:#FFFF00 }
      td.style5 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style5 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style6 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      th.style6 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      td.style7 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Arial'; font-size:12pt; background-color:#CFCFCF }
      th.style7 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Arial'; font-size:12pt; background-color:#CFCFCF }
      td.style8 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      th.style8 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      td.style9 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      th.style9 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      td.style10 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      th.style10 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      td.style11 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:7pt; background-color:white }
      th.style11 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:7pt; background-color:white }
      td.style12 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:#9CC2E5 }
      th.style12 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:#9CC2E5 }
      td.style13 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style13 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style14 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style14 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#C00000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style15 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#CFCFCF }
      th.style15 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#CFCFCF }
      td.style16 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style16 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style17 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0070C0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style17 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0070C0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style18 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style18 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style19 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style19 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style20 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0070C0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style20 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0070C0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style21 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:white }
      th.style21 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:white }
      td.style22 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:7pt; background-color:#CCFFCC }
      th.style22 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:7pt; background-color:#CCFFCC }
      td.style23 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#002060; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style23 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#002060; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style24 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#002060; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style24 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#002060; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style25 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style25 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style26 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style26 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style27 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style27 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style28 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0070C0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style28 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0070C0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style29 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:10pt; background-color:white }
      th.style29 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:10pt; background-color:white }
      td.style30 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#FF0000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style30 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#FF0000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style31 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style31 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style32 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:white }
      th.style32 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:white }
      td.style33 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0070C0; font-family:'Eras Medium ITC'; font-size:10pt; background-color:white }
      th.style33 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#0070C0; font-family:'Eras Medium ITC'; font-size:10pt; background-color:white }
      td.style34 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style34 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style35 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:white }
      th.style35 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:8pt; background-color:white }
      td.style36 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style36 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style37 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      th.style37 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      td.style38 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#CFCFCF }
      th.style38 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#CFCFCF }
      td.style39 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style39 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style40 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#CFCFCF }
      th.style40 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#CFCFCF }
      td.style41 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style41 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style42 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ADACAC }
      th.style42 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#ADACAC }
      td.style43 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:11pt; background-color:white }
      th.style43 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:11pt; background-color:white }
      td.style44 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style44 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style45 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#002060; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style45 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#002060; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style46 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#002060; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style46 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#002060; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style47 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style47 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style48 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style48 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style49 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style49 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style50 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style50 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style51 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style51 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style52 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style52 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style53 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style53 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style54 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style54 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style55 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style55 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style56 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style56 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style57 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style57 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style58 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style58 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style59 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style59 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style60 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style60 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style61 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#525252; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style61 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#525252; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style62 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style62 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style63 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style63 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style64 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style64 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style65 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style65 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style66 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-style:italic; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style66 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-style:italic; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style67 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#002060; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style67 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#002060; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style68 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-style:italic; color:#002060; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style68 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-style:italic; color:#002060; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style69 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style69 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style70 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style70 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style71 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:12pt; background-color:#ADACAC }
      th.style71 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:12pt; background-color:#ADACAC }
      td.style72 { vertical-align:middle; text-align:left; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Cambria'; font-size:12pt; background-color:#FFC000 }
      th.style72 { vertical-align:middle; text-align:left; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Cambria'; font-size:12pt; background-color:#FFC000 }
      td.style73 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000; border-top:1px solid #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Arial'; font-size:12pt; background-color:#FFC000 }
      th.style73 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000; border-top:1px solid #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Arial'; font-size:12pt; background-color:#FFC000 }
      td.style74 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#002060; font-family:'Arial'; font-size:12pt; background-color:#FFC000 }
      th.style74 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#002060; font-family:'Arial'; font-size:12pt; background-color:#FFC000 }
      td.style75 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#002060; font-family:'Arial'; font-size:12pt; background-color:#FFC000 }
      th.style75 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#002060; font-family:'Arial'; font-size:12pt; background-color:#FFC000 }
      td.style76 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:12pt; background-color:#FFC000 }
      th.style76 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:12pt; background-color:#FFC000 }
      td.style77 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#002060; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style77 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#002060; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style78 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:12pt; background-color:#FFFF00 }
      th.style78 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:12pt; background-color:#FFFF00 }
      td.style79 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Arial'; font-size:8pt; background-color:#FFFF00 }
      th.style79 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Arial'; font-size:8pt; background-color:#FFFF00 }
      td.style80 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Arial'; font-size:8pt; background-color:#FFFF00 }
      th.style80 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Arial'; font-size:8pt; background-color:#FFFF00 }
      td.style81 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Arial'; font-size:8pt; background-color:#FFFF00 }
      th.style81 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Arial'; font-size:8pt; background-color:#FFFF00 }
      td.style82 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:12pt; background-color:#FFFF00 }
      th.style82 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:12pt; background-color:#FFFF00 }
      td.style83 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#002060; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style83 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#002060; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style84 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:7pt; background-color:#FFFF00 }
      th.style84 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:7pt; background-color:#FFFF00 }
      td.style85 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      th.style85 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      td.style86 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Arial'; font-size:12pt; background-color:#CFCFCF }
      th.style86 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Arial'; font-size:12pt; background-color:#CFCFCF }
      td.style87 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      th.style87 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      td.style88 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      th.style88 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      td.style89 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      th.style89 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      td.style90 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      th.style90 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      td.style91 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style91 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style92 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:#CFCFCF }
      th.style92 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:#CFCFCF }
      td.style93 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style93 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style94 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style94 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style95 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style95 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style96 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style96 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style97 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style97 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style98 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
      th.style98 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
      td.style99 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style99 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style100 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
      th.style100 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
      td.style101 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#FF0000; font-family:'Arial'; font-size:10pt; background-color:#CFCFCF }
      th.style101 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#FF0000; font-family:'Arial'; font-size:10pt; background-color:#CFCFCF }
      td.style102 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style102 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style103 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
      th.style103 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
      td.style104 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style104 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style105 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:8pt; background-color:white }
      th.style105 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#FF0000; font-family:'Calibri'; font-size:8pt; background-color:white }
      td.style106 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#002060; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style106 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#002060; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style107 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-style:italic; color:#002060; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style107 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-style:italic; color:#002060; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style108 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style108 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style109 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style109 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style110 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      th.style110 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      td.style111 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style111 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style112 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style112 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style113 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#CFCFCF }
      th.style113 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#CFCFCF }
      td.style114 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      th.style114 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      td.style115 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style115 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style116 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style116 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style117 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      th.style117 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#FF0000; font-family:'Arial'; font-size:8pt; background-color:#CFCFCF }
      td.style118 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:#CFCFCF }
      th.style118 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#FF0000; font-family:'Calibri'; font-size:11pt; background-color:#CFCFCF }
      td.style119 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      th.style119 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      td.style120 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Eras Medium ITC'; font-size:10pt; background-color:white }
      th.style120 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Eras Medium ITC'; font-size:10pt; background-color:white }
      td.style121 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
      th.style121 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
      td.style122 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      th.style122 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
      td.style123 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style123 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style124 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#CFCFCF }
      th.style124 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#CFCFCF }
      td.style125 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
      th.style125 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
      td.style126 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style126 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style127 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:7pt; background-color:#CCFFCC }
      th.style127 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:7pt; background-color:#CCFFCC }
      td.style128 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#A9CD90 }
      th.style128 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#A9CD90 }
      td.style129 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Cambria'; font-size:9pt; background-color:#A9CD90 }
      th.style129 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Cambria'; font-size:9pt; background-color:#A9CD90 }
      td.style130 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#A9CD90 }
      th.style130 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#A9CD90 }
      td.style131 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#A9CD90 }
      th.style131 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#A9CD90 }
      td.style132 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:7pt; background-color:#CCFFCC }
      th.style132 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:7pt; background-color:#CCFFCC }
      td.style133 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#A9CD90 }
      th.style133 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#A9CD90 }
      td.style134 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:#A9CD90 }
      th.style134 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:#A9CD90 }
      td.style135 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#A9CD90 }
      th.style135 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#A9CD90 }
      td.style136 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#A9CD90 }
      th.style136 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#A9CD90 }
      td.style137 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:#A9CD90 }
      th.style137 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:#A9CD90 }
      td.style138 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:#A9CD90 }
      th.style138 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:#A9CD90 }
      td.style139 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:14pt; background-color:#A9CD90 }
      th.style139 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#002060; font-family:'Calibri'; font-size:14pt; background-color:#A9CD90 }
      td.style140 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:14pt; background-color:#A9CD90 }
      th.style140 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#002060; font-family:'Calibri'; font-size:14pt; background-color:#A9CD90 }
      td.style141 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; font-style:italic; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:#A9CD90 }
      th.style141 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; font-style:italic; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:#A9CD90 }
      td.style142 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#525252; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      th.style142 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#525252; font-family:'Eras Medium ITC'; font-size:9pt; background-color:white }
      td.style143 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style143 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style144 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style144 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style145 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:11pt; background-color:#FFFF00 }
      th.style145 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Eras Medium ITC'; font-size:11pt; background-color:#FFFF00 }
      td.style146 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:#FFFFFF }
      th.style146 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Eras Medium ITC'; font-size:9pt; background-color:#FFFFFF }
      td.style147 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Arial'; font-size:12pt; background-color:#FFC000 }
      th.style147 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#002060; font-family:'Arial'; font-size:12pt; background-color:#FFC000 }
      table.sheet0 col.col0 { width:23.04444418pt }
      table.sheet0 col.col1 { width:164.69999811pt }
      table.sheet0 col.col2 { width:39.98888843pt }
      table.sheet0 col.col3 { width:33.21111073pt }
      table.sheet0 col.col4 { width:41.34444397pt }
      table.sheet0 col.col5 { width:33.8888885pt }
      table.sheet0 col.col6 { width:31.85555519pt }
      table.sheet0 col.col7 { width:37.95555512pt }
      table.sheet0 col.col8 { width:39.31111066pt }
      table.sheet0 col.col9 { width:34.56666627pt }
      table.sheet0 col.col10 { width:28.46666634pt }
      table.sheet0 col.col11 { width:38.63333289pt }
      table.sheet0 col.col12 { width:42.69999951pt }
      table.sheet0 col.col13 { width:39.98888843pt }
      table.sheet0 col.col14 { width:40.6666662pt }
      table.sheet0 col.col15 { width:41.34444397pt }
      table.sheet0 col.col16 { width:148.43333163pt }
      table.sheet0 col.col17 { width:37.95555512pt }
      table.sheet0 col.col18 { width:35.92222181pt }
      table.sheet0 col.col19 { width:50.15555498pt }
      table.sheet0 col.col20 { width:79.97777686pt }
      table.sheet0 col.col21 { width:26.43333303pt }
      table.sheet0 tr { height:15pt }
      table.sheet0 tr.row0 { height:12.75pt }
      table.sheet0 tr.row1 { height:12pt }
      table.sheet0 tr.row2 { height:9.75pt }
      table.sheet0 tr.row3 { height:8.25pt }
      table.sheet0 tr.row4 { height:9pt }
      table.sheet0 tr.row5 { height:9.75pt }
      table.sheet0 tr.row6 { height:9.75pt }
      table.sheet0 tr.row7 { height:10.5pt }
      table.sheet0 tr.row8 { height:9.75pt }
      table.sheet0 tr.row9 { height:10.5pt }
      table.sheet0 tr.row10 { height:10.5pt }
      table.sheet0 tr.row11 { height:9.75pt }
      table.sheet0 tr.row12 { height:10.5pt }
      table.sheet0 tr.row13 { height:9pt }
      table.sheet0 tr.row14 { height:10.5pt }
      table.sheet0 tr.row15 { height:9.75pt }
      table.sheet0 tr.row16 { height:9.75pt }
      table.sheet0 tr.row17 { height:10.5pt }
      table.sheet0 tr.row18 { height:10.5pt }
      table.sheet0 tr.row19 { height:9.75pt }
      table.sheet0 tr.row20 { height:9.75pt }
      table.sheet0 tr.row21 { height:9.75pt }
      table.sheet0 tr.row71 { height:9pt }
      table.sheet0 tr.row72 { height:9pt }
      table.sheet0 tr.row73 { height:9.75pt }
      table.sheet0 tr.row74 { height:9.75pt }
      table.sheet0 tr.row75 { height:9.75pt }
      table.sheet0 tr.row76 { height:9.75pt }
      table.sheet0 tr.row140 { height:18.75pt }
 
    </style>
  </head>

  <body>
<style>
@page { margin-left: 0in; margin-right: 0in; margin-top: 0in; margin-bottom: 0in; }
body { margin-left: 0in; margin-right: 0in; margin-top: 0in; margin-bottom: 0in; }
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
        <col class="col20">
        <col class="col21">
        <tbody>
          <tr class="row0">
            <td class="column0 style1 null"></td>
            <td class="column1 style2 null"></td>
            <td class="column2 style4 null">ESTADO:</td>
            <td class="column3 style4 null">PERNAMBUCO</td>
            <td class="column4 style3 null"></td>
            <td class="column5 style3 null"></td>
            <td class="column6 style3 null"></td>
            <td class="column7 style3 null"></td>
            <td class="column8 style3 null"></td>
            <td class="column9 style4 null">JANEIRO</td>
            <td class="column10 style4 null">-2021</td>
            <td class="column11 style3 null"></td>
            <td class="column12 style3 null"></td>
            <td class="column13 style3 null"></td>
            <td class="column14 style3 null"></td>
            <td class="column15 style3 null"></td>
            <td class="column16 style3 null"></td>
    
          </tr>
          <tr class="row1">
            <td class="column0 style6 s">Nº</td>
            <td class="column1 style7 s">NOME DA IGREJA</td>
            <td class="column2 style8 s">M. ANT.</td>
            <td class="column3 style6 s">Ganh.</td>
            <td class="column4 style6 s">BAT.</td>
            <td class="column5 style9 s">CONV.</td>
            <td class="column6 style6 s">B.E.S</td>
            <td class="column7 style6 s">CRIAN.</td>
            <td class="column8 style9 s">CONG.</td>
            <td class="column9 style6 s">ESC. D.</td>
            <td class="column10 style9 s">M. F.</td>
            <td class="column11 style6 s">M. JUV.</td>
            <td class="column12 style6 s">CONGR.</td>
            <td class="column13 style10 s">Memb.</td>
            <td class="column14 style6 s">PERD.</td>
            <td class="column15 style6 s">M. Atual</td>
            <td class="column16 style11 s">PASTOR</td>
 
          </tr>
		  
          <tr class="row2">
            <td class="column0 style19 f">1</td>
            <td class="column1 style16 s">AEROLANDIA</td>
            <td class="column2 style17 f">0</td>
            <td class="column3 style18 f">0</td>
            <td class="column4 style19 f">0</td>
            <td class="column5 style19 f">0</td>
            <td class="column6 style19 f">0</td>
            <td class="column7 style19 f">0</td>
            <td class="column8 style19 f">0</td>
            <td class="column9 style19 f">0</td>
            <td class="column10 style19 f">0</td>
            <td class="column11 style19 f">0</td>
            <td class="column12 style19 f">0</td>
            <td class="column13 style19 f">0</td>
            <td class="column14 style19 f">0</td>
            <td class="column15 style20 f">0</td>
            <td class="column16 style21 s">JOSÉ JUCIÊ DE LIMA</td>
			</tr>
         
          <tr class="row80">
            <td class="column0 style71 null"></td>
            <td class="column1 style72 s">TOTAL</td>
            <td class="column2 style73 f">0</td>
            <td class="column3 style74 f">0</td>
            <td class="column4 style75 f">0</td>
            <td class="column5 style75 f">0</td>
            <td class="column6 style75 f">0</td>
            <td class="column7 style75 f">0</td>
            <td class="column8 style75 f">0</td>
            <td class="column9 style75 f">0</td>
            <td class="column10 style75 f">0</td>
            <td class="column11 style75 f">0</td>
            <td class="column12 style75 f">0</td>
            <td class="column13 style75 f">0</td>
            <td class="column14 style75 f">0</td>
            <td class="column15 style75 f">0</td>
            <td class="column16 style76 null"></td>

          </tr>
		  <tr></tr>
		            <tr class="row0">
            <td class="column0 style1 null"></td>
            <td class="column1 style2 null"></td>
            <td class="column2 style4 null">ESTADO:</td>
            <td class="column3 style4 null">PARAIBA</td>
            <td class="column4 style3 null"></td>
            <td class="column5 style3 null"></td>
            <td class="column6 style3 null"></td>
            <td class="column7 style3 null"></td>
            <td class="column8 style3 null"></td>
            <td class="column9 style4 null">JANEIRO</td>
            <td class="column10 style4 null">-2021</td>
            <td class="column11 style3 null"></td>
            <td class="column12 style3 null"></td>
            <td class="column13 style3 null"></td>
            <td class="column14 style3 null"></td>
            <td class="column15 style3 null"></td>
            <td class="column16 style3 null"></td>
    
          </tr>
          <tr class="row1">
            <td class="column0 style6 s">Nº</td>
            <td class="column1 style7 s">NOME DA IGREJA</td>
            <td class="column2 style8 s">M. ANT.</td>
            <td class="column3 style6 s">Ganh.</td>
            <td class="column4 style6 s">BAT.</td>
            <td class="column5 style9 s">CONV.</td>
            <td class="column6 style6 s">B.E.S</td>
            <td class="column7 style6 s">CRIAN.</td>
            <td class="column8 style9 s">CONG.</td>
            <td class="column9 style6 s">ESC. D.</td>
            <td class="column10 style9 s">M. F.</td>
            <td class="column11 style6 s">M. JUV.</td>
            <td class="column12 style6 s">CONGR.</td>
            <td class="column13 style10 s">Memb.</td>
            <td class="column14 style6 s">PERD.</td>
            <td class="column15 style6 s">M. Atual</td>
            <td class="column16 style11 s">PASTOR</td>
 
          </tr>
		  
          <tr class="row2">
            <td class="column0 style19 f">1</td>
            <td class="column1 style16 s">AEROLANDIA</td>
            <td class="column2 style17 f">0</td>
            <td class="column3 style18 f">0</td>
            <td class="column4 style19 f">0</td>
            <td class="column5 style19 f">0</td>
            <td class="column6 style19 f">0</td>
            <td class="column7 style19 f">0</td>
            <td class="column8 style19 f">0</td>
            <td class="column9 style19 f">0</td>
            <td class="column10 style19 f">0</td>
            <td class="column11 style19 f">0</td>
            <td class="column12 style19 f">0</td>
            <td class="column13 style19 f">0</td>
            <td class="column14 style19 f">0</td>
            <td class="column15 style20 f">0</td>
            <td class="column16 style21 s">JOSÉ JUCIÊ DE LIMA</td>
			</tr>
         
          <tr class="row80">
            <td class="column0 style71 null"></td>
            <td class="column1 style72 s">TOTAL</td>
            <td class="column2 style73 f">0</td>
            <td class="column3 style74 f">0</td>
            <td class="column4 style75 f">0</td>
            <td class="column5 style75 f">0</td>
            <td class="column6 style75 f">0</td>
            <td class="column7 style75 f">0</td>
            <td class="column8 style75 f">0</td>
            <td class="column9 style75 f">0</td>
            <td class="column10 style75 f">0</td>
            <td class="column11 style75 f">0</td>
            <td class="column12 style75 f">0</td>
            <td class="column13 style75 f">0</td>
            <td class="column14 style75 f">0</td>
            <td class="column15 style75 f">0</td>
            <td class="column16 style76 null"></td>

          </tr>
		  	  <tr></tr>
             <tr class="row139">
            <td class="column0 style133 null"></td>
            <td class="column1 style134 null"></td>
            <td class="column2 style135 s">M. ANT.</td>
            <td class="column3 style135 s">Ganh.</td>
            <td class="column4 style135 s">BAT.</td>
            <td class="column5 style136 s">CONV.</td>
            <td class="column6 style135 s">B. E. S</td>
            <td class="column7 style135 s">CRIAN.</td>
            <td class="column8 style136 s">CONG.</td>
            <td class="column9 style135 s">ESC. D.</td>
            <td class="column10 style136 s">M. F.</td>
            <td class="column11 style135 s">M. JUV.</td>
            <td class="column12 style135 s">CONGR.</td>
            <td class="column13 style135 s">Memb.</td>
            <td class="column14 style135 s">PERD.</td>
            <td class="column15 style135 s">M. Atual</td>
            <td class="column16 style137 null"></td>
 
          </tr>
          <tr class="row140">
            <td class="column0 style138 null"></td>
            <td class="column1 style139 s">TOTAL GERAL</td>
            <td class="column2 style139 f">0</td>
            <td class="column3 style140 f">0</td>
            <td class="column4 style140 f">0</td>
            <td class="column5 style140 f">0</td>
            <td class="column6 style140 f">0</td>
            <td class="column7 style140 f">0</td>
            <td class="column8 style140 f">0</td>
            <td class="column9 style140 f">0</td>
            <td class="column10 style140 f">0</td>
            <td class="column11 style140 f">0</td>
            <td class="column12 style140 f">0</td>
            <td class="column13 style140 f">0</td>
            <td class="column14 style140 f">0</td>
            <td class="column15 style139 f">0</td>
            <td class="column16 style141 null"></td>

          </tr>
        </tbody>
    </table>
  </body>
</html>