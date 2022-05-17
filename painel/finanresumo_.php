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




$mes_referencia=date('m')."/".date('Y');

$query_dizimos = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `categoria`=1 and `tipo`='Entrada' and data LIKE '%/".$mes_referencia."'"; 
$result_dizimos = mysqli_query($conecta,$query_dizimos) or die(mysqli_error($conecta));
$rowdizimos = mysqli_fetch_array($result_dizimos);
$entradas_mes_dizimos=$rowdizimos['sum(valor)'];

$query_ofertas = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `categoria`=2 and `tipo`='Entrada' and data LIKE '%/".$mes_referencia."'"; 
$result_ofertas = mysqli_query($conecta,$query_ofertas) or die(mysqli_error($conecta));
$rowofertas = mysqli_fetch_array($result_ofertas);
$entradas_mes_ofertas=$rowofertas['sum(valor)'];

$query_missoes = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `categoria`=3 and `tipo`='Entrada' and data LIKE '%/".$mes_referencia."'"; 
$result_missoes = mysqli_query($conecta,$query_missoes) or die(mysqli_error($conecta));
$rowmissoes = mysqli_fetch_array($result_missoes);
$entradas_mes_missoes=$rowmissoes['sum(valor)'];

$query_construcao = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `categoria`=4 and `tipo`='Entrada' and data LIKE '%/".$mes_referencia."'"; 
$result_construcao = mysqli_query($conecta,$query_construcao) or die(mysqli_error($conecta));
$rowconstrucao = mysqli_fetch_array($result_construcao);
$entradas_mes_construcao=$rowconstrucao['sum(valor)'];

$query_ent_especiais = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `categoria`=5 and `tipo`='Entrada' and data LIKE '%/".$mes_referencia."'"; 
$result_ent_especiais = mysqli_query($conecta,$query_ent_especiais) or die(mysqli_error($conecta));
$rowent_especiais = mysqli_fetch_array($result_ent_especiais);
$entradas_mes_ent_especiais=$rowent_especiais['sum(valor)'];

$query_outros = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `categoria`=6 and `tipo`='Entrada' and data LIKE '%/".$mes_referencia."'"; 
$result_outros = mysqli_query($conecta,$query_outros) or die(mysqli_error($conecta));
$rowoutros = mysqli_fetch_array($result_outros);
$entradas_mes_outros=$rowoutros['sum(valor)'];

$query_ebd = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `categoria`=7 and `tipo`='Entrada' and data LIKE '%/".$mes_referencia."'"; 
$result_ebd = mysqli_query($conecta,$query_ebd) or die(mysqli_error($conecta));
$rowebd = mysqli_fetch_array($result_ebd);
$entradas_mes_ebd=$rowebd['sum(valor)'];

$query_feminino = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `categoria`=8 and `tipo`='Entrada' and data LIKE '%/".$mes_referencia."'"; 
$result_feminino = mysqli_query($conecta,$query_feminino) or die(mysqli_error($conecta));
$rowfeminino = mysqli_fetch_array($result_feminino);
$entradas_mes_departamento_feminino=$rowfeminino['sum(valor)'];

$query_masculino = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `categoria`=9 and `tipo`='Entrada' and data LIKE '%/".$mes_referencia."'"; 
$result_masculino = mysqli_query($conecta,$query_masculino) or die(mysqli_error($conecta));
$rowmasculino = mysqli_fetch_array($result_masculino);
$entradas_mes_departamento_masculino=$rowmasculino['sum(valor)'];

$query_adolescentes = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `categoria`=10 and `tipo`='Entrada' and data LIKE '%/".$mes_referencia."'"; 
$result_adolescentes = mysqli_query($conecta,$query_adolescentes) or die(mysqli_error($conecta));
$rowadolescentes = mysqli_fetch_array($result_adolescentes);
$entradas_mes_departamento_adolescentes=$rowadolescentes['sum(valor)'];

$query_jovens = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `categoria`=11 and `tipo`='Entrada' and data LIKE '%/".$mes_referencia."'"; 
$result_jovens = mysqli_query($conecta,$query_jovens) or die(mysqli_error($conecta));
$rowjovens = mysqli_fetch_array($result_jovens);
$entradas_mes_departamento_jovens=$rowjovens['sum(valor)'];

$query_departamento_infantil = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `categoria`=12 and `tipo`='Entrada' and data LIKE '%/".$mes_referencia."'"; 
$result_departamento_infantil = mysqli_query($conecta,$query_departamento_infantil) or die(mysqli_error($conecta));
$rowdepartamento_infantil = mysqli_fetch_array($result_departamento_infantil);
$entradas_mes_departamento_infantil=$rowdepartamento_infantil['sum(valor)'];

$query_departamento_missoes = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `categoria`=13 and `tipo`='Entrada' and data LIKE '%/".$mes_referencia."'"; 
$result_departamento_missoes = mysqli_query($conecta,$query_departamento_missoes) or die(mysqli_error($conecta));
$rowdepartamento_missoes = mysqli_fetch_array($result_departamento_missoes);
$entradas_mes_departamento_missoes=$rowdepartamento_missoes['sum(valor)'];

$entradas_mes_departamentos=$entradas_mes_ebd+$entradas_mes_departamento_feminino+$entradas_mes_departamento_masculino+$entradas_mes_departamento_adolescentes+$entradas_mes_departamento_jovens+$entradas_mes_departamento_infantil+$entradas_mes_departamento_missoes;

$query_saidas = "SELECT sum(valor) FROM caixa WHERE `igreja_id`=".$igreja_id." and `tipo`='Saida' and data LIKE '%/".$mes_referencia."'"; 
$result_saidas = mysqli_query($conecta,$query_saidas) or die(mysqli_error($conecta));
$rowsaidas = mysqli_fetch_array($result_saidas);
$saidas_mes_diversas=$rowsaidas['sum(valor)'];
$saidas_mes_regiao=(($entradas_mes_dizimos*15)/100)+(($entradas_mes_missoes*60)/100)+(($entradas_mes_departamentos*10)/100);

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

                    <div class="row-fluid metro-overview-cont">
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview turquoise-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($entradas_mes_dizimos);?></center></div>
                                    <div class="title"><center>Ent. de D&iacute;zimos</center></div>      
                                </div>
                              
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview green-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($entradas_mes_ofertas);?></center></div>
                                     <div class="title"><center>Ent. de Ofertas</center></div>
                                </div>
                              
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview purple-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($entradas_mes_missoes);?></center></div>
                                     <div class="title"><center>Ent. Miss&otilde;es</center></div>
                                </div>
                              
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview blue-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($entradas_mes_departamentos);?></center></div>
                                    <div class="title"><center>Ent. de Departamentos</center></div>
                                </div>
                              
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview red-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($saidas_mes_diversas);?></center></div>
                                     <div class="title"><center>Despesas Diversas</center></div>
                                </div>
                              
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview gray-color clearfix">
                           
                                <div class="details">
                                    <div class="numbers"><center><?php echo"R$ ".transf_real($saidas_mes_regiao);?></center></div>
                                     <div class="title"><center>Sa&iacute;das p/ Regi&atilde;o</center></div>
                                </div>
                              
                            </div>
                        </div>
                            <div class="span10">
                                   

	                            
	                            <a class="icon-btn span2" href="#">
                                <i class="icon-warning-sign"></i>
                                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contas a Pagar</font></font></div>
                                <span class="badge badge-important"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo 'R$ '.moeda($totaldesaidasp);?></font></font></span>
                                </a>
    	                        <a class="icon-btn span2" href="#">
                                <i class="icon-ok"></i>
                                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contas Pagas</font></font></div>
                                <span class="badge badge-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo 'R$ '.moeda($totaldesaidasp);?></font></font></span>
                                </a>
                            	<a class="icon-btn span2" href="#">
                                <i class="icon-barcode"></i>
                                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Saldo em Caixas</font></font></div>
                                <span class="badge badge-info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo 'R$ '.moeda($totaldesaidasp);?></font></font></span>
                                </a>
                                </div>
                        
                        
                    </div>
                    	<div class="col-md-6">

					<div class="panel panel-default">

						<div class="panel-heading">
						    
						      <h4><i class="icon-reorder"></i> Financeiro  - <?php echo mesextenco($mes)."/".$ano; ?></h4>
                         <span class="tools">
                           
                         <a href="index.php?view=finanresumo&mes=<?php echo $mes-1; ?>&ano=<?php echo $ano;?>"> <button class="btn btn-small btn-primary" type="button"><i class="icon-circle-arrow-left"></i></button></a>
                                <button class="btn btn-small btn-primary" type="button"><?php echo mesextenco($mes).' de '.$ano; ?></button>
                               <a href="index.php?view=finanresumo&mes=<?php echo $mes+1; ?>&ano=<?php echo $ano;?>"> <button class="btn btn-small btn-primary" type="button"><i class="icon-circle-arrow-right"></i></button></a>
                            </span>
						</div>

						<div class="panel-body">

						
<table class="table table-bordered table-hover">

                                <thead>

                                <tr>

                                  

                                    <th><center>Refer&ecirc;cia</center></th>

<th><center>Valor enviado</center></th>


									

                                    <th></th>

                                </tr>

                                </thead>

                                <tbody>

                                <?php

	

	$igrejasbusca = mysqli_query($conecta,"SELECT * FROM relatorio_financeiro where regiao_id=$regiao_id and igreja_id=$igreja_id and status='CONFIRMADO' ORDER BY id ASC");

		while($resultadoigrejas = mysqli_fetch_array($igrejasbusca)){

	

	$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE id=".$resultadoigrejas['estado_id']);

$dadosestado = mysqli_fetch_array($selectestado);



		 ?>

								<tr>

        

                                    <td><center><?php echo $resultadoigrejas['mes']."/".$resultadoigrejas['ano'];	?></center></td>

									<td><center><?php 
									
									
									$valor_enviado_regiao=$resultadoigrejas['saida_regiao_dizimo']+$resultadoigrejas['saida_regiao_of_missoes']+$resultadoigrejas['saida_regiao_esc_dominical']+$resultadoigrejas['saida_regiao_minist_feminino']+$resultadoigrejas['saida_regiao_minist_masculino']+$resultadoigrejas['saida_regiao_adolescentes']+$resultadoigrejas['saida_regiao_dep_infantil']+$resultadoigrejas['saida_regiao_dep_missoes']+$resultadoigrejas['saida_regiao_minist_juvenil'];

									
									
									echo"R$ ".transf_real($valor_enviado_regiao);?></center></td>
                               

<td><center><a href="relatorios/relenvigreja.php?ig=<?php echo $resultadoigrejas['id'];?>&m=<?php echo $resultadoigrejas['mes'];?>&a=<?php echo $resultadoigrejas['ano'];?>" class="various" data-fancybox-type="iframe">

                                            	<button class="btn btn-primary"><i class="icon-eye-open"> Visualizar Relat&oacute;rio</id></button></a></center></td>



                                </tr>

<?php

		

		}

		

		?>

                                </tbody>

                            </table>		





 <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-reorder"></i>MOVIMENTOS FINANCEIROS</h4>
                        </div>
                        <div class="widget-body">
                           <div class="accordion in collapse" id="accordion1" style="height: auto;">
                              <div class="accordion-group">
                                 <div class="accordion-heading">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
                                    <i class=" icon-plus"></i>
                                    DIZIMOS DIVERSOS
                                    </a>
                                 </div>
                                 <div id="collapse_1" class="accordion-body collapse" style="height: 0px;">
                                    <div class="accordion-inner">
                                        <table class="table">
    <tr>
        <td class="text-success"><h4>Entradas:</h4></td>
        <td class="text-success"><h4>R$ <?php echo moeda($totalentradas); ?></h4></td>
    </tr>
    <tr>
        <td class="text-error"><h4>À pagar:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidasp); ?></h4></td>
    </tr>
    <tr>
        <td class="text-error"><h4>Saídas:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
    </tr>
       <tr>
        <td class="text-error"><h4>Região:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
    </tr>
    <tr>
        <td class="text-info"><h4>Saldo:</h4></td>
        <td class="text-info"><h4>R$ <?php echo moeda($totalentradas-$totaldesaidas); ?></h4></td>
    </tr>
</table>
                                    </div>
                                 </div>
                              </div>
                              <div class="accordion-group">
                                 <div class="accordion-heading">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2">
                                    <i class=" icon-plus"></i>
                                    OFERTA DOS CULTOS
                                    </a>
                                 </div>
                                 <div id="collapse_2" class="accordion-body collapse" style="height: 0px;">
                                    <div class="accordion-inner">
                                        <table class="table">
    <tr>
        <td class="text-success"><h4>Entradas:</h4></td>
        <td class="text-success"><h4>R$ <?php echo moeda($totalentradas); ?></h4></td>
    </tr>
    <tr>
        <td class="text-error"><h4>À pagar:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidasp); ?></h4></td>
    </tr>
    <tr>
        <td class="text-error"><h4>Saídas:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
    </tr>
       <tr>
        <td class="text-error"><h4>Região:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
    </tr>
    <tr>
        <td class="text-info"><h4>Saldo:</h4></td>
        <td class="text-info"><h4>R$ <?php echo moeda($totalentradas-$totaldesaidas); ?></h4></td>
    </tr>
</table>
                                    </div>
                                 </div>
                              </div>
                              <div class="accordion-group">
                                 <div class="accordion-heading">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3">
                                    <i class=" icon-plus"></i>
                                    VISÃO CORPORATIVA
                                    </a>
                                 </div>
                                 <div id="collapse_3" class="accordion-body collapse" style="height: 0px;">
                                    <div class="accordion-inner">
                                       <table class="table">
    <tr>
        <td class="text-success"><h4>Entradas:</h4></td>
        <td class="text-success"><h4>R$ <?php echo moeda($totalentradas); ?></h4></td>
    </tr>
    <tr>
        <td class="text-error"><h4>À pagar:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidasp); ?></h4></td>
    </tr>
    <tr>
        <td class="text-error"><h4>Saídas:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
    </tr>
       <tr>
        <td class="text-error"><h4>Região:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
    </tr>
    <tr>
        <td class="text-info"><h4>Saldo:</h4></td>
        <td class="text-info"><h4>R$ <?php echo moeda($totalentradas-$totaldesaidas); ?></h4></td>
    </tr>
</table>
                                    </div>
                                 </div>
                              </div>
                               <div class="accordion-group">
                                   <div class="accordion-heading">
                                       <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4">
                                           <i class=" icon-plus"></i>
                                           OF. PARA CONSTRUÇÃO
                                       </a>
                                   </div>
                                   <div id="collapse_4" class="accordion-body collapse" style="height: 0px;">
                                       <div class="accordion-inner">
                                           <table class="table">
    <tr>
        <td class="text-success"><h4>Entradas:</h4></td>
        <td class="text-success"><h4>R$ <?php echo moeda($totalentradas); ?></h4></td>
    </tr>
    <tr>
        <td class="text-error"><h4>À pagar:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidasp); ?></h4></td>
    </tr>
    <tr>
        <td class="text-error"><h4>Saídas:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
    </tr>
       <tr>
        <td class="text-error"><h4>Região:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
    </tr>
    <tr>
        <td class="text-info"><h4>Saldo:</h4></td>
        <td class="text-info"><h4>R$ <?php echo moeda($totalentradas-$totaldesaidas); ?></h4></td>
    </tr>
</table>
                                       </div>
                                   </div>
                               </div>
                                <div class="accordion-group">
                                   <div class="accordion-heading">
                                       <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_5">
                                           <i class=" icon-plus"></i>
                                           OUTRAS
                                       </a>
                                   </div>
                                   <div id="collapse_5" class="accordion-body collapse" style="height: 0px;">
                                       <div class="accordion-inner">
                                          <table class="table">
    <tr>
        <td class="text-success"><h4>Entradas:</h4></td>
        <td class="text-success"><h4>R$ <?php echo moeda($totalentradas); ?></h4></td>
    </tr>
    <tr>
        <td class="text-error"><h4>À pagar:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidasp); ?></h4></td>
    </tr>
    <tr>
        <td class="text-error"><h4>Saídas:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
    </tr>
       <tr>
        <td class="text-error"><h4>Região:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
    </tr>
    <tr>
        <td class="text-info"><h4>Saldo:</h4></td>
        <td class="text-info"><h4>R$ <?php echo moeda($totalentradas-$totaldesaidas); ?></h4></td>
    </tr>
</table>
                                       </div>
                                   </div>
                               </div>
                                <div class="accordion-group">
                                   <div class="accordion-heading">
                                       <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_6">
                                           <i class=" icon-plus"></i>
                                           ENTRADAS ESPECIAIS
                                       </a>
                                   </div>
                                   <div id="collapse_6" class="accordion-body collapse" style="height: 0px;">
                                       <div class="accordion-inner">
                                         <table class="table">
    <tr>
        <td class="text-success"><h4>Entradas:</h4></td>
        <td class="text-success"><h4>R$ <?php echo moeda($totalentradas); ?></h4></td>
    </tr>
    <tr>
        <td class="text-error"><h4>À pagar:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidasp); ?></h4></td>
    </tr>
    <tr>
        <td class="text-error"><h4>Saídas:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
    </tr>
       <tr>
        <td class="text-error"><h4>Região:</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
    </tr>
    <tr>
        <td class="text-info"><h4>Saldo:</h4></td>
        <td class="text-info"><h4>R$ <?php echo moeda($totalentradas-$totaldesaidas); ?></h4></td>
    </tr>
</table>
                                       </div>
                                   </div>
                               </div>
                           </div>
                        </div>
                     </div>
 



						</div>

					</div>

				</div>
                    
	            </div>
    </div>
 </div>

