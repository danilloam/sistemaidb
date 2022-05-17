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

$query_seguro = "SELECT sum(valor) FROM seguro_extra WHERE `regiao_id`=".$regiao_id." and data LIKE '".$mes_referencia."-%'"; 
$result_seguro = mysqli_query($conecta,$query_seguro) or die(mysqli_error($conecta));
$rowseguro = mysqli_fetch_array($result_seguro);
$entradas_mes_seguro=$rowseguro['sum(valor)'];


$ultimoDia = date("t", mktime(0,0,0, date('m'),'01', date('Y')));


function verificar_Lancamento($pastor,$regiao,$mes){
    include("conexao/conecta.php");
$sqlconsulta="SELECT * FROM seguro_extra WHERE `regiao_id`=".$regiao." and `regiao_id`=".$regiao." and `pastor_id`=".$pastor." and data LIKE '".$mes."-%'";    
    
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

							<small> Igreja de Deus no Brasil </small>

						</h3>

						<ul class="breadcrumb">

							<li>

                                <a href="index.php?view=home"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>

							</li>

<li><a href="#">Financeiro</a><span class="divider">&nbsp;</span></li>

<li><a href="index.php?view=finanreceitas">Seguro Extra</a><span class="divider">&nbsp;</span></li>
<li><span class="tools">
                           
                         <a href="index.php?view=seguroregiao&mes=<?php echo $mes-1; ?>&ano=<?php echo $ano;?>"> <button class="btn btn-small btn" type="button"><i class="icon-circle-arrow-left"></i></button></a>
                                <button class="btn btn-small btn" type="button"><?php echo mesextenco($mes).' de '.$ano; ?></button>
                               <a href="index.php?view=seguroregiao&mes=<?php echo $mes+1; ?>&ano=<?php echo $ano;?>"> <button class="btn btn-small btn" type="button"><i class="icon-circle-arrow-right"></i></button></a>
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
				
		
            

 <div class="space15"></div>

<div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN SAMPLE TABLE widget-->
                  <div class="widget">
                     <div class="widget-title">
                        <h4><i class="icon-cogs"></i>Discrimina&ccedil;&atilde;o de Entradas</h4>
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
                                 <th><i class="icon-calendar"></i> Data</th>
                                 <th class="hidden-phone"><i class="icon-align-justify"></i> Entregue por:</th>
                                 <th><i class="icon-money"></i> Valor</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
						   <?php
						   $query_entradas = mysqli_query($conecta,"SELECT * FROM seguro_extra WHERE `regiao_id`=".$regiao_id." and data LIKE '".$mes_referencia."-%' ORDER BY data");
while($result_entradas = mysqli_fetch_assoc($query_entradas)){
		    
		    $pastorbusca = mysqli_query($conecta,"SELECT * FROM pastor where id=".$result_entradas["pastor_id"]);
$resultadopastor = mysqli_fetch_array($pastorbusca);
	$pessoa_pastor_id=utf8_encode($resultadopastor["membro_id"]);
	
			    $pessoabusca = mysqli_query($conecta,"SELECT * FROM pessoa where regiao_id=".$regiao_id." and id=".$pessoa_pastor_id);
$resultadopessoapastor = mysqli_fetch_array($pessoabusca);
	$pessoa_nome_pastor=utf8_encode($resultadopessoapastor["nome"]." ".$resultadopessoapastor["sobrenome"]);
?>
                              <tr>
                                 <td class="highlight">
                                    <div class="success"></div>
                                    <a href="#"><?php echo $result_entradas["data"];?></a>
                                 </td>
                                 <td class="hidden-phone"> <?php echo $pessoa_nome_pastor;?></td>
                                 <td><?php echo"R$ ".transf_real($result_entradas["valor"]);?></td>
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
                                            <h3 id="myModalLabel1">Adicionar Receita</h3>
                                        </div>
										<form enctype="multipart/form-data" action="index.php?view=seguroregiao&mes=<?php echo $mes;?>&ano=<?php echo $ano;?>"	method="post" >
                                        <div class="modal-body">
                                           <div class="control-group">
                                    <label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Informe o tipo da entrada:</font></font></label>
                                    <div class="controls">
                                        <select class="input-large m-wrap" id="tipo" name="tipo" tabindex="1" required="required"	>
										<?php 
$sql_mov_financeira=mysqli_query($conecta,"select * from pastor where regiao_id=".$regiao_id)or die(mysqli_error($conecta));
                                while($ver_categorias_mov_financeira=mysqli_fetch_array($sql_mov_financeira)){
 $selectpastorseguro = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$ver_categorias_mov_financeira["membro_id"])or die(mysqli_error($conecta));

$dadospastorseguro = mysqli_fetch_array($selectpastorseguro);

if(verificar_Lancamento($ver_categorias_mov_financeira["id"],$regiao_id,$mes_referencia)== false){
                                 ?>
                                            <option value="<?php echo $ver_categorias_mov_financeira["id"]; ?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo utf8_encode($dadospastorseguro["nome"]." ".$dadospastorseguro["sobrenome"]); ?></font></font></option>
                                           
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
                                    <span class="add-on"><font style="vertical-align: inherit;">Valor da Entrada: </font></span>  <input type="text" class="input-medium" id="money01" name="valor" value="" >
                                 </div>
                              </div>
                           </div>
						   <div class="controls">
                                        <input id="datalancamento" name="datalancamento" type="date" value="" min="<?php echo $ano."-".$mes."-01";?>" max="<?php echo $ano."-".$mes."-".$ultimoDia;?>" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
                                    </div>
						    <input type="submit" value="Cadastrar" name="ok" class="btn blue">
						   </form>
						   <?php 

							if(isset($_POST['ok'])){


								$seguro_pastor_id=utf8_decode(anti_injection($_POST["tipo"]));

								$valor=utf8_decode(anti_injection($_POST["valor"]));

								$data_lancamento=anti_injection($_POST["datalancamento"]);
								
								
	$inserir = mysqli_query($conecta,"INSERT INTO `seguro_extra`( `regiao_id`, `pastor_id`, `data`, `valor`) VALUES (".$regiao_id.",".$seguro_pastor_id.",'".$data_lancamento."','".$valor."')") or die (mysqli_error($conecta));

						echo"<script language=javascript>alert('Receita cadastrada com Sucesso!')</script>";
echo"<script language=javascript>location.href='index.php?view=seguroregiao&mes=".$mes."&ano=".$ano."'</script>";
								 


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
</script>










