<?php
include("header.php");
$dt = new DateTime("now");
$datas = array( $dt->format('m/Y') );
for ($i = 11; $i > 0; $i--) {
    $dt->modify('-1 month');

    $datas[] = $dt->format('m/Y');
}


      
    $t=0;
while($t<count($datas)){
    $partes = explode("/", $datas[$t]);
$mes_data = $partes[0];
$ano_data = $partes[1];

    $query_entradas_dizimos =mysqli_query($conecta,"SELECT MONTH(data) AS `mes`,SUM(`valor`) as total FROM   caixa_igreja where caixa_base_id=1 and tipo='entrada' and igreja_id=".$igreja_id." and MONTH(data)='".$mes_data."' and YEAR(data)='".$ano_data."'  GROUP  BY YEAR(`data`), MONTH(`data`)") or die(mysqli_error($conecta));
    $resultadoentradasdizimos = mysqli_fetch_assoc($query_entradas_dizimos);
    $qtdreceitasdizimos[$t]= number_format($resultadoentradasdizimos["total"], 2, '.', '');
    
    $query_entradas_ofertas =mysqli_query($conecta,"SELECT MONTH(data) AS `mes`,SUM(`valor`) as total FROM   caixa_igreja where caixa_base_id=2 and tipo='entrada' and igreja_id=".$igreja_id." and MONTH(data)='".$mes_data."' and YEAR(data)='".$ano_data."'  GROUP  BY YEAR(`data`), MONTH(`data`)") or die(mysqli_error($conecta));
    $resultadoentradasofertas = mysqli_fetch_assoc($query_entradas_ofertas);
    $qtdreceitasofertas[$t]= number_format($resultadoentradasofertas["total"], 2, '.', '');
   
    $query_entradas_visao =mysqli_query($conecta,"SELECT MONTH(data) AS `mes`,SUM(`valor`) as total FROM   caixa_igreja where caixa_base_id=3 and tipo='entrada' and igreja_id=".$igreja_id." and MONTH(data)='".$mes_data."' and YEAR(data)='".$ano_data."'  GROUP  BY YEAR(`data`), MONTH(`data`)") or die(mysqli_error($conecta));
    $resultadoentradasvisao = mysqli_fetch_assoc($query_entradas_visao);
    $qtdreceitasvisao[$t]= number_format($resultadoentradasvisao["total"], 2, '.', ''); 
      
    $query_entradas_construcao =mysqli_query($conecta,"SELECT MONTH(data) AS `mes`,SUM(`valor`) as total FROM   caixa_igreja where caixa_base_id=4 and tipo='entrada' and igreja_id=".$igreja_id." and MONTH(data)='".$mes_data."' and YEAR(data)='".$ano_data."'  GROUP  BY YEAR(`data`), MONTH(`data`)") or die(mysqli_error($conecta));
    $resultadoentradasconstrucao = mysqli_fetch_assoc($query_entradas_construcao);
    $qtdreceitasconstrucao[$t]= number_format($resultadoentradasconstrucao["total"], 2, '.', ''); 
        
    $query_entradas_outros =mysqli_query($conecta,"SELECT MONTH(data) AS `mes`,SUM(`valor`) as total FROM   caixa_igreja where caixa_base_id=5 and tipo='entrada' and igreja_id=".$igreja_id." and MONTH(data)='".$mes_data."' and YEAR(data)='".$ano_data."'  GROUP  BY YEAR(`data`), MONTH(`data`)") or die(mysqli_error($conecta));
    $resultadoentradasoutros = mysqli_fetch_assoc($query_entradas_outros);
    $qtdreceitasoutros[$t]= number_format($resultadoentradasoutros["total"], 2, '.', ''); 
    
    $query_entradas_especiais =mysqli_query($conecta,"SELECT MONTH(data) AS `mes`,SUM(`valor`) as total FROM   caixa_igreja where caixa_base_id=6 and tipo='entrada' and igreja_id=".$igreja_id." and MONTH(data)='".$mes_data."' and YEAR(data)='".$ano_data."'  GROUP  BY YEAR(`data`), MONTH(`data`)") or die(mysqli_error($conecta));
    $resultadoentradasespeciais = mysqli_fetch_assoc($query_entradas_especiais);
    $qtdreceitasespeciais[$t]= number_format($resultadoentradasespeciais["total"], 2, '.', ''); 
          
          
     $query_entradas_departamentos =mysqli_query($conecta,"SELECT MONTH(data) AS `mes`,SUM(`valor`) as total FROM   caixa_departamento where tipo='entrada' and igreja_id=".$igreja_id." and MONTH(data)='".$mes_data."' and YEAR(data)='".$ano_data."'  GROUP  BY YEAR(`data`), MONTH(`data`)") or die(mysqli_error($conecta));
    $resultadoentradasdepartamentos = mysqli_fetch_assoc($query_entradas_departamentos);
    $qtdreceitasdepartamentos[$t]= number_format($resultadoentradasdepartamentos["total"], 2, '.', ''); 
               
     
     
     
     $query_entradas =mysqli_query($conecta,"SELECT MONTH(data) AS `mes`,SUM(`valor`) as total FROM   caixa_igreja where tipo='entrada' and igreja_id=".$igreja_id." and MONTH(data)='".$mes_data."' and YEAR(data)='".$ano_data."'  GROUP  BY YEAR(`data`), MONTH(`data`)") or die(mysqli_error($conecta));
    $resultadoentradas = mysqli_fetch_assoc($query_entradas);
    $qtdreceitas[$t]= number_format($resultadoentradas["total"], 2, '.', ''); 
     
      
     $query_saidas =mysqli_query($conecta,"SELECT MONTH(data) AS `mes`,SUM(`valor`) as total FROM   caixa_igreja where tipo='saida' and igreja_id=".$igreja_id." and MONTH(data)='".$mes_data."' and YEAR(data)='".$ano_data."'  GROUP  BY YEAR(`data`), MONTH(`data`)") or die(mysqli_error($conecta));
    $resultadosaidas = mysqli_fetch_assoc($query_saidas);
    $qtddespesas[$t]= number_format($resultadosaidas["total"], 2, '.', ''); 
    
     $t++;
}

?>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
    <header class="top-header">        
   <?php include("top.php"); ?>
    </header>
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

             <div class="row">
               <div class="col-12 col-lg-8 col-xl-8">
                 <div class="card radius-10">
                   <div class="card-body">
                    <div class="row row-cols-1 row-cols-lg-2 g-3 align-items-center">
                      <div class="col">
                        <h5 class="mb-0">Daily Time Log Activity</h5>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center justify-content-sm-end gap-3 cursor-pointer">
                           <div class="font-13"><i class="bi bi-circle-fill text-primary"></i><span class="ms-2">Today</span></div>
                           <div class="font-13"><i class="bi bi-circle-fill text-success"></i><span class="ms-2">Yestreday</span></div>
                        </div>
                      </div>
                   </div>
                   <div id="chart1"></div>
                   </div>
                 </div>
               </div>
               <div class="col-12 col-lg-4 col-xl-4">
                <div class="card radius-10">
                  <div class="card-body">
                    <div class="row g-3 align-items-center">
                      <div class="col">
                        <h5 class="mb-0">Weekly Invoices</h5>
                      </div>
                    </div>
                    <div id="chart2"></div>
                  </div>
                </div>
               </div>
             </div><!--end row-->

             <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 row-cols-xl-3 row-cols-xxl-6">
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3 bg-light-primary text-primary">
                      <i class="bi bi-chat-left-fill"></i>
                    </div>
                    <p class="mb-0">Task Completed</p>
                    <h3 class="mt-4 mb-0">27</h3>
                    <small class="text-danger">-12%</small>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3 bg-light-danger text-danger">
                      <i class="bi bi-hdd-fill"></i>
                    </div>
                     <p class="mb-0">New Task</p>
                     <h3 class="mt-4 mb-0">45</h3>
                     <small class="text-success">+8%</small>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3 bg-light-success text-success">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <p class="mb-0">New Members</p>
                     <h3 class="mt-4 mb-0">38</h3>
                     <small class="text-danger">-6.2%</small>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3 bg-light-info text-info">
                      <i class="bi bi-archive-fill"></i>
                    </div>
                    <p class="mb-0">Project Completed</p>
                     <h3 class="mt-4 mb-0">61</h3>
                     <small class="text-success">+9%</small>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3 bg-light-purple text-purple">
                      <i class="bi bi-flag-fill"></i>
                    </div>
                    <p class="mb-0">Total Files</p>
                     <h3 class="mt-4 mb-0">29</h3>
                     <small class="text-success">+6%</small>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3 bg-light-orange text-orange">
                      <i class="bi bi-pie-chart-fill"></i>
                    </div>
                    <p class="mb-0">Objectives</p>
                    <h3 class="mt-4 mb-0">32</h3>
                    <small class="text-success">+12%</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-lg-7 col-xl-7">
                 <div class="card radius-10">
                   <div class="card-body">
                    <div class="row row-cols-1 row-cols-lg-2 g-3 align-items-center">
                      <div class="col">
                        <h5 class="mb-0">My Projects</h5>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center justify-content-sm-end gap-3 cursor-pointer">
                           <form>
                             <input type="date" class="form-control">
                           </form>
                        </div>
                      </div>
                     </div>
                     <form class="mt-3">
                      <div class="position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                        <input class="form-control ps-5" type="text" placeholder="search projects">
                      </div>
                     </form>

                     <div class="row mt-2 g-3">
                       <div class="col-12 col-lg-6">
                          <div class="card radius-10 shadow-none border mb-0">
                            <div class="card-body">
                              <div class="d-flex align-items-center">
                                <div class="project-date">
                                  <p class="mb-0 font-13">July 2, 2020</p>
                                </div> 
                                <div class="dropdown ms-auto">
                                  <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                  </a>
                                  <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                    </li>
                                    <li>
                                      <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                    </li>
                                  </ul>
                                </div> 
                              </div>
                              <div class="text-center my-3">
                                 <h6 class="mb-0">Web Designing</h6>
                                 <p class="mb-0">Prototyping</p>
                              </div>
                              <div class="my-2">
                                <p class="mb-1 font-13">Progress</p>
                                <div class="progress radius-10" style="height:5px;">
                                  <div class="progress-bar bg-primary" role="progressbar" style="width: 85%"></div>
                                </div>
                                <p class="mb-0 mt-1 font-13 text-end">85%</p>
                              </div>
                              <div class="d-flex align-items-center">
                                <div class="project-user-groups">
                                  <img src="assets/images/avatars/avatar-1.png" width="35" height="35" class="rounded-circle" alt="">
                                  <img src="assets/images/avatars/avatar-2.png" width="35" height="35" class="rounded-circle" alt="">
                                </div>
                                <div class="project-user-plus">+</div>
                                <div class="py-1 px-3 radius-30 bg-light-primary text-primary ms-auto">2 Days Left</div>
                              </div>
                            </div>
                          </div>
                       </div>
                       <div class="col-12 col-lg-6">
                        <div class="card radius-10 shadow-none border mb-0">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div class="project-date">
                                <p class="mb-0 font-13">July 5, 2020</p>
                              </div> 
                              <div class="dropdown ms-auto">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="javascript:;">Action</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                  </li>
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                  </li>
                                </ul>
                              </div> 
                            </div>
                            <div class="text-center my-3">
                               <h6 class="mb-0">Mobile App</h6>
                               <p class="mb-0">Shopping</p>
                            </div>
                            <div class="my-2">
                              <p class="mb-1 font-13">Progress</p>
                              <div class="progress radius-10" style="height:5px;">
                                <div class="progress-bar bg-orange" role="progressbar" style="width: 55%"></div>
                              </div>
                              <p class="mb-0 mt-1 font-13 text-end">30%</p>
                            </div>
                            <div class="d-flex align-items-center">
                              <div class="project-user-groups">
                                <img src="assets/images/avatars/avatar-1.png" width="35" height="35" class="rounded-circle" alt="">
                                <img src="assets/images/avatars/avatar-2.png" width="35" height="35" class="rounded-circle" alt="">
                              </div>
                              <div class="project-user-plus">+</div>
                              <div class="py-1 px-3 radius-30 bg-light-orange text-orange ms-auto">2 Days Left</div>
                            </div>
                          </div>
                        </div>
                     </div>
                     <div class="col-12 col-lg-6">
                      <div class="card radius-10 shadow-none border mb-0">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="project-date">
                              <p class="mb-0 font-13">July 10, 2020</p>
                            </div> 
                            <div class="dropdown ms-auto">
                              <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                  <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                              </ul>
                            </div> 
                          </div>
                          <div class="text-center my-3">
                             <h6 class="mb-0">Dashboard</h6>
                             <p class="mb-0">Medical</p>
                          </div>
                          <div class="my-2">
                            <p class="mb-1 font-13">Progress</p>
                            <div class="progress radius-10" style="height:5px;">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 45%"></div>
                            </div>
                            <p class="mb-0 mt-1 font-13 text-end">45%</p>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="project-user-groups">
                              <img src="assets/images/avatars/avatar-1.png" width="35" height="35" class="rounded-circle" alt="">
                              <img src="assets/images/avatars/avatar-2.png" width="35" height="35" class="rounded-circle" alt="">
                            </div>
                            <div class="project-user-plus">+</div>
                            <div class="py-1 px-3 radius-30 bg-light-success text-success ms-auto">2 Weeks Left</div>
                          </div>

                        </div>
                      </div>
                   </div>
                   <div class="col-12 col-lg-6">
                    <div class="card radius-10 shadow-none border mb-0">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="project-date">
                            <p class="mb-0 font-13">July 10, 2020</p>
                          </div> 
                          <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="javascript:;">Action</a>
                              </li>
                              <li><a class="dropdown-item" href="javascript:;">Another action</a>
                              </li>
                              <li>
                                <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                              </li>
                            </ul>
                          </div> 
                        </div>
                        <div class="text-center my-3">
                           <h6 class="mb-0">Web Designing</h6>
                           <p class="mb-0">Wireframing</p>
                        </div>
                        <div class="my-2">
                          <p class="mb-1 font-13">Progress</p>
                          <div class="progress radius-10" style="height:5px;">
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 65%"></div>
                          </div>
                          <p class="mb-0 mt-1 font-13 text-end">65%</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="project-user-groups">
                            <img src="assets/images/avatars/avatar-1.png" width="35" height="35" class="rounded-circle" alt="">
                            <img src="assets/images/avatars/avatar-2.png" width="35" height="35" class="rounded-circle" alt="">
                          </div>
                          <div class="project-user-plus">+</div>
                          <div class="py-1 px-3 radius-30 bg-light-purple text-purple ms-auto">1 Week Left</div>
                        </div>

                      </div>
                    </div>
                  </div>
                   
                 </div><!--end row-->
                     
                   </div>
                 </div>
              </div>
              <div class="col-12 col-lg-5 col-xl-5">
                <div class="card radius-10">
                  <div class="card-body">
                    <div class="row g-3 align-items-center">
                      <div class="col-9">
                        <h5 class="mb-0">Client Messages</h5>
                      </div>
                      <div class="col-3">
                        <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                          <div class="dropdown">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="javascript:;">Action</a>
                              </li>
                              <li><a class="dropdown-item" href="javascript:;">Another action</a>
                              </li>
                              <li>
                                <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                     </div>
                  </div>
                  <div class="client-message">
                    <div class="d-flex align-items-center gap-3 client-messages-list border-bottom border-top p-3">
                      <img src="assets/images/avatars/avatar-1.png" class="rounded-circle" width="50" height="50" alt="">
                      <div>
                        <h6 class="mb-0">Thomas Hardy <span class="text-secondary mb-0 float-end font-13">21 July</span></h6>
                        <p class="mb-0 font-13">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                     </div>
                     <div class="d-flex align-items-center gap-3 client-messages-list border-bottom p-3">
                      <img src="assets/images/avatars/avatar-2.png" class="rounded-circle" width="50" height="50" alt="">
                      <div>
                        <h6 class="mb-0">Thomas Hardy <span class="text-secondary mb-0 float-end font-13">21 July</span></h6>
                        <p class="mb-0 font-13">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                     </div>
                     <div class="d-flex align-items-center gap-3 client-messages-list border-bottom p-3">
                      <img src="assets/images/avatars/avatar-3.png" class="rounded-circle" width="50" height="50" alt="">
                      <div>
                        <h6 class="mb-0">Thomas Hardy <span class="text-secondary mb-0 float-end font-13">21 July</span></h6>
                        <p class="mb-0 font-13">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                     </div>
                     <div class="d-flex align-items-center gap-3 client-messages-list border-bottom p-3">
                      <img src="assets/images/avatars/avatar-4.png" class="rounded-circle" width="50" height="50" alt="">
                      <div>
                        <h6 class="mb-0">Thomas Hardy <span class="text-secondary mb-0 float-end font-13">21 July</span></h6>
                        <p class="mb-0 font-13">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                     </div>
                     <div class="d-flex align-items-center gap-3 client-messages-list border-bottom p-3">
                      <img src="assets/images/avatars/avatar-5.png" class="rounded-circle" width="50" height="50" alt="">
                      <div>
                        <h6 class="mb-0">Thomas Hardy <span class="text-secondary mb-0 float-end font-13">21 July</span></h6>
                        <p class="mb-0 font-13">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                     </div>
                     <div class="d-flex align-items-center gap-3 client-messages-list border-bottom p-3">
                      <img src="assets/images/avatars/avatar-6.png" class="rounded-circle" width="50" height="50" alt="">
                      <div>
                        <h6 class="mb-0">Thomas Hardy <span class="text-secondary mb-0 float-end font-13">21 July</span></h6>
                        <p class="mb-0 font-13">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                     </div>
                     <div class="d-flex align-items-center gap-3 client-messages-list border-bottom p-3">
                      <img src="assets/images/avatars/avatar-7.png" class="rounded-circle" width="50" height="50" alt="">
                      <div>
                        <h6 class="mb-0">Thomas Hardy <span class="text-secondary mb-0 float-end font-13">21 July</span></h6>
                        <p class="mb-0 font-13">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                     </div>
                     <div class="d-flex align-items-center gap-3 client-messages-list border-bottom p-3">
                      <img src="assets/images/avatars/avatar-7.png" class="rounded-circle" width="50" height="50" alt="">
                      <div>
                        <h6 class="mb-0">Thomas Hardy <span class="text-secondary mb-0 float-end font-13">21 July</span></h6>
                        <p class="mb-0 font-13">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                     </div>
                     <div class="d-flex align-items-center gap-3 client-messages-list border-bottom p-3">
                      <img src="assets/images/avatars/avatar-7.png" class="rounded-circle" width="50" height="50" alt="">
                      <div>
                        <h6 class="mb-0">Thomas Hardy <span class="text-secondary mb-0 float-end font-13">21 July</span></h6>
                        <p class="mb-0 font-13">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                     </div>
                     <div class="d-flex align-items-center gap-3 client-messages-list border-bottom p-3">
                      <img src="assets/images/avatars/avatar-7.png" class="rounded-circle" width="50" height="50" alt="">
                      <div>
                        <h6 class="mb-0">Thomas Hardy <span class="text-secondary mb-0 float-end font-13">21 July</span></h6>
                        <p class="mb-0 font-13">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                     </div>

                   </div>
                </div>
             </div>
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


  <!-- Bootstrap bundle JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/js/pace.min.js"></script>
  <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
  <!--app-->
  <script src="assets/js/app.js"></script>
  <script>
      $(function() {
	"use strict";



// chart 1
var options = {
    series: [{
        name: "Today",
        data: [450, 650, 440, 160, 350, 414, 555, 257, 400, 555, 257]
    },{
        name: "Yestreday",
        data: [580, 350, 760, 350, 687, 352, 785, 241, 352, 685, 425]
    }],
    chart: {
        foreColor: '#9a9797',
        type: "area",
        //width: 130,
        height: 320,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#3461ff"
        },
        sparkline: {
            enabled: !1
        }
    },
    markers: {
        size: 0,
        colors: ["#3461ff", "#12bf24"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "35%",
            endingShape: "rounded"
        }
    },
	legend: {
        show: false,
        position: 'top',
        horizontalAlign: 'left',
        offsetX: -20
    },
    dataLabels: {
        enabled: !1
    },
    grid: {
        show: true,
        // borderColor: '#eee',
        // strokeDashArray: 4,
    },
    stroke: {
        show: !0,
        width: 3,
        curve: "smooth"
    },
    colors: ["#3461ff", "#12bf24"],
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
    tooltip: {
        theme: 'dark',
        y: {
            formatter: function (val) {
                return "" + val + ""
            }
        }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart1"), options);
  chart.render();



   
// chart 2
var options = {
    series: [{
        name: "Messages",
        data: [650, 440, 671, 414, 555, 901, 555]
    }],
    chart: {
        foreColor: '#9a9797',
        type: "bar",
        //width: 130,
        height: 320,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#3461ff"
        },
        sparkline: {
            enabled: 0
        }
    },
    markers: {
        size: 0,
        colors: ["#3461ff"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "45%",
            // distributed: true,
            //endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    legend: {
        show: false
      },
    stroke: {
        show: !0,
        width: 1.5,
        curve: "smooth"
    },
    colors: ["#3461ff"],
    xaxis: {
        categories: ["1", "2", "3", "4", "5", "6", "7"]
    },
    tooltip: {
        theme: "dark",
        fixed: {
            enabled: !1
        },
        x: {
            show: !1
        },
        y: {
            title: {
                formatter: function(e) {
                    return ""
                }
            }
        },
        marker: {
            show: !1
        }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart2"), options);
  chart.render();



  new PerfectScrollbar(".client-message")







});
      
      
  </script>










</body>

</html>