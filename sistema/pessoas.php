<?php include("header.php");

	$jsonpessoas = file_get_contents("https://sistemaidb.com.br/sistema/consulta.php?opcao=pessoas&valor=".$igreja_id);
	$pessoas= json_decode($jsonpessoas);
	$totalpessoas = count($pessoas);
	$totalpessoas1=$totalpessoas;
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
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Cadastro</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Pessoas</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
						<a href="adicionarpessoa.php">	<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Cadastro</button></a>
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
			
				
				<h6 class="mb-0 text-uppercase">Pessoas Cadastradas</h6>
				<hr/>
				
					<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Nome</th>
							            <th>Idade</th>
							            <th>Telefone</th>
							            <th>Função</th>
							            <th>Sexo</th>
							            <th></th>
									</tr>
								</thead>
								<tbody>
									<?php
                                 $i = 0 ;
                                 
                                 while ($i<$totalpessoas){
                                     $dataNascimento = $pessoas[$i]->data_nascimento;
                                  echo "<tr>
                                  
                                  <td>".$pessoas[$i]->nome."</td>
                                 <td>";
                                  
                                 if($pessoas[$i]->idade){
                                     echo date( 'd/m', strtotime( $pessoas[$i]->data_nascimento ) )." (".$pessoas[$i]->idade.")";
                                     
                                 }
                                  
                                  echo "</td>
                                  <td>".$pessoas[$i]->celular1."</td>
                                  <td>".$pessoas[$i]->funcao."</td>
                                   <td>".$pessoas[$i]->sexo."</td>
<td><a href='visualizarpessoa.php?ig=".$igreja_id."&id=".$pessoas[$i]->id."'><button class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-eye'><path d='M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z'></path><circle cx='12' cy='12' r='3'></circle></svg></button></a></td>

                                  </tr>"  ;
                        
                                  $i++;   
                                 }
                                 ?>
								</tbody>
								<tfoot>
									<tr>
										<th>Nome</th>
							            <th>Idade</th>
							            <th>Telefone</th>
							            <th>Função</th>
							            <th>Sexo</th>
							            <th></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
									
		
				
				</div>
				
				

				
				
				
				
				
				
				
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


      <script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
        <script src="assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <script src="assets/js/pace.min.js"></script>
        <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
        <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
         <script src="assets/js/table-datatable.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/fontawesome/js/all.js">
        <!--app-->
        <script src="assets/js/app.js"></script>
 
  
  
  
</body>

</html>