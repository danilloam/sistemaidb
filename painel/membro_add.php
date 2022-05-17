<?phpsession_start();include("conexao/conecta.php");include("func.php");$ano=date("Y");$mes=date("m");$MM_authorizedUsers = "";$MM_donotCheckaccess = "true";// *** Restrict Access To Page: Grant or deny access to this pagefunction isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {   // For security, start by assuming the visitor is NOT authorized.   $isValid = False;   // When a visitor has logged into this site, the Session variable MM_Username set equal to their username.   // Therefore, we know that a user is NOT logged in if that Session variable is blank.   if (!empty($UserName)) {     // Besides being logged in, you may restrict access to only certain users based on an ID established when they login.     // Parse the strings into arrays.     $arrUsers = Explode(",", $strUsers);     $arrGroups = Explode(",", $strGroups);     if (in_array($UserName, $arrUsers)) {       $isValid = true;     }     // Or, you may restrict access to only certain users based on their username.     if (in_array($UserGroup, $arrGroups)) {       $isValid = true;     }     if (($strUsers == "") && true) {       $isValid = true;     }   }   return $isValid; }$MM_restrictGoTo = "login.php";if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {     $MM_qsChar = "?";  $MM_referrer = $_SERVER['PHP_SELF'];  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0)   $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];    function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)		{		$lmin = 'abcdefghijklmnopqrstuvwxyz';		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';		$num = '1234567890';		$simb = '!@#$%*-';		$retorno = '';		$caracteres = '';		$caracteres .= $lmin;		if ($maiusculas) $caracteres .= $lmai;		if ($numeros) $caracteres .= $num;		if ($simbolos) $caracteres .= $simb;		$len = strlen($caracteres);		for ($n = 1; $n <= $tamanho; $n++) {		$rand = mt_rand(1, $len);		$retorno .= $caracteres[$rand-1];		}		return $retorno;		}				//	$chave = geraSenha(40, true, false);	  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . $chave;  header("Location: ". $MM_restrictGoTo);   exit;}$datahj = date("Y-m-d");$login = $_SESSION['MM_Username'];$selectdados = mysqli_query($conecta,"SELECT * FROM usuario WHERE login='$login'")or die(mysqli_error($conecta));$dados = mysqli_fetch_array($selectdados);	$id=$dados["id"];	$perfil_id=$dados["id_perfil"];$selectperfil = mysqli_query($conecta,"SELECT * FROM perfil WHERE id=$perfil_id")or die(mysqli_error($conecta));$dadosperfil = mysqli_fetch_array($selectperfil);	$id_perfil=$dadosperfil["id"];	$perfil=$dadosperfil["descricao"];				// Informa dados iniciais para sistema		$imagem_usuario=$id.".jpg";				switch($perfil) { case "Administrador":$nome="Administrador";$local="Acesso Total";break;case "Secretaria Local":$selectsecretaria = mysqli_query($conecta,"SELECT * FROM secretaria WHERE usuario_id=$id")or die(mysqli_error($conecta));$dadossecretaria = mysqli_fetch_array($selectsecretaria);$secretaria_id=$dadossecretaria["id"];$membro_id=$dadossecretaria["membro_id"];$selectmembro = mysqli_query($conecta,"SELECT * FROM membro WHERE membro_id=$membro_id")or die(mysqli_error($conecta));$dadosmembro = mysqli_fetch_array($selectmembro);$nome=$dadosmembro["nome"];$selectigreja = mysqli_query($conecta,"SELECT * FROM igreja WHERE secretaria_id=$secretaria_id")or die(mysqli_error($conecta));$dadosigreja = mysqli_fetch_array($selectigreja);$igreja_id=$dadosigreja["id"];$local="da ".$dadosigreja["nome"];$regiao_id=$dadosigreja["regiao_id"];$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE id=$regiao_id")or die(mysqli_error($conecta));$dadosregiao= mysqli_fetch_array($selectregiao);$regiao_nome=$dadosregiao["descricao"];$selectmembros = mysqli_query($conecta,"SELECT * FROM membro where igreja_id=$igreja_id and membro=1") or die(mysqli_error($conecta));	$total_membros=mysqli_num_rows($selectmembros);$selectcongregados = mysqli_query($conecta,"SELECT * FROM membro where igreja_id=$igreja_id and membro=0") or die(mysqli_error($conecta));	$total_congregados=mysqli_num_rows($selectcongregados);$selectcriancas = mysqli_query($conecta,"SELECT * FROM membro where igreja_id=$igreja_id and membro=0 and funcao='crianca'") or die(mysqli_error($conecta));	$total_criancas=mysqli_num_rows($selectcriancas);break;case "Pastor Local":$selectpastor = mysqli_query($conecta,"SELECT * FROM pastor WHERE usuario_id=$id")or die(mysqli_error($conecta));$dadospastor = mysqli_fetch_array($selectpastor);$pastor_id=$dadospastor["id"];$membro_id=$dadospastor["membro_id"];$selectmembro = mysqli_query($conecta,"SELECT * FROM membro WHERE id=$membro_id")or die(mysqli_error($conecta));$dadosmembro = mysqli_fetch_array($selectmembro);$nome=$dadospastor["tipo"]." ".$dadosmembro["nome"];$selectigreja = mysqli_query($conecta,"SELECT * FROM igreja WHERE pastor_id=$pastor_id")or die(mysqli_error($conecta));$dadosigreja = mysqli_fetch_array($selectigreja);$igreja_id=$dadosigreja["id"];$local="da ".$dadosigreja["nome"];$ativa=$dadosigreja["ativa"];$estado_id=$dadosigreja["estado_id"];$regiao_id=$dadosigreja["regiao_id"];$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE id=$estado_id")or die(mysqli_error($conecta));$dadosestado= mysqli_fetch_array($selectestado);$estado_nome=$dadosestado["descricao"];$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE id=$regiao_id")or die(mysqli_error($conecta));$dadosregiao= mysqli_fetch_array($selectregiao);$regiao_nome=$dadosregiao["descricao"];$selectmembros = mysqli_query($conecta,"SELECT * FROM membro where igreja_id=$igreja_id and membro=1") or die(mysqli_error($conecta));	$total_membros=mysqli_num_rows($selectmembros);$selectcongregados = mysqli_query($conecta,"SELECT * FROM membro where igreja_id=$igreja_id and membro=0 and funcao='congregado'") or die(mysqli_error($conecta));	$total_congregados=mysqli_num_rows($selectcongregados);$selectcriancas = mysqli_query($conecta,"SELECT * FROM membro where igreja_id=$igreja_id and membro=0 and funcao='crianca'") or die(mysqli_error($conecta));	$total_criancas=mysqli_num_rows($selectcriancas);$total_gcs=0;$total_congregacoes=0;break;case "Pastor Estadual":$selectpastor = mysqli_query($conecta,"SELECT * FROM pastor WHERE usuario_id=$id")or die(mysqli_error($conecta));$dadospastor = mysqli_fetch_array($selectpastor);$pastor_id=$dadospastor["id"];$membro_id=$dadospastor["membro_id"];$selectmembro = mysqli_query($conecta,"SELECT * FROM membro WHERE id=$membro_id")or die(mysqli_error($conecta));$dadosmembro = mysqli_fetch_array($selectmembro);$nome=$dadospastor["tipo"]." ".$dadosmembro["nome"];$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE pastor_id=$pastor_id")or die(mysqli_error($conecta));$dadosestado = mysqli_fetch_array($selectestado);$estado_id=$dadosestado["id"];$local="do estado de ".$dadosestado["descricao"];break;case "Pastor Regional":$selectpastor = mysqli_query($conecta,"SELECT * FROM pastor WHERE usuario_id=$id")or die(mysqli_error($conecta));$dadospastor = mysqli_fetch_array($selectpastor);$pastor_id=$dadospastor["id"];$membro_id=$dadospastor["membro_id"];$selectmembro = mysqli_query($conecta,"SELECT * FROM membro WHERE id=$membro_id")or die(mysqli_error($conecta));$dadosmembro = mysqli_fetch_array($selectmembro);$nome=$dadospastor["tipo"]." ".$dadosmembro["nome"];$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE pastor_id=$pastor_id")or die(mysqli_error($conecta));$dadosregiao = mysqli_fetch_array($selectregiao);$regiao_id=$dadosregiao["id"];$local="da ".$dadosregiao["descricao"];$selectpagamentos = mysqli_query($conecta,"SELECT * FROM pagamentos WHERE regiao_id=$regiao_id and status='VERIFICAR' ORDER BY id ASC")or die(mysqli_error($conecta));$pagamentos_pendentes=mysqli_num_rows($selectpagamentos);$selectigrejas = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=$regiao_id ") or die(mysqli_error($conecta));$selectpastores = mysqli_query($conecta	,"SELECT * FROM pastor where regiao_id=$regiao_id ") or die(mysqli_error($conecta));			$total_igrejas=mysqli_num_rows($selectigrejas);$total_pastor=mysqli_num_rows($selectpastores);break;case "Secretaria Regional":$selectsecretaria = mysqli_query($conecta,"SELECT * FROM secretaria WHERE usuario_id=$id")or die(mysqli_error($conecta));$dadossecretaria = mysqli_fetch_array($selectsecretaria);$secretaria_id=$dadossecretaria["id"];$membro_id=$dadossecretaria["membro_id"];$selectmembro = mysqli_query($conecta,"SELECT * FROM membro WHERE id=$membro_id")or die(mysqli_error($conecta));$dadosmembro = mysqli_fetch_array($selectmembro);$nome=$dadosmembro["nome"];$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE secretaria_id=$secretaria_id")or die(mysqli_error($conecta));$dadosregiao = mysqli_fetch_array($selectregiao);$regiao_id=$dadosregiao["id"];$local="da ".$dadosregiao["descricao"];$selectigrejas = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=$regiao_id ") or die(mysql_error());$selectpastores = mysqli_query($conecta,"SELECT * FROM pastor where regiao_id=$regiao_id ") or die(mysql_error());			$total_igrejas=mysqli_num_rows($selectigrejas);$total_pastor=mysqli_num_rows($selectpastores);break;// Agora definiremos o default, que será a pagina que será aberta quando não houver um valor para o $id default: $nome="N&atilde;o Identificado";$local="N&atilde;o Identificado";break; }			?><!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<title> Sistema de Gest&atilde;o | Igreja de Deus</title>	<meta content="width=device-width, initial-scale=1.0" name="viewport" />	<meta content="" name="description" />	<meta content="" name="author" />	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all" />	<link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="all" />   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"  media="all"/>	<link href="css/style.css" rel="stylesheet" media="all" />	<link href="css/style_responsive.css" rel="stylesheet" media="all" />	<link href="css/style_default.css" rel="stylesheet" id="style_color"  media="all"/>	<link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css"  media="all"/>	<link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon">	<link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet"  media="all"/>	<link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css"  media="all" />   <link rel="stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />   <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />       <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />   <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />   <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />   <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />   <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />   <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />   <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />   <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />   		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>		<script src="js/jquery.maskMoney.js" type="text/javascript"></script>		<script src='js/shCore.js' type='text/javascript'></script>		<script src='js/shBrushJScript.js' type='text/javascript'></script>		<script src='js/shBrushXml.js' type='text/javascript'></script><script src="js/jquery.maskedinput.js" type="text/javascript"></script></head><!-- END HEAD --><!-- BEGIN BODY --><body class="fixed-top">
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
                                    <div class="controls"><input type="text" name="nome" class="input-large" onkeyup="maiuscula(this)" placeholder="NOME COMPLETO*" requerid>
                                      
                                    </div>
                                </div>
<div class="control-group">
                               
                                    <div class="controls">
                                        <input type="text" id="date" name="data_nasc" value="" placeholder="DATA DE NASCIMENTO*" class="input-large" onKeyPress="maskdata(this);" maxlength="10" REQUERID>
                                    </div>
                                </div>
<div class="control-group">
                                    <div class="controls">
                                        <select class="input-large" id="sexo" name="sexo" REQUERID>    <option value="">INFORME O SEXO*</option>
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
                                </div>																											<div class="control-group">                                    <label class="control-label">Qual o cargo do cadastro?</label>                                    <div class="controls">					<select class="input-large m-wrap" tabindex="1" name="funcao" requerid>					<option value="">Selecione uma Op&ccedil&atilde;o</option>                                            <option value="Congregado">Congregado</option>                                            <option value="Criança">Crian&ccedil;a</option>                                            <option value="Membro">Membro</option>                                            <option value="Diácono">Di&aacute;cono</option>											<option value="Evangelista">Evangelista</option>											<option value="Pastor">Pastor</option>                                        </select>                                                                            </div>                                </div>
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
								$telefone=anti_injection($_POST["telefone"]);	$funcao=anti_injection($_POST["funcao"]);
if($funcao=="Congregado" || $funcao=="Criança"){	$membro=0;}else{	$membro=1;}
																if(empty($teste)){
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
 					erro = "A verificacao de CPF suporta apenas números!"; 
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
 							
 							erro = "Número de CPF inválido!"
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
 						erro = "Número de CPF inválido.";
						
 					}
							
 			}

 	}
 	else
 	{
 		if(cpf.value.length == 0)
 			return false
 		else
 			erro = "Número de CPF inválido.";
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