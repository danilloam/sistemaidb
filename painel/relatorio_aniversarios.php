<php
session_start();
include("configuracao.php");
include ("header.php");  


				$hostname_conecta = "50.62.137.49";

				$database_conecta = "sistemaidb";

				$username_conecta = "sistemaidb";

				$password_conecta = "@K3f7b9h1T7a3k9w2y";	



$conecta = mysqli_connect($hostname_conecta, $username_conecta, $password_conecta) or trigger_error(mysqli_error(),E_USER_ERROR);



$db = mysqli_select_db($conecta,$database_conecta);





?>

<div id="main-content">

			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->


		<?php 
		
		$mes=date("m");
switch($mes) { 

case "01":
$mes_nome="Janeiro";
break;
case "02":
$mes_nome="Fevereiro";
break;
case "03":
$mes_nome="Março";
break;
case "04":
$mes_nome="Abril";
break;
case "05":
$mes_nome="Maio";
break;
case "06":
$mes_nome="Junho";
break;
case "07":
$mes_nome="Julho";
break;
case "08":
$mes_nome="Agosto";
break;
case "09":
$mes_nome="Setembro";
break;
case "10":
$mes_nome="Outubro";
break;
case "11":
$mes_nome="Novembro";
break;
case "12":
$mes_nome="Dezembro";
break;
default: 
$mes_nome="Não Identificado";
break; 
		
}
		
		?>



				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div id="page" class="dashboard">



 <div class="row-fluid">
                <div class="span12">
								
									<div class="space15"></div>
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
	
                        <div class="widget-title">
						
                            <center><h4><i class="icon-reorder"></i>Aniversariantes do M&ecirc;s de <?php echo $mes_nome; ?></h4></center>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
<table class="explain">
		<tbody>
			<tr>
				<td class="span9">IMPRESSO POR: <?php echo utf8_encode(strtoupper($nome)) ?></td>
				
				<td class="span4">DATA DA IMPRESS&Atilde;O: <?php echo date("d/m/Y");?></td>
				<td></td>
			</tr>
			<tr>
				<td class="heading"></td>
				<td></td>
				
			</tr>
		</tbody>
	</table>
	
	<table class="table" border="1">
		<thead>
			<tr >
				<th>Nome</th>
				<th>Sobrenome</th>
				<th class="" width="10%">Tipo</th>
				<th class="" width="10%">Nascimento</th>
				<th class="" width="5%">Idade Atual</th>
				<th class="">Telefones</th>
			</tr> 	
		</thead>
		<tbody>
		    <?php	

	$membros1busca = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=$igreja_id and status='ativo' and dataNascimento LIKE '%/".$mes."/%' ORDER BY dataNascimento asc");
$total_aniversariantes=mysqli_num_rows($membros1busca);
	while($resultadomembros1 = mysqli_fetch_array($membros1busca)){

?>
	
						<tr>
       
<td><center><?php echo utf8_encode(strtoupper( $resultadomembros1['nome']));	?></center></td>
<td><center><?php echo utf8_encode(strtoupper( $resultadomembros1['sobrenome']));	?></center></td>
<td><center><?php echo utf8_encode(strtoupper($resultadomembros1['funcao']));?></center></td>
<td><center><?php echo $resultadomembros1['dataNascimento'];?></center></td>
<td><center><?php echo date("Y")-substr($resultadomembros1['dataNascimento'],-4);?></center></td>
<td><?php 
													if($resultadomembros1["celular1"]<>""){
													 echo  $resultadomembros1["celular1"];
													}
													if($resultadomembros1["celular2"]<>""){
													 echo  " / ".$resultadomembros1["celular2"];
													}
																										if($resultadomembros1["telefone"]<>""){
													 echo  " / ".$resultadomembros1["telefone"];
													}
													?></td>


                                </tr>
					
													<?php	

	}
?>
									</tbody>
		<tfoot>
			<tr >
				<td colspan="8"  style="color: black; background: #eaeaea" ><center>Total de Aniversariantes no per&iacute;odo: <?php echo $total_aniversariantes; ?> </center></td> 
			</tr>
		</tfoot>
	</table>
			

				<br />
			<center>
				<!--<button onclick="window.open('?pdf=1')">Gerar PDF</button>-->
								<button onclick="self.print();">Imprimir Relatorio *</button></center>	
		</div>
		<p class="no-print" style="width: 100%; margin: 0 auto 20px; text-align: center; font-size: 12px;">* Para salvar o relat&oacute;rio em PDF clique em <b>Imprimir Relat&oacute;rio</b>, depois em <b>Destino</b> clique em <b>Alterar</b> e escolha a op&ccedil;&atilde;o <b>Salvar como PDF</b>. Para finalizar clique <b>Salvar</b>.</p>


                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

				</div>

				<!-- END PAGE CONTENT-->

			</div>

			<!-- END PAGE CONTAINER-->

		</div>