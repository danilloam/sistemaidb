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

$selectigrejas = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=".$regiao_id."  and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas=mysqli_num_rows($selectigrejas);

$selectcongregacoes = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=".$regiao_id."  and igreja_id is NOT NULL") or die(mysqli_error($conecta));	
$total_congregacoes=mysqli_num_rows($selectcongregacoes);

$selectpastores = mysqli_query($conecta,"SELECT * FROM pastor where regiao_id=".$regiao_id) or die(mysqli_error($conecta));	
$total_pastores=mysqli_num_rows($selectpastores);

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


$query_seguroextra = "SELECT sum(valor) FROM seguro_extra WHERE `regiao_id`=".$regiao_id." and data LIKE '".$mes_referencia."-%'"; 
$result_seguroextra = mysqli_query($conecta,$query_seguroextra) or die(mysqli_error($conecta));
$rowseguroextra = mysqli_fetch_array($result_seguroextra);
$entradasseguroextra=$rowseguroextra['sum(valor)'];


$query_fundoministerial = "SELECT sum(fundoministerial) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_fundoministerial = mysqli_query($conecta,$query_fundoministerial) or die(mysqli_error($conecta));
$rowfundoministerial = mysqli_fetch_array($result_fundoministerial);
$entradasfundoministerial=$rowfundoministerial['sum(fundoministerial)'];

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



$entradas_totais_dizimos=$entradas_mes_dizimos+$entradasseguro+$entradas_mes_dizimos_ministros+$entradasfundoministerial;


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






<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head><meta charset="windows-1252">

<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List
href="images_internacional/filelist.xml">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style id="RELATORIO DO SUPERVISOR FEVEREIRO  2021_400_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl63400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl64400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl65400
	{padding:0px;
	mso-ignore:padding;
	color:navy;
	font-size:14.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl66400
	{padding:0px;
	mso-ignore:padding;
	color:navy;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl67400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl68400
	{padding:0px;
	mso-ignore:padding;
	color:navy;
	font-size:14.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl69400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"mm\/yy";
	text-align:left;
	vertical-align:middle;
	border:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl70400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:.5pt solid #FFCC00;
	border-right:none;
	border-bottom:.5pt solid #FFCC00;
	border-left:.5pt solid #FFCC00;
	background:navy;
	mso-pattern:navy none;
	white-space:nowrap;}
.xl71400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:.5pt solid #FFCC00;
	border-right:none;
	border-bottom:.5pt solid #FFCC00;
	border-left:none;
	background:navy;
	mso-pattern:navy none;
	white-space:nowrap;}
.xl72400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:.5pt solid #FFCC00;
	border-right:.5pt solid #FFCC00;
	border-bottom:.5pt solid #FFCC00;
	border-left:none;
	background:navy;
	mso-pattern:navy none;
	white-space:nowrap;}
.xl73400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid black;
	background:#FFCC00;
	mso-pattern:yellow none;
	white-space:nowrap;}
.xl74400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl75400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	mso-protection:unlocked visible;
	white-space:nowrap;}
.xl76400
	{padding:0px;
	mso-ignore:padding;
	color:red;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl77400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl78400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl79400
	{padding:0px;
	mso-ignore:padding;
	color:red;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl80400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl81400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:.5pt solid black;
	border-bottom:.5pt solid black;
	border-left:1.0pt solid black;
	background:#FFCC00;
	mso-pattern:yellow none;
	white-space:normal;}
.xl82400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:.5pt solid black;
	border-bottom:.5pt solid black;
	border-left:.5pt solid black;
	background:#FFCC00;
	mso-pattern:yellow none;
	white-space:normal;}
.xl83400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid black;
	border-bottom:.5pt solid black;
	border-left:.5pt solid black;
	background:#FFCC00;
	mso-pattern:yellow none;
	white-space:normal;}
.xl84400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:Standard;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl85400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl86400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:Standard;
	text-align:left;
	vertical-align:bottom;
	border:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl87400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:Standard;
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	mso-protection:unlocked visible;
	white-space:nowrap;}
.xl88400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:Standard;
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid black;
	background:#FFFF99;
	mso-pattern:#FFFFCC none;
	white-space:nowrap;}
.xl89400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:Standard;
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid black;
	background:#00CCFF;
	mso-pattern:#33CCCC none;
	white-space:nowrap;}
.xl90400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:Standard;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl91400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.00_\)\;_\(* \\\(\#\,\#\#0\.00\\\)\;_\(* \\-??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	mso-protection:unlocked visible;
	white-space:nowrap;}
.xl92400
	{padding:0px;
	mso-ignore:padding;
	color:blue;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:Standard;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl93400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl94400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:Standard;
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid black;
	border-right:.5pt solid black;
	border-bottom:2.0pt double black;
	border-left:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl95400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:Standard;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid black;
	border-right:.5pt solid black;
	border-bottom:2.0pt double black;
	border-left:.5pt solid black;
	background:#FFFF99;
	mso-pattern:#FFFFCC none;
	white-space:nowrap;}
.xl96400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:.5pt solid black;
	border-bottom:.5pt solid black;
	border-left:1.0pt solid black;
	background:#FFCC00;
	mso-pattern:yellow none;
	white-space:normal;}
.xl97400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.00_\)\;_\(* \\\(\#\,\#\#0\.00\\\)\;_\(* \\-??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:.5pt solid black;
	border-bottom:.5pt solid black;
	border-left:.5pt solid black;
	background:#FFCC00;
	mso-pattern:yellow none;
	white-space:nowrap;}
.xl98400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:.5pt solid black;
	border-right:.5pt solid black;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:#FFCC00;
	mso-pattern:yellow none;
	white-space:normal;}
.xl99400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.00_\)\;_\(* \\\(\#\,\#\#0\.00\\\)\;_\(* \\-??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid black;
	border-right:.5pt solid black;
	border-bottom:1.0pt solid black;
	border-left:.5pt solid black;
	background:#FFCC00;
	mso-pattern:yellow none;
	white-space:nowrap;}
.xl100400
	{padding:0px;
	mso-ignore:padding;
	color:navy;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:Standard;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl101400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:Standard;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl102400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl103400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.00_\)\;_\(* \\\(\#\,\#\#0\.00\\\)\;_\(* \\-??_\)\;_\(\@_\)";
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl104400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl105400
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl106400
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl107400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl108400
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl109400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl110400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\#\,\#\#0";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	mso-protection:unlocked visible;
	white-space:nowrap;}
.xl111400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\#\,\#\#0";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	mso-protection:unlocked visible;
	white-space:nowrap;}
.xl112400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl113400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl114400
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl115400
	{padding:0px;
	mso-ignore:padding;
	color:navy;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\@";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
-->
</style>
</head>

<body>
<!--[if !excel]>&nbsp;&nbsp;<![endif]-->
<!--As seguintes informações foram geradas pelo Assistente para Publicação como
Página da Web do Microsoft Excel.-->
<!--Se o mesmo item for republicado a partir do Excel, todas as informações
entre as marcas DIV serão substituídas.-->
<!----------------------------->
<!--INÍCIO DA SAÍDA DO 'ASSISTENTE PARA PUBLICAÇÃO COMO PÁGINA DA WEB' DO EXCEL
-->
<!----------------------------->

<div id="RELATORIO DO SUPERVISOR FEVEREIRO  2021_400" align=center
x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=2081 class=xl63400
 style='border-collapse:collapse;table-layout:fixed;width:1561pt'>
 <col class=xl63400 width=35 style='mso-width-source:userset;mso-width-alt:
 1280;width:26pt'>
 <col class=xl63400 width=250 style='mso-width-source:userset;mso-width-alt:
 9142;width:188pt'>
 <col class=xl63400 width=108 span=7 style='mso-width-source:userset;
 mso-width-alt:3949;width:81pt'>
 <col class=xl63400 width=80 span=13 style='width:60pt'>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl63400 width=35 style='height:14.25pt;width:26pt'></td>
  <td width=250 style='width:188pt' align=left valign=top><!--[if gte vml 1]><v:shapetype
   id="_x0000_t75" coordsize="21600,21600" o:spt="75" o:preferrelative="t"
   path="m@4@5l@4@11@9@11@9@5xe" filled="f" stroked="f">
   <v:stroke joinstyle="miter"/>
   <v:formulas>
    <v:f eqn="if lineDrawn pixelLineWidth 0"/>
    <v:f eqn="sum @0 1 0"/>
    <v:f eqn="sum 0 0 @1"/>
    <v:f eqn="prod @2 1 2"/>
    <v:f eqn="prod @3 21600 pixelWidth"/>
    <v:f eqn="prod @3 21600 pixelHeight"/>
    <v:f eqn="sum @0 0 1"/>
    <v:f eqn="prod @6 1 2"/>
    <v:f eqn="prod @7 21600 pixelWidth"/>
    <v:f eqn="sum @8 21600 0"/>
    <v:f eqn="prod @7 21600 pixelHeight"/>
    <v:f eqn="sum @10 21600 0"/>
   </v:formulas>
   <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
   <o:lock v:ext="edit" aspectratio="t"/>
  </v:shapetype><v:shape id="Picture_x0020_18" o:spid="_x0000_s1676" type="#_x0000_t75"
   style='position:absolute;margin-left:0;margin-top:10.5pt;width:131.25pt;
   height:52.5pt;z-index:1;visibility:visible' o:gfxdata="UEsDBBQABgAIAAAAIQD0vmNdDgEAABoCAAATAAAAW0NvbnRlbnRfVHlwZXNdLnhtbJSRQU7DMBBF
90jcwfIWJQ4sEEJJuiCwhAqVA1j2JDHEY8vjhvb2OEkrQVWQWNoz7//npFzt7MBGCGQcVvw6LzgD
VE4b7Cr+tnnK7jijKFHLwSFUfA/EV/XlRbnZeyCWaKSK9zH6eyFI9WAl5c4DpknrgpUxHUMnvFQf
sgNxUxS3QjmMgDGLUwavywZauR0ie9yl68Xk3UPH2cOyOHVV3NgpYB6Is0yAgU4Y6f1glIzpdWJE
fWKWHazyRM471BtPV0mdn2+YJj+lvhccuJf0OYPRwNYyxGdpk7rQgYQ3Km4DpK3875xJ1FLm2tYo
yJtA64U8iv1WoN0nBhj/m94k7BXGY7qY/2z9BQAA//8DAFBLAwQUAAYACAAAACEACMMYpNQAAACT
AQAACwAAAF9yZWxzLy5yZWxzpJDBasMwDIbvg76D0X1x2sMYo05vg15LC7saW0nMYstIbtq+/UzZ
YBm97ahf6PvEv91d46RmZAmUDKybFhQmRz6kwcDp+P78CkqKTd5OlNDADQV23eppe8DJlnokY8ii
KiWJgbGU/Ka1uBGjlYYyprrpiaMtdeRBZ+s+7YB607Yvmn8zoFsw1d4b4L3fgDrecjX/YcfgmIT6
0jiKmvo+uEdU7emSDjhXiuUBiwHPcg8Z56Y+B/qxd/1Pbw6unBk/qmGh/s6r+ceuF1V2XwAAAP//
AwBQSwMEFAAGAAgAAAAhAAHhduEWAgAA6gUAABIAAABkcnMvcGljdHVyZXhtbC54bWysVG2P0zAM
/o7Ef4jyneu2at1UrTudbjqEdMCE4Ad4qbtGpEmVZC/373GSbgME0onyzbGTx4/92FndnzvFjmid
NLri07sJZ6iFqaXeV/zb16d3S86cB12DMhor/oKO36/fvlmda1uCFq2xjCC0K8lR8db7vswyJ1rs
wN2ZHjVFG2M78HS0+6y2cCLwTmWzyaTIXG8Ratci+k2K8HXE9ifziEo9xBTJ1VjTJUsYtZ6ussAh
mPEBGZ+bZj25usMpRqw5XdzBvPhCfJrn+Xx4QrH4JMLecnlzxf9bzmlRFMvF/M+Z8+R+deZLvl6K
lFgft1Js7cDi03FrmaxJq2KRc6ahI1Xogj9YZNMlz2730isoCenZiO9uEAr+QaYOpKZk5rEFvccH
16PwROEnl6UC2yBlcBOJJA6xTSzi8ZdKdkr2T1KRelAGezS7NIavGkLTNFLgxohDh9qnSbSowNMW
uFb2jjNbYrdD6rP9UMeCoHRWfKG6xxKl5hCWt+hFOxYrQDXUxMArNP0KPAhwa3LYFdfT7OxOH01N
MwMHb2jXoDw3tvsfPKip7Fxx2qh8MefshQYhbleYBijx7Jmg8LArnAm6UMwXs9k8jkviEW721vn3
aEZzYgGI9KPWxDrh+OyGJl1ShHTahCkc24BYo9JjYW6EkppKD0IG6QaT1nnYcSVpejfgIVwOAv/2
aUZf+qTXPwAAAP//AwBQSwMECgAAAAAAAAAhAEsEL+KCOgAAgjoAABUAAABkcnMvbWVkaWEvaW1h
Z2UxLmpwZWf/2P/gABBKRklGAAEBAQEsASwAAP/bAEMAAwICAwICAwMDAwQDAwQFCAUFBAQFCgcH
BggMCgwMCwoLCw0OEhANDhEOCwsQFhARExQVFRUMDxcYFhQYEhQVFP/bAEMBAwQEBQQFCQUFCRQN
Cw0UFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFP/AABEI
AHcBLAMBIgACEQEDEQH/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/xAC1EAACAQMD
AgQDBQUEBAAAAX0BAgMABBEFEiExQQYTUWEHInEUMoGRoQgjQrHBFVLR8CQzYnKCCQoWFxgZGiUm
JygpKjQ1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoOEhYaHiImKkpOUlZaX
mJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4eLj5OXm5+jp6vHy8/T19vf4
+fr/xAAfAQADAQEBAQEBAQEBAAAAAAAAAQIDBAUGBwgJCgv/xAC1EQACAQIEBAMEBwUEBAABAncA
AQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6
Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeo
qaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhED
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
4nEbeOIUKg7tVvFKG1SchK1/oP/EF0ZLZHRPMezLdTvyIz4WhRUOUBiGy0m6Uh4mY6LTkw/m/Od7
DOLV8iJdfX4URSMHbjIXuoD5gOkvAAAA//8DAFBLAwQUAAYACAAAACEAWGCzG7oAAAAiAQAAHQAA
AGRycy9fcmVscy9waWN0dXJleG1sLnhtbC5yZWxzhI/LCsIwEEX3gv8QZm/TuhCRpm5EcCv1A4Zk
mkabB0kU+/cG3CgILude7jlMu3/aiT0oJuOdgKaqgZGTXhmnBVz642oLLGV0CifvSMBMCfbdctGe
acJcRmk0IbFCcUnAmHPYcZ7kSBZT5QO50gw+WszljJoHlDfUxNd1veHxkwHdF5OdlIB4Ug2wfg7F
/J/th8FIOnh5t+TyDwU3trgLEKOmLMCSMvgOm+oaSAPvWv71WfcCAAD//wMAUEsBAi0AFAAGAAgA
AAAhAPS+Y10OAQAAGgIAABMAAAAAAAAAAAAAAAAAAAAAAFtDb250ZW50X1R5cGVzXS54bWxQSwEC
LQAUAAYACAAAACEACMMYpNQAAACTAQAACwAAAAAAAAAAAAAAAAA/AQAAX3JlbHMvLnJlbHNQSwEC
LQAUAAYACAAAACEAAeF24RYCAADqBQAAEgAAAAAAAAAAAAAAAAA8AgAAZHJzL3BpY3R1cmV4bWwu
eG1sUEsBAi0ACgAAAAAAAAAhAEsEL+KCOgAAgjoAABUAAAAAAAAAAAAAAAAAggQAAGRycy9tZWRp
YS9pbWFnZTEuanBlZ1BLAQItABQABgAIAAAAIQCgmgj+EQEAAIgBAAAPAAAAAAAAAAAAAAAAADc/
AABkcnMvZG93bnJldi54bWxQSwECLQAUAAYACAAAACEAWGCzG7oAAAAiAQAAHQAAAAAAAAAAAAAA
AAB1QAAAZHJzL19yZWxzL3BpY3R1cmV4bWwueG1sLnJlbHNQSwUGAAAAAAYABgCFAQAAakEAAAAA
">
   <v:imagedata src="images_internacional/image001.png"
    o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:0px;margin-top:14px;width:175px;
  height:70px'><img width=175 height=70
  src="images_internacional/image002.png"
  v:shapes="Picture_x0020_18"></span><![endif]><span style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=19 class=xl63400 width=250 style='height:14.25pt;width:188pt'></td>
   </tr>
  </table>
  </span></td>
  <td class=xl63400 width=108 style='width:81pt'></td>
  <td class=xl63400 width=108 style='width:81pt'></td>
  <td class=xl63400 width=108 style='width:81pt'></td>
  <td class=xl63400 width=108 style='width:81pt'></td>
  <td class=xl63400 width=108 style='width:81pt'></td>
  <td class=xl63400 width=108 style='width:81pt'></td>
  <td class=xl63400 width=108 style='width:81pt'></td>
  <td class=xl63400 width=80 style='width:60pt'></td>
  <td class=xl63400 width=80 style='width:60pt'></td>
  <td class=xl63400 width=80 style='width:60pt'></td>
  <td class=xl63400 width=80 style='width:60pt'></td>
  <td class=xl63400 width=80 style='width:60pt'></td>
  <td class=xl63400 width=80 style='width:60pt'></td>
  <td class=xl63400 width=80 style='width:60pt'></td>
  <td class=xl63400 width=80 style='width:60pt'></td>
  <td class=xl63400 width=80 style='width:60pt'></td>
  <td class=xl63400 width=80 style='width:60pt'></td>
  <td class=xl63400 width=80 style='width:60pt'></td>
  <td class=xl63400 width=80 style='width:60pt'></td>
  <td class=xl63400 width=80 style='width:60pt'></td>
 </tr>
 <tr class=xl64400 height=25 style='mso-height-source:userset;height:18.75pt'>
  <td height=25 class=xl64400 style='height:18.75pt'></td>
  <td class=xl65400></td>
  <td class=xl66400></td>
  <td class=xl66400></td>
  <td class=xl66400></td>
  <td class=xl64400></td>
  <td class=xl67400>Regi&atilde;o:</td>
  <td colspan=2 class=xl114400 style='border-left:none'><?php echo strtoupper(substr($regiao_nome,7)); ?></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
 </tr>
 <tr class=xl64400 height=25 style='mso-height-source:userset;height:18.75pt'>
  <td height=25 class=xl64400 style='height:18.75pt'></td>
  <td class=xl68400 colspan=4><span
  style='mso-spacerun:yes'></span>Relat&oacute;rio Mensal do Supervisor</td>
  <td class=xl64400></td>
  <td class=xl69400 style='border-top:none'>M&ecirc;s</td>
  <td colspan=2 class=xl115400 style='border-left:none'><?php echo $mes_nome; ?> DE <?php echo $ano; ?></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
 </tr>
 <tr class=xl64400 height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl64400 style='height:14.25pt'></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
 </tr>
 <tr class=xl64400 height=12 style='mso-height-source:userset;height:9.0pt'>
  <td height=12 class=xl64400 style='height:9.0pt'></td>
  <td class=xl70400>&nbsp;</td>
  <td class=xl71400>&nbsp;</td>
  <td class=xl71400>&nbsp;</td>
  <td class=xl71400>&nbsp;</td>
  <td class=xl71400>&nbsp;</td>
  <td class=xl71400>&nbsp;</td>
  <td class=xl71400>&nbsp;</td>
  <td class=xl72400>&nbsp;</td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
  <td class=xl64400></td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl63400 style='height:14.25pt'></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl63400 style='height:15.95pt'></td>
  <td class=xl73400>Item</td>
  <td class=xl73400 style='border-left:none'>Quantidade</td>
  <td class=xl63400></td>
  <td colspan=2 class=xl73400>Item</td>
  <td class=xl73400 style='border-left:none'>Quantidade</td>
  <td class=xl63400></td>
  <td class=xl105400></td>
  <td class=xl105400></td>
  <td class=xl105400></td>
  <td class=xl105400></td>
  <td class=xl105400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl63400 style='height:15.95pt'></td>
  <td class=xl74400 style='border-top:none'>Total de Igrejas</td>
  <td class=xl75400 style='border-top:none;border-left:none'><?php echo $total_igrejas; ?></td>
  <td class=xl63400></td>
  <td colspan=2 class=xl112400>Batizados nas &aacute;guas / Recebidos</td>
  <td class=xl75400 style='border-top:none;border-left:none'>0</td>
  <td class=xl63400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl107400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl63400 style='height:15.95pt'></td>
  <td class=xl74400 style='border-top:none'>Igrejas implantadas no m&ecirc;s</td>
  <td class=xl75400 style='border-top:none;border-left:none'>0</td>
  <td class=xl63400></td>
  <td colspan=2 class=xl112400>Batizados com Esp&iacute;rito Santo</td>
  <td class=xl75400 style='border-top:none;border-left:none'>0</td>
  <td class=xl63400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl63400 style='height:15.95pt'></td>
  <td class=xl74400 style='border-top:none'>Total de Congrega&ccedil;&otilde;es</td>
  <td class=xl75400 style='border-top:none;border-left:none'><?php echo $total_congregacoes; ?></td>
  <td class=xl63400></td>
  <td colspan=2 class=xl112400>EBD's realizadas no m&ecirc;s</td>
  <td class=xl75400 style='border-top:none;border-left:none'>0</td>
  <td class=xl63400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl63400 style='height:15.95pt'></td>
  <td class=xl74400 style='border-top:none'>Total de Ministros</td>
  <td class=xl75400 style='border-top:none;border-left:none'><?php echo $total_pastores;?> </td>
  <td class=xl63400></td>
  <td colspan=2 class=xl112400>Reuni&otilde;es Minist&eacute;rio Jovens</td>
  <td class=xl75400 style='border-top:none;border-left:none'>0</td>
  <td class=xl63400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl63400 style='height:15.95pt'></td>
  <td class=xl74400 style='border-top:none'>Total de Ministros que enviaram
  relat&oacute;rios</td>
  <td class=xl75400 style='border-top:none;border-left:none'>186</td>
  <td class=xl63400></td>
  <td colspan=2 class=xl112400>Reuni&oacute;es Ministerio da Mulher</td>
  <td class=xl75400 style='border-top:none;border-left:none'>0</td>
  <td class=xl63400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl63400 style='height:15.95pt'></td>
  <td class=xl74400 style='border-top:none'>Serm&oacute;es Pregados no m&ecirc;s</td>
  <td class=xl75400 style='border-top:none;border-left:none'>635</td>
  <td class=xl63400></td>
  <td colspan=2 class=xl112400>Total de membros do m&ecirc;s passado</td>
  <td class=xl110400 style='border-top:none;border-left:none'>10,622</td>
  <td class=xl63400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl63400 style='height:15.95pt'></td>
  <td class=xl74400 style='border-top:none'>Convertidos no m&ecirc;s</td>
  <td class=xl75400 style='border-top:none;border-left:none'>0</td>
  <td class=xl63400></td>
  <td colspan=2 class=xl112400>Total de membros do m&ecirc;s ATUAL</td>
  <td class=xl111400 style='border-top:none;border-left:none'>10,588</td>
  <td class=xl63400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl63400 style='height:15.95pt'></td>
  <td class=xl74400 style='border-top:none'>Santificados no M&ecirc;s</td>
  <td class=xl75400 style='border-top:none;border-left:none'>0</td>
  <td class=xl63400></td>
  <td class=xl76400></td>
  <td class=xl63400></td>
  <td class=xl77400></td>
  <td class=xl78400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl106400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl63400 style='height:15.95pt'></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl79400></td>
  <td class=xl63400></td>
  <td class=xl78400></td>
  <td class=xl78400></td>
  <td class=xl105400></td>
  <td class=xl105400></td>
  <td class=xl105400></td>
  <td class=xl105400></td>
  <td class=xl105400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl63400 style='height:14.25pt'></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl78400></td>
  <td class=xl78400></td>
  <td class=xl78400></td>
  <td class=xl78400></td>
  <td class=xl78400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr class=xl80400 height=56 style='mso-height-source:userset;height:42.0pt'>
  <td height=56 class=xl80400 style='height:42.0pt'></td>
  <td class=xl81400 width=250 style='width:188pt'>Rubros</td>
  <td class=xl82400 width=108 style='border-left:none;width:81pt'>Entradas de
  las Oficinas Generales</td>
  <td class=xl82400 width=108 style='border-left:none;width:81pt'>Entradas<span
  style='mso-spacerun:yes'></span> Nacionales</td>
  <td class=xl82400 width=108 style='border-left:none;width:81pt'>Otras<span
  style='mso-spacerun:yes'></span>Entradas / Saldo</td>
  <td class=xl82400 width=108 style='border-left:none;width:81pt'>Total de<span
  style='mso-spacerun:yes'></span> Entradas</td>
  <td class=xl82400 width=108 style='border-left:none;width:81pt'>Salidas
  de<span style='mso-spacerun:yes'></span> este M&ecirc;s</td>
  <td class=xl82400 width=108 style='border-left:none;width:81pt'>Balance<span
  style='mso-spacerun:yes'></span> Previo</td>
  <td class=xl83400 width=108 style='border-left:none;width:81pt'>Balance
  Actual<span style='mso-spacerun:yes'></span> (En Caja)</td>
  <td class=xl84400></td>
  <td class=xl84400></td>
  <td class=xl84400></td>
  <td class=xl80400></td>
  <td class=xl80400></td>
  <td class=xl80400></td>
  <td class=xl80400></td>
  <td class=xl80400></td>
  <td class=xl80400></td>
  <td class=xl80400></td>
  <td class=xl80400></td>
  <td class=xl80400></td>
  <td class=xl80400></td>
 </tr>
 <tr class=xl85400 height=29 style='mso-height-source:userset;height:21.75pt'>
  <td height=29 class=xl85400 style='height:21.75pt'></td>
  <td class=xl86400 style='border-top:none'>1.<span style='mso-spacerun:yes'></span>Diezmos</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'><?php echo "R$" .transf_real($entradas_totais_dizimos); ?></td>
  <td class=xl87400 style='border-top:none;border-left:none'>5,996.01</td>
  <td class=xl88400 style='border-top:none;border-left:none'>70,267.11</td>
  <td class=xl87400 style='border-top:none;border-left:none'>65,071.85</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl89400 style='border-top:none;border-left:none'>5,195.26</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>2. Misiones</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>10,022.90</td>
  <td class=xl87400 style='border-top:none;border-left:none'>15.29</td>
  <td class=xl88400 style='border-top:none;border-left:none'>10,038.19</td>
  <td class=xl87400 style='border-top:none;border-left:none'>9,970.70</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl89400 style='border-top:none;border-left:none'>67.49</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>3. Fondo de Seguro</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl88400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl89400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>4. Evangelismo</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>5,856.53</td>
  <td class=xl87400 style='border-top:none;border-left:none'>23,314.72</td>
  <td class=xl88400 style='border-top:none;border-left:none'>29,171.25</td>
  <td class=xl87400 style='border-top:none;border-left:none'>5,485.65</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl89400 style='border-top:none;border-left:none'>23,685.60</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>5. Juventud</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>168.07</td>
  <td class=xl87400 style='border-top:none;border-left:none'>718.35</td>
  <td class=xl88400 style='border-top:none;border-left:none'>886.42</td>
  <td class=xl87400 style='border-top:none;border-left:none'>16.81</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl89400 style='border-top:none;border-left:none'>869.61</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>6. Ministerio de Musica</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl88400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl89400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>7. Ministerio de Damas</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>274.48</td>
  <td class=xl87400 style='border-top:none;border-left:none'>707.92</td>
  <td class=xl88400 style='border-top:none;border-left:none'>982.40</td>
  <td class=xl91400 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'></span>27.45 </td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl89400 style='border-top:none;border-left:none'>954.95</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>8. Literatura</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl88400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl89400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl92400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
 </tr>
 <tr class=xl85400 height=27 style='mso-height-source:userset;height:20.25pt'>
  <td height=27 class=xl85400 style='height:20.25pt'></td>
  <td class=xl86400 style='border-top:none'>10. Educaci&oacute;n</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>1,952.18</td>
  <td class=xl87400 style='border-top:none;border-left:none'>26.72</td>
  <td class=xl88400 style='border-top:none;border-left:none'>1,978.90</td>
  <td class=xl87400 style='border-top:none;border-left:none'>1,952.18</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl89400 style='border-top:none;border-left:none'>26.72</td>
  <td class=xl85400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>11. Distritos</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>5,856.53</td>
  <td class=xl87400 style='border-top:none;border-left:none'>6,978.42</td>
  <td class=xl88400 style='border-top:none;border-left:none'>12,834.95</td>
  <td class=xl87400 style='border-top:none;border-left:none'>4,500.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl89400 style='border-top:none;border-left:none'>8,334.95</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl93400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>12. Depto. Ni&ntilde;os</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>103.54</td>
  <td class=xl87400 style='border-top:none;border-left:none'>470.92</td>
  <td class=xl88400 style='border-top:none;border-left:none'>574.46</td>
  <td class=xl87400 style='border-top:none;border-left:none'>10.35</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl89400 style='border-top:none;border-left:none'>564.11</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl93400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>13. Frat. Hombres</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>165.40</td>
  <td class=xl87400 style='border-top:none;border-left:none'>773.85</td>
  <td class=xl88400 style='border-top:none;border-left:none'>939.25</td>
  <td class=xl87400 style='border-top:none;border-left:none'>16.54</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl89400 style='border-top:none;border-left:none'>922.71</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl93400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>14. Esc. Dominical</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>155.54</td>
  <td class=xl87400 style='border-top:none;border-left:none'>1,196.35</td>
  <td class=xl88400 style='border-top:none;border-left:none'>1,351.89</td>
  <td class=xl87400 style='border-top:none;border-left:none'>15.55</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl89400 style='border-top:none;border-left:none'>1,336.34</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl93400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>15. Oferta Especial</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>1,000.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>68.81</td>
  <td class=xl88400 style='border-top:none;border-left:none'>1,068.81</td>
  <td class=xl87400 style='border-top:none;border-left:none'>1,000.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl89400 style='border-top:none;border-left:none'>68.81</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl93400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>16. Fondo Ministerial</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>4,633.64</td>
  <td class=xl87400 style='border-top:none;border-left:none'>13,985.75</td>
  <td class=xl88400 style='border-top:none;border-left:none'>18,619.39</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl89400 style='border-top:none;border-left:none'>18,619.39</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl93400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl86400 style='border-top:none'>17. Fondo de Obreiros</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl88400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl88400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl93400></td>
 </tr>
 <tr class=xl85400 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl85400 style='height:21.0pt'></td>
  <td class=xl94400 style='border-top:none'>18. SUPERVIS&Atilde;O DOS ESTADOS</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl87400 style='border-top:none;border-left:none'>22,086.04</td>
  <td class=xl87400 style='border-top:none;border-left:none'>96.62</td>
  <td class=xl88400 style='border-top:none;border-left:none'>22,182.66</td>
  <td class=xl87400 style='border-top:none;border-left:none'>22,086.04</td>
  <td class=xl87400 style='border-top:none;border-left:none'>0.00</td>
  <td class=xl95400 style='border-top:none;border-left:none'>96.62</td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl93400></td>
 </tr>
 <tr class=xl85400 height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl85400 style='height:18.0pt'></td>
  <td class=xl96400 width=250 style='width:188pt'>Totales Moneda Nacional</td>
  <td class=xl97400 style='border-left:none'><span
  style='mso-spacerun:yes'></span>-<span
  style='mso-spacerun:yes'></span></td>
  <td class=xl97400 style='border-left:none'><span
  style='mso-spacerun:yes'></span>116,545.95 </td>
  <td class=xl97400 style='border-left:none'><span
  style='mso-spacerun:yes'></span>54,349.73 </td>
  <td class=xl97400 style='border-left:none'><span
  style='mso-spacerun:yes'></span>170,895.68 </td>
  <td class=xl97400 style='border-left:none'><span
  style='mso-spacerun:yes'></span>110,153.12 </td>
  <td class=xl97400 style='border-left:none'><span
  style='mso-spacerun:yes'></span>-<span
  style='mso-spacerun:yes'></span></td>
  <td class=xl97400 style='border-left:none'><span
  style='mso-spacerun:yes'></span>60,742.56 </td>
  <td class=xl92400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl93400></td>
 </tr>
 <tr class=xl85400 height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl85400 style='height:15.75pt'></td>
  <td class=xl98400 width=250 style='border-top:none;width:188pt'>Equivalente
  em D&oacute;lares Estadounidenses</td>
  <td class=xl99400 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'></span>-<span
  style='mso-spacerun:yes'></span></td>
  <td class=xl99400 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'></span>20,811.78 </td>
  <td class=xl99400 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'></span>9,705.31 </td>
  <td class=xl99400 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'></span>30,517.09 </td>
  <td class=xl99400 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'></span>19,670.20 </td>
  <td class=xl99400 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'></span>-<span
  style='mso-spacerun:yes'></span></td>
  <td class=xl99400 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'></span>10,846.89 </td>
  <td class=xl100400></td>
  <td class=xl90400></td>
  <td class=xl90400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl85400></td>
  <td class=xl93400></td>
 </tr>
 <tr class=xl102400 height=17 style='mso-height-source:userset;height:12.75pt'>
  <td height=17 class=xl101400 style='height:12.75pt'></td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td align=left valign=top><!--[if gte vml 1]><v:shape id="Imagem_x0020_4"
   o:spid="_x0000_s1678" type="#_x0000_t75" style='position:absolute;
   margin-left:9.75pt;margin-top:4.5pt;width:222pt;height:22.5pt;z-index:3;
   visibility:visible' o:gfxdata="UEsDBBQABgAIAAAAIQBamK3CDAEAABgCAAATAAAAW0NvbnRlbnRfVHlwZXNdLnhtbJSRwU7DMAyG
70i8Q5QralM4IITW7kDhCBMaDxAlbhvROFGcle3tSdZNgokh7Rjb3+8vyWK5tSObIJBxWPPbsuIM
UDltsK/5x/qleOCMokQtR4dQ8x0QXzbXV4v1zgOxRCPVfIjRPwpBagArqXQeMHU6F6yM6Rh64aX6
lD2Iu6q6F8phBIxFzBm8WbTQyc0Y2fM2lWcTjz1nT/NcXlVzYzOf6+JPIsBIJ4j0fjRKxnQ3MaE+
8SoOTmUi9zM0GE83SfzMhtz57fRzwYF7S48ZjAa2kiG+SpvMhQ4kvFFxEyBNlf/nZFFLhes6o6Bs
A61m8ih2boF2XxhgujS9Tdg7TMd0sf/X5hsAAP//AwBQSwMEFAAGAAgAAAAhAAjDGKTUAAAAkwEA
AAsAAABfcmVscy8ucmVsc6SQwWrDMAyG74O+g9F9cdrDGKNOb4NeSwu7GltJzGLLSG7avv1M2WAZ
ve2oX+j7xL/dXeOkZmQJlAysmxYUJkc+pMHA6fj+/ApKik3eTpTQwA0Fdt3qaXvAyZZ6JGPIoiol
iYGxlPymtbgRo5WGMqa66YmjLXXkQWfrPu2AetO2L5p/M6BbMNXeG+C934A63nI1/2HH4JiE+tI4
ipr6PrhHVO3pkg44V4rlAYsBz3IPGeemPgf6sXf9T28OrpwZP6phof7Oq/nHrhdVdl8AAAD//wMA
UEsDBBQABgAIAAAAIQA0BD0jKwIAAO8FAAASAAAAZHJzL3BpY3R1cmV4bWwueG1srFTbatwwEH0v
9B+M3htf1reYtUPIkhJI26W0H6CV5bWoLkZSdjd/35HltdtAodR9k2dG55yZM9b27iJ4cKLaMCVr
FN9EKKCSqJbJY42+f3v8UKLAWCxbzJWkNXqlBt01799tL62usCS90gFASFNBoEa9tUMVhob0VGBz
owYqIdspLbCFT30MW43PAC54mERRHppBU9yanlK78xnUjNj2rB4o5/cjhQ91Wgl/Ioo3+TZ0Gtxx
vACHL13XxHG6iaI550JjWqtzsyl83J2vQVeQFnmSzanxyoi9EFo1kzTlDD7H3JWyyP9MPN15SxwX
cZpNYiG3MF/5BkY8iTztGdnrifHzaa8D1oJheZGhQGIB1jwJfKQiSFG4VPk7uAKcZ0V+mMkr/A9O
CcwkUKmHHssjvTcDJRYE/BLS0ELv3HRhEOH9Aa1exfj5Wx8HzoZHxsFAXLnzanV+E/9qD1XXMUJ3
irwIKq1fRk05tvAjmJ4NBgW6ouJAYcr6qR0bwpXR5Cv0vVYoDAewrKaW9GuxHFQHQ3S63NBn4MmA
ZcjudzEDbM7h/Em1sDH4xSr43XB16bT4HzpgqMGlRvltuikSWMzXGpVlViZZ5PYBV/RiAwIFSRnf
phG8NQQqkjIrfAFod0pc5aCN/UjValWBAwIHYThjp/j0bKYxXSkcnVRuD9eOYOyRy7UwiyDvJ5eT
lc686Tg/DIQz2N8dttgVO4vfvJxjzL/UzU8AAAD//wMAUEsDBAoAAAAAAAAAIQD9q+pBvkkAAL5J
AAAUAAAAZHJzL21lZGlhL2ltYWdlMS5wbmeJUE5HDQoaCgAAAA1JSERSAAAByQAAAF0IAgAAAEHd
CscAAAABc1JHQgCuzhzpAABJeElEQVR4Xu1dBXxcxdafK+u+m40nTVJ3h1LcHYq7FpciHxR4QOnD
7eEPKQWKPewh7+GP4gVKXVJJ07RxW3e59p3NlNtlk2zuStKE7v2l/W02I2fOOfOfc86cmUsIgoBy
T44DOQ4MKQ5wCFFDgWAAFyKOzoRfh8IIUNo0k0NieDkicxzIcSDeCBoSwAoiE4EVEw+/8mkJcg8a
gPFrg0TaYeWDJ4etEtnVv8X2oOr0NjC2f0ecaz1lDqQxyVPuo98qANxgjUqOOL1pXfzY00PnzEcm
fZLilY/IxQQyZ3p/tzBUHMD+5kOu/RwHhhAH9rzdKn01GEJszS6pWXEAc3zOrlByrfU3B7BnPXSf
PY+tQ9rTGUKCzzqf95RrNoR4vheSmsUlPCsmRaoiyCKg73lsTXXwe0n5PYhc0d5ZHP+nnOoMOVXM
InD0NvY+l3BQbMDf3tS7t++zCNnxlHdvNouAnou3DrkJEiMYQv70kCQ8R3SOA9nnQBppUvFV0qgu
ZQw540MKlwZdmQEA1gGwcTJk6+CnMMMB7rXVk3hOPfIkuZPX41/j7es+be00BAF4ncPWNPjWL1X6
yetJm1aJzlGq0yBterpXlEhhFnvMNSWdA5kohlxCN31m+4pLbwLGJUy0fgq+AV6T/dS0BOb8BYtk
go9SFs/49jPpKyusx7orZRpkpbtcI4OWAz06ELIMyO0xyzVB4RMyXrvHcHtbehMmWhLrMkPHKBdv
zUAF9lxV8ZTLniMh13OOA+lzAEw6ADX8/yB5kkdd08gxz/7QMgT7QcLoPUiGFE8C1l68/EopnN5Y
siLHPW5cx489KyNKj5l7SS1GskJi3MkW+mRFsskdxzQCUDm7dS9R+9wwcxwYdBzopw36QTLObK0c
qQ0nklrxvbd0/9l9sNQnWe1Dey/L/yIjT8+U6z9965GtUvYYevM8MtkrSyJjML2z9Qyc3frXXqOy
Io/BE37K5c9mRaB7qpHcXNtTnI/vd+Ds1v6OD8KosrjmZEs20g0BgLP0hNEfC3ga+bP9F/nNliz2
nnZStQcHJ2fS0yjpMy75qPvsPb5Aj50OnN06OOXXH1RlbjUkGLD41/SazVmg/SHivbnN9PRwL+RY
eqbSXsioFIachtUACAgqK0Y5sVTExRD/mkazUAtboNCUlABcttb8FJiVK5o6B6SIMvVWpdZITw/F
1tPWMRh19yRWqUT3Ui4JMSkdMUgojAWUs1slSSdJJDSNxLfuXeILLESLYN1WFGHQ2i3omAPQ8GJJ
FOYK5Tjw1+PAkLaRs4OtGF+ygjKDTT8SUPUfS1BVCTriSKTLKqHAOjBOwSJ49d/oi19R3fcb6RIu
L6xaQxU/PU939vG7OgNicGZr7uxAVtmfayxlDvQT6vVTsykPLxsVsoOt2aBk8LaB5b2DQW8s8r64
xDk8z1swevjj92iqTBnRDDtvGE+xy+9F6KEXop99sJzU6CmtoUIlbO70lGiF0rJpLz8WK5PG/lJG
9OUq5ziQ40AGHMjFW/tmHsBfnRudcPCOrz5tPmxEkJbL/BsbZbJkEczuEbHu38CBazD2sQA6gmj2
5e1L31gRpMpGCWZtNNjZEVDKaG5j8IiDEZQc6sCadpStb/HkSgxWDiTk7fS4875nY8f9yrkctvbB
XoeAltWguxfW5+eHzHpqHeI0EafbbDRpkr3EuPsJufhv4oEGFA62sObfHdU5OyLDx4zPZ2r5QCji
JqJ+mhT2OXv8acch34C8F7Bf4S/DDZB+nQO5xvuJAwnXtfSINWmcJU2VWqzYydW7R9zPMLsxh619
SKpuLbr6rJU7G1xhsznEUMZQ2B/hBWVbtM/8t94bxkDj6/ofBPDaa+i75esUURUdDHVwOoIN8VG5
Zuy4CdNGPnq3SU0i/YBYrTn4S3XS/vXKZ4gme4ohCbgZ/6sYwE2u3j3iYJI73rBJ3j3FNd5U30vj
rd1D5t0zAeCbx5egDz/eHOUZo1XNtCKXJjrS7z3o6OI5ZwyrLNuVFNVj9F3iCSuwR5/+F3pnyQaT
KdjKkoJQqA0EGNIf9QsnHDfqkTuMe0pZc/3+BTjwV9oXGori2EuxVYqoXliGnvrbcs6kHKalI36F
T+jklRYLSX331kiSlprJL+7siz1CBAB8JdB7+H9pPTrv9GZLeWc559cK2taoQaGidjQ7F88ddeRV
WrFKGCHlHxlaYFmkcWVq9xSOITTx/pL5J1I08C9fJoCQ5s+DTK6WKSlt8lMzYGCmccNsSgTkYgI9
K/A3teiTf7UV68hhYX69T+YSeCtHWtyei84aFiJju1gSPWicCRD/YJQEuda50N0PdE4odqtQOMKM
cOdZFJx9a1R23RkTZ1wWA1bR44Aq8OB20gBWqNU9qiWR/sEwvQcgJDcYhjlUaMji7lMCsIpK3hsr
uittj5E5nC2ePJCWBFiTRGZTmjU5bE2UI3D2pc/RdTe2eF0B0uT2y0xltpYindvl5KceOvySU+Qa
MgZVWAC9bTKJ+tc9EgTiAan7GHTxGeGwfRvPe0OsPKRwdtgdnYg+ON8z92qZqksvRNkMyFZWH1M7
g/DyUAGNoUFneoLIYiBVXOr6dfNTojB6xK94gyYNIlMC0CR05rA1kTnLt6FXF27WyH2tAVYRMvlR
p9Goa3Kpiio1t92YJ5bGAuhtbRT1L15OIhwDVv7zZd7F/KJW6IOczurR+ZGHChKTRikXvzJOr0OK
uPOvuJc0VESidkosllMUiYzq72LpCSI9dyf5WLKFQf3KsT1IZHqS6ldu7LHGYW3/90p06fX1BeOd
AoWm0dFNDClTCoQQ3c9kfPCWKYWq3bRJNB8gooQfAEdcBYBy+Ur07n9b5QrUzCiCBiOvQUY2SgVl
t5w6XkvGCkBJ6ArogVrY4sAqIiJs9w/Z4poUG/mFTeigy2yyU7kHf0UwwCzaRNkaRa6deA6Iupd1
tkicBcn7FZ28rLSW0FeGRkkmAZDcXtZuWazcgW57eEdjjadUz3eY8iz+sM/pVKk1FMm+/tK0ESV9
v94nefgcxAw/QYTOvNUe3VTTLFOWhrWdSoImwhxV+PcL8o+eE7NYYbkTzxCLp7a6B9FTCqunMakS
2se/frkTzX/dFlrmKKMDCoKrC1DHXjb9kQtjK0Hu6c6BhhB6ZwUaU4HmDBt67BngG9T6SZ/34Ebo
XmS39raC4dWyHaE7HmVq2x1WfUijoOQ2QcM4bXkCZaPnHjwCgBUfUe3twY33GCIA6eIu8KUBL7+O
PL9Xu6wmnlVso7yRkHdrRP7mXNPMA2N/xflx+EZBscfuW2f9pIjxo8OWMrwhArIU4IEhnHcPWnDB
j+pfG0cbSI9Ms9UXLKI6fnm/zYEzdXPPnzmwsRHd9WD4vw8vv+fy9jVDhDnYwsVKCFoHH7BTkon5
JnHoCc67OFsTHKlUbdveNkJTbUfiKOKLDTS2ZmiipzFCsUqPkRe8pdjqQRfPdbY1Vo8SKI6VOQM6
MxUJEQZFo/6Gx8ouuVWPd/aT+MsJjcdLDqSLFTQcQR+uRu9+0YD0KmU7J3CuEYIt5AlcNbN40nGy
fEusC7BboS7uCKcHwIOZFt9mP0WR4q9xw9ceAklAhg2h6+4RNi7/xWrQ+mnkcnvllK1Spg7JhfNP
YEt1g/FW8kxUJSt1eQrV/lzNUHIzFXz98aw02e+NiHcGgbKBKoL0MUDgaZLGkzaEiRoeb68ADdkC
rGy1k4QnA9DFn3rvJ1BIQ+oYs2D8vjA656ZQW10trec5Wq4dofcj3mhQ0rz79EMMZx6iA5qxikhn
Vrwi/t6KmC5wDdJo8V3N20PNUeS3uZmoX7GBzSt2mS65Rg9/xXoMlgJOgP2pBn3fhmZch974LpaW
0ONhhN6sibSjsdARjkJAd0AyGK3w2QVHcq8Nr/ztR5cFObTyYpUQNRkqqEi9qn3c1ANuuqoMEz8A
pk16Ut4jtbY70GVX+woJJ6UIsBTx9C3pU5E2PKXRJYgb5A5whmP9n2xFeZPQA1/tki+mJHlEPoFa
3GDmD37D3qBCj/hB9aj8ez7emoAaIR75eMQQ6OcfkM/OR7TkdX/csJe5hOJbwE43qNHL76Ml763n
ImElSVGUOdAeoI3BOqri1EnUteflTRgfq5RS1CZ+RP9biebdtM00zDBxP4M/QKz4equRdyGtIhIO
ejgl4Q5dfsWMu642gt8NKqtGyMkilw19tAK9+UQ1E+blRJRVy/52z+RzDo6REb+Gp0RSj6wTA2oJ
EQbQY7BZcPsehE6dZ7Ovd8hNTAEfbo3qOIqREVGvkz9uqumpf47AXqT0FNQBiGZkV0/Sa+3tj9BT
r36tpdSIsx57yJibbxnst+1gpcXSAaG/8AL64Kc6eavHqg/68itHDCtZtGDX5ZZ42wB7Y5mkH/zl
NWGAsFUKH70R1BRCb7zHr/7cGVIqXB07NGZP0JtX/e24/luvlryOHn1jhVUFR/jNLoWyjAg6OcAO
vVwrvPDM6NH5sa0n2KgBAgCJsFmXANDJabvvsY4l/6uJyAWSVVnk7qBPo1DIKD7CqQVmLVM8vujm
BePKRqPajejVzxi3h3Vu6KxnnTPk7TaDAglUuabdy5f6bJpX35iyb1WvKB/P3h4tXIkAIc4WDKwb
mtEl17QwweqCsmGM390R1kZZtpzl6sORsw8dNm9+SaF2T5oSUpRK4sB7LNZb+0k4LB40Ouy4Grq1
IzQMqUrHffh4nlqVwvKTCc2Z1MXj/boOzTtpR6ikrdioIqIara64wd5BqIt++UCT92fHDbQFezkw
NWAxTv5gexbK9zmXk4g169trQBXQA9reHzd2DBC2JvA9AQt2NKOVy9F737Q4OoNExONVKtRyUsHQ
wUjgjlvHzTlYDDz2JUBpf8e9A0NtHeisi2uQyhmNaAiB1RcQTY5IkV/utWieeHz0/sNSs8jizVs8
/RgBXTmvaVNtDSRW2SL2gIeIyOhClY5hVUqhA1mUrojc2qJ1mpBVoW6O2kcSgVaTvopjqh15Vr0n
xNAaha84GnLLKn/6chI+sNA9LpEJmALNvamy04eWvOl4+7PtCqXaw2u1yK3zsW6Dti1E3nNF2RWn
qNM7NShNREOgVHe+gUbBD5hyjz2N3v5sdb5JKCzRvfTk6KGSRAHEt7ajo87eVGzycmQ+EVSwpFtn
LZk9gy4v0Z16Ctp9CrsX+WS42mGNitdnvLEGLO0TkQehxkgPIWaT+HhOPfUsOmPuxkee+6nR08Ig
H1GksuiCfn/I6QofNtt81IHK9ILoOEDT/RF37TdsR2eduZOStUdNZNm4UWVmk6PJOd6v/k3unTbC
csCwGOj01khvvBBdY7xKN9vh/JWMEywCL1NoZLxWMUwZMvo9pR4HoVNGXHoDSTaP4fQFeXA/QZmJ
auer/EKkOqKKql2cDLEcqbYrXbxh/KRyDIKgZ93fZStdhN0v78GmRAKHcfDo0hu9b31VQ7ZQWuRS
hLwqKuKkqGBb8LdXRgOwwgDTOI6dTR3ao20lGAeYFpA+oMCPa9Di/64aTrmaI9E5R1QNfmAVpf/8
m2jqST8YjFSbShbuCMpU6JvPJ3y+yHTXdboLT4kFrPCTED8FbYEdAtyIdATE5RMUDzQqIRsHdBss
4t5SCLKrAlnfMMi+3drb2pXwfZMN1TvQF1+F//fbOjOhYbXycCtB08zRM0zTDyuuNKCycqQ07LqZ
P7tMxJS89jH7wgu/aAx6MmQdf0Txmu82qQW+jWEPH1u28MF8lRIpukQqki09uoQdarHiGRe07Wxd
7w0KHBVWCZybEgoCNK1ROzWc2asjSDpkJsNRXhAoMx+7vvCUWeXmsYpn3thUygXakZ7wCu//tN+o
Pp2uvngkmgMJuADf49MKGKPxq7xf/By988y3HbSuSB/2t2gthZGAbORwFf34k8Z8XV897d1/X/Rm
cPELv6jL8uXesidfNo8vHQLsgHD/w4uin3y8xSsTqsJupB1z312FM6YlLp84F1DUE3FgoD9466JH
vwqKYdgSLY8eXXspNi+UwcH9zDcbBkAq2cfWPon2RNEqO7rv5ja3v66UVLRRBo7zaCKaisLis86Q
n3SCuED22dJu7OtTMPGheqj25efokSfXeCysRW4YbrJurq6PlnFsJzFmyoS3H1LGSy6h5e4dYUcm
3kGGEC0Uw/dQvL0c/XPB6k6VS+1VRFuDCrNqh1ExJ99kpOXbGHmgs23KpCrGL2tn3dcfV5o/Aqm1
aEQFuusl59r3VtrNqvbm4HFjxzz6WgU2f9KICuGNKSkPjJqNIoUcvfklevaRn2QWkzXsbw67iszy
r9eVPnDTmFuvkdLMXloG8/mrDWjBzetUXJiTm04+d/TNF/VjmDXD4GO8kj/1XPDB/6wbQ5OePBRs
1r3x7Pj9JsTkmKA8uyJdXQgrvj9YNCphCojv0cBK0H3uJI9sigs8zCBAAZwQFo/XCeECIA/mRYZ8
6Cd9jY1dENLzuVMjCQuy1Y/W1qCPPgpVr6wxmTkPXeELe8cphVMuLDpqpspoRBSRsnMhnQ4sA/i/
w43O+78dro5Gs6COys0+waMN8IGoZuKYYQsf1IywxJpMsD0l9gKyx+IHIxeCxM4IuuGSzhXeOgPL
Oji3kjBHI5FCdf4bb0+oNMeaxIgcYJEmDjXX1KLLL17O68MCGS4gi996Z5JJG2uzN98/Id4qZUkX
1RHXxb/iz8ur0enX/jQxX2H38pEgUWgWOljjMYdar5+bV2LarehSepHItKFSLMn6jVm3oRadcUVj
KdHCIoVldNkHL1ihShrL4UAyBCgHIDv3fJurrZVWCt5A+LLLp1x9njJ+5zbep0nYzrVzyO5BZhUK
RBC4eoVdOyM9Mir5rgCO1OEok2isYNYBdsM3GM0bnIiBWJkLmfNhtyKmt2IGrsi0DLcfssh86cG6
NDvFyA0iWeNE59/suvzezdXVcNrT3G5XRoK+S/ZVvLqk6pyjVFpTDFjxtl18BFBKEAQM4R6fhNAk
hg/4/7r7eMbXqQzoHVEVx9lYLsrwctZs+ft8zfAuYMUEY7lKXHlwMeAm9o+wlnQ2oG88fmM4zDLI
2NLRuS5soZVLXooBK5TB2aNAOwZW+BUGC8p66qUbGJXdTKh5Q/HXn06yamNtYj6IxIgRru6nxcQ7
uuLLJ/AHswK6BgJgaxs3C99AL4tf6czXy2o9eivZbtTLWxy+808se+CWvHzTLn8QcxXzR4p0epZN
v32LI9398SQJJuJON2+MGumwv5gKq2UnHW4FFu0RYJXIAZymCgpgc6BWW1BmZL1sdLNSoVIFY363
sPusCjYe4YHhxJggoM92oOufR4ef5d7/lC3HHrql9LTWw8+pOffkzlerY8UwGiZMHBFouk8ovE6L
4Xv8Af4XkwrgA0Qt3t+Krr/NeebZG445bfnNr4ahSo8OGY4b9PlInNd9tpOkALVw4cJM6vdZF/gS
4NAXa9HNN20jQ015ITVhlNE8e8+8YffeZD0YMvPJmBhwopyovuKHJNiPgRgeZddEF38VSUpIusRJ
0f/8FC37fD1DUDIUFBBLymQEI4fjAc88NGLSmFhVfB5J7FdieD6+GPQC1b/ahF57rzncUt/B8FaZ
LCxTyRRo0UsHThhFiiFO6AtWery/jPXprXedDT9tM1r5hqjskSumjxxJYAsCfvAHbBRgzYPPOPaE
CXaz6OetaO129Pibtma3WmkgIEcqySMuNvgDNHjnY75vv9lgYDmr0dkcMSPWcf6lh946F14rE3vw
HIDPeLC9Bdf6VIl+LSBRXtmlAXjyyTL00PNNlLpD2yKcednUK8/cI4T8aRIlH6MoU4UalXHkhz/a
jQVhtSNywBGjp4wgiC4PEtuA2DeHpw2hzz5DFz/n+HFJ3bIdbcaIS6sN60oilaTMQnENfGjzx7Yt
nEZjkZUbd1XBgQL8xIJOf4RlxTZxDBczS/wSPjvBvwyg9XVo1Qb01PudCx/Z/sPSjnBHnY/0l9KE
s9bHlBbOqNxdC1u+onuHJ0uSZwDEMxAxgf3P73DuaC5TMYJBvrGDX3zTmHHTtFVVyN8FqfAjfZtI
FBI4Mk0R9OJrqGZr6K55quYIOmdsr5zEaxRw89cadN3lm8LF7qIWXYfcy/kRXZAnc6jue3rY8TN6
Ddwk9zLEmBTuBWQMtD39Bv/N2zvbGB8hd5R5KLuAGDPx9ZsHl1n+dMQLWgYLFOAV9ADauepxtPrz
r9x0mZJxHDXhwGeeg3UnZgIkLOzQC3AMw6vIuk0d6M772xp/bYpoI56A0iWEbpl7wIWXkxWy3Uom
DgQDNHSNw7g4vHXxXb7PN26aSgq+dqe2KH/bDvbiMybccacOBISnFq4ez40+g7l9xsGT6v+Q+SPw
YfasDXSpR+UzoTzih7fHw8CTxxYHz9jAceGD6PQzmuqJ1uKW5p0l4//70ZgJ8l27RqKOffwTuvLW
xmGWWtJYRYZIPkxs4kIqW4dSV6QpRLIWpp1rNebna3b4jIcUfvLccF2XVscHncQhi44d/utOB6q0
oE/XoRHD0f9+Qc3NqNbJ1H+6vYPyFavkgZDTIKc5mvYFWafJYHIzKtJerYyeoN/n5XcK87pMWphB
oMPYkMCTpc+YVaqYk5K8sNr3L7baW9H1T9g8Wzwc3emJCBpeNnVyyTULSvLlaNUWNHUKAgFgDwLb
elKezgj6YSl69hU7Q7idrs5ytX9zoHh6vu6mu4cdMiFZI/9Zg/71pLPO32gOB1uCgk7jc1EGQ4S6
9prp582hsPsGIoF5gnfT4nGht1xOUYT4A86m/nUVXK29nq4s0jq2+p0hdZSrVvP/vO2Ec0/chYnY
CBUdxo4w0ijRgvs9v368kijSwiHcORdPuO0SUJs+HnECv7cUPfjA5ny9PKwRgt5AiIWTbSSpld05
b/w5h8cG0n2eYzyFB6/wL73Pv7Zoo0HvCxCsJ6A1UOxjD8+YPZGGgUOB7olE8Tg7eCJcfTEsUaxS
yksp8/kP6J4FXxksZtbHX3nLrHOP2b0CDYnVxRFCF98WtO+slkWbuWihbsrkL57UiKYfqMcdf0c/
rmq1k41Gp9GbJ5QQin2PyhtLRzk1aTVrC61yhhZ+/brjo6/dgsHvdkbG7jPmqb9ZSoyxFO9Fn6D9
pyII+kGmYViBNvyGDKWo2Io6nYgMog11aPWP/oZooGVdu0KnC7maNSqBlytojVJOk+GQStC5Ik5C
HQpEBbbTQJW65QE6HGZ4uqywQGa87/ayfUft2nMDPcQ/2AmOn7N7RAr9i62trejUyzYgzs0LcDQJ
BTVEfbO6qEghREkDxyqj5fufW3Du+Whc14rTG37FG0fPvYKWfNzoD7YqTcYopY54HB1B74g8JthG
q6vGrPtXoTgT4rdrYvGaCDr0tLpAxK5UaHxMp1aHfAG5z8Y+suCQC07aVQmHaeL93+TzKn5tBOGB
GQh1Ix507kU7nAqHxtG8TUWNtCubPJ1Hn3fUs3fmYycLl4RFBdZb0SR8/iX07OurkIpTabwliuJP
P4idtO1xAxT7TVBXxLvbn2SX/ff7qLac1ETqnaTFpBtDyn/rbJg9Y8Y++9DzT4u1AxwQ4wmYz0AG
jn4ADd+shHfZ/iCbqigLBoMsuYMOPXrLcecf3gMS9aaj3ZMlpEBSfBmGQ7LkXlyqLXaNLm3jMaXZ
eM1NravqVuXz2hb1sLXvDx88O9cJFiJWKqwM+BFtgg9fYxd9siUQrCfMpuHFo9980opLxmJNbnTC
0etbi7T5nCvIqwvyC95/zWKNE8c2BzLB+RcSXXxy/UaPi6X9pojp+f9MGGlG9zyIvv94hc1ghhuK
7XKzkmv3eHmVmlUb84V2r86E/F63qSwStSmJQtrLUDo7zVSyZIPVrvKaonITK0QJdMoZ5i1bbPXV
Xh8hyBlvg0Y+Fpl4WhUIIcsI/dxbS+vXoxtP2bWewdTAUxgjLIxCDBSkrkEZ1egDW1PSsO6EdPjQ
bfd4O2pXB8KkS+PWEKYQR6l5ys4xRXplY7jDwtMUWXXNFaOOOwTl46ylPz8ifgEqPbeYeXJJdVmR
ICOpeieqJBUTZ6r++8MWtV5pdu1ktCMPuOCARy/cVT+eckcAzX/AXV2zQy8XnHYBbiwgfCi/SD3/
9pmH7Uti/QOTE4c1cUVRsXBcpsfZgmOU8CNeJAHifPcr9M7iarvPI/N38GpZ0BY27FPx5aKZYkwT
6ytuE34gHr+8Fp1z/eYRTGsQ3K3SkieeKIKNI3FWJIhANBIxZz74Hj1332pWG3aGi2cOV146twCO
tD339JZ12zuZSPlnn1YOj58Ef/BWbAQI2N6JHnmwbsfWnYjSbmbCJ4w0X3zBpNn7IJLcFdIVCc5E
GXqrO7Rs3u76CWJ67OnIe++vkFkjOmbEolcqRv6xvktkl8Ri0md58gbjDQjcJmgvdqJPPHJVkOwE
QCvW5r38zkjY1sUB/V9Xootu30CpXf4gb+CNAlKddVX51GJ1p51dsdlvNfNL/2uHHINx4wqbqmts
voBAKWk4fKgsLFKqW702rW+zk1DlqQpgx4FmHa00lR8hArRCw0IeCiPI5XpEer0cvDwezoWPLDbA
dcllhGr0IepD99Nw8hgskEp0zY1NG9Y0a0zRDkquC3JujtXK8mQkR7BOmub0RQWLXp5IeJHNjiqq
YumPeNsNmzJZXLJTUtf+tVtBcquWo4cfWbU9EJ00Vbfhh45oKQkv32sgQyigLDfynYSCNvjJei4Q
HXnDM8Pmzo6tNjgOiGORGG9XVKOr5zsjZIMMaZUlMvd2m0xhvvGWyjmzyfOO+7q13hkuVcsJo9pc
+d3H5VAlAQovfRRt/n5Fni2y08ipGJqWc85Wfsm/Dp49eVccQgy+uMGI+x+adSQEzXbtXSbEvEFU
8IN3TrHw4kMZn21Fi971/7681uyvLZKZwgK7LRJaeM3+F59XoOp6y1b8g4n8ZQ06Y/6Po4iIQsVu
Chl/XDJ7WInU/eW770P/+2FDK8EW6hXjqir/cb86T4meeYt5/umVw6oQbZn8+fMx/mEUxvvCgAWA
5lEWCXTs85L/oKcfWUNaHUZuGMcFnbaONd8ebTbEoldyDlHU7t1F6XM7jZJ9RsfSaDPzKtjP6HFm
4m0Z4OSqzeiU038oqVTY7NGrbt731rOUvblfmdOTUgtJPOJ48BUVeEsHuumC37aq2srbiksqy+9+
rfjLV9E516FiSJ10oYvOrXNRQYczIlNGjArBvk1OGLyRvBKDENbROmXU70F2u1Jv5aIa2uci1ZDP
VRFGfk5dCYe7g0Ke3lVrUweVuuEMfOvz6TUwBz1h9f55svV+IhihhrNs3izLgovyxsYctljuCuCA
mDmwswWdecdGus3dwaLhVHR72FhoClBRGas2Gzur3SaF30kPL630Gxm5k+VGVs07Qj9xNipWIbsf
bWlG06uQQd5zZlhKLE21cL9jK6jgr2uQNg8ZVKjZi8bkoa9WBS1WuYwgN9d5As3c859traA5Ne22
uavOP3firVckDsHnQ48sdPy4c7OX0oR91JzjJ885A41Qo8Zt6IulOz94Z5NO72+itSNCmv3nHXrf
ubs2i8TNx63V6PaF632BSCDg1Rbqdm5HmsKOglGTvnmqAsMNjnuCLn71Kf/CW7XOVo+cJJa8PrOq
Yhclvbl4ooWLrd32DnTjjZ2dVFS+fkdwWDgsRG1M9I5rjr5iDry9cFeGE/boxduD/FH0fzc3/b6t
waLxOrmCRxdOP3JaDxJMsERwkGRbDbrqjqUaRrWTkR189LCFNxWAhbpsM7ryol9MeUSnl7x67qQL
T1CTZmSgY1a5eHYQphMroG116Mv3Wz/4YqdWG4qqqYBNGHVIxZknV54wg8BIh1cOMWohkpVk/yo9
iBwkYNTjzOlzRJ+/E7p90WpCTyicygefmX7k1N3NdLcfexvpAHAAugDFi18n4ocGGPTg7Z1fbqwx
KMIujqmwVmrkukh7izdkOO8Cq8GgbKI0779T1+60VcjB2NS5GJ6UKYwmJewshRifz9ii7zBRRsov
aKyVhqZG574T8s+aU/H+F/VBGbPth5DGpD/sdMvkMtWK34PySmr2cE2BCbXZUZEV2R2oIA/RClTW
leQHtgA49UAbfBAZWOtA997T2bq9nTNxEYZSCj4fqSZCAZ7RRlRMSTTQSTrNhIxsI5gipAoTOmOZ
rsIwPF/zy1q/P+I65dCpN17Xa8gxCWJm6FJkE1u7uxs4wSLeLAdTFAKvkMqKn502dP/fXWu3NHp1
Ml24wWsrX7FyvIXcnegKUj/5NNtG2RZrqNyoZov0pudetFTo0M9foSNuWWFW1svyAkpZidYVpeTy
ld8dhcEr3tg85rT2gKeWhI0bloyyfKMWHTW26ukHSiDGCyWxxdpWg/72im/dxztlYxiWizTYo6ce
Xr7ooSqgEJrqbYJhzBXDpoufjC78ZWtpuzdi6FSysjqn86pLj1xwdTHOAcC5ViyklXdhOW7z1Zei
r3y4ziIo19L8Yw9PPHsylQS5xP1QGEpTE5p/S81OW3Mnbx5ZSb31yiS4o2iHA1132i875HTI01pa
4nWFh+fxpUuWVAzv8lKhx1gQQ0A0gZpt6JpTV/+i6awIk5SOc3n5grKDf3hLh5eZeGM8Qb3iWZFg
s0v0vxLifb1pdoZqLTaL2+mxNfgSyzelJ54Dny9B17310zCSEoKWA28bc/+JuyUrthnzAPoK+XkR
0qdEhLTCSXSp042C3tgmhKsFffSKsybKBlt/Cxn1nC0qL/Oy8EIJhmOMdMBGqVnO4ROuPOuAxf9e
Y7F4efD4LaSNj45q9HUatZweRd1mi9q/nVCwEdV9d0458VAUCSGDDhm7Jhec9Pt0hbD/bKK0y7/D
q0iC5nSfX4ASoIr4uCPeEvjyV/TEU9UdRKEx0MLRaMrk/GsWFi39wPPmS98Fm0zuCQHjFot1dLvL
q2JURCnBhqJCm2A08nyeSu8ktNdfNPzC03vgWko+vjSu7yrVNdcyO5eFtbbP5R13iEcCIsczHGrh
QOcrr4Te+KjRqWwoCOY98uK0/bruSYEfF4/u+FvHul8gZ05hi6oPGFX8xKPWjk705FOdm9t5wtdu
41vlrIKKcgzJluZXLP1wXHy2EEzjD/6DnnthmYuilWEiQgbcPvLoA2c8/ahWTcQogQJA0lefsAsf
WmMwRIUCg90VCAQ6FBRt1ZfuM6F4zAjjlH1kk0fH7hYAMcNIxfNL8SOCzx/9Fz3xdl2ny1ZENiFC
Y4u4rz3vuDPPMkLmf/d5DkPzMuifj4U//HKLheYCJDrs2FHXztUX/nHwqbcYK1ZNuOJ2wR22T9eu
0wnag/YfNu//ist1MTaeedz6OtZl9znzeTmp1er0nDNgeubhabOnxXAcH0CA6t//gO598NdWWdjA
KDhZiAuyR548fcGVVmXXPXjQNRQTLWsp+pQtHJTS1wCX6W1otgDqsKMzzvy5pJBp9dLHHjX2H3dY
cdg9/tKm3pYi8SrC+OFkd56LmwG4C1iYf/4N8X60qT2wcWWkvY202ToIpZyRyQKsQ0/Ygiiczyki
tIGjuDaeLWdU7Qq3DoxE0DchwAZIWqbiQK/UTlVQR/CoRcbnayhKwVIuxCt0k/KH/+1xS5Ulpj8R
DhFdFjLO7Y9f3sTwVPdTFd2tIpF7+IONQa62mAcMOgzZ6SZZDElqN6Olvwbe+3QVywbdIbpYBlvk
BCeDS5AIkqdJHy/Th/OKjHfePnFMsdTD39J1LDnuZYqtPdLRW5c4RQlYA5mtIubAlzyLTj17k6+z
xafLu+D0yhsvMTE8UpLogXtD7y5bhWSmg8aMUpi56y5UPfvMhqUbXR5EFaAyVreDspEuZWC0dcq2
bdyTT5WduF8MLqFBnF307S/e8xb+XKayDpflVQsyS0Qzbqr57ltRsSEmb+wmv/IB+9Cja6MFcBm3
1hDyq+VUKxPW24JWKrjNII8Iqjz1mK1flIphgfgwK6gvRis/pAee/3MoFKTk7ZyrYCvRcvuZR11/
bRn8FWsYnjZiXfjw2LPoP//+nqYgWq885vjRC67v49C/yFLgzI132zeu2qaRE8t3Wr7+YNQ+Y2Nj
aahBp132VcAUEepVlsKQm0M6VbHfpz/12KJb5+shKgGdQhT7gbfC776+XKaVCTafkQvb83Rm+cQv
38lXx6EpphabyQkP5sOeBdPsYlCfEym+O5ACsLqmEf3fHVsFp4NH0WaSsUZm3nqdbPIcbQGDtH++
HMzJIzh3Ad81NCKfDk02oYiAvAR69u7Ggy8oB39i1QbGTMoOm70bg/qkR0qBeJMcRAZkP3B74Ot1
TR1BTymjJwlrh85RqWHlKnar117gj+rNshqfkeLbg40l+Tp2/KnTz9+H/OF7/+fL19WxnjEmHRws
dMvUrNxlsFE2lbPAWUEp5ap8Wh6mj5lTddIh9OjhuzcJ4ndKcVhJytM9aoFrxYOJOA2hMLSM5wzH
oJ2N6L23vd9+s5mgHeCJsVET0tMyIawfZ57IWEYdnj/3pCwrrRRrMgvYGj/TenO+sOeVoKb4yAfM
1a/WCo/d/HtEHwh7tAsf3veEWajdhR54EW1YsT2MXJRXP3Zi3qwJ9HcbWzeuqVGQGqQ3RwS+c3tD
UbkgOKuef2362Epk0f5JDA4GnXn+GtQccKvVPmX56o+suj/0HuCJ7toEf+1NtOSrFRGPgAgWbOCr
L5x0wCTDgru+3cEGIjrOyGpkWt2w/ImfvKTFlIv7++Kq6xeQkkCvvu989vktCsjh9ctpKqAjCz/5
6iDY38TJLhiCRVUAPiz9Fd165zLKrDchOMVS/sKrlgK6h8zcmAnQBXDYXMXifHepsOTJjWEhsM3v
e/mho47fP7bvBH/931L/HfeuEZpaAxYUIfOMZkKhHHHvLcMmTUb5aiSnYgvA3U84fvyqRqEJh+Ru
joFbx/KnVFW98GgRnAT38khBxpQVOsVyEWNzomuJYz54NwybRVjXk7jV0lG4R8SMry6SJL1NKVO6
zzLiCQso6QijG6/asnJ7I6WImOXK+miwOKBRV5iJoJeVq1VBxaT96EljTevqObMc1XTKhZawTOsb
Nka7/vsGP8tPOGBMS0OkvXZ7kNURfrhOozTqZPPMqnffGWVMNTaRlG6QEXZB4Kq5t55ua/CEV22O
qOQOld5kc8Eb24myqK3GGSwieK+BD/r0SiUhRGRXn1txwAydsQhVduWWAEXffgu3Kts277AzrR1B
cOZUuqqJuhnjdZu3uylau9/+BQfMIot1sWWYhjOOREwZ8NQQQTBBrElCTH2ilWiJx5vkUAvaxJ2u
r0dvLK4tH2Eqr9CXFsitZqSVI4MpNjv2SFZcptjaXdF7O/AQgtyNLgXC44Rf5URMfnaEbpjb2tCy
U8YEPLLCT9+dVGaMucw3X92ytq5NoQ95USnVHKbgOF4YKfNYIRjk+ahRFd3eqNAXy4ryjZ+9Oxss
MjGVBGZ+ZwCdc7at2bed1aroKLP0rZnF+btgDgQDvdd1oJ+WMve9uFptVfK2gL+YPWNi1e03lL3+
rOelpUsV7qBCD0iP1OrixW/MnFaazIj7bim66f7fTapAMER77Guun3fqmZeXwyFaIEkUfLyGNTah
w06rzrM4KbhWUG2+996JR0z8kzr2qGT4y+oWdN2FOyOMq553js2b+P77BXoecUpUvxNoqA9sXu5g
CLtK72XIUdG8f74w/cB9Yy17fejdT9Di15Z3hP3lMnMT1+kzREZ7hjei4Gdv7TOlYveax/GIInef
13IzqNWLfv4GXXT2rqAhDAQzMKUnORqKPiOezwlPgvsM0zgYQDIl0lBSD5v0SWqfsxq3sLoGPbZg
y5b27Qp5yGQINtv1o8KowWxWs0FWUMo7Q8HhPO/RkcgnkCpBzevceqE45HPxUZZWQ+SqUL3eaZtM
EjKacykiCjdhMY3ltcxRM8pvvQ7PjD6eeO+nr7Kxvz96B/r3TzWs1hNV5BXLPAKjqlHRI72eUFiw
qzuLWLnPpNX586PBOsuwmfNvNs6auMvGjPlbAop0YSVYndU/o8VbhYvnEKOsKMIjU1xmjLgLF+4y
MiQ+4nQA0cPnhGTb+EZ6XHHFTmHKA26K5HggimhDhdZYm9hzTWgKdAm+z1ZKVp9qkz62ihMG+vDY
0fcros2NkYOP1IF30P0YDx4k5lQ8Z6Hudbc1NK7c7DbSjNdyyQ2jrzkxlja0eRu68LbV7qCtKKr0
qpGal4e0Sq4j6tW4DypT7PBH2+s8NCdj9Mrj9xv57AMjoAre9Mcb3PMXer75bD1pJt2d9D0LZp1/
6m6XHIo1tKO/3dG4vqVdqzLSMo6MeE+ePXxbS3NrQ6g2FFIIcuRrDJk1pojxkqsOuPQseOdRD9F3
3FdjB7rs8mV+v08hEDtV4eKA8o0vjhnRlTjW3ZzH1sTt//D99NkWtVmlJsmHnxk/oWjXpS3dDUCx
BfgAdX1+dOtdO1e2eJCXnb7fsBvmWseXxQYLAZYPFrU9/dFmV3tEwbsDIeHIo6tuun7WhNEEFUU7
Xeih+c3N9Ttb81mBkRP1AZ+SKzTpbLT2tsungK9Edm0t4mgyNnbgXwDi0RH06WfCA09tMqPArBOn
PzJ/F6J2j4uJko13RaXsffdm3fQGIi4vkmvQTz8hjRkF7ZGQSjFrEoKDbP33YBF4w+i9N31Pvr6q
WOfw+cuCAss4mQKryy7QhMFcQrlsEb2R8NarFYp2ldnABGkAU1kEURxiFF4la/QTUR6SBw+Ync8w
nnX1QatcOPnkokNnG+H+aYZGkEma3QdA5F8fondf+l2AWI9M0+IOyJR+HpGacERJw0UaSpmSCioU
QJ2pSnHN3LLjp+0+/o+9u3jgEPUQe2DwKwCuGBDrzZbKeugG+sW6F5/12J1vmHL4H36AznidxIX7
xMRsyWIXtqZhM2M/196Jnnk7snKFk/fbmHCTZkrFhaeOP3c/qeQ99oz39Q82wmV6NoPn9HGH//Mh
A1wSAcR8vRTd//haAhIoeFZn5AmZpraTvWxO0YZf6oePLtmyqsEX8pJGXhORl08ed95lVQdN2B3W
fPpl9PKHazU83RF0nH3SpIfnm+ESPzm9K10OgmRP/M374PI1RxboubCWD3q3R4NWNdnidigLlWY3
6eOiWsobpNhybcW8G/Y/6VAAn9iDc5LE1C48wqcfcy9a+k0pnedwCAGZ7/pLTr740l2rvShIXAUv
6nc/gX781w+qsfJAh/zUMyfcfNnuu2K76yiGJ+gdGAIfLlvoW7eyluDU7gh68/Exs6bHGvx1I//Q
3a1r3e0GzsOhUJQLlBUVv7P4QLj5zeFBr75St3ZdLa/gacjaDistJGMDuykcrldb7j599PzLjHA4
9rvVbNTD72yhjzmUHFmOQl0bERCIWPQ6evPNNcY8wsWCYJWvfztpvGQUw/MKBxOSJFoC/Z4Igtfe
0gEUhsRvHlXqkaUIfNbYkLe3o8rCWAteDv3rLYbUccu+c7rc/hKrsGHDqnCoGN54c8SB4xcugORF
qU+8g99nHdBwIP72m73vNW1nnR0zNcpOj8qgtDtlGoeTKLJqabmlkwmMCBDNre220ZrZjdbaEVtl
zWZjuVzeLnAmfkR58ZHn5E00K2UCcmrQBEgW7Zr5kOZRWpay+d8nwbgAKFI4iuZcsCPQuV3Qa1wM
MZZwOmS6CKciZXA8nxB4WtnYoh8x6alXC6d0uf8JRo/YkQgL0CYIFLghmk09hkElUpheseTeT4/b
g+l1lK1a6dutQMF7X3KPfLqVsTnYEGlVU6QgX3jDlFETqCJj36ktILbF76JX3liRp+EjjDZPo33v
7QqcLgNPKII+fy/y/fLqVQ1epY+rmDB+3tzCadNBLdC2WnTtDd8T4Xamjm+frMmPKjvCynufPuSc
qbGKmxvQMef8NMqs3kmh2flFD91XYsxH2q6dHNAPOFj56HPox68/pegiOHrHhykh4JRRPkHJMQqD
WnADO5g2RqcNOpFx+qEVL94XS2WGungxj5cuyHLh4/4fvvkBhU2URigy6EYPM97/8DBsmIteM15s
sTXdHEJz5tToNXYUVZjLR7/1vA4gLOE8GJZr96Vuiw2de9IKjU7b5gosenHS4dMVDT700fu2tz5u
k/nDBmW4zR1RCDYvnV85vmpUhXn1utqmTpcOsWbKzCqCW1p0h80u8dgZv6eejxIkozj22nFXnqur
3oIWPbjRHXV53erScYWLnyzVd1Hr5tGcs3YQyKVmfB6tAtkFHVyva9AffJjW3RGduW/+gTNQfpdz
hbdKAN2wpYATEnp7mv2ouRNBojncbOtwRms2RH5c1mhmQ3ZOzhIBNszkF1vUjFJZHJUTWncb5IhD
wJyzskx7W1uIg/fiBZX+UKvMUML7eTVcGKIqs5S/+3JVkh4TjJSUYrV1PvT3a9f93LSjRK0LOHSk
wSWTy+Q80RISyinFvfP3O/BIumZTLCYDvprTGVtJ4NITvx9VVqIwh1obEJzgwJqDF07RlOtu06VE
WPLJD01BGsPxR62jNE6hZDjjYNkIiwgGXuLBCNzBo00TppSMPYiYEXP2dj1YS+OVFs/EeIc9W4iT
ajtJAvESY02SYxWpktZH+fSx1RlEl19WsynoHa2VH3JsaYFLOe14TdUwJOvaJhIfMUNN/AbbDsu3
o1sv+CHPEvG79PVy6p1n9pkxcfemDZ6uoSBatxHNmoEYMDy7NgXxVJl/q2vNpv8Gg2ZKGxWCulBE
OWrfie88YXJE0e33bGlZ076Zog83FtSFhPqd9JULLPNPNQIEQAM/r0b/9/eNEV9IE2TNZpgmgRpe
F/UHZAZWaVeOmGl01bZyZJiJdORFFY6Kqf9ZNM7SFbkBKSZs5P+8CS08/xvPaEgmY4ntpf94aSKk
OoGlBhRCDdEIxZqBPe5b72td8et2Smb1d7IP3D/x2CNiuttj+BKoxeYeTvlqCqNZRzXPrvA07Agb
dcabHx9ORNENl/9WT4ZHGVW8kXS6I1VRsp30h9SeMQ7VMg0asZ0vHiNjNaatLQ41z991/qyjL8uf
d/XOgG1ze0hvUqs222Q2nsgvaR7vKXCUeEg/KXdb7v3HRDi8wJMoAhtf81o/dbWOiegcspArHNLz
Or3e0ernjHb5BkWkABlmnzn5iXmyPJjJXmQFSP7zI6b92iJopROt+R2NHYcev3mz0uVfZwjM7pQ3
GZTGAjncnmTPgwVNXRj1s/A23BDNERyEK4M+ymDWu7z2MoXKo+DZZsJr8VE+PhTxF9O6FWbmRKa4
yWd/7Z0DxpVkeUrgGbu2E82fuwoCeO3GUrjxzkALDR5FMSHzyp3HVI79271l1i6LL/5JMtUTACKh
ZBbdZ9yUL4Rql6GXP65r+V1fUMFOmKmyaozTjkJwbRShha1O2EVHsq5ZmhB8FCkBDYz3vkULIBNe
9xhnyKTB5HUTclpSWr1SKtwbGSljK2ZQAFDsrsaabS0tvHnRPaP37/JP4ekt+IL/KoZCQGxnX7G5
vr3VxNIBGXnOKWMvudiKs4UTlBW74fFZq1DgxrtCa9ctC1Icw/Jakss3Fl55w8zDZyDI17rvpv/x
cBmLXO4JVZiMXthhKN9n5KuPDcPN3vmI73/LamljB98kOGlroVwRFQIuRC84b9SRpxloH/rim/aX
X9wckXtpUsWEVA++eNARE3ZbkUA/JsbmQbfdW7+xejuge02QWnjj6Ivn6MV1vkfBrK5Fd1y9jjIL
/gA195pJc45Bxi69TiJFnFL+xc/oljt36uUuv5ECj05joXkn3+x3aUy6Sk5oZovKi7kDpxjf+vc6
jUEuc2taVIIZ7sdVelFERnnZmYdXPHDVCHUhaqpDF924RR5wtVNUeZ7Q5kNGJRcJQnZAR4hXHDYl
f+SYkn1mW8aO2nXO+LXP0LvP1wRkPAf3zjKOIIPg7geCCGgUgpbhWHkk0K6SlZjUegXpVs27pRz8
ejeJpk5EnTXIyaGNa2ytQUpBsMu+sUOkQqkM2Hl1iUxHCixlUUdZPYO49s5gsVGYVaSq9yq0Rl9t
dUNUo4vwvDaqjcocNK8kWHXIZFQ626eN5corSoqKNeNHqvzBsJrUjR4NnjWXP44qkB4RkDyPf1qJ
Hn+m2tPRzHCKMLztlFdRJoW+nYhYuGfu3XfSuMRUCongOGCRPnGuQdpqnjrRiYwnQyLl8fMXe5bw
f0I+SZ/cxSFa0HoxYJoVCOux3/5ruc9higVSxlZcc1snuvk6iAZ4y6cXv/x4KY69AjKKUY8etzJg
MxFWy51udNX1m5taagq1ZpbVTpg97qW74FoxhC/JhorYwextRQX47vCiH9/e9O//tXR6A/c/dPy0
aXIjjeCetPsfbPv1960GTSDAU7Iw7aWVrQKz7MnDqkbHWg6G0bXXRhp21jsL7ayblkfJZi01/7DC
S88rVpliGUiAm4DvV5/7/eZOdyhsZDToptsOvOCwmKuEk2Hhwbp492Pom5+XBxheqdONVGreeqMK
hwKgF7wdFG+54yqXzrWvamosR0LQoPzkg/Hd7LxEkeFV1xtFZ13Q4WKq5dZhOrgcPiKvjW7VUcYg
r6QUjMOlfP0f0w7dl/r2l9B9D9f4IqhWaSuwU5Eop9MaqyblnTlDM+Xw/Ildlh2cr73kjK3fBLdP
gJfLutUUxRw3y9LWhM49PV9TZDniIBXwHPxZs3Y3/XUbkGBG9iaOMApWDb3ht8BrnzaY8/K3r20m
lZRL4wKk1ao7d0aEEmVJpJG36OrbmXwvS1SG2Eg+GE8WDexD6gjWZQzSAZLT6YVQe1Rz4HCN2qKZ
MFyj0AoH7U+VlSAmiF56DwFK1jY6D51l/nzZjhEl5SeeT29bhn5a3zp7ZvF+B/QaaugPwLrrRfTl
2+sVJl8oEMknKY9XYakyK4Xww89MHpnfw+TqPpPT2MCQPmlTLQkaCI8Y9AdqMTKm9yS3n3prszcx
iawTP0iB+3iG9wajexxe08FWHGK7+Qbbyh1rxpSPffbpcjixLuJOwrBxyAY7v2D7rNuBnv973Vbf
2jxU6ZS3jNKNeGHROFPvpkcCo+N/bbejbVtD+85SEfSu3JGNa9gr/v5bOBiRsTLdiPzTpmlmHlo2
cwycAtu1v1m9Hj3wcI3N4dDplcedWHnx6Sa1pitQ2LWBA8oH8Yr11b76TZGgTNgHziSM3w00OA8B
x6ROO6/NG27tsHmmTZ+x5MlkOIkHvqUJXX/rVsTaZKrSC8+uvOD42BIC33c/MBA/QCDsxcX8h2/+
zsoVBrPW7fK46JCV1jX5godOsEwep5k+tmzyIbv2i7xu1N7Mfbh4y0kXlUXgHpwqhVKH8nS7lisc
8F1djWpWtpECVTjKEGGJIw6RA5jCy7jgwRly4u4qniGiYxhPVUcIrfsePb+opj0UZOEdtXA5gUrT
SlGFlCfogjs4VPpyTdgP/DFq4S8RWitTdqjDx040WMqNhx2soBiUVx67YlF8eptL2D7CqxQuIyX3
ID28SKj18puhF59ZCadNSjVqmdx6xuWjjjkM8QxSy3ZBEt6myzqsS4GVVAfYfcnHOikqs5QGpWCZ
lHayWCZePcRmu+Npf7BU4ijSwVbc9IfvBp548zfWlld0wphPFsReXoZxBwYDn+H/hFM9X9bA9pT7
m0/XWQrCsa0vvz+qtHz04gR4VzY8kADfPSUNvgf1hWdXbtCf7UHcI+4LwBmr+0uLWz1+/7GHjZo4
LvZnvut0ETYn4YHJCTDqdCAg11y8e66CuR2Dd0iZ6TpFA4nQcAM3bD+TVA+nSnw8evdh5uVva6+7
YtxRx6BCQ+LrMDHZot3d2okum9fJujbtZPKnV1oXP5uv7RpqwtnqBCWAFlavRX+bvyIEW22WQpU3
tIJmp7Qramn7TWeOu+36EpzcB8Xgf7EuHIMw/GEzxxsCwIYE9nbXQmgK8Eu0uKFN3HiPB2ZqauE+
I/TFh+4vWwi5ty3ocutIuoVUwvtrg6wLbjmaaDWOnFB+xbVawKNQCFnj0fTPuhnvY/amtaJ6dDdz
pCh6jyZMctPyv/8OvLM0cvuD5slm5GERXLWQxNDr8QybFMJ6LNMfcIDBFJ/zFvesMjSu+4POtJnW
W8XuRCaxZ7M7ovSx9aNf0NMPrIO7ULmI4eBTh595sEZrRCMh7h/3wDDsTtQSQG++1/bxJy1Kg6uU
VrTDleIe24knjbtibnlBVyooPGkb8AkXUrjDsYtH9d1OcCZ0gSeDGP+Njz9gyIP/4cE5p91pg7/C
D6BVj4tngpjr29Dc61bz8gDpVM69c59zD0rMloXyoOU4KQ/rPe5x+050yOUrxxkDoc4Cn4lUBBr2
m1p16vH5Bx4Si+1CFbz1LK4c2NfD56bgEacTpkecSPABp7LiL+ERf+2uoN1NRdgBBxs//qh4pwNp
zaizGVEqBAmbrXVoNARt/7y0isRk4j6nrSS9Tbzk3+OZJqXT7M7J9KjtsxbWVRComEkNcgeVg2+6
H27u3poUPvRJw2Ar0K+DShNbcczluRfRy699pigzhhwqE8W5CXnVmAmmwvC+w9RqGflbHdq2stZt
90a4sBLuMjWolV59yO2yWIn5f9//yEkZ8VncVuoxMA+QAT84w6nHeENynvY4VZLbJvENAknwK7ap
t7WjF/8V2vbVb7xSZQsLi/45e+bIxIH35up+txw9/o8t7WE+6nKo84wPPjDpiFhKWKzZ+ExDoBaH
0kQbX0TnhJ7iiRRriWWAV3jgOO7cZ+ZKvEvRY+F4Nna3N/tVrTPSrT8qp5QMK/Y4+McVv9D2OMbM
h5B5C1mRYJJGMlwOpYSD0sRWTDTYjN9/43jt7R2bbR6BkpvgjjIH7FzAMT8fpJ9r4AUDsINCajRw
sk/GGQOyBtI1uoR+8N594ZYKmL0gANFSi+dC1gUjpcFU/aPemJsgswY3uveG2rXBZh3LE4zsk/cO
0sM96t1k3qOkAUAXPYNWtzcdu7/18EOURs2uLYh4IBMTTeJtXmyK9veT5Aq7JF2DLOJfSNPfRPZT
+92lL3owUpStn6j6SzY7dPkpCVuTDA//adHb3Oc/NkRaAm2Ojk61MY+nohTF8ZTCEORbGNnUUQdV
KE85WgtbrBP/yNbKUA+6g5HEhQgTnEWB9dYUDl8C9l14+jov0eL1DTviuIp75mmhPJCK9/cwyEok
JiEeGs/AJFu3aez/JKenx776XMYljjFDrRgq1YccNyROrh75n0TP00s5GCpSloStvQ0mXkVgDgcC
qHojv2GDwxkO+ZzE6DGyUmuBRk9UFaLCrpPv4pOqySMalX3O4ZT4PgAq3uxAV1250c84hBBVPmv8
c/dCjtOftox6I1gMekCB5JqdqsWdEotyhVPiQL9qVL82ntIw+69wJiCeXaoy53b62IphTgovMqcy
Ja6JyVI9AnGfxGQRvjHqnXZeR9BVLYRovaHwjodHTx2zezR9EiPiZveSEtenNOxW6dxOlVe92Smp
tiOdwoEp2accB4YMsZcEegaevEx6zKRuPJ970/xstY89TpyPD0933U47g3jXRnNCfRx1Snh6/LL/
tA3gDO+293iZWJ+ByB5rJaE2yegwGUEFY9BQDmu0DTW99laNPa6tPokR02W6l+zjMu0/ekk46tbb
QPA+fqpPqrzqLY851XZSpbO/y/cpx/4mIKH9BHoGnrxMesykbjwf8D1H3Z9stQ8tQ1OiSnfX7fSx
tUd16ZHuLPfRu55ii3VgHlFsCTtL8b1jwHruzqIdXm2BIOc54ecNbbcssPt6kXr3upmMJSW4zIqM
BngRzYQ5g6QuzrXo8xkkjJVIbZ/DyXoBUPUetT2LMJoSzQnpjz3XHSRClTiwJPchSWxBerEexZZA
AD5wPXw49cHLMypLyyaNGW2S6646OS8SQQEu5kQkeeLBDut0b1iJU1y7P1mBS+kMgZJ7SpVTInJQ
FZZosGPG7vHJKJHagedw/LUyffY+AGzclRad4bsI+xxJ2gWkxOBw6CQhgILz8OPneRYjLKkOR4xH
wwX+Mi3iOVQg232vYKqtYYTNCmgmsDchOCWRYxKLpTHMQV5FinJKH0KPYei9lrfS+dZjyT75JnGj
IkMyYqbGoMXWzMc2qFrAq+VQtOz6VNZBxeccMTkODBIOpG8DpRTOkz7aQRvTiR9CGmMHVMXnaIfc
MxTXg4Fn8hAVLjAq1RkHR7kG8yPR5ZdYTOJIu/MwZpHszXZrdj07EEMWTbwsNiVRP3LFchzIcSCL
HEjfbu2NiDRsuiyOp8+m4neQusfm8WqWdr5BdxNPXB5TXSdTtRZTbb9PRmWxQKq0pc3/LNI8SJoa
5LNpkHApEzJSVU7pffW73TqQ9lfyfZ6UKMnWlpF0Sfz1SqbE8L/e8BNGlHUnSQrHhpAIhhCpUjgP
ZbJvtyZ0nKr9lYTuPtfw5IPBlPTZCCYgW3wZumE4iQqUpFgWRd9bL/1ndGQ+/IQWRCdJogZmhYAE
EcSHBQeSDCljGQBtkUJGFsv0u90q0prddSlnV2ZRCXJNpcqB7Cpzqr3nyg8JDmTLPut7sDgRNVtP
crp72/rsba3OImF4gNk1ClJtrb+N5VTpyZbQB0k7MPzuRlaqu+3dxzIAXE1DzweAqnhWJD9Qk5IC
ZC6RlLrrXnjg7NYMCc1Vz3Egx4H0OJCzstPjW4a10rRbM9zJTbJ+9vgniestrLGpLlYSW06Py/3a
eHokSamVoXCldLEHywxRoYgcS0k6MNgerez+47+UCSiW6c0ohtvTB/7JuoW+N9qtuVjtwCturscc
B/Y2DqRptw5pNvU25oSFC6KWQ93GGdJiyhbxfxkh7hFrLltSyLCdLAoxJcM/E7L3Rrs1E37l6uY4
kONAjgNSOPDXsVvjrc4srnJSmLhny/TrYPu18T3Lt/7oHe5Y6o8nW6bWXivNLKYfSJfvULVbe9z6
zL05Srrgh2jJXKx8iApuLyR7qNqtUq6m3gvFiYf8FzZP+ltfs2Uh9ql7Wd+V7rPHXIEB5sBQtVsH
mE257nIcyHEgx4GUONDfdkBKxKRTOMFG69EcEMtkbtB1b8GfDtX9XifzkfY7iX/FDrDZm8VzcXun
HLPIwFS1LIsMz9mtqTI//fK5WGH6vMvVzHFgqHFg0Nmtma8bKbUAhTM5CdanuFMips/WBn8BKcdy
Bv8ochT2KweyHmsenLPs/wFBydVayGLGbgAAAABJRU5ErkJgglBLAwQUAAYACAAAACEA7ebKCRYB
AACIAQAADwAAAGRycy9kb3ducmV2LnhtbFSQ3UvDMBTF3wX/h3AF31zWjmx1Lh1DUARl2E1xj6FN
PzAfJYlbu7/eO6xM33LPze/k5CyWnVZkL51vrOEQjcZApMlt0ZiKw9v24SYB4oMwhVDWSA699LBM
Ly8WYl7Yg8nkfhMqgibGzwWHOoR2TqnPa6mFH9lWGtyV1mkRcHQVLZw4oLlWNB6Pp1SLxuALtWjl
fS3zz82X5mCZ37Hdx2vcH7P+JUpa9fi8fef8+qpb3QEJsgvnywP9VGD86YzB6Td4hBQjdmpl8to6
UmbSN0fM/6OXzmri7IHDZAYkt4rDFE7Cuiy9DBzYLGJYBW5+lSieJDEDerINdoBvBxhL+gP/B5OE
DSA9B0oXOJwLTL8BAAD//wMAUEsDBBQABgAIAAAAIQCqJg6+vAAAACEBAAAdAAAAZHJzL19yZWxz
L3BpY3R1cmV4bWwueG1sLnJlbHOEj0FqwzAQRfeF3EHMPpadRSjFsjeh4G1IDjBIY1nEGglJLfXt
I8gmgUCX8z//PaYf//wqfillF1hB17QgiHUwjq2C6+V7/wkiF2SDa2BSsFGGcdh99GdasdRRXlzM
olI4K1hKiV9SZr2Qx9yESFybOSSPpZ7Jyoj6hpbkoW2PMj0zYHhhiskoSJPpQFy2WM3/s8M8O02n
oH88cXmjkM5XdwVislQUeDIOH2HXRLYgh16+PDbcAQAA//8DAFBLAQItABQABgAIAAAAIQBamK3C
DAEAABgCAAATAAAAAAAAAAAAAAAAAAAAAABbQ29udGVudF9UeXBlc10ueG1sUEsBAi0AFAAGAAgA
AAAhAAjDGKTUAAAAkwEAAAsAAAAAAAAAAAAAAAAAPQEAAF9yZWxzLy5yZWxzUEsBAi0AFAAGAAgA
AAAhADQEPSMrAgAA7wUAABIAAAAAAAAAAAAAAAAAOgIAAGRycy9waWN0dXJleG1sLnhtbFBLAQIt
AAoAAAAAAAAAIQD9q+pBvkkAAL5JAAAUAAAAAAAAAAAAAAAAAJUEAABkcnMvbWVkaWEvaW1hZ2Ux
LnBuZ1BLAQItABQABgAIAAAAIQDt5soJFgEAAIgBAAAPAAAAAAAAAAAAAAAAAIVOAABkcnMvZG93
bnJldi54bWxQSwECLQAUAAYACAAAACEAqiYOvrwAAAAhAQAAHQAAAAAAAAAAAAAAAADITwAAZHJz
L19yZWxzL3BpY3R1cmV4bWwueG1sLnJlbHNQSwUGAAAAAAYABgCEAQAAv1AAAAAA
">
   <v:imagedata src="images_internacional/image003.png"
    o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:3;margin-left:13px;margin-top:6px;width:296px;
  height:30px'><img width=296 height=30
  src="images_internacional/image004.png"
  v:shapes="Imagem_x0020_4"></span><![endif]><span style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=17 class=xl101400 width=108 style='height:12.75pt;width:81pt'></td>
   </tr>
  </table>
  </span></td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 style='height:14.25pt' align=left valign=top><!--[if gte vml 1]><v:shape
   id="Texto_x0020_30" o:spid="_x0000_s1677" type="#_x0000_t75" style='position:absolute;
   margin-left:22.5pt;margin-top:.75pt;width:75.75pt;height:14.25pt;z-index:2;
   visibility:visible' o:gfxdata="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
BAAEAPUAAACVBgAAAAA=
">
   <v:imagedata src="images_internacional/image005.png"
    o:title=""/>
   <o:lock v:ext="edit" aspectratio="f"/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:2;margin-left:30px;margin-top:1px;width:101px;
  height:19px'><img width=101 height=19
  src="images_internacional/image006.png"
  v:shapes="Texto_x0020_30"></span><![endif]><span style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=19 class=xl63400 width=35 style='height:14.25pt;width:26pt'></td>
   </tr>
  </table>
  </span></td>
  <td class=xl103400><span
  style='mso-spacerun:yes'>
  </span> </td>
  <td class=xl63400>R$ 5.60 = $ 1.00 D&oacute;lar</td>
  <td colspan=3 class=xl113400>BLANCA-MISSIONES MUNDIALES</td>
  <td class=xl104400>&nbsp;</td>
  <td class=xl104400>&nbsp;</td>
  <td class=xl104400>&nbsp;</td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr class=xl102400 height=17 style='page-break-before:always;mso-height-source:
  userset;height:12.75pt'>
  <td height=17 class=xl101400 style='height:12.75pt'></td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td class=xl63400 colspan=3><span
  style='mso-spacerun:yes'> </span>(Supervisor/Representante)</td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td class=xl101400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
  <td class=xl102400></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl63400 style='height:14.25pt'></td>
  <td class=xl109400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl63400 style='height:14.25pt'></td>
  <td class=xl108400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
  <td class=xl63400></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=35 style='width:26pt'></td>
  <td width=250 style='width:188pt'></td>
  <td width=108 style='width:81pt'></td>
  <td width=108 style='width:81pt'></td>
  <td width=108 style='width:81pt'></td>
  <td width=108 style='width:81pt'></td>
  <td width=108 style='width:81pt'></td>
  <td width=108 style='width:81pt'></td>
  <td width=108 style='width:81pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--FIM DA SAÍDA DO 'ASSISTENTE PARA PUBLICAÇÃO COMO PÁGINA DA WEB' DO EXCEL-->
<!----------------------------->
</body>

</html>
