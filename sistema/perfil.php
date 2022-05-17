<?php include("header.php");
$usuario=$dados["login"];
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
                    <li class="breadcrumb-item active text-white" aria-current="page">Perfil de Usuário</li>
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
                      <h5 class="mb-0">Minhas Informações</h5>
                      <hr>
                      <div class="card shadow-none border ">
                        <div class="card-header">
                          <h6 class="mb-0">Informações de Acesso</h6>
                        </div>
                        <div class="card-body row g-3">
                          
                             <div class="col-6">
                                <label class="form-label">Usuário</label>
                                <input type="text" class="form-control" value="<?php echo $usuario;?>" disabled>
                             </div>
                             <div class="col-6">
                              <label class="form-label">Endereço de Email</label>
                              <input type="email" name="email" class="form-control" value="<?php echo $dadospessoa["email"];?>">
                            </div>
                              
                         
                        </div>
                      </div>
                       <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">Informações Básicas</h6>
                        </div>
                        <div class="card-body row g-3">
                         
                             
                               <div class="col-6">
                              <label class="form-label">CPF</label>
                              <input type="text" class="form-control" value="<?php echo $dadospessoa["cpf"];?>"  disabled>
                            </div>
                             <div class="col-6">
                                <label class="form-label">Data de Nascimento</label>
                                <input type="text" class="form-control" value="<?php 
                                $date=date_create($dadospessoa["data_nascimento"]);
                                echo date_format($date,"d/m/Y");?>" disabled>
                             </div>
                            <div class="col-6">
                              <label class="form-label">RG</label>
                              <input type="text" class="form-control" value="<?php echo $dadospessoa["rg"];?>"  disabled>
                            </div>
                            <div class="col-6">
                              <label class="form-label">Org&atilde;o Emissor</label>
                              <input type="text" class="form-control" value="<?php echo $dadospessoa["orgao"];?>"  disabled>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Nacionalidade</label>
                                <input type="text" class="form-control" value="<?php echo $dadospessoa["nacionalidade"];?> " disabled>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Naturalidade</label>
                                <input type="text" class="form-control" name="naturalidade" value="<?php echo utf8_encode($dadospessoa["naturalidade"]);?>">
                            </div>
                            
                              <div class="col-6">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control"name="nome" value="<?php echo utf8_encode($dadospessoa["nome"]);?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" sobrenome="sobrenome" value="<?php echo utf8_encode($dadospessoa["sobrenome"]);?>">
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
                                <input type="text" class="form-control" id="cep" name="cep" value="<?php echo utf8_encode($dadospessoa["cep"]);?>" pattern="\[0-9]{2}\.[0-9]{3}-[0-9]{3}" />
                            </div>
                            <div class="col-8">
                              <label class="form-label">Logradouro</label>
                              <input type="text" class="form-control" name="logradouro" value="<?php echo utf8_encode($dadospessoa["logradouro"]);?>">
                             </div>
                              <div class="col-2">
                              <label class="form-label">Nº</label>
                              <input type="text" class="form-control" name="numero" value="<?php echo $dadospessoa["numero"];?>">
                             </div>
                             <div class="col-5">
                                <label class="form-label">Bairro</label>
                                <input type="text" class="form-control" name="bairro" value="<?php echo utf8_encode($dadospessoa["bairro"]);?>">
                             </div>
                             <div class="col-5">
                              <label class="form-label">Cidade</label>
                              <input type="text" class="form-control" name="cidade" value="<?php echo utf8_encode($dadospessoa["cidade"]);?>">
                            </div>
                               <div class="col-2">
                                <label class="form-label">UF</label>
                                <input type="text" class="form-control" name="uf" value="<?php echo $estadouf;?>">
                            </div>
                           
                            
                         
                        </div>
                      </div>
                       <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">CONTATO</h6>
                        </div>
                        <div class="card-body row g-3">
                          
                              
                            <div class="col-4">
                              <label class="form-label">Celular 01</label>
                              <input type="text" class="form-control" name="celular1" value="<?php echo $dadospessoa["celular1"];?>"/>
                             </div>
                              <div class="col-2">
                                  <br> <br>
                              <label class="form-label">&Eacute; Whatsapp?</label>
                              <input type="checkbox" id="wp1" name="cel1wp" <?php if($dadospessoa["cel1wp"]=='1'){echo 'checked';} ?>/>
                             
                             </div>
                             <div class="col-4">
                                <label class="form-label">Celular 02</label>
                                <input type="text" class="form-control" name="celular2" value="<?php echo $dadospessoa["celular2"];?>"/>
                             </div>
                             <div class="col-2">
                                  <br> <br>
                              <label class="form-label">&Eacute; Whatsapp?</label>
                              <input type="checkbox"  id="wp2" name="cel2wp" <?php if($dadospessoa["cel2wp"]==1){echo 'checked';} ?>/>
                            </div>
                             <div class="col-4">
                                <label class="form-label">Telefone Fixo</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $dadospessoa["telefone"];?>" />
                            </div>
                           
                            
                          
                        </div>
                      </div>
                      <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">INFORMA&Ccedil;&Otilde;ES ADICIONAIS</h6>
                        </div>
                     
                        <div class="card-body row g-3">
                          
                              	<div class="col-4">
                              	    <label class="form-label">Primeiros Passos</label>
                              	    <input type="date" class="form-control mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" min="1900-01-01" value="<?php echo $dadospessoa["dataprimeiropassos"];?>" data-bs-original-title="Insira a Data dos Primeiros Passos">
                              	   </div>
							        		<div class="col-4">
							        		    <label class="form-label">Batismo nas &Aacute;guas</label>
							        		    <input type="date" class="form-control mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" min="1900-01-01" value="<?php echo $dadospessoa["data_batismo"];?>" data-bs-original-title="Insira a Data do Batismo nas Águas">
							        		    </div>
							        			<div class="col-4">
							        			    <label class="form-label">Batismo no Esp&iacute;rito Santo</label>
							        			    <input type="date" class="form-control mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" min="1900-01-01" value="<?php echo $dadospessoa["databatismoespiritosanto"];?>" data-bs-original-title="Insira a Data do Batismo no Espírito Santo" >
							        			    </div>
                     
                            
                            
                          
                        </div>
                      </div>
                      <div class="text-start">
                          <input type="submit" class="btn btn-primary px-4" id="enviar" name="enviar" value="Salvar Alterações"> 
                        
                      </div>
                      </form>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-4">
                <div class="card shadow-sm border-0 overflow-hidden">
                  <div class="card-body">
                      <div class="profile-avatar text-center">
                          <img src="img/pessoas/<?php  if($dadospessoa["foto"]==""){
                                            
                                            echo "profile-pic.jpg";
                                            }else{
                                            echo $dadospessoa["foto"];
                                            
                                        }; ?>" class="rounded-circle shadow" width="120" height="120" alt="">
                      </div>
                      <div class="text-center mt-4">
                        <h4 class="mb-1"><?php echo utf8_encode($dadospessoa["nome"]." ".$dadospessoa["sobrenome"]);?></h4>
                      <?php if(($perfil=="Pastor Local") || ($perfil=="Pastor Regional") ){ ?>  <p class="mb-0 text-secondary"><?php echo $cargo;?></p>
                         
                      <hr>
                        <h6 class="mb-1">Credenciais Emitidas pela IDB</h6>
                  <?php } ?>
                      </div>
                      
                     
                     
                  </div>
                <?php if(($perfil=="Pastor Local") || ($perfil=="Pastor Regional") ){ ?>  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                      Licenciado - 00.000
                      <span class="badge bg-primary rounded-pill">01/01/2001</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                      Exortador - 00.000
                      <span class="badge bg-primary rounded-pill">01/01/2001</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                      Internacional - 49.069
                      <span class="badge bg-primary rounded-pill">07/07/2008</span>
                    </li>
                  </ul> <?php } ?>
                </div>
                <!-- Timeline Open -->
                <div class="card shadow-sm border-0 overflow-hidden">
              
             <?php if(($perfil=="Pastor Local") || ($perfil=="Pastor Regional") ){ ?>   <div class="container py-2">
							<h2 class="font-weight-light text-center text-muted py-3">Administra&ccedil;&otilde;es</h2>
							<!-- timeline item 1 -->
						
						<?php
							$jsonpastorigrejas = file_get_contents("https://sistemaidb.com.br/sistema/consulta.php?opcao=historicoigrejas&valor=".$pastor_id);
	$pastorigrejas= json_decode($jsonpastorigrejas);
	$totaligrejaspastor = count($pastorigrejas);
	if($totaligrejaspastor>0){
	    if($totaligrejaspastor==1){
	    echo'	<div class="row">
								<!-- timeline item 1 left dot -->
								<div class="col-auto text-center flex-column d-none d-sm-flex">
									<div class="row h-50">
										<div class="col">&nbsp;</div>
										<div class="col">&nbsp;</div>
									</div>
									<h5 class="m-2">
									<span class="badge rounded-pill bg-primary">&nbsp;</span>
								</h5>
									<div class="row h-50">
										<div class="col border-end">&nbsp;</div>
										<div class="col">&nbsp;</div>
									</div>
								</div>
								<!-- timeline item 1 event content -->
								<div class="col py-2">
									<div class="card border-primary shadow radius-15">
										<div class="card-body">
											<div class="float-end text-muted"></div>
											<h4 class="card-title text-primary">'.$pastorigrejas[0]->apelido.'</h4>
											<p class="card-text">'.mes_extenso(date( 'm', strtotime( $pastorigrejas[0]->dt_inicio ) )).' de '.date( 'Y', strtotime( $pastorigrejas[0]->dt_inicio ) ).' - ';
											if(empty($pastorigrejas[0]->dt_final)){
											    echo "o momento";
											}
											
											echo '</p>
										</div>
									</div>
								</div>
							</div>
	    ';
	    }else{
	    echo'	<div class="row">
								<!-- timeline item 1 left dot -->
								<div class="col-auto text-center flex-column d-none d-sm-flex">
									<div class="row h-50">
										<div class="col">&nbsp;</div>
										<div class="col">&nbsp;</div>
									</div>
									<h5 class="m-2">
									<span class="badge rounded-pill bg-primary">&nbsp;</span>
								</h5>
									<div class="row h-50">
										<div class="col border-end">&nbsp;</div>
										<div class="col">&nbsp;</div>
									</div>
								</div>
								<!-- timeline item 1 event content -->
								<div class="col py-2">
									<div class="card border-primary shadow radius-15">
										<div class="card-body">
											<div class="float-end text-muted"></div>
											<h4 class="card-title text-primary">'.$pastorigrejas[0]->apelido.'</h4>
											<p class="card-text">'.mes_extenso(date( 'm', strtotime( $pastorigrejas[0]->dt_inicio ) )).' de '.date( 'Y', strtotime( $pastorigrejas[0]->dt_inicio ) ).' - ';
											if(empty($pastorigrejas[0]->dt_final)){
											    echo "o momento";
											}else{
											    
											    echo mes_extenso(date( 'm', strtotime( $pastorigrejas[0]->dt_final ) )).' de '.date( 'Y', strtotime( $pastorigrejas[0]->dt_final ) );
											}
											
											echo '</p>
										</div>
									</div>
								</div>
							</div>
	    ';	        
	     $i=1;   
	while($i<$totaligrejaspastor){
	    echo '
	    <div class="row">
								<div class="col-auto text-center flex-column d-none d-sm-flex">
									<div class="row h-50">
										<div class="col border-end">&nbsp;</div>
										<div class="col">&nbsp;</div>
									</div>
									<h5 class="m-2">
									<span class="badge rounded-pill bg-light border">&nbsp;</span>
								</h5>
									<div class="row h-50">
										<div class="col border-end">&nbsp;</div>
										<div class="col">&nbsp;</div>
									</div>
								</div>
								<div class="col py-2">
									<div class="card radius-15">
										<div class="card-body">
											
											<h4 class="card-title   text-muted">'.$pastorigrejas[$i]->apelido.'</h4>
											<p class="card-text">'.mes_extenso(date( 'm', strtotime( $pastorigrejas[$i]->dt_inicio ) )).' de '.date( 'Y', strtotime( $pastorigrejas[$i]->dt_inicio ) ).' - ';
											if(empty($pastorigrejas[$i]->dt_final)){
											    echo "o momento";
											}else{
											    
											    echo mes_extenso(date( 'm', strtotime( $pastorigrejas[$i]->dt_final ) )).' de '.date( 'Y', strtotime( $pastorigrejas[$i]->dt_final ) );
											}
											
											echo '</p>
											
										</div>
									</div>
								</div>
							</div>
	    
	    
	    
	    ';
	    
	    $i++;
	}        
	        
	    }
	}
						
						
						?>
						

						</div>
							<?php } ?>
						
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

        <script type="text/javascript">$("#cep").mask("00.000-000");</script>




</html>