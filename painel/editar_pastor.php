<?php
	include("configuracao.php");
 include ("header.php"); ?>
<div id="container" class="row-fluid">
	<?php include ("menu.php"); 
	?>
	<?php 
                        include ("conexao/conecta.php");
                        $idpastor=$_GET["id"];
           
						$sql=mysql_query("select * from pastor where id=$idpastor");
						$ver=mysql_fetch_array($sql);

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
							<small> Igreja de Deus no Brasil </small>
						</h3>
						<ul class="breadcrumb">
							<li>
                                <a href="index.php?view=home"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
							</li>
                            <li>
                                <a href="index.php?view=pastores">Pastores</a> <span class="divider">&nbsp;</span>
                            </li>
							<li><a href="">Editar Informa&ccedil;&otilde;es </a><span class="divider-last">&nbsp;</span></li>
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
									<h4><i class="icon-reorder"></i> Informa&ccedil;&otilde;es de Pastor</h4>
								</div>
								<div class="widget-body">
								<form enctype="multipart/form-data" action="editar_pastor.php?id=<?php echo $idpastor?>"	method="post" >

									<div class="control-group">
                                    <label class="control-label">CPF*</label>
                                    <div class="controls">
                                        <input type="text" name="cpf" value="<?php echo $ver["cpf"]; ?>" class="input-xxlarge" <?php if($ver["cpf"]==""){}else{echo "disabled";}?> onKeyPress="maskCPF(this);" onBlur="validaCPF(this);formataCPF(this);" maxlength="14">
                                    </div>
                                </div>
									<div class="control-group">
                                    <label class="control-label">Nome Completo*</label>
                                    <div class="controls">
                                        <input type="text" name="nome" value="<?php echo $ver["nome"]; ?>" class="input-xxlarge">
                                    </div>
                                </div>
<div class="control-group">
                                    <label class="control-label">Data de Nascimento*</label>
                                    <div class="controls">
                                        <input type="text" name="data_nasc" value="<?php echo $ver["dataNascimento"]; ?>" class="input-xxlarge" onKeyPress="formata_data(this,document.formpastor.sexo);">
                                    </div>
                                </div>
<div class="control-group">
                                    <label class="control-label">Sexo*</label>
                                    <div class="controls">
                                        <select class="input-xxlarge" id="sexo" name="sexo">
    <option value="Masculino"<?php if($ver["sexo"]=="Masculino"){echo "selected";}?>>Masculino</option>
    <option value="Feminino"<?php if($ver["sexo"]=="Feminino"){echo "selected";}?>>Feminino</option>
  </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">E-mail*</label>
                                    <div class="controls">
                                        <input type="text" name="email" value="<?php echo $ver["email"]; ?>" class="input-xxlarge">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Endere&ccedil;o</label>
                                    <div class="controls">
                                        <input type="text" name="endereco" value="<?php echo $ver["logradouro"]; ?>" class="input-xxlarge">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label">N&uacute;mero</label>
                                    <div class="controls">
                                        <input type="text" name="numero" value="<?php echo $ver["numero"]; ?>" class="input-xxlarge">
                                    </div>
                                </div>
						
                                   <div class="control-group">
                                    <label class="control-label">Bairro</label>
                                    <div class="controls">
                                        <input type="text" name="bairro" value="<?php echo $ver["bairro"]; ?>" class="input-xxlarge">
                                    </div>
                                </div>

									<div class="control-group">
                                    <label class="control-label">Cidade</label>
                                    <div class="controls">
                                        <input type="text" name="cidade" value="<?php echo $ver["cidade"]; ?>" class="input-xxlarge">
                                    </div>
                                </div>
					
<div class="control-group">
                                    <label class="control-label">Estado*</label>
                                    <div class="controls">
                                        <select class="input-xxlarge" id="estado" name="sexo" disabled>
<?php
$queryestado = mysql_query("SELECT * FROM estado where regiao_id=$regiao_id");

 while($estadodados = mysql_fetch_array($queryestado)) { ?>
 <option value="<?php echo $estadodados['id'];?>" 
 <?php if($estadodados['id']==$ver["estado"]){echo "selected "; }?>
><?php echo $estadodados['descricao'] ?></option>
 <?php } ?>
  </select>
                                    </div>
                                </div>

									<div class="control-group">
                                    <label class="control-label">Cep</label>
                                    <div class="controls">
                                        <input type="text" name="cep" value="<?php echo $ver["cep"]; ?>" class="input-xxlarge" onKeyPress="maskcep(this);" maxlength="10" >
                                    </div>
                                </div>
			
									<div class="control-group">
                                    <label class="control-label">Telefone*</label>
                                    <div class="controls">
                                        <input type="text" name="telefone" value="<?php echo $ver["telefone"]; ?>" class="input-xxlarge" onKeyPress="masktelefone(this);" onBlur="formatatelefone(this);carregatelefone(this);" maxlength="16">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Alterar" name="ok" class="btn blue">
  <input type="submit" value="Voltar" name="voltar" class="btn blue">
                                </div>	
								</form>
								<?php 
							if(isset($_POST['ok'])){
								$cpf=anti_injection($_POST["cpf"]);
								$teste=anti_injection($_POST["nome"]);
								$email=anti_injection($_POST["email"]);
								$endereco=anti_injection($_POST["endereco"]);
								$numero=anti_injection($_POST["numero"]);
								$bairro=anti_injection($_POST["bairro"]);
								$cidade=anti_injection($_POST["cidade"]);
							$sexo=anti_injection($_POST["sexo"]);
$data_nasc=anti_injection($_POST["data_nasc"]);
								$cep=anti_injection($_POST["cep"]);
								$telefone=anti_injection($_POST["telefone"]);
								
	
								


								if(empty($cpf)){
echo"<script language=javascript>alert('O Campo CPF � necess�rio!')</script>";
								
								}else if(empty($teste)){
echo"<script language=javascript>alert('O Campo Nome � necess�rio!')</script>";
								
								}else if(empty($telefone)){
echo"<script language=javascript>alert('O Campo Telefone � necess�rio!')</script>";
								
								}else
								{
								
							
	$inserir = mysql_query("UPDATE pastor SET email='{$email}',nome='{$teste}',telefone='{$telefone}',cep='{$cep}',logradouro='{$endereco}',numero='{$numero}',bairro='{$bairro}',cidade='{$cidade}',dataNascimento='{$data_nasc}',sexo='{$sexo}',cpf='{$cpf}' WHERE id=$idpastor") or die (mysql_error());
								 echo"<script language=javascript>alert('Pastor Alterado com Sucesso!')</script>";
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