<?php include("header.php");

	$jsoncontas = file_get_contents("https://sistemaidb.com.br/sistema/consulta.php?opcao=contas&valor=".$igreja_id);
	$contas= json_decode($jsoncontas);
	$totalcontas = count($contas);
	
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
					<div class="breadcrumb-title pe-3">Financeiro</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Contas</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
						<a href="adicionarconta.php">	<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Conta</button></a>
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
			
				
				<h6 class="mb-0 text-uppercase">Contas</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="contas" class="table table-striped table-bordered">
							<thead>
                            <tr>
							<th>Contas</th>
							<th>Agência</th>
							<th>Nº da Conta</th>
							<th>Tipo</th>
							<th>Saldo</th>
							<th class="hidden-phone" style="width:20px;">
		
							</tr>
                             </thead>
                                 <?php
                                 $i = 0 ;
                                 
                                 while ($i<$totalcontas){
                                  ?>
                                 <tr>
                                   
                                  <td><?php echo $contas[$i]->descricao; ?></td>
                                  <td><?php echo $contas[$i]->agencia; ?></td>
                                  <td><?php echo $contas[$i]->conta; ?></td>
                                  <td><?php 
                                  if($contas[$i]->tipo=='corrente'){
                                  echo 'Conta Corrente';
          
                                  }
                                  else if($contas[$i]->tipo=='poupanca'){
                                  echo 'Conta Poupança';
                                      
                                  }else{
                                  echo '';
                                      
                                  }
                                  ?>
                                  </td>
                                   <td><?php $contas[$i]->tipo==saldo; ?></td>
 <center>
 <td>
 <a href="visualizarconta.php?ig=<?php echo $igreja_id."&id=".$contas[$i]->id; ?>" class="various" data-fancybox-type="iframe">
 <button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button></a></td></center>
                                  </tr>
                                     <?php
                                  $i++;   
                                 }
                                 ?>
                                 
                                 
                             </tbody>
                             <tfoot><tr>
							<th>Contas</th>
							<th>Agência</th>
							<th>Nº da Conta</th>
							<th>Tipo</th>
							<th>Saldo</th>                             
                             	<th class="hidden-phone" style="width:20px;">
		  
                             </tr></tfoot>
                            
                             
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
  <script>

      $(document).ready(function() {
    $('#contas').DataTable(
        {
        
      "language":   {
    "emptyTable": "Nenhum registro encontrado",
    "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "infoEmpty": "Mostrando 0 até 0 de 0 registros",
    "infoFiltered": "(Filtrados de _MAX_ registros)",
    "infoThousands": ".",
    "loadingRecords": "Carregando...",
    "processing": "Processando...",
    "zeroRecords": "Nenhum registro encontrado",
    "search": "Pesquisar",
    "paginate": {
        "next": "Próximo",
        "previous": "Anterior",
        "first": "Primeiro",
        "last": "Último"
    },
    "aria": {
        "sortAscending": ": Ordenar colunas de forma ascendente",
        "sortDescending": ": Ordenar colunas de forma descendente"
    },
    "select": {
        "rows": {
            "_": "Selecionado %d linhas",
            "1": "Selecionado 1 linha"
        },
        "cells": {
            "1": "1 célula selecionada",
            "_": "%d células selecionadas"
        },
        "columns": {
            "1": "1 coluna selecionada",
            "_": "%d colunas selecionadas"
        }
    },
    "buttons": {
        "copySuccess": {
            "1": "Uma linha copiada com sucesso",
            "_": "%d linhas copiadas com sucesso"
        },
        "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
        "colvis": "Visibilidade da Coluna",
        "colvisRestore": "Restaurar Visibilidade",
        "copy": "Copiar",
        "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
        "copyTitle": "Copiar para a Área de Transferência",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todos os registros",
            "_": "Mostrar %d registros"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Preencher todas as células com",
        "fillHorizontal": "Preencher células horizontalmente",
        "fillVertical": "Preencher células verticalmente"
    },
    "lengthMenu": "Exibir _MENU_ resultados por página",
    "searchBuilder": {
        "add": "Adicionar Condição",
        "button": {
            "0": "Construtor de Pesquisa",
            "_": "Construtor de Pesquisa (%d)"
        },
        "clearAll": "Limpar Tudo",
        "condition": "Condição",
        "conditions": {
            "date": {
                "after": "Depois",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vazio",
                "equals": "Igual",
                "not": "Não",
                "notBetween": "Não Entre",
                "notEmpty": "Não Vazio"
            },
            "number": {
                "between": "Entre",
                "empty": "Vazio",
                "equals": "Igual",
                "gt": "Maior Que",
                "gte": "Maior ou Igual a",
                "lt": "Menor Que",
                "lte": "Menor ou Igual a",
                "not": "Não",
                "notBetween": "Não Entre",
                "notEmpty": "Não Vazio"
            },
            "string": {
                "contains": "Contém",
                "empty": "Vazio",
                "endsWith": "Termina Com",
                "equals": "Igual",
                "not": "Não",
                "notEmpty": "Não Vazio",
                "startsWith": "Começa Com"
            },
            "array": {
                "contains": "Contém",
                "empty": "Vazio",
                "equals": "Igual à",
                "not": "Não",
                "notEmpty": "Não vazio",
                "without": "Não possui"
            }
        },
        "data": "Data",
        "deleteTitle": "Excluir regra de filtragem",
        "logicAnd": "E",
        "logicOr": "Ou",
        "title": {
            "0": "Construtor de Pesquisa",
            "_": "Construtor de Pesquisa (%d)"
        },
        "value": "Valor",
        "leftTitle": "Critérios Externos",
        "rightTitle": "Critérios Internos"
    },
    "searchPanes": {
        "clearMessage": "Limpar Tudo",
        "collapse": {
            "0": "Painéis de Pesquisa",
            "_": "Painéis de Pesquisa (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Nenhum Painel de Pesquisa",
        "loadMessage": "Carregando Painéis de Pesquisa...",
        "title": "Filtros Ativos"
    },
    "thousands": ".",
    "datetime": {
        "previous": "Anterior",
        "next": "Próximo",
        "hours": "Hora",
        "minutes": "Minuto",
        "seconds": "Segundo",
        "amPm": [
            "am",
            "pm"
        ],
        "unknown": "-",
        "months": {
            "0": "Janeiro",
            "1": "Fevereiro",
            "10": "Novembro",
            "11": "Dezembro",
            "2": "Março",
            "3": "Abril",
            "4": "Maio",
            "5": "Junho",
            "6": "Julho",
            "7": "Agosto",
            "8": "Setembro",
            "9": "Outubro"
        },
        "weekdays": [
            "Domingo",
            "Segunda-feira",
            "Terça-feira",
            "Quarta-feira",
            "Quinte-feira",
            "Sexta-feira",
            "Sábado"
        ]
    },
    "editor": {
        "close": "Fechar",
        "create": {
            "button": "Novo",
            "submit": "Criar",
            "title": "Criar novo registro"
        },
        "edit": {
            "button": "Editar",
            "submit": "Atualizar",
            "title": "Editar registro"
        },
        "error": {
            "system": "Ocorreu um erro no sistema (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Mais informações<\/a>)."
        },
        "multi": {
            "noMulti": "Essa entrada pode ser editada individualmente, mas não como parte do grupo",
            "restore": "Desfazer alterações",
            "title": "Multiplos valores",
            "info": "Os itens selecionados contêm valores diferentes para esta entrada. Para editar e definir todos os itens para esta entrada com o mesmo valor, clique ou toque aqui, caso contrário, eles manterão seus valores individuais."
        },
        "remove": {
            "button": "Remover",
            "confirm": {
                "_": "Tem certeza que quer deletar %d linhas?",
                "1": "Tem certeza que quer deletar 1 linha?"
            },
            "submit": "Remover",
            "title": "Remover registro"
        }
    },
    "decimal": ","
} 
}        );
} );
  </script>
  
  
  
  
</body>

</html>