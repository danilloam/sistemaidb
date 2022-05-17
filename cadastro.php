<?php include ("header.php"); ?>
<!--============================== Page Title =================================-->
<div class="wrapper bg_title bg_grey_light">
  <div class="container_12 pagetitle">
    <article class="grid_12">
      <h1 class="color_white font_heading02">Cadastre-se</h1>
      <p style="float: left;"><span class="color_white"><a href="index.php?r=<?php echo $elref;  ?>" class="wlink">home</a> &rarr; Cadastro</span> </p>
      </article>
  </div>
</div>
<!--============================== Content ================================-->
<div class="brd2"></div>
<div class="wrapper bg_white">
	
 <section class="cont_pad2">
    <div class="container_12 align_center">
      <h2 class="color_black font_heading02 lh0">Cadastre-se agora mesmo. <span class="color_orange ucase">Venha ser um Leader de Sucesso!</span></h2>
    </div>
  </section>
  <section class="cont_pad2">
    <div class="container_12">
    <?php

if (isset($_POST['cadastrar']))
{
function anti_injection($sql)
	{
	// remove palavras que contenham sintaxe sql
	$sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\|--|s\\\\_-=.,}~^)/i", '', $sql);
	$sql = mysql_real_escape_string($sql);
	$sql = strip_tags($sql);//tira tags html e php
	$sql = addslashes($sql);//Adiciona barras invertidas a uma string
	return $sql;
	}
 
					
} else {
?>
<br>
<div class="contact-form">
	<div class="clr"></div>
	<br>
	<form id="contact-form" name="form" method="post" action="cadastro.php">
    	<fieldset>
      <article class="grid_4 ">
          <label class="name">
          <input type='text' name='nome' placeholder='Informe seu nome completo'></label>
          </label>
      </article>
      <article class="grid_4 ">
          <label class="name">
          <input type='text' name='email' placeholder='Informe seu endereÃ§o de e-mail'></label>
      </article>
      <article class="grid_4 ">
          <label class="name">
          <input type='text' name='login' placeholder='Seu login, sem espaÃ§os, sem acentos e sem caracteres especiais'></label>
      </article>
      <article class="grid_4 ">
          <label class="name">
          <input type='password' name='senha' placeholder='Informe uma senha de acesso'></label>
      </article>
      <article class="grid_4 ">
          <label class="name">
          <input type='text' name='facebook' placeholder='Informe o link do seu Facebook'></label>
      </article>
      <div style="height: 100px;"></div>
      <div class="grid_4">
      	<input type="submit" value="Cadastrar" name="cadastrar" class="button orange">
      </div>
      </fieldset>
      </form>
</div>
			<?php} ?>
    </div>
  </section>
</div>
<?php include ("footer.php"); ?>
