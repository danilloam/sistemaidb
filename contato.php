<?php include ("header.php");

 ?>

<!--============================== Page Title =================================-->

<div class="wrapper bg_title bg_grey_light">

  <div class="container_12 pagetitle">

    <article class="grid_12">

      <h1 class="color_white font_heading02">Fale Conosco</h1>

      <p style="float:left;"><span class="color_white"><a href="index.php" class="wlink">In&iacute;cio</a> &rarr; Contato</span> </p>

      <p style="float: right;" class="color_white">Ficou com d&uacute;vidas? Ligue para n&oacute;s ou preencha o formul&aacute;rio abaixo.</b></p>

    </article>

  </div>

</div>

<!--============================== Content ================================-->

<div class="brd2"></div>

<div class="wrapper bg_white">

  <!--==============================content================================-->

  <section class="cont_pad2">

    <div class="container_12" style="margin-bottom:30px;" >

      <article class="grid_8 ">

        <div class="heading_line">

          <h3 class="color_black font_heading ucase"><span>Envie sua Mensagem</span></h3>

        </div>

        <form id="contact-form" enctype="multipart/form-data" action="contato.php" method="post" >

          <div class="success">Mensagem Enviada com Sucesso<br>

            <strong>Obrigado por nos contatar. N&oacute;s entraremos em contato em breve.</strong> </div>

          <fieldset>

          <label class="name">
	  Nome:
          <input type="text" placeholder="Fulano Cicrano Beltrano" required>

          <span class="error">*Este nome n&atilde; &eacute; v&aacute;lido.</span> <span class="empty">*Este campo n&atilde;o pode estar vazio.</span> </label>

          <label class="email">
	  Email:
          <input type="email" placeholder="fulanocicrano@provedor.com.br" required>

          <span class="error">*Este nome email &eacute; v&aacute;lido.</span> <span class="empty">*Este campo n&atilde;o pode estar vazio.</span> </label>

          <label class="phone">
	  Telefone de Contato:
          <input type="tel" id="campoTelefone" placeholder="(11)9 1234.5678" required>

          <span class="error">*Este n&eacute;mero de celular n&atilde;o &eacute; v&aacute;lido.</span> <span class="empty">*Este campo n&atilde;o pode estar vazio.</span> </label>

          <label class="message">

          <textarea placeholder="Escreva sua mensagem aqui." required></textarea>

          <span class="error">*Sua mensagem est&aacute; muito curta.</span> <span class="empty">*Este campo n&atilde;o pode estar vazio.</span> </label>
 </fieldset>
<div class="g-recaptcha" data-sitekey="6LdHOOkUAAAAAPTYLO_OIYIGk2MSd9-OSotf5xPj"></div>
  <div class="buttons2">
     <div class="grid_3	">
<input type="reset" value="Limpar" name="limpar" class="button">
      </div>

     <div class="grid_3">
<input type="submit" value="Enviar" name="enviar" class="button">
      </div>

</div>

         

        </form>

      </article>

      <article class="grid_4 last-col">

        <div class="heading_line">

          <h3 class="color_black font_heading ucase"><span>Mais Informações</span></h3>

        </div>

        <dl class="adress1">

          <dt>

          <dd>E-mail: <a href="mailto:contato@sistemaidb.com.br" class="link1">contato@sistemaidb.com.br</a></dd>

        </dl>

      </article>

    </div>

  </section>

</div>

<?php include ("footer.php"); ?>
