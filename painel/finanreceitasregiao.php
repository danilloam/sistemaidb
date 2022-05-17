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


$fdata1 = $ano.'-'.$mes.'-01';
$fdata2 = $ano.'-'.$mes.'-31';


$totaldesaidas=0;
$totalentradas=0;
$totaldesaidasp=0;

$entrada_mes=0;
$entradas_mes_dizimos=0;
$entradas_mes_ofertas=0;
$entradas_mes_missoes=0;
$entradas_mes_construcao=0;
$entradas_mes_ent_especiais=0;
$entradas_mes_outros=0;

$mes_referencia=$ano."-".$mes;

$mes_atual=date('Y')."-".date('m');

$query_dizimos = "SELECT sum(10_igreja) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_dizimos = mysqli_query($conecta,$query_dizimos) or die(mysqli_error($conecta));
$rowdizimos = mysqli_fetch_array($result_dizimos);
$entradas_mes_dizimos=$rowdizimos['sum(10_igreja)'];

$query_dizimosobreiros = "SELECT sum(diz_pastor) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_dizimosobreiros = mysqli_query($conecta,$query_dizimosobreiros) or die(mysqli_error($conecta));
$rowdizimosobreiros = mysqli_fetch_array($result_dizimosobreiros);
$entradas_mes_dizimosobreiros=$rowdizimosobreiros['sum(diz_pastor)'];



$query_missoes = "SELECT sum(missoes) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_missoes = mysqli_query($conecta,$query_missoes) or die(mysqli_error($conecta));
$rowmissoes = mysqli_fetch_array($result_missoes);
$entradas_mes_missoes=$rowmissoes['sum(missoes)'];

$query_fundoministerial = "SELECT sum(fundoministerial) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_fundoministerial = mysqli_query($conecta,$query_fundoministerial) or die(mysqli_error($conecta));
$rowfundoministerial = mysqli_fetch_array($result_fundoministerial);
$entradas_mes_fundoministerial=$rowfundoministerial['sum(fundoministerial)'];



$entrada_mes=$entradas_mes_dizimos+$entradas_mes_ofertas+$entradas_mes_missoes+$entradas_mes_construcao+$entradas_mes_ent_especiais+$entradas_mes_outros;


$query_ebd = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=1 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_ebd = mysqli_query($conecta,$query_ebd) or die(mysqli_error($conecta));
$rowebd = mysqli_fetch_array($result_ebd);
$entradas_mes_ebd=$rowebd['sum(valor)'];

$query_feminino = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=8 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_feminino = mysqli_query($conecta,$query_feminino) or die(mysqli_error($conecta));
$rowfeminino = mysqli_fetch_array($result_feminino);
$entradas_mes_departamento_feminino=$rowfeminino['sum(valor)'];

$query_masculino = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=9 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_masculino = mysqli_query($conecta,$query_masculino) or die(mysqli_error($conecta));
$rowmasculino = mysqli_fetch_array($result_masculino);
$entradas_mes_departamento_masculino=$rowmasculino['sum(valor)'];

$query_adolescentes = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=10 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_adolescentes = mysqli_query($conecta,$query_adolescentes) or die(mysqli_error($conecta));
$rowadolescentes = mysqli_fetch_array($result_adolescentes);
$entradas_mes_departamento_adolescentes=$rowadolescentes['sum(valor)'];

$query_jovens = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=11 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_jovens = mysqli_query($conecta,$query_jovens) or die(mysqli_error($conecta));
$rowjovens = mysqli_fetch_array($result_jovens);
$entradas_mes_departamento_jovens=$rowjovens['sum(valor)'];

$query_departamento_infantil = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=12 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_departamento_infantil = mysqli_query($conecta,$query_departamento_infantil) or die(mysqli_error($conecta));
$rowdepartamento_infantil = mysqli_fetch_array($result_departamento_infantil);
$entradas_mes_departamento_infantil=$rowdepartamento_infantil['sum(valor)'];

$query_departamento_missoes = "SELECT sum(valor) FROM caixa_departamento_regiao WHERE `regiao_id`=".$regiao_id." and `departamento_id`=13 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_departamento_missoes = mysqli_query($conecta,$query_departamento_missoes) or die(mysqli_error($conecta));
$rowdepartamento_missoes = mysqli_fetch_array($result_departamento_missoes);
$entradas_mes_departamento_missoes=$rowdepartamento_missoes['sum(valor)'];

$entradas_mes_departamentos=$entradas_mes_ebd+$entradas_mes_departamento_feminino+$entradas_mes_departamento_masculino+$entradas_mes_departamento_adolescentes+$entradas_mes_departamento_jovens+$entradas_mes_departamento_infantil+$entradas_mes_departamento_missoes;



$ultimoDia = date("t", mktime(0,0,0, date('m'),'01', date('Y')));


function verificar_Lancamento($igreja,$regiao,$mes){
    include("conexao/conecta.php");
$sqlconsulta="SELECT * FROM caixa_regiao WHERE `igreja_id`=".$igreja." and `regiao_id`=".$regiao." and `tipo`='entrada' and data LIKE '".$mes."-%'";    
    
$selectlancamentomes = mysqli_query($conecta,$sqlconsulta) or die(mysqli_error($conecta));	
$total_lancamentos_mes=mysqli_num_rows($selectlancamentomes);
if($total_lancamentos_mes>0){
   return true;
}else{
    return false;
}
}

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

<li><a href="index.php?view=finanreceitasregiao">Receitas</a><span class="divider">&nbsp;</span></li>
<li><span class="tools">
                           
                         <a href="index.php?view=finanreceitasregiao&mes=<?php echo $mes-1; ?>&ano=<?php echo $ano;?>"> <button class="btn btn-small btn" type="button"><i class="icon-circle-arrow-left"></i></button></a>
                                <button class="btn btn-small btn" type="button"><?php echo mesextenco($mes).' de '.$ano; ?></button>
                               <a href="index.php?view=finanreceitasregiao&mes=<?php echo $mes+1; ?>&ano=<?php echo $ano;?>"> <button class="btn btn-small btn" type="button"><i class="icon-circle-arrow-right"></i></button></a>
                            </span></li>
                            <li><a href="./relatorios/relenvregional.php?r=<?php echo $regiao_id;?>&m=<?php echo $mes;?>&a=<?php echo $ano;?>" class="various" data-fancybox-type="iframe">Teste</a> </li>
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
				
				 <div data-desktop="span3" data-tablet="span4" class="span3 responsive">
                            <div class="metro-overview turquoise-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($entradas_mes_dizimos);?></center></div>
                                    <div class="title"><center>FUNDO DIZ. / DIZIMOS.</center></div>      
                                </div>
                              
                            </div>
                        </div>
                        <div data-desktop="span3" data-tablet="span4" class="span3 responsive">
                            <div class="metro-overview green-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($entradas_mes_dizimosobreiros);?></center></div>
                                     <div class="title"><center>FUNDO DIZ. / OBREIROS</center></div>
                                </div>
                              
                            </div>
                        </div>
                        <div data-desktop="span3" data-tablet="span4" class="span3 responsive">
                            <div class="metro-overview purple-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($entradas_mes_fundoministerial);?></center></div>
                                     <div class="title"><center>FUNDO MINISTERIAL</center></div>
                                </div>
                              
                            </div>
                        </div>
                        <div data-desktop="span3" data-tablet="span4" class="span3 responsive">
                            <div class="metro-overview blue-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($entradas_mes_missoes);?></center></div>
                                    <div class="title"><center>Visão Corporativa</center></div>
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

							if($mes_referencia<=$mes_atual){


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
							   <th><i class="icon-home"></i> Igreja</th>
							   <th><i class="icon-flag"></i> Estado</th>
                                 <th><i class="icon-money"></i> Valor</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
						   <?php
						   $query_entradas = mysqli_query($conecta,"SELECT * FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='Entrada' and data LIKE '".$mes_referencia."-%' ORDER BY data");
while($result_entradas = mysqli_fetch_assoc($query_entradas)){
		    
		    $tipobusca = mysqli_query($conecta,"SELECT * FROM igreja where id=".$result_entradas["igreja_id"]." and regiao_id=".$regiao_id);
$resultadotipo = mysqli_fetch_array($tipobusca);
	$igreja=utf8_encode($resultadotipo["nome"]);
	$estado_id=$resultadotipo["estado_id"];
	 $estadobusca = mysqli_query($conecta,"SELECT * FROM estado where id=".$estado_id." and regiao_id=".$regiao_id);
$resultadoestado = mysqli_fetch_array($estadobusca);
	$valor_recebido=$result_entradas["10_igreja"]+$result_entradas["diz_pastor"]+$result_entradas["seguro"]+$result_entradas["evangelismo"]+$result_entradas["distrito"]+$result_entradas["missoes"]+$result_entradas["ebd"]+$result_entradas["homens"]+$result_entradas["mulher"]+$result_entradas["jovens"]+$result_entradas["adolescentes"]+$result_entradas["criancas"]+$result_entradas["fundoministerial"]+$result_entradas["outros"];
?>
                              <tr>
							  <td class="highlight">
                                    <div class="success"></div>
                                    <a href="#"><?php echo $igreja;?></a>
                                 </td>
							  <td class="highlight">
                                    <div class="success"></div>
                                    <a href="#"><?php echo $resultadoestado["uf"];?></a>
                                 </td>

                               
                                 <td><?php echo"R$ ".transf_real($valor_recebido);?></td>
                                 <td><a href="#" class="btn mini purple"><i class="icon-edit"></i> Visualizar</a></td>
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
                                            <h3 id="myModalLabel1">Adicionar Receita</h3>
                                        </div>
										<form enctype="multipart/form-data" action="index.php?view=finanreceitasregiao&mes=<?php echo $mes;?>&ano=<?php echo $ano;?>"	method="post" >
                                        <div class="modal-body">
                                           <div class="control-group">
                                    <label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Informe o tipo da entrada:</font></font></label>
                                    <div class="controls">
                                        <select class="input-large m-wrap" id="igreja" name="igreja" tabindex="1" required="required"	>
										<?php 
$sql_mov_financeira=mysqli_query($conecta,"select * from igreja where regiao_id=".$regiao_id." order by nome")or die(mysqli_error($conecta));
                                while($ver_categorias_mov_financeira=mysqli_fetch_array($sql_mov_financeira)){
if(verificar_Lancamento($ver_categorias_mov_financeira["id"],$regiao_id,$mes_referencia)== false){
                                 ?>
                                            <option value="<?php echo $ver_categorias_mov_financeira["id"]; ?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo utf8_encode($ver_categorias_mov_financeira["nome"]); ?></font></font></option>
                                           
								<?php 

                                }
}
                                 ?>
									   </select>
                                    </div>
                                </div>
			
								<div class="control-group">
                              <label class="control-label"></label>
                              <div class="controls">
                                 <div class="input-prepend input-append">
                                    <span class="add-on"><font style="vertical-align: inherit;">Valor da Entrada de D&iacute;zimos: </font></span>  <input type="text" class="input-medium" id="money01" name="valordizimo" value="" >
                                 </div>
                              </div>
                           </div>
                           	<div class="control-group">
                              <label class="control-label"></label>
                              <div class="controls">
                                 <div class="input-prepend input-append">
                                    <span class="add-on"><font style="vertical-align: inherit;">Valor da Ajuda ao Ministro: </font></span>  <input type="text" class="input-medium" id="money02" name="valorministro" value="" >
                                 </div>
                              </div>
                           </div>
                           	<div class="control-group">
                              <label class="control-label"></label>
                              <div class="controls">
                                 <div class="input-prepend input-append">
                                    <span class="add-on"><font style="vertical-align: inherit;">Valor da Entrada de Miss&otilde;es: </font></span>  <input type="text" class="input-medium" id="money03" name="valormissoes" value="" >
                                 </div>
                              </div>
                           </div>
                           	<div class="control-group">
                              <label class="control-label"></label>
                              <div class="controls">
                                 <div class="input-prepend input-append">
                                    <span class="add-on"><font style="vertical-align: inherit;">Valor da Entrada de EBD: </font></span>  <input type="text" class="input-medium" id="money04" name="valorebd" value="" >
                                 </div>
                              </div>
                           </div>
                           	<div class="control-group">
                              <label class="control-label"></label>
                              <div class="controls">
                                 <div class="input-prepend input-append">
                                    <span class="add-on"><font style="vertical-align: inherit;">Valor da Entrada do Minist. da Mulher: </font></span>  <input type="text" class="input-medium" id="money05" name="valormulher" value="" >
                                 </div>
                              </div>
                           </div>
                           	<div class="control-group">
                              <label class="control-label"></label>
                              <div class="controls">
                                 <div class="input-prepend input-append">
                                    <span class="add-on"><font style="vertical-align: inherit;">Valor da Entrada do Minist. Masculino: </font></span>  <input type="text" class="input-medium" id="money06" name="valorhomem" value="" >
                                 </div>
                              </div>
                           </div>
                           	<div class="control-group">
                              <label class="control-label"></label>
                              <div class="controls">
                                 <div class="input-prepend input-append">
                                    <span class="add-on"><font style="vertical-align: inherit;">Valor da Entrada do Minist. Jovem: </font></span>  <input type="text" class="input-medium" id="money07" name="valorjovem" value="" >
                                 </div>
                              </div>
                           </div>
                           	<div class="control-group">
                              <label class="control-label"></label>
                              <div class="controls">
                                 <div class="input-prepend input-append">
                                    <span class="add-on"><font style="vertical-align: inherit;">Valor da Entrada do Minist. Adolescentes: </font></span>  <input type="text" class="input-medium" id="money08" name="valoradolescente" value="" >
                                 </div>
                              </div>
                           </div>
                           	<div class="control-group">
                              <label class="control-label"></label>
                              <div class="controls">
                                 <div class="input-prepend input-append">
                                    <span class="add-on"><font style="vertical-align: inherit;">Valor da Entrada do Minist. Infantil: </font></span>  <input type="text" class="input-medium" id="money09" name="valorinfantil" value="" >
                                 </div>
                              </div>
                           </div>
                            <div class="control-group">
                              <label class="control-label"></label>
                              <div class="controls">
                                 <div class="input-prepend input-append">
                                    <span class="add-on"><font style="vertical-align: inherit;">Valor de Outras Entradas: </font></span>  <input type="text" class="input-medium" id="money10" name="valoroutros" value="" >
                                 </div>
                              </div>
                           </div>
						   <div class="controls">
                                      <span class="add-on"><font style="vertical-align: inherit;">Data do Lan&ccedil;amento: </font></span>    <input id="datalancamento" name="datalancamento" type="date" value="" min="<?php echo $ano."-01-01";?>" max="<?php echo $ano."-".$mes."-".$ultimoDia;?>" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
                                    </div>
						    <input type="submit" value="Cadastrar" name="ok" class="btn blue">
						   </form>
						   <?php 

							if(isset($_POST['ok'])){

                                $igreja=utf8_decode(anti_injection($_POST["igreja"]));
                               
                               $igreja_final=mysqli_query($conecta,"select * from igreja where regiao_id=".$regiao_id." and id=".$igreja);
                               $resultadoigrejafinal = mysqli_fetch_array($igreja_final); 
                                $estado_id_final =$resultadoigrejafinal["estado_id"];
                                $estadobuscafinal = mysqli_query($conecta,"SELECT * FROM estado where id=".$estado_id_final." and regiao_id=".$regiao_id);
                                $resultadoestadofinal = mysqli_fetch_array($estadobuscafinal);                            
                                $porcentagem_estado=$resultadoestadofinal["porcentagem"];
                                
                                
								$entrada_dizimo=transf_moeda(anti_injection($_POST["valordizimo"]));
								
								
                                if($porcentagem_estado>0){
                                    
                                    $valor_estado=transforma_banco($entrada_dizimo*$porcentagem_estado/100);
                                }else{
                                    
                                     $valor_estado=transforma_banco(0.00);
                                }
                                
								$dizimo=transforma_banco($entrada_dizimo*10/100);
								$seguro=transforma_banco($entrada_dizimo*1/100);
								$evangelismo=transforma_banco($entrada_dizimo*1.5/100);
							    $distrito=transforma_banco($entrada_dizimo*1.5/100);
							    $fundo_ministerial=transforma_banco($entrada_dizimo*1/100);
							    $ajuda_ministro=transf_moeda(anti_injection($_POST["valorministro"]));
								$dizimo_pastor=transforma_banco($ajuda_ministro*10/100);

								$missoes=transf_moeda(anti_injection($_POST["valormissoes"]));
								$ebd=transf_moeda(anti_injection($_POST["valorebd"]));
								$mulher=transf_moeda(anti_injection($_POST["valormulher"]));
								$homem=transf_moeda(anti_injection($_POST["valorhomem"]));
                            	$jovem=transf_moeda(anti_injection($_POST["valorjovem"]));
                        		$adolescente=transf_moeda(anti_injection($_POST["valoradolescente"]));
                    			$infantil=transf_moeda(anti_injection($_POST["valorinfantil"]));
                    			$outros=transf_moeda(anti_injection($_POST["valoroutros"]));
								$data_lancamento=anti_injection($_POST["datalancamento"]);
								
								$sql_insert_caixa_regiao="INSERT INTO `caixa_regiao`(`igreja_id`, `regiao_id`,`estado_id`,`entrada_igreja`, `10_igreja`, `ajuda_pastor`, `diz_pastor`, `seguro`, `evangelismo`, `distrito`, `missoes`, `ebd`, `mulher`, `homens`, `jovens`, `adolescentes`, `criancas`, `fundoministerial`,`outros`,  `data`, `tipo`, `status`) VALUES (".$igreja.",".$regiao_id.",".$estado_id_final.",'".$entrada_dizimo."','".$dizimo."','".$ajuda_ministro."','".$dizimo_pastor."','".$seguro."','".$evangelismo."','".$distrito."','".$missoes."','".$ebd."','".$mulher."','".$homem."','".$jovem."','".$adolescente."','".$infantil."','".$fundo_ministerial."','".$outros."','".$data_lancamento."','Entrada','Pago')";
	$inserir = mysqli_query($conecta,$sql_insert_caixa_regiao) or die (mysqli_error($conecta));

	$sql_insert_caixa_estado="INSERT INTO `caixa_estado`(`igreja_id`, `estado_id`, `regiao_id`, `entrada_igreja`,`5_igreja`, `data`, `tipo`, `status`) VALUES (".$igreja.",".$estado_id_final.",".$regiao_id.",'".$entrada_dizimo."','".$valor_estado."','".$data_lancamento."','Entrada','Pago')";
	$inserir1 = mysqli_query($conecta,$sql_insert_caixa_estado) or die (mysqli_error($conecta));
						
						
						echo"<script language=javascript>alert('Receita cadastrada com Sucesso!')</script>";

								 echo"<script language=javascript>location.href='index.php?view=finanreceitasregiao&mes=".$mes."&ano=".$ano."'</script>";


								}

								 ?>
						  
						   
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                           
                                        </div>
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
$("#money02").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money03").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money04").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money05").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money06").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money07").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money08").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money09").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money10").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
</script>










