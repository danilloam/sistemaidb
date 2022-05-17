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

$mes_referencia= $ano."-".$mes;

$totaldesaidas=0;
$totalentradas=0;
$totaldesaidasp=0;
$entradas_mes_dizimos=0;
$entradas_mes_ofertas=0;
$entradas_mes_missoes=0;
$entradas_mes_construcao=0;
$entradas_mes_ent_especiais=0;
$entradas_mes_outros=0;
$mes_referencia=date('Y')."-".date('m');

$query_dizimos = "SELECT sum(10_igreja) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_dizimos = mysqli_query($conecta,$query_dizimos) or die(mysqli_error($conecta));
$rowdizimos = mysqli_fetch_array($result_dizimos);
$entradas_mes_dizimos=$rowdizimos['sum(10_igreja)'];

$query_diz_pastor = "SELECT sum(diz_pastor) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_diz_pastor = mysqli_query($conecta,$query_diz_pastor) or die(mysqli_error($conecta));
$rowdiz_pastor = mysqli_fetch_array($result_diz_pastor);
$entradas_mes_diz_pastor=$rowdiz_pastor['sum(diz_pastor)'];

$query_missoes = "SELECT sum(missoes) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id."  and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_missoes = mysqli_query($conecta,$query_missoes) or die(mysqli_error($conecta));
$rowmissoes = mysqli_fetch_array($result_missoes);
$entradas_mes_missoes=$rowmissoes['sum(missoes)'];

$query_construcao = "SELECT sum(fundoministerial) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and  `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_construcao = mysqli_query($conecta,$query_construcao) or die(mysqli_error($conecta));
$rowconstrucao = mysqli_fetch_array($result_construcao);
$entradas_mes_construcao=$rowconstrucao['sum(fundoministerial)'];

$query_outros = "SELECT sum(outros) FROM caixa_regiao WHERE `regiao_id`=".$regiao_id." and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_outros = mysqli_query($conecta,$query_outros) or die(mysqli_error($conecta));
$rowoutros = mysqli_fetch_array($result_outros);
$entradas_mes_outros=$rowoutros['sum(outros)'];

$entrada_mes=$entradas_mes_dizimos+$entradas_mes_diz_pastor+$entradas_mes_missoes+$entradas_mes_construcao+$entradas_mes_ent_especiais+$entradas_mes_outros;


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

<li><a href="index.php?view=relatoriosregiao">Relat&oacute;rios</a><span class="divider">&nbsp;</span></li>

<li><a href="index.php?view=relfinanceiroregiao">Relat&oacute;rio Financeiro</a><span class="divider">&nbsp;</span></li>
<li><span class="tools">
                           
                         <a href="index.php?view=finanresumoregiao&mes=<?php echo $mes-1; ?>&ano=<?php echo $ano;?>"> <button class="btn btn-small btn" type="button"><i class="icon-circle-arrow-left"></i></button></a>
                                <button class="btn btn-small btn" type="button"><?php echo mesextenco($mes).' de '.$ano; ?></button>
                               <a href="index.php?view=finanresumoregiao&mes=<?php echo $mes+1; ?>&ano=<?php echo $ano;?>"> <button class="btn btn-small btn" type="button"><i class="icon-circle-arrow-right"></i></button></a>
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



 

                    <div class="row-fluid metro-overview-cont">
                        
                        <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-reorder"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Demonstra&ccedil;&atilde;o de Resultado de Exerc&iacute;cio (DRE) - Movimenta&ccedil;&atilde;o Financeira</font></font></h4>
                           <span class="tools">
                           <?php echo mesextenco($mes)."/".$ano; ?>
                           </span>
                        </div>
                        <div class="widget-body">
                           <div class="row-fluid">
                              <div class="span12">
                                 <!--BEGIN TABS-->
                                 
                                 
                                 <div class="tabbable tabbable-custom">
                                    <ul class="nav nav-tabs">
                                        <?php
                                 	$caixabusca = mysqli_query($conecta,"SELECT * FROM caixa_base ORDER BY id ASC");
                                    $qtd_caixas=mysqli_num_rows($caixabusca);
	                                    while($caixa = mysqli_fetch_array($caixabusca)){

	
                                 ?>
                                        
                                       <li class="<?php if($caixa["id"]==1){echo "active";}else{echo "";} ?>"><a href="#tab_1_<?php echo $caixa["id"];?>" data-toggle="tab"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo utf8_encode($caixa["descricao"]);?></font></font></a></li>
                                     <?php } ?>
                                    </ul>
                                    <div class="tab-content">
                                         <?php
                                 	$caixabusca1 = mysqli_query($conecta,"SELECT * FROM caixa_base ORDER BY id ASC");
                                    $qtd_caixas1=mysqli_num_rows($caixabusca1);
	                                    while($caixa1 = mysqli_fetch_array($caixabusca1)){

	
                                 ?>
                                     
                                       <div class="tab-pane <?php if($caixa1["id"]==1){echo "active";}else{echo "";} ?>" id="tab_1_<?php echo $caixa1["id"];?>">
                                          <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MOVIMENTA&Ccedil;&Atilde;O: <?php echo utf8_encode($caixa1["descricao"]);?></font></font></p>
                                         <table class="table">
   <tr>
        <td class="text-success"><h4>Entradas:</h4></td>
        <td class="text-error"><h4>À pagar:</h4></td>
        <td class="text-error"><h4>Saídas:</h4></td>
        <td class="text-error"><h4>Região:</h4></td>
        <td class="text-info"><h4>Saldo:</h4></td>
        
    </tr>
    <tr>
        <td class="text-success"><h4>R$ <?php 
		
		switch ($caixa1["id"]) {
   case 1:
       $valor_apagar=$entradas_mes_dizimos;

       break;
   case 2:
       $valor_apagar=$entradas_mes_ofertas;
       break;
   case 3:
      $valor_apagar=$entradas_mes_missoes;
       break;
	      case 4:
       $valor_apagar=$entradas_mes_construcao;
       break;
	      case 5:
       $valor_apagar=$entradas_mes_ent_especiais;
       break;
	      case 6:
       $valor_apagar=$saidas_mes_outros_apagar;
       break;
}
		
		echo moeda($valor_apagar); ?></h4></td>
        <td class="text-error"><h4>
		R$ <?php 
		
			switch ($caixa1["id"]) {
   case 1:
       $valor_apagar=$saidas_mes_dizimos_apagar;

       break;
   case 2:
       $valor_apagar=$saidas_mes_ofertas_apagar;
       break;
   case 3:
      $valor_apagar=$saidas_mes_missoes_apagar;
       break;
	      case 4:
       $valor_apagar=$saidas_mes_construcao_apagar;
       break;
	      case 5:
       $valor_apagar=$saidas_mes_ent_especiais_apagar;
       break;
	      case 6:
       $valor_apagar=$saidas_mes_outros_apagar;
       break;
}
		
		echo moeda($valor_apagar); ?>
		</h4></td>
        <td class="text-error"><h4>R$
		<?php 
		
			switch ($caixa1["id"]) {
   case 1:
       $valor_pago=$saidas_mes_dizimos_pago;

       break;
   case 2:
       $valor_pago=$saidas_mes_ofertas_pago;
       break;
   case 3:
      $valor_pago=$saidas_mes_missoes_pago;
       break;
	      case 4:
       $valor_pago=$saidas_mes_construcao_pago;
       break;
	      case 5:
       $valor_pago=$saidas_mes_ent_especiais_pago;
       break;
	      case 6:
       $valor_pago=$saidas_mes_outros_pago;
       break;
}
		
		echo moeda($valor_pago); ?>
		
		</h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
        <td class="text-info"><h4>R$ <?php echo moeda($totalentradas-$totaldesaidas); ?></h4></td>
    </tr>
</table>
                                       </div>
                                         <?php } ?>
                                      
                                    </div>
                                  
                                 </div>
                                 <!--END TABS-->
                              </div>
                              
                           </div>
                        </div>
                     </div>
                       <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-reorder"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Demonstra&ccedil;&atilde;o de Resultado de Exerc&iacute;cio (DRE) - Departamentos</font></font></h4>
                           <span class="tools">
                           <?php echo mesextenco($mes)."/".$ano; ?>
                           </span>
                        </div>
                        <div class="widget-body">
                           <div class="row-fluid">
                              <div class="span12">
                                 <!--BEGIN TABS-->
                                 <div class="tabbable tabbable-custom">
                                    <ul class="nav nav-tabs">
                                          <?php
                                 	$departamentosbusca = mysqli_query($conecta,"SELECT * FROM departamentos ORDER BY id ASC");
                                    $qtd_departamentos=mysqli_num_rows($departamentosbusca);
	                                    while($departamentos = mysqli_fetch_array($departamentosbusca)){

	
                                 ?>
                                       <li class="<?php if($departamentos["id"]==1){echo "active";}else{echo "";} ?>"><a href="#tab_2_<?php echo $departamentos["id"];?>" data-toggle="tab"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo utf8_encode($departamentos["descricao"]);?></font></font></a></li>
                                      
                                      <?php } ?>
                                    </ul>
                                    <div class="tab-content">
                                        <?php
                                       $departamentosbusca1 = mysqli_query($conecta,"SELECT * FROM departamentos ORDER BY id ASC");
                                    $qtd_departamentos=mysqli_num_rows($departamentosbusca1);
	                                    while($departamentos1 = mysqli_fetch_array($departamentosbusca1)){
	                                    ?>
                                       <div class="tab-pane <?php if($departamentos1["id"]==1){echo "active";}else{echo "";} ?>" id="tab_2_<?php echo $departamentos1["id"];?>">
                                          <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MOVIMENTA&Ccedil;&Atilde;O: <?php echo utf8_encode($departamentos1["descricao"]);?></font></font></p>
                                                                                   <table class="table">
    <tr>
        <td class="text-success"><h4>Entradas:</h4></td>
        <td class="text-error"><h4>À pagar:</h4></td>
        <td class="text-error"><h4>Saídas:</h4></td>
        <td class="text-error"><h4>Região:</h4></td>
        <td class="text-info"><h4>Saldo:</h4></td>
        
    </tr>
    <tr>
        <td class="text-success"><h4>R$ <?php echo moeda($totalentradas); ?></h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidasp); ?></h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
        <td class="text-error"><h4>R$ <?php echo moeda($totaldesaidas); ?></h4></td>
        <td class="text-info"><h4>R$ <?php echo moeda($totalentradas-$totaldesaidas); ?></h4></td>
    </tr>

</table>
                                          
                                       </div>
                                       <?php } ?>
                                       
                                    </div>
                                 </div>
                                 <!--END TABS-->
                              </div>
                              
                              
                           </div>
                        </div>
                     </div>
                           <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-reorder"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Relt&oacute;rios das Igrejas enviados para o Escrit&oacute;rio Regional</font></font></h4>
                           <span class="tools">
                           <?php echo mesextenco($mes)."/".$ano; ?>
                           </span>
                        </div>
                        <div class="widget-body">
                           <div class="row-fluid">
                              <div class="span12">
                                 <!--BEGIN TABS-->
                                 <div class="tabbable tabbable-custom">
                                    <div class="tab-content">
                                       <table class="table table-bordered table-hover">

                                <thead>

                                <tr>
									<th><center>Igreja</center></th>
                                    <th><center>Refer&ecirc;cia</center></th>
                                    <th><center>Valor enviado para Regi&atilde;o</center></th>
                                    <th><center>Status do Relatório</center></th>
                                    <th><center>Enviado via Sistema?</center></th>
                                    <th><center>Menu</center></th>
                                </tr>

                                </thead>

                                <tbody>

                                <?php

	

	$igrejasbusca = mysqli_query($conecta,"SELECT * FROM relatorio_financeiro where regiao_id=$regiao_id and regiao_id=$regiao_id and mes=$mes ORDER BY id ASC");

		while($resultadoigrejas = mysqli_fetch_array($igrejasbusca)){

		 ?>

								<tr>
                                    <td><center><?php echo $resultadoigrejas['mes']."/".$resultadoigrejas['ano'];?></center></td>

									<td><center><?php $valor_enviado_regiao=$resultadoigrejas['saida_regiao_dizimo']+$resultadoigrejas['saida_regiao_of_missoes']+$resultadoigrejas['saida_regiao_esc_dominical']+$resultadoigrejas['saida_regiao_minist_feminino']+$resultadoigrejas['saida_regiao_minist_masculino']+$resultadoigrejas['saida_regiao_adolescentes']+$resultadoigrejas['saida_regiao_dep_infantil']+$resultadoigrejas['saida_regiao_dep_missoes']+$resultadoigrejas['saida_regiao_minist_juvenil'];echo"R$ ".transf_real($valor_enviado_regiao);?></center></td>
                               
                                    <td><center><?php echo $resultadoigrejas['status'];?></center></td>
                                      <td><center><?php if($resultadoigrejas['via_sistema']==1){echo "Sim"; } else if($resultadoigrejas['via_sistema']==0){echo "NÃO";}?></center></td>
                                    <td><center><a href="relatorios/relenvigreja.php?ig=<?php echo $resultadoigrejas['id'];?>&m=<?php echo $resultadoigrejas['mes'];?>&a=<?php echo $resultadoigrejas['ano'];?>" class="various" data-fancybox-type="iframe"><button class="btn btn-primary"><i class="icon-eye-open"> Visualizar Relat&oacute;rio</i></button></a></center></td>
                                </tr>

<?php		}	?>

                                </tbody>

                            </table>
                                    </div>
                                 </div>
                                 <!--END TABS-->
                              </div>
                           </div>
                        </div>
                     </div>
                    </div>
	            </div>
         </div>
 </div>





















