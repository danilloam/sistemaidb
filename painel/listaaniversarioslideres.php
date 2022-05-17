<?php
include ("conexao/conecta.php");
include("configuracao.php");
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

		<div class="alert alert-block <?php 
			
			if($ativa<1){
			echo "alert-warning";
			}else{
			echo "alert-success";
			}
			
			?> fade in">	

			<p><strong>Voc&ecirc; tem acesso para <?php 
			
			if($ativa<1){
			echo "somente visualizar ";
			}else{
			echo "alterar ";
			}
			
			?>informa&ccedil;&otilde;es <?php echo "$local";?></strong></p>

		</div>

		</div>	

		</div>

		<?php } 

		
		?>

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

                           

							<li><a href="index.php?view=pessoas">Pessoas</a><span class="divider">&nbsp;</span></li>
								<li><a href="index.php?view=paniver">Aniversariantes do M&ecirc;s</a><span class="divider-last">&nbsp;</span></li>

						</ul>	

						</div>

					

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

		    <div id="page" class="dashboard">



 <div class="row-fluid">
                <div class="span12">
								
					<div class="space15"></div>
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
	
                        <div class="widget-title">
						
                            <h4><i class="icon-reorder"></i>Aniversariantes do M&ecirc;s de <?php echo $mes_nome; ?></h4>
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
				<th>Nome Completo</th>
				<th class="" width="10%">Tipo</th>
				<th class="" width="10%">Nascimento</th>
				<th class="" width="5%">Idade Atual</th>
				<th class="">Telefones</th>
			</tr> 	
		</thead>
<tbody>

<?php	
$membros1busca = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=$igreja_id and status='ativo' and dataNascimento LIKE '%/".$mes."/%' ORDER BY dataNascimento asc");
$total_aniversariantes=0;
while($resultadomembros1 = mysqli_fetch_array($membros1busca)){
    
$idade= (int)date("Y")-(int)substr($resultadomembros1['dataNascimento'],-4);
		  
$sqllider=mysqli_query($conecta,"select * from lider where id=$lider_id and igreja_id=$igreja_id");
$verlider=mysqli_fetch_array($sqllider);
$min_idade=$verlider["min_idade"];
$max_idade=$verlider["max_idade"];
            
if(($min_idade==0) && ($max_idade==0)){
if(($verlider["sexo"]=="Masculino")&&($resultadomembros1['sexo']=="Masculino")){
?>
<tr>
<td><center><?php echo strtoupper(utf8_encode( $resultadomembros1['nome']." ".$resultadomembros1['sobrenome']));?></center></td>
<td><center><?php echo utf8_encode(strtoupper($resultadomembros1['funcao']));?></center></td>
<td><center><?php echo $resultadomembros1['dataNascimento'];?></center></td>
<td><center><?php echo date("Y")-substr($resultadomembros1['dataNascimento'],-4);?></center></td>
<td><?php if($resultadomembros1["celular1"]<>""){echo  $resultadomembros1["celular1"];}if($resultadomembros1["celular2"]<>""){echo  " / ".$resultadomembros1["celular2"];}if($resultadomembros1["telefone"]<>""){echo  " / ".$resultadomembros1["telefone"];}?></td>
</tr>

<?php
$total_aniversariantes=$total_aniversariantes+1;
    
} else if(($verlider["sexo"]=="Feminino")&&($resultadomembros1['sexo']=="Feminino")){
?>
<tr>
<tr>
<td><center><?php echo strtoupper(utf8_encode( $resultadomembros1['nome']." ".$resultadomembros1['sobrenome']));?></center></td>
<td><center><?php echo utf8_encode(strtoupper($resultadomembros1['funcao']));?></center></td>
<td><center><?php echo $resultadomembros1['dataNascimento'];?></center></td>
<td><center><?php echo date("Y")-substr($resultadomembros1['dataNascimento'],-4);?></center></td>
<td><?php if($resultadomembros1["celular1"]<>""){echo  $resultadomembros1["celular1"];}if($resultadomembros1["celular2"]<>""){echo  " / ".$resultadomembros1["celular2"];}if($resultadomembros1["telefone"]<>""){echo  " / ".$resultadomembros1["telefone"];}?></td>
</tr>

<?php
$total_aniversariantes=$total_aniversariantes+1;
} else if(($verlider["sexo"]=="Ambos") && ($verlider['novoconvertido']==1) && ($resultadomembros1['funcao']=="Novo Convertido")){
?>
<tr>
<td><center><?php echo strtoupper(utf8_encode( $resultadomembros1['nome']." ".$resultadomembros1['sobrenome']));?></center></td>
<td><center><?php echo utf8_encode(strtoupper($resultadomembros1['funcao']));?></center></td>
<td><center><?php echo $resultadomembros1['dataNascimento'];?></center></td>
<td><center><?php echo date("Y")-substr($resultadomembros1['dataNascimento'],-4);?></center></td>
<td><?php if($resultadomembros1["celular1"]<>""){echo  $resultadomembros1["celular1"];}if($resultadomembros1["celular2"]<>""){echo  " / ".$resultadomembros1["celular2"];}if($resultadomembros1["telefone"]<>""){echo  " / ".$resultadomembros1["telefone"];}?></td>
</tr>

<?php
$total_aniversariantes=$total_aniversariantes+1;
}
}else if(($verlider["sexo"]=="Ambos")&& ($idade>=$min_idade) && ($idade<=$max_idade)){
?>
<tr>
<td><center><?php echo strtoupper(utf8_encode( $resultadomembros1['nome']." ".$resultadomembros1['sobrenome']));?></center></td>
<td><center><?php echo utf8_encode(strtoupper($resultadomembros1['funcao']));?></center></td>
<td><center><?php echo $resultadomembros1['dataNascimento'];?></center></td>
<td><center><?php echo date("Y")-substr($resultadomembros1['dataNascimento'],-4);?></center></td>
<td><?php if($resultadomembros1["celular1"]<>""){echo  $resultadomembros1["celular1"];}if($resultadomembros1["celular2"]<>""){echo  " / ".$resultadomembros1["celular2"];}if($resultadomembros1["telefone"]<>""){echo  " / ".$resultadomembros1["telefone"];}?></td>
</tr>



<?php
$total_aniversariantes=$total_aniversariantes+1;
}
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


