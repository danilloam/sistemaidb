<?php 

switch($perfil) {
case "Super Usuario":
    
    break;
case "Administrador": 
?>
<ul class="metismenu" id="menu">
	
	<li>
		<a href="index.php">
			<div class="parent-icon"><i class="bi bi-house-door"></i>
			</div>
			<div class="menu-title">In&iacute;cio</div>
		</a>
	</li>
	<li class="menu-label">Secretaria</li>
	<li>
		<a class="has-arrow" href="javascript:;">
			<div class="parent-icon"><i class="bi bi-person"></i>
			</div>
			<div class="menu-title">Membresia</div>
		</a>
		<ul>
			<li> <a class="has-arrow" href="javascript:;"><i class="bi bi-arrow-right-short"></i>Pessoas</a>
				<ul>
                 <!--   <li> <a href="adicionarpessoa.php"><i class="bi bi-arrow-right-short"></i>Novo Cadastro</a></li> -->
					<li> <a href="pessoas.php"><i class="bi bi-arrow-right-short"></i>Procurar Cadastro</a></li>
				  <!--  	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Alterar Arrolamentos</a></li>
					<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Tranferência Igreja</a></li>
					<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Unificar Cadastros</a></li> -->
				</ul>
			</li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Carteirinha</a>
                
			</li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Mapa</a>
				
			</li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Árvore Genealógica</a>
				
			</li>
			<li> <a class="has-arrow" href="javascript:;"><i class="bi bi-arrow-right-short"></i>Cadastros Base</a>
				<ul>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Arrolamentos</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Áreas de Apoio</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Áreas de Necessidades</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Avaliações</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Como Soube</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Formas de Contato</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Habilidades</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Dons Ministeriais</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Planos de Saúde</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Problemas de Saúde</a></li>
					<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Questionários</a></li>
					<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Tipos de Decisão</a></li>
                    
				</ul>
			</li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Relatórios</a>
				
			</li> 
		</ul>
	</li>
	
	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-consulting"></i>
			</div>
            <div class="menu-title">&Aacute;rea Pastoral</div>
		</a>
        <ul>
            <li> <a href="app-emailbox.html"><i class="bi bi-arrow-right-short"></i>Email</a>
			</li>
            <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Chat Box</a>
			</li>
            <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>File Manager</a>
			</li>
            <li> <a href="app-to-do.html"><i class="bi bi-arrow-right-short"></i>Todo List</a>
			</li>
            <li> <a href="app-invoice.html"><i class="bi bi-arrow-right-short"></i>Invoice</a>
			</li>
            <li> <a href="app-fullcalender.html"><i class="bi bi-arrow-right-short"></i>Calendar</a>
			</li>
		</ul>
	</li> 
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fas fa-church"></i>
			</div>
            <div class="menu-title">Congrega&ccedil;&otilde;es</div>
		</a>
        <ul>
            <li> <a href="app-emailbox.html"><i class="bi bi-arrow-right-short"></i>Email</a>
			</li>
            <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Chat Box</a>
			</li>
            <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>File Manager</a>
			</li>
            <li> <a href="app-to-do.html"><i class="bi bi-arrow-right-short"></i>Todo List</a>
			</li>
            <li> <a href="app-invoice.html"><i class="bi bi-arrow-right-short"></i>Invoice</a>
			</li>
            <li> <a href="app-fullcalender.html"><i class="bi bi-arrow-right-short"></i>Calendar</a>
			</li>
		</ul>
	</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa fa-users" aria-hidden="true"></i>
				
			</div>
            <div class="menu-title">Pequenos Grupos</div>
		</a>
        <ul>
        	<li> <a href="javascript:;">Adicionar Grupo</a></li>
        	<li> <a href="javascript:;">Categorias de grupos</a></li>
        	<li> <a href="javascript:;">Relatórios</a></li>
        	<li> <a href="javascript:;">Importar/Exportar</a></li>
		</ul>
	</li>
	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-grid"></i>
			</div>
            <div class="menu-title">Ministérios</div>
		</a>
        <ul>
            <li> <a href="app-emailbox.html"><i class="bi bi-arrow-right-short"></i>Email</a>
			</li>
            <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Chat Box</a>
			</li>
            <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>File Manager</a>
			</li>
            <li> <a href="app-to-do.html"><i class="bi bi-arrow-right-short"></i>Todo List</a>
			</li>
            <li> <a href="app-invoice.html"><i class="bi bi-arrow-right-short"></i>Invoice</a>
			</li>
            <li> <a href="app-fullcalender.html"><i class="bi bi-arrow-right-short"></i>Calendar</a>
			</li>
		</ul>
	</li>
	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-calendar3"></i>
			</div>
            <div class="menu-title">Eventos</div>
		</a>
        <ul>
           <li> <a href="eventoslocal.php"><i class="bi bi-arrow-right-short"></i>Igreja Local</a>
			</li>
          <!--  <li> <a href="eventosdistrital.php"><i class="bi bi-arrow-right-short"></i>Distrital</a>
			</li>
            <li> <a href="eventosestadual.php"><i class="bi bi-arrow-right-short"></i>Estadual</a>
			</li>
            <li> <a href="eventosregional.php"><i class="bi bi-arrow-right-short"></i>Regional</a>
			</li>
            <li> <a href="eventosnacional.php"><i class="bi bi-arrow-right-short"></i>Nacional</a>
			</li>
            <li> <a href="eventosinternacional.php"><i class="bi bi-arrow-right-short"></i>Internacional</a>
			</li> -->
		</ul>
	</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fas fa-book-reader"></i>
			</div>
            <div class="menu-title">Ensino</div>
		</a>
        <ul>
			
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Cursos</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Classes</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Professores</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Alunos</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Aulas</a></li>
			
		</ul>
	</li>
   <!-- <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa fa-child" aria-hidden="true"></i>
			</div>
            <div class="menu-title">Kids</div>
		</a>
        <ul>
            <li> <a href="app-emailbox.html"><i class="bi bi-arrow-right-short"></i>Email</a>
			</li>
            <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Chat Box</a>
			</li>
            <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>File Manager</a>
			</li>
            <li> <a href="app-to-do.html"><i class="bi bi-arrow-right-short"></i>Todo List</a>
			</li>
            <li> <a href="app-invoice.html"><i class="bi bi-arrow-right-short"></i>Invoice</a>
			</li>
            <li> <a href="app-fullcalender.html"><i class="bi bi-arrow-right-short"></i>Calendar</a>
			</li>
		</ul>
	</li> 
	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-people-fill"></i>
			</div>
            <div class="menu-title">Discipulado</div>
		</a>
        <ul>
            <li> <a href="app-emailbox.html"><i class="bi bi-arrow-right-short"></i>Email</a>
			</li>
            <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Chat Box</a>
			</li>
            <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>File Manager</a>
			</li>
            <li> <a href="app-to-do.html"><i class="bi bi-arrow-right-short"></i>Todo List</a>
			</li>
            <li> <a href="app-invoice.html"><i class="bi bi-arrow-right-short"></i>Invoice</a>
			</li>
            <li> <a href="app-fullcalender.html"><i class="bi bi-arrow-right-short"></i>Calendar</a>
			</li>
		</ul>
	</li>-->
	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-currency-dollar"></i>
			</div>
            <div class="menu-title">Financeiro</div>
		</a>
        <ul>
         	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Resumo</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Transações</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Relatórios</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Categorias</a></li>
        	<li> <a href="contas.php"><i class="bi bi-arrow-right-short"></i>Contas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Contatos</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Centros de Custo</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Importar/Exportar</a></li>
		</ul>
	</li>
      <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fas fa-atlas"></i>
			</div>
            <div class="menu-title">Biblioteca</div>
		</a>
        <ul>
            
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Empréstimo</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Retiradas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Acervo</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Multas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Recibos</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Reservas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Calendário</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Inventário</a></li>
			</li>
		</ul>
	</li>   
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa fa-university" aria-hidden="true"></i>
			</div>
            <div class="menu-title">Patrimônio</div>
		</a>
        <ul>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Bens</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ambientes</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Reservas</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Configurações</a></li>
            
		</ul>
	</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="far fa-comments"></i>
			</div>
            <div class="menu-title">Comunicados</div>
		</a>
        <ul>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Manobrista</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Pequenos Grupos</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ministérios</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ensino</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Eventos</a></li>
		</ul>
	</li> 
	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-cog"></i>
			</div>
            <div class="menu-title">Configurações</div>
		</a>
        <ul>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Perfil Acesso</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Membresia</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Nomenclatura</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Pequenos Grupos</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ensino</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Discipulado</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Financeiro</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Kids</a></li>
            <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>SMS</a></li>
            <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Etiqueta</a></li>
			
		</ul>
	</li> 
		<li>
		<a href="logout.php">
			<div class="parent-icon"><i class="bi bi-lock-fill"></i>
			</div>
			<div class="menu-title">Sair</div>
		</a>
	</li>

	
</ul>



<?php

break;
case "Pastor Local": 
    
    ?>
<ul class="metismenu" id="menu">
	
	<li>
		<a href="index.php">
			<div class="parent-icon"><i class="bi bi-house-door"></i>
			</div>
			<div class="menu-title">In&iacute;cio</div>
		</a>
	</li>
	<li class="menu-label">Secretaria</li>
	<li>
		<a class="has-arrow" href="javascript:;">
			<div class="parent-icon"><i class="bi bi-person"></i>
			</div>
			<div class="menu-title">Membresia</div>
		</a>
		<ul>
			<li> <a class="has-arrow" href="javascript:;"><i class="bi bi-arrow-right-short"></i>Pessoas</a>
				<ul>
                  <li> <a href="adicionarpessoa.php"><i class="bi bi-arrow-right-short"></i>Novo Cadastro</a></li>
					<li> <a href="pessoas.php"><i class="bi bi-arrow-right-short"></i>Procurar Cadastro</a></li>
				  <!--  	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Alterar Arrolamentos</a></li>
					<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Tranferência Igreja</a></li>
					<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Unificar Cadastros</a></li> -->
				</ul>
			</li>
			<!-- <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Carteirinha</a>
                
			</li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Mapa</a>
				
			</li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Árvore Genealógica</a>
				
			</li>
			<li> <a class="has-arrow" href="javascript:;"><i class="bi bi-arrow-right-short"></i>Cadastros Base</a>
				<ul>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Arrolamentos</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Áreas de Apoio</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Áreas de Necessidades</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Avaliações</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Como Soube</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Formas de Contato</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Habilidades</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Dons Ministeriais</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Planos de Saúde</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Problemas de Saúde</a></li>
					<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Questionários</a></li>
					<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Tipos de Decisão</a></li>
                    
				</ul>
			</li> -->
				<li> <a class="has-arrow" href="javascript:;"><i class="bi bi-arrow-right-short"></i>Relatórios</a>
				<ul>
				     <li> <a href="aniversariantes.php"><i class="bi bi-arrow-right-short"></i>Aniversariantes do Mês</a></li>
				     <li> <a class="has-arrow" href="javascript:;" aria-expanded="true"><i class="bi bi-arrow-right-short"></i>Aniversariantes por Ministérios</a>
                      <ul style="">
                        <?php   $ministeriosigreja = mysqli_query($conecta,"SELECT * FROM lider");
	while($resultaministeriosigreja = mysqli_fetch_array($ministeriosigreja)){ 
	    echo' <li> <a href="aniversariantes.php?t='.$resultaministeriosigreja["id"].'"><i class="bi bi-arrow-right-short"></i>'.$resultaministeriosigreja["descricao"].'</a>
                        </li>';
	} ?>
                       
                       
                       
                      </ul>
                    </li>
		
				    </ul>
			</li>
		
				
			</li> 
		</ul>
	</li>
	
<!--	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-consulting"></i>
			</div>
            <div class="menu-title">&Aacute;rea Pastoral</div>
		</a>
        <ul>
            <li> <a href="app-emailbox.html"><i class="bi bi-arrow-right-short"></i>Email</a>
			</li>
            <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Chat Box</a>
			</li>
            <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>File Manager</a>
			</li>
            <li> <a href="app-to-do.html"><i class="bi bi-arrow-right-short"></i>Todo List</a>
			</li>
            <li> <a href="app-invoice.html"><i class="bi bi-arrow-right-short"></i>Invoice</a>
			</li>
            <li> <a href="app-fullcalender.html"><i class="bi bi-arrow-right-short"></i>Calendar</a>
			</li>
		</ul>
	</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fas fa-church"></i>
			</div>
            <div class="menu-title">Congrega&ccedil;&otilde;es</div>
		</a>
        <ul>
            <li> <a href="app-emailbox.html"><i class="bi bi-arrow-right-short"></i>Cadastrar Nova</a>
			</li>
            <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Procurar Cadastro</a>
			</li>
           <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>File Manager</a>
			</li>
            <li> <a href="app-to-do.html"><i class="bi bi-arrow-right-short"></i>Todo List</a>
			</li>
            <li> <a href="app-invoice.html"><i class="bi bi-arrow-right-short"></i>Invoice</a>
			</li>
            <li> <a href="app-fullcalender.html"><i class="bi bi-arrow-right-short"></i>Calendar</a>
			</li> 
		</ul>
	</li> -->
    <!-- <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa fa-users" aria-hidden="true"></i>
				
			</div>
            <div class="menu-title">Pequenos Grupos</div>
		</a>
        <ul>
        	<li> <a href="javascript:;">Adicionar Grupo</a></li>
        	<li> <a href="javascript:;">Categorias de grupos</a></li>
        	<li> <a href="javascript:;">Relatórios</a></li>
        	<li> <a href="javascript:;">Importar/Exportar</a></li>
		</ul>
	</li>
	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-grid"></i>
			</div>
            <div class="menu-title">Ministérios</div>
		</a>
        <ul>
            <li> <a href="app-emailbox.html"><i class="bi bi-arrow-right-short"></i>Email</a>
			</li>
            <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Chat Box</a>
			</li>
            <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>File Manager</a>
			</li>
            <li> <a href="app-to-do.html"><i class="bi bi-arrow-right-short"></i>Todo List</a>
			</li>
            <li> <a href="app-invoice.html"><i class="bi bi-arrow-right-short"></i>Invoice</a>
			</li>
            <li> <a href="app-fullcalender.html"><i class="bi bi-arrow-right-short"></i>Calendar</a>
			</li>
		</ul>
	</li> -->
		<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-calendar3"></i>
			</div>
            <div class="menu-title">Eventos</div>
		</a>
        <ul>
            <li> <a href="eventoslocal.php"><i class="bi bi-arrow-right-short"></i>Igreja Local</a>
			</li>
          <!--  <li> <a href="eventosdistrital.php"><i class="bi bi-arrow-right-short"></i>Distrital</a>
			</li>
            <li> <a href="eventosestadual.php"><i class="bi bi-arrow-right-short"></i>Estadual</a>
			</li>
            <li> <a href="eventosregional.php"><i class="bi bi-arrow-right-short"></i>Regional</a>
			</li>
            <li> <a href="eventosnacional.php"><i class="bi bi-arrow-right-short"></i>Nacional</a>
			</li>
            <li> <a href="eventosinternacional.php"><i class="bi bi-arrow-right-short"></i>Internacional</a>
			</li> -->
		</ul>
	</li>
  <!--  <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fas fa-book-reader"></i>
			</div>
            <div class="menu-title">Ensino</div>
		</a>
        <ul>
			
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Cursos</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Classes</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Professores</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Alunos</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Aulas</a></li>
			
		</ul>
	</li> -->
   <!-- <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa fa-child" aria-hidden="true"></i>
			</div>
            <div class="menu-title">Kids</div>
		</a>
        <ul>
            <li> <a href="app-emailbox.html"><i class="bi bi-arrow-right-short"></i>Email</a>
			</li>
            <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Chat Box</a>
			</li>
            <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>File Manager</a>
			</li>
            <li> <a href="app-to-do.html"><i class="bi bi-arrow-right-short"></i>Todo List</a>
			</li>
            <li> <a href="app-invoice.html"><i class="bi bi-arrow-right-short"></i>Invoice</a>
			</li>
            <li> <a href="app-fullcalender.html"><i class="bi bi-arrow-right-short"></i>Calendar</a>
			</li>
		</ul>
	</li>
	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-people-fill"></i>
			</div>
            <div class="menu-title">Discipulado</div>
		</a>
        <ul>
            <li> <a href="app-emailbox.html"><i class="bi bi-arrow-right-short"></i>Email</a>
			</li>
            <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Chat Box</a>
			</li>
            <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>File Manager</a>
			</li>
            <li> <a href="app-to-do.html"><i class="bi bi-arrow-right-short"></i>Todo List</a>
			</li>
            <li> <a href="app-invoice.html"><i class="bi bi-arrow-right-short"></i>Invoice</a>
			</li>
            <li> <a href="app-fullcalender.html"><i class="bi bi-arrow-right-short"></i>Calendar</a>
			</li>
		</ul>
	</li> -->
	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-currency-dollar"></i>
			</div>
            <div class="menu-title">Financeiro</div>
		</a>
        <ul>
         	<li> <a href="resumofinanceiro.php"><i class="bi bi-arrow-right-short"></i>Resumo</a></li>
        <!--	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Transações</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Relatórios</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Categorias</a></li> -->
        	<li> <a href="contas.php"><i class="bi bi-arrow-right-short"></i>Contas</a></li>
        <!--	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Contatos</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Centros de Custo</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Importar/Exportar</a></li> -->
		</ul>
	</li>
      <!-- <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fas fa-atlas"></i>
			</div>
            <div class="menu-title">Biblioteca</div>
		</a>
        <ul>
            
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Empréstimo</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Retiradas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Acervo</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Multas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Recibos</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Reservas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Calendário</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Inventário</a></li>
			</li>
		</ul>
	</li>   -->
   <!-- <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa fa-university" aria-hidden="true"></i>
			</div>
            <div class="menu-title">Patrimônio</div>
		</a>
        <ul>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Bens</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ambientes</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Reservas</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Configurações</a></li>
            
		</ul>
	</li>-->
    <!-- <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="far fa-comments"></i>
			</div>
            <div class="menu-title">Comunicados</div>
		</a>
        <ul>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Manobrista</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Pequenos Grupos</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ministérios</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ensino</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Eventos</a></li>
		</ul>
	</li> -->
<!--	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-cog"></i>
			</div>
            <div class="menu-title">Configurações</div>
		</a>
        <ul>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Perfil Acesso</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Membresia</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Nomenclatura</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Pequenos Grupos</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ensino</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Discipulado</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Financeiro</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Kids</a></li>
            <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>SMS</a></li>
            <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Etiqueta</a></li>
			
		</ul>
	</li> -->
		<li>
		<a href="logout.php">
			<div class="parent-icon"><i class="bi bi-lock-fill"></i>
			</div>
			<div class="menu-title">Sair</div>
		</a>
	</li>

	
</ul>
<?php 
break;

case "Secretaria Local": 
    
    ?>
<ul class="metismenu" id="menu">
	
	<li>
		<a href="index.php">
			<div class="parent-icon"><i class="bi bi-house-door"></i>
			</div>
			<div class="menu-title">In&iacute;cio</div>
		</a>
	</li>
	<li class="menu-label">Secretaria</li>
	<li>
		<a class="has-arrow" href="javascript:;">
			<div class="parent-icon"><i class="bi bi-person"></i>
			</div>
			<div class="menu-title">Membresia</div>
		</a>
		<ul>
			<li> <a class="has-arrow" href="javascript:;"><i class="bi bi-arrow-right-short"></i>Pessoas</a>
				<ul>
                 <!--   <li> <a href="adicionarpessoa.php"><i class="bi bi-arrow-right-short"></i>Novo Cadastro</a></li> -->
					<li> <a href="pessoas.php"><i class="bi bi-arrow-right-short"></i>Procurar Cadastro</a></li>
				  <!--  	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Alterar Arrolamentos</a></li>
					<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Tranferência Igreja</a></li>
					<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Unificar Cadastros</a></li> -->
				</ul>
			</li>
		<!--	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Carteirinha</a>
                
			</li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Mapa</a>
				
			</li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Árvore Genealógica</a>
				
			</li>
			<li> <a class="has-arrow" href="javascript:;"><i class="bi bi-arrow-right-short"></i>Cadastros Base</a>
				<ul>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Arrolamentos</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Áreas de Apoio</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Áreas de Necessidades</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Avaliações</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Como Soube</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Formas de Contato</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Habilidades</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Dons Ministeriais</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Planos de Saúde</a></li>
                    <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Problemas de Saúde</a></li>
					<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Questionários</a></li>
					<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Tipos de Decisão</a></li>
                    
				</ul>
			</li> -->
			<li> <a class="has-arrow" href="javascript:;"><i class="bi bi-arrow-right-short"></i>Relatórios</a>
				<ul>
				     <li> <a href="aniversariantes.php"><i class="bi bi-arrow-right-short"></i>Aniversariantes do Mês</a></li>
				     <li> <a class="has-arrow" href="javascript:;" aria-expanded="true"><i class="bi bi-arrow-right-short"></i>Aniversariantes por Ministérios</a>
                      <ul style="">
                        <?php   $ministeriosigreja = mysqli_query($conecta,"SELECT * FROM lider");
	while($resultaministeriosigreja = mysqli_fetch_array($ministeriosigreja)){ 
	    echo' <li> <a href="aniversariantes.php?t='.$resultaministeriosigreja["id"].'"><i class="bi bi-arrow-right-short"></i>'.$resultaministeriosigreja["descricao"].'</a>
                        </li>';
	} ?>
                       
                       
                       
                      </ul>
                    </li>
		
				    </ul>
			</li>
		
				
		
	</li>
		</ul>
	</li>
	
<!-- 
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fas fa-church"></i>
			</div>
            <div class="menu-title">Congrega&ccedil;&otilde;es</div>
		</a>
        <ul>
            <li> <a href="app-emailbox.html"><i class="bi bi-arrow-right-short"></i>Email</a>
			</li>
            <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Chat Box</a>
			</li>
            <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>File Manager</a>
			</li>
            <li> <a href="app-to-do.html"><i class="bi bi-arrow-right-short"></i>Todo List</a>
			</li>
            <li> <a href="app-invoice.html"><i class="bi bi-arrow-right-short"></i>Invoice</a>
			</li>
            <li> <a href="app-fullcalender.html"><i class="bi bi-arrow-right-short"></i>Calendar</a>
			</li>
		</ul>
	</li> -->
<!-- 	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-grid"></i>
			</div>
            <div class="menu-title">Ministérios</div>
		</a>
        <ul>
      <li> <a href="app-emailbox.html"><i class="bi bi-arrow-right-short"></i>Email</a>
			</li>
            <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Chat Box</a>
			</li>
           <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>File Manager</a>
			</li>
           <li> <a href="app-to-do.html"><i class="bi bi-arrow-right-short"></i>Todo List</a>
			</li>
          <li> <a href="app-invoice.html"><i class="bi bi-arrow-right-short"></i>Invoice</a>
			</li> 
            <li> <a href="aniversariantesministerios.php"><i class="bi bi-arrow-right-short"></i>Aniversariantes</a>
			</li>
		</ul>
	</li>-->
	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-calendar3"></i>
			</div>
            <div class="menu-title">Eventos</div>
		</a>
        <ul>
           <li> <a href="eventoslocal.php"><i class="bi bi-arrow-right-short"></i>Igreja Local</a>
			</li>
            <li> <a href="eventosdistrital.php"><i class="bi bi-arrow-right-short"></i>Distrital</a>
			</li>
            <li> <a href="eventosestadual.php"><i class="bi bi-arrow-right-short"></i>Estadual</a>
			</li>
            <li> <a href="eventosregional.php"><i class="bi bi-arrow-right-short"></i>Regional</a>
			</li>
            <li> <a href="eventosnacional.php"><i class="bi bi-arrow-right-short"></i>Nacional</a>
			</li>
            <li> <a href="eventosinternacional.php"><i class="bi bi-arrow-right-short"></i>Internacional</a>
			</li>
		</ul>
	</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fas fa-book-reader"></i>
			</div>
            <div class="menu-title">Ensino</div>
		</a>
        <ul>
			
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Cursos</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Classes</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Professores</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Alunos</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Aulas</a></li>
			
		</ul>
	</li>

      <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fas fa-atlas"></i>
			</div>
            <div class="menu-title">Biblioteca</div>
		</a>
        <ul>
            
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Empréstimo</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Retiradas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Acervo</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Multas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Recibos</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Reservas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Calendário</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Inventário</a></li>
			</li>
		</ul>
	</li>   
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa fa-university" aria-hidden="true"></i>
			</div>
            <div class="menu-title">Patrimônio</div>
		</a>
        <ul>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Bens</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ambientes</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Reservas</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Configurações</a></li>
            
		</ul>
	</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="far fa-comments"></i>
			</div>
            <div class="menu-title">Comunicados</div>
		</a>
        <ul>
		<!--<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Manobrista</a></li> -->
		<!--<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Pequenos Grupos</a></li> -->
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ministérios</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ensino</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Eventos</a></li>
		</ul>
	</li> 
<!-- 	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-cog"></i>
			</div>
            <div class="menu-title">Configurações</div>
		</a>
        <ul>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Perfil Acesso</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Membresia</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Nomenclatura</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Pequenos Grupos</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ensino</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Discipulado</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Financeiro</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Kids</a></li>
            <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>SMS</a></li>
            <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Etiqueta</a></li>
			
		</ul>
	</li> -->
		<li>
		<a href="logout.php">
			<div class="parent-icon"><i class="bi bi-lock-fill"></i>
			</div>
			<div class="menu-title">Sair</div>
		</a>
	</li>

	
</ul>
<?php 
break;
case "Pastor Regional":
?>
<ul class="metismenu" id="menu">
	
	<li>
		<a href="index.php">
			<div class="parent-icon"><i class="bi bi-house-door"></i>
			</div>
			<div class="menu-title">In&iacute;cio</div>
		</a>
	</li>


    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-map"></i></i>
				
			</div>
            <div class="menu-title">Estados</div>
		</a>
        <ul>
        <?php   $estados1_regiao = mysqli_query($conecta,"SELECT * FROM estado where regiao_id=$regiao_id ORDER BY descricao asc");
	while($resultadoestados1_regiao = mysqli_fetch_array($estados1_regiao)){ 
	    echo'<li>
		<a class="has-arrow" href="javascript:;">
			<div class="parent-icon"><i class="fadeIn animated bx bx-map"></i>
			</div>
			<div class="menu-title">'.utf8_encode($resultadoestados1_regiao["descricao"]).'</div>
		</a>
	    	<ul>
	    		<li>
		<a class="has-arrow" href="javascript:;">
			<div class="parent-icon"><i class="bi bi-person"></i>
			</div>
			<div class="menu-title">Pessoas</div>
		</a>
		<ul>
			<li> <a class="has-arrow" href="javascript:;"><i class="bi bi-arrow-right-short"></i>Pastores</a>
				<ul>
                    <li> <a href="adicionarpastores.php?estado='.$resultadoestados1_regiao["id"].'"><i class="bi bi-arrow-right-short"></i>Novo Cadastro</a></li> 
					<li> <a href="pastores.php?estado='.$resultadoestados1_regiao["id"].'"><i class="bi bi-arrow-right-short"></i>Procurar Cadastro</a></li>

				
		
				</ul>
			</li>
			<li> <a class="has-arrow" href="javascript:;"><i class="bi bi-arrow-right-short"></i>Evangelistas</a>
				<ul>
                    <li> <a href="adicionarevangelista.php?estado='.$resultadoestados1_regiao["id"].'"><i class="bi bi-arrow-right-short"></i>Novo Cadastro</a></li> 
					<li> <a href="evangelistas.php?estado='.$resultadoestados1_regiao["id"].'"><i class="bi bi-arrow-right-short"></i>Procurar Cadastro</a></li>
				
		
				</ul>
			</li>
	
		</ul>
	</li>
	

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fas fa-church"></i>
			</div>
            <div class="menu-title">Igrejas</div>
		</a>
       <ul>
                   <li> <a href="adicionarigreja.php?estado='.$resultadoestados1_regiao["id"].'"><i class="bi bi-arrow-right-short"></i>Novo Cadastro</a></li> 
					<li> <a href="igrejas.php?estado='.$resultadoestados1_regiao["id"].'"><i class="bi bi-arrow-right-short"></i>Procurar Cadastro</a></li>

		
				</ul>
	</li>
   
                 </ul>
	  </li>';
	} ?>
        	

		</ul>
	</li>
	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-grid"></i>
			</div>
            <div class="menu-title">Ministérios</div>
		</a>
        <ul>
            <?php   $estados1_regiao = mysqli_query($conecta,"SELECT * FROM departamentos");
	while($resultadoestados1_regiao = mysqli_fetch_array($estados1_regiao)){ 
	    echo'<li>
		<a class="has-arrow" href="javascript:;">
			<div class="parent-icon"><i class="fadeIn animated bx bx-cube"></i>
			</div>
			<div class="menu-title">'.utf8_encode($resultadoestados1_regiao["apelido"]).'</div>
		</a>
	    	<ul>
                 <li> <a href="alterarresponsavelestado.php?id='.$resultadoestados1_regiao["id"].'"><i class="bi bi-arrow-right-short"></i>Alterar Respons&aacute;vel</a></li> 
                 <li> <a href="visualizarrelatorioestado.php?id='.$resultadoestados1_regiao["id"].'"><i class="bi bi-arrow-right-short"></i>Visualizar Relat&oacute;rio</a></li> 
                 </ul>
	  </li>';
	} ?>
           
		</ul>
	</li>
	<!--	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-calendar3"></i>
			</div>
            <div class="menu-title">Eventos</div>
		</a>
        <ul>
		
            <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Regional</a>
			</li>
            <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Nacional</a>
			</li>
            <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Internacional</a>
			</li>
		</ul>
	</li> -->
   	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fadeIn animated bx bx-stats"></i>
			</div>
            <div class="menu-title">Estat&iacute;stico</div>
		</a>
        <ul>
          	<li> <a href="resumoestatistico.php"><i class="bi bi-arrow-right-short"></i>Resumo</a></li>
         
		</ul>
	</li> 
	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-currency-dollar"></i>
			</div>
            <div class="menu-title">Financeiro</div>
		</a>
        <ul>
          	<li> <a href="resumofinanceiro.php"><i class="bi bi-arrow-right-short"></i>Resumo</a></li>
        <!--	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Transações</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Relatórios</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Categorias</a></li> 
        	<li> <a href="contas.php"><i class="bi bi-arrow-right-short"></i>Contas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Contatos</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Centros de Custo</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Importar/Exportar</a></li> -->
		</ul>
	</li>
  <!--  <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fas fa-atlas"></i>
			</div>
            <div class="menu-title">Biblioteca</div>
		</a>
        <ul>
            
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Empréstimo</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Retiradas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Acervo</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Multas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Recibos</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Reservas</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Calendário</a></li>
        	<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Inventário</a></li>
		
		</ul>
	</li>  
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa fa-university" aria-hidden="true"></i>
			</div>
            <div class="menu-title">Patrimônio</div>
		</a>
        <ul>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Bens</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ambientes</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Reservas</a></li>
			<li><a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Configurações</a></li>
            
		</ul>
	</li> 
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="far fa-comments"></i>
			</div>
            <div class="menu-title">Comunicados</div>
		</a>
        <ul>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Pastores</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Evangelistas</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ministérios</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ensino</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Eventos</a></li> 
		</ul>
	</li>
	<li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-cog"></i>
			</div>
            <div class="menu-title">Configurações</div>
		</a>
        <ul>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Perfil Acesso</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Membresia</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Nomenclatura</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Pequenos Grupos</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Ensino</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Discipulado</a></li> 
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Financeiro</a></li>
			<li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Kids</a></li>
            <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>SMS</a></li>
            <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Etiqueta</a></li>
			
		</ul>
	</li> --> 
		<li>
		<a href="logout.php">
			<div class="parent-icon"><i class="bi bi-lock-fill"></i>
			</div>
			<div class="menu-title">Sair</div>
		</a>
	</li>

	
</ul>


<?php
break;
}
?>