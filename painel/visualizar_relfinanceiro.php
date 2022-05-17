<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">


<head>

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



   <link rel="stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />
   <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />    
   <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
   <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
   <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
   
   		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
		<script src="js/jquery.maskMoney.js" type="text/javascript"></script>
		<script src='http://alexgorbatchev.com/pub/sh/current/scripts/shCore.js' type='text/javascript'></script>
		<script src='http://alexgorbatchev.com/pub/sh/current/scripts/shBrushJScript.js' type='text/javascript'></script>
		<script src='http://alexgorbatchev.com/pub/sh/current/scripts/shBrushXml.js' type='text/javascript'></script>

 
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<?php
$id=$_GET["id"];
session_start();
include("conexao/conecta.php");
include("func.php");

@$mes=date(m);
@$ano=date(Y);
if($mes == "1"){
$mes_ref="12";
$mes_nome="Dezembro";
$ano_ref=date(Y)-1;
}else{
@$mes_ref=date(m)-1;
@$ano_ref=date(Y);

if($mes_ref==1){
$mes_nome="Janeiro";
}else if($mes_ref==2){
$mes_nome="Fevereiro";
}if($mes_ref==3){
$mes_nome="Mar&ccedil;o";
}else if($mes_ref==4){
$mes_nome="Abril";
}if($mes_ref==5){
$mes_nome="Maio";
}else if($mes_ref==6){
$mes_nome="Junho";
}if($mes_ref==7){
$mes_nome="Julho";
}else if($mes_ref==8){
$mes_nome="Agosto";
}if($mes_ref==9){
$mes_nome="Setembro";
}else if($mes_ref==10){
$mes_nome="Outubro";
}if($mes_ref==11){
$mes_nome="Novembro";
}else if($mes_ref==12){
$mes_nome="Dezembro";
}
}


?>

<div id="main-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
			
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">

<?php 
$selectrelatorio1 = mysql_query("SELECT * FROM relatorio_financeiro WHERE mes=$mes_ref and ano=$ano_ref and id=$id");
$num_results1 = mysql_num_rows($selectrelatorio1);
$dadosrelatorio= mysql_fetch_array($selectrelatorio1);

?>
<table class="table table-bordered table-hover">
									<tr><th>
									<center><div class="control-group">
									<label class="control-label">M&ecirc;s de Ref&ecirc;ncia</label>
                                    <div class="controls">
									<input type="text" name="mes" style="text-align:center" value="<?php echo $mes_nome."/".$ano_ref;?>" disabled>
                                    </div></center>
									</th>
									<th>
									<center><div class="control-group">
									<label class="control-label">Prebenda Pastoral</label>
                                    <div class="controls">
<input type="text" name="prebenda" style="text-align:center" value="<?php echo"R$ ".transf_real(prebenda($dadosrelatorio['entrada_dizimo']));?>" disabled>
                                    </div>
									</div></center>
</th>
</tr>
</table>
<form action="index.php?view=relfinanceiro"	method="post" id="relfinanceiro">
<table class="table table-bordered table-hover">


</br>
<thead>
                                <tr>
								<th><center>Saldo Anterior</center></th>
                                    <th><center>Entradas</center></th>
									<th><center>Total Entradas</center></th>
									<th><center>Sa&iacute;das p/ Regi&atilde;o</center></th>
									<th><center>Sa&iacute;das p/ Despesas</center></th>
									<th><center>Total Sa&iacute;das</center></th>
                                </tr>
                                </thead>
                                <tbody>
<tr>

<!-- Saldo Anterior -->
<td>
                                    
									
									<div class="control-group">
                                    <label class="control-label"> D&iacute;zimos Diversos:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money01" name="saldo_dizimos" value="<?php echo "R$ ".transf_real($dadosrelatorio['saldo_dizimo']);?>" disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta dos Culto:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money02" name="saldo_of_culto" value="<?php echo "R$ ".transf_real($dadosrelatorio['saldo_of_culto']);?>" disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money03" name="saldo_of_missoes" value="<?php echo "R$ ".transf_real($dadosrelatorio['saldo_of_missoes']);?>" disabled>
                                    </div>
                                </div>
																	<div class="control-group">
                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money04" name="saldo_of_construcao" value="<?php echo "R$ ".transf_real($dadosrelatorio['saldo_of_construcao']);?>" disabled>
                                    </div>
                                </div>
																<div class="control-group">
                                    <label class="control-label"> Entradas Especiais:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money05" name="saldo_ent_especiais" value="<?php echo "R$ ".transf_real($dadosrelatorio['saldo_ent_especiais']);?>" disabled>
                                    </div>
                                </div>
																								<div class="control-group">
                                    <label class="control-label"> Outros:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money06" name="saldo_outros" value="<?php echo "R$ ".transf_real($dadosrelatorio['saldo_outros']);?>" disabled>
                                    </div>
                                </div>
								</td>

<!-- Entradas -->
		<td>
                                    
									
									<div class="control-group">
                                    <label class="control-label"> D&iacute;zimos Diversos:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money07" name="entrada_dizimo" value="<?php echo "R$ ".transf_real($dadosrelatorio['entrada_dizimo']);?>"   disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta dos Culto:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money08" name="entrada_of_culto" value="<?php echo "R$ ".transf_real($dadosrelatorio['entrada_of_culto']);?>"  disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money09" name="entrada_of_missoes" value="<?php echo "R$ ".transf_real($dadosrelatorio['entrada_of_missoes']);?>"  disabled>
                                    </div>
                                </div>
																	<div class="control-group">
                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money10" name="entrada_of_construcao" value="<?php echo "R$ ".transf_real($dadosrelatorio['entrada_of_construcao']);?>"  disabled>
                                    </div>
                                </div>
																<div class="control-group">
                                    <label class="control-label"> Entradas Especiais:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money11" name="entrada_ent_especiais" value="<?php echo "R$ ".transf_real($dadosrelatorio['entrada_ent_especiais']);?>" disabled>
                                    </div>
                                </div>
																								<div class="control-group">
                                    <label class="control-label"> Outros:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money12" name="entrada_outros" value="<?php echo "R$ ".transf_real($dadosrelatorio['entrada_outros']);?>"  disabled>
                                    </div>
                                </div>
								</td>
								
								<!--  Total Entradas -->
		<td>
                                    
									
									<div class="control-group">
                                    <label class="control-label"> D&iacute;zimos Diversos:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money07" name="entrada_dizimo" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saldo_dizimo']+$dadosrelatorio['entrada_dizimo']));?>"   disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta dos Culto:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money08" name="entrada_of_culto" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saldo_of_culto']+$dadosrelatorio['entrada_of_culto']));?>"  disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money09" name="entrada_of_missoes" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saldo_of_missoes']+$dadosrelatorio['entrada_of_missoes']));?>"  disabled>
                                    </div>
                                </div>
																	<div class="control-group">
                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money10" name="entrada_of_construcao" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saldo_of_construcao']+$dadosrelatorio['entrada_of_construcao']));?>"  disabled>
                                    </div>
                                </div>
																<div class="control-group">
                                    <label class="control-label"> Entradas Especiais:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money11" name="entrada_ent_especiais" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saldo_ent_especiais']+$dadosrelatorio['entrada_ent_especiais']));?>" disabled>
                                    </div>
                                </div>
																								<div class="control-group">
                                    <label class="control-label"> Outros:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money12" name="entrada_outros" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saldo_outros']+$dadosrelatorio['entrada_outros']));?>"  disabled>
                                    </div>
                                </div>
								</td>
								<!-- saidas Regiao-->

<td>
                                    
									
									<div class="control-group">
                                    <label class="control-label"> D&iacute;zimos dos D&iacute;zimos:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money13" name="saida_dizimo" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_regiao_dizimo']);?>"  disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta dos Culto:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money14" name="saida_of_culto" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_regiao_of_culto']);?>" disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money15" name="saida_of_missoes" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_regiao_of_missoes']);?>"  disabled>
                                    </div>
                                </div>
																	<div class="control-group">
                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money16" name="saida_of_construcao" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_regiao_of_construcao']);?>"  disabled>
                                    </div>
                                </div>
																<div class="control-group">
                                    <label class="control-label"> Entradas Especiais:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money17" name="saida_ent_especiais" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_regiao_ent_especiais']);?>"  disabled>
                                    </div>
                                </div>
																								<div class="control-group">
                                    <label class="control-label"> Outros:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money18" name="saida_outros" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_regiao_outros']);?>"  disabled>
                                    </div>
                                </div>
								</td>
<!-- saidas despesa-->

<td>
                                    
									
									<div class="control-group">
                                    <label class="control-label"> D&iacute;zimos Diversos:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money13" name="saida_dizimo" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_despesa_dizimo']);?>"  disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta dos Culto:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money14" name="saida_of_culto" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_despesa_of_culto']);?>" disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money15" name="saida_of_missoes" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_despesa_of_missoes']);?>"  disabled>
                                    </div>
                                </div>
																	<div class="control-group">
                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money16" name="saida_of_construcao" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_despesa_of_construcao']);?>"  disabled>
                                    </div>
                                </div>
																<div class="control-group">
                                    <label class="control-label"> Entradas Especiais:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money17" name="saida_ent_especiais" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_despesa_ent_especiais']);?>"  disabled>
                                    </div>
                                </div>
																								<div class="control-group">
                                    <label class="control-label"> Outros:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money18" name="saida_outros" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_despesa_outros']);?>"  disabled>
                                    </div>
                                </div>
								</td>

<!-- total saidas -->

<td>
                                    
									
									<div class="control-group">
                                    <label class="control-label"> D&iacute;zimos Diversos:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money13" name="saida_dizimo" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saida_regiao_dizimo']+$dadosrelatorio['saida_despesa_dizimo']));?>"  disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta dos Culto:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money14" name="saida_of_culto" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saida_regiao_of_culto']+$dadosrelatorio['saida_despesa_of_culto']));?>" disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money15" name="saida_of_missoes" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saida_regiao_of_missoes']+$dadosrelatorio['saida_despesa_of_missoes']));?>"  disabled>
                                    </div>
                                </div>
																	<div class="control-group">
                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money16" name="saida_of_construcao" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saida_regiao_of_construcao']+$dadosrelatorio['saida_despesa_of_construcao']));?>"  disabled>
                                    </div>
                                </div>
																<div class="control-group">
                                    <label class="control-label"> Entradas Especiais:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money17" name="saida_ent_especiais" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saida_regiao_ent_especiais']+$dadosrelatorio['saida_despesa_ent_especiais']));?>"  disabled>
                                    </div>
                                </div>
																								<div class="control-group">
                                    <label class="control-label"> Outros:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money18" name="saida_outros" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saida_regiao_outros']+$dadosrelatorio['saida_despesa_outros']));?>"  disabled>
                                    </div>
                                </div>
								</td>
								

</tr>
								 </tbody>
								 </table>
								<table class="table table-bordered table-hover">
								</br>
<center><h3>Departamentos</h3></center>								
								 
							<thead>
                                <tr>
								<th><center>Saldo Anterior</center></th>
                                    <th><center>Entradas</center></th>
									<th><center>Total Entradas</center></th>
									<th><center>Sa&iacute;das p/ Regi&atilde;o</center></th>
									<th><center>Sa&iacute;das p/ Despesas</center></th>
									<th><center>Total Sa&iacute;das</center></th>
                                </tr>
                                </thead>	 
								  <tbody> 
								  <!-- saldo -->
								  <td>
								  							<div class="control-group">
                                    <label class="control-label"> Escola Dominical:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money19" name="saldo_esc_dominical" value="<?php echo "R$ ".transf_real($dadosrelatorio['saldo_esc_dominical']);?>"  disabled>
                                    </div>
                                </div>
								  					<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Feminino:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money20" name="saldo_minist_feminino" value="<?php echo "R$ ".transf_real($dadosrelatorio['saldo_minist_feminino']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Masculino:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money21" name="saldo_minist_masculino" value="<?php echo "R$ ".transf_real($dadosrelatorio['saldo_minist_masculino']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Juvenil:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money22" name="saldo_minist_juvenil" value="<?php echo "R$ ".transf_real($dadosrelatorio['saldo_minist_juvenil']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento Infantil:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money23" name="saldo_dep_infantil" value="<?php echo "R$ ".transf_real($dadosrelatorio['saldo_dep_infantil']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento de Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money24" name="saldo_dep_missoes" value="<?php echo "R$ ".transf_real($dadosrelatorio['saldo_dep_missoes']);?>"  disabled>
                                    </div>
                                </div>
								  </td>
								   <!-- entrada -->
								  <td>
								  							<div class="control-group">
                                    <label class="control-label"> Escola Dominical:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money25" name="entrada_esc_dominical" value="<?php echo "R$ ".transf_real($dadosrelatorio['entrada_esc_dominical']);?>"  disabled>
                                    </div>
                                </div>
								  					<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Feminino:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money26" name="entrada_minist_feminino" value="<?php echo "R$ ".transf_real($dadosrelatorio['entrada_minist_feminino']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Masculino:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money27" name="entrada_minist_masculino" value="<?php echo "R$ ".transf_real($dadosrelatorio['entrada_minist_masculino']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Juvenil:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money28" name="entrada_minist_juvenil" value="<?php echo "R$ ".transf_real($dadosrelatorio['entrada_minist_juvenil']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento Infantil:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money29" name="entrada_dep_infantil" value="<?php echo "R$ ".transf_real($dadosrelatorio['entrada_dep_infantil']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento de Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money30" name="entrada_dep_missoes" value="<?php echo "R$ ".transf_real($dadosrelatorio['entrada_dep_missoes']);?>"  disabled>
                                    </div>
                                </div>
								</td>
								
								<!-- total entrada-->
																  <td>
								  							<div class="control-group">
                                    <label class="control-label"> Escola Dominical:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money25" name="entrada_esc_dominical" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saldo_esc_dominical']+$dadosrelatorio['entrada_esc_dominical']));?>"  disabled>
                                    </div>
                                </div>
								  					<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Feminino:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money26" name="entrada_minist_feminino" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saldo_minist_feminino']+$dadosrelatorio['entrada_minist_feminino']));?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Masculino:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money27" name="entrada_minist_masculino" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saldo_minist_masculino']+$dadosrelatorio['entrada_minist_masculino']));?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Juvenil:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money28" name="entrada_minist_juvenil" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saldo_minist_juvenil']+$dadosrelatorio['entrada_minist_juvenil']));?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento Infantil:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money29" name="entrada_dep_infantil" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saldo_dep_infantil']+$dadosrelatorio['entrada_dep_infantil']));?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento de Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money30" name="entrada_dep_missoes" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saldo_dep_missoes']+$dadosrelatorio['entrada_dep_missoes']));?>"  disabled>
                                    </div>
                                </div>
								</td>
																<!--saida regiao-->
								  <td>
								  						<div class="control-group">
                                    <label class="control-label"> Escola Dominical:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money31" name="saida_esc_dominical" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_regiao_esc_dominical']);?>" disabled >
                                    </div>
                                </div>
								  					<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Feminino:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money32" name="saida_minist_feminino" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_regiao_minist_feminino']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Masculino:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money33" name="saida_minist_masculino" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_regiao_minist_masculino']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Juvenil:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money34" name="saida_minist_juvenil" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_regiao_minist_juvenil']);?>" disabled >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento Infantil:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money35" name="saida_dep_infantil" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_regiao_dep_infantil']);?>" disabled >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento de Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money36" name="saida_dep_missoes" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_regiao_dep_missoes']);?>"  disabled>
                                    </div>
                                </div>
								  </td>
								<!--saida despesa-->
								  <td>
								  						<div class="control-group">
                                    <label class="control-label"> Escola Dominical:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money31" name="saida_esc_dominical" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_despesa_esc_dominical']);?>" disabled >
                                    </div>
                                </div>
								  					<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Feminino:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money32" name="saida_minist_feminino" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_despesa_minist_feminino']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Masculino:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money33" name="saida_minist_masculino" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_despesa_minist_masculino']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Juvenil:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money34" name="saida_minist_juvenil" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_despesa_minist_juvenil']);?>" disabled >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento Infantil:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money35" name="saida_dep_infantil" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_despesa_dep_infantil']);?>" disabled >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento de Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money36" name="saida_dep_missoes" value="<?php echo "R$ ".transf_real($dadosrelatorio['saida_despesa_dep_missoes']);?>"  disabled>
                                    </div>
                                </div>
								  </td>
								  								<!--Total Saida-->
								  <td>
								  						<div class="control-group">
                                    <label class="control-label"> Escola Dominical:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money31" name="saida_esc_dominical" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saida_regiao_esc_dominical']+$dadosrelatorio['saida_despesa_esc_dominical']));?>" disabled >
                                    </div>
                                </div>
								  					<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Feminino:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money32" name="saida_minist_feminino" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saida_regiao_minist_feminino']+$dadosrelatorio['saida_despesa_minist_feminino']));?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Masculino:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money33" name="saida_minist_masculino" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saida_regiao_minist_masculino']+$dadosrelatorio['saida_despesa_minist_masculino']));?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Juvenil:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money34" name="saida_minist_juvenil" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saida_regiao_minist_juvenil']+$dadosrelatorio['saida_despesa_minist_juvenil']));?>" disabled >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento Infantil:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money35" name="saida_dep_infantil" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saida_regiao_dep_infantil']+$dadosrelatorio['saida_despesa_dep_infantil']));?>" disabled >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento de Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="input-small" id="money36" name="saida_dep_missoes" value="<?php echo "R$ ".transf_real(($dadosrelatorio['saida_regiao_dep_missoes']+$dadosrelatorio['saida_despesa_dep_missoes']));?>"  disabled>
                                    </div>
                                </div>
								  </td>
								  </tbody>
								 
								 
								</table>
                                </div>


                    </div>
                   
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->	
	

</body></html>