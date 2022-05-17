<?php
include ("conexao/conecta.php");
include("configuracao.php");

session_start();
$login = $_SESSION['MM_Username'];

$selectdados = mysqli_query($conecta,"SELECT * FROM usuario WHERE login='".$login."'")or die(mysqli_error($conecta));

$dados = mysqli_fetch_array($selectdados);

	$id=$dados["id"];

	$perfil_id=$dados["id_perfil"];

$selectperfil = mysqli_query($conecta,"SELECT * FROM perfil WHERE id=".$perfil_id)or die(mysqli_error($conecta));

$dadosperfil = mysqli_fetch_array($selectperfil);

	$id_perfil=$dadosperfil["id"];

	$perfil=$dadosperfil["descricao"];

				// Informa dados iniciais para sistema

			

switch($perfil) { 



case "Administrador":

$nome="Administrador";

$local="Acesso Total";
$ativa=1;

$selectigrejasnordeste = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=1 and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_nordeste=mysqli_num_rows($selectigrejasnordeste);

$selectigrejascentrooeste = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=2  and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_centro_oeste=mysqli_num_rows($selectigrejascentrooeste);


$selectigrejasdistritofederal = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=3  and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_distrito_federal=mysqli_num_rows($selectigrejasdistritofederal);


$selectigrejasnorte = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=4  and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_norte=mysqli_num_rows($selectigrejasnorte);


$selectigrejassudeste = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=5 and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_sudeste=mysqli_num_rows($selectigrejassudeste);


$selectigrejassul = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=6  and igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas_sul=mysqli_num_rows($selectigrejassul);

$selectigrejas = mysqli_query($conecta,"SELECT * FROM igreja where igreja_id is NULL") or die(mysqli_error($conecta));	
$total_igrejas=mysqli_num_rows($selectigrejas);

$selectcongregacoes = mysqli_query($conecta,"SELECT * FROM igreja where igreja_id is not NULL") or die(mysqli_error($conecta));	
$total_congregacoes=mysqli_num_rows($selectcongregacoes);

$selectpessoas = mysqli_query($conecta,"SELECT * FROM pessoa where membro=1 and status='ativo'") or die(mysqli_error($conecta));	
$total_membros=mysqli_num_rows($selectpessoas);

$selectcongregados = mysqli_query($conecta,"SELECT * FROM pessoa where membro=0 and funcao='Congregado' and status='ativo'") or die(mysqli_error($conecta));	

$total_congregados=mysqli_num_rows($selectcongregados);

break;

case "Secretaria Local":

$selectsecretaria = mysqli_query($conecta,"SELECT * FROM secretaria WHERE usuario_id=".$id)or die(mysqli_error($conecta));

$dadossecretaria = mysqli_fetch_array($selectsecretaria);

$secretaria_id=$dadossecretaria["id"];

$pessoa_id=$dadossecretaria["membro_id"];

$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$pessoa_id)or die(mysqli_error($conecta));

$dadospessoa = mysqli_fetch_array($selectpessoa);

$nome=$dadospessoa["nome"]." ".$dadospessoa["sobrenome"];

$selectigreja = mysqli_query($conecta,"SELECT * FROM igreja WHERE secretaria_id=".$secretaria_id)or die(mysqli_error($conecta));

$dadosigreja = mysqli_fetch_array($selectigreja);

$igreja_id=$dadosigreja["id"];
$plano_igreja=$dadosigreja["plano"];

$sqlplano=mysqli_query($conecta,"select * from planos where id={$plano_igreja}");
$verplano=mysqli_fetch_array($sqlplano);
$qdt_membros=$verplano["membros"];


$selectcadastros = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_cadastros=mysqli_num_rows($selectcadastros);

$selectcadastrosdesatualizados = mysqli_query($conecta,"SELECT * FROM pessoa where data_modificacao='' and igreja_id={$igreja_id}") or die(mysqli_error($conecta));	
$total_cadastros_desatualizados=mysqli_num_rows($selectcadastrosdesatualizados);


$local="da ".$dadosigreja["nome"];
$ativa=$dadosigreja["ativa"];

$estado_id=$dadosigreja["estado_id"];

$regiao_id=$dadosigreja["regiao_id"];

$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE id=".$estado_id)or die(mysqli_error($conecta));

$dadosestado= mysqli_fetch_array($selectestado);

$estado_nome=$dadosestado["descricao"];
$estadouf=$dadosestado["uf"];

$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE id=".$regiao_id)or die(mysqli_error($conecta));
$dadosregiao= mysqli_fetch_array($selectregiao);
$regiao_nome=$dadosregiao["descricao"];

$selectpessoas = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=1 and status='ativo'") or die(mysqli_error($conecta));	
$total_membros=mysqli_num_rows($selectpessoas);

$selectcongregados = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=0 and funcao='Congregado' and status='ativo'") or die(mysqli_error($conecta));	
$total_congregados=mysqli_num_rows($selectcongregados);
$selectnovoconvertido = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and funcao='Novo Convertido' and status='ativo'") or die(mysqli_error($conecta));	

$total_novos_convertidos=mysqli_num_rows($selectnovoconvertido);
$selectmasculino = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id={$igreja_id} and sexo='Masculino' and status='ativo'") or die(mysqli_error($conecta));	
$total_masculino=mysqli_num_rows($selectmasculino);
$selectfeminino = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id={$igreja_id} and sexo='Feminino' and status='ativo'") or die(mysqli_error($conecta));	
$total_feminino=mysqli_num_rows($selectfeminino);
$selectGcs = mysqli_query($conecta,"SELECT * FROM gcs where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_gcs=mysqli_num_rows($selectGcs);
$selectcongregacoes = mysqli_query($conecta,"SELECT * FROM igreja where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_congregacoes=mysqli_num_rows($selectcongregacoes);
$saude=100;

break;

case "Pastor Local":

$selectpastor = mysqli_query($conecta,"SELECT * FROM pastor WHERE usuario_id=".$id)or die(mysqli_error($conecta));

$dadospastor = mysqli_fetch_array($selectpastor);

$pastor_id=$dadospastor["id"];

$pessoa_id=$dadospastor["membro_id"];

$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$pessoa_id)or die(mysqli_error($conecta));

$dadospessoa = mysqli_fetch_array($selectpessoa);

$nome=$dadospastor["tipo"]." ".$dadospessoa["nome"]." ".$dadospessoa["sobrenome"];

$selectigreja = mysqli_query($conecta,"SELECT * FROM igreja WHERE pastor_id=".$pastor_id)or die(mysqli_error($conecta));

$dadosigreja = mysqli_fetch_array($selectigreja);

$igreja_id=$dadosigreja["id"];
$plano_igreja=$dadosigreja["plano"];

$sqlplano=mysqli_query($conecta,"select * from planos where id={$plano_igreja}");
$verplano=mysqli_fetch_array($sqlplano);
$qdt_membros=$verplano["membros"];


$selectcadastros = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_cadastros=mysqli_num_rows($selectcadastros);

$selectcadastrosdesatualizados = mysqli_query($conecta,"SELECT * FROM pessoa where data_modificacao='' and igreja_id={$igreja_id}") or die(mysqli_error($conecta));	
$total_cadastros_desatualizados=mysqli_num_rows($selectcadastrosdesatualizados);


$local="da ".$dadosigreja["nome"];
$ativa=$dadosigreja["ativa"];

$estado_id=$dadosigreja["estado_id"];

$regiao_id=$dadosigreja["regiao_id"];

$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE id=".$estado_id)or die(mysqli_error($conecta));

$dadosestado= mysqli_fetch_array($selectestado);

$estado_nome=$dadosestado["descricao"];
$estadouf=$dadosestado["uf"];

$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE id=".$regiao_id)or die(mysqli_error($conecta));
$dadosregiao= mysqli_fetch_array($selectregiao);
$regiao_nome=$dadosregiao["descricao"];

$selectpessoas = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=1 and status='ativo'") or die(mysqli_error($conecta));	
$total_membros=mysqli_num_rows($selectpessoas);

$selectcongregados = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=0 and funcao='Congregado' and status='ativo'") or die(mysqli_error($conecta));	
$total_congregados=mysqli_num_rows($selectcongregados);
$selectnovoconvertido = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and funcao='Novo Convertido' and status='ativo'") or die(mysqli_error($conecta));	

$total_novos_convertidos=mysqli_num_rows($selectnovoconvertido);
$selectmasculino = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id={$igreja_id} and sexo='Masculino' and status='ativo'") or die(mysqli_error($conecta));	
$total_masculino=mysqli_num_rows($selectmasculino);
$selectfeminino = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id={$igreja_id} and sexo='Feminino' and status='ativo'") or die(mysqli_error($conecta));	
$total_feminino=mysqli_num_rows($selectfeminino);
$selectGcs = mysqli_query($conecta,"SELECT * FROM gcs where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_gcs=mysqli_num_rows($selectGcs);
$selectcongregacoes = mysqli_query($conecta,"SELECT * FROM igreja where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_congregacoes=mysqli_num_rows($selectcongregacoes);
$saude=100;
break;

case "Pastor Estadual":

$selectpastor = mysqli_query($conecta,"SELECT * FROM pastor WHERE usuario_id=".$id)or die(mysqli_error($conecta));

$dadospastor = mysqli_fetch_array($selectpastor);

$pastor_id=$dadospastor["id"];

$pessoa_id=$dadospastor["pessoa_id"];

$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$pessoa_id)or die(mysqli_error($conecta));

$dadospessoa = mysqli_fetch_array($selectpessoa);

$nome=$dadospastor["tipo"]." ".$dadospessoa["nome"];

$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE pastor_id=".$pastor_id)or die(mysqli_error($conecta));

$dadosestado = mysqli_fetch_array($selectestado);

$estado_id=$dadosestado["id"];

$local="do estado de ".$dadosestado["descricao"];

break;

case "Pastor Regional":

$selectpastor = mysqli_query($conecta,"SELECT * FROM pastor WHERE usuario_id=".$id)or die(mysqli_error($conecta));

$dadospastor = mysqli_fetch_array($selectpastor);

$pastor_id=$dadospastor["id"];

$pessoa_id=$dadospastor["membro_id"];

$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$pessoa_id)or die(mysqli_error($conecta));

$dadospessoa = mysqli_fetch_array($selectpessoa);

$nome=$dadospastor["tipo"]." ".$dadospessoa["nome"]." ".$dadospessoa["sobrenome"];

$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE pastor_id=".$pastor_id)or die(mysqli_error($conecta));

$dadosregiao = mysqli_fetch_array($selectregiao);

$regiao_id=$dadosregiao["id"];

$local="da ".utf8_encode($dadosregiao["descricao"]);

$selectpagamentos = mysqli_query($conecta,"SELECT * FROM pagamentos WHERE regiao_id=".$regiao_id." and status='VERIFICAR' ORDER BY id ASC")or die(mysqli_error($conecta));

$pagamentos_pendentes=mysqli_num_rows($selectpagamentos);

$selectigrejas = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=$regiao_id and igreja_id IS NULL")or die(mysqli_error($conecta));
$total_igrejas=mysqli_num_rows($selectigrejas);
$selectpastores = mysqli_query($conecta	,"SELECT * FROM pastor where regiao_id=".$regiao_id) or die(mysqli_error($conecta));			
$selectcongregacoes = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=$regiao_id and igreja_id IS NOT NULL") or die(mysqli_error($conecta));
$total_congregacoes=mysqli_num_rows($selectcongregacoes);
$total_pastor=mysqli_num_rows($selectpastores);
$selectpessoas = mysqli_query($conecta,"SELECT * FROM pessoa where regiao_id=".$regiao_id." and membro=1 and status='ativo'") or die(mysqli_error($conecta));	
$total_membros=mysqli_num_rows($selectpessoas);

$selectcongregados = mysqli_query($conecta,"SELECT * FROM pessoa where regiao_id=".$regiao_id." and membro=0 and funcao='Congregado' and status='ativo'") or die(mysqli_error($conecta));	
$total_congregados=mysqli_num_rows($selectcongregados);

$ativa=1;

break;

case "Secretaria Regional":

$selectsecretaria = mysqli_query($conecta,"SELECT * FROM secretaria WHERE usuario_id=".$id)or die(mysqli_error($conecta));

$dadossecretaria = mysqli_fetch_array($selectsecretaria);

$secretaria_id=$dadossecretaria["id"];

$pessoa_id=$dadossecretaria["pessoa_id"];

$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$pessoa_id)or die(mysqli_error($conecta));

$dadospessoa = mysqli_fetch_array($selectpessoa);

$nome=$dadospessoa["nome"]." ".$dadospessoa["sobrenome"];

$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE secretaria_id=".$secretaria_id)or die(mysqli_error($conecta));

$dadosregiao = mysqli_fetch_array($selectregiao);

$regiao_id=$dadosregiao["id"];

$local="da ".$dadosregiao["descricao"];

$selectigrejas = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=".$regiao_id) or die(mysql_error());

$selectpastores = mysqli_query($conecta,"SELECT * FROM pastor where regiao_id=".$regiao_id) or die(mysql_error());			

$total_igrejas=mysqli_num_rows($selectigrejas);

$total_pastor=mysqli_num_rows($selectpastores);

break;

case "Lider":

$selectlider = mysqli_query($conecta,"SELECT * FROM lider WHERE usuario_id=".$id)or die(mysqli_error($conecta));

$dadoslider = mysqli_fetch_array($selectlider);
$lider_id=$dadoslider["id"];
$pessoa_id=$dadoslider["pessoa_id"];
$igreja_id=$dadoslider["igreja_id"];
$max_idade=$dadoslider["max_idade"];
$min_idade=$dadoslider["min_idade"];
$selectpessoa = mysqli_query($conecta,"SELECT * FROM pessoa WHERE id=".$pessoa_id)or die(mysqli_error($conecta));

$dadospessoa = mysqli_fetch_array($selectpessoa);

$nome=$dadospessoa["nome"]." ".$dadospessoa["sobrenome"];

$selectigreja = mysqli_query($conecta,"SELECT * FROM igreja WHERE id=".$igreja_id)or die(mysqli_error($conecta));

$dadosigreja = mysqli_fetch_array($selectigreja);

$igreja_id=$dadosigreja["id"];

$local="da ".$dadosigreja["nome"];
$ativa=$dadosigreja["ativa"];

$estado_id=$dadosigreja["estado_id"];

$regiao_id=$dadosigreja["regiao_id"];

$selectestado = mysqli_query($conecta,"SELECT * FROM estado WHERE id=".$estado_id)or die(mysqli_error($conecta));

$dadosestado= mysqli_fetch_array($selectestado);

$estado_nome=$dadosestado["descricao"];

$selectregiao = mysqli_query($conecta,"SELECT * FROM regiao WHERE id=".$regiao_id)or die(mysqli_error($conecta));

$dadosregiao= mysqli_fetch_array($selectregiao);

$regiao_nome=$dadosregiao["descricao"];



$sqlplano=mysqli_query($conecta,"select * from planos where id={$plano_igreja}");
$verplano=mysqli_fetch_array($sqlplano);
$qdt_membros=$verplano["membros"];


$selectcadastros = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_cadastros=mysqli_num_rows($selectcadastros);

$selectpessoas = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=1 and status='ativo'") or die(mysqli_error($conecta));	

$total_membros=mysqli_num_rows($selectpessoas);
$selectcongregados = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=0 and funcao='congregado' and status='ativo'") or die(mysqli_error($conecta));	

$total_congregados=mysqli_num_rows($selectcongregados);
$selectcriancas = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=".$igreja_id." and membro=0 and funcao='crianca' and status='ativo'") or die(mysqli_error($conecta));	
$total_criancas=mysqli_num_rows($selectcriancas);
$selectGcs = mysqli_query($conecta,"SELECT * FROM gcs where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_gcs=mysqli_num_rows($selectGcs);
$selectcongregacoes = mysqli_query($conecta,"SELECT * FROM igreja where igreja_id=".$igreja_id) or die(mysqli_error($conecta));	
$total_congregacoes=mysqli_num_rows($selectcongregacoes);




$membrosbusca_lideres = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=$igreja_id ORDER BY nome ASC") or die(mysqli_error($conecta));
$total_membros_lideres=0;;
$total_congregados_lideres=0;
$total_novos_convertidos_lideres=0;
$total_cadastros_desatualizados_lideres=0;
$total_afastados_lideres=0;
while($resultadomembros_lideres = mysqli_fetch_assoc($membrosbusca_lideres)){
$idade_lideres= (int)date("Y")-(int)substr($resultadomembros_lideres['dataNascimento'],-4);

            
if($min_idade==0 && $max_idade==0){
if(($dadoslider["sexo"]=="Masculino")&& ($resultadomembros_lideres['sexo']=="Masculino")){
 if(($resultadomembros_lideres['funcao']=="Afastado")&&($resultadomembros_lideres['status']=="ativo")){$total_afastados_lideres=$total_afastados_lideres+1;}
if(($resultadomembros_lideres['membro']==1)&&($resultadomembros_lideres['status']=="ativo")){$total_membros_lideres=$total_membros_lideres+1;}
if(($resultadomembros_lideres['membro']==0)&&($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['funcao']=="Congregado")){$total_congregados_lideres=$total_congregados_lideres+1;}
if(($resultadomembros_lideres['funcao']=="Novo Convertido")&&($resultadomembros_lideres['status']=="ativo")){$total_novoconvertido_lideres=$total_novoconvertido_lideres+1;}
if(($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['data_modificacao']=="")){$total_cadastros_desatualizados_lideres=$total_cadastros_desatualizados_lideres+1;}
  
}else if(($dadoslider["sexo"]=="Feminino")&& ($resultadomembros_lideres['sexo']=="Feminino")){
  if(($resultadomembros_lideres['funcao']=="Afastado")&&($resultadomembros_lideres['status']=="ativo")){$total_afastados_lideres=$total_afastados_lideres+1;}
if(($resultadomembros_lideres['membro']==1)&&($resultadomembros_lideres['status']=="ativo")){$total_membros_lideres=$total_membros_lideres+1;}
if(($resultadomembros_lideres['membro']==0)&&($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['funcao']=="Congregado")){$total_congregados_lideres=$total_congregados_lideres+1;}
if(($resultadomembros_lideres['funcao']=="Novo Convertido")&&($resultadomembros_lideres['status']=="ativo")){$total_novoconvertido_lideres=$total_novoconvertido_lideres+1;}
if(($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['data_modificacao']=="")){$total_cadastros_desatualizados_lideres=$total_cadastros_desatualizados_lideres+1;}
                  
}else if($dadoslider["sexo"]=="Ambos"){
if(($dadoslider['novoconvertido']==1) && ($resultadomembros_lideres['funcao']=="Novo Convertido")){ 
 if(($resultadomembros_lideres['funcao']=="Afastado")&&($resultadomembros_lideres['status']=="ativo")){$total_afastados_lideres=$total_afastados_lideres+1;}
if(($resultadomembros_lideres['membro']==1)&&($resultadomembros_lideres['status']=="ativo")){$total_membros_lideres=$total_membros_lideres+1;}
if(($resultadomembros_lideres['membro']==0)&&($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['funcao']=="Congregado")){$total_congregados_lideres=$total_congregados_lideres+1;}
if(($resultadomembros_lideres['funcao']=="Novo Convertido")&&($resultadomembros_lideres['status']=="ativo")){$total_novoconvertido_lideres=$total_novoconvertido_lideres+1;}
if(($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['data_modificacao']=="")&&($resultadomembros_lideres['funcao']=="Novo Convertido")){$total_cadastros_desatualizados_lideres=$total_cadastros_desatualizados_lideres+1;}    
                
}
else{
 if(($resultadomembros_lideres['funcao']=="Afastado")&&($resultadomembros_lideres['status']=="ativo")){$total_afastados_lideres=$total_afastados_lideres+1;}
if(($resultadomembros_lideres['membro']==1)&&($resultadomembros_lideres['status']=="ativo")){$total_membros_lideres=$total_membros_lideres+1;}
if(($resultadomembros_lideres['membro']==0)&&($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['funcao']=="Congregado")){$total_congregados_lideres=$total_congregados_lideres+1;}
if(($resultadomembros_lideres['funcao']=="Novo Convertido")&&($resultadomembros_lideres['status']=="ativo")){$total_novoconvertido_lideres=$total_novoconvertido_lideres+1;}
if(($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['data_modificacao']=="")){$total_cadastros_desatualizados_lideres=$total_cadastros_desatualizados_lideres+1;}             
                       
}
}
}
else{
if($idade_lideres>=$min_idade && $idade_lideres<=$max_idade){
 if(($resultadomembros_lideres['funcao']=="Afastado")&&($resultadomembros_lideres['status']=="ativo")){$total_afastados_lideres=$total_afastados_lideres+1;}
if(($resultadomembros_lideres['membro']==1)&&($resultadomembros_lideres['status']=="ativo")){$total_membros_lideres=$total_membros_lideres+1;}
if(($resultadomembros_lideres['membro']==0)&&($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['funcao']=="Congregado")){$total_congregados_lideres=$total_congregados_lideres+1;}
if(($resultadomembros_lideres['funcao']=="Novo Convertido")&&($resultadomembros_lideres['status']=="ativo")){$total_novoconvertido_lideres=$total_novoconvertido_lideres+1;}
if(($resultadomembros_lideres['status']=="ativo")&&($resultadomembros_lideres['data_modificacao']=="")){$total_cadastros_desatualizados_lideres=$total_cadastros_desatualizados_lideres+1;}
}
}
}




























break;






// Agora definiremos o default, que será a pagina que será aberta quando não houver um valor para o $id 

default: 

$nome="N&atilde;o Identificado";

$local="N&atilde;o Identificado";

break; 
		
}

	






?>

<div id="main-content">

			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

	

				<div class="row-fluid">

					<div class="span12">

						<div class="span6">

					
						

						</div>

					

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

		    <div id="page" class="dashboard">



 <div class="row-fluid">
                <div class="span12">
								
					<div class="space15"></div>
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
	
                        <div class="widget-title">
						
                            <h4><i class="icon-reorder"></i>Lista de Pessoas</h4>
                            <span class="tools">
                               
                            </span>
                        </div>
                        <div class="widget-body">
<table class="explain">
		<tbody>
			<tr>
				<td class="span9">IMPRESSO POR: <?php echo utf8_encode(strtoupper($nome)) ?></td>
				
				<td class="span4">DATA DA IMPRESS&Atilde;O: <?php echo date("d/m/Y");?></td>
				<td></td>
			</tr>
			<tr>
				<td class="heading"></td>
				<td></td>
				
			</tr>
		</tbody>
	</table>
	
	<table class="table" border="1">
		<thead>
			<tr >
				<th>Nome Completo</th>
				<th class="" width="10%">Fun&ccedil;&atilde;o</th>
				<th class="" width="10%">Nascimento</th>
				<th class="" width="5%">Idade Atual</th>
				<th class="">Telefones</th>
			</tr> 	
		</thead>
<tbody>

<?php	
$membros1busca = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=$igreja_id and status='ativo' ORDER BY nome asc");
$total_aniversariantes=0;
while($resultadomembros1 = mysqli_fetch_array($membros1busca)){
    
$idade= (int)date("Y")-(int)substr($resultadomembros1['dataNascimento'],-4);
		  
$sqllider=mysqli_query($conecta,"select * from lider where id=$lider_id and igreja_id=$igreja_id");
$verlider=mysqli_fetch_array($sqllider);
$min_idade=$verlider["min_idade"];
$max_idade=$verlider["max_idade"];
            
if(($min_idade==0) && ($max_idade==0)){
if(($verlider["sexo"]=="Masculino")&&($resultadomembros1['sexo']=="Masculino")){
?>
<tr>
<td><center><?php echo utf8_encode($resultadomembros1['nome']." ".$resultadomembros1['sobrenome']);?></center></td>
<td><center><?php echo utf8_encode($resultadomembros1['funcao']);?></center></td>
<td><center><?php echo $resultadomembros1['dataNascimento'];?></center></td>
<td><center><?php echo date("Y")-substr($resultadomembros1['dataNascimento'],-4);?></center></td>
<td><?php if($resultadomembros1["celular1"]<>""){echo  $resultadomembros1["celular1"];}if($resultadomembros1["celular2"]<>""){echo  " / ".$resultadomembros1["celular2"];}if($resultadomembros1["telefone"]<>""){echo  " / ".$resultadomembros1["telefone"];}?></td>
</tr>

<?php
$total_aniversariantes=$total_aniversariantes+1;
    
} else if(($verlider["sexo"]=="Feminino")&&($resultadomembros1['sexo']=="Feminino")){
?>
<tr>
<tr>
<td><center><?php echo utf8_encode($resultadomembros1['nome']." ".$resultadomembros1['sobrenome']);?></center></td>
<td><center><?php echo utf8_encode($resultadomembros1['funcao']);?></center></td>
<td><center><?php echo $resultadomembros1['dataNascimento'];?></center></td>
<td><center><?php echo date("Y")-substr($resultadomembros1['dataNascimento'],-4);?></center></td>
<td><?php if($resultadomembros1["celular1"]<>""){echo  $resultadomembros1["celular1"];}if($resultadomembros1["celular2"]<>""){echo  " / ".$resultadomembros1["celular2"];}if($resultadomembros1["telefone"]<>""){echo  " / ".$resultadomembros1["telefone"];}?></td>
</tr>

<?php
$total_aniversariantes=$total_aniversariantes+1;
} else if(($verlider["sexo"]=="Ambos") && ($verlider['novoconvertido']==1) && ($resultadomembros1['funcao']=="Novo Convertido")){
?>
<tr>
<td><center><?php echo utf8_encode($resultadomembros1['nome']." ".$resultadomembros1['sobrenome']);?></center></td>
<td><center><?php echo utf8_encode($resultadomembros1['funcao']);?></center></td>
<td><center><?php echo $resultadomembros1['dataNascimento'];?></center></td>
<td><center><?php echo date("Y")-substr($resultadomembros1['dataNascimento'],-4);?></center></td>
<td><?php if($resultadomembros1["celular1"]<>""){echo  $resultadomembros1["celular1"];}if($resultadomembros1["celular2"]<>""){echo  " / ".$resultadomembros1["celular2"];}if($resultadomembros1["telefone"]<>""){echo  " / ".$resultadomembros1["telefone"];}?></td>
</tr>

<?php
$total_aniversariantes=$total_aniversariantes+1;
}
}else if(($verlider["sexo"]=="Ambos")&& ($idade>=$min_idade) && ($idade<=$max_idade)){
?>
<tr>
<td><center><?php echo utf8_encode( $resultadomembros1['nome']." ".$resultadomembros1['sobrenome']);?></center></td>
<td><center><?php echo utf8_encode($resultadomembros1['funcao']);?></center></td>
<td><center><?php echo $resultadomembros1['dataNascimento'];?></center></td>
<td><center><?php echo date("Y")-substr($resultadomembros1['dataNascimento'],-4);?></center></td>
<td><?php if($resultadomembros1["celular1"]<>""){echo  $resultadomembros1["celular1"];}if($resultadomembros1["celular2"]<>""){echo  " / ".$resultadomembros1["celular2"];}if($resultadomembros1["telefone"]<>""){echo  " / ".$resultadomembros1["telefone"];}?></td>
</tr>



<?php
$total_aniversariantes=$total_aniversariantes+1;
}
}                 
?>
</tbody>




		<tfoot>
			<tr >
				<td colspan="8"  style="color: black; background: #eaeaea" ><center>Total de Pessoas Cadastradas: <?php echo $total_aniversariantes; ?> </center></td> 
			</tr>
		</tfoot>
	</table>
			

				<br />
			<center>
				<!--<button onclick="window.open('?pdf=1')">Gerar PDF</button>-->
								<button onclick="self.print();">Imprimir Relatorio *</button></center>	
	</div>
		<p class="no-print" style="width: 100%; margin: 0 auto 20px; text-align: center; font-size: 12px;">* Para salvar o relat&oacute;rio em PDF clique em <b>Imprimir Relat&oacute;rio</b>, depois em <b>Destino</b> clique em <b>Alterar</b> e escolha a op&ccedil;&atilde;o <b>Salvar como PDF</b>. Para finalizar clique <b>Salvar</b>.</p>


                    </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
</div>
            </div>

				</div>

				<!-- END PAGE CONTENT-->

</div>


