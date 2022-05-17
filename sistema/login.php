<?php
error_reporting(E_ALL);
session_start();
require_once('conexao/conecta.php'); 
include ("configuracao.php");?>
<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />

  <title>SGE - Sistema de Gestão Estratégico - Igreja de Deus no Brasil</title>
</head>

<body>

  <!--start wrapper-->
  <div class="wrapper">
         <?php if (!function_exists("GetSQLValueString")) {
         function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") { 
         if (PHP_VERSION < 6) {  
         $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;  }
         $conecta = mysqli_connect("50.62.137.49","sistemaidb","@K3f7b9h1T7a3k9w2y","sistemaidb") or die("Error " . mysqli_error($link));   
         $theValue =  function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($conecta,$theValue) : mysqli_escape_string($conecta,$theValue); 
         switch ($theType) {    case "text":      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";   
         break; 
         case "long":    case "int":      $theValue = ($theValue != "") ? intval($theValue) : "NULL";      
         break;    case "double":      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";      
         break;    case "date":      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";      
         break;    case "defined":      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;      
         break;  }  return $theValue;}}?>
     <?php
     // *** Validate request to login to this site.
     $loginFormAction = $_SERVER['PHP_SELF'];
     if (isset($_POST['login'])) {  $loginUsername=$_POST['login'];  
     $password=$_POST['senha'];  $MM_fldUserAuthorization = "";  
     $MM_redirectLoginSuccess = "index.php";  
     $MM_redirectLoginFailed = "login.php"; 
     $MM_redirecttoReferrer = false;  
     mysqli_select_db($conecta,"sgidb");  
     $LoginRS__query=sprintf("SELECT login, senha FROM usuario WHERE login=%s AND senha=%s",    GetSQLValueString($loginUsername, "text"), GetSQLValueString(md5($password), "text"));      $LoginRS = mysqli_query($conecta,$LoginRS__query) or die(mysqli_error());  $loginFoundUser = mysqli_num_rows($LoginRS);  if ($loginFoundUser) {     $loginStrGroup = "";    
     if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}   
     //declare two session variables and assign them  
     $_SESSION['MM_Username'] = $loginUsername;
     $_SESSION['MM_UserGroup'] = $loginStrGroup;
     if (isset($_SESSION['PrevUrl']) && false) {
     $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	    }
     function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)		{
     $lmin = 'abcdefghijklmnopqrstuvwxyz';
     $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $num = '1234567890';
     $simb = '!@#$%*-';
     $retorno = '';
     $caracteres = '';
     $caracteres .= $lmin;
     if ($maiusculas) $caracteres .= $lmai;
     if ($numeros) $caracteres .= $num;
     if ($simbolos) $caracteres .= $simb;
     $len = strlen($caracteres);
     for ($n = 1; $n <= $tamanho; $n++) {
     $rand = mt_rand(1, $len);
     $retorno .= $caracteres[$rand-1];
     }		return $retorno;
     }					$sessid = rand(59621984263,448494988788);	
     $cookie = geraSenha(6, true, true);
     $token = geraSenha(50, true, true);
     $haystack = $_SERVER['SERVER_NAME'];
     $timenow = time();
     if (stristr($haystack, 'www') === TRUE){$goto = "index.php";
     }else{$goto = "index.php"; }
     echo "<meta http-equiv=\"refresh\" content=\"2;URL=". $goto ."\"> 	";
     ?>
     <?php }else {	echo"<script language=javascript>alert('Seus Dados de Acesso N\u00e3o Conferem')</script>";echo"<script language=javascript>location.href='login.php'</script>";?><?php }}else {?>
       <!--start content-->
       <main class="authentication-content">
        <div class="container-fluid">
          <div class="authentication-card">
            <div class="card shadow rounded-0 overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                  <img src="assets/images/error/login-img.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                  <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title">Acesso ao Sistema</h5>
                    <p class="card-text mb-5">Que bom que você está aqui de volta!</p>
                    <form class="form-body" method="post" action="">
                    
                        <div class="row g-3">
                          <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">Usuário</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-fill"></i></div>
                              <input type="text" class="form-control radius-30 ps-5" name="login" id="inputEmailAddress" placeholder="Informe o Usuário">
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="inputChoosePassword" class="form-label">Senha</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                              <input type="password" class="form-control radius-30 ps-5" name="senha" id="inputChoosePassword" placeholder="Informe a Senha">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                              <label class="form-check-label" for="flexSwitchCheckChecked">Lembrar-me</label>
                            </div>
                          </div>
                          <div class="col-6 text-end">	<a href="esquecisenha.php">Esqueceu a Senha ?</a>
                          </div>
                          <div class="col-12">
                            <div class="d-grid">
                            <input type="submit" name="entrar" value="Acessar" class="btn btn-primary radius-30">
                             
                            </div>
                          </div>
                          <div class="col-12">
                            <p class="mb-0">Não conseguiu acesso? <a href="authentication-signup.html">Fale com nossa Equipe</a></p>
                          </div>
                        </div>
                    </form>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div id="lhc_status_container_page" ></div>
        </div>
       </main>
        <?php } ?> 
       <!--end page main-->

  </div>
  <!--end wrapper-->


  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/pace.min.js"></script>

<script>var LHC_API = LHC_API||{};
LHC_API.args = {mode:'embed',lhc_base_url:'//www.sistemaidb.com.br/helpdesk/index.php/',wheight:450,wwidth:350,pheight:520,pwidth:500,domain:'www.sistemaidb.com.br',leaveamessage:true,check_messages:false,lang:'site_admin/'};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.setAttribute('crossorigin','anonymous'); po.async = true;
var date = new Date();po.src = '//www.sistemaidb.com.br/helpdesk/design/defaulttheme/js/widgetv2/index.js?'+(""+date.getFullYear() + date.getMonth() + date.getDate());
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
</body>

</html>