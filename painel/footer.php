<!-- BEGIN FOOTER -->

	<div id="footer">

<center><?php	echo $copy;  ?>
</center>
	</br>

<div class="span pull-right">

			<span class="go-top"><i class="icon-arrow-up"></i></span>

		</div>

	</div>

	<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
<script src="https://kit.fontawesome.com/ad19f5a821.js" crossorigin="anonymous"></script>

   		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

		<script src="js/jquery.maskMoney.js" type="text/javascript"></script>

		<script src='js/shCore.js' type='text/javascript'></script>

		<script src='js/shBrushJScript.js' type='text/javascript'></script>

		<script src='js/shBrushXml.js' type='text/javascript'></script>

<script type="text/javascript" src="js/ajax.js"></script>


<script src="js/jquery.maskedinput.js" type="text/javascript"></script>

	<script src="js/jquery-1.8.3.min.js"></script>

	<script src="assets/bootstrap/js/bootstrap.min.js"></script>

	<script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>

	<script src="js/jquery.blockui.js"></script>

	<!-- ie8 fixes -->

	<!--[if lt IE 9]>

	<script src="js/excanvas.js"></script>

	<script src="js/respond.js"></script>

	<![endif]-->

	<script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>	

	<script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>

	<script src="js/scripts.js"></script>
	   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
<script>
$('#sample_1').DataTable( {
    language: {
        {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "Mostrando _MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    },
    "select": {
        "rows": {
            "_": "Selecionado %d linhas",
            "0": "Nenhuma linha selecionada",
            "1": "Selecionado 1 linha"
        }
    }
}
    }
} );
</script>
   <script src="js/scripts.js"></script>


	<script>

		jQuery(document).ready(function() {			

			// initiate layout and plugins

			App.init();

		});

		$(document).ready(function() {

	$(".various").fancybox({

		maxWidth	: 800,

		maxHeight	: 600,

		fitToView	: false,

		width		: '70%',

		height		: '70%',

		autoSize	: false,

		closeClick	: false,

		openEffect	: 'none',

		closeEffect	: 'none'

	});

	$("#single").fancybox({

    	openEffect	: 'elastic',

    	closeEffect	: 'elastic',



    	helpers : {

    		title : {

    			type : 'inside'

    		}

    	}

    });

});

	</script>

</html>