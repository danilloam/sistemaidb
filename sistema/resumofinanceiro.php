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
  
               <div class="col-12 col-lg-12 d-flex">
                <div class="card radius-10 w-100">
                  <div class="card-body">
                    <p>Entradas dos &Uacute;ltimos 12 Meses</p>
                    <div id="chart2"></div>
                  </div>
                </div>
               </div>
              </div><!--end row-->

              <div class="row">
                <div class="col-12 col-lg-3 d-flex">
                  <div class="card radius-10 w-100">
                    <div class="card-body">
                      <p>DESPESAS</p>
                      <h2 class="text-center fw-light"><?php echo "R$ ".transf_real(array_sum($qtddespesas) / count($qtddespesas)); ?></h2>
                      <h6 class="text-center fw-light">Média Anual*</h6>
                      <div id="chart3"></div>
                    </div>
                    <div class="card-footer bg-transparent border-top">
                       <div class="d-flex align-items-center justify-content-between">
                            <center> <p class="text-center font-13">* Média realizada por Lançamentos</p></center>
                        
                         
                       </div>
                    </div>
                  </div>
                 </div>
                 <div class="col-12 col-lg-3 d-flex">
                  <div class="card radius-10 w-100">
                    <div class="card-body">
                      <p>RECEITAS</p>
                      <h2 class="text-center fw-light"><?php echo "R$ ".transf_real(array_sum($qtdreceitas) / count($qtdreceitas)); ?></h2>
                      <h6 class="text-center fw-light">Média Anual*</h6>
                      <div id="chart4"></div>
                    </div>
                    <div class="card-footer bg-transparent border-top">
                       <div class="d-flex align-items-center justify-content-between">
                            <center> <p class="text-center font-13">* Média realizada por Lançamentos</p></center>
                         
                       </div>
                    </div>
                  </div>
                 </div>
                 <div class="col-12 col-lg-6 d-flex">
                  <div class="card radius-10 w-100">
                    <div class="card-body">
                      <p>RECEITAS X DESPESAS </p>
                      <div class="d-lg-flex align-items-center justify-content-center gap-4">
                        <div id="chart5"></div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item"><i class="bi bi-circle-fill text-purple me-1"></i> Receitas: <span class="me-1">R$ <?php echo transf_real(array_sum($qtdreceitas));?></span></li>
                          <li class="list-group-item"><i class="bi bi-circle-fill text-danger me-1"></i> Despesas: <span class="me-1">R$ <?php echo transf_real(array_sum($qtddespesas));?></span></li>
                          <li class="list-group-item list-group-item-secondary">Total : R$ <?php echo transf_real(array_sum($qtdreceitas)-array_sum($qtddespesas));?></li>
                        </ul>
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
        name: "Messages",
        data: [450, 650, 440, 160, 671, 414, 555, 257, 901, 555, 257]
    }],
    chart: {
        foreColor: '#9a9797',
        type: "area",
        //width: 130,
        height: 100,
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
            enabled: !0
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
            columnWidth: "35%",
            endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 1.5,
        curve: "smooth"
    },
    colors: ["#3461ff"],
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
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

  var chart = new ApexCharts(document.querySelector("#chart1"), options);
  chart.render();

  // chart 2
  var options = {
    series: [{
        name: 'DIZIMOS DIVERSOS',
        data: [<?php echo $qtdreceitasdizimos[11];?>, <?php echo $qtdreceitasdizimos[10];?>,<?php echo $qtdreceitasdizimos[9];?>, <?php echo $qtdreceitasdizimos[8];?>, <?php echo $qtdreceitasdizimos[7];?>, <?php echo $qtdreceitasdizimos[6];?>, <?php echo $qtdreceitasdizimos[5];?>,<?php echo $qtdreceitasdizimos[4];?>, <?php echo $qtdreceitasdizimos[3];?>, <?php echo $qtdreceitasdizimos[2];?>, <?php echo $qtdreceitasdizimos[1];?>, <?php echo $qtdreceitasdizimos[0];?>]
    },{
        name: 'OFERTA DOS CULTOS',
        data: [<?php echo $qtdreceitasofertas[11];?>, <?php echo $qtdreceitasofertas[10];?>,<?php echo $qtdreceitasofertas[9];?>, <?php echo $qtdreceitasofertas[8];?>, <?php echo $qtdreceitasofertas[7];?>, <?php echo $qtdreceitasofertas[6];?>, <?php echo $qtdreceitasofertas[5];?>,<?php echo $qtdreceitasofertas[4];?>, <?php echo $qtdreceitasofertas[3];?>, <?php echo $qtdreceitasofertas[2];?>, <?php echo $qtdreceitasofertas[1];?>, <?php echo $qtdreceitasofertas[0];?>]
    }, {
        name: 'VISAO CORPORATIVA',
        data: [<?php echo $qtdreceitasvisao[11];?>, <?php echo $qtdreceitasvisao[10];?>,<?php echo $qtdreceitasvisao[9];?>, <?php echo $qtdreceitasvisao[8];?>, <?php echo $qtdreceitasvisao[7];?>, <?php echo $qtdreceitasvisao[6];?>, <?php echo $qtdreceitasvisao[5];?>,<?php echo $qtdreceitasvisao[4];?>, <?php echo $qtdreceitasvisao[3];?>, <?php echo $qtdreceitasvisao[2];?>, <?php echo $qtdreceitasvisao[1];?>, <?php echo $qtdreceitasvisao[0];?>]
    },{
        name: 'OFERTA PARA CONSTRUÇÃO',
        data: [<?php echo $qtdreceitasconstrucao[11];?>, <?php echo $qtdreceitasconstrucao[10];?>,<?php echo $qtdreceitasconstrucao[9];?>, <?php echo $qtdreceitasconstrucao[8];?>, <?php echo $qtdreceitasconstrucao[7];?>, <?php echo $qtdreceitasconstrucao[6];?>, <?php echo $qtdreceitasconstrucao[5];?>,<?php echo $qtdreceitasconstrucao[4];?>, <?php echo $qtdreceitasconstrucao[3];?>, <?php echo $qtdreceitasconstrucao[2];?>, <?php echo $qtdreceitasconstrucao[1];?>, <?php echo $qtdreceitasconstrucao[0];?>]
    },{
        name: 'OUTRAS',
        data: [<?php echo $qtdreceitasoutros[11];?>, <?php echo $qtdreceitasoutros[10];?>,<?php echo $qtdreceitasoutros[9];?>, <?php echo $qtdreceitasoutros[8];?>, <?php echo $qtdreceitasoutros[7];?>, <?php echo $qtdreceitasoutros[6];?>, <?php echo $qtdreceitasoutros[5];?>,<?php echo $qtdreceitasoutros[4];?>, <?php echo $qtdreceitasoutros[3];?>, <?php echo $qtdreceitasoutros[2];?>, <?php echo $qtdreceitasoutros[1];?>, <?php echo $qtdreceitasoutros[0];?>]
    },{
        name: 'ENTRADAS ESPECIAIS',
        data: [<?php echo $qtdreceitasespeciais[11];?>, <?php echo $qtdreceitasespeciais[10];?>,<?php echo $qtdreceitasespeciais[9];?>, <?php echo $qtdreceitasespeciais[8];?>, <?php echo $qtdreceitasespeciais[7];?>, <?php echo $qtdreceitasespeciais[6];?>, <?php echo $qtdreceitasespeciais[5];?>,<?php echo $qtdreceitasespeciais[4];?>, <?php echo $qtdreceitasespeciais[3];?>, <?php echo $qtdreceitasespeciais[2];?>, <?php echo $qtdreceitasespeciais[1];?>, <?php echo $qtdreceitasespeciais[0];?>]
    },{
        name: 'DEPARTAMENTOS',
        data: [<?php echo $qtdreceitasdepartamentos[11];?>, <?php echo $qtdreceitasdepartamentos[10];?>,<?php echo $qtdreceitasdepartamentos[9];?>, <?php echo $qtdreceitasdepartamentos[8];?>, <?php echo $qtdreceitasdepartamentos[7];?>, <?php echo $qtdreceitasdepartamentos[6];?>, <?php echo $qtdreceitasdepartamentos[5];?>,<?php echo $qtdreceitasdepartamentos[4];?>, <?php echo $qtdreceitasdepartamentos[3];?>, <?php echo $qtdreceitasdepartamentos[2];?>, <?php echo $qtdreceitasdepartamentos[1];?>, <?php echo $qtdreceitasdepartamentos[0];?>]
    }],
    chart: {
        foreColor: '#9a9797',
        type: 'bar',
        height: 190,
        stacked: true,
        toolbar: {
            show: false
        },
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '50%',
            //endingShape: 'rounded'
        },
    },
    legend: {
        //show: false,
        position: 'top',
        horizontalAlign: 'left',
        offsetX: -20
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    colors: ["#3461ff", "#e72e2e", "#8932ff", "#ff6632", "#e72e7a", "#32bfff", "#12bf24"],
    xaxis: {
        categories: [<?php echo '"'.$datas[11];?>", "<?php echo $datas[10];?>", "<?php echo $datas[9];?>", "<?php echo $datas[8];?>", "<?php echo $datas[7];?>", "<?php echo $datas[6];?>", "<?php echo $datas[5];?>", "<?php echo $datas[4];?>", "<?php echo $datas[3];?>", "<?php echo $datas[2];?>", "<?php echo $datas[1];?>", "<?php echo $datas[0].'"';?>],
    },
    fill: {
        opacity: 1
    },
    grid: {
        show: true,
        borderColor: '#ededed',
        //strokeDashArray: 4,
    },
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                height: 310,
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%'
                }
            }
        }
    }]
};
var chart = new ApexCharts(document.querySelector("#chart2"), options);
chart.render();


   
// chart 3
var options = {
    series: [{
        name: "Despesas",
        data: [<?php echo $qtddespesas[11];?>, <?php echo $qtddespesas[10];?>,<?php echo $qtddespesas[9];?>, <?php echo $qtddespesas[8];?>, <?php echo $qtddespesas[7];?>, <?php echo $qtddespesas[6];?>, <?php echo $qtddespesas[5];?>,<?php echo $qtddespesas[4];?>, <?php echo $qtddespesas[3];?>, <?php echo $qtddespesas[2];?>, <?php echo $qtddespesas[1];?>, <?php echo $qtddespesas[0];?>]
    }],
    chart: {
        foreColor: '#9a9797',
        type: "area",
       // width: 130,
        height: 100,
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
            color: "#f01818"
        },
        sparkline: {
            enabled: !0
        }
    },
    markers: {
        size: 0,
        colors: ["#f01818"],
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
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 1.5,
        curve: "smooth"
    },
    colors: ["#f01818"],
    xaxis: {
        categories: [<?php echo '"'.$datas[11];?>", "<?php echo $datas[10];?>", "<?php echo $datas[9];?>", "<?php echo $datas[8];?>", "<?php echo $datas[7];?>", "<?php echo $datas[6];?>", "<?php echo $datas[5];?>", "<?php echo $datas[4];?>", "<?php echo $datas[3];?>", "<?php echo $datas[2];?>", "<?php echo $datas[1];?>", "<?php echo $datas[0].'"';?>]
    },
    fill: {
        opacity: 1
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

  var chart = new ApexCharts(document.querySelector("#chart3"), options);
  chart.render();



// chart 4
var options = {
    series: [{
        name: "New Tasks",
        data: [<?php echo $qtdreceitas[11];?>, <?php echo $qtdreceitas[10];?>,<?php echo $qtdreceitas[9];?>, <?php echo $qtdreceitas[8];?>, <?php echo $qtdreceitas[7];?>, <?php echo $qtdreceitas[6];?>, <?php echo $qtdreceitas[5];?>,<?php echo $qtdreceitas[4];?>, <?php echo $qtdreceitas[3];?>, <?php echo $qtdreceitas[2];?>, <?php echo $qtdreceitas[1];?>, <?php echo $qtdreceitas[0];?>]
    }],
    chart: {
        foreColor: '#9a9797',
        type: "area",
       // width: 130,
        height: 100,
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
            color: "#8932ff"
        },
        sparkline: {
            enabled: !0
        }
    },
    markers: {
        size: 0,
        colors: ["#8932ff"],
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
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 1.5,
        curve: "smooth"
    },
    colors: ["#8932ff"],
    xaxis: {
        categories: [<?php echo '"'.$datas[11];?>", "<?php echo $datas[10];?>", "<?php echo $datas[9];?>", "<?php echo $datas[8];?>", "<?php echo $datas[7];?>", "<?php echo $datas[6];?>", "<?php echo $datas[5];?>", "<?php echo $datas[4];?>", "<?php echo $datas[3];?>", "<?php echo $datas[2];?>", "<?php echo $datas[1];?>", "<?php echo $datas[0].'"';?>]
    },
    fill: {
        opacity: 1
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

  var chart = new ApexCharts(document.querySelector("#chart4"), options);
  chart.render();



// chart 5
  
  var options = {
    series: [<?php echo array_sum($qtdreceitas).",".array_sum($qtddespesas);?>],
    chart: {
    width: 240,
    type: 'donut',
  },
  labels: [ 'Receitas', 'Despesas'],
  colors: ["#8932ff", "#e72e2e"],
  legend: {
    show: false,
    position: 'top',
    horizontalAlign: 'left',
    offsetX: -20
  },
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        height: 260
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
  };

  var chart = new ApexCharts(document.querySelector("#chart5"), options);
  chart.render();



 




});
      
      
  </script>
</body>

</html>