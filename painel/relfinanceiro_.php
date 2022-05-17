<php
include("configuracao.php");
?>
<?php 
$mes=date(m);
$ano=date(Y);
if($mes == "1"){
$mes_ref="12";
$mes_nome="Dezembro";
$ano_ref=date(Y)-1;
}else{
$mes_ref=date(m)-1;
$ano_ref=date(Y);

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


$selectrelatorio = mysqli_query($conecta,"SELECT * FROM relatorio_financeiro WHERE mes=$mes_ref and ano=$ano_ref and status='pendente'");
$dadosrelatorio = mysqli_fetch_array($selectrelatorio);
$num_results = mysqli_num_rows($selectrelatorio); 
if ($num_results >0){ 
$saldo_dizimo=$dadosrelatorio['saldo_dizimo'];
$saldo_of_culto=$dadosrelatorio['saldo_of_culto'];
$saldo_of_missoes=$dadosrelatorio['saldo_of_missoes'];
$saldo_of_construcao=$dadosrelatorio['saldo_of_construcao'];
$saldo_ent_especiais=$dadosrelatorio['saldo_ent_especiais'];
$saldo_outros=$dadosrelatorio['saldo_outros'];
}else{ 
$saldo_dizimo=0.00;
$saldo_of_culto=0.00;
$saldo_of_missoes=0.00;
$saldo_of_construcao=0.00;
$saldo_ent_especiais=0.00;
$saldo_outros=0.00;
}
?>
<div id="main-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<?php 
				if($total_membros==0){
					 ?>
		<div class="row-fluid">
		<div class="span12">
		<div class="alert alert-block alert-error fade in">	
			<p><strong>Voc&ecirc; ainda n&atilde;o cadastrou nenhum Membro.</strong></p>
		</div>
		</div>	
		</div>
		<?php } else { ?>
		<div class="row-fluid">
		<div class="span12">
		<div class="alert alert-block alert-success fade in">	
			<p>Seja Bem-Vindo! </p>
		</div>
		</div>	
		</div>
		<?php } ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="span6">
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Sistema de Gest&atilde;o
							<small> Igreja de Deus no Brasil </small>
						</h3>
						<ul class="breadcrumb">
							<li>
                                <a href="index.php?view=home"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
							</li>
<li><a href="index.php?view=relatorios">Relat&oacute;rios</a><span class="divider">&nbsp;</span></li>
<li><a href="index.php?view=relfinanceiro">Relat&oacute;rio Financeiro</a><span class="divider-last">&nbsp;</span></li>
						</ul>	
						</div>
						<div class="span6">

						</div>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">


<form action="index.php?view=relfinanceiro"	method="post" >
<div class="control-group">
<label class="control-label">M&ecirc;s de Ref&ecirc;ncia</label>
                                    <div class="controls">
<input type="text" name="mes" value="<?php echo $mes_nome."/".$ano_ref;?>" disabled>
                                    </div>
<table class="table table-bordered table-hover">
<thead>
                                <tr>
								<th><center>Saldo</center></th>
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
                                        <input type="text" class="relatorio" id="money1" name="saldo_dizimos" value="<?php echo $saldo_dizimo;?>" disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta dos Culto:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money2" name="saldo_of_culto" value="<?php echo $saldo_of_culto;?>" disabled>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money3" name="saldo_of_missoes" value="<?php echo $saldo_of_missoes;?>" disabled>
                                    </div>
                                </div>
																	<div class="control-group">
                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money4" name="saldo_of_construcao" value="<?php echo $saldo_of_construcao;?>" disabled>
                                    </div>
                                </div>
																<div class="control-group">
                                    <label class="control-label"> Entradas Especiais:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money5" name="saldo_ent_especiais" value="<?php echo $saldo_ent_especiais;?>" disabled>
                                    </div>
                                </div>
																								<div class="control-group">
                                    <label class="control-label"> Outros:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money6" name="saldo_outros" value="<?php echo $saldo_outros;?>" disabled>
                                    </div>
                                </div>
								</td>

<!-- Entradas -->
		<td>
                                    
									
									<div class="control-group">
                                    <label class="control-label"> D&iacute;zimos Diversos:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money7" name="entrada_dizimo" value="" autocomplete="off" >
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta dos Culto:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money8" name="entrada_of_culto" value="" autocomplete="off" >
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money9" name="entrada_of_missoes" value="" autocomplete="off" >
                                    </div>
                                </div>
																	<div class="control-group">
                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money10" name="entrada_of_contrucao" value="" autocomplete="off" >
                                    </div>
                                </div>
																<div class="control-group">
                                    <label class="control-label"> Entradas Especiais:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money11" name="entrada_ent_especiais" value="" autocomplete="off" >
                                    </div>
                                </div>
																								<div class="control-group">
                                    <label class="control-label"> Outros:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money12" name="entrada_outros" value="" autocomplete="off" >
                                    </div>
                                </div>
								</td>
<!-- saidas -->

<td>
                                    
									
									<div class="control-group">
                                    <label class="control-label"> D&iacute;zimos Diversos:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money13" name="saldo" id="saida_dizimo" value="" autocomplete="off" >
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta dos Culto:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money14" name="saida_of_culto" value="" autocomplete="off">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label"> Oferta Miss&otilde;es:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money15" name="saida_of_missoes" value="" autocomplete="off" >
                                    </div>
                                </div>
																	<div class="control-group">
                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money16" name="saida_of_contrucao" value="" autocomplete="off" >
                                    </div>
                                </div>
																<div class="control-group">
                                    <label class="control-label"> Entradas Especiais:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money17" name="saida_ent_especiais" value="" autocomplete="off" >
                                    </div>
                                </div>
																								<div class="control-group">
                                    <label class="control-label"> Outros:</label>
                                    <div class="controls">
                                        <input type="text" class="relatorio" id="money18" name="saida_outros" value="" autocomplete="off" >
                                    </div>
                                </div>
								</td>


</tr>
								 </tbody>
								</table>
                                </div>
								<div class="form-actions">
								<center><input type="reset" value="Limpar" class="btn blue"/>
                                    <input type="submit" value="Cadastrar" name="ok" class="btn blue"/></center>
                                </div>	
								
</form>
	<?php 
							if(isset($_POST['ok'])){
								$saldo_dizimo=anti_injection($_POST["saldo_dizimo"]);
								$saldo_of_culto=anti_injection($_POST["saldo_of_culto"]);
								$saldo_of_missoes=anti_injection($_POST["saldo_of_missoes"]);
								$saldo_of_construcao=anti_injection($_POST["saldo_of_construcao"]);
								$saldo_ent_especiais=anti_injection($_POST["saldo_ent_especiais"]);
								$saldo_outros=anti_injection($_POST["saldo_outros"]);

								$entrada_dizimo=anti_injection($_POST["entrada_dizimo"]);
								$entrada_of_culto=anti_injection($_POST["entrada_of_culto"]);
								$entrada_of_missoes=anti_injection($_POST["entrada_of_missoes"]);
								$entrada_of_construcao=anti_injection($_POST["entrada_of_construcao"]);
								$entrada_ent_especiais=anti_injection($_POST["entrada_ent_especiais"]);
								$entrada_outros=anti_injection($_POST["entrada_outros"]);


								$saida_dizimo=anti_injection($_POST["saida_dizimo"]);
								$saida_of_culto=anti_injection($_POST["saida_of_culto"]);
								$saida_of_missoes=anti_injection($_POST["saida_of_missoes"]);
								$saida_of_construcao=anti_injection($_POST["saida_of_construcao"]);
								$saida_ent_especiais=anti_injection($_POST["saida_ent_especiais"]);
								$saida_outros=anti_injection($_POST["saida_outros"]);


							
							
							if(empty($entrada_dizimo)){
									echo"<script language=javascript>alert('Informe a Receita dos dízimos!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
echo"
function setFocusToTextBox(){
    var textbox = document.getElementById(\"entrada_dizimo\");
    textbox.focus();
    textbox.scrollIntoView();
}
";
								}else if(empty($entrada_of_culto)){
									echo"<script language=javascript>alert('Informe a Receita das ofertas de Culto!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_of_missoes)){
									echo"<script language=javascript>alert('Informe informar a Receita das Ofertas de Missões!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_of_contrucao)){
									echo"<script language=javascript>alert('Informe a Receita de Ofertas de Construção!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_ent_especiais)){
 									echo"<script language=javascript>alert('Informe a Receita de Entradas Especiais!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($entrada_outros)){
									echo"<script language=javascript>alert('Informe a Receita de Outras Entradas!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}elseif(empty($saida_dizimo)){
									echo"<script language=javascript>alert('Informe a Despesa dos dízimos!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_of_culto)){
									echo"<script language=javascript>alert('Informe a Despesa das ofertas de Culto!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_of_missoes)){
									echo"<script language=javascript>alert('Informe a Despesa das Ofertas de Missões!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_of_contrucao)){
									echo"<script language=javascript>alert('Informe a Despesa de Ofertas de Construção!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_ent_especiais)){
 									echo"<script language=javascript>alert('Informe a Despesa de Entradas Especiais!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if(empty($saida_outros)){
									echo"<script language=javascript>alert('Informe a Despesa de Outras Entradas!')</script>";
									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else{
								
if ($num_results >0){ 

$inserir = mysqli_query($conecta,"UPDATE relatorio set saldo_dizimo=$saldo_dizimo,saldo_of_culto=$saldo_of_culto,saldo_of_missoes=$saldo_of_missoes,saldo_of_construcao=$saldo_of_construcao,saldo_ent_especiais=$saldo_ent_especiais,saldo_outros=$saldo_outros,entrada_dizimo=$entrada_dizimo,entrada_of_culto=$entrada_of_culto,entrada_of_missoes=$entrada_of_missoes,entrada_of_construcao=$entrada_of_construcao,entrada_ent_especiais=$entrada_ent_especiais,entrada_outros=$entrada_outros,saida_regiao_dizimo=$saida_regiao_dizimo,saida_regiao_of_culto=$saida_regiao_of_culto,saida_regiao_of_missoes=$saida_regiao_of_missoes,saida_regiao_of_construcao=$saida_regiao_of_construcao,saida_regiao_ent_especiais=$saida_regiao_ent_especiais,saida_regiao_outros=$saida_regiao_outros,saida_despesa_dizimo=saida_despesa_dizimo,saida_despesa_of_culto=saida_despesa_of_culto,saida_despesa_of_missoes=$saida_despesa_of_missoes,saida_despesa_of_construcao=$saida_despesa_of_construcao,saida_despesa_ent_especiais=$saida_despesa_ent_especiais,saida_despesa_outros=$saida_despesa_outros,status='SALVO',igreja_id={$igreja_id},regiao_id={$regiao_id} where mes='{$mes_ref}' and ano='{$ano_ref}' and id={$dadosrelatorio['id']})")or die(mysql_error()) ;
}else{ 
$inserir = mysqli_query($conecta,"insert into relatorio (id,mes,ano,saldo_dizimo,saldo_of_culto,saldo_of_missoes,saldo_of_construcao,saldo_ent_especiais,saldo_outros,entrada_dizimo,entrada_of_culto,entrada_of_missoes,entrada_of_construcao,entrada_ent_especiais,entrada_outros,saida_regiao_dizimo,saida_regiao_of_culto,saida_regiao_of_missoes,saida_regiao_of_construcao,saida_regiao_ent_especiais,saida_regiao_outros,saida_despesa_dizimo,saida_despesa_of_culto,saida_despesa_of_missoes,saida_despesa_of_construcao,saida_despesa_ent_especiais,saida_despesa_outros,status,igreja_id,regiao_id)values(null,'{$mes_ref}','{$ano_ref}',$saldo_dizimo,$saldo_of_culto,$saldo_of_missoes,$saldo_of_construcao,$saldo_ent_especiais,$saldo_outros,$entrada_dizimo,$entrada_of_culto,$entrada_of_missoes,$entrada_of_construcao,$entrada_ent_especiais,$entrada_outros,$saida_dizimo,$saida_of_culto,$saida_of_missoes,$saida_of_construcao,$saida_ent_especiais,$saida_outros,'SALVO',$igreja_id,$regiao_id)")or die(mysql_error()) ;
}
							
									echo"<script language=javascript>alert('Relatório Salvo com Sucesso')</script>";
									
								}
								
							}
	?>


                    </div>
                   
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>	
<script type="text/javascript">$("#money1").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money2").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money3").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money4").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money5").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money6").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money7").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money8").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money9").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money10").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money11").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money12").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money13").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money14").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money15").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money16").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money17").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script type="text/javascript">$("#money18").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});</script>
<script>
function setFocusToTextBox(int i){
   

 document.getElementById("mytext").focus();
}
</script>