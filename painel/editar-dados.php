<?php
	include("configuracao.php");
 include ("header.php"); ?>
<div id="container" class="row-fluid">
	<?php include ("menu.php"); 
	?>
	<?php 
                        include ("conexao/conecta.php");
                 
           
						$sql1=mysqli_query($conecta,"select * from pastor where id=$pastor_id");
						$ver1=mysqli_fetch_array($sql1);
						$membro_id=$ver1["membro_id"];
						$sql=mysqli_query($conecta,"select * from pessoa where id=$membro_id");
						$ver=mysqli_fetch_array($sql);
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
								<form enctype="multipart/form-data" action="editar-dados.php"	method="post" >

									<div class="control-group">
                                    <label class="control-label">Nome*</label>
                                    <div class="controls">
                                        <input type="text" name="nome" value="<?php echo utf8_encode(strtoupper($ver["nome"])); ?>" class="span6">
                                    </div>
                                </div>									<div class="control-group">                                    <label class="control-label">Sobrenome*</label>                                    <div class="controls">                                        <input type="text" name="sobrenome" value="<?php echo utf8_encode(strtoupper($ver["sobrenome"])); ?>" class="span6">                                    </div>                                </div>
<div class="control-group">
                                    <label class="control-label">Data de Nascimento*</label>
                                    <div class="controls">
                                        <input type="text" name="data_nasc" value="<?php echo $ver["dataNascimento"]; ?>" class="span6" onKeyPress="maskdata(this);">
                                    </div>
                                </div>
<div class="control-group">
                                    <label class="control-label">Sexo*</label>
                                    <div class="controls">
                                        <select class="span6" id="sexo" name="sexo">
    <option value="MASCULINO"<?php if($ver["sexo"]=="Masculino"){echo "selected";}?>>MASCULINO</option>
    <option value="FEMININO"<?php if($ver["sexo"]=="Feminino"){echo "selected";}?>>FEMININO</option>
  </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">E-mail*</label>
                                    <div class="controls">
                                        <input type="email" name="email" value="<?php echo utf8_encode(strtoupper($ver["email"])); ?>" class="span6" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Endere&ccedil;o</label>
                                    <div class="controls">
                                        <input type="text" name="endereco" value="<?php echo utf8_encode(strtoupper($ver["logradouro"])); ?>" class="span6">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label">N&uacute;mero</label>
                                    <div class="controls">
                                        <input type="text" name="numero" value="<?php echo utf8_encode(strtoupper($ver["numero"])); ?>" class="span6">
                                    </div>
                                </div>
						
                                   <div class="control-group">
                                    <label class="control-label">Bairro</label>
                                    <div class="controls">
                                        <input type="text" name="bairro" value="<?php echo utf8_encode(strtoupper($ver["bairro"])); ?>" class="span6">
                                    </div>
                                </div>

									<div class="control-group">
                                    <label class="control-label">Cidade</label>
                                    <div class="controls">
                                        <input type="text" name="cidade" value="<?php echo utf8_encode(strtoupper($ver["cidade"])); ?>" class="span6">
                                    </div>
                                </div>
					
<div class="control-group">
                                    <label class="control-label">Estado*</label>
                                    <div class="controls">
                                        <select class="span6" id="estado" name="estado">
<?php
$queryestado = mysqli_query($conecta,"SELECT * FROM estado where regiao_id=$regiao_id");

 while($estadodados = mysqli_fetch_array($queryestado)) { ?>
 <option value="<?php echo $estadodados['id'];?>" 
 <?php if($estadodados['id']==$ver["estado"]){echo "selected "; }?>
><?php echo utf8_encode(strtoupper($estadodados['descricao'])) ?></option>
 <?php } ?>
  </select>
                                    </div>
                                </div>

									<div class="control-group">
                                    <label class="control-label">Cep</label>
                                    <div class="controls">
                                        <input type="text" name="cep" value="<?php echo $ver["cep"]; ?>" class="span6" onKeyPress="maskcep(this);" maxlength="10">
                                    </div>
                                </div>
			
									<div class="control-group">
                                    <label class="control-label">Telefone</label>
                                    <div class="controls">
                                        <input type="text" name="telefone" value="<?php echo $ver["telefone"]; ?>" class="span6" onKeyPress="masktelefone(this);" onBlur="formatatelefone(this);carregatelefone(this);" maxlength="14">
                                    </div>
                                </div>																	<div class="control-group">                                    <label class="control-label">Celular Principal</label>                                    <div class="controls">                                        <input type="text" name="celular1" value="<?php echo $ver["celular1"]; ?>" class="span6" onKeyPress="maskcelular(this);" onBlur="formatatelefone(this);carregatelefone(this);" maxlength="16"><select class="span2" id="opercel1" name="opercel1"><option value=""<?php if($ver["opercel1"]==""){echo "selected";}?>>OPERADORA</option>    <option value="OI"<?php if($ver["opercel1"]=="OI"){echo "selected";}?>>OI</option>    <option value="TIM"<?php if($ver["opercel1"]=="TIM"){echo "selected";}?>>TIM</option> <option value="CLARO"<?php if($ver["opercel1"]=="CLARO"){echo "selected";}?>>CLARO</option>  <option value="VIVO"<?php if($ver["opercel1"]=="VIVO"){echo "selected";}?>>VIVO</option>   <option value="OUTROS"<?php if($ver["opercel1"]=="OUTROS"){echo "selected";}?>>OUTROS</option>  </select>  <select class="span2" id="cel1wp" name="cel1wp"><option value=""<?php if($ver["cel1wp"]==""){echo "selected";}?>>Possui WhatsApp?</option>    <option value="1"<?php if($ver["cel1wp"]=="1"){echo "selected";}?>>Sim</option>    <option value="0"<?php if($ver["cel1wp"]=="0"){echo "selected";}?>>N&atilde;o</option>  </select>                                    </div>                                </div><div class="control-group">                                    <label class="control-label">Celular 2</label>                                    <div class="controls">                                        <input type="text" name="celular1" value="<?php echo $ver["celular2"]; ?>" class="span6" onKeyPress="maskcelular(this);" onBlur="formatatelefone(this);carregatelefone(this);" maxlength="16"><select class="span2" id="opercel2" name="opercel2"><option value=""<?php if($ver["opercel2"]==""){echo "selected";}?>>OPERADORA</option>    <option value="OI"<?php if($ver["opercel2"]=="OI"){echo "selected";}?>>OI</option>    <option value="TIM"<?php if($ver["opercel2"]=="TIM"){echo "selected";}?>>TIM</option> <option value="CLARO"<?php if($ver["opercel2"]=="CLARO"){echo "selected";}?>>CLARO</option>  <option value="VIVO"<?php if($ver["opercel2"]=="VIVO"){echo "selected";}?>>VIVO</option>   <option value="OUTROS"<?php if($ver["opercel2"]=="OUTROS"){echo "selected";}?>>OUTROS</option>  </select>  <select class="span2" id="cel2wp" name="cel2wp"><option value=""<?php if($ver["cel2wp"]==""){echo "selected";}?>>Possui WhatsApp?</option>    <option value="1"<?php if($ver["cel2wp"]=="1"){echo "selected";}?>>Sim</option>    <option value="0"<?php if($ver["cel2wp"]=="0"){echo "selected";}?>>N&atilde;o</option>  </select>                                    </div>                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Alterar" name="ok" class="btn blue">
  <input type="submit" value="Voltar" name="voltar" class="btn blue">
                                </div>	
								</form>
								<?php 
							if(isset($_POST['ok'])){
							
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
								
	
								


								if(empty($teste)){
echo"<script language=javascript>alert('O Campo Nome � necess�rio!')</script>";
									
								}else if(empty($telefone)){
echo"<script language=javascript>alert('O Campo Telefone � necess�rio!')</script>";									

								}else
								{
								$membro_id=$ver["numero"];
								$comando="UPDATE membro SET email='{$email}',nome='{$teste}',telefone='{$telefone}',cep='{$cep}',logradouro='{$endereco}',numero='{$numero}',bairro='{$bairro}',cidade='{$cidade}',dataNascimento='{$data_nasc}',sexo='{$sexo}' WHERE id={$membro_id} ";			
	$inserir = mysqli_query($conecta,$comando) or die(mysqli_error($conecta));
								 echo"<script language=javascript>alert('Dados Alterado com Sucesso!')</script>";
echo"<script language=javascript>location.href='index.php?view=home'</script>";
								}
															
							}if(isset($_POST['voltar'])){
echo"<script language=javascript>location.href='index.php?view=home'</script>";
}
								 ?>
								</div>
							</div>	
					</div>
				</div>
			</div>
</div>	
</div>
<script type="text/javascript">
function Onlynumbers(e)
{
	var tecla=new Number();
	if(window.event) {
		tecla = e.keyCode;
	}
	else if(e.which) {
		tecla = e.which;
	}
	else {
		return true;
	}
	if((tecla >= "97") && (tecla <= "122")){
		return false;
	}
}
function maskCPF(CPF) {

 	if (CPF.value.length == 3) { CPF.value = CPF.value + '.'; }
 	if (CPF.value.length == 7) { CPF.value = CPF.value + '.'; }
 	if (CPF.value.length == 11) { CPF.value = CPF.value + '-'; }
 }
 function masktelefone(fone) {
 	var evt = window.event;
 	kcode=evt.keyCode;
 	if (kcode == 8) return;
 	if (fone.value.length == 1) { fone.value = '(' + fone.value ; }
 	if (fone.value.length == 3) { fone.value = fone.value + ') '; }
	if (fone.value.length == 9) { fone.value = fone.value + '.'; }


 }  function maskcelular(fone) { 	var evt = window.event; 	kcode=evt.keyCode; 	if (kcode == 8) return; 	if (fone.value.length == 1) { fone.value = '(' + fone.value ; } 	if (fone.value.length == 3) { fone.value = fone.value + ') '; } 	if (fone.value.length == 6) { fone.value = fone.value + ' '; }	if (fone.value.length == 11) { fone.value = fone.value + '.'; } }
    function maskdata(data) {
 	var evt = window.event;
 	kcode=evt.keyCode;
 	if (kcode == 8) return;
 	if (data.value.length == 2) { data.value = data.value +'/' ; }
 	if (data.value.length == 5) { data.value = data.value + '/'; }

 }
  function maskcep(cep) {
 	var evt = window.event;
 	kcode=evt.keyCode;
 	if (kcode == 8) return;
 	if (cep.value.length == 2) { cep.value = cep.value +'.' ; }
 	if (cep.value.length == 6) { cep.value = cep.value + '-'; }

 }
function maiuscula(z){
        v = z.value.toUpperCase();
        z.value = v;
    }
function validaCPF(cpf) 
 {
   erro = new String;
 
 	if (cpf.value.length == 14)
 	{	
 			cpf.value = cpf.value.replace('.', '');
 			cpf.value = cpf.value.replace('.', '');
 			cpf.value = cpf.value.replace('-', '');
 
 			var nonNumbers = /\D/;
 	
 			if (nonNumbers.test(cpf.value)) 
 			{
 					erro = "A verificacao de CPF suporta apenas n�meros!"; 
 			}
 			else
 			{
 					if (cpf.value == "00000000000" || 
 							cpf.value == "11111111111" || 
 							cpf.value == "22222222222" || 
 							cpf.value == "33333333333" || 
 							cpf.value == "44444444444" || 
 							cpf.value == "55555555555" || 
 							cpf.value == "66666666666" || 
 							cpf.value == "77777777777" || 
 							cpf.value == "88888888888" || 
 							cpf.value == "99999999999") {
 							
 							erro = "N�mero de CPF inv�lido!"
 					}
 	
 					var a = [];
 					var b = new Number;
 					var c = 11;
 
 					for (i=0; i<11; i++){
 							a[i] = cpf.value.charAt(i);
 							if (i < 9) b += (a[i] * --c);
 					}
 	
 					if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
 					b = 0;
 					c = 11;
 	
 					for (y=0; y<10; y++) b += (a[y] * c--); 
 	
 					if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
 	
 					if ((cpf.value.charAt(9) != a[9]) || (cpf.value.charAt(10) != a[10])) {
 						erro = "N�mero de CPF inv�lido.";
						
 					}
							
 			}

 	}
 	else
 	{
 		if(cpf.value.length == 0)
 			return false
 		else
 			erro = "N�mero de CPF inv�lido.";
 	}
 	if (erro.length > 0) {
 			alert(erro);
 			cpf.focus();
 			return false;
 	} 	
 	return true;	
 }
</script>
<?php include ("footer.php"); ?>			