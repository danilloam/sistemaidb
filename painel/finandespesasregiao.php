 <?php

include("configuracao.php");
include("conexao/conecta.php");

@$ano = $_GET["ano"];
@$mes = $_GET["mes"];

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



$totaldesaidas=0;
$totalsaidas=0;
$totaldesaidasp=0;

$saida_mes=0;
$saidas_mes_dizimos=0;
$saidas_mes_ofertas=0;
$saidas_mes_missoes=0;
$saidas_mes_construcao=0;
$saidas_mes_ent_especiais=0;
$saidas_mes_outros=0;

$mes_referencia=$ano."-".$mes;

$mes_atual=date('Y')."-".date('m');

$query_dizimos = "SELECT sum(valor) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `caixa_base_id`=1 and `tipo`='saida' and data LIKE '".$mes_referencia."-%'"; 
$result_dizimos = mysqli_query($conecta,$query_dizimos) or die(mysqli_error($conecta));
$rowdizimos = mysqli_fetch_array($result_dizimos);
$saidas_mes_dizimos=$rowdizimos['sum(valor)'];

$query_ofertas = "SELECT sum(valor) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `caixa_base_id`=2 and `tipo`='saida' and data LIKE '".$mes_referencia."-%'"; 
$result_ofertas = mysqli_query($conecta,$query_ofertas) or die(mysqli_error($conecta));
$rowofertas = mysqli_fetch_array($result_ofertas);
$saidas_mes_ofertas=$rowofertas['sum(valor)'];

$query_missoes = "SELECT sum(valor) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `caixa_base_id`=3 and `tipo`='saida' and data LIKE '".$mes_referencia."-%'"; 
$result_missoes = mysqli_query($conecta,$query_missoes) or die(mysqli_error($conecta));
$rowmissoes = mysqli_fetch_array($result_missoes);
$saidas_mes_missoes=$rowmissoes['sum(valor)'];

$query_construcao = "SELECT sum(valor) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `caixa_base_id`=4 and `tipo`='saida' and data LIKE '".$mes_referencia."-%'"; 
$result_construcao = mysqli_query($conecta,$query_construcao) or die(mysqli_error($conecta));
$rowconstrucao = mysqli_fetch_array($result_construcao);
$saidas_mes_construcao=$rowconstrucao['sum(valor)'];

$query_ent_especiais = "SELECT sum(valor) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `caixa_base_id`=5 and `tipo`='saida' and data LIKE '".$mes_referencia."-%'"; 
$result_ent_especiais = mysqli_query($conecta,$query_ent_especiais) or die(mysqli_error($conecta));
$rowent_especiais = mysqli_fetch_array($result_ent_especiais);
$saidas_mes_ent_especiais=$rowent_especiais['sum(valor)'];

$query_outros = "SELECT sum(valor) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `caixa_base_id`=6 and `tipo`='saida' and data LIKE '".$mes_referencia."-%'"; 
$result_outros = mysqli_query($conecta,$query_outros) or die(mysqli_error($conecta));
$rowoutros = mysqli_fetch_array($result_outros);
$saidas_mes_outros=$rowoutros['sum(valor)'];

$saida_mes=$saidas_mes_dizimos+$saidas_mes_ofertas+$saidas_mes_missoes+$saidas_mes_construcao+$saidas_mes_ent_especiais+$saidas_mes_outros;


$query_ebd = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=1 and `tipo`='saida' and data LIKE '".$mes_referencia."-%'"; 
$result_ebd = mysqli_query($conecta,$query_ebd) or die(mysqli_error($conecta));
$rowebd = mysqli_fetch_array($result_ebd);
$saidas_mes_ebd=$rowebd['sum(valor)'];

$query_feminino = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=8 and `tipo`='saida' and data LIKE '".$mes_referencia."-%'"; 
$result_feminino = mysqli_query($conecta,$query_feminino) or die(mysqli_error($conecta));
$rowfeminino = mysqli_fetch_array($result_feminino);
$saidas_mes_departamento_feminino=$rowfeminino['sum(valor)'];

$query_masculino = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=9 and `tipo`='saida' and data LIKE '".$mes_referencia."-%'"; 
$result_masculino = mysqli_query($conecta,$query_masculino) or die(mysqli_error($conecta));
$rowmasculino = mysqli_fetch_array($result_masculino);
$saidas_mes_departamento_masculino=$rowmasculino['sum(valor)'];

$query_adolescentes = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=10 and `tipo`='saida' and data LIKE '".$mes_referencia."-%'"; 
$result_adolescentes = mysqli_query($conecta,$query_adolescentes) or die(mysqli_error($conecta));
$rowadolescentes = mysqli_fetch_array($result_adolescentes);
$saidas_mes_departamento_adolescentes=$rowadolescentes['sum(valor)'];

$query_jovens = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=11 and `tipo`='saida' and data LIKE '".$mes_referencia."-%'"; 
$result_jovens = mysqli_query($conecta,$query_jovens) or die(mysqli_error($conecta));
$rowjovens = mysqli_fetch_array($result_jovens);
$saidas_mes_departamento_jovens=$rowjovens['sum(valor)'];

$query_departamento_infantil = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=12 and `tipo`='saida' and data LIKE '".$mes_referencia."-%'"; 
$result_departamento_infantil = mysqli_query($conecta,$query_departamento_infantil) or die(mysqli_error($conecta));
$rowdepartamento_infantil = mysqli_fetch_array($result_departamento_infantil);
$saidas_mes_departamento_infantil=$rowdepartamento_infantil['sum(valor)'];

$query_departamento_missoes = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=13 and `tipo`='saida' and data LIKE '".$mes_referencia."-%'"; 
$result_departamento_missoes = mysqli_query($conecta,$query_departamento_missoes) or die(mysqli_error($conecta));
$rowdepartamento_missoes = mysqli_fetch_array($result_departamento_missoes);
$saidas_mes_departamento_missoes=$rowdepartamento_missoes['sum(valor)'];

$saidas_mes_departamentos=$saidas_mes_ebd+$saidas_mes_departamento_feminino+$saidas_mes_departamento_masculino+$saidas_mes_departamento_adolescentes+$saidas_mes_departamento_jovens+$saidas_mes_departamento_infantil+$saidas_mes_departamento_missoes;



?>

  
<div id="main-content">

			<!-- BEGIN PAGE CONTAINER-->

	<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

		<?php if($total_membros==0){?>
				

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

							<small> regiao de Deus no Brasil </small>

						</h3>

						<ul class="breadcrumb">

							<li>

                                <a href="index.php?view=home"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>

							</li>

<li><a href="#">Financeiro</a><span class="divider">&nbsp;</span></li>

<li><a href="index.php?view=finanreceitas">Despesas</a><span class="divider">&nbsp;</span></li>
<li><span class="tools">
                           
                         <a href="index.php?view=finandespesas&mes=<?php echo $mes-1; ?>&ano=<?php echo $ano;?>"> <button class="btn btn-small btn" type="button"><i class="icon-circle-arrow-left"></i></button></a>
                                <button class="btn btn-small btn" type="button"><?php echo mesextenco($mes).' de '.$ano; ?></button>
                               <a href="index.php?view=finandespesas&mes=<?php echo $mes+1; ?>&ano=<?php echo $ano;?>"> <button class="btn btn-small btn" type="button"><i class="icon-circle-arrow-right"></i></button></a>
                            </span></li>
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
				
				 <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview turquoise-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($saidas_mes_dizimos);?></center></div>
                                    <div class="title"><center>D&iacute;zimos</center></div>      
                                </div>
                              
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview green-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($saidas_mes_ofertas);?></center></div>
                                     <div class="title"><center>Ofertas</center></div>
                                </div>
                              
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview purple-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($saidas_mes_missoes);?></center></div>
                                     <div class="title"><center>Visão Corporativa</center></div>
                                </div>
                              
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview blue-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($saidas_mes_construcao);?></center></div>
                                    <div class="title"><center>Construção</center></div>
                                </div>
                              
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview red-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($saidas_mes_ent_especiais);?></center></div>
                                     <div class="title"><center>Ent. Especiais</center></div>
                                </div>
                              
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview gray-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($saidas_mes_outros);?></center></div>
                                     <div class="title"><center>Outros</center></div>
                                </div>
                              
                            </div>
                        </div>

 <div class="space15"></div>

<div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN SAMPLE TABLE widget-->
                  <div class="widget">
                     <div class="widget-title">
                        <h4><i class="icon-cogs"></i>Movimentação Financeira</h4>
                        <span class="tools">
                       
                
                        </span>
                     </div>
                     <div class="widget-body">
					 
					 <div class="clearfix">
						<?php 

							if($mes_referencia<=$mes_atual+1){


								 ?>
                                    <div class="btn-group">
									<a href="#myModal1" role="button" class="btn btn-sucess" data-toggle="modal">
                                        Adicionar novo</a>
                                    </div>
										<?php 


								}

								 ?>
                                    <div class="btn-group pull-right">
                                        <button class="btn dropdown-toggle" data-toggle="dropdown"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ferramentas </font></font><i class="icon-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
        
                                            <li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Salvar como PDF</font></font></a></li>
                                            <li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Exportar para Excel</font></font></a></li>
                                        </ul>
                                    </div>
                                </div>
								                                <div class="space15"></div>
                        <table class="table table-striped table-bordered dataTable" id="sample_1" aria-describedby="sample_1_info">
                           <thead>
                              <tr>
                                 <th><i class="icon-calendar"></i> Data</th>
                                 <th class="hidden-phone"><i class="icon-align-justify"></i> Tipo</th>
                                 <th><i class="icon-money"></i> Valor</th>
							
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
						   <?php
						   $query_saidas = mysqli_query($conecta,"SELECT * FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='saida' and data LIKE '".$mes_referencia."-%' ORDER BY data");
while($result_saidas = mysqli_fetch_assoc($query_saidas)){
		    
		    $tipobusca = mysqli_query($conecta,"SELECT * FROM caixa_base where id=".$result_saidas["caixa_base_id"]);
$resultadotipo = mysqli_fetch_array($tipobusca);
	$tipo_saida=utf8_encode($resultadotipo["descricao"]);
?>
                              <tr>
                                 <td class="highlight">
                                    <div class="success"></div>
                                    <a href="#"><?php echo $result_saidas["data"];?></a>
                                 </td>
                                 <td class="hidden-phone"> <?php echo $tipo_saida;?></td>
                                 <td><?php echo"R$ ".transf_real($result_saidas["valor"]);?>
								 <?php if($result_saidas["status"]=="pago"){?>
									<span class="label label-success">Pago</span>
								 <?php } else{?>
									<span class="label label-warning">A Pagar</span>
								<?php }?>
								 </td>
                                 <td><a href="#" class="btn mini purple"><i class="icon-edit"></i> Edit</a></td>
                              </tr>
                  					   <?php
}
?>            
							  
							  
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <!-- END SAMPLE TABLE widget-->
               </div>
			   
			   <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="display: none;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 id="myModalLabel1">Adicionar Despesa</h3>
                                        </div>
										<form enctype="multipart/form-data" action="index.php?view=finandespesas&mes=<?php echo $mes;?>&ano=<?php echo $ano;?>"	method="post" >
                                        <div class="modal-body">
                                           <div class="control-group">
                                    <label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Informe o tipo da saida:</font></font></label>
                                    <div class="controls">
                                        <select class="input-large m-wrap" id="tipo" name="tipo" tabindex="1" required="required"	>
										<?php 
$sql_mov_financeira=mysqli_query($conecta,"select * from caixa_base")or die(mysqli_error($conecta));
                                while($ver_categorias_mov_financeira=mysqli_fetch_array($sql_mov_financeira)){

                                 ?>
                                            <option value="<?php echo $ver_categorias_mov_financeira["id"]; ?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo utf8_encode($ver_categorias_mov_financeira["descricao"]); ?></font></font></option>
                                           
								<?php 

                                }

                                 ?>
									   </select>
                                    </div>
                                </div>
			
								<div class="control-group">
                              <label class="control-label"></label>
                              <div class="controls">
                                 <div class="input-prepend input-append">
                                    <span class="add-on"><font style="vertical-align: inherit;">Valor da saida: </font></span>  <input type="text" class="input-medium" id="money01" name="valor" value="" >
                                 </div>
                              </div>
                           </div>
						   <div class="controls">
                                        <input id="datalancamento" name="datalancamento" type="date" value="" min="<?php echo $ano."-".$mes."-01";?>" max="<?php echo $ano."-".$mes."-".$ultimoDia;?>" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
                                    </div>
							<div class="control-group">
                                    <label class="control-label">Radio Buttons</label>
                                    <div class="controls">
                                        <label class="radio">
                                            <div class="radio" id="uniform-undefined"><span class="checked"><input type="radio" name="optionsRadios1" value="a pagar" style="opacity: 0;"></span></div>
                                            A pagar
                                        </label>
                                        <label class="radio">
                                            <div class="radio" id="uniform-undefined"><span class=""><input type="radio" name="optionsRadios1" value="Pago" checked="" style="opacity: 0;"></span></div>
                                            Pago
                                        </label>
                                       
                                    </div>
                                </div>		
									
						    <input type="submit" value="Cadastrar" name="ok" class="btn blue">
						   </form>
						   <?php 

							if(isset($_POST['ok'])){


								$caixa_base_id=utf8_decode(anti_injection($_POST["tipo"]));

								$valor=utf8_decode(anti_injection($_POST["valor"]));

								$data_lancamento=anti_injection($_POST["datalancamento"]);
								$status_lancamento=anti_injection($_POST["optionsRadios1"]);
								
	$inserir = mysqli_query($conecta,"INSERT INTO `caixa_regiao`( `caixa_base_id`, `regiao_id`, `data`, `valor`, `tipo`, `status`) VALUES (".$caixa_base_id.",".$regiao_id.",'".$data_lancamento."','".$valor."','saida','".$status_lancamento."')") or die (mysqli_error($conecta));

						echo"<script language=javascript>alert('Saida cadastrada com Sucesso!')</script>";				 


								}

								 ?>
						  
						   
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                           
                                        </div>
                                    </div>
									
								
               <div class="span6">
                  <!-- BEGIN SAMPLE TABLE widget-->            
                  <div class="widget">
                     <div class="widget-title">
                        <h4><i class="icon-cogs"></i>Advance Table</h4>
                        <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                        </span>
                     </div>
                     <div class="widget-body">
                         <table class="table table-striped table-bordered table-advance table-hover">
                             <thead>
                             <tr>
                                 <th><i class="icon-briefcase"></i> From</th>
                                 <th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
                                 <th><i class="icon-bookmark"></i> Total</th>
                                 <th></th>
                             </tr>
                             </thead>
                             <tbody>
                             <tr>
                                 <td><a href="#">Vector Ltd</a></td>
                                 <td class="hidden-phone">Lorem Ipsum dorolo imit</td>
                                 <td>12120.00$ <span class="label label-success label-mini">Due</span></td>
                                 <td><a href="#" class="btn mini green-stripe">View</a></td>
                             </tr>
                             <tr>
                                 <td>
                                     <a href="#">
                                         Adimin co
                                     </a>
                                 </td>
                                 <td class="hidden-phone">Lorem Ipsum dorolo</td>
                                 <td>56456.00$ <span class="label label-warning label-mini">due</span></td>
                                 <td><a href="#" class="btn mini blue-stripe">View</a></td>
                             </tr>
                             <tr>
                                 <td>
                                     <a href="#">
                                         boka soka
                                     </a>
                                 </td>
                                 <td class="hidden-phone">Lorem Ipsum dorolo</td>
                                 <td>14400.00$ <span class="label label-success label-mini">Paid</span></td>
                                 <td><a href="#" class="btn mini blue-stripe">View</a></td>
                             </tr>
                             <tr>
                                 <td>
                                     <a href="#">
                                         salbal llb
                                     </a>
                                 </td>
                                 <td class="hidden-phone">Lorem Ipsum dorolo</td>
                                 <td>2323.50$ <span class="label label-danger label-mini">Paid</span></td>
                                 <td><a href="#" class="btn mini red-stripe">View</a></td>
                             </tr>
                             </tbody>
                         </table>
                     </div>
                  </div>
                  <!-- END SAMPLE TABLE widget-->
               </div>
            </div>


	            </div>
         </div>
 </div>



<script src="https://kit.fontawesome.com/ad19f5a821.js" crossorigin="anonymous"></script>

   		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

		<script src="js/jquery.maskMoney.js" type="text/javascript"></script>

		<script src='js/shCore.js' type='text/javascript'></script>

		<script src='js/shBrushJScript.js' type='text/javascript'></script>

		<script src='js/shBrushXml.js' type='text/javascript'></script>

<script type="text/javascript" src="js/ajax.js"></script>


<script src="js/jquery.maskedinput.js" type="text/javascript"></script>

	<script src="js/jquery-1.8.3.min.js"></script>

	<script src="assets/bootstrap/js/bootstrap.min.js"></script>

	<script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>

	<script src="js/jquery.blockui.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">
$("#money01").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
</script>










