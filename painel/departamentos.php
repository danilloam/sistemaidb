<phpinclude("configuracao.php");include("conexao/conecta.php");$gcstotal = mysqli_query($conecta,"SELECT * FROM departamentos where igreja_id=$igreja_id");$total_gcs=mysqli_num_rows($gcstotal);?><div id="main-content">			<!-- BEGIN PAGE CONTAINER-->			<div class="container-fluid">				<!-- BEGIN PAGE HEADER-->								<div class="row-fluid">					<div class="span12">						<div class="span6">						<!-- BEGIN PAGE TITLE & BREADCRUMB-->						<h3 class="page-title">							Sistema de Gest&atilde;o							<small> Igreja de Deus no Brasil </small>						</h3>						<ul class="breadcrumb">							<li>                                <a href="index.php?view=home"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>							</li>                           							<li><a href="index.php?view=departamentos">Departamentos</a><span class="divider-last">&nbsp;</span></li>						</ul>							</div>						<div class="span6">						</div>						<!-- END PAGE TITLE & BREADCRUMB-->					</div>				</div>				<!-- END PAGE HEADER-->				<!-- BEGIN PAGE CONTENT-->				<div id="page" class="dashboard">		                     <?php if($perfil=="Pastor Local" || $perfil=="Secretaria Local"){    ?>  		<div style="float: right; margin-bottom: 10px;">					<a href="departamento_add.php" class="btn btn-info"><i class="icon-plus-sign"> Adicionar Departamento</i></a></div><table class="table table-bordered table-hover">                                <thead>                                <tr>                                                                      <th><center>Descri&ccedil;&atilde;o</center></th><th class="span3"><center>L&iacute;der</center></th>									<th class="span2 hidden-phone"><center>Faixa Et&eacute;ria</center></th>									<th class="span1 hidden-phone">Sexo</th>								<th class="span1 hidden-phone"><center>Usu&aacute;rio</center></th>									                                    <th></th>                                </tr>                                </thead>                                <tbody>                                <?php		$gcsbusca = mysqli_query($conecta,"SELECT * FROM lider where igreja_id=$igreja_id ORDER BY descricao ASC");		while($resultadogcs = mysqli_fetch_array($gcsbusca)){		$selectlider = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$resultadogcs['pessoa_id']." and igreja_id=".$resultadogcs['igreja_id']);$dadoslider = mysqli_fetch_array($selectlider);$selectusuario = mysqli_query($conecta,"SELECT * FROM usuario WHERE id=".$resultadogcs['usuario_id']);$dados_usuario = mysqli_fetch_array($selectusuario);		 ?>								<tr>                                            <td ><center><?php echo utf8_encode($resultadogcs['descricao']);	?></center></td>									<td class="span3 hidden-phone"><center><?php echo utf8_encode($dadoslider['nome']." ".$dadoslider['sobrenome']);	?></center></td>									<td class="span2 hidden-phone"><center><?php echo $resultadogcs['min_idade']." - ".$resultadogcs['max_idade'];	?></center></td>																		<td class="span1 hidden-phone"><center><?php echo $resultadogcs['sexo'];	?></center></td>									<td><center><?php echo $dados_usuario['login'];	?></center></td>																                                    <td><center><a href="editar_departamento.php?id=<?php echo $resultadogcs['id'];?>" class="various" >                                            	<button class="btn btn-primary"><i class="icon-wrench"> Editar</id></button></a></center></td>                                </tr><?php				}				?>                                </tbody>                            </table>		                      </div>                                        <?php }else{  ?>    			<div class="row-fluid">		<div class="span12">		<div class="alert alert-block alert-error fade in">				<p><strong>Voc&ecirc; n&atilde; acesso para alterar informa&ccedil;&otilde;es</strong></p>		</div>		</div>			</div>		                     <?php } ?> 				</div>				<!-- END PAGE CONTENT-->			</div>			<!-- END PAGE CONTAINER-->		</div>	