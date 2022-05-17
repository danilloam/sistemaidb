<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">


<head><meta charset="windows-1252">

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
$igreja_id=$_GET["c"];
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
$selectrelatorio1 = mysqli_query($conecta,"SELECT * FROM relatorio_financeiro WHERE mes='$mes_ref' and ano='$ano_ref' and status='SALVO' and igreja_id={$igreja_id} and id={$id}");
$num_results1 = mysqli_num_rows($selectrelatorio1);
$dadosrelatorio= mysqli_fetch_array($selectrelatorio1);

?>
<form action="editar_relatorio.php?id=<?php echo $id;?>&c=<?php echo $igreja_id;?>"	method="post" id="relfinanceiro">
<div class="control-group">
<label class="control-label">M&ecirc;s de Ref&ecirc;ncia</label>
                                    <div class="controls">
<input type="text" name="mes" value="<?php echo $mes_nome."/".$ano_ref;?>" disabled>
                                    </div>
<table class="table table-bordered table-hover">
<thead>
                                <tr>
								<th><center>Saldo Anterior</center></th>
                                    <th><center>Entradas</center></th>
<th><center>Sa&iacute;das p/ Despesas</center></th>
                                </tr>
                                </thead>
                                <tbody>
<tr>

<!-- Saldo Anterior -->
<td>
                                    
									
									<div class="control-group">
                                    <label class="control-label"> D&iacute;zimos Diversos:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money01" name="saldo_dizimos" value="<?php echo transf_real($dadosrelatorio['saldo_dizimo']);?>" disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta dos Culto:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money02" name="saldo_of_culto" value="<?php echo transf_real($dadosrelatorio['saldo_of_culto']);?>" disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money03" name="saldo_of_missoes" value="<?php echo transf_real($dadosrelatorio['saldo_of_missoes']);?>" disabled>
                                    </div>
                                </div>
																	<div class="control-group">
                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money04" name="saldo_of_construcao" value="<?php echo transf_real($dadosrelatorio['saldo_of_construcao']);?>" disabled>
                                    </div>
                                </div>
																<div class="control-group">
                                    <label class="control-label"> Entradas Especiais:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money05" name="saldo_ent_especiais" value="<?php echo transf_real($dadosrelatorio['saldo_ent_especiais']);?>" disabled>
                                    </div>
                                </div>
																								<div class="control-group">
                                    <label class="control-label"> Outros:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money06" name="saldo_outros" value="<?php echo transf_real($dadosrelatorio['saldo_outros']);?>" disabled>
                                    </div>
                                </div>
								</td>

<!-- Entradas -->
		<td>
                                    
									
									<div class="control-group">
                                    <label class="control-label"> D&iacute;zimos Diversos:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money07" name="entrada_dizimo" value="<?php echo transf_real($dadosrelatorio['entrada_dizimo']);?>"   >
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta dos Culto:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money08" name="entrada_of_culto" value="<?php echo transf_real($dadosrelatorio['entrada_of_culto']);?>"  >
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money09" name="entrada_of_missoes" value="<?php echo transf_real($dadosrelatorio['entrada_of_missoes']);?>"  >
                                    </div>
                                </div>
																	<div class="control-group">
                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money10" name="entrada_of_construcao" value="<?php echo transf_real($dadosrelatorio['entrada_of_construcao']);?>"  >
                                    </div>
                                </div>
																<div class="control-group">
                                    <label class="control-label"> Entradas Especiais:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money11" name="entrada_ent_especiais" value="<?php echo transf_real($dadosrelatorio['entrada_ent_especiais']);?>" >
                                    </div>
                                </div>
																								<div class="control-group">
                                    <label class="control-label"> Outros:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money12" name="entrada_outros" value="<?php echo transf_real($dadosrelatorio['entrada_outros']);?>"  >
                                    </div>
                                </div>
								</td>
<!-- saidas -->

<td>
                                    
									
									<div class="control-group">
                                    <label class="control-label"> D&iacute;zimos Diversos:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money13" name="saida_dizimo" value="<?php echo transf_real($dadosrelatorio['saida_despesa_dizimo']);?>"  >
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta dos Culto:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money14" name="saida_of_culto" value="<?php echo transf_real($dadosrelatorio['saida_despesa_of_culto']);?>" >
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money15" name="saida_of_missoes" value="<?php echo transf_real($dadosrelatorio['saida_despesa_of_missoes']);?>"  >
                                    </div>
                                </div>
																	<div class="control-group">
                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money16" name="saida_of_construcao" value="<?php echo transf_real($dadosrelatorio['saida_despesa_of_construcao']);?>"  >
                                    </div>
                                </div>
																<div class="control-group">
                                    <label class="control-label"> Entradas Especiais:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money17" name="saida_ent_especiais" value="<?php echo transf_real($dadosrelatorio['saida_despesa_ent_especiais']);?>"  >
                                    </div>
                                </div>
																								<div class="control-group">
                                    <label class="control-label"> Outros:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money18" name="saida_outros" value="<?php echo transf_real($dadosrelatorio['saida_despesa_outros']);?>"  >
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
<th><center>Sa&iacute;das p/ Despesas</center></th>
                                </tr>
                                </thead>	 
								  <tbody> 
								  <td>
								  							<div class="control-group">
                                    <label class="control-label"> Escola Dominical:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money19" name="saldo_esc_dominical" value="<?php echo transf_real($dadosrelatorio['saldo_esc_dominical']);?>"  disabled>
                                    </div>
                                </div>
								  					<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Feminino:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money20" name="saldo_minist_feminino" value="<?php echo transf_real($dadosrelatorio['saldo_minist_feminino']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Masculino:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money21" name="saldo_minist_masculino" value="<?php echo transf_real($dadosrelatorio['saldo_minist_masculino']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Juvenil:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money22" name="saldo_minist_juvenil" value="<?php echo transf_real($dadosrelatorio['saldo_minist_juvenil']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento Infantil:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money23" name="saldo_dep_infantil" value="<?php echo transf_real($dadosrelatorio['saldo_dep_infantil']);?>"  disabled>
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento de Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money24" name="saldo_dep_missoes" value="<?php echo transf_real($dadosrelatorio['saldo_dep_missoes']);?>"  disabled>
                                    </div>
                                </div>
								  </td>
								  <td>
								  							<div class="control-group">
                                    <label class="control-label"> Escola Dominical:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money25" name="entrada_esc_dominical" value="<?php echo transf_real($dadosrelatorio['entrada_esc_dominical']);?>"  >
                                    </div>
                                </div>
								  					<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Feminino:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money26" name="entrada_minist_feminino" value="<?php echo transf_real($dadosrelatorio['entrada_minist_feminino']);?>"  >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Masculino:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money27" name="entrada_minist_masculino" value="<?php echo transf_real($dadosrelatorio['entrada_minist_masculino']);?>"  >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Juvenil:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money28" name="entrada_minist_juvenil" value="<?php echo transf_real($dadosrelatorio['entrada_minist_juvenil']);?>"  >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento Infantil:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money29" name="entrada_dep_infantil" value="<?php echo transf_real($dadosrelatorio['entrada_dep_infantil']);?>"  >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento de Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money30" name="entrada_dep_missoes" value="<?php echo transf_real($dadosrelatorio['entrada_dep_missoes']);?>"  >
                                    </div>
                                </div>
								</td>
								  <td>
								  						<div class="control-group">
                                    <label class="control-label"> Escola Dominical:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money31" name="saida_esc_dominical" value="<?php echo transf_real($dadosrelatorio['saida_despesa_esc_dominical']);?>"  >
                                    </div>
                                </div>
								  					<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Feminino:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money32" name="saida_minist_feminino" value="<?php echo transf_real($dadosrelatorio['saida_despesa_minist_feminino']);?>"  >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Masculino:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money33" name="saida_minist_masculino" value="<?php echo transf_real($dadosrelatorio['saida_despesa_minist_masculino']);?>"  >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Minist&eacute;rio Juvenil:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money34" name="saida_minist_juvenil" value="<?php echo transf_real($dadosrelatorio['saida_despesa_minist_juvenil']);?>"  >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento Infantil:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money35" name="saida_dep_infantil" value="<?php echo transf_real($dadosrelatorio['saida_despesa_dep_infantil']);?>"  >
                                    </div>
                                </div>
													<div class="control-group">
                                    <label class="control-label"> Departamento de Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money36" name="saida_dep_missoes" value="<?php echo transf_real($dadosrelatorio['saida_despesa_dep_missoes']);?>"  >
                                    </div>
                                </div>
								  </td>
								  </tbody>
								 
								 
								</table>
                                </div>
								<div class="form-actions">
                                   <center> <input type="submit" value="Alterar" name="ok" class="btn blue"/></center>
                                </div>	
								
</form>
	<?php 
							if(isset($_POST['ok'])){
							

								$saldo_dizimo=$saldo_dizimo;
								$saldo_of_culto=$saldo_of_culto;
								$saldo_of_missoes=$saldo_of_missoes;
								$saldo_of_construcao=$saldo_of_construcao;
								$saldo_ent_especiais=$saldo_ent_especiais;
								$saldo_outros=$saldo_outros;

								$entrada_dizimo=transf_moeda(anti_injection($_POST["entrada_dizimo"]));
								$entrada_of_culto=transf_moeda(anti_injection($_POST["entrada_of_culto"]));
								$entrada_of_missoes=transf_moeda(anti_injection($_POST["entrada_of_missoes"]));
								$entrada_of_construcao=transf_moeda(anti_injection($_POST["entrada_of_construcao"]));
								$entrada_ent_especiais=transf_moeda(anti_injection($_POST["entrada_ent_especiais"]));
								$entrada_outros=transf_moeda(anti_injection($_POST["entrada_outros"]));

								$saida_despesa_dizimo=transf_moeda(anti_injection($_POST["saida_dizimo"]));
								$saida_despesa_of_culto=transf_moeda(anti_injection($_POST["saida_of_culto"]));
								$saida_despesa_of_missoes=transf_moeda(anti_injection($_POST["saida_of_missoes"]));
								$saida_despesa_of_construcao=transf_moeda(anti_injection($_POST["saida_of_construcao"]));
								$saida_despesa_ent_especiais=transf_moeda(anti_injection($_POST["saida_ent_especiais"]));
								$saida_despesa_outros=transf_moeda(anti_injection($_POST["saida_outros"]));

								$saida_regiao_dizimo=valor_regiao($entrada_dizimo);
								$saida_regiao_of_culto=0.00;
								$saida_regiao_of_missoes=valor_regiao_of_missoes($entrada_of_missoes);
								$saida_regiao_of_construcao=0.00;
								$saida_regiao_ent_especiais=0.00;
								$saida_regiao_outros=0.00;
								
								$saldo_esc_dominical=$saldo_esc_dominical;
								$saldo_minist_feminino=$saldo_minist_feminino;
								$saldo_minist_masculino=$saldo_minist_masculino;
								$saldo_minist_juvenil=$saldo_minist_juvenil;
								$saldo_dep_infantil=$saldo_dep_infantil;
								$saldo_dep_missoes=$saldo_dep_missoes;

								$entrada_esc_dominical=transf_moeda(anti_injection($_POST["entrada_esc_dominical"]));
								$entrada_minist_feminino=transf_moeda(anti_injection($_POST["entrada_minist_feminino"]));
								$entrada_minist_masculino=transf_moeda(anti_injection($_POST["entrada_minist_masculino"]));
								$entrada_minist_juvenil=transf_moeda(anti_injection($_POST["entrada_minist_juvenil"]));
								$entrada_dep_infantil=transf_moeda(anti_injection($_POST["entrada_dep_infantil"]));
								$entrada_dep_missoes=transf_moeda(anti_injection($_POST["entrada_dep_missoes"]));

								$saida_despesa_esc_dominical=transf_moeda(anti_injection($_POST["saida_esc_dominical"]));
								$saida_despesa_minist_feminino=transf_moeda(anti_injection($_POST["saida_minist_feminino"]));
								$saida_despesa_minist_masculino=transf_moeda(anti_injection($_POST["saida_minist_masculino"]));
								$saida_despesa_minist_juvenil=transf_moeda(anti_injection($_POST["saida_minist_juvenil"]));
								$saida_despesa_dep_infantil=transf_moeda(anti_injection($_POST["saida_dep_infantil"]));
								$saida_despesa_dep_missoes=transf_moeda(anti_injection($_POST["saida_dep_missoes"]));
								
								$saida_regiao_esc_dominical=valor_dep_regiao($entrada_esc_dominical);
								$saida_regiao_minist_feminino=valor_dep_regiao($entrada_minist_feminino);
								$saida_regiao_minist_masculino=valor_dep_regiao($entrada_minist_masculino);
								$saida_regiao_minist_juvenil=valor_dep_regiao($entrada_minist_juvenil);
								$saida_regiao_dep_infantil=valor_dep_regiao($entrada_dep_infantil);
								$saida_regiao_dep_missoes=valor_dep_regiao($entrada_dep_missoes);
								

							
							if(empty($entrada_dizimo)){
									echo"<script language=javascript>alert('Informe a Receita dos dízimos!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_of_culto)){
									echo"<script language=javascript>alert('Informe a Receita das ofertas de Culto!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_of_missoes)){
									echo"<script language=javascript>alert('Informe informar a Receita das Ofertas de Missões!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_of_construcao)){
									echo"<script language=javascript>alert('Informe a Receita de Ofertas de Construção!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_ent_especiais)){
 									echo"<script language=javascript>alert('Informe a Receita de Entradas Especiais!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_outros)){
									echo"<script language=javascript>alert('Informe a Receita de Outras Entradas!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_despesa_dizimo)){
									echo"<script language=javascript>alert('Informe a Despesa dos dízimos!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_despesa_of_culto)){
									echo"<script language=javascript>alert('Informe a Despesa das ofertas de Culto!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_despesa_of_missoes)){
									echo"<script language=javascript>alert('Informe a Despesa das Ofertas de Missões!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_despesa_of_construcao)){
									echo"<script language=javascript>alert('Informe a Despesa de Ofertas de Construção!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_despesa_ent_especiais)){
 									echo"<script language=javascript>alert('Informe a Despesa de Entradas Especiais!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_despesa_outros)){
									echo"<script language=javascript>alert('Informe a Despesa de Outras Entradas!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_esc_dominical)){
									echo"<script language=javascript>alert('Informe a Receita da Escola Dominical!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_minist_feminino)){
									echo"<script language=javascript>alert('Informe a Receita do Ministério Feminino!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_minist_masculino)){
									echo"<script language=javascript>alert('Informe a Receita do Ministério Masculino!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_minist_juvenil)){
 									echo"<script language=javascript>alert('Informe a Receita do Ministério Juvenil!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_dep_infantil)){
									echo"<script language=javascript>alert('Informe a Receita do Departamento Infantil!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_dep_missoes)){
									echo"<script language=javascript>alert('Informe a Receita do Departamento de Missões!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_despesa_esc_dominical)){
									echo"<script language=javascript>alert('Informe a Despesa da Escola Dominical!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_despesa_minist_feminino)){
									echo"<script language=javascript>alert('Informe a Despesa do Ministério Feminino!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_despesa_minist_masculino)){
									echo"<script language=javascript>alert('Informe a Despesa do Ministério Masculino!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_despesa_minist_juvenil)){
 									echo"<script language=javascript>alert('Informe a Despesa do Ministério Juvenil!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_despesa_dep_infantil)){
									echo"<script language=javascript>alert('Informe a Despesa do Departamento Infantil!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_despesa_dep_missoes)){
									echo"<script language=javascript>alert('Informe a Despesa do Departamento de Missões!')</script>";
									echo"<script language=javascript> location.href='javascript:history.back()'</script>";
								}else
								{
									
			

$inserir = mysqli_query($conecta,"UPDATE relatorio_financeiro set entrada_dizimo='$entrada_dizimo',entrada_of_culto='$entrada_of_culto',entrada_of_missoes='$entrada_of_missoes',entrada_of_construcao='$entrada_of_construcao',entrada_ent_especiais='$entrada_ent_especiais',entrada_outros='$entrada_outros',saida_regiao_dizimo='$saida_regiao_dizimo',saida_regiao_of_culto='$saida_regiao_of_culto',saida_regiao_of_missoes='$saida_regiao_of_missoes',saida_regiao_of_construcao='$saida_regiao_of_construcao',saida_regiao_ent_especiais='$saida_regiao_ent_especiais',saida_regiao_outros='$saida_regiao_outros',saida_despesa_dizimo='$saida_despesa_dizimo',saida_despesa_of_culto='$saida_despesa_of_culto',saida_despesa_of_missoes='$saida_despesa_of_missoes',saida_despesa_of_construcao='$saida_despesa_of_construcao',saida_despesa_ent_especiais='$saida_despesa_ent_especiais',saida_despesa_outros='$saida_despesa_outros', entrada_esc_dominical='$entrada_esc_dominical', entrada_minist_feminino='$entrada_minist_feminino', entrada_minist_masculino='$entrada_minist_masculino', entrada_minist_juvenil='$entrada_minist_juvenil', entrada_dep_infantil='$entrada_dep_infantil', entrada_dep_missoes='$entrada_dep_missoes', saida_regiao_esc_dominical='$saida_regiao_esc_dominical', saida_regiao_minist_feminino='$saida_regiao_minist_feminino', saida_regiao_minist_masculino='$saida_regiao_minist_masculino', saida_regiao_minist_juvenil='$saida_regiao_minist_juvenil', saida_regiao_dep_infantil='$saida_regiao_dep_infantil', saida_regiao_dep_missoes='$saida_regiao_dep_missoes', saida_despesa_esc_dominical='$saida_despesa_esc_dominical', saida_despesa_minist_feminino='$saida_despesa_minist_feminino', saida_despesa_minist_masculino='$saida_despesa_minist_masculino', saida_despesa_minist_juvenil='$saida_despesa_minist_juvenil', saida_despesa_dep_infantil='$saida_despesa_dep_infantil', saida_despesa_dep_missoes='$saida_despesa_dep_missoes' where mes='$mes_ref' and ano='$ano_ref' and status='SALVO' and igreja_id={$igreja_id} and id={$id}")or die(mysqli_error($conecta)) ;

							
									echo"<script language=javascript>alert('Relatório Alterado com Sucesso')</script>";
								
									echo"<script language=javascript>location.href='javascript:CloseWindow()'</script>";
								}
								
							}
							


?>

                    </div>
                   
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->	
		
<script type="text/javascript">$("#money01").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money02").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money03").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money04").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money05").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money06").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money07").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money08").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money09").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money10").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money11").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money12").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money13").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money14").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money15").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money16").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money17").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money18").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money19").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money20").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money21").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money22").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money23").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money24").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money25").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money26").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money27").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money28").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money29").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money30").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money31").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money32").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money33").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money34").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money35").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money36").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
<script language="javascript">
<!--

function CloseWindow() {

  window.close();

}
//-->
</script>

</body></html>