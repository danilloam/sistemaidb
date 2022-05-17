<?php include("header.php");?>
<body onload="esconderConjuge()">


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
   <?php include("top.php");?>
       <!--end top header-->

       <!--start sidebar -->
       <aside class="sidebar-wrapper" data-simplebar="true">
          <div class="sidebar-header">
            <div>
              <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
              <h4 class="logo-text">Sistema IDB</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
            </div>
          </div>
          <!--navigation-->
         <?php include("menu.php"); ?>
          <!--end navigation-->
       </aside>
       <!--end sidebar -->

       <!--start content-->
       <main class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Pessoas</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Adicionar Pessoa</li>
							</ol>
						</nav>
					</div>
				
				</div>
				<!--end breadcrumb-->
				<div class="row">
				    <form action="adicionarpessoa.php"	id="membro" name="membro" method="post" >
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Informações Básicas</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<div class="row g-3">
									<div class="col-6"><input type="text" class="form-control  mb-3" name="nome" placeholder="Informe o Nome" onkeyup="maiuscula(this)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Aqui você deve inserir apenas Primeiro Nome" aria-label="Username" required> </div>
									<div class="col-6"><input type="text" class="form-control  mb-3" name="sobrenome" placeholder="Informe o Sobrenome" onkeyup="maiuscula(this)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Aqui você informa o restante" aria-label="Server" required></div>
								</div>
								<div class="row g-3">
								<div class="col-6"><input type="date" class="form-control mb-3" data-bs-toggle="tooltip" name="nascimento" data-bs-placement="bottom" min="1900-01-01" max="<?php echo date("Y-m-d");?>" data-bs-original-title="Insira a Data de Nascimento" required></div>
									<div class="col-6"><select class="form-select mb-3" aria-label="Default select example" id="sexo" name="sexo" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Informe o sexo da pessoa" required>
									<option selected="">Selecione o Sexo</option>
									<option value="Masculino">MASCULINO</option>
									<option value="Feminino">FEMININO</option>
								</select></div>
								</div>
								
							
							</div>
						</div>
							
			
						<div class="card">
						    <div class="card-body">
						        <div class="row g-3">
									<div class="col-6"><input type="text" class="form-control  mb-3" placeholder="Informe o Nome" name="nacionalidade" onkeyup="maiuscula(this)" aria-label="Informe a Nacionalidade" value="Brasileira" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Aqui você informa a Nacionalidade da pessoa" required> </div>
									<div class="col-6"><input type="text" class="form-control  mb-3" placeholder="A pessoa é natural de onde?" name="naturalidade" onkeyup="maiuscula(this)" id="naturalidade" aria-label="Server" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Aqui você informa em qual cidade a pessoa nasceu" required></div>
								</div>
						        <div class="row g-3">
						           <div class="col-6"> 
						           <select class="form-select mb-3" aria-label="Default select example" data-bs-toggle="tooltip" name="escolaridade" data-bs-placement="bottom" data-bs-original-title="Selecione o nível de Ensino que a pessoa possui" required>
 			      	            <option value="">ESCOLARIDADE</option>
                             	<option value="1">FUNDAMENTAL INCOMPLETO</option>
                             	<option value="2">FUNDAMENTAL COMPLETO</option>
                              	<option value="3">MEDIO INCOMPLETO</option>
                              	<option value="4">MEDIO COMPLETO</option>
                             	<option value="5">SUPERIOR INCOMPLETO</option>
                              	<option value="6">SUPERIOR COMPLETO</option>
								</select>
								</div>
								<div class="col-6">
								<select class="form-select mb-3" aria-label="Default select example" onchange="showDiv(this)" name="ecivil" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Informe o status Civil da pessoa" required>
 		                		<option value="">ESTADO CIVIL</option>
                                <option value="1">SOLTEIRO(A)</option>
                                <option value="2">CASADO(A)</option>
                                <option value="3">VIUVO(A)</option>
                                <option value="4">DIVORCIADO(A)</option>
								</select>
								</div>
								</div>
								<div class="row g-3" >
						           <div class="col-12" id="conjuge"> 
								<input type="text" class="form-control  mb-3" id="conjuge1" name="conjuge" placeholder="Informe o Nome do Cônjuge" data-bs-toggle="tooltip" data-bs-placement="bottom" onkeyup="maiuscula(this)" data-bs-original-title="Infome o nome do cônjuge da pessoa" aria-label="Username">
								</div>
								
						    </div>
						</div>
						</div>
						<h6 class="mb-0 text-uppercase">Filiação</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
							    <div class="row g-3">
							    <div class="col-12">
									<input type="text" class="form-control  mb-3" placeholder="Informe o Nome da Mãe" id="mae" name="mae" onkeyup="maiuscula(this)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Aqui você insere o nome completo da mãe da pessoa" aria-label="Username" required>
								</div>
								<div class="col-10">
									<input type="text" class="form-control  mb-3" id="pai" name="pai" placeholder="Informe o Nome do Pai" onkeyup="maiuscula(this)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Aqui você insere o nome completo do pai da pessoa" aria-label="Username" >
								</div>
								<div class="col-2"><input type="checkbox" value="1" id="ckpai" name="ckpai" class="form-check-input"data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Selecione se não tiver pai declarado" >
                            <label class="form-check-label" for="ckpai"> Não Declarado</label></div>
							    </div>
								</div>
		
								</div>
							
							<h6 class="mb-0 text-uppercase">Endereço</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
							    <div class="row g-3">
							  
									<div class="col-3">
									<input type="text" id="cep" class="form-control  mb-3 col-md-4" placeholder="Cep" name="cep" maxlength="10" onKeyPress="maskcep(this);" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Aqui você insere o cep da rua para agilizar o cadastro" required="">
								 	</div></div>
								 	
								<div class="row g-3">
								    <div class="col-10">
								 	<input type="text" id="rua" class="form-control  mb-3" placeholder="Logradouro" name="logradouro" onkeyup="maiuscula(this)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Aqui você insere o nome da rua, avenida, etc..." required="">
								 	</div><div class="col-2">
							    	<input type="text" id="numero" class="form-control  mb-3" placeholder="Número" name="numero" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Aqui você insere o número da residência" required="">
							    	 </div>
							    	 </div>
							    	<div class="row g-3">
								    <div class="col-5"><input type="text" id="bairro" class="form-control  mb-3" placeholder="Bairro" onkeyup="maiuscula(this)" name="bairro" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Aqui você insere o nome do bairro" required=""></div>
							    	<div class="col-5"><input type="text" id="cidade" class="form-control  mb-3" placeholder="Cidade" onkeyup="maiuscula(this)" name="cidade" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Aqui você insere o nome da cidade" required=""></div>
							    	<div class="col-2"><input type="text" id="uf" name="uf" maxlength="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Aqui você insere a UF da cidade" class="form-control  mb-3" placeholder="UF" required=""></div>
								</div>
								</div>
								
		
								</div>
								<h6 class="mb-0 text-uppercase">Contato</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
							    <div class="row g-3">
							        <div class="col-8"> <input type="email" class="form-control  mb-3" data-bs-toggle="tooltip" data-bs-placement="top" onkeyup="minuscula(this)" data-bs-original-title="Aqui você insere o email da pessoa" placeholder="Email" name="email"></div>
							        <div class="col-4"> <input type="text" class="form-control  mb-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Aqui você insere o telefone residencial, se tiver" id="telefone" name="telefone" onblur="MascaraGenerica(this, 'TELEFONE');" placeholder="Telefone"></div>
							        </div>
							        <div class="row g-3">
							      <div class="col-6">  <input type="text" class="form-control  mb-3" name="celular1" id="telefone1" data-bs-toggle="tooltip" data-bs-placement="top" onblur="MascaraGenerica(this, 'CELULAR');" data-bs-original-title="Aqui você insere o celular principal" placeholder="Celular Principal*" required=""></div>
							      <div class="col-4">
							        <select id="heard" class="form-control  mb-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Selecione a operadora do celular" name="opercel1">
                              <option value="">Operadora</option>
                              <option value="vivo">Vivo</option>
                              <option value="claro">Claro</option>
                              <option value="tim">Tim</option>
                              <option value="oi">Oi</option>
                              <option value="nextel">Nextel</option>
                              <option value="algar">Algar</option>
							  <option value="sercomtel">Sercomtel</option>
							  <option value="portoseguro">Porto Seguro</option>
							  <option value="datora">Datora</option>
							  <option value="teparar">Teparar</option>
                            </select></div><div class="col-2">
                            <input type="checkbox" id="wp1" value="1" name="wp1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Este celular é WhatsApp?" class="form-check-input">
                            <label class="form-check-label" for="wp1"> É WhatsApp?</label></div>
                            </div>
                            <div class="row g-3">
                            <div class="col-6"><input type="text" class="form-control  mb-3" name="celular2" placeholder="Celular Secundário" id="telefone2" data-bs-toggle="tooltip" data-bs-placement="top" onblur="MascaraGenerica(this, 'CELULAR');" data-bs-original-title="Aqui você insere outro número de celular, se tiver"></div>
                             <div class="col-4"><select id="heard" class="form-control  mb-3" name="opercel2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Selecione a operadora do celular">
                              <option value="">Operadora</option>
                              <option value="vivo">Vivo</option>
                              <option value="claro">Claro</option>
                              <option value="tim">Tim</option>
                              <option value="oi">Oi</option>
                              <option value="nextel">Nextel</option>
                              <option value="algar">Algar</option>
							  <option value="sercomtel">Sercomtel</option>
							  <option value="portoseguro">Porto Seguro</option>
							  <option value="datora">Datora</option>
							  <option value="teparar">Teparar</option>
                            </select></div>
                            <div class="col-2"><input type="checkbox" value="1" id="wp2" name="wp2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Este celular é WhatsApp?" class="form-check-input">
                            <label class="form-check-label" for="wp2"> É WhatsApp?</label></div>
							    </div>
							</div>	
						</div>
						<h6 class="mb-0 text-uppercase">Informações Adicionais</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
							    <div class="row g-4">
							        <div class="col-3">
							            
							        <select id="heard" class="form-control  mb-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Selecione o tipo de Cadastro" name="funcao" required >
                              <option value="">Arrolamento</option>
                              <option value="Membro">Membro</option>
                              <option value="Congregado">Congregado</option>
                              <option value="Novo Convertido">Novo Convertido</option>
                              <option value="Criança">Criança</option>
                              <option value="Afastado">Afastado</option>
                           
                            </select></div>
							        	<div class="col-3"><input type="date" class="form-control mb-3" name="ppassos" data-bs-toggle="tooltip" data-bs-placement="bottom" min="1900-01-01" data-bs-original-title="Insira a Data dos Primeiros Passos" ></div>
							        		<div class="col-3"><input type="date" class="form-control mb-3" name="batismoaguas" data-bs-toggle="tooltip" data-bs-placement="bottom" min="1900-01-01" data-bs-original-title="Insira a Data do Batismo nas Águas" ></div>
							        			<div class="col-3"><input type="date" class="form-control mb-3" name="batismoespirito" data-bs-toggle="tooltip" data-bs-placement="bottom" min="1900-01-01" data-bs-original-title="Insira a Data do Batismo no Espírito Santo" ></div>
                     
                           <div class="col-12"><textarea class="form-control mb-3" onkeyup="maiuscula(this)" placeholder="Coloque aqui os comentários referênte a este cadastro"></textarea></div>
							    </div>
							</div>	
						</div>
						
						<hr/>
						<div class="card">
							<div class="card-body">
							    
							    <div class="row g-3">
							        	<input type="submit" name="ok" class="btn btn-outline-primary px-5" value="Cadastrar"/>
							        
							        	
                           
							    </div>
							</div>	
						</div>
					</div>
					</form>
					
					
					                        
                        	<?php 

						

					

								if(isset($_POST['ok'])){

$nome=utf8_decode(anti_injection($_POST["nome"]));
$sobrenome=utf8_decode(anti_injection($_POST["sobrenome"]));
$nascimento=anti_injection(implode("-",array_reverse(explode("/",$_POST["nascimento"]))));
$sexo=anti_injection($_POST["sexo"]);
$ecivil=anti_injection($_POST["ecivil"]);
$escolaridade=anti_injection($_POST["escolaridade"]);
$conjuge=utf8_decode(anti_injection($_POST["conjuge"]));
$conjujecristao=anti_injection($_POST["conjugecristao"]);
$casamento=anti_injection($_POST["casamento"]);
$naturalidade=utf8_decode(anti_injection($_POST["naturalidade"]));
$nacionalidade=utf8_decode(anti_injection($_POST["nacionalidade"]));
$mae=utf8_decode(anti_injection($_POST["mae"]));
$ckpai = anti_injection($_POST["ckpai"]);
$pai=utf8_decode(anti_injection($_POST["pai"]));
$cep=anti_injection($_POST["cep"]);
$logradouro=utf8_decode(anti_injection($_POST["logradouro"]));
$numero=anti_injection($_POST["numero"]);
$bairro=utf8_decode(anti_injection($_POST["bairro"]));
$cidade=utf8_decode(anti_injection($_POST["cidade"]));
$uf=anti_injection($_POST["uf"]);
$email=anti_injection($_POST["email"]);
$telefone=anti_injection($_POST["telefone"]);
$celular1=anti_injection($_POST["celular1"]);
$opercel1=anti_injection($_POST["opercel1"]);
$wp1=anti_injection($_POST["wp1"]);
$celular2=anti_injection($_POST["celular2"]);
$opercel2=anti_injection($_POST["opercel2"]);
$wp2=anti_injection($_POST["wp2"]);
$ppassos=anti_injection(implode("-",array_reverse(explode("/",$_POST["ppassos"]))));
$batismoaguas=anti_injection(implode("-",array_reverse(explode("/",$_POST["batismoaguas"]))));
$batismoespirito=anti_injection(implode("-",array_reverse(explode("/",$_POST["batismoespirito"]))));
$funcao=utf8_decode(anti_injection($_POST["funcao"]));

if($funcao=="Visitante" || $funcao=="Congregado" || $funcao=="Criança"){
	$membro=0;
}else{
	$membro=1;
}
								

if($uf==$estadouf){
    $estadoenvio=$estado_id;
    
}else{
    $selectestado = mysqli_query ($conecta, "SELECT * FROM estado WHERE uf =". $estadouf) or die (mysqli_error ($conecta));

$dadosestado = mysqli_fetch_array ($selectestado);
$estadoenvio = $dadosestado["id"];

}
if($wp1==""){
    $wp1=0;
}
if($wp2==""){
    $wp2=0;
}

$datacadastro=date('Y-m-d');
$inserir = mysqli_query($conecta, "INSERT INTO pessoa (id,data_nascimento,datacadastro,dataprimeiropassos,data_batismo,databatismoespiritosanto,dataCasamento,bairro,cep,cidade,email,estado,logradouro,numero,telefone,celular1,opercel1,cel1wp,celular2,opercel2,cel2wp,nome,sobrenome,sexo,status,ecivil,escolaridade,naturalidade,nacionalidade,nomemae,nomepai,conjuge,funcao,membro,falecido,regiao_id,igreja_id) VALUES (null,'$nascimento','$datacadastro','$ppassos','$batismoaguas','$batismoespirito','$casamento','$bairro','$cep','$cidade','$email',$estadoenvio,'$logradouro','$numero','$telefone','$celular1','$opercel1', $wp1,'$celular2','$opercel2',$wp2,'$nome','$sobrenome','$sexo','ativo','$ecivil','$escolaridade','$naturalidade','$nacionalidade','$mae','$pai','$conjuge','$funcao',$membro,0,$regiao_id,$igreja_id)") or die(mysqli_error($conecta)) ;
													
									 echo"<script language=javascript>alert('Pessoa Cadastrada com Sucesso!')</script>";

echo"<script language=javascript>location.href='pessoas.php'</script>";

 

}if(isset($_POST['voltar'])){

echo"<script language=javascript>location.href='adicionarpessoa.php'</script>";

}

								 

								



								

												

							

								 ?>
				</div>
				<!--end row-->
			</main>
       <!--end page main-->


       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        
        <!--start switcher-->
       <div class="switcher-body">
        <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
        <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
          </div>
          <div class="offcanvas-body">
            <h6 class="mb-0">Theme Variation</h6>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
              <label class="form-check-label" for="LightTheme">Light</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
              <label class="form-check-label" for="DarkTheme">Dark</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
              <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
            </div>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3">
              <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
            </div>
            <hr/>
            <h6 class="mb-0">Header Colors</h6>
            <hr/>
            <div class="header-colors-indigators">
              <div class="row row-cols-auto g-3">
                <div class="col">
                  <div class="indigator headercolor1" id="headercolor1"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor2" id="headercolor2"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor3" id="headercolor3"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor4" id="headercolor4"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor5" id="headercolor5"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor6" id="headercolor6"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor7" id="headercolor7"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor8" id="headercolor8"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
       <!--end switcher-->

  </div>
  <!--end wrapper-->

  <!-- Bootstrap bundle JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/js/pace.min.js"></script>
  <!--app-->
  <script src="assets/js/app.js"></script>
<script>
const replaceSpecialChars = (str) => {
	return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '') // Remove acentos

		.replace(/\-\-+/g, '-')	// Substitui multiplos hífens por um único hífen
		.replace(/(^-+|-+$)/, ''); // Remove hífens extras do final ou do inicio da string
}
function maiuscula(z){

        v = z.value.toUpperCase();

        z.value = replaceSpecialChars(v);
        

    }
function minuscula(z){

        v = z.value.toLowerCase();

        z.value = replaceSpecialChars(v);
        

    }    
    
 function maskcep(cep) {
 	if (cep.value.length == 2) { cep.value = cep.value +'.' ; }
 	if (cep.value.length == 6) { cep.value = cep.value + '-'; }

 }
document.getElementById('ckpai').onchange = function() {
    document.getElementById('pai').disabled = this.checked;
   
};
        $(document).ready(function() {
  function Formatcep(d){
    d=d.replace(/^(\d{2})(\d{3})(\d)/,"$1.$2-$3")
    return d
}


            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("Consultando...");
                        $("#bairro").val("Consultando...");
                        $("#cidade").val("Consultando...");
                        $("#uf").val("Consultando...");
                        $("#ibge").val("Consultando...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(replaceSpecialChars(dados.logradouro.toUpperCase()));
                                $("#bairro").val(replaceSpecialChars(dados.bairro.toUpperCase()));
                                $("#cidade").val(replaceSpecialChars(dados.localidade.toUpperCase()));
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                                document.getElementById("numero").focus();
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                         $("#cep").val(Formatcep(cep));
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    function esconderConjuge() {
   $('#conjuge').hide();
}
    function aparecerConjuge() {
                   $(function() {
    
  var conjuges = [
   <?php
   $selectconjuge = mysqli_query($conecta,"SELECT * FROM pessoa where status='ativo' and igreja_id=$igreja_id")or die(mysqli_error($conecta));
while($resultadoconjuge = mysqli_fetch_assoc($selectconjuge)){
echo '"'.utf8_encode($resultadoconjuge["nome"]." ".$resultadoconjuge["sobrenome"]).'",';
}   
   ?>
  ];

  
  $("#conjuge1" ).autocomplete({
    source: conjuges
  });
});
   $('#conjuge').show();
   $('#conjuge').setAttribute('required', 'required');
}
function showDiv(element)
{
    if ( element.value == 2 ){
        aparecerConjuge();
    }else{
        esconderConjuge();
    }
   
}
function onlynumber(evt) {
   var theEvent = evt || window.event;
   var key = theEvent.keyCode || theEvent.which;
   key = String.fromCharCode( key );
   //var regex = /^[0-9.,]+$/;
   var regex = /^[0-9.]+$/;
   if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
   }
}
</script>

  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
  <script type="text/javascript">$("#telefone").mask("(00) 0000.0000");</script>
    <script type="text/javascript">$("#telefone1").mask("(00) 9 0000.0000");</script>
      <script type="text/javascript">$("#telefone2").mask("(00) 9 0000.0000");</script>
   <script>
$(function() {
  var cidades = [
   <?php
   $selectcidades = mysqli_query($conecta,"SELECT * FROM cidades_brasileiras")or die(mysqli_error($conecta));
while($resultadocidades = mysqli_fetch_assoc($selectcidades)){
echo '"'.utf8_encode($resultadocidades["cidade"]).' - '.$resultadocidades["uf"].'",';
}   
   ?>
  ];
  $("#naturalidade" ).autocomplete({
    source: cidades
  });
});

$(function() {
  var maes = [
   <?php
   $selectmaes = mysqli_query($conecta,"SELECT * FROM pessoa where sexo='Feminino' and igreja_id=$igreja_id")or die(mysqli_error($conecta));
while($resultadomaes = mysqli_fetch_assoc($selectmaes)){
echo '"'.utf8_encode($resultadomaes["nome"]." ".$resultadomaes["sobrenome"]).'",';
}   
   ?>
  ];
  $("#mae" ).autocomplete({
    source: maes
  });
});
$(function() {
  var pais = [
   <?php
   $selectpais = mysqli_query($conecta,"SELECT * FROM pessoa where sexo='Masculino' and igreja_id=$igreja_id")or die(mysqli_error($conecta));
while($resultadopais = mysqli_fetch_assoc($selectpais)){
echo '"'.utf8_encode($resultadopais["nome"]." ".$resultadopais["sobrenome"]).'",';
}   
   ?>
  ];
  $("#pai" ).autocomplete({
    source: pais
  });
});
function formataCampo(campo, Mascara) {
    var er = /[^0-9/ (),.-]/;
    er.lastIndex = 0;

    if (er.test(campo.value)) {///verifica se é string, caso seja então apaga
        var texto = $(campo).val();
        $(campo).val(texto.substring(0, texto.length - 1));
    }
    var boleanoMascara;
    var exp = /\-|\.|\/|\(|\)| /g
    var campoSoNumeros = campo.value.toString().replace(exp, "");
    var posicaoCampo = 0;
    var NovoValorCampo = "";
    var TamanhoMascara = campoSoNumeros.length;
    for (var i = 0; i <= TamanhoMascara; i++) {
        boleanoMascara = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                || (Mascara.charAt(i) == "/"))
        boleanoMascara = boleanoMascara || ((Mascara.charAt(i) == "(")
                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "))
        if (boleanoMascara) {
            NovoValorCampo += Mascara.charAt(i);
            TamanhoMascara++;
        } else {
            NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
            posicaoCampo++;
        }
    }
    campo.value = NovoValorCampo;
    ////LIMITAR TAMANHO DE CARACTERES NO CAMPO DE ACORDO COM A MASCARA//
    if (campo.value.length > Mascara.length) {
        var texto = $(campo).val();
        $(campo).val(texto.substring(0, texto.length - 1));
    }
    //////////////
    return true;
}
function MascaraGenerica(seletor, tipoMascara) {
    setTimeout(function () {
        if (tipoMascara == 'CPFCNPJ') {
            if (seletor.value.length <= 14) { //cpf
                formataCampo(seletor, '000.000.000-00');
            } else { //cnpj
                formataCampo(seletor, '00.000.000/0000-00');
            }
        } else if (tipoMascara == 'DATA') {
            formataCampo(seletor, '00/00/0000');
        } else if (tipoMascara == 'CEP') {
            formataCampo(seletor, '00.000-000');
        } else if (tipoMascara == 'TELEFONE') {
            formataCampo(seletor, '(00) 0000.00000');
        }else if (tipoMascara == 'CELULAR') {
            formataCampo(seletor, '(00) 0 0000.0000');
        } else if (tipoMascara == 'INTEIRO') {
            MascaraInteiro(seletor);
        } else if (tipoMascara == 'FLOAT') {
            MascaraFloat(seletor);
        } else if (tipoMascara == 'CPF') {
            formataCampo(seletor, '000.000.000-00');
        } else if (tipoMascara == 'CNPJ') {
            formataCampo(seletor, '00.000.000/0000-00');
        } else if (tipoMascara == 'MOEDA') {
            MascaraMoeda(seletor);
        }
    }, 200);
}


</script>
</body>

</html>