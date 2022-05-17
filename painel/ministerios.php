<php
include("configuracao.php");
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
							Back Office
							<small> Paciente </small>
						</h3>
						<ul class="breadcrumb">
							<li>
                                <a href="index.php?view=home"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
							</li>
                           
							<li><a href="index.php?view=igrejas">Igrejas</a><span class="divider-last">&nbsp;</span></li>
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

		<div style="float: right; margin-bottom: 10px;">
							
<a href="membro_add.php" class="btn btn-info"><i class="icon-plus-sign"> Adicionar Igreja</i></a>
</div>


<table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                  
                                    <th><center>Descri&ccedil;&atilde;o</center></th>
<th><center>Estado</center></th>
									<th><center>Telefone</center></th>
									
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
	
	$igrejasbusca = mysql_query("SELECT * FROM igreja where regiao_id=$regiao_id ORDER BY estado_id ASC");
		while($resultadoigrejas = mysql_fetch_array($igrejasbusca)){
	
	$selectestado = mysql_query("SELECT * FROM estado WHERE id=".$resultadoigrejas['estado_id']);
$dadosestado = mysql_fetch_array($selectestado);

		 ?>
								<tr>
        
                                    <td><center><?php echo $resultadoigrejas['nome'];	?></center></td>
									<td><center><?php 


echo $dadosestado['descricao'];	?></center></td>
									<td><center><?php echo $resultadoigrejas['telefone'];	?></center></td>
									
									
                                    
<td><center><a href="editar_igreja.php?id=<?php echo $resultadoigrejas['id'];?>" class="various" >
                                            	<button class="btn btn-primary"><i class="icon-wrench"> Editar</id></button></a></center></td>

                                </tr>
<?php
		
		}
		
		?>
                                </tbody>
                            </table>		

  


                    </div>
                   
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>	