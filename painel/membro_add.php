<?php
<div id="container" class="row-fluid">

<div id="main-content span12">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
					<center><div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i> Informa&ccedil;&otilde;es do Membro</h4>
								</div>
								<div class="widget-body">
								<form action="membro_add.php"	id="membro" name="membro" method="post" >

									<div class="control-group">
                                    <div class="controls">
                                      
                                    </div>
                                </div>
<div class="control-group">
                               
                                    <div class="controls">
                                        <input type="text" id="date" name="data_nasc" value="" placeholder="DATA DE NASCIMENTO*" class="input-large" onKeyPress="maskdata(this);" maxlength="10" REQUERID>
                                    </div>
                                </div>
<div class="control-group">
                                    <div class="controls">
                                        <select class="input-large" id="sexo" name="sexo" REQUERID>
    <option value="Masculino">Masculino</option>
    <option value="Feminino">Feminino</option>
  </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="email" name="email" value="" placeholder="INFORME EMAIL" class="input-large" >
                                    </div>
                                </div>
                                <div class="control-group">
                        
                                    <div class="controls">
                                        <input type="text" name="endereco" value="" placeholder="ENDERE&Ccedil;O" class="input-large" onkeyup="maiuscula(this)" REQUERID>
                                    </div>
                                </div>
								<div class="control-group">
                      
                                    <div class="controls">
                                        <input type="text" name="numero" placeholder="NUMERO" value="" class="input-large" REQUERID>
                                    </div>
                                </div>

                                   <div class="control-group">

                                    <div class="controls">
                                        <input type="text" name="bairro" value="" class="input-large" placeholder="BAIRRO" onkeyup="maiuscula(this)" REQUERID>
                                    </div>
                                </div>

<div class="control-group">
                                
                                    <div class="controls">
                                        <input type="text" name="cidade" value="" class="input-large" placeholder="CIDADE" onkeyup="maiuscula(this)" REQUERID> 
                                    </div>
                                </div>
<div class="control-group">
                            
                                    <div class="controls">
                                        <input type="text" name="estado" id="estado" value="<?php echo $estado_nome;?>" class="input-large" disabled>
                                    </div>
                                </div>
<div class="control-group">

                                    <div class="controls">
                                        <input type="text" id="cep" name="cep" value="" placeholder="CEP" class="input-large" onKeyPress="maskcep(this);" maxlength="10" REQUERID>
                                    </div>
                                </div>

<div class="control-group">
                                  
                                    <div class="controls">
                                        <input type="text" id="celular" name="telefone" value="" class="input-large" placeholder="TELEFONE CELULAR" onKeyPress="masktelefone(this);" onBlur="formatatelefone(this);carregatelefone(this);" maxlength="16" REQUERID>
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
								$estado=anti_injection($estado_id);
								$cep=anti_injection($_POST["cep"]);
								$telefone=anti_injection($_POST["telefone"]);

								
									echo "<p>O Campo Nome &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
								}else if(empty($telefone)){
									echo "<p>O Campo Telefone &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
								}else
								{
								
										
	$inserir = mysqli_query($conecta,"insert into membro (id,email,nome,status,telefone,cep,logradouro,numero,bairro,cidade,estado,igreja_id,sexo,dataNascimento,datacadastro,funcao,membro)values(null,'$email','$teste','ativo','$telefone','$cep','$endereco','$numero','$bairro','$cidade',$estado_id,'$cpf',$igreja_id,'$sexo','$data_nasc','$data_cadastro','$funcao',$membro)") or die(mysql_error()) ;
								
									 echo"<script language=javascript>alert('Membro Cadastrado com Sucesso!')</script>";
echo"<script language=javascript>location.href='index.php?view=membros'</script>";
} 
}if(isset($_POST['voltar'])){
echo"<script language=javascript>location.href='index.php?view=membros'</script>";
}
								 
								

								
												
							
								 ?>
								</div>
							</div>	</center>
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
 function masktelefone(fone) {
 	var evt = window.event;
 	kcode=evt.keyCode;
 	if (kcode == 8) return;
 	if (fone.value.length == 1) { fone.value = '(' + fone.value ; }
 	if (fone.value.length == 3) { fone.value = fone.value + ') '; }
 	if (fone.value.length == 6) { fone.value = fone.value + ' '; }
	if (fone.value.length == 11) { fone.value = fone.value + '.'; }


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