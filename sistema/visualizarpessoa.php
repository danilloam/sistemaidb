<?php include("header.php");

$igreja_id=$_GET["ig"];
$idmembro=$_GET["id"];



if(($perfil=="Pastor Local") || ($perfil=="Secretaria Local") || ($perfil=="Lider")){

$sql=mysqli_query($conecta,"select * from pessoa where id=$idmembro and igreja_id=$igreja_id");

}else{
    
$sql=mysqli_query($conecta,"select * from pessoa where id=$idmembro");    
    
}

$ver=mysqli_fetch_array($sql);


$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE id=$ver[estado]")or die(mysqli_error($conecta));

$dadosestado = mysqli_fetch_array($selectestado);

$estado_nome=$dadosestado["descricao"];



?>
<body>


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
          <?php include("menu.php");?>
          <!--end navigation-->
       </aside>
       <!--end sidebar -->

       <!--start content-->
          <main class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center">
              <div class="breadcrumb-title pe-3 text-white">Páginas</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt text-white"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="pessoas.php">Pessoas</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Visualizar Cadastro de Pessoa</li>
                  </ol>
                </nav>
              </div>
              
            </div>
            <!--end breadcrumb-->
           
            <div class="profile-cover bg-dark"></div>

            <div class="row">
              <div class="col-12 col-lg-8">
                <div class="card shadow-sm border-0">
                  <div class="card-body">
                      <form method="post" action="">
    <?php if($ver["funcao"]=="Pastor"){
                             echo '<center><h5>O cadastro de Pastor só pode ser editado pelo Escritório Regional</h5></center>';} ?>  
       <?php if($ver["funcao"]=="Evangelista"){
                             echo '<center><h5>O cadastro de Evangelista só pode ser editado pelo Escritório Regional</h5></center>';} ?>                
                      <hr>
                     
                       <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">Informações Básicas</h6>
                        </div>
                        <div class="card-body row g-3">
                         
                             
                               
                             <div class="col-4">
                                <label class="form-label">Data de Nascimento</label>
                                <input type="text" class="form-control"name="nascimento" value="<?php 
                                $date=date_create($ver["data_nascimento"]);
                                echo date_format($date,"d/m/Y");?>"  <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>>
                             </div>
                            
                            <div class="col-4">
                                <label class="form-label">Nacionalidade</label>
                                <input type="text" class="form-control" name="nacionalidade" value="<?php echo $ver["nacionalidade"];?> "  <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Naturalidade</label>
                                <input type="text" class="form-control" name="naturalidade" id="naturalidade" value="<?php echo utf8_encode($ver["naturalidade"]);?>" <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>>
                            </div>
                            
                              <div class="col-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control"name="nome" value="<?php echo utf8_encode($ver["nome"]);?>" <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" name="sobrenome" value="<?php echo utf8_encode($ver["sobrenome"]);?>" <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>>
                            </div>
                            <div class="col-3">
                                <label class="form-label">Sexo</label>
                                <select class="form-select mb-3" name="sexo" aria-label="Default select example">
								
									<option value="Masculino" <?php if($ver["sexo"]=="Masculino"){echo 'selected=""';}?>>Masculino</option>
									<option value="Feminino"<?php if($ver["sexo"]=="Feminino"){echo 'selected=""';}?>>Feminino</option>
							
								</select>
                            </div>
                                <div class="col-6"> 
						           <select class="form-select mb-3" aria-label="Default select example" name="escolaridade" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Selecione o nível de Ensino que a pessoa possui" required>
 			      	            <option value="">Escolaridade</option>
                             	<option value="1" <?php if($ver["escolaridade"]=="1"){echo 'selected=""';}?>>Fundamental incompleto</option>
                             	<option value="2"<?php if($ver["escolaridade"]=="2"){echo 'selected=""';}?>>Fundamental completo</option>
                              	<option value="3"<?php if($ver["escolaridade"]=="3"){echo 'selected=""';}?>>Médio incompleto</option>
                              	<option value="4"<?php if($ver["escolaridade"]=="4"){echo 'selected=""';}?>>Médio completo</option>
                             	<option value="5"<?php if($ver["escolaridade"]=="5"){echo 'selected=""';}?>>Superior incompleto</option>
                              	<option value="6"<?php if($ver["escolaridade"]=="6"){echo 'selected=""';}?>>Superior completo</option>
								</select>
								</div>
								<div class="col-6">
								<select class="form-select mb-3" aria-label="Default select example" name="ecivil" onchange="showDiv(this)" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Informe o status Civil da pessoa" required>
 		                		<option value="">Estado Civil</option>
                                <option value="1"<?php if($ver["ecivil"]=="1"){echo 'selected=""';}?>>Solteiro(a)</option>
                                <option value="2"<?php if($ver["ecivil"]=="2"){echo 'selected=""';}?>>Casado(a)</option>
                                <option value="3"<?php if($ver["ecivil"]=="3"){echo 'selected=""';}?>>Viúvo(a)</option>
                                <option value="4"<?php if($ver["ecivil"]=="4"){echo 'selected=""';}?>>Divorciado(a)</option>
								</select>
								</div>
                       
                        </div>
                      </div>
                      <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">ENDERE&Ccedil;O</h6>
                        </div>
                        <div class="card-body row g-3">
                         
                              <div class="col-2">
                                <label class="form-label">CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep" onKeyPress="maskcep(this);" value="<?php echo utf8_encode($ver["cep"]);?>"  <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>/>
                            </div>
                            <div class="col-8">
                              <label class="form-label">Logradouro</label>
                              <input type="text" class="form-control" name="logradouro" id="rua" value="<?php echo utf8_encode($ver["logradouro"]);?> "<?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>>
                             </div>
                              <div class="col-2">
                              <label class="form-label">Nº</label>
                              <input type="text" class="form-control" name="numero" value="<?php echo $ver["numero"];?> "<?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>>
                             </div>
                             <div class="col-5">
                                <label class="form-label">Bairro</label>
                                <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo utf8_encode($ver["bairro"]);?> "<?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>>
                             </div>
                             <div class="col-5">
                              <label class="form-label">Cidade</label>
                              <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo utf8_encode($ver["cidade"]);?>" <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>>
                            </div>
                               <div class="col-2">
                                <label class="form-label">UF</label>
                                <input type="text" class="form-control" name="uf" id="uf" value="<?php echo $estadouf;?>" <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>>
                            </div>
                           
                            
                         
                        </div>
                      </div>
                       <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">CONTATO</h6>
                        </div>
                        <div class="card-body row g-3">
                          
                                                            <div class="col-6">
                                <label class="form-label">Facebook</label>
                                <input type="text" class="form-control" name="facebook" value="<?php echo $ver["facebook"];?>" />
                            </div>
                            <div class="col-6">
                              <label class="form-label">Instagram</label>
                              <input type="text" class="form-control" name="instagram" value="<?php echo $ver["instagram"];?> ">
                             </div>
                            <div class="col-4">
                              <label class="form-label">Celular 01</label>
                              <input type="text" class="form-control" name="celular1" value="<?php echo $ver["celular1"];?>" <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>/>
                             </div>
                              <div class="col-2">
                                  <br> <br>
                              <label class="form-label">&Eacute; Whatsapp?</label>
                              <input type="checkbox" id="wp1" name="cel1wp" <?php if($ver["cel1wp"]=='1'){echo 'checked';} ?> <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>/>
                             
                             </div>
                             <div class="col-4">
                                <label class="form-label">Celular 02</label>
                                <input type="text" class="form-control" name="celular2" value="<?php echo $ver["celular2"];?>" <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>/>
                             </div>
                             <div class="col-2">
                                  <br> <br>
                              <label class="form-label">&Eacute; Whatsapp?</label>
                              <input type="checkbox"  id="wp2" name="cel2wp" <?php if($ver["cel2wp"]==1){echo 'checked';} ?> <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>/>
                            </div>
                             <div class="col-4">
                                <label class="form-label">Telefone Fixo</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $ver["telefone"];?>"  <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>/>
                            </div>
                           

                          
                        </div>
                      </div>
                      <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">INFORMA&Ccedil;&Otilde;ES ADICIONAIS</h6>
                        </div>
                     
                        <div class="card-body row g-3">
                            <div class="row g-4">
							        <div class="col-3">
							            <label class="form-label">Tipo de Cadastro:</label>
							        <select id="heard" class="form-control  mb-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Selecione o tipo de Cadastro" name="funcao" required>
                              <option value="">Arrolamento</option>
                              <option value="Membro"<?php if($ver["funcao"]=="Membro"){echo 'selected=""';}?>>Membro</option>
                              <option value="Congregado"<?php if($ver["funcao"]=="Congregado"){echo 'selected=""';}?>>Congregado</option>
                              <option value="tim"<?php if($ver["funcao"]=="Novo Convertido"){echo 'selected=""';}?>>Novo Convertido</option>
                              <option value="tim"<?php if($ver["funcao"]=="Visitante"){echo 'selected=""';}?>>Visitante</option>
                              <option value="oi"<?php if($ver["funcao"]=="Criança"){echo 'selected=""';}?>>Crian&ccedil;a</option>
                               <option value="oi"<?php if($ver["funcao"]=="Pastor"){echo 'selected=""';}?>>Pastor</option>
                                <option value="oi"<?php if($ver["funcao"]=="Evangelista"){echo 'selected=""';}?>>Evangelista</option>
                              <option value="nextel"<?php if($ver["funcao"]=="Afastado"){echo 'selected=""';}?>>Afastado</option>
                              <option value="algar"<?php if($ver["funcao"]=="Desativado"){echo 'selected=""';}?>>Desativado</option>
                            </select></div>
							        	<div class="col-3"><label class="form-label">Primeiros Passos</label><input type="date" class="form-control mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" min="1900-01-01" data-bs-original-title="Insira a Data dos Primeiros Passos" ></div>
							        		<div class="col-3"><label class="form-label">Batismo nas &Aacute;guas</label><input type="date" class="form-control mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" min="1900-01-01" data-bs-original-title="Insira a Data do Batismo nas Águas" ></div>
							        			<div class="col-3"><label class="form-label">Batismo no Esp. Santo</label><input type="date" class="form-control mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" min="1900-01-01" data-bs-original-title="Insira a Data do Batismo no Espírito Santo" ></div>
                     
                           <div class="col-12"><label class="form-label">Coment&aacute;rio interno do cadastro</label><textarea class="form-control mb-3" onkeyup="maiuscula(this)" placeholder="Coloque aqui os comentários referênte a este cadastro"></textarea></div>
							    </div>
                          
                     
                            
                            
                          
                        </div>
                      </div>
                      <div class="text-start">
                          <input type="submit" class="btn btn-primary px-4" id="enviar" name="ok" value="Salvar Alterações" <?php if(($ver["funcao"]=="Pastor") || ($ver["funcao"]=="Evangelista")){
                             echo 'disabled';} ?>> 
                        
                      </div>
                      </form>
                      
                      
							<?php 



							if(isset($_POST['ok'])){

$nome=utf8_decode(anti_injection($_POST["nome"]));
$sobrenome=utf8_decode(anti_injection($_POST["sobrenome"]));
$nascimento=anti_injection($_POST["nascimento"]);
$sexo=anti_injection($_POST["sexo"]);
$ecivil=anti_injection($_POST["ecivil"]);
$escolaridade=anti_injection($_POST["escolaridade"]);
$conjuge=utf8_decode(anti_injection($_POST["conjuge"]));
$casamento=anti_injection($_POST["casamento"]);
$naturalidade=utf8_decode(anti_injection($_POST["naturalidade"]));
$nacionalidade=utf8_decode(anti_injection($_POST["nacionalidade"]));
$mae=utf8_decode(anti_injection($_POST["mae"]));
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
$ppassos=anti_injection($_POST["ppassos"]);
$batismoaguas=anti_injection($_POST["batismoaguas"]);
$batismoespirito=anti_injection($_POST["batismoespirito"]);
$facebook=anti_injection($_POST["facebook"]);
$instagram=anti_injection($_POST["instagram"]);

$funcao=utf8_decode(anti_injection($_POST["funcao"]));
if($funcao=="Desativado"){
    
    	$inserir = mysqli_query($conecta,"UPDATE pessoa SET ativo=0  where id={$idmembro}") or die (mysqli_error($conecta));

								 echo"<script language=javascript>alert('Cadastro Desativado com Sucesso!')</script>";

echo"<script language=javascript>location.href='visualizarpessoa.php?ig=$igreja_id&id=$idmembro'</script>";

}else if($funcao=="Visitante" || $funcao=="Congregado" || $funcao=="Criança" || $funcao=="Afastado"){
	$membro=0;
}else{
	$membro=1;
}
								
if($libera=0){
if(empty($nome)){
echo "<p>O Campo Nome &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($sobrenome)){
echo "<p>O Campo Sobrenome &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($nascimento)){
echo "<p>O Campo Data de Nascimento &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($sexo)){
echo "<p>O Campo Sexo &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($ecivil)){
echo "<p>O Campo Estado Civil &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($escolaridade)){
echo "<p>O Campo Escolaridade &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($naturalidade)){
echo "<p>O Campo Naturalidade &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($nacionalidade)){
echo "<p>O Campo nacionalidade &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($mae)){
echo "<p>O Campo M&atilde;e &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($cep)){
echo "<p>O Campo CEP &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($logradouro)){
echo "<p>O Campo Logradouro &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($numero)){
echo "<p>O Campo N&uacute;mero &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($bairro)){
echo "<p>O Campo Bairro &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($cidade)){
echo "<p>O Campo Cidade &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}else if(empty($uf)){
echo "<p>O Campo UF &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
} else if(empty($funcao)){
echo "<p>O Campo Fun&ccedil;&atilde;o &eacute; necess&aacute;rio! <a href='javascript:history.back()'>Voltar</a></p>";
}

}
else

								{							    
if($uf==$estadouf){
    $estadoenvio=$estado_id;
    
}else{
    $selectestado = mysqli_query ($conecta, "SELECT * FROM estado WHERE uf ='". $estadouf."'") or die (mysqli_error ($conecta));

$dadosestado = mysqli_fetch_array ($selectestado);
$estadoenvio = $dadosestado["id"];

}
if($wp1==""){
    $wp1=0;
}
if($wp2==""){
    $wp2=0;
}
$datamodificacao=date("d/m/Y");

	$inserir = mysqli_query($conecta,"UPDATE pessoa SET `dataNascimento`='$nascimento',`dataprimeiropassos`='$ppassos',`data_batismo`='$batismoaguas',`databatismoespiritosanto`='$batismoespirito',`dataCasamento`='$casamento',`bairro`='$bairro',`cep`='$cep',`cidade`='$cidade',`email`='$email',`estado`=$estadoenvio,`logradouro`='$logradouro',`numero`='$numero',`telefone`='$telefone',`celular1`='$celular1',`opercel1`='$opercel1',`cel1wp`=$wp1,`celular2`='$celular2',`opercel2`='$opercel2',`cel2wp`=$wp2,`nome`='$nome',`sobrenome`='$sobrenome',`sexo`='$sexo',`ecivil`='$ecivil',`escolaridade`='$escolaridade',`naturalidade`='$naturalidade',`nacionalidade`='$nacionalidade',`nomemae`='$mae',`nomepai`='$pai',`conjuge`='$conjuge',`funcao`='$funcao',`membro`=$membro,`facebook`='$facebook',`instagram`='$instagram',`regiao_id`=$regiao_id,`igreja_id`=$igreja_id , data_modificacao='$datamodificacao' where id={$idmembro}") or die (mysqli_error($conecta));

								 echo"<script language=javascript>alert('Cadastro Alterado com Sucesso!')</script>";

echo"<script language=javascript>location.href='visualizarpessoa.php?ig=$igreja_id&id=$idmembro'</script>";

								}

															

							}if(isset($_POST['voltar'])){

echo"<script language=javascript>location.href='visualizarpessoa.php?ig=$igreja_id&id=$idmembro'</script>";

}

								 ?>                      
                      
                      
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-4">
                <div class="card shadow-sm border-0 overflow-hidden">
                  <div class="card-body">
                      <div class="profile-avatar text-center">
                          <img src="img/pessoas/<?php 
									if($ver["foto"]==""){
									echo "profile-pic.jpg";
									}else{
										echo $ver["foto"];
										}?>" class="rounded-circle shadow" width="120" height="120" alt="">
                      </div>
                      </br>
                      <center><a href="carregarfoto.php?ig=<?php echo ($ver["igreja_id"]."&id=".$ver["id"]);?>" data-toggle="modal"><i class="icon-picture"></i> Editar Foto</a></center>
                      <div class="text-center mt-4">
                        <h4 class="mb-1"><?php echo utf8_encode($ver["nome"]." ".$ver["sobrenome"]);?></h4>
                       <p class="mb-0 text-secondary"></p>
                         
                      <hr>
                      
                      <?php if(($ver["facebook"]<>"") || ($ver["instagram"]<>"")){?>  <h6 class="mb-1">Redes Sociais</h6> <?php } ?>
                 
                      </div>
                      
                     
                     
                  </div>
                <ul class="list-group list-group-flush">
                   
                  	<?php if($ver["facebook"]<>""){?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top"><a href="
										<?php	echo "https://www.facebook.com/".$ver["facebook"];?>" target="_blank"><i class="lni lni-facebook-original"></i> <?php echo $ver["facebook"];?></a></li>
                                  <?php } 
                                  
                                  if($ver["instagram"]<>""){ ?>
                                
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top"><a href="<?php if($ver["instagram"]==""){echo "javascript:void(0)";}else{echo "https://www.instagram.com/".$ver["instagram"];}?>"target="_blank"><i class="lni lni-instagram"></i> @<?php echo $ver["instagram"]; ?></a></li>
                                <?php } ?>
                  
               
                  </ul> 
                </div>
                <!-- Timeline Open -->
                <div class="card shadow-sm border-0 overflow-hidden">
              
             <div class="container py-2">
							<h2 class="font-weight-light text-center text-muted py-3"><i class="lni lni-network"></i> FAM&Iacute;LIA</h2>
							<!-- timeline item 1 -->
						
			 
	               <ul class="list-group list-group-flush mt-3">
                  		     
			                        										
<?php	

$membros1busca = mysqli_query($conecta,"
SELECT * FROM arvore_genealogica a inner join pessoa p on a.pessoa_ant=p.id WHERE a.pessoa_id=$idmembro");
	while($resultadomembros1 = mysqli_fetch_array($membros1busca)){
  $idade= calcularIdade($resultadomembros1['data_nascimento']);
echo "<a href='visualizarpessoa.php?ig=".$igreja_id."&id=".$resultadomembros1['id']."'>";
?>

 <li class="list-group-item">
                           <div class="d-flex align-items-center gap-2">
                              <div><?php 
                           
                           $nomeaniversariante=$resultadomembros1['nome']." ".$resultadomembros1['sobrenome'];
                            $partesaniversariantes = explode(' ', $nomeaniversariante);
                             $primeiroNomeaniversariante = array_shift($partesaniversariantes);
                            $ultimoNomeaniversariante = array_pop($partesaniversariantes);
                           
                           echo utf8_encode( $primeiroNomeaniversariante." ".$ultimoNomeaniversariante);	?></div>
                              <div class="ms-auto"><?php echo utf8_encode($resultadomembros1['parentesco']); ?></div>
                           </div>
                           
<div class="d-flex align-items-center gap-3 customer-list-item">
                         <img src="img/pessoas/<?php  if($resultadomembros1["foto"]==""){
                                            
                                            echo "profile-pic.jpg";
                                            }else{
                                            echo $resultadomembros1["foto"];
                                            
                                        }; ?>" class="rounded-circle" width="50" height="50" alt="">
                         <div>
                           <h6 class="mb-0"></h6>
                           <p class="mb-0 font-13"><?php 

if($resultadomembros1["celular1"]<>""){
													 echo  $resultadomembros1["celular1"];
													}
													if($resultadomembros1["celular2"]<>""){
													 echo  " / ".$resultadomembros1["celular2"];
													}
																										if($resultadomembros1["telefone"]<>""){
													 echo  " / ".$resultadomembros1["telefone"];
													}
?></p>
                         </div>
                          <div class="d-flex align-items-center gap-3 fs-6 ms-auto">
                            <i class="lni lni-cake"></i>

                            <?php echo "(".$idade.")";?>
                          </div>
                       </div>
                         </li></a>


<?php	
	
	}
?>
                    
			     
                        </ul>   
                     
                

						</div>
					
						
						</div>
						
						
						
						
						
	
              
              
                
  
                
              </div><!-- Timeline Close -->
            </div><!--end row-->

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








</body>
    
        <script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
        <script src="assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <script src="assets/js/pace.min.js"></script>
        <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
        <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/fontawesome/js/all.js">
        <!--app-->
        <script src="assets/js/app.js"></script>



       <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!--plugins-->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
       
        <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


 <script>
   
$(function() {
  var cidades = [
   <?php
   $selectcidades = mysqli_query($conecta,"SELECT * FROM cidades_brasileiras")or die(mysqli_error($conecta));
while($resultadocidades = mysqli_fetch_assoc($selectcidades)){
echo '"'. mb_strtoupper($resultadocidades["cidade"].' - '.$resultadocidades["uf"], "UTF-8").'",';
}   
   ?>
  ];
  $("#naturalidade" ).autocomplete({
    source: cidades
  });
});
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
                                $("#rua").val(dados.logradouro.toUpperCase());
                                $("#bairro").val(dados.bairro.toUpperCase());
                                $("#cidade").val(dados.localidade.toUpperCase());
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                                
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
            }
            

            
            );
  });
</script>


</html>