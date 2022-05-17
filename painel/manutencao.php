<?php 
include ("configuracao.php");
 ?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Estamos em Manutenção | <?php echo $titulo; ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />

  <link href="assets/coming_soon/demo/css/style.css" rel="stylesheet">

  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/style_responsive.css" rel="stylesheet" />
  <link href="css/style_default.css" rel="stylesheet" id="style_color" />

  <!-- jQuery and Modernizr-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

  <link href='http://fonts.googleapis.com/css?family=Alex+Brush' rel='stylesheet' type='text/css'>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="coming-body">
  <div class="lock-header">
      <!-- BEGIN LOGO -->
      <a href="index.html" id="logo" class="center">
          <img src="img/logo_branca.png" alt="logo" class="center" />
      </a>
      <!-- END LOGO -->
  </div>

  <!-- BEGIN COMING SOON -->
  <div class="coming-soon">
      <div class="container-fluid">
          <div class="row-fluid">
              <div class="span12 responsive" data-tablet="span4" data-desktop="span12">
                  <h1>
                      <label>Mais Moderno e Completo Sistema de Ajuda Mutua.</label>
                      <span>Em Breve...</span>
                  </h1>
                  <div class="circles clearfix">
                      <div class="counter-days circle blue">
                          <div class="wrap-left"><div class="left"></div></div>
                          <div class="wrap-right"><div class="right"></div></div>
                          <div class="count"><span id="count-days" class="value"></span></div>
                      </div>
                      <div class="counter-hours circle red">
                          <div class="wrap-left"><div class="left"></div></div>
                          <div class="wrap-right"><div class="right"></div></div>
                          <div class="count"><span id="count-hours" class="value"></span></div>
                      </div>
                      <div class="counter-minutes circle green">
                          <div class="wrap-left"><div class="left"></div></div>
                          <div class="wrap-right"><div class="right"></div></div>
                          <div class="count"><span id="count-minutes" class="value"></span></div>
                      </div>
                      <div class="counter-seconds circle orange">
                          <div class="wrap-left"><div class="left"></div></div>
                          <div class="wrap-right"><div class="right"></div></div>
                          <div class="count"><span id="count-seconds" class="value"></span></div>
                      </div>
                  </div>
                  <form action="">
                      <div class="input-append">
                          <input type="text" class="email-address" placeholder="Cadastre seu email e receba novidades..." />
                          <input type="submit" class="submit-btn" value="Assinar" />
                      </div>
                  </form>
                  <br><br>
                  <p>Compartilhe!</p>
                  <br>
                  <div class="social">
                      <ul class="icons clearfix">
                          <li><a href="javascript:;"><img src="assets/coming_soon/demo/img/social/youtube.png" alt="" /></a></li>
                          <li><a href="javascript:;"><img src="assets/coming_soon/demo/img/social/yahoo.png" alt="" /></a></li>
                          <li><a href="javascript:;"><img src="assets/coming_soon/demo/img/social/vimeo.png" alt="" /></a></li>
                          <li><a href="javascript:;"><img src="assets/coming_soon/demo/img/social/twitter.png" alt="" /></a></li>
                          <li><a href="javascript:;"><img src="assets/coming_soon/demo/img/social/stumbleupon.png" alt="" /></a></li>
                          <li><a href="javascript:;"><img src="assets/coming_soon/demo/img/social/skype.png" alt="" /></a></li>
                          <li><a href="javascript:;"><img src="assets/coming_soon/demo/img/social/picasa.png" alt="" /></a></li>
                          <li><a href="javascript:;"><img src="assets/coming_soon/demo/img/social/myspace.png" alt="" /></a></li>
                          <li><a href="javascript:;"><img src="assets/coming_soon/demo/img/social/linkedin.png" alt="" /></a></li>
                          <li><a href="javascript:;"><img src="assets/coming_soon/demo/img/social/google-plus.png" alt="" /></a></li>
                          <li><a href="javascript:;"><img src="assets/coming_soon/demo/img/social/flickr.png" alt="" /></a></li>
                          <li><a href="javascript:;"><img src="assets/coming_soon/demo/img/social/facebook.png" alt="" /></a></li>
                          <li><a href="javascript:;"><img src="assets/coming_soon/demo/img/social/blogger.png" alt="" /></a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- END COMING SOON -->

  <!-- BEGIN JAVASCRIPTS -->
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>

  <!--coming soon js-->
  <script src="assets/coming_soon/demo/js/style.js"></script>

  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>