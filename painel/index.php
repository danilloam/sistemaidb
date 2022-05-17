<?php include ("header.php"); ?>

	<div id="container" class="row-fluid">

		<?php include ("menu.php"); ?>

		<!-- BEGIN PAGE -->

		<div>

			

		

		

		

		

		<div>

		<?php

$id = mysqli_real_escape_string($conecta,$_GET['view']);

switch($id) { 





case "home":

$pagina = "home.php";

break;
case "faq":

$pagina = "faq.php";

break;

$pagina = "faq.php";

case "pessoas":
$pagina = "pessoaslideres.php";
break;
case "agenda":
$pagina = "agenda.php";
break;
case "igrejas":
$pagina = "igrejas.php";
break;
case "congregacoes":
$pagina = "congregacoes.php";
break;
case "departamentos":
$pagina = "departamentos.php";
break;
case "membros":
$pagina = "membros.php";
break;
case "pativas":
$pagina = "membros.php";
break;
case "pessoas":
$pagina = "pessoas.php";
break;
case "pafastadas":
$pagina = "membrosinativos.php";
break;

case "pafastadaslideres":
$pagina = "pessoasafastadaslideres.php";
break;
case "calendario":
$pagina = "calendario.php";
break;
case "GCs":
$pagina = "gruposdecrescimento.php";
break;

case "ebdturmas":
$pagina = "ebdturma.php";
break;
case "ebdsalas":
$pagina = "ebdsalas.php";
break;
case "ebdprofessores":
$pagina = "ebdprofessores.php";
break;
case "ebdalunos":
$pagina = "ebdalunos.php";
break;
case "ebdaula":
$pagina = "ebdaula.php";
break;


case "seguroregiao":
$pagina = "seguroregiao.php";
break;
case "finanresumo":
$pagina = "finanresumo.php";
break;
case "finanreceitas":
$pagina = "finanreceitas.php";
break;
case "finandespesas":
$pagina = "finandespesas.php";
break;
case "fornecedores":
$pagina = "fornecedores.php";
break;

case "finanresumoregiao":
$pagina = "finanresumoregiao.php";
break;
case "finanreceitasregiao":
$pagina = "finanreceitasregiao.php";
break;
case "finandespesasregiao":
$pagina = "finandespesasregiao.php";
break;

case "relatorios":
$pagina = "relatorios.php";
break;

case "relestatistico":
$pagina = "relestatistico.php";
break;

case "relfinanceiro":
$pagina = "relfinanceiro.php";
break;

case "relministerial":
$pagina = "relministerial.php";
break;

case "relestatisticoregiao":
$pagina = "relestatisticoregiao.php";
break;

case "relfinanceiroregiao":
$pagina = "relfinanceiroregiao.php";
break;

case "relnacionalregiao":
$pagina = "relnacionalregiao.php";
break;

case "relinternacionalregiao":
$pagina = "relinternacionalregiao.php";
break;


case "relacionar":
$pagina = "relacionar.php";
break;

case "regiao":
$pagina = "regiao.php";
break;

case "ministerios":
$pagina = "ministerios.php";
break;

case "lideres":
$página = "relatorio_aniversarios.php";
break;
case "pastores":
$pagina = "pastores.php";
break;
case "evangelistas":
$pagina = "evangelistas.php";
break;
case "pagamentos":
$pagina = "pagamentos.php";
break;
case "mensagemaniversariantes";
$pagina = "mensagemaniversariantes.php";
break;
case "mensagemenviar";
$pagina = "mensagemenviar.php";
break;


case "paniver":
$pagina = "listaaniversarios.php";
break;
case "paniverlideres":
$pagina = "listaaniversarioslideres.php";
break;
case "pm":
$pagina = "pm.php";
break;
case "pcadastro":

$pagina = "pessoacadastro.php";

break;

case "pessoasgeral":

$pagina = "impressao_pessoas.php";

break;


case "comprovante":

$pagina = "enviar-comprovante.php";

break;



// Agora definiremos o default, que será a pagina que será aberta quando não houver um valor para o $id 

default: 

$pagina = "home.php"; 

break; 

} 





?>

 

<?php

if( (isset($pagina)) and (file_exists($pagina)) ) {  //a aqui se a pagina nao existir //

include($pagina); 

} else { 

$pagina = "home.php"; 

} 

?>



</div>

<!-- END PAGE -->

	</div>

	<!-- END CONTAINER -->

	<?php include ("footer.php"); ?>