<?php 


include("header.php");

	$tipo = isset($_GET['t']) ? $_GET['t'] : '';
	$mesaniversario = isset($_GET['mes']) ? $_GET['mes'] : date("m");
$mesanterior = $mesaniversario-1;
$mesproximo = $mesaniversario+1;
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
                    <?php if($mesaniversario>1){ echo '<a href="aniversariantes.php?mes='.$mesanterior;
                    if($tipo<>""){echo "&t=".$tipo;}
                    echo '" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i>
                    M&ecirc;s Anterior</a>'; 
                    }?> 
                    <a href="aniversariantes.php?mes=<?php echo date("m");if($tipo<>""){echo "&t=".$tipo;}?>" class="btn btn-primary"><i class="bi bi-arrow-down-square"></i> Mês atual</a>
                    <?php if($mesaniversario<12){ echo '<a href="aniversariantes.php?mes='.$mesproximo; if($tipo<>""){echo "&t=".$tipo;} echo'" class="btn btn-primary"><i class="bi bi-arrow-right-square"></i> Próximo M&ecirc;s</a>'; }?>                     
                    </div>

					</div>
				</div>
				<!--end breadcrumb-->
			
				
				<h6 class="mb-0 text-uppercase">Aniversariantes do m&ecirc;s - <?php echo mes_extenso($mesaniversario)." de ". date("Y"); ?></h6>
				<hr/>
				
					<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Idade</th>
										<th>Nome</th>
							            <th>Telefone</th>
							            <th>Função</th>
							            <th>Sexo</th>
							            <th></th>
									</tr>
								</thead>
								<tbody>
								    <?php
								    
$aniversariantebusca = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=$igreja_id and status='ativo' and MONTH(data_nascimento) ='".$mesaniversario."' ORDER BY DAY(data_nascimento) asc");
	while($resultadoaniversariantes = mysqli_fetch_array($aniversariantebusca)){
	  $idade=  calcularIdade($resultadoaniversariantes["data_nascimento"]);
	  
								    if($tipo==""){
	$i = 0 ;
	


 echo "<tr>
 <td>";
                                 if($idade){
                                     echo date( 'd/m', strtotime( $resultadoaniversariantes["data_nascimento"] ) )." (".$idade.")";
                                 }
                            echo "</td><td>";
                        
                            $nomeaniversariante=$resultadoaniversariantes['nome']." ".$resultadoaniversariantes['sobrenome'];
                            $partesaniversariantes = explode(' ', $nomeaniversariante);
                            $primeiroNomeaniversariante = array_shift($partesaniversariantes);
                            $ultimoNomeaniversariante = array_pop($partesaniversariantes);
                           
                           echo utf8_encode( $primeiroNomeaniversariante." ".$ultimoNomeaniversariante);
                           echo "</td>
                                  <td>";
                                  
                          if($resultadoaniversariantes["celular1"]<>""){echo  $resultadoaniversariantes["celular1"];}if($resultadoaniversariantes["celular2"]<>""){echo  " / ".$resultadoaniversariantes["celular2"];}if($resultadoaniversariantes["telefone"]<>""){echo  " / ".$resultadoaniversariantes["telefone"];}
                                  echo "</td>
                                  <td>".utf8_encode($resultadoaniversariantes["funcao"])."</td>
                                   <td>".$resultadoaniversariantes["sexo"]."</td>
<td><a href='visualizarpessoa.php?ig=".$igreja_id."&id=".$resultadoaniversariantes["id"]."'><button class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-eye'><path d='M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z'></path><circle cx='12' cy='12' r='3'></circle></svg></button></a></td>

                                  </tr>"  ;
                        

$i++;
}
else{
    
		  
$sqllider=mysqli_query($conecta,"select * from lider where id=$tipo and igreja_id=$igreja_id");
$verlider=mysqli_fetch_array($sqllider);
$min_idade=$verlider["min_idade"];
$max_idade=$verlider["max_idade"];    
    

if(($min_idade==0) && ($max_idade==0)){
if(($verlider["sexo"]=="Masculino")&&($resultadoaniversariantes['sexo']=="Masculino")){

 echo "<tr>
 <td>";
                                 if($idade){
                                     echo date( 'd/m', strtotime( $resultadoaniversariantes["data_nascimento"] ) )." (".$idade.")";
                                 }
                            echo "</td>";
?>

<td><center><?php $nomeaniversariante=$resultadoaniversariantes['nome']." ".$resultadoaniversariantes['sobrenome'];
                            $partesaniversariantes = explode(' ', $nomeaniversariante);
                            $primeiroNomeaniversariante = array_shift($partesaniversariantes);
                            $ultimoNomeaniversariante = array_pop($partesaniversariantes);
                           
                           echo utf8_encode( $primeiroNomeaniversariante." ".$ultimoNomeaniversariante);?></center></td>
                           <td><?php if($resultadoaniversariantes["celular1"]<>""){echo  $resultadoaniversariantes["celular1"];}if($resultadoaniversariantes["celular2"]<>""){echo  " / ".$resultadoaniversariantes["celular2"];}if($resultadoaniversariantes["telefone"]<>""){echo  " / ".$resultadoaniversariantes["telefone"];}?></td>
<td><center><?php echo utf8_encode($resultadoaniversariantes['funcao']);?></center></td>

<td><center><?php echo $resultadoaniversariantes['sexo'];?></center></td>
<td><a href='visualizarpessoa.php?ig=".$igreja_id."&id=".$resultadoaniversariantes["id"]."'><button class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-eye'><path d='M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z'></path><circle cx='12' cy='12' r='3'></circle></svg></button></a></td>
</tr> 
<?php
$total_aniversariantes=$total_aniversariantes+1;
    
} else if(($verlider["sexo"]=="Feminino")&&($resultadoaniversariantes['sexo']=="Feminino")){


 echo "<tr>
 <td>";
                                 if($idade){
                                     echo date( 'd/m', strtotime( $resultadoaniversariantes["data_nascimento"] ) )." (".$idade.")";
                                 }
                            echo "</td>";
?>    
 
<td><center><?php   $nomeaniversariante=$resultadoaniversariantes['nome']." ".$resultadoaniversariantes['sobrenome'];
                            $partesaniversariantes = explode(' ', $nomeaniversariante);
                            $primeiroNomeaniversariante = array_shift($partesaniversariantes);
                            $ultimoNomeaniversariante = array_pop($partesaniversariantes);
                           
                           echo utf8_encode( $primeiroNomeaniversariante." ".$ultimoNomeaniversariante);?></center></td>
                           <td><?php if($resultadoaniversariantes["celular1"]<>""){echo  $resultadoaniversariantes["celular1"];}if($resultadoaniversariantes["celular2"]<>""){echo  " / ".$resultadoaniversariantes["celular2"];}if($resultadoaniversariantes["telefone"]<>""){echo  " / ".$resultadoaniversariantes["telefone"];}?></td>
<td><center><?php echo utf8_encode($resultadoaniversariantes['funcao']);?></center></td>
<td><?php echo $resultadoaniversariantes['sexo'];?></td>
<td><a href='visualizarpessoa.php?ig=".$igreja_id."&id=".$resultadoaniversariantes["id"]."'><button class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-eye'><path d='M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z'></path><circle cx='12' cy='12' r='3'></circle></svg></button></a></td>
</tr>   

<?php
$total_aniversariantes=$total_aniversariantes+1;
} else if(($verlider["sexo"]=="Ambos") && ($verlider['novoconvertido']==1) && ($resultadoaniversariantes['funcao']=="Novo Convertido")){

 echo "<tr>
 <td>";
                                 if($idade){
                                     echo date( 'd/m', strtotime( $resultadoaniversariantes["data_nascimento"] ) )." (".$idade.")";
                                 }
                            echo "</td>";
?>

<td><center><?php $nomeaniversariante=$resultadoaniversariantes['nome']." ".$resultadoaniversariantes['sobrenome'];
                            $partesaniversariantes = explode(' ', $nomeaniversariante);
                            $primeiroNomeaniversariante = array_shift($partesaniversariantes);
                            $ultimoNomeaniversariante = array_pop($partesaniversariantes);
                           
                           echo utf8_encode( $primeiroNomeaniversariante." ".$ultimoNomeaniversariante);?></center></td>
                           
<td><?php if($resultadoaniversariantes["celular1"]<>""){echo  $resultadoaniversariantes["celular1"];}if($resultadoaniversariantes["celular2"]<>""){echo  " / ".$resultadoaniversariantes["celular2"];}if($resultadoaniversariantes["telefone"]<>""){echo  " / ".$resultadoaniversariantes["telefone"];}?></td>

<td><center><?php echo utf8_encode($resultadoaniversariantes['funcao']);?></center></td>
<td><?php echo $resultadoaniversariantes['sexo'];?></td>
<?php echo "<td><a href='visualizarpessoa.php?ig=".$igreja_id."&id=".$resultadoaniversariantes["id"]."'><button class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-eye'><path d='M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z'></path><circle cx='12' cy='12' r='3'></circle></svg></button></a></td>";?>

</tr>

<?php
$total_aniversariantes=$total_aniversariantes+1;
}
}else if(($verlider["sexo"]=="Ambos")&& ($idade>=$min_idade) && ($idade<=$max_idade)){

 echo "<tr>
 <td>";
                                 if($idade){
                                     echo date( 'd/m', strtotime( $resultadoaniversariantes["data_nascimento"] ) )." (".$idade.")";
                                 }
                            echo "</td>";
?>
<td><center><?php $nomeaniversariante=$resultadoaniversariantes['nome']." ".$resultadoaniversariantes['sobrenome'];
                            $partesaniversariantes = explode(' ', $nomeaniversariante);
                            $primeiroNomeaniversariante = array_shift($partesaniversariantes);
                            $ultimoNomeaniversariante = array_pop($partesaniversariantes);
                           
                           echo utf8_encode( $primeiroNomeaniversariante." ".$ultimoNomeaniversariante);?></center></td>
<td><?php if($resultadoaniversariantes["celular1"]<>""){echo  $resultadoaniversariantes["celular1"];}if($resultadoaniversariantes["celular2"]<>""){echo  " / ".$resultadoaniversariantes["celular2"];}if($resultadoaniversariantes["telefone"]<>""){echo  " / ".$resultadoaniversariantes["telefone"];}?></td>
<td><center><?php echo utf8_encode($resultadoaniversariantes['funcao']);?></center></td>
<td><center><?php echo $resultadoaniversariantes['sexo'];?></center></td>
<?php echo "<td><a href='visualizarpessoa.php?ig=".$igreja_id."&id=".$resultadoaniversariantes["id"]."'><button class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-eye'><path d='M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z'></path><circle cx='12' cy='12' r='3'></circle></svg></button></a></td>";?>
</tr>



<?php
$total_aniversariantes=$total_aniversariantes+1;
}
}                 
    
}
?>



								</tbody>
								<tfoot>
									<tr>
										<th>Idade</th>
							            <th>Nome</th>
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
  <script>

      $(document).ready(function() {
    $('example2').DataTable({
        
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
        "print": "Imprimir",
        "createState": "Criar estado",
        "removeAllStates": "Remover todos os estados",
        "removeState": "Remover",
        "renameState": "Renomear",
        "savedStates": "Estados salvos",
        "stateRestore": "Estado %d",
        "updateState": "Atualizar"
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
                "startsWith": "Começa Com",
                "notContains": "Não contém",
                "notStarts": "Não começa com",
                "notEnds": "Não termina com"
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
        "title": "Filtros Ativos",
        "showMessage": "Mostrar todos",
        "collapseMessage": "Fechar todos"
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
    "decimal": ",",
    "stateRestore": {
        "creationModal": {
            "button": "Criar",
            "columns": {
                "search": "Busca de colunas",
                "visible": "Visibilidade da coluna"
            },
            "name": "Nome:",
            "order": "Ordernar",
            "paging": "Paginação",
            "scroller": "Posição da barra de rolagem",
            "search": "Busca",
            "searchBuilder": "Mecanismo de busca",
            "select": "Selecionar",
            "title": "Criar novo estado",
            "toggleLabel": "Inclui:"
        },
        "duplicateError": "Já existe um estado com esse nome",
        "emptyError": "Não pode ser vazio",
        "emptyStates": "Nenhum estado salvo",
        "removeConfirm": "Confirma remover %s?",
        "removeError": "Falha ao remover estado",
        "removeJoiner": "e",
        "removeSubmit": "Remover",
        "removeTitle": "Remover estado",
        "renameButton": "Renomear",
        "renameLabel": "Novo nome para %s:",
        "renameTitle": "Renomear estado"
    }
}  
        
        
    });
          
          
      });
  </script>
  
  
  
  
</body>

</html>