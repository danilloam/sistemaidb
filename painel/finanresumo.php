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
$totalentradas=0;
$totaldesaidasp=0;
$entradas_mes_dizimos=0;
$entradas_mes_ofertas=0;
$entradas_mes_missoes=0;
$entradas_mes_construcao=0;
$entradas_mes_ent_especiais=0;
$entradas_mes_outros=0;
$mes_referencia=$ano."-".$mes;

$query_dizimos = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=1 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_dizimos = mysqli_query($conecta,$query_dizimos) or die(mysqli_error($conecta));
$rowdizimos = mysqli_fetch_array($result_dizimos);
$entradas_mes_dizimos=$rowdizimos['sum(valor)'];

$query_ofertas = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=2 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_ofertas = mysqli_query($conecta,$query_ofertas) or die(mysqli_error($conecta));
$rowofertas = mysqli_fetch_array($result_ofertas);
$entradas_mes_ofertas=$rowofertas['sum(valor)'];

$query_missoes = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=3 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_missoes = mysqli_query($conecta,$query_missoes) or die(mysqli_error($conecta));
$rowmissoes = mysqli_fetch_array($result_missoes);
$entradas_mes_missoes=$rowmissoes['sum(valor)'];

$query_construcao = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=4 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_construcao = mysqli_query($conecta,$query_construcao) or die(mysqli_error($conecta));
$rowconstrucao = mysqli_fetch_array($result_construcao);
$entradas_mes_construcao=$rowconstrucao['sum(valor)'];

$query_ent_especiais = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=5 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_ent_especiais = mysqli_query($conecta,$query_ent_especiais) or die(mysqli_error($conecta));
$rowent_especiais = mysqli_fetch_array($result_ent_especiais);
$entradas_mes_ent_especiais=$rowent_especiais['sum(valor)'];

$query_outros = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=6 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_outros = mysqli_query($conecta,$query_outros) or die(mysqli_error($conecta));
$rowoutros = mysqli_fetch_array($result_outros);
$entradas_mes_outros=$rowoutros['sum(valor)'];

$entrada_mes=$entradas_mes_dizimos+$entradas_mes_ofertas+$entradas_mes_missoes+$entradas_mes_construcao+$entradas_mes_ent_especiais+$entradas_mes_outros;


$query_ebd = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=1 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_ebd = mysqli_query($conecta,$query_ebd) or die(mysqli_error($conecta));
$rowebd = mysqli_fetch_array($result_ebd);
$entradas_mes_ebd=$rowebd['sum(valor)'];

$query_feminino = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=8 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_feminino = mysqli_query($conecta,$query_feminino) or die(mysqli_error($conecta));
$rowfeminino = mysqli_fetch_array($result_feminino);
$entradas_mes_departamento_feminino=$rowfeminino['sum(valor)'];

$query_masculino = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=9 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_masculino = mysqli_query($conecta,$query_masculino) or die(mysqli_error($conecta));
$rowmasculino = mysqli_fetch_array($result_masculino);
$entradas_mes_departamento_masculino=$rowmasculino['sum(valor)'];

$query_adolescentes = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=10 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_adolescentes = mysqli_query($conecta,$query_adolescentes) or die(mysqli_error($conecta));
$rowadolescentes = mysqli_fetch_array($result_adolescentes);
$entradas_mes_departamento_adolescentes=$rowadolescentes['sum(valor)'];

$query_jovens = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=11 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_jovens = mysqli_query($conecta,$query_jovens) or die(mysqli_error($conecta));
$rowjovens = mysqli_fetch_array($result_jovens);
$entradas_mes_departamento_jovens=$rowjovens['sum(valor)'];

$query_departamento_infantil = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=12 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_departamento_infantil = mysqli_query($conecta,$query_departamento_infantil) or die(mysqli_error($conecta));
$rowdepartamento_infantil = mysqli_fetch_array($result_departamento_infantil);
$entradas_mes_departamento_infantil=$rowdepartamento_infantil['sum(valor)'];

$query_departamento_missoes = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=13 and `tipo`='entrada' and data LIKE '".$mes_referencia."-%'"; 
$result_departamento_missoes = mysqli_query($conecta,$query_departamento_missoes) or die(mysqli_error($conecta));
$rowdepartamento_missoes = mysqli_fetch_array($result_departamento_missoes);
$entradas_mes_departamento_missoes=$rowdepartamento_missoes['sum(valor)'];

$entradas_mes_departamentos=$entradas_mes_ebd+$entradas_mes_departamento_feminino+$entradas_mes_departamento_masculino+$entradas_mes_departamento_adolescentes+$entradas_mes_departamento_jovens+$entradas_mes_departamento_infantil+$entradas_mes_departamento_missoes;


/**Saidas **/

$query_dizimos_pagos = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=1 and `tipo`='saida' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
$result_dizimos_pagos = mysqli_query($conecta,$query_dizimos_pagos) or die(mysqli_error($conecta));
$rowdizimos_pagos = mysqli_fetch_array($result_dizimos_pagos);
$saidas_mes_dizimos_pagos=$rowdizimos_pagos['sum(valor)'];

$query_ofertas_pagos = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=2 and `tipo`='saida' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
$result_ofertas_pagos = mysqli_query($conecta,$query_ofertas_pagos) or die(mysqli_error($conecta));
$rowofertas_pagos = mysqli_fetch_array($result_ofertas_pagos);
$saidas_mes_ofertas_pagos=$rowofertas_pagos['sum(valor)'];

$query_missoes_pagos = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=3 and `tipo`='saida' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
$result_missoes_pagos = mysqli_query($conecta,$query_missoes_pagos) or die(mysqli_error($conecta));
$rowmissoes_pagos = mysqli_fetch_array($result_missoes_pagos);
$saidas_mes_missoes_pagos=$rowmissoes_pagos['sum(valor)'];

$query_construcao_pagos = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=4 and `tipo`='saida' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
$result_construcao_pagos = mysqli_query($conecta,$query_construcao_pagos) or die(mysqli_error($conecta));
$rowconstrucao_pagos = mysqli_fetch_array($result_construcao_pagos);
$saidas_mes_construcao_pagos=$rowconstrucao_pagos['sum(valor)'];

$query_ent_especiais_pagos = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=5 and `tipo`='saida' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
$result_ent_especiais_pagos = mysqli_query($conecta,$query_ent_especiais_pagos) or die(mysqli_error($conecta));
$rowent_especiais_pagos = mysqli_fetch_array($result_ent_especiais_pagos);
$saidas_mes_ent_especiais_pagos=$rowent_especiais_pagos['sum(valor)'];

$query_outros_pagos = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=6 and `tipo`='saida' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
$result_outros_pagos = mysqli_query($conecta,$query_outros_pagos) or die(mysqli_error($conecta));
$rowoutros_pagos = mysqli_fetch_array($result_outros_pagos);
$saidas_mes_outros_pagos=$rowoutros_pagos['sum(valor)'];

$saida_mes_pagos=$saidas_mes_dizimos_pagos+$saidas_mes_ofertas_pagos+$saidas_mes_missoes_pagos+$saidas_mes_construcao_pagos+$saidas_mes_ent_especiais_pagos+$saidas_mes_outros_pagos;


$query_ebd_pagos = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=1 and `tipo`='saida' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
$result_ebd_pagos = mysqli_query($conecta,$query_ebd_pagos) or die(mysqli_error($conecta));
$rowebd_pagos = mysqli_fetch_array($result_ebd_pagos);
$saidas_mes_ebd_pagos=$rowebd_pagos['sum(valor)'];

$query_feminino_pagos = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=8 and `tipo`='saida' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
$result_feminino_pagos = mysqli_query($conecta,$query_feminino_pagos) or die(mysqli_error($conecta));
$rowfeminino_pagos = mysqli_fetch_array($result_feminino);
$saidas_mes_departamento_feminino_pagos=$rowfeminino_pagos['sum(valor)'];

$query_masculino_pagos = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=9 and `tipo`='saida' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
$result_masculino_pagos = mysqli_query($conecta,$query_masculino_pagos) or die(mysqli_error($conecta));
$rowmasculino_pagos = mysqli_fetch_array($result_masculino_pagos);
$saidas_mes_departamento_masculino_pagos=$rowmasculino_pagos['sum(valor)'];

$query_adolescentes_pagos = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=10 and `tipo`='saida' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
$result_adolescentes_pagos = mysqli_query($conecta,$query_adolescentes_pagos) or die(mysqli_error($conecta));
$rowadolescentes_pagos = mysqli_fetch_array($result_adolescentes_pagos);
$saidas_mes_departamento_adolescentes_pagos=$rowadolescentes_pagos['sum(valor)'];

$query_jovens_pagos = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=11 and `tipo`='saida' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
$result_jovens_pagos = mysqli_query($conecta,$query_jovens_pagos) or die(mysqli_error($conecta));
$rowjovens_pagos = mysqli_fetch_array($result_jovens_pagos);
$saidas_mes_departamento_jovens_pagos=$rowjovens_pagos['sum(valor)'];

$query_departamento_infantil_pagos = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=12 and `tipo`='saida' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
$result_departamento_infantil_pagos = mysqli_query($conecta,$query_departamento_infantil_pagos) or die(mysqli_error($conecta));
$rowdepartamento_infantil_pagos = mysqli_fetch_array($result_departamento_infantil_pagos);
$saidas_mes_departamento_infantil_pagos=$rowdepartamento_infantil_pagos['sum(valor)'];

$query_departamento_missoes_pagos = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=13 and `tipo`='saida' and status='pago' and data LIKE '".$mes_referencia."-%'"; 
$result_departamento_missoes_pagos = mysqli_query($conecta,$query_departamento_missoes_pagos) or die(mysqli_error($conecta));
$rowdepartamento_missoes_pagos = mysqli_fetch_array($result_departamento_missoes_pagos);
$saidas_mes_departamento_missoes_pagos=$rowdepartamento_missoes_pagos['sum(valor)'];

$saidas_mes_departamentos_pagos=$saidas_mes_ebd_pagos+$saidas_mes_departamento_feminino_pagos+$saidas_mes_departamento_masculino_pagos+$saidas_mes_departamento_adolescentes_pagos+$saidas_mes_departamento_jovens_pagos+$saidas_mes_departamento_infantil_pagos+$saidas_mes_departamento_missoes_pagos;

/**A Pagar **/

$query_dizimos_apagar = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=1 and `tipo`='saida' and status='a pagar' and data LIKE '".$mes_referencia."-%'"; 
$result_dizimos_apagar = mysqli_query($conecta,$query_dizimos_apagar) or die(mysqli_error($conecta));
$rowdizimos_apagar = mysqli_fetch_array($result_dizimos_apagar);
$saidas_mes_dizimos_apagar=$rowdizimos_apagar['sum(valor)'];

$query_ofertas_apagar = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=2 and `tipo`='saida' and status='a pagar' and data LIKE '".$mes_referencia."-%'"; 
$result_ofertas_apagar = mysqli_query($conecta,$query_ofertas_apagar) or die(mysqli_error($conecta));
$rowofertas_apagar = mysqli_fetch_array($result_ofertas_apagar);
$saidas_mes_ofertas_apagar=$rowofertas_apagar['sum(valor)'];

$query_missoes_apagar = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=3 and `tipo`='saida' and status='a pagar' and data LIKE '".$mes_referencia."-%'"; 
$result_missoes_apagar = mysqli_query($conecta,$query_missoes_apagar) or die(mysqli_error($conecta));
$rowmissoes_apagar = mysqli_fetch_array($result_missoes_apagar);
$saidas_mes_missoes_apagar=$rowmissoes_apagar['sum(valor)'];

$query_construcao_apagar = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=4 and `tipo`='saida' and status='a pagar' and data LIKE '".$mes_referencia."-%'"; 
$result_construcao_apagar = mysqli_query($conecta,$query_construcao_apagar) or die(mysqli_error($conecta));
$rowconstrucao_apagar = mysqli_fetch_array($result_construcao_apagar);
$saidas_mes_construcao_apagar=$rowconstrucao_apagar['sum(valor)'];

$query_ent_especiais_apagar = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=5 and `tipo`='saida' and status='a pagar' and data LIKE '".$mes_referencia."-%'"; 
$result_ent_especiais_apagar = mysqli_query($conecta,$query_ent_especiais_apagar) or die(mysqli_error($conecta));
$rowent_especiais_apagar = mysqli_fetch_array($result_ent_especiais_apagar);
$saidas_mes_ent_especiais_apagar=$rowent_especiais_apagar['sum(valor)'];

$query_outros_apagar = "SELECT sum(valor) FROM caixa_igreja WHERE `igreja_id`=".$igreja_id." and `caixa_base_id`=6 and `tipo`='saida' and status='a pagar' and data LIKE '".$mes_referencia."-%'"; 
$result_outros_apagar = mysqli_query($conecta,$query_outros_apagar) or die(mysqli_error($conecta));
$rowoutros_apagar = mysqli_fetch_array($result_outros_apagar);
$saidas_mes_outros_apagar=$rowoutros_apagar['sum(valor)'];

$saida_mes_apagar=$saidas_mes_dizimos_apagar+$saidas_mes_ofertas_apagar+$saidas_mes_missoes_apagar+$saidas_mes_construcao_apagar+$saidas_mes_ent_especiais_apagar+$saidas_mes_outros_apagar;


$query_ebd_apagar = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=1 and `tipo`='saida' and status='a pagar' and data LIKE '".$mes_referencia."-%'"; 
$result_ebd_apagar = mysqli_query($conecta,$query_ebd_apagar) or die(mysqli_error($conecta));
$rowebd_apagar = mysqli_fetch_array($result_ebd_apagar);
$saidas_mes_ebd_apagar=$rowebd_apagar['sum(valor)'];

$query_feminino_apagar = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=8 and `tipo`='saida' and status='a pagar' and data LIKE '".$mes_referencia."-%'"; 
$result_feminino_apagar = mysqli_query($conecta,$query_feminino_apagar) or die(mysqli_error($conecta));
$rowfeminino_apagar = mysqli_fetch_array($result_feminino);
$saidas_mes_departamento_feminino_apagar=$rowfeminino_apagar['sum(valor)'];

$query_masculino_apagar = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=9 and `tipo`='saida' and status='a pagar' and data LIKE '".$mes_referencia."-%'"; 
$result_masculino_apagar = mysqli_query($conecta,$query_masculino_apagar) or die(mysqli_error($conecta));
$rowmasculino_apagar = mysqli_fetch_array($result_masculino_apagar);
$saidas_mes_departamento_masculino_apagar=$rowmasculino_apagar['sum(valor)'];

$query_adolescentes_apagar = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=10 and `tipo`='saida' and status='a pagar' and data LIKE '".$mes_referencia."-%'"; 
$result_adolescentes_apagar = mysqli_query($conecta,$query_adolescentes_apagar) or die(mysqli_error($conecta));
$rowadolescentes_apagar = mysqli_fetch_array($result_adolescentes_apagar);
$saidas_mes_departamento_adolescentes_apagar=$rowadolescentes_apagar['sum(valor)'];

$query_jovens_apagar = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=11 and `tipo`='saida' and status='a pagar' and data LIKE '".$mes_referencia."-%'"; 
$result_jovens_apagar = mysqli_query($conecta,$query_jovens_apagar) or die(mysqli_error($conecta));
$rowjovens_apagar = mysqli_fetch_array($result_jovens_apagar);
$saidas_mes_departamento_jovens_apagar=$rowjovens_apagar['sum(valor)'];

$query_departamento_infantil_apagar = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=12 and `tipo`='saida' and status='a pagar' and data LIKE '".$mes_referencia."-%'"; 
$result_departamento_infantil_apagar = mysqli_query($conecta,$query_departamento_infantil_apagar) or die(mysqli_error($conecta));
$rowdepartamento_infantil_apagar = mysqli_fetch_array($result_departamento_infantil_apagar);
$saidas_mes_departamento_infantil_apagar=$rowdepartamento_infantil_apagar['sum(valor)'];

$query_departamento_missoes_apagar = "SELECT sum(valor) FROM caixa_departamento WHERE `igreja_id`=".$igreja_id." and `departamento_id`=13 and `tipo`='saida' and status='a pagar' and data LIKE '".$mes_referencia."-%'"; 
$result_departamento_missoes_apagar = mysqli_query($conecta,$query_departamento_missoes_apagar) or die(mysqli_error($conecta));
$rowdepartamento_missoes_apagar = mysqli_fetch_array($result_departamento_missoes_apagar);
$saidas_mes_departamento_missoes_apagar=$rowdepartamento_missoes_apagar['sum(valor)'];

$saidas_mes_departamentos_apagar=$saidas_mes_ebd_apagar+$saidas_mes_departamento_feminino_apagar+$saidas_mes_departamento_masculino_apagar+$saidas_mes_departamento_adolescentes_apagar+$saidas_mes_departamento_jovens_apagar+$saidas_mes_departamento_infantil_apagar+$saidas_mes_departamento_missoes_apagar;


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

<li><a href="index.php?view=relfinanceiro">Relat&oacute;rio Financeiro</a><span class="divider">&nbsp;</span></li>
<li><span class="tools">
                           
                         <a href="index.php?view=finanresumo&mes=<?php echo $mes-1; ?>&ano=<?php echo $ano;?>"> <button class="btn btn-small btn" type="button"><i class="icon-circle-arrow-left"></i></button></a>
                                <button class="btn btn-small btn" type="button"><?php echo mesextenco($mes).' de '.$ano; ?></button>
                               <a href="index.php?view=finanresumo&mes=<?php echo $mes+1; ?>&ano=<?php echo $ano;?>"> <button class="btn btn-small btn" type="button"><i class="icon-circle-arrow-right"></i></button></a>
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
                           <h4><i class="icon-reorder"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Relt&oacute;rio enviado para o Escrit&oacute;rio Regional</font></font></h4>
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
                                    <th><center>Refer&ecirc;cia</center></th>
                                    <th><center>Valor enviado para Regi&atilde;o</center></th>
                                    <th><center>Status do Relatório</center></th>
                                    <th><center>Enviado via Sistema?</center></th>
                                    <th><center>Menu</center></th>
                                </tr>

                                </thead>

                                <tbody>

                                <?php

	

	$igrejasbusca = mysqli_query($conecta,"SELECT * FROM caixa_regiao where regiao_id=".$regiao_id." and igreja_id=".$igreja_id." and data like '".$mes_referencia."-%'");

		while($resultadoigrejas = mysqli_fetch_array($igrejasbusca)){

		 ?>

								<tr>
                                    <td><center><?php echo substr($resultadoigrejas['data'],5,2)."/".substr($resultadoigrejas['data'],0,4);?></center></td>

									<td><center><?php $valor_enviado_regiao=$resultadoigrejas['10_igreja']+$resultadoigrejas['seguro']+$resultadoigrejas['evangelismo']+$resultadoigrejas['distrito']+$resultadoigrejas['diz_pastor']+$resultadoigrejas['missoes']+$resultadoigrejas['ebd']+$resultadoigrejas['mulher']+$resultadoigrejas['homens']+$resultadoigrejas['jovens']+$resultadoigrejas['adolescentes']+$resultadoigrejas['criancas']+$resultadoigrejas['fundoministerial']+$resultadoigrejas['outros'];echo"R$ ".transf_real($valor_enviado_regiao);?></center></td>
                               
                                    <td><center><?php echo strtoupper($resultadoigrejas['status']);?></center></td>
                                      <td><center><?php if($resultadoigrejas['via_sistema']==1){echo "Sim"; } else if($resultadoigrejas['via_sistema']==0){echo "NÃO";}?></center></td>
                                    <td><center><?php if($resultadoigrejas['via_sistema']==1){?> <a href="relatorios/relenvigreja.php?ig=<?php echo $resultadoigrejas['id'];?>&m=<?php echo $resultadoigrejas['mes'];?>&a=<?php echo $resultadoigrejas['ano'];?>" class="various" data-fancybox-type="iframe"><button class="btn btn-primary"><i class="icon-eye-open"> Visualizar Relat&oacute;rio</i></button></a><?php } ?></center></td>
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





















