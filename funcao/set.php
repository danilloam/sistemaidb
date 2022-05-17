<?php
include ("../conexao/config.php");
$acao=$_GET["acao"]; 
$id=$_GET["id"];
if($acao=="gravar_plano"){

	$nome=$_POST["nome"];
	$visitas=$_POST["visitas"];
	$valor=$_POST["valor"];
	
	$gravar=mysql_query("insert into plano_anuncio (nome, visitas, valor)values('$nome','$visitas','$valor')");
		
	echo"<script language=javascript>alert('Cadastrado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/anuncios_sites.php'</script>";	
}
if($acao=="editar_plano"){

	$nome=$_POST["nome"];
	$visitas=$_POST["visitas"];
	$valor=$_POST["valor"];
	
	$editar=mysql_query("update plano_anuncio set nome='$nome', visitas='$visitas', valor='$valor' where id='$id'");
		
	echo"<script language=javascript>alert('Editado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/anuncios_sites.php'</script>";	
}
if($acao=="deletar_plano"){
	
	$deletar=mysql_query("delete from plano_anuncio where id='$id'");
	
	echo"<script language=javascript>alert('Deletado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/anuncios_sites.php'</script>";
}
//funcoes para inserir, editar e deletar as categorias

if($acao=="gravar_categoria"){

	$nome=$_POST["nome"];
	
	$gravar=mysql_query("insert into categoria (nome)values('$nome')");
		
	echo"<script language=javascript>alert('Cadastrado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/anuncios_categorias.php'</script>";	
}
if($acao=="editar_categoria"){

	$nome=$_POST["nome"];
	
	$editar=mysql_query("update categoria set nome='$nome' where id='$id'");
		
	echo"<script language=javascript>alert('Editado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/anuncios_categorias.php'</script>";	
}
if($acao=="deletar_categoria"){
	
	$deletar=mysql_query("delete from categoria where id='$id'");
	
	echo"<script language=javascript>alert('Deletado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/anuncios_categorias.php'</script>";
}

//funcoes para inserir, editar e deletar os anuncios do site

if($acao=="gravar_site"){
		
	$user="Administrador";	
	$plano=$_POST["plano"];
	$nome=$_POST["nome"];
	$link=$_POST["url"];
	$desc=$_POST["descricao"];
	$categoria=$_POST["categoria"];
	$data=date("Y-m-d");
	$status="Pendente";
	$acessos="1";
	
	
	$gravar_site=mysql_query("insert into anuncio_sites (user, plano, nome, url, descricao, categoria, acesso, data, status)values('$user','$plano','$nome','$link','$desc','$categoria','$acessos','$data','$status')");
		
	echo"<script language=javascript>alert('Cadastrado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/anuncios_sites.php'</script>";	
}
if($acao=="editar_site"){

	$user="Administrador";
	$plano=$_POST["plano"];
	$nome=$_POST["nome"];
	$link=$_POST["url"];
	$desc=$_POST["descricao"];
	$categoria=$_POST["categoria"];
	$acesso=$_POST["acesso"];
	$data=date("Y-m-d");
	$status=$_POST["status"];
	
	$editar_site=mysql_query("update anuncio_sites set user='$user', plano='$plano', nome='$nome', url='$link', descricao='$desc', categoria='$categoria', acesso='$acesso', status='$status' where id='$id'");
		
	echo"<script language=javascript>alert('Editado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/anuncios_sites.php'</script>";	
}
if($acao=="deletar_site"){
	
	$deletar_site=mysql_query("delete from anuncio_sites where id='$id'");
	
	echo"<script language=javascript>alert('Deletado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/anuncios_sites.php'</script>";
}
//funcao para gravar os planos de banner

if($acao=="gravar_plano_banner"){

	$titulo=$_POST["titulo"];
	$tamanho=$_POST["tamanho"];
	$valor=$_POST["valor"];
	
	$gravar=mysql_query("insert into plano_banner (titulo, tamanho, valor)values('$titulo','$tamanho','$valor')");
		
	echo"<script language=javascript>alert('Cadastrado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/banner_planos.php'</script>";	
}
if($acao=="editar_plano_banner"){

	$titulo=$_POST["titulo"];
	$tamanho=$_POST["tamanho"];
	$valor=$_POST["valor"];
	
	
	$editar=mysql_query("update plano_banner set titulo='$titulo', tamanho='$tamanho', valor='$valor' where id='$id'");
		
	echo"<script language=javascript>alert('Editado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/banner_planos.php'</script>";	
}
if($acao=="deletar_plano_banner"){
	
	$deletar=mysql_query("delete from plano_banner where id='$id'");
	
	echo"<script language=javascript>alert('Deletado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/banner_planos.php'</script>";
}
//funcao para gravar, editar e deletar planos de emails

if($acao=="gravar_plano_email"){

	$plano=$_POST["plano"];
	$quantidade=$_POST["quantidade"];
	$valor=$_POST["valor"];
	
	$gravar=mysql_query("insert into plano_email (plano, quantidade, valor)values('$plano','$quantidade','$valor')");
		
	echo"<script language=javascript>alert('Cadastrado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/planos_emails.php'</script>";	
}
if($acao=="editar_plano_email"){

	$plano=$_POST["plano"];
	$quantidade=$_POST["quantidade"];
	$valor=$_POST["valor"];
	
	
	$editar=mysql_query("update plano_email set plano='$plano', quantidade='$quantidade', valor='$valor' where id='$id'");
		
	echo"<script language=javascript>alert('Editado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/planos_emails.php'</script>";	
}
if($acao=="deletar_plano_email"){
	
	$deletar=mysql_query("delete from plano_email where id='$id'");
	
	echo"<script language=javascript>alert('Deletado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/planos_emails.php'</script>";
}
//funcao para gravar, editar e deletar planos de fanpages

if($acao=="gravar_plano_fanpage"){

	$plano=$_POST["plano"];
	$curtir=$_POST["curtir"];
	$valor=$_POST["valor"];
	
	$gravar=mysql_query("insert into plano_fanpage (plano, curtir, valor)values('$plano','$curtir','$valor')");
		
	echo"<script language=javascript>alert('Cadastrado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/planos_fanpages.php'</script>";	
}
if($acao=="editar_plano_fanpage"){

	$plano=$_POST["plano"];
	$curtir=$_POST["curtir"];
	$valor=$_POST["valor"];
	
	
	$editar=mysql_query("update plano_fanpage set plano='$plano', curtir='$curtir', valor='$valor' where id='$id'");
		
	echo"<script language=javascript>alert('Editado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/planos_fanpages.php'</script>";	
}
if($acao=="deletar_plano_fanpage"){
	
	$deletar=mysql_query("delete from plano_fanpage where id='$id'");
	
	echo"<script language=javascript>alert('Deletado com Sucesso')</script>";
	echo"<script language=javascript>location.href='../admin/planos_fanpages.php'</script>";
}
?>          
