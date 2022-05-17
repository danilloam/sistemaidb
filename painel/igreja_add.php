<?php include ("header.php"); ?>
<div id="container" class="row-fluid">
	<?php include ("menu.php"); ?>
<?php

$queryestado = mysql_query("SELECT * FROM estado where regiao_id=$regiao_id");


?>
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
                                <a href="index.php?view=igrejas">Igrejas</a> <span class="divider">&nbsp;</span>
                            </li>
							<li><a href="igreja_add.php">Adicionar Igreja </a><span class="divider-last">&nbsp;</span></li>
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
									<h4><i class="icon-reorder"></i> Informa&ccedil;&otilde;es da Igreja</h4>
								</div>
								<div class="widget-body">
								<form action="igreja_add.php"	method="post" >
		<div class="control-group">
                                    <label class="control-label">CNPJ*</label>
                                    <div class="controls">
                                        <input type="text" name="cnpj" value="" class="input-xxlarge" <?php if($verigreja["cnpj"]==""){}else{echo "disabled";}?> >
                                    </div>
                                </div>
									<div class="control-group">
                                    <label class="control-label">Nome Completo*</label>
                                    <div class="controls">
                                        <input type="text" name="nome" value="" class="input-xxlarge">
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
<?php while($estadodados = mysql_fetch_array($queryestado)) { ?>
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
								
										
	$inserir = mysql_query("insert into membro (id,email,nome,status,telefone,cep,logradouro,numero,bairro,cidade,estado,cpf,igreja_id,sexo,dataNascimento)values(null,'$email','$teste','ativo','$telefone','$cep','$endereco','$numero','$bairro','$cidade',$estado_id,'$cpf',$igreja_id,'$sexo','$data_nasc')") or die(mysql_error()) ;
								
									 echo"<script language=javascript>alert('Membro Cadastrado com Sucesso!')</script>";
echo"<script language=javascript>location.href='index.php?view=membros'</script>";
} 
}if(isset($_POST['voltar'])){
echo"<script language=javascript>location.href='index.php?view=membros'</script>";
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