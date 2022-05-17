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
@$mes_ref=date(m)-01;
@$ano_ref=date(Y);

if($mes_ref==01){
$mes_nome="Janeiro";
}else if($mes_ref==02){
$mes_nome="Fevereiro";
}if($mes_ref==03){
$mes_nome="Mar&ccedil;o";
}else if($mes_ref==04){
$mes_nome="Abril";
}if($mes_ref==05){
$mes_nome="Maio";
}else if($mes_ref==06){
$mes_nome="Junho";
}if($mes_ref==07){
$mes_nome="Julho";
}else if($mes_ref==08){
$mes_nome="Agosto";
}if($mes_ref==09){
$mes_nome="Setembro";
}else if($mes_ref==10){
$mes_nome="Outubro";
}if($mes_ref==11){
$mes_nome="Novembro";
}else if($mes_ref==12){
$mes_nome="Dezembro";
}
}




$num_results=0;
$selectrelatorio = mysql_query("SELECT * FROM relatorio_estatistico_departamentos WHERE id={$id}");
$dadosrelatorio = mysql_fetch_array($selectrelatorio);
$num_results = mysql_num_rows($selectrelatorio); 



?>
<div id="main-content">

			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">
<div class="control-group">
<label class="control-label">M&ecirc;s de Ref&ecirc;ncia</label>
                                    <div class="controls">
<input type="text" name="mes" value="<?php echo $mes_nome."/".$ano_ref;?>" disabled>
                                    </div>

						<center><h3>Departamentos</h3></center>
<table class="table table-striped table-hover">
	<thead>
        <tr>
		<th><center>#</center></th>
			<th><center>Mat.</center></th>
            <th><center>Pres.</center></th>
			<th><center>Vis.</center></th>
		    <th><center>T. Freq.</center></th>
			<th><center>Reun.</center></th>
			<th><center>Conv.</center></th>
			<th><center>B. E .S</center></th>
			<th><center>Hospitais</center></th>
			<th><center>Lares</center></th>
			<th><center>Ar Livre</center></th>
        </tr>
    </thead>
                                <tbody>
								
								<tr>
								<td><center>M. Feminino:</td>
								<td><center><?php echo $dadosrelatorio['matriculado_minist_feminino'];?></center></td>
								<td><center><?php echo $dadosrelatorio['presentes_minist_feminino'];?></center></td>
								<td><center><?php echo $dadosrelatorio['visitantes_minist_feminino']?></center></td>
								<td><center><?php echo $dadosrelatorio['total_frequencia_minist_feminino']?></center></td>
								<td><center><?php echo $dadosrelatorio['reunioes_minist_feminino']?></center></td>
								<td><center><?php echo $dadosrelatorio['convertidos_minist_feminino']?></center></td>
								<td><center><?php echo $dadosrelatorio['bes_minist_feminino']?></center></td>
								<td><center><?php echo $dadosrelatorio['hospitais_minist_feminino']?></center></td>
								<td><center><?php echo $dadosrelatorio['lares_minist_feminino']?></center></td>
								<td><center><?php echo $dadosrelatorio['arlivre_minist_feminino']?></center></td>
								</tr>
																<tr>
								<td><center>M. Masculino:</td>
								<td><center><?php echo $dadosrelatorio['matriculado_minist_masculino'];?></center></td>
								<td><center><?php echo $dadosrelatorio['presentes_minist_masculino'];?></center></td>
								<td><center><?php echo $dadosrelatorio['visitantes_minist_masculino']?></center></td>
								<td><center><?php echo $dadosrelatorio['total_frequencia_minist_masculino']?></center></td>
								<td><center><?php echo $dadosrelatorio['reunioes_minist_masculino']?></center></td>
								<td><center><?php echo $dadosrelatorio['convertidos_minist_masculino']?></center></td>
								<td><center><?php echo $dadosrelatorio['bes_minist_masculino']?></center></td>
								<td><center><?php echo $dadosrelatorio['hospitais_minist_masculino']?></center></td>
								<td><center><?php echo $dadosrelatorio['lares_minist_masculino']?></center></td>
								<td><center><?php echo $dadosrelatorio['arlivre_minist_masculino']?></center></td>
								</tr>
																<tr>
								<td><center>M. Juvenil:</td>
								<td><center><?php echo $dadosrelatorio['matriculado_minist_juvenil'];?></center></td>
								<td><center><?php echo $dadosrelatorio['presentes_minist_juvenil'];?></center></td>
								<td><center><?php echo $dadosrelatorio['visitantes_minist_juvenil']?></center></td>
								<td><center><?php echo $dadosrelatorio['total_frequencia_minist_juvenil']?></center></td>
								<td><center><?php echo $dadosrelatorio['reunioes_minist_juvenil']?></center></td>
								<td><center><?php echo $dadosrelatorio['convertidos_minist_juvenil']?></center></td>
								<td><center><?php echo $dadosrelatorio['bes_minist_juvenil']?></center></td>
								<td><center><?php echo $dadosrelatorio['hospitais_minist_juvenil']?></center></td>
								<td><center><?php echo $dadosrelatorio['lares_minist_juvenil']?></center></td>
								<td><center><?php echo $dadosrelatorio['arlivre_minist_juvenil']?></center></td>
								</tr>
																<tr>
								<td><center>Dep. Infantil:</td>
								<td><center><?php echo $dadosrelatorio['matriculado_dep_infantil'];?></center></td>
								<td><center><?php echo $dadosrelatorio['presentes_dep_infantil'];?></center></td>
								<td><center><?php echo $dadosrelatorio['visitantes_dep_infantil']?></center></td>
								<td><center><?php echo $dadosrelatorio['total_frequencia_dep_infantil']?></center></td>
								<td><center><?php echo $dadosrelatorio['reunioes_dep_infantil']?></center></td>
								<td><center><?php echo $dadosrelatorio['convertidos_dep_infantil']?></center></td>
								<td><center><?php echo $dadosrelatorio['bes_dep_infantil']?></center></td>
								<td><center><?php echo $dadosrelatorio['hospitais_dep_infantil']?></center></td>
								<td><center><?php echo $dadosrelatorio['lares_dep_infantil']?></center></td>
								<td><center><?php echo $dadosrelatorio['arlivre_dep_infantil']?></center></td>
								</tr>
																<tr>
								<td><center>Adolescentes:</td>
								<td><center><?php echo $dadosrelatorio['matriculado_adolescentes'];?></center></td>
								<td><center><?php echo $dadosrelatorio['presentes_adolescentes'];?></center></td>
								<td><center><?php echo $dadosrelatorio['visitantes_adolescentes']?></center></td>
								<td><center><?php echo $dadosrelatorio['total_frequencia_adolescentes']?></center></td>
								<td><center><?php echo $dadosrelatorio['reunioes_adolescentes']?></center></td>
								<td><center><?php echo $dadosrelatorio['convertidos_adolescentes']?></center></td>
								<td><center><?php echo $dadosrelatorio['bes_adolescentes']?></center></td>
								<td><center><?php echo $dadosrelatorio['hospitais_adolescentes']?></center></td>
								<td><center><?php echo $dadosrelatorio['lares_adolescentes']?></center></td>
								<td><center><?php echo $dadosrelatorio['arlivre_adolescentes']?></center></td>
								</tr>
																<tr>
								<td><center>Dep. Miss&otilde;es:</td>
								<td><center><?php echo $dadosrelatorio['matriculado_dep_missoes'];?></center></td>
								<td><center><?php echo $dadosrelatorio['presentes_dep_missoes'];?></center></td>
								<td><center><?php echo $dadosrelatorio['visitantes_dep_missoes']?></center></td>
								<td><center><?php echo $dadosrelatorio['total_frequencia_dep_missoes']?></center></td>
								<td><center><?php echo $dadosrelatorio['reunioes_dep_missoes']?></center></td>
								<td><center><?php echo $dadosrelatorio['convertidos_dep_missoes']?></center></td>
								<td><center><?php echo $dadosrelatorio['bes_dep_missoes']?></center></td>
								<td><center><?php echo $dadosrelatorio['hospitais_dep_missoes']?></center></td>
								<td><center><?php echo $dadosrelatorio['lares_dep_missoes']?></center></td>
								<td><center><?php echo $dadosrelatorio['arlivre_dep_missoes']?></center></td>
								</tr>
			
								</tbody>
</table>
<center><h3>Escola B&iacute;blica</h3></center>
<table class="table table-striped table-hover">
	<thead>
        <tr><th><center>#</center></th>
			<th><center>Matric.</center></th>
            <th><center>Pres.</center></th>
			<th><center>Aus.</center></th>
			<th><center>Visit.</center></th>
		    <th><center>T. Freq.</center></th>
			<th><center>B&iacute;blias</center></th>
			<th><center>Revistas</center></th>
			<th><center>Professores</center></th>
			<th><center>N° Classe</center></th>
			<th><center>Esc. Celebr.</center></th>
        </tr>
    </thead>
                                <tbody>
								<!-- Matriculado -->
								<tr>
								<td>Adultos</td>
								<td><center><?php echo $dadosrelatorio['eb_matriculado_adultos'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_presentes_adultos'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_ausentes_adultos'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_visitantes_adultos'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_total_frequencia_adultos'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_biblias_adultos'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_revistas_adultos'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_professores_adultos'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_num_classes_adultos'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_esc_celebr_adultos'];?></center></td>
								</tr>
								<tr>
								<td>Crian&ccedil;as</td>
								<td><center><?php echo $dadosrelatorio['eb_matriculado_criancas'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_presentes_criancas'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_ausentes_criancas'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_visitantes_criancas'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_total_frequencia_criancas'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_biblias_criancas'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_revistas_criancas'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_professores_criancas'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_num_classes_criancas'];?></center></td>
								<td><center><?php echo $dadosrelatorio['eb_esc_celebr_criancas'];?></center></td>
								</tr>
								
								
								</tbody>
								</table>
 

						
												
							
					
				
   
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
</div>	
		</div>			
</body></html>