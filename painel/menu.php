 <!-- BEGIN SIDEBAR -->

		<div id="sidebar" class="nav-collapse collapse">

			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

			<div class="sidebar-toggler hidden-phone"></div>

			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->



			<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

			<div class="navbar-inverse">

				<form class="navbar-search visible-phone">

					<input type="text" class="search-query" placeholder="Search" />

				</form>

			</div>

			<!-- END RESPONSIVE QUICK SEARCH FORM -->

			<!-- BEGIN SIDEBAR MENU -->

			<ul class="sidebar-menu">

				<li class="has-sub">

					<a href="index.php?view=home" class="">

					    <span class="icon-box"> <i class="icon-dashboard"></i></span> Resumo

                    </a></li>
                
            <li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-envelope"></i></span> SMS
					    <span class="arrow"></span>
					</a>

					<ul class="sub">
						<li><a class="" href="index.php?view=mensagemaniversariantes">Mensagem Cadastrada</a></li>

					</ul>
             </li>

					

			<?php 
            

switch($perfil) { 
case "Administrador":

?>

					

			<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-group"></i></span> Pessoas
					    <span class="arrow"></span>
					</a>

					<ul class="sub">
						<li><a class="" href="index.php?view=pcadastro">Cadastro</a></li>
						<li><a class="" href="index.php?view=pativas">Pessoas ativas</a></li>
						<li><a class="" href="index.php?view=pafastadas">Pessoas afastados</a></li>
						<li><a class="" href="index.php?view=paniver.php">Aniversariantes</a></li>
						<li><a class="" href="index.php?view=prelatorios">Relat&oacute;rios</a></li>
					</ul>
             </li>
	       				<li class="has-sub">

					<a href="index.php?view=discipulados" class="">

					    <span class="icon-box"> <i class="icon-sitemap"></i></span> Departamentos

                    </a></li>
      				<li class="has-sub">

					<a href="index.php?view=discipulados" class="">

					    <span class="icon-box"> <i class="fas fa-book-reader"></i></span> Discipulados

                    </a></li>
					
      			<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-group"></i></span> C&eacute;lulas/Grupos
					    <span class="arrow"></span>
					</a>

					<ul class="sub">
						<li><a class="" href="index.php?view=cg">Ver todas</a></li>
						<li><a class="" href="index.php?view=tpcg.php?mes=<?php echo $mes;?>">Tipos de C&eacute;lulas/Grupos</a></li>
						<li><a class="" href="index.php?view=cgrelatorios">Relat&oacute;rios</a></li>
					</ul>
             </li>
      
      			<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="fas fa-chalkboard-teacher"></i></span> EBD
					    <span class="arrow"></span>
					</a>

					<ul class="sub">
						<li><a class="" href="index.php?view=turmas">Turmas</a></li>
						<li><a class="" href="index.php?view=salas.php">Salas</a></li>

					</ul>
             </li>
      
      


      
     

          <li class="has-sub"><a><span class="icon-box"><i class="icon-money"></i> </span>Financeiro <span class="arrow"></span></a>

            <ul class="sub" >

              <li><a href="financeiro.php?sub=resumo">Resumo</a></li>
              <li><a href="financeiro.php?sub=transacoes">Receitas</a></li>
              <li class="current-page"><a href="financeiro.php?sub=relatorios">Despesas</a></li>
              <li><a href="financeiro.php?sub=contatos">Dizimistas</a></li>
              <li><a href="financeiro.php?sub=categorias">Categorias</a></li>


            </ul>

          </li>                  

     

      <li class="has-sub"><a><span class="icon-box"><i class="fa fa-cubes"></i> </span>Estoque <span class="arrow"></span></a>


             <ul class="sub">
       
            <li><a href="patrimonio.php?sub=itens">Itens</a></li>
            <li><a href="patrimonio.php?sub=categorias">Categorias</a></li>
            <li><a href="patrimonio.php?sub=locais">Locais</a></li>
          </ul>
        </li>
          <li class="has-sub"><a><span class="icon-box"><i class="fas fa-university"></i> </span>Patrim&ocirc;nio<span class="arrow"></span></a>


             <ul class="sub">
       
            <li><a href="patrimonio.php?sub=itens">Itens</a></li>
            <li><a href="patrimonio.php?sub=categorias">Categorias</a></li>
            <li><a href="patrimonio.php?sub=locais">Locais</a></li>
          </ul>
        </li>
		          <li class="has-sub"><a><span class="icon-box"><i class="icon-bar-chart blue-color"></i></span>Relat&oacute;rios<span class="arrow"></span></a>


             <ul class="sub">
       						<li><a class="" href="index.php?view=ebdrelatorios">EBD</a></li>
            <li><a href="patrimonio.php?sub=itens">Financeiro</a></li>
            <li><a href="patrimonio.php?sub=categorias">Estat&iacute;stico</a></li>
			<li><a href="patrimonio.php?sub=categorias">Ministerial</a></li>
            <li><a href="patrimonio.php?sub=locais">Membresia</a></li>
            
			<li><a href="patrimonio.php?sub=locais">Geral</a></li>
          </ul>
        </li>
          <li class="has-sub"><a><span class="icon-box"><i class="icon-cogs"></i> </span>Configura&ccedil;&otilde;es<span class="arrow"></span></a> 
          <ul class="sub" style="">
            <li><a href="config-igreja-editar.php?id=14140">Informações da igreja</a></li>
            <li><a href="upgrade.php">Planos de assinatura</a></li>
            <li><a href="cartao_membro.php?sub=modelos">Cartão de discípulo</a></li>
            <li><a href="index.php?view=faq	">Ajuda</a></li>
          </ul>
               </li>          
      

<?php 
break;

case "Pastor Local":

?>


			<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-group"></i></span> Pessoas
					    <span class="arrow"></span>
					</a>

					<ul class="sub">
					  
						<li><a class="" href="index.php?view=pativas">Pessoas ativas</a></li>
						<li><a class="" href="index.php?view=pafastadas">Pessoas afastados</a></li>
						<li><a class="" href="index.php?view=paniver">Aniversariantes</a></li>
					
					</ul>
             </li>
             <?php if ($plano_igreja>2){?>
	       				<li class="has-sub">

					<a href="index.php?view=departamentos" class="">

					    <span class="icon-box"> <i class="icon-sitemap"></i></span> Departamentos

                    </a></li>
                    <?php }?>
      			<li class="has-sub">

					<a href="index.php?view=congregacoes" class="">

					    <span class="icon-box"> <i class="fas fa-book-reader"></i></span> Congrega&ccedil;&otilde;es

                    </a></li>
					
      			<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-group"></i></span> C&eacute;lulas/Grupos
					    <span class="arrow"></span>
					</a>

					<ul class="sub">
						<li><a class="" href="index.php?view=GCs">Ver todas</a></li>
					<!--	<li><a class="" href="index.php?view=tpcg.php?mes=<?php echo $mes;?>">Tipos de C&eacute;lulas/Grupos</a></li> -->
					
					</ul>
             </li>
      <?php if ($plano_igreja>3){?>
      			<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="fas fa-chalkboard-teacher"></i></span> EBD
					    <span class="arrow"></span>
					</a>

					<ul class="sub">
						<li><a class="" href="index.php?view=ebdturmas">Turmas</a></li>
						<li><a class="" href="index.php?view=ebdsalas">Salas</a></li>
                        <li><a class="" href="index.php?view=ebdprofessores">Professores</a></li>
                        <li><a class="" href="index.php?view=ebdaluno">Alunos</a></li>
                        <li><a class="" href="index.php?view=ebdaula">Aula</a></li>
					</ul>
             </li>
      
      <?php }?>


      
     

          <li class="has-sub"><a href="javascript:;"><span class="icon-box"><i class="icon-money"></i> </span>Financeiro <span class="arrow"></span></a>

            <ul class="sub">

              <li><a href="index.php?view=finanresumo">Resumo</a></li>

              <li><a href="index.php?view=finanreceitas">Receitas</a></li>
              <li><a href="index.php?view=finandespesas">Despesas</a></li>
              <!--<li><a href="index.php?view=dizimistas">Dizimistas</a></li>
             <li><a href="financeiro.php?sub=categorias">Categorias</a></li>-->
            </ul>

          </li>                  

     

      <!--<li class="has-sub"><a href="javascript:;"><span class="icon-box"><i class="fa fa-cubes"></i> </span>Estoque <span class="arrow"></span></a>


             <ul class="sub">
       
            <li><a href="patrimonio.php?sub=itens">Itens</a></li>
            <li><a href="patrimonio.php?sub=categorias">Categorias</a></li>
            <li><a href="patrimonio.php?sub=locais">Locais</a></li>
          </ul>
        </li> -->
        <?php if ($plano_igreja>3){?>
          <li class="has-sub"><a href="javascript:;"><span class="icon-box"><i class="fas fa-university"></i> </span>Patrim&ocirc;nio<span class="arrow"></span></a>


             <ul class="sub">
       
            <li><a href="patrimonio.php?sub=itens">Itens</a></li>
            <li><a href="patrimonio.php?sub=categorias">Categorias</a></li>
            <li><a href="patrimonio.php?sub=locais">Locais</a></li>
          </ul>
        </li>
        
        <?php }?>
		          <li class="has-sub"><a href="javascript:;"><span class="icon-box"><i class="icon-bar-chart blue-color"></i></span>Relat&oacute;rios<span class="arrow"></span></a>


             <ul class="sub">
       	 <?php if ($plano_igreja>3){?>
       						<li><a class="" href="index.php?view=ebdrelatorios">EBD</a></li>
       						<?php }?>
       								<li><a class="" href="">GCs</a></li>
            <li><a href="index.php?view=relfinanceiro">Financeiro</a></li>
            <li><a href="index.php?view=relestatistico">Estat&iacute;stico</a></li>
			<li><a href="index.php?view=relministerial">Ministerial</a></li>
		
          </ul>
        </li>
          <li class="has-sub"><a href=javascript:;><span class="icon-box"><i class="icon-cogs"></i> </span>Configura&ccedil;&otilde;es<span class="arrow"></span></a> 
          <ul class="sub" style="">
            <li><a href="editar_informacoes.php?id=<?php echo $igreja_id;?>">Informações da igreja</a></li>
            <li><a href="upgrade.php?ig=<?php echo $igreja_id;?>">Planos de assinatura</a></li>
            <!--<li><a href="cartao_membro.php?sub=modelos">Cartão de discípulo</a></li>-->
            <li><a href="index.php?view=faq	">Ajuda</a></li>
          </ul>
               </li>          

<?php 
break;
case "Secretaria Local":

?>

			<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-group"></i></span> Pessoas
					    <span class="arrow"></span>
					</a>

					<ul class="sub">
					  
						<li><a class="" href="index.php?view=pativas">Pessoas ativas</a></li>
						<li><a class="" href="index.php?view=pafastadas">Pessoas afastados</a></li>
						<li><a class="" href="index.php?view=paniver">Aniversariantes</a></li>
						<!--<li><a class="" href="">Relat&oacute;rios</a></li>-->
					</ul>
             </li>
             <?php if ($plano_igreja>2){?>
	       				<li class="has-sub">

					<a href="index.php?view=departamentos" class="">

					    <span class="icon-box"> <i class="icon-sitemap"></i></span> Departamentos

                    </a></li>
                    <?php }?>
      			<li class="has-sub">

					<a href="index.php?view=congregacoes" class="">

					    <span class="icon-box"> <i class="fas fa-book-reader"></i></span> Congrega&ccedil;&otilde;es

                    </a></li>
					
      			<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-group"></i></span> C&eacute;lulas/Grupos
					    <span class="arrow"></span>
					</a>

					<ul class="sub">
						<li><a class="" href="index.php?view=GCs">Ver todas</a></li>
					<!--	<li><a class="" href="index.php?view=tpcg.php?mes=<?php echo $mes;?>">Tipos de C&eacute;lulas/Grupos</a></li> -->
					
					</ul>
             </li>
      <?php if ($plano_igreja>3){?>
      			<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="fas fa-chalkboard-teacher"></i></span> EBD
					    <span class="arrow"></span>
					</a>

					<ul class="sub">
						<li><a class="" href="index.php?view=ebdturmas">Turmas</a></li>
						<li><a class="" href="index.php?view=ebdsalas">Salas</a></li>
                        <li><a class="" href="index.php?view=ebdprofessores">Professores</a></li>
                        <li><a class="" href="index.php?view=ebdaluno">Alunos</a></li>
                        <li><a class="" href="index.php?view=ebdaula">Aula</a></li>

					</ul>
             </li>
      
      <?php }?>



        <?php if ($plano_igreja>3){?>
          <li class="has-sub"><a href="javascript:;"><span class="icon-box"><i class="fas fa-university"></i> </span>Patrim&ocirc;nio<span class="arrow"></span></a>


             <ul class="sub">
       
            <li><a href="patrimonio.php?sub=itens">Itens</a></li>
            <li><a href="patrimonio.php?sub=categorias">Categorias</a></li>
            <li><a href="patrimonio.php?sub=locais">Locais</a></li>
          </ul>
        </li>
        <?php }?>
		          <li class="has-sub"><a><span class="icon-box"><i class="icon-bar-chart blue-color"></i></span>Relat&oacute;rios<span class="arrow"></span></a>


             <ul class="sub">
       	 <?php if ($plano_igreja>3){?>
       						<li><a class="" href="index.php?view=ebdrelatorios">EBD</a></li>
       						<?php }?>
       								<li><a class="" href="">GCs</a></li>
            <li><a href="index.php?view=relestatistico">Estat&iacute;stico</a></li>
		
          </ul>
        </li>
          <li class="has-sub"><a><span class="icon-box"><i class="icon-cogs"></i> </span>Configura&ccedil;&otilde;es<span class="arrow"></span></a> 
          <ul class="sub" style="">
            <li><a href="editar_informacoes.php?id=<?php echo $igreja_id;?>">Informações da igreja</a></li>
            <li><a href="index.php?view=faq	">Ajuda</a></li>
          </ul>
               </li>          
      











<?php 
break;
case "Financeiro Local":

?>


		

          <li class="has-sub"><a href="javascript:;"><span class="icon-box"><i class="icon-money"></i> </span>Financeiro <span class="arrow"></span></a>

            <ul class="sub">

              <li><a href="index.php?view=finanresumo">Resumo</a></li>

              <li><a href="index.php?view=finanreceitas">Receitas</a></li>
              <li><a href="index.php?view=finandespesas">Despesas</a></li>
              <li><a href="index.php?view=dizimistas">Dizimistas</a></li>
           <!--  <li><a href="financeiro.php?sub=categorias">Categorias</a></li>-->
            </ul>

          </li>                  

     

      <!--<li class="has-sub"><a href="javascript:;"><span class="icon-box"><i class="fa fa-cubes"></i> </span>Estoque <span class="arrow"></span></a>


             <ul class="sub">
       
            <li><a href="patrimonio.php?sub=itens">Itens</a></li>
            <li><a href="patrimonio.php?sub=categorias">Categorias</a></li>
            <li><a href="patrimonio.php?sub=locais">Locais</a></li>
          </ul>
        </li> -->
       
		          <li class="has-sub"><a href="javascript:;"><span class="icon-box"><i class="icon-bar-chart blue-color"></i></span>Relat&oacute;rios<span class="arrow"></span></a>


             <ul class="sub">
       	 <?php if ($plano_igreja>3){?>
       						<li><a class="" href="index.php?view=ebdrelatorios">EBD</a></li>
       						<?php }?>
            <li><a href="index.php?view=relfinanceiro">Financeiro</a></li>

		
          </ul>
        </li>
          <li class="has-sub"><a href=javascript:;><span class="icon-box"><i class="icon-cogs"></i> </span>Configura&ccedil;&otilde;es<span class="arrow"></span></a> 
          <ul class="sub" style="">
            <li><a href="index.php?view=faq	">Ajuda</a></li>
          </ul>
               </li>          
      


















<?php 
break;


case "Lider":

?>


			<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-group"></i></span> Pessoas
					    <span class="arrow"></span>
					</a>

					<ul class="sub">
					  
						<li><a class="" href="index.php?view=pessoas&id=<?php echo $lider_id;?>">Pessoas ativas</a></li>
						<li><a class="" href="index.php?view=pafastadaslideres">Pessoas afastados</a></li>
						<li><a class="" href="index.php?view=paniverlideres">Aniversariantes</a></li>
						<!--<li><a class="" href="">Relat&oacute;rios</a></li>-->
					</ul>
             </li>
         
          <li class="has-sub"><a><span class="icon-box"><i class="icon-cogs"></i> </span>Configura&ccedil;&otilde;es<span class="arrow"></span></a> 
          <ul class="sub" style="">

            <li><a href="index.php?view=faq	">Ajuda</a></li>
          </ul>
               </li>          
      












<?php 
break;

case "Pastor Estadual":
?>
<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-envelope"></i></span> SMS
					    <span class="arrow"></span>
					</a>

					<ul class="sub">
						<li><a class="" href="index.php?view=mensagemaniversariantes">Mensagem Cadastrada</a></li>

					</ul>
             </li>
				<li class="has-sub">

					<a href="index.php?view=igrejas" class="">

					    <span class="icon-box"> <i class="icon-home"></i></span> Igrejas

					</a></li>

				<li class="has-sub">

					<a href="javascript:;" class="">

					    <span class="icon-box"> <i class="icon-book"></i></span> Relat&oacute;rios

					    <span class="arrow"></span>

					</a>

					<ul class="sub">

						<li><a class="" href="index.php?view=relfinanceiro">Financeiro</a></li>

						<li><a class="" href="index.php?view=relestatistico">Estatistico</a></li>

         

					</ul>

				</li>
<?php

break;

default: 



break; 

}




?>

		




				



				

<?php 
if($perfil=="Pastor Regional" || $perfil=="Secretaria Regional"){



?>

				<li class="has-sub">

					<a href="index.php?view=igrejas" class="">

					    <span class="icon-box"> <i class="icon-home"></i></span> Igrejas

					</a></li>

<li class="has-sub">

					<a href="index.php?view=pastores" class="">

					    <span class="icon-box"> <i class="icon-group"></i></span> Pastores

					</a></li>
					<li class="has-sub">

					<a href="index.php?view=evangelistas" class="">

					    <span class="icon-box"> <i class="icon-group"></i></span> Evangelistas

					</a></li>
         <li class="has-sub"><a href="javascript:;"><span class="icon-box"><i class="fas fa-university"></i> </span>Patrim&ocirc;nio<span class="arrow"></span></a>


             <ul class="sub">
       
            <li><a href="patrimonio.php?sub=itens">Itens</a></li>
            <li><a href="patrimonio.php?sub=categorias">Categorias</a></li>
            <li><a href="patrimonio.php?sub=locais">Locais</a></li>
          </ul>
        </li>
		
				<li class="has-sub"><a><span class="icon-box"><i class="icon-money"></i> </span>Financeiro <span class="arrow"></span></a>

            <ul class="sub" style="display: none;">
               
              <li><a href="index.php?view=finanresumoregiao">Resumo</a></li>
              <li><a href="index.php?view=finanreceitasregiao">Receitas</a></li>
               <li><a href="index.php?view=seguroregiao">Seguro Extra</a></li>
              <li class="current-page"><a href="index.php?view=finandespesasregiao">Despesas</a></li>



            </ul>

          </li> 
		  <li class="has-sub">

					<a href="javascript:;" class="">

					    <span class="icon-box"> <i class="icon-book"></i></span> Relat&oacute;rios

					    <span class="arrow"></span>

					</a>

					<ul class="sub">

						<li><a class="" href="index.php?view=relfinanceiroregiao">Financeiro</a></li>
						<li><a class="" href="index.php?view=relestatisticoregiao">Estatistico</a></li>
						<li><a class="" href="index.php?view=relnacionalregiao">Nacional</a></li>
                        <li><a class="" href="index.php?view=relinternacionalregiao">Internacional</a></li>

					</ul>

				</li>

				<li class="has-sub">

					<a href="index.php?view=pagamentos" class="">

					    <span class="icon-box"> <i class="icon-money"></i></span> Pagamentos
<span class="badge badge-important"><?php echo $pagamentos_pendentes; ?></span>
					</a></li>

					<li class="has-sub">

					<a href="index.php?view=relacionar" class="">

					<span class="icon-box"><i class="icon-sitemap"></i></span> Relacionar

					</a></li>

                

				



<?php }?>

				<li class="has-sub">

					<a href="index.php?view=pm" class="">

					<span class="icon-box"><i class="icon-envelope"></i></span> Mensagens

					</a></li>

				

                

				

					<li class="has-sub">

                    <a href="logout.php" class="">

                        <span class="icon-box"><i class="icon-off"></i></span> Sair

                    </a></li>

				

			</ul>

			<!-- END SIDEBAR MENU -->

		</div>

		<!-- END SIDEBAR -->