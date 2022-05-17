<?php include ("header.php"); ?>

	<div id="container" class="row-fluid">

		<?php include ("menu.php"); ?>

		<!-- BEGIN PAGE -->

		<div>

		<div>

		<?php

$id = mysqli_real_escape_string($conecta,$_GET['sub']);

switch($id) { 





case "itens":

$pagina = "patrimonioitens.php";

break;
case "categorias":

$pagina = "patrimoniocategorias.php";

break;
case "locais":
$pagina = "patrimoniolocais.php";
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