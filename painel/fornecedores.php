<phpinclude("configuracao.php");include("conexao/conecta.php");$fornecedorestotal = mysqli_query($conecta,"SELECT * FROM fornecedor where estado_id=$estado_id");$total_fornecedores=mysqli_num_rows($fornecedorestotal);?><div id="main-content">			<!-- BEGIN PAGE CONTAINER-->			<div class="container-fluid">				<!-- BEGIN PAGE HEADER-->								<div class="row-fluid">					<div class="span12">						<div class="span6">						<!-- BEGIN PAGE TITLE & BREADCRUMB-->						<h3 class="page-title">							Sistema de Gest&atilde;o							<small> Igreja de Deus no Brasil </small>						</h3>						<ul class="breadcrumb">							<li>                                <a href="index.php?view=home"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>							</li>                           							<li><a href="index.php?view=fornecedores">Fornecedores</a><span class="divider-last">&nbsp;</span></li>						</ul>							</div>						<div class="span6">						</div>						<!-- END PAGE TITLE & BREADCRUMB-->					</div>				</div>				<!-- END PAGE HEADER-->				<!-- BEGIN PAGE CONTENT-->				<div id="page" class="dashboard">		<div style="float: right; margin-bottom: 10px;">							<a href="fornecedor_add.php" class="btn btn-info"><i class="icon-plus-sign"> Adicionar Fornecedor</i></a></div><table class="table table-striped table-bordered" id="sample_1">                                <thead>                                <tr>                                                                      <th class=" span6 hidden-phone"><center>Descri&ccedil;&atilde;o</center></th><th class="hidden-phone"><center>Estado</center></th>									                                    <th class="hidden-phone"></th>                                </tr>                                </thead>                                <tbody>                                <?php		$igrejasbusca = mysqli_query($conecta,"SELECT * FROM fornecedor where regiao_id=$regiao_id and estado_id=$estado_id ORDER BY nome ASC");		while($resultadoigrejas = mysqli_fetch_array($igrejasbusca)){		$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE id=$estado_id");$dadosestado = mysqli_fetch_array($selectestado);		 ?>								<tr>                                            <td><center><?php echo utf8_encode($resultadoigrejas['nome']);	?></center></td>									<td><center><?php echo utf8_encode($dadosestado['descricao']);	?></center></td>																										                                    <td><center><?php if($resultadoigrejas['editavel']==1){?><a href="editar_fornecedor.php?id=<?php echo $resultadoigrejas['id'];?>" class="various" >                                            	<button class="btn btn-primary"><i class="icon-wrench"> Editar</id></button></a><?php } ?></center></td>                                </tr><?php				}				?>                                </tbody>                            </table>		                      </div>                   				</div>				<!-- END PAGE CONTENT-->			</div>			<!-- END PAGE CONTAINER-->		</div>						<script>$('#sample_1').DataTable( {    language: {        {    "sEmptyTable": "Nenhum registro encontrado",    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",    "sInfoFiltered": "(Filtrados de _MAX_ registros)",    "sInfoPostFix": "",    "sInfoThousands": ".",    "sLengthMenu": "Mostrando _MENU_ resultados por página",    "sLoadingRecords": "Carregando...",    "sProcessing": "Processando...",    "sZeroRecords": "Nenhum registro encontrado",    "sSearch": "Pesquisar",    "oPaginate": {        "sNext": "Próximo",        "sPrevious": "Anterior",        "sFirst": "Primeiro",        "sLast": "Último"    },    "oAria": {        "sSortAscending": ": Ordenar colunas de forma ascendente",        "sSortDescending": ": Ordenar colunas de forma descendente"    }}    }} );</script>