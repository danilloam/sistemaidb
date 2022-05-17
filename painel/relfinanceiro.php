 <?php

include("configuracao.php");
require("conexao/conecta.php");



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





<?php

include("configuracao.php");

@$mes=date("m");

@$ano=date("Y");





if($mes == "1"){

$mes_ref="12";

$mes_nome="Dezembro";

$ano_ref=date("Y")-1;

}else{

@$mes_ref=date(m)-1;

@$ano_ref=date("Y");

switch($mes_ref) { 



    case 1:

        $mes_nome="Janeiro";

        break;

    case 2:

        $mes_nome="Fevereiro";

        break;

    case 3:

        $mes_nome="Mar&ccedil;o";

        break;

    case 4:

        $mes_nome="Abril";

        break;

    case 5:

        $mes_nome="Maio";

        break;

    case 6:

        $mes_nome="Junho";

        break;

    case 7:

        $mes_nome="Julho";

        break;

    case 8:

        $mes_nome="Agosto";

        break;

    case 9:

        $mes_nome="Setembro";

        break;

    case 10:

        $mes_nome="Outubro";

        break;

    case 11:

        $mes_nome="Novembro";

        break;

            case 12:

        $mes_nome="Dezembro";

        break;

}



}



if($perfil=="Pastor Local" || $perfil=="Secretaria Local"){



$selectrelatorio = mysqli_query($conecta,"SELECT * FROM relatorio_financeiro WHERE mes=$mes_ref-1 and ano=$ano_ref and igreja_id=$igreja_id");

$dadosrelatorio = mysqli_fetch_array($selectrelatorio);

$num_results = mysqli_num_rows($selectrelatorio); 

if ($num_results >0){ 

$saldo_dizimo=(((($dadosrelatorio['saldo_dizimo']+$dadosrelatorio['entrada_dizimo'])-$dadosrelatorio['saida_despesa_dizimo'])-$dadosrelatorio['saida_regiao_dizimo'])-$dadosrelatorio['prebenda']);

$saldo_of_culto=((($dadosrelatorio['saldo_of_culto']+$dadosrelatorio['entrada_of_culto'])-$dadosrelatorio['saida_despesa_of_culto'])-$dadosrelatorio['saida_regiao_of_culto']);

$saldo_of_missoes=((($dadosrelatorio['saldo_of_missoes']+$dadosrelatorio['entrada_of_missoes'])-$dadosrelatorio['saida_despesa_of_missoes'])-$dadosrelatorio['saida_regiao_of_missoes']);

$saldo_of_construcao=((($dadosrelatorio['saldo_of_construcao']+$dadosrelatorio['entrada_of_construcao'])-$dadosrelatorio['saida_despesa_of_construcao'])-$dadosrelatorio['saida_regiao_of_construcao']);

$saldo_ent_especiais=((($dadosrelatorio['saldo_ent_especiais']+$dadosrelatorio['entrada_ent_especiais'])-$dadosrelatorio['saida_despesa_ent_especiais'])-$dadosrelatorio['saida_regiao_ent_especiais']);

$saldo_outros=((($dadosrelatorio['saldo_outros']+$dadosrelatorio['entrada_outros'])-$dadosrelatorio['saida_despesa_outros'])-$dadosrelatorio['saida_regiao_outros']);

								

$saldo_esc_dominical=((($dadosrelatorio['saldo_esc_dominical']+$dadosrelatorio['entrada_esc_dominical'])-$dadosrelatorio['saida_despesa_esc_dominical'])-$dadosrelatorio['saida_regiao_esc_dominical']);

$saldo_minist_feminino=((($dadosrelatorio['saldo_minist_feminino']+$dadosrelatorio['entrada_minist_feminino'])-$dadosrelatorio['saida_despesa_minist_feminino'])-$dadosrelatorio['saida_regiao_minist_feminino']);

$saldo_minist_masculino=((($dadosrelatorio['saldo_minist_masculino']+$dadosrelatorio['entrada_minist_masculino'])-$dadosrelatorio['saida_despesa_minist_masculino'])-$dadosrelatorio['saida_regiao_minist_masculino']);

$saldo_minist_juvenil=((($dadosrelatorio['saldo_minist_juvenil']+$dadosrelatorio['entrada_minist_juvenil'])-$dadosrelatorio['saida_despesa_minist_juvenil'])-$dadosrelatorio['saida_regiao_minist_juvenil']);

$saldo_dep_infantil=((($dadosrelatorio['saldo_dep_infantil']+$dadosrelatorio['entrada_dep_infantil'])-$dadosrelatorio['saida_despesa_dep_infantil'])-$dadosrelatorio['saida_regiao_dep_infantil']);

$saldo_dep_missoes=((($dadosrelatorio['saldo_dep_missoes']+$dadosrelatorio['entrada_dep_missoes'])-$dadosrelatorio['saida_despesa_dep_missoes'])-$dadosrelatorio['saida_regiao_dep_missoes']);

								



}else{
$num_results=0;
$saldo_dizimo=0;
$saldo_of_culto=0;
$saldo_of_missoes=0;
$saldo_of_construcao=0;
$saldo_ent_especiais=0;
$saldo_outros=0;					
$saldo_esc_dominical=0;
$saldo_minist_feminino=0;
$saldo_minist_masculino=0;
$saldo_minist_juvenil=0;
$saldo_dep_infantil=0;
$saldo_dep_missoes=0;

	
}

?>



<?php 

$selectrelatorio1 = mysqli_query($conecta,"SELECT * FROM relatorio_financeiro WHERE mes=$mes_ref and ano=$ano_ref and igreja_id=$igreja_id");

$num_results1 = mysqli_num_rows($selectrelatorio1);


$selectrelatorio123456 = mysqli_query($conecta,"SELECT * FROM relatorio_financeiro WHERE igreja_id=$igreja_id");

$num_results123456 = mysqli_num_rows($selectrelatorio123456);

if($num_results1<1 ){ 

?>

<form action="index.php?view=relfinanceiro"	method="post" id="relfinanceiro" name="relfinanceiro" >

<div class="control-group">

<label class="control-label">M&ecirc;s de Ref&ecirc;ncia</label>

                                    <div class="controls">

<input type="text" name="mes" value="<?php echo $mes_nome."/".$ano_ref;?>" disabled>

                                    </div>

<table class="table table-bordered table-hover table-responsive ">

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

                                        <input type="text" class="input-medium" id="money01" name="saldo_dizimos" value="<?php echo transf_real($saldo_dizimo);?>" <?php if($num_results123456>0 ){ echo "disabled";	}?> >

                                    </div>

                                </div>

								<div class="control-group">

                                    <label class="control-label"> Oferta dos Culto:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money02" name="saldo_of_culto" value="<?php echo transf_real($saldo_of_culto);?>" <?php if($num_results123456>0 ){ echo "disabled";	}?>>

                                    </div>

                                </div>

								<div class="control-group">

                                    <label class="control-label"> Oferta Miss&otilde;es:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money03" name="saldo_of_missoes" value="<?php echo transf_real($saldo_of_missoes);?>" <?php if($num_results123456>0 ){ echo "disabled";	}?>>

                                    </div>

                                </div>

																	<div class="control-group">

                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money04" name="saldo_of_construcao" value="<?php echo transf_real($saldo_of_construcao);?>" <?php if($num_results123456>0 ){ echo "disabled";	}?>>

                                    </div>

                                </div>

																<div class="control-group">

                                    <label class="control-label"> Entradas Especiais:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money05" name="saldo_ent_especiais" value="<?php echo transf_real($saldo_ent_especiais);?>" <?php if($num_results123456>0 ){ echo "disabled";	}?>>

                                    </div>

                                </div>

																								<div class="control-group">

                                    <label class="control-label"> Outros:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money06" name="saldo_outros" value="<?php echo transf_real($saldo_outros);?>" <?php if($num_results123456>0 ){ echo "disabled";	}?>>

                                    </div>

                                </div>

								</td>



<!-- Entradas -->

		<td>

                                    

									

									<div class="control-group">

                                    <label class="control-label"> D&iacute;zimos Diversos:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money07" name="entrada_dizimo"  >

                                    </div>

                                </div>

								<div class="control-group">

                                    <label class="control-label"> Oferta dos Culto:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money08" name="entrada_of_culto"  >

                                    </div>

                                </div>

								<div class="control-group">

                                    <label class="control-label"> Oferta Miss&otilde;es:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money09" name="entrada_of_missoes"   >

                                    </div>

                                </div>

																	<div class="control-group">

                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money10" name="entrada_of_construcao"  >

                                    </div>

                                </div>

																<div class="control-group">

                                    <label class="control-label"> Entradas Especiais:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money11" name="entrada_ent_especiais" value="" >

                                    </div>

                                </div>

																								<div class="control-group">

                                    <label class="control-label"> Outros:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money12" name="entrada_outros" value=""  >

                                    </div>

                                </div>

								</td>

<!-- saidas -->



<td>

                                    

									

									<div class="control-group">

                                    <label class="control-label"> D&iacute;zimos Diversos:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money13" name="saida_dizimo" value=""  >

                                    </div>

                                </div>

								<div class="control-group">

                                    <label class="control-label"> Oferta dos Culto:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money14" name="saida_of_culto" value="" >

                                    </div>

                                </div>

								<div class="control-group">

                                    <label class="control-label"> Oferta Miss&otilde;es:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money15" name="saida_of_missoes" value=""  >

                                    </div>

                                </div>

																	<div class="control-group">

                                    <label class="control-label"> Oferta para Constru&ccedil;&atilde;o:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money16" name="saida_of_construcao" value=""  >

                                    </div>

                                </div>

																<div class="control-group">

                                    <label class="control-label"> Entradas Especiais:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money17" name="saida_ent_especiais" value=""  >

                                    </div>

                                </div>

																								<div class="control-group">

                                    <label class="control-label"> Outros:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money18" name="saida_outros" value=""  >

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

                                        <input type="text" class="input-medium" id="money19" name="saldo_esc_dominical" value="<?php echo transf_real($saldo_esc_dominical);?>"  <?php if($num_results123456>0 ){ echo "disabled";	}?> >

                                    </div>

                                </div>

								  					<div class="control-group">

                                    <label class="control-label"> Minist&eacute;rio Feminino:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money20" name="saldo_minist_feminino" value="<?php echo transf_real($saldo_minist_feminino);?>"  <?php if($num_results123456>0 ){ echo "disabled";	}?>>

                                    </div>

                                </div>

													<div class="control-group">

                                    <label class="control-label"> Minist&eacute;rio Masculino:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money21" name="saldo_minist_masculino" value="<?php echo transf_real($saldo_minist_masculino);?>"  <?php if($num_results123456>0 ){ echo "disabled";	}?>>

                                    </div>

                                </div>

													<div class="control-group">

                                    <label class="control-label"> Minist&eacute;rio Juvenil:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money22" name="saldo_minist_juvenil" value="<?php echo transf_real($saldo_minist_juvenil);?>"  <?php if($num_results123456>0 ){ echo "disabled";	}?>>

                                    </div>

                                </div>

													<div class="control-group">

                                    <label class="control-label"> Departamento Infantil:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money23" name="saldo_dep_infantil" value="<?php echo transf_real($saldo_dep_infantil);?>"  <?php if($num_results123456>0 ){ echo "disabled";	}?>>

                                    </div>

                                </div>

													<div class="control-group">

                                    <label class="control-label"> Departamento de Miss&otilde;es:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money24" name="saldo_dep_missoes" value="<?php echo transf_real($saldo_dep_missoes);?>"  <?php if($num_results123456>0 ){ echo "disabled";	}?>>

                                    </div>

                                </div>

								  </td>

								  <td>

								  							<div class="control-group">

                                    <label class="control-label"> Escola Dominical:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money25" name="entrada_esc_dominical" value=""  >

                                    </div>

                                </div>

								  					<div class="control-group">

                                    <label class="control-label"> Minist&eacute;rio Feminino:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money26" name="entrada_minist_feminino" value=""  >

                                    </div>

                                </div>

													<div class="control-group">

                                    <label class="control-label"> Minist&eacute;rio Masculino:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money27" name="entrada_minist_masculino" value=""  >

                                    </div>

                                </div>

													<div class="control-group">

                                    <label class="control-label"> Minist&eacute;rio Juvenil:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money28" name="entrada_minist_juvenil" value=""  >

                                    </div>

                                </div>

													<div class="control-group">

                                    <label class="control-label"> Departamento Infantil:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money29" name="entrada_dep_infantil" value=""  >

                                    </div>

                                </div>

													<div class="control-group">

                                    <label class="control-label"> Departamento de Miss&otilde;es:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money30" name="entrada_dep_missoes" value=""  >

                                    </div>

                                </div>

								</td>

								<td>

								  						<div class="control-group">

                                    <label class="control-label"> Escola Dominical:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money31" name="saida_esc_dominical" value=""  >

                                    </div>

                                </div>

								  					<div class="control-group">

                                    <label class="control-label"> Minist&eacute;rio Feminino:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money32" name="saida_minist_feminino" value=""  >

                                    </div>

                                </div>

													<div class="control-group">

                                    <label class="control-label"> Minist&eacute;rio Masculino:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money33" name="saida_minist_masculino" value=""  >

                                    </div>

                                </div>

								<div class="control-group">

                                    <label class="control-label"> Minist&eacute;rio Juvenil:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money34" name="saida_minist_juvenil" value=""  >

                                    </div>

                                </div>

								<div class="control-group">

                                    <label class="control-label"> Departamento Infantil:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money35" name="saida_dep_infantil" value=""  >

                                    </div>

                                </div>

								<div class="control-group">

                                    <label class="control-label"> Departamento de Miss&otilde;es:</label>

                                    <div class="controls">

                                        <input type="text" class="input-medium" id="money36" name="saida_dep_missoes" value=""  >

                                    </div>

                                </div>

								</td>

								  </tbody>

								 

								 

								</table>

                                </div>

								<div class="form-actions">

								<center><input type="submit" value="Voltar" name="voltar" class="btn blue"/>

                                    <input type="submit" value="Salvar" name="ok" class="btn blue"  /></center>

                                </div>	

								

</form>

	<?php 

							if(isset($_POST['ok'])){

								$saldo_dizimo=transf_moeda(anti_injection($_POST["saldo_dizimos"]));

								$saldo_of_culto=transf_moeda(anti_injection($_POST["saldo_of_culto"]));

								$saldo_of_missoes=transf_moeda(anti_injection($_POST["saldo_of_missoes"]));

								$saldo_of_construcao=transf_moeda(anti_injection($_POST["saldo_of_construcao"]));

								$saldo_ent_especiais=transf_moeda(anti_injection($_POST["saldo_ent_especiais"]));

								$saldo_outros=transf_moeda(anti_injection($_POST["saldo_outros"]));



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



								$saida_regiao_dizimo=transforma_banco(valor_regiao($entrada_dizimo));

								$saida_regiao_of_culto=0.00;

								$saida_regiao_of_missoes=transforma_banco(valor_regiao_of_missoes($entrada_of_missoes));

								$saida_regiao_of_construcao=0.00;

								$saida_regiao_ent_especiais=0.00;

								$saida_regiao_outros=0.00;

								

								$saldo_esc_dominical=transf_moeda(anti_injection($_POST["saldo_esc_dominical"]));

								$saldo_minist_feminino=transf_moeda(anti_injection($_POST["saldo_minist_feminino"]));

								$saldo_minist_masculino=transf_moeda(anti_injection($_POST["saldo_minist_masculino"]));

								$saldo_minist_juvenil=transf_moeda(anti_injection($_POST["saldo_minist_juvenil"]));

								$saldo_dep_infantil=transf_moeda(anti_injection($_POST["saldo_dep_infantil"]));

								$saldo_dep_missoes=transf_moeda(anti_injection($_POST["saldo_dep_missoes"]));



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

								

								$saida_regiao_esc_dominical=transforma_banco(valor_dep_regiao($entrada_esc_dominical));

								$saida_regiao_minist_feminino=transforma_banco(valor_dep_regiao($entrada_minist_feminino));

								$saida_regiao_minist_masculino=transforma_banco(valor_dep_regiao($entrada_minist_masculino));

								$saida_regiao_minist_juvenil=transforma_banco(valor_dep_regiao($entrada_minist_juvenil));

								$saida_regiao_dep_infantil=transforma_banco(valor_dep_regiao($entrada_dep_infantil));

								$saida_regiao_dep_missoes=transforma_banco(valor_dep_regiao($entrada_dep_missoes));
								
							$saldo_dizimo_entradas=$entrada_dizimo;
								$saldo_dizimo_entradas=$saldo_dizimo_entradas-$saida_despesa_dizimo;
								$saldo_dizimo_entradas=$saldo_dizimo_entradas-$saida_regiao_dizimo;
								
								if($saldo_dizimo_entradas<prebenda($entrada_dizimo)){
								    $prebenda_pastoral=transforma_banco($saldo_dizimo_entradas);
								}
								else{
								   $prebenda_pastoral=transforma_banco(prebenda($entrada_dizimo));	 
								}
								
							if(empty($entrada_dizimo)){

									echo"<script language=javascript>alert('Informe a Receita dos d\u00edzimos!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($entrada_of_culto)){

									echo"<script language=javascript>alert('Informe a Receita das ofertas de Culto!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($entrada_of_missoes)){

									echo"<script language=javascript>alert('Informe informar a Receita das Ofertas de Miss\u00f5es!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($entrada_of_construcao)){

									echo"<script language=javascript>alert('Informe a Receita de Ofertas de Constru\u00e7\u00e3o!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($entrada_ent_especiais)){

 									echo"<script language=javascript>alert('Informe a Receita de Entradas Especiais!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($entrada_outros)){

									echo"<script language=javascript>alert('Informe a Receita de Outras Entradas!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($saida_despesa_dizimo)){

									echo"<script language=javascript>alert('Informe a Despesa dos d\u00edimos!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($saida_despesa_of_culto)){

									echo"<script language=javascript>alert('Informe a Despesa das ofertas de Culto!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($saida_despesa_of_missoes)){

									echo"<script language=javascript>alert('Informe a Despesa das Ofertas de Miss\u00f5es!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($saida_despesa_of_construcao)){

									echo"<script language=javascript>alert('Informe a Despesa de Ofertas de Constru\u00e7\u00e3o!')</script>";

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

									echo"<script language=javascript>alert('Informe a Receita do Minist\u00e9rio Feminino!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($entrada_minist_masculino)){

									echo"<script language=javascript>alert('Informe a Receita do Minist\u00e9rio Masculino!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($entrada_minist_juvenil)){

 									echo"<script language=javascript>alert('Informe a Receita do Minist\u00e9rio Juvenil!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($entrada_dep_infantil)){

									echo"<script language=javascript>alert('Informe a Receita do Departamento Infantil!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($entrada_dep_missoes)){

									echo"<script language=javascript>alert('Informe a Receita do Departamento de Miss\u00f5es!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($saida_despesa_esc_dominical)){

									echo"<script language=javascript>alert('Informe a Despesa da Escola Dominical!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($saida_despesa_minist_feminino)){

									echo"<script language=javascript>alert('Informe a Despesa do Minist\u00e9rio Feminino!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($saida_despesa_minist_masculino)){

									echo"<script language=javascript>alert('Informe a Despesa do Minist\u00e9rio Masculino!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($saida_despesa_minist_juvenil)){

 									echo"<script language=javascript>alert('Informe a Despesa do Minist\u00e9rio Juvenil!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($saida_despesa_dep_infantil)){

									echo"<script language=javascript>alert('Informe a Despesa do Departamento Infantil!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if(empty($saida_despesa_dep_missoes)){

									echo"<script language=javascript>alert('Informe a Despesa do Departamento de Miss\u00f5es!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if($saida_despesa_dizimo > valor_maximo($saldo_dizimo,$entrada_dizimo,$saida_regiao_dizimo)){

									echo"<script language=javascript>alert('A Despesa de D\u00edzimo n\u00e3o pode ser maior que R$ ".transf_real(valor_maximo($saldo_dizimo,$entrada_dizimo,$saida_regiao_dizimo))."!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if($saida_despesa_of_culto > valor_maximo($saldo_of_culto,$entrada_of_culto,$saida_regiao_of_culto)){

									echo"<script language=javascript>alert('A Despesa de Oferta de Culto n\u00e3o pode ser maior que R$ ".transf_real(valor_maximo($saldo_of_culto,$entrada_of_culto,$saida_regiao_of_culto))."!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if($saida_despesa_of_missoes > valor_maximo($saldo_of_missoes,$entrada_of_missoes,$saida_regiao_of_missoes)){

									echo"<script language=javascript>alert('A Despesa de Oferta de Miss\u00f5es n\u00e3o pode ser maior que R$ ".transf_real(valor_maximo($saldo_of_missoes,$entrada_of_missoes,$saida_regiao_of_missoes))."!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if($saida_despesa_of_construcao > valor_maximo($saldo_of_construcao,$entrada_of_construcao,$saida_regiao_of_construcao)){

									echo"<script language=javascript>alert('A Despesa de Oferta de Constru\u00e7\u00e3o n\u00e3o pode ser maior que R$ ".transf_real(valor_maximo($saldo_of_construcao,$entrada_of_construcao,$saida_regiao_of_construcao))."!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if($saida_despesa_ent_especiais > valor_maximo($saldo_ent_especiais,$entrada_ent_especiais,$saida_regiao_ent_especiais)){

									echo"<script language=javascript>alert('A Despesa de Entradas Especiais n\u00e3o pode ser maior que R$ ".transf_real(valor_maximo($saldo_ent_especiais,$entrada_ent_especiais,$saida_regiao_ent_especiais))."!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if($saida_despesa_outros > valor_maximo($saldo_outros,$entrada_outros,$saida_regiao_outros)){

									echo"<script language=javascript>alert('A Despesa de Outras entradas n\u00e3o pode ser maior que R$ ".transf_real(valor_maximo($saldo_outros,$entrada_outros,$saida_regiao_outros))."!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";
								}else if($saida_despesa_esc_dominical > valor_maximo($saldo_esc_dominical,$entrada_esc_dominical,$saida_regiao_esc_dominical)){

									echo"<script language=javascript>alert('A Despesa da Escola Dominical n\u00e3o pode ser maior que R$ ".transf_real(valor_maximo($saldo_esc_dominical,$entrada_esc_dominical,$saida_regiao_esc_dominical))."!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if($saida_despesa_minist_feminino > valor_maximo($saldo_minist_feminino,$entrada_minist_feminino,$saida_regiao_minist_feminino)){

									echo"<script language=javascript>alert('A Despesa do Minist\u00e9rio Feminino n\u00e3o pode ser maior que R$ ".transf_real(valor_maximo($saldo_minist_feminino,$entrada_minist_feminino,$saida_regiao_minist_feminino))."!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if($saida_despesa_minist_masculino > valor_maximo($saldo_minist_masculino,$entrada_minist_masculino,$saida_regiao_minist_masculino)){

									echo"<script language=javascript>alert('A Despesa do Minist\u00e9rio Masculino n\u00e3o pode ser maior que R$ ".transf_real(valor_maximo($saldo_minist_masculino,$entrada_minist_masculino,$saida_regiao_minist_masculino))."!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if($saida_despesa_minist_juvenil > valor_maximo($saldo_minist_juvenil,$entrada_minist_juvenil,$saida_regiao_minist_juvenil)){

									echo"<script language=javascript>alert('A Despesa do Minist\u00e9rio Juvenil n\u00e3o pode ser maior que R$ ".transf_real(valor_maximo($saldo_minist_juvenil,$entrada_minist_juvenil,$saida_regiao_minist_juvenil))."!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if($saida_despesa_dep_infantil > valor_maximo($saldo_dep_infantil,$entrada_dep_infantil,$saida_regiao_dep_infantil)){

									echo"<script language=javascript>alert('A Despesa do Departamento Infantil n\u00e3o pode ser maior que R$ ".transf_real(valor_maximo($saldo_dep_infantil,$entrada_dep_infantil,$saida_regiao_dep_infantil))."!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else if($saida_despesa_dep_missoes > valor_maximo($saldo_dep_missoes,$entrada_dep_missoes,$saida_regiao_dep_missoes)){

									echo"<script language=javascript>alert('A Despesa do Departamento de Miss\u00f5es n\u00e3o pode ser maior que R$ ".transf_real(valor_maximo($saldo_dep_missoes,$entrada_dep_missoes,$saida_regiao_dep_missoes))."!')</script>";

									echo"<script language=javascript>location.href='javascript:history.back()'</script>";

								}else{

								$inserir = mysqli_query($conecta,"insert into relatorio_financeiro (mes,ano,saldo_dizimo,saldo_of_culto,saldo_of_missoes,saldo_of_construcao,saldo_ent_especiais,saldo_outros,entrada_dizimo,entrada_of_culto,entrada_of_missoes,entrada_of_construcao,entrada_ent_especiais,entrada_outros,saida_regiao_dizimo,saida_regiao_of_culto,saida_regiao_of_missoes,saida_regiao_of_construcao,saida_regiao_ent_especiais,saida_regiao_outros,saida_despesa_dizimo,saida_despesa_of_culto,saida_despesa_of_missoes,saida_despesa_of_construcao,saida_despesa_ent_especiais,saida_despesa_outros,saldo_esc_dominical, saldo_minist_feminino, saldo_minist_masculino, saldo_minist_juvenil, saldo_dep_infantil, saldo_dep_missoes, entrada_esc_dominical,  entrada_minist_feminino, entrada_minist_masculino, entrada_minist_juvenil, entrada_dep_infantil, entrada_dep_missoes, saida_regiao_esc_dominical, saida_regiao_minist_feminino, saida_regiao_minist_masculino, saida_regiao_minist_juvenil, saida_regiao_dep_infantil, saida_regiao_dep_missoes, saida_despesa_esc_dominical, saida_despesa_minist_feminino, saida_despesa_minist_masculino, saida_despesa_minist_juvenil, saida_despesa_dep_infantil, saida_despesa_dep_missoes, prebenda,status,igreja_id,regiao_id,via_sistema)values('{$mes_ref}','{$ano_ref}','{$saldo_dizimo}','{$saldo_of_culto}','{$saldo_of_missoes}','{$saldo_of_construcao}','{$saldo_ent_especiais}','{$saldo_outros}','{$entrada_dizimo}','{$entrada_of_culto}','{$entrada_of_missoes}','{$entrada_of_construcao}','{$entrada_ent_especiais}','{$entrada_outros}','{$saida_regiao_dizimo}','{$saida_regiao_of_culto}','{$saida_regiao_of_missoes}','{$saida_regiao_of_construcao}','{$saida_regiao_ent_especiais}','{$saida_regiao_outros}','{$saida_despesa_dizimo}','{$saida_despesa_of_culto}','{$saida_despesa_of_missoes}','{$saida_despesa_of_construcao}','{$saida_despesa_ent_especiais}','{$saida_despesa_outros}','{$saldo_esc_dominical}','{$saldo_minist_feminino}','{$saldo_minist_masculino}','{$saldo_minist_juvenil}','{$saldo_dep_infantil}','{$saldo_dep_missoes}','{$entrada_esc_dominical}','{$entrada_minist_feminino}','{$entrada_minist_masculino}','{$entrada_minist_juvenil}','{$entrada_dep_infantil}','{$entrada_dep_missoes}','{$saida_regiao_esc_dominical}','{$saida_regiao_minist_feminino}','{$saida_regiao_minist_masculino}','{$saida_regiao_minist_juvenil}','{$saida_regiao_dep_infantil}','{$saida_regiao_dep_missoes}','{$saida_despesa_esc_dominical}','{$saida_despesa_minist_feminino}','{$saida_despesa_minist_masculino}','{$saida_despesa_minist_juvenil}','{$saida_despesa_dep_infantil}','{$saida_despesa_dep_missoes}','{$prebenda_pastoral}','SALVO',{$igreja_id},{$regiao_id},1)")or die(mysqli_error($conecta)) ;

							

									echo"<script language=javascript>alert('Relat\u00f3rio Salvo com Sucesso')</script>";

									echo"<script language=javascript>location.href='index.php?view=relfinanceiro'</script>";

								}

								

							}else if(isset($_POST['voltar'])){echo"<script language=javascript>location.href='index.php?view=relfinanceiro'</script>";}

	

}else if($num_results1 >0 || $num_results2 >0){

	?>



<?php 

$selectrelatorio12345678 = mysqli_query($conecta,"SELECT * FROM relatorio_financeiro WHERE mes=$mes_ref and ano=$ano_ref and igreja_id=$igreja_id");

$num_results12345678 = mysqli_num_rows($selectrelatorio12345678);

$dadosrelatorio12345678= mysqli_fetch_array($selectrelatorio12345678);



?>

<table class="table table-bordered table-hover">

									<tr><th>

									<center><div class="control-group">

									<label class="control-label">M&ecirc;s de Ref&ecirc;ncia</label>

                                    <div class="controls">

									<input type="text" name="mes" style="text-align:center" value="<?php echo $mes_nome."/".$ano_ref;?>" disabled>

                                    </div></div></center>

									</th>

									<th>

									<center><div class="control-group">

									<label class="control-label">Prebenda Pastoral</label>

                                    <div class="controls">

<input type="text" name="prebenda" style="text-align:center" value="<?php echo"R$ ".transf_real($dadosrelatorio12345678['prebenda']);?>" disabled>

                                    </div>

									</div></center>

</th>

</tr>

</table>

<table class="table table-bordered table-hover">





</br>

<thead>

                                <tr>

								<th><center>#</center></th>

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

								<td><center>D&iacute;zimos Diversos:</center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_dizimo']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['entrada_dizimo']);?></center></td>

								<td><center><?php echo "R$ ".transf_real(($dadosrelatorio12345678['saldo_dizimo']+$dadosrelatorio12345678['entrada_dizimo']));?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_dizimo']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_despesa_dizimo']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_dizimo']+$dadosrelatorio12345678['saida_despesa_dizimo']+$dadosrelatorio12345678['prebenda']);?></center></td>

								

								</tr>

								<tr>

								<td><center>Oferta dos Culto:</center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_of_culto']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['entrada_of_culto']);?></center></td>

								<td><center><?php echo "R$ ".transf_real(($dadosrelatorio12345678['saldo_of_culto']+$dadosrelatorio12345678['entrada_of_culto']));?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_of_culto']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_despesa_of_culto']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_of_culto']+$dadosrelatorio12345678['saida_despesa_of_culto']);?></center></td>

								

								</tr>

								<tr>

								<td><center>Oferta Miss&otilde;es:</center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_of_missoes']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['entrada_of_missoes']);?></center></td>

								<td><center><?php echo "R$ ".transf_real(($dadosrelatorio12345678['saldo_of_missoes']+$dadosrelatorio12345678['entrada_of_missoes']));?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_of_missoes']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_despesa_of_missoes']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_of_missoes']+$dadosrelatorio12345678['saida_despesa_of_missoes']);?></center></td>

								

								</tr>

								<tr>

								<td><center>Oferta para Constru&ccedil;&atilde;o:</center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_of_construcao']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['entrada_of_construcao']);?></center></td>

								<td><center><?php echo "R$ ".transf_real(($dadosrelatorio12345678['saldo_of_construcao']+$dadosrelatorio12345678['entrada_of_construcao']));?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_of_construcao']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_despesa_of_construcao']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_of_construcao']+$dadosrelatorio12345678['saida_despesa_of_construcao']);?></center></td>

								</tr>
								<tr>

								<td><center>Entradas Especiais:</center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_ent_especiais']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['entrada_ent_especiais']);?></center></td>

								<td><center><?php echo "R$ ".transf_real(($dadosrelatorio12345678['saldo_ent_especiais']+$dadosrelatorio12345678['entrada_ent_especiais']));?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_ent_especiais']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_despesa_ent_especiais']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_ent_especiais']+$dadosrelatorio12345678['saida_despesa_ent_especiais']);?></center></td>

								</tr>

								<tr>

								<td><center>Outros:</center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_outros']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['entrada_outros']);?></center></td>

								<td><center><?php echo "R$ ".transf_real(($dadosrelatorio12345678['saldo_outros']+$dadosrelatorio12345678['entrada_outros']));?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_outros']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_despesa_outros']);?></center></td>

								<td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_outros']+$dadosrelatorio12345678['saida_despesa_outros']);?></center></td>

								</tr>

								 </tbody>

								 </table>

								<table class="table table-bordered table-hover">

								</br>

<center><h3>Departamentos</h3></center>								
=
							<thead>

                                <tr>

								<th><center>#</center></th>

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

								  <td><center>Escola Dominical:</center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_esc_dominical']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['entrada_esc_dominical']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_esc_dominical']+$dadosrelatorio12345678['entrada_esc_dominical']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_esc_dominical']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_despesa_esc_dominical']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_esc_dominical']+$dadosrelatorio12345678['saida_despesa_esc_dominical']);?></center></td>

								  </tr>

								  <tr>

								  <td><center>Minist&eacute;rio Feminino:</center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_minist_feminino']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['entrada_minist_feminino']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_minist_feminino']+$dadosrelatorio12345678['entrada_minist_feminino']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_minist_feminino']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_despesa_minist_feminino']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_minist_feminino']+$dadosrelatorio12345678['saida_despesa_minist_feminino']);?></center></td>

								  </tr>

								  <tr>

								  <td><center>Minist&eacute;rio Masculino:</center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_minist_masculino']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['entrada_minist_masculino']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_minist_masculino']+$dadosrelatorio12345678['entrada_minist_masculino']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_minist_masculino']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_despesa_minist_masculino']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_minist_masculino']+$dadosrelatorio12345678['saida_despesa_minist_masculino']);?></center></td>

								  </tr>

								  <tr>

								  <td><center>Minist&eacute;rio Juvenil:</center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_minist_juvenil']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['entrada_minist_juvenil']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_minist_juvenil']+$dadosrelatorio12345678['entrada_minist_juvenil']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_minist_juvenil']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_despesa_minist_juvenil']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_minist_juvenil']+$dadosrelatorio12345678['saida_despesa_minist_juvenil']);?></center></td>

								  </tr>

								  <tr>

								  <td><center>Departamento Infantil:</center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_dep_infantil']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['entrada_dep_infantil']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_dep_infantil']+$dadosrelatorio12345678['entrada_dep_infantil']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_dep_infantil']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_despesa_dep_infantil']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_dep_infantil']+$dadosrelatorio12345678['saida_despesa_dep_infantil']);?></center></td>

								  </tr>

								  <tr>

								  <td><center>Departamento de Miss&otilde;es:</center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_dep_missoes']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['entrada_dep_missoes']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saldo_dep_missoes']+$dadosrelatorio12345678['entrada_dep_missoes']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_dep_missoes']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_despesa_dep_missoes']);?></center></td>

								  <td><center><?php echo "R$ ".transf_real($dadosrelatorio12345678['saida_regiao_dep_missoes']+$dadosrelatorio12345678['saida_despesa_dep_missoes']);?></center></td>

								  </tr>
								  </tbody>
								</table>
	
                    </br> </br>        	
	                                <center>

								<?php 
							
												if($dadosrelatorio12345678['status']=="SALVO"){?>

												<a href="editar_relfinanceiro.php?id=<?php echo $dadosrelatorio12345678['id']."&c=".$igreja_id;?>" class="various">

                                            	<button class="btn btn-primary"><i class="icon-wrench"> Editar</i></button>

												</a>

												<?php } ?>

												<?php if($dadosrelatorio12345678['status']=="SALVO" && $perfil=="Pastor Local"){?>

												<a href="enviar_relatorio.php?id=<?php echo $dadosrelatorio12345678['id']."&c=".$igreja_id;?>" class="various">

                                            	<button class="btn btn-primary"><i class="icon-arrow-up"> Enviar</i></button>

												</a>

												<?php } ?>

												<?php if($dadosrelatorio12345678['status']=="ENVIADO"){?>

												<a href="index.php?view=comprovante&id=<?php echo $dadosrelatorio12345678['id']."&c=".$igreja_id;?>" class="various" >

                                            	<button class="btn btn-primary"><i class="icon-file"> Enviar Comprovante</i></button>

												</a>
                             

<?php } if($dadosrelatorio12345678['status']=="VERIFICANDO"){ echo $dadosrelatorio12345678['status']; } ?>
		</center>
</br>
<?php }
} ?>		
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
$("#money11").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money12").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money13").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money14").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money15").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money16").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money17").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money18").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money19").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money20").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money21").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money22").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money23").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money24").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money25").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money26").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money27").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money28").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money29").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money30").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money31").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money32").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money33").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money34").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money35").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});
$("#money36").maskMoney({prefix:'R$ ', allowNegative: false, allowZero: true, thousands:'.', decimal:',', affixesStay: false});</script>
