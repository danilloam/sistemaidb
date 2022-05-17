<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

include("../conexao/conecta.php");
include("../func.php");
$regiao_id=$_GET["r"];
$mes_rel_ref=$_GET["m"];
$ano_rel_ref=$_GET["a"];


switch($mes_rel_ref) { 



    case 1:

        $mes_nome="JANEIRO";

        break;

    case 2:

        $mes_nome="FEVEREIRO";

        break;

    case 3:

        $mes_nome="MARCO";

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




@$ano = $ano_rel_ref;
@$mes = $mes_rel_ref;

if ($mes == NULL)
{
	$mes = date('m');
}
else if ($mes == 13)
{
	$ano = $ano+1;
	$mes = 1;
}
else if ($mes == 0)
{
	$ano = $ano-1;
	$mes = 12;	
}

if ($ano == NULL)
{
	$ano = date('Y');
}
if (strlen($mes) == 1)
{
	$mes = '0'.$mes;
}
else
{
	$mes = $mes;
}




$mes_referencia=$ano."-".$mes;

$sql2=mysqli_query($conecta,"select * from regiao where id=$regiao_id");
$ver2=mysqli_fetch_array($sql2);
$regiao_nome = $ver2["descricao"];
$regiao_pastor_id=$ver2["pastor_id"];
$selectpastorregiao = mysqli_query($conecta,"SELECT * FROM pastor WHERE id=".$regiao_pastor_id)or die(mysqli_error($conecta));
$dadospastorregiao = mysqli_fetch_array($selectpastorregiao);
$regiaopessoa_id=$dadospastorregiao["membro_id"];
$selectpessoaregiao = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$regiaopessoa_id)or die(mysqli_error($conecta));
$dadospessoaregiao = mysqli_fetch_array($selectpessoaregiao);
$nomepastorregiao=$dadospessoaregiao["nome"]." ".$dadospessoaregiao["sobrenome"];


$query_dizimos = "SELECT sum(10_igreja) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_dizimos = mysqli_query($conecta,$query_dizimos) or die(mysqli_error($conecta));
$rowdizimos = mysqli_fetch_array($result_dizimos);
$entradas_mes_dizimos=$rowdizimos['sum(10_igreja)'];


$query_dizimos_ministros = "SELECT sum(diz_pastor) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_dizimos_ministros = mysqli_query($conecta,$query_dizimos_ministros) or die(mysqli_error($conecta));
$rowdizimos_ministros = mysqli_fetch_array($result_dizimos_ministros);
$entradas_mes_dizimos_ministros=$rowdizimos_ministros['sum(diz_pastor)'];

$query_evangelismo = "SELECT sum(evangelismo) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_evangelismo = mysqli_query($conecta,$query_evangelismo) or die(mysqli_error($conecta));
$rowevangelismo = mysqli_fetch_array($result_evangelismo);
$entradas_mes_evangelismo=$rowevangelismo['sum(evangelismo)'];

$query_visao_corporativa = "SELECT sum(missoes) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_visao_corporativa = mysqli_query($conecta,$query_visao_corporativa) or die(mysqli_error($conecta));
$rowvisao_corporativa = mysqli_fetch_array($result_visao_corporativa);
$entradas_mes_visao_corporativa=$rowvisao_corporativa['sum(missoes)'];


$query_seguro = "SELECT sum(seguro) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_seguro = mysqli_query($conecta,$query_seguro) or die(mysqli_error($conecta));
$rowseguro = mysqli_fetch_array($result_seguro);
$entradasseguro=$rowseguro['sum(seguro)'];

$query_mulher = "SELECT sum(mulher) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_mulher = mysqli_query($conecta,$query_mulher) or die(mysqli_error($conecta));
$rowmulher = mysqli_fetch_array($result_mulher);
$entradasmulher=$rowmulher['sum(mulher)'];

$query_homens = "SELECT sum(homens) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_homens = mysqli_query($conecta,$query_homens) or die(mysqli_error($conecta));
$rowhomens = mysqli_fetch_array($result_homens);
$entradashomens=$rowhomens['sum(homens)'];

$query_jovens = "SELECT sum(jovens) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_jovens = mysqli_query($conecta,$query_jovens) or die(mysqli_error($conecta));
$rowjovens = mysqli_fetch_array($result_jovens);
$entradasjovens=$rowjovens['sum(jovens)'];

$query_ebd = "SELECT sum(ebd) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_ebd = mysqli_query($conecta,$query_ebd) or die(mysqli_error($conecta));
$rowebd = mysqli_fetch_array($result_ebd);
$entradasebd=$rowebd['sum(ebd)'];

$query_adolescentes = "SELECT sum(adolescentes) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_adolescentes = mysqli_query($conecta,$query_adolescentes) or die(mysqli_error($conecta));
$rowadolescentes = mysqli_fetch_array($result_adolescentes);
$entradasadolescentes=$rowadolescentes['sum(adolescentes)'];

$query_criancas = "SELECT sum(criancas) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_criancas = mysqli_query($conecta,$query_criancas) or die(mysqli_error($conecta));
$rowcriancas = mysqli_fetch_array($result_criancas);
$entradascriancas=$rowcriancas['sum(criancas)'];

$query_fundoministerial = "SELECT sum(fundoministerial) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_fundoministerial = mysqli_query($conecta,$query_fundoministerial) or die(mysqli_error($conecta));
$rowfundoministerial = mysqli_fetch_array($result_fundoministerial);
$entradasfundoministerial=$rowfundoministerial['sum(fundoministerial)'];

$query_seguro_extra = "SELECT sum(valor) FROM seguro_extra WHERE `regiao_id`=".$regiao_id." and data LIKE '".$mes_referencia."-%'"; 
$result_seguro_extra = mysqli_query($conecta,$query_seguro_extra) or die(mysqli_error($conecta));
$row_seguro_extra = mysqli_fetch_array($result_seguro_extra);
$entradasseguroextra=$row_seguro_extra['sum(valor)'];

 $EN8 = $entradas_mes_dizimos*10/100;
 $EN9 = $entradas_mes_dizimos_ministros*10/100;
 $ABA = $entradas_mes_dizimos_ministros*10/100;
 $EN10 = (($entradas_mes_dizimos+$entradas_mes_dizimos_ministros)*30/100)*10/100; 
 $EVA=$entradas_mes_evangelismo*10/100; 
 $DNM=$entradas_mes_visao_corporativa*20/100; 
 $DNM2=$entradas_mes_visao_corporativa*20/100; 
 $EDU=0.00; 
 $EDU2=$entradas_mes_dizimos*5/100; 
 $SVM=$entradas_mes_dizimos_ministros*30/100; 
 $SVM1=$entradasseguro; 
 $SVM2=$entradasseguroextra; 
 $MFE=$entradasmulher*10/100; 
 $MJU=$entradasjovens*10/100; 
 $EDO=$entradasebd*10/100; 
 $FNM=$entradasfundoministerial; 
 $EN14=$entradashomens*10/100; 
 $EN16=$entradascriancas*10/100; 
 $EN16A=$entradasadolescentes*10/100; 

$TOTAL_ENTRADAS= $EN8+$EN9+$ABA+$EN10+$EVA+$DNM+$DNM2+$EDU+$EDU2+$SVM+$SVM1+$SVM2+$MFE+$MJU+$EDO+$FNM+$EN14+$EN16+$EN16A;
?>


	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 6.4.6.2 (Linux)"/>
	<meta name="created" content="2021-04-12T13:45:05.207466023"/>
	<meta name="changed" content="2021-04-12T13:48:15.604148285"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Liberation Sans"; font-size:x-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
	
</head>

<body>
<table align="left" cellspacing="0" border="0">
	<colgroup width="61"></colgroup>
	<colgroup width="710"></colgroup>
	<colgroup width="130"></colgroup>
	<colgroup width="19"></colgroup>
	<tr>
	<td><img src="relatorio_nacional_html_5fdcda4a94ad676b.png" width=172 height=53></td>
		<td colspan=1 align="center" valign=middle><font face="Arial Black" color="#000080">Igreja de Deus no Brasil - Supervisão Nacional</font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td colspan=4 height="18" align="center" valign=top><b><font face="Arial1" color="#000080">Relatório Mensal dos Escritórios Regionais</font></b></td>
		</tr>
	<tr>
		<td height="18" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=top><b><font face="Arial1" color="#000080"><br></font></b></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><b><font face="Arial1" color="#000000"><br></font></b></td>
		<td align="center" valign=bottom><b><font face="Arial1" color="#000000"><br></font></b></td>
		<td align="center" valign=bottom><b><font face="Arial1" color="#000000"><br></font></b></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="19" align="right" valign=bottom bgcolor="#FFFFFF"><b><font face="Arial1" color="#000000">Data do depósito ( Enviar o comprovante anexo -  dd/mm/aaaa)   </font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="44272" sdnum="1046;1046;D/M/AAAA"><b><font face="Arial1" size=1 color="#000000">17/3/2021</font></b></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="19" align="right" valign=bottom bgcolor="#FFFFFF"><b><font face="Arial1" color="#000000">Mês de Referência: ( Exemplo:  mes/ano)  </font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdnum="1046;0;@"><b><font face="Arial1" size=1 color="#000000"><?php echo utf8_encode($mes_nome)."/".$ano_rel_ref; ?></font></b></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="18" align="right" valign=bottom bgcolor="#FFFFFF"><b><font face="Arial1" color="#000000">Nome da Região ou Território ( seguido do sinal &quot; - &quot; )</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdnum="1046;0;@"><b><font face="Arial1" size=1 color="#000000">&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;</font></b></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
		<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="18" align="right" valign=bottom bgcolor="#FFFFFF"><b><font face="Arial1" color="#000000">Valor a Ser enviado:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdnum="1046;0;@"><b><font face="Arial1" size=1 color="#000000"><?php echo "R$" .transf_real($TOTAL_ENTRADAS);?></font></b></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><b><font face="Arial1" color="#000000"><br></font></b></td>
		<td align="center" valign=bottom sdnum="1046;0;@"><b><font face="Arial1" color="#000000"><br></font></b></td>
		<td align="center" valign=bottom sdnum="1046;0;@"><b><font face="Arial1" color="#000000"><br></font></b></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom sdnum="1046;0;@"><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom sdnum="1046;0;@"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom bgcolor="#FFCC00"><b><font face="Arial1" color="#000000">CÓD</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFCC00"><b><font face="Arial1" color="#000000">Discriminação</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFCC00"><b><font face="Arial1" color="#000000">Valor (Receita)</font></b></td>
		<td align="center" valign=bottom><b><font face="Arial1" color="#000000"><br></font></b></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">EN8</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% Dízimos das Igrejas -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="3904,352" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($EN8);?> </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">EN9</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% Dízimos dos dizimos ministros -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="1744,41" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($EN9);?> </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">ABA</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% Dízimos dos ministros para ABASC -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="1744,41" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($ABA);?> </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">EN10</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> Dízimo Supervisor -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="1694,63" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($EN10);?> </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">EVA</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% das Entradas de Evangelismo -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="585,653" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($EVA);?> </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">DNM</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 20% das Entradas de Missões (Visão Corporativa) - Transcultural -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="924,58" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($DNM);?>  </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">DNM(2)</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 20% das Entradas de Missões (Visão Corporativa) - Nacional -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="924,58" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($DNM2);?>  </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">EDU</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000">-&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($EDU);?> </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#800080"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">EDU(2)</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000">5% dos Dízimos das Igrejas locais para SEID - &quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="1952,176" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($EDU2);?>  </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#800080"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">SVM</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 30% dos Dízimos dos Ministros Seguro de Vida -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="5233,23" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($SVM);?>  </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">SVM</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 1% dos Dízimos das Igrejas Seguro de Vida -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="3904,35" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($SVM1);?>  </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">SVM</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> Ajuda extra para Seguro de Vida -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="620" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($SVM2);?> </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">MFE</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% das Entradas do Ministerio da Mulher -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="27,448" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($MFE);?> </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">MJU</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% das Entradas do Min Jovens ( 10% s/ dizimos) -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="16,807" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($MJU);?> </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">EDO</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% das Entradas da EBD  ( 10% s/ dizimos) -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="15,554" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($EDO);?>  </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">FNM</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 1% dos Dízimos das Igrejas para Fundo Ministerial -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="3904,35" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($FNM);?></font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">EN14</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000">10% Entradas do Depto de Senhores -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="16,54" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($EN14);?> </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">EN16</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000">10% Entradas do Depto Infantil -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="10,354" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($EN16);?> </font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=bottom><font face="Arial1" color="#000000">EN16</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" sdnum="1046;0;@"><font face="Arial1" color="#000000">10% Entradas Depto Adolescentes -&quot;<?php echo utf8_encode($regiao_nome);
	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC" sdval="0" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($EN16A);?></font></td>
		<td align="right" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="19" align="right" valign=bottom bgcolor="#FFCC00"><b><font face="Arial1" color="#000000">Total Geral do Mês          </font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFCC00" sdval="27223,424" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><b><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($TOTAL_ENTRADAS);?></font></b></td>
		<td align="center" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><b><font face="Arial1" color="#000000"><br></font></b></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td colspan=3 height="19" align="left" valign=bottom><b><font face="Arial1" color="#FF0000">Discriminar no quadro abaixo, somente os lançamentos não contemplados no quadro acima</font></b></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="19" align="center" valign=bottom bgcolor="#FFCC00"><b><font face="Arial1" color="#000000">Discriminação</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFCC00"><b><font face="Arial1" color="#000000">Valor (Receita)</font></b></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	
	<?php
	
$query_seguroextra = mysqli_query($conecta,"SELECT * FROM seguro_extra WHERE `regiao_id`=".$regiao_id." and data LIKE '".$mes_referencia."-%' ORDER BY data");
while($result_seguroextra = mysqli_fetch_assoc($query_seguroextra)){
	 $pastorbuscaseguro = mysqli_query($conecta,"SELECT * FROM pastor where id=".$result_seguroextra["pastor_id"]);
$resultadopastorseguro = mysqli_fetch_array($pastorbuscaseguro);
	$pessoa_pastor_id=utf8_encode($resultadopastorseguro["membro_id"]);
$pessoabusca = mysqli_query($conecta,"SELECT * FROM pessoa where regiao_id=".$regiao_id." and id=".$pessoa_pastor_id);
$resultadopessoapastor = mysqli_fetch_array($pessoabusca);
$pessoa_nome_pastor=utf8_encode($resultadopessoapastor["nome"]." ".$resultadopessoapastor["sobrenome"]);

	?>
	
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="19" align="center" valign=bottom bgcolor="#FFFFFF"><b><font face="Arial1" color="#000000"><?php echo $pessoa_nome_pastor;?></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#CCFFCC"><b><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($result_seguroextra["valor"]);?></font></b></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<?php
	}
	?>
	
		<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="19" align="right" valign=bottom bgcolor="#FFCC00"><b><font face="Arial1" color="#000000">Total Geral do Mês          </font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFCC00" sdval="27223,424" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><b><font face="Arial1" color="#000000"><?php echo "R$" .transf_real($SVM2);?>  </font></b></td>
		<td align="center" valign=bottom sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><b><font face="Arial1" color="#000000"><br></font></b></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="19" align="center" valign=bottom bgcolor="#FF0000"><b><font face="Arial1" color="#FFFFFF">NÃO ALTERAR OS CAMPOS ABAIXO</font></b></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="left"><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFCC00"><b><font face="Arial1" color="#000000">CÓD</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFCC00"><b><font face="Arial1" color="#000000">Discriminação</font></b></td>
		<td align="center" valign=bottom><b><font face="Arial1" color="#000000"><br></font></b></td>
		<td align="center" valign=bottom><b><font face="Arial1" color="#000000"><br></font></b></td>
	</tr>
	
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">EN8</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% Dízimos das Igrejas -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">EN9</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% Dízimos dos dizimos ministros -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">ABA</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% Dízimos dos ministros para ABASC -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">EN10</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> Dízimo Supervisor -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">EVA</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% das Entradas de Evangelismo -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">DNM</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 20% das Entradas de Missões (Visão Corporativa) - Transcultural -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">DNM(2)</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 20% das Entradas de Missões (Visão Corporativa) - Nacional -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">EDU</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">EDU(2)</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">5% dos Dízimos das Igrejas locais para SEID -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">SVM</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 30% dos Dízimos dos Ministros Seguro de Vida -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">SVM</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 1% dos Dízimos das Igrejas Seguro de Vida  -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">SVM</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> Ajuda extra para Seguro de Vida -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">MFE</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% das Entradas do Ministerio da Mulher -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">MJU</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% das Entradas do Min Jovens ( 10% s/ dizimos) -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">EDO</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 10% das Entradas da EBD  ( 10% s/ dizimos) -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">FNM</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000"> 1% dos Dízimos das Igrejas para Fundo Ministerial -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
		<td align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1046;0;#.##0,00&quot; &quot;;&quot;(&quot;#.##0,00&quot;)&quot;;&quot;-&quot;#&quot; &quot;;&quot; &quot;@&quot; &quot;"><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom><font face="Arial1" color="#000000">EN14</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">10% Entradas do Depto de Senhores  -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom><font face="Arial1" color="#000000">EN16</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">10% Entradas do Depto Infantil  -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=bottom><font face="Arial1" color="#000000">EN16</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF" sdnum="1046;0;@"><font face="Arial1" color="#000000">10% Entradas Depto Adolescentes  -&quot;<?php echo utf8_encode($regiao_nome); 	?>&quot;<?php echo $mes_nome."/".$ano_rel_ref; ?></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
		<td align="center" valign=bottom><font face="Arial1" color="#000000"><br></font></td>
	</tr>
</table>

<br clear=left>
<br>
<br>
<!-- ************************************************************************** -->
<center>
				<!--<button onclick="window.open('?pdf=1')">Gerar PDF</button>-->
								<button onclick="self.print();">Imprimir Relat&oacute;rio</button></center>	
	
		<p class="no-print" style="width: 100%; margin: 0 auto 20px; text-align: center; font-size: 12px;">* Para salvar o relat&oacute;rio em PDF clique em <b>Imprimir Relat&oacute;rio</b>, depois em <b>Destino</b> clique em <b>Alterar</b> e escolha a op&ccedil;&atilde;o <b>Salvar como PDF</b>. Para finalizar clique <b>Salvar</b>.</p>
		<p style="width: 100%; margin: auto; text-align: center">Sistema IDB</p>
</body>

</html>


