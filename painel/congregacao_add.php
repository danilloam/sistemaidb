<?php include ("header.php"); ?><div id="container" class="row-fluid">	<?php include ("menu.php"); ?><?php$id=$_GET["id"];$queryestado = mysqli_query($conecta,"SELECT * FROM estado where regiao_id=$regiao_id");?><div id="main-content">			<!-- BEGIN PAGE CONTAINER-->			<div class="container-fluid">				<div class="row-fluid">					<div class="span12">						<div class="span6">						<!-- BEGIN PAGE TITLE & BREADCRUMB-->						<h3 class="page-title">							Sistema de Gest&atilde;o							<small> Igreja de Deus no Brasil</small>						</h3>						<ul class="breadcrumb">							<li>                                <a href="index.php?view=home"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>							</li>                            <li>                                <a href="index.php?view=igrejas">Igrejas</a> <span class="divider">&nbsp;</span>                            </li>							<li><a href="igreja_add.php">Adicionar Congrega&ccedil;&atilde;o </a><span class="divider-last">&nbsp;</span></li>						</ul>							</div>						<div class="span6">						</div>						<!-- END PAGE TITLE & BREADCRUMB-->					</div>				</div>				<!-- BEGIN PAGE HEADER-->				<div class="row-fluid">					<div class="span12">					<div class="widget">								<div class="widget-title">									<h4><i class="icon-reorder"></i> Informa&ccedil;&otilde;es da Congregaç&ccedil;&atilde;o</h4>								</div>								<div class="widget-body">								<form action="congregacao_add.php?id=<?php echo $id;?>"	method="post" >									<div class="control-group">                                    <label class="control-label">Descri&ccedil;&atilde;o*</label>                                    <div class="controls">                                        <input type="text" name="nome" value="" class="input-xxlarge">                                    </div>                                </div>                                                               <div class="control-group">                                    <label class="control-label">Endere&ccedil;o</label>                                    <div class="controls">                                        <input type="text" name="endereco" value="" class="input-xxlarge">                                    </div>                                </div>								<div class="control-group">                                    <label class="control-label">N&uacute;mero</label>                                    <div class="controls">                                        <input type="text" name="numero" value="" class="input-xxlarge">                                    </div>                                </div>						                                   <div class="control-group">                                    <label class="control-label">Bairro</label>                                    <div class="controls">                                        <input type="text" name="bairro" value="" class="input-xxlarge">                                    </div>                                </div>									<div class="control-group">                                    <label class="control-label">Cidade</label>                                    <div class="controls">                                        <input type="text" name="cidade" value="" class="input-xxlarge">                                    </div>                                </div><div class="control-group">                                    <label class="control-label">Estado*</label>                                    <div class="controls">                                        <select class="input-xxlarge" id="estado" name="estado"><?php while($estadodados = mysqli_fetch_array($queryestado)) { ?> <option value="<?php echo $estadodados['id']; ?>" <?php if($estadodados['id']==$estado_id){echo "selected";}?>><?php echo $estadodados['descricao'] ?></option> <?php } ?>  </select>                                    </div>                                </div>									<div class="control-group">                                    <label class="control-label">Cep</label>                                    <div class="controls">                                        <input type="text" name="cep" value="" class="input-xxlarge" onKeyPress="maskcep(this);" maxlength="10">                                    </div>                                </div>												<div class="control-group">                                    <label class="control-label">Telefone*</label>                                    <div class="controls">                                        <input type="text" name="telefone" value="" class="input-xxlarge" onKeyPress="masktelefone(this);" onBlur="formatatelefone(this);carregatelefone(this);" maxlength="16">                                    </div>                                </div>                                                                <div class="control-group">                                    <label class="control-label">Nome do L&iacute;der*</label>                                    <div class="controls">                                        <select class="input-xxlarge" id="lider_id" name="lider_id"><?php $querypessoaslideres = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=$igreja_id");while($lideresdados = mysqli_fetch_array($querypessoaslideres)) { ?> <option value="<?php echo $lideresdados['id'] ?>"><?php echo utf8_encode($lideresdados['nome']." ".$lideresdados['sobrenome']) ?>  </option> <?php } ?>  </select>                                    </div>                                </div>                                                               <div class="form-actions">                                    <input type="submit" value="Cadastrar" name="ok" class="btn blue">  <input type="submit" value="Voltar" name="voltar" class="btn blue">                                </div>									</form>								<?php 																			if(isset($_POST['ok'])){								$teste=utf8_decode(anti_injection($_POST["nome"]));								$endereco=utf8_decode(anti_injection($_POST["endereco"]));								$numero=anti_injection($_POST["numero"]);								$bairro=utf8_decode(anti_injection($_POST["bairro"]));								$cidade=utf8_decode(anti_injection($_POST["cidade"]));								$estado=utf8_decode(anti_injection($_POST["estado"]));								$cep=anti_injection($_POST["cep"]);								$telefone=anti_injection($_POST["telefone"]);							$lider_id=anti_injection($_POST["lider_id"]);															 if(empty($teste)){									echo "<p>O Campo Nome &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";								}else 								{																			$inserir = mysqli_query($conecta,"insert into igreja (id,nome,ativa,telefone,cep,logradouro,numero,bairro,cidade,estado_id,igreja_id,responsavel_id,regiao_id,pastor_id,secretaria_id,plano)values(null,'$teste',1,'$telefone','$cep','$endereco','$numero','$bairro','$cidade',$estado,$igreja_id,$lider_id,$regiao_id,0,0,2)") or die(mysqli_error($conecta)) ;																		 echo"<script language=javascript>alert('Congregação Cadastrada com Sucesso!')</script>";echo"<script language=javascript>location.href='index.php?view=congregacoes'</script>";} }if(isset($_POST['voltar'])){echo"<script language=javascript>location.href='index.php?view=congregacoes'</script>";}								 																																											 ?>								</div>							</div>						</div>				</div>			</div></div>	</div><?php include ("footer.php"); ?>			