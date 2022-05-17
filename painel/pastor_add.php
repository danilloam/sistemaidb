<?php include ("header.php"); ?>
<div id="container" class="row-fluid">
	<?php include ("menu.php"); ?>
<div id="main-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="span6">
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Sistema de Gest&atilde;o
							<small> Igreja de Deus no Brasil</small>
						</h3>
						<ul class="breadcrumb">
							<li>
                                <a href="index.php?view=home"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
							</li>
                            <li>
                                <a href="index.php?view=membros">Pastores</a> <span class="divider">&nbsp;</span>
                            </li>
							<li><a href="membro_add.php">Adicionar Pastor </a><span class="divider-last">&nbsp;</span></li>
						</ul>	
						</div>
						<div class="span6">

						</div>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
					<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i> Informa&ccedil;&otilde;es do Pastor</h4>
								</div>
								<div class="widget-body">
								<form action="pastor_add.php"	id="formpastor" name="formpastor" method="post" >
<div class="control-group">
                                    <label class="control-label">CPF*</label>
                                    <div class="controls">
                                        <input type="text" name="cpf" value="" class="input-xxlarge" onKeyPress="maskCPF(this);" onBlur="validaCPF(this);formataCPF(this);" maxlength="14">
                                    </div>
                                </div>
									<div class="control-group">
                                    <label class="control-label">Nome Completo*</label>
                                    <div class="controls">
                                        <input type="text" name="nome" value="" class="input-xxlarge">
                                    </div>
                                </div>
<div class="control-group">
                                    <label class="control-label">Data de Nascimento*</label>
                                    <div class="controls">
                                        <input type="text" name="data_nasc" value="" onKeyPress="formata_data(this,document.formpastor.sexo);" class="input-xxlarge">
                                    </div>
                                </div>
<div class="control-group">
                                    <label class="control-label">Sexo*</label>
                                    <div class="controls">
                                        <select class="input-xxlarge" id="sexo" name="sexo">
    <option value="Masculino">Masculino</option>
    <option value="Feminino">Feminino</option>
  </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">E-mail*</label>
                                    <div class="controls">
                                        <input type="text" name="email" value="" class="input-xxlarge">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Endere&ccedil;o</label>
                                    <div class="controls">
                                        <input type="text" name="endereco" value="" class="input-xxlarge">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label">N&uacute;mero</label>
                                    <div class="controls">
                                        <input type="text" name="numero" value="" class="input-xxlarge">
                                    </div>
                                </div>

                                   <div class="control-group">
                                    <label class="control-label">Bairro</label>
                                    <div class="controls">
                                        <input type="text" name="bairro" value="" class="input-xxlarge">
                                    </div>
                                </div>

<div class="control-group">
                                    <label class="control-label">Cidade</label>
                                    <div class="controls">
                                        <input type="text" name="cidade" value="" class="input-xxlarge">
                                    </div>
                                </div>
<div class="control-group">
                                    <label class="control-label">Estado*</label>
                                    <div class="controls">
                                        <select class="input-xxlarge" id="estado" name="sexo">
<?php 
$queryestado = mysql_query("SELECT * FROM estado where regiao_id=$regiao_id");
while($estadodados = mysql_fetch_array($queryestado)) { ?>
 <option value="<?php echo $estadodados['id'] ?>"><?php echo $estadodados['descricao'] ?></option>
 <?php } ?>
  </select>
                                    </div>
                                </div>
<div class="control-group">
                                    <label class="control-label">Cep</label>
                                    <div class="controls">
                                        <input type="text" name="cep" value="" class="input-xxlarge" onKeyPress="maskcep(this);" maxlength="10">
                                    </div>
                                </div>

<div class="control-group">
                                    <label class="control-label">Telefone*</label>
                                    <div class="controls">
                                        <input type="text" name="telefone" value="" class="input-xxlarge" onKeyPress="masktelefone(this);" onBlur="formatatelefone(this);carregatelefone(this);" maxlength="16">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Cadastrar" name="ok" class="btn blue">
 <input type="submit" value="Voltar" name="voltar" class="btn blue">

                                </div>	
								</form>
								<?php 
						
					
								if(isset($_POST['ok'])){
								$teste=anti_injection($_POST["nome"]);
$data_nasc=anti_injection($_POST["data_nasc"]);
$sexo=anti_injection($_POST["sexo"]);
								$email=anti_injection($_POST["email"]);
								$endereco=anti_injection($_POST["endereco"]);
								$numero=anti_injection($_POST["numero"]);
								$bairro=anti_injection($_POST["bairro"]);
								$cidade=anti_injection($_POST["cidade"]);
								$estado=anti_injection($_POST["estado"]);
								$cep=anti_injection($_POST["cep"]);
								$telefone=anti_injection($_POST["telefone"]);
								$cpf=anti_injection($_POST["cpf"]);

								
								if(empty($cpf)){
									echo "<p>O Campo CPF &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
								}else if(empty($teste)){
									echo "<p>O Campo Nome &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
								}else if(empty($telefone)){
									echo "<p>O Campo Telefone &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
								}else
								{
								
										
	$inserir = mysql_query("insert into pastor (id,email,nome,status,telefone,cep,logradouro,numero,bairro,cidade,sexo,cpf,dataNascimento,estado)values(null,'$email','$teste','ativo','$telefone','$cep','$endereco','$numero','$bairro','$cidade','$sexo','$cpf','$data_nasc',$estado)") or die(mysql_error()) ;
								
									 echo"<script language=javascript>alert('Pastor Cadastrado com Sucesso!')</script>";
echo"<script language=javascript>location.href='index.php?view=pastores'</script>";
} 
}if(isset($_POST['voltar'])){
echo"<script language=javascript>location.href='index.php?view=pastores'</script>";
}
								 
								

								
												
							
								 ?>
								</div>
							</div>	
					</div>
				</div>
			</div>
</div>	
</div>
<?php include ("footer.php"); ?>			